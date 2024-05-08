<?php

namespace App\Controllers;
use App\Models\Admin_Model;

helper('email_helper');
require_once FCPATH . 'vendor/autoload.php';
class Admin_Controller extends BaseController
{
    public function index(): string
    {
        return view('login');
    }
   public function login()
{
    $model = new Admin_Model();
    $where = [
        'email' => $this->request->getVar('email'),
        'password' => $this->request->getVar('password')      
    ];
    $result = $model->checkCredentials($where);
    
    if ($result != '') {
        session()->set('user_id', $result['id']);
        return redirect('admin_dashboard');
    } else {
        session()->setFlashdata('error', 'Invalid credentials');
        return redirect()->to(base_url('/')); // Redirect back to login page
    }
}
    public function admin_dashboard()
    {
        $session = session();
       if (!$session->has('user_id')) {
        return redirect()->to('/');
    }
        $model = new Admin_Model();
        $data['Appt'] = $model->getallapp();
        $data['curruntmonthappt'] = $model->getcurruntmonthapt();
        
        // Call allamount() method to get the sum of amounts from both tables
        $amountData = $model->allamount();
      //  print_r($amountData);die;
        $data['appointmentAmount'] = $amountData['appointmentAmount'];
        $data['servicesAmount'] = $amountData['servicesAmount'];
        $data['classesAmount'] =$amountData['classesAmount'];
        $data['totalammount'] =$data['appointmentAmount'] + $data['servicesAmount']+$data['classesAmount'] ;
        $data['todayappoinments'] = $model->todayAppointments();
        $data['remaingslots'] = $model->todayRemainingSlots();

// echo '<pre>';print_r($data['todayappoinments']);die;
        return view('admin_dashboard', $data);
    }
        public function  All_Appointment() {
            $model = new Admin_Model();
          $data['bookedslots'] =$model->getallAppointment();
        //   echo '<pre>';print_r($data['bookedslots']);die;
            echo view('All_Appointment',$data);
        }
    public function add_schedule()
    {
       
         $userID = session('user_id');
        $model = new Admin_Model();
        $wherecond = array('user_id' => $userID);
        $data['schedule_data'] =  $model->getalldata('tbl_schedule', $wherecond);

        $uri = service('uri');

        // Get the second URI segment
        $secondSegment = $uri->getSegment(2);

        $wherecond = array('ap_id ' => $secondSegment);

        $data['single'] =  $model->getsinglerow('tbl_appointment', $wherecond);
        $data['country'] = $model->get_country_name();
        $data['states'] = $model->get_states_name();
        $data['citys'] = $model->get_citys_name();

        // echo "<pre>";print_r($data['single']);exit();

        return view('add_schedule',$data);
    }
    public function reschedule()
    {
       
         $userID = session('user_id');
        $model = new Admin_Model();
        $wherecond = array('user_id' => $userID);
        $data['schedule_data'] =  $model->getalldata('tbl_schedule', $wherecond);
        $data['country'] = $model->get_country_name();
        $data['states'] = $model->get_states_name();
        $data['citys'] = $model->get_citys_name();

        $uri = service('uri');

        // Get the second URI segment
        $secondSegment = $uri->getSegment(2);

        $wherecond = array('ap_id ' => $secondSegment);

        $data['single'] =  $model->getsinglerow('tbl_appointment', $wherecond);

        // echo "<pre>";print_r($data['single']);exit();

        if(!empty($data['single'])){
            $wherecond = array('id ' => $data['single']->timeSlot);

            $data['time_slot'] =  $model->getsinglerow('tbl_slots', $wherecond);

            if (!empty($data['time_slot']) && !empty($data['time_slot']->start_time)) {
                // Add the start time to the $data['single'] array
                $data['single']->start_time = $data['time_slot']->start_time;
            }
        }

        // echo "<pre>";print_r($data['single']);exit();

        return view('reschedule',$data);
    }
    public function set_schedule()
    {

        $userID = session('user_id');
        $data = [
            'user_id' => $userID,
            'day' => $this->request->getVar('day'),
            'start_date' => $this->request->getVar('start_date'),
            'end_date' => $this->request->getVar('end_date'),
            'start_time' => $this->request->getVar('start_time'),
            'end_time' => $this->request->getVar('end_time'),
            'created_on' => date('Y:m:d H:i:s'),
        ];


        $db = \Config\Database::Connect();
        if ($this->request->getVar('id') == "") {
            $add_data = $db->table('tbl_schedule');
            $add_data->insert($data);
            session()->setFlashdata('success', 'Schedule added successfully.');
        } else {
            $update_data = $db->table('tbl_schedule')->where('id', $this->request->getVar('id'));
            $update_data->update($data);
            session()->setFlashdata('success', 'Schedule updated successfully.');
        }

        return redirect()->to('add_schedule');
        
    }
    public function save_schedule(){
        return view('save_schedule');
    }
    public function my_slots()
    {
        $session = session();
        if (!$session->has('user_id')) {
         return redirect()->to('/');
     }
        $userID = session('user_id');
        $model = new Admin_Model();
        $slots = $model->getallslots($userID);
      // echo '<pre>'; print_r($slots);die;
        return view('my_slots', ['slots' => $slots]);
    }
    public function add_workinghour(){
        $session = session();
        if (!$session->has('user_id')) {
         return redirect()->to('/');
     }
        $userID = session('user_id');

        $model = new Admin_Model();
 
        $wherecond = array('user_id' => $userID,);
        $data['schedule'] =  $model->getalldata('tbl_schedule', $wherecond);
     


        return view('add_workinghour', $data);

    }
   

public function set_workinghour()
{
//    echo '<pre>'; print_r($_POST);die;
    $userID = session('user_id');
    $days = $this->request->getVar('day[]');
    $startTimes = $this->request->getVar('start_time[]');
    $endTimes = $this->request->getVar('end_time[]');

    $currentYear = date('Y');

    // Create a common start and end date for the entire year
    $commonStartDate = $currentYear . '-01-01';
    $commonEndDate = $currentYear . '-12-31';

    // Validate and modify date format
    $commonStartDate = date('Y-m-d', strtotime($commonStartDate));
    $commonEndDate = date('Y-m-d', strtotime($commonEndDate));

    $db = \Config\Database::connect();
    $insertedSchedules = 0;
    $insertedSlots = 0;
    // $db->table('tbl_schedule')->where('user_id', $userID)->delete();


    $db->table('tbl_slots')->where('user_id', $userID)->delete();

    // echo $this->request->getVar('id');exit();

    foreach ($days as $index => $day) {
        $data = [
            'user_id' => $userID,
            'day' => $day,
            'start_date' => $commonStartDate,
            'end_date' => $commonEndDate,
            'start_time' => $startTimes[$index],
            'end_time' => $endTimes[$index],
            'is_deleted' => 'N',
            'created_on' => date('Y-m-d H:i:s'),
        ];

        $existingData = $db->table('tbl_schedule')
                       ->where('user_id', $userID)
                       ->where('day', $day)
                       ->get()
                       ->getRow();
// echo "hhh";
//                        echo "<pre>";print_r($existingData);exit();

                       if (!empty($existingData)) {
                        // Update the existing data
                        $db->table('tbl_schedule')
                        ->where('user_id', $userID)
                        ->where('day', $day)
                        ->update($data);
                    } else {
                        // Insert new data if it doesn't exist
                        $add_data = $db->table('tbl_schedule');
                        $add_data->insert($data);
                    }



        // if ($this->request->getVar('id') == "") {
        //     $add_data = $db->table('tbl_schedule');
        //     $add_data->insert($data);
            
        //     $insertedSchedules++;
        // } else {
        //     $update_data = $db->table('tbl_schedule')->where('id', $this->request->getVar('id'));
        //     $update_data->update($data);
        // }

        // Convert start and end times to 45-minute increments and insert into tbl_slots
        $start = strtotime($startTimes[$index]);
        $end = strtotime($endTimes[$index]);


        while ($start < $end) {
            $slotEndTime = date('H:i', strtotime('+45 minutes', $start));
            if ($slotEndTime > date('H:i', $end)) {
                break; // Break loop if the slot end time exceeds the end time
            }

            // Insert into tbl_slots
            $slotData = [
                'user_id' => $userID,
                'day' => $day,
                'start_time' => date('H:i', $start),
                'end_time' => $slotEndTime,
                'created_on' => date('Y-m-d H:i:s'),
                'is_deleted' => 'N',

            ];

         

            $db->table('tbl_slots')->insert($slotData);
            $insertedSlots++;

            $start = strtotime('+45 minutes', $start);
        }
    }

    if ($insertedSchedules > 0) {
        session()->setFlashdata('success', 'Schedules added successfully.');
    } else {
        session()->setFlashdata('success', 'Schedules updated successfully.');
    }

    if ($insertedSlots > 0) {
        session()->setFlashdata('success', 'Slots added successfully.');
    }

    return redirect()->to('add_workinghour');
}
    // public function deleteworkinghour(){
    //     $db = \Config\Database::Connect();

    //     $currentURL = current_url();

    //     $segments = explode('/', $currentURL);
    
    //      $tbl_name = isset($segments[5]) ? $segments[5] : null;
    //      $day = isset($segments[6]) ? $segments[6] : null;
    //      $id = isset($segments[7]) ? $segments[7] : null;

    //     $update_data = $db->table($tbl_name)->where('user_id', $id)->where('day', $day);
    //     $update_data->update(['is_deleted' => 'Y']);

    //     $db->table('tbl_slots')->where('day', $day)->delete();


    //     session()->setFlashdata('success', 'Data Deleted successfully.');
    //     return redirect()->to('add_workinghour');
    // }

    public function deleteworkinghour(){
        $db = \Config\Database::Connect();

        $currentURL = current_url();

        $segments = explode('/', $currentURL);
    
         $tbl_name = isset($segments[5]) ? $segments[5] : null;
         $day = isset($segments[6]) ? $segments[6] : null;
         $id = isset($segments[7]) ? $segments[7] : null;

        $update_data = $db->table($tbl_name)->where('user_id', $id)->where('day', $day);
        $update_data->update(['is_deleted' => 'Y']);

        // $db->table('tbl_slots')->where('day', $day)->delete();
        $update_data = $db->table('tbl_slots')->where('user_id', $id)->where('day', $day);
        $update_data->update(['is_deleted' => 'Y']);

        session()->setFlashdata('success', 'Data Deleted successfully.');
        return redirect()->to('add_workinghour');
    }


public function calendar(){

    $userID = session('user_id');

    $model = new Admin_Model();

    $data['schedule'] =  $model->getcalenderallslots();
    $data['slots'] =  $model->getalluserslots();

//    echo '<pre>';print_r($data['schedule']);die;
    return view('calendar', $data);

}

public function formdata()
{
    $model = new Admin_Model();
    $db = \Config\Database::connect();

    $timeSlot = $this->request->getPost('timeSlot');
list($slotId, $startTime) = explode('|', $timeSlot);

    $bookdate =$this->request->getPost('appointment_date');
    $wherecond = array('time_slot_id' => $timeSlot,'selected_date'=>$bookdate);

    $sloats =  $model->getsinglerow('book_slots', $wherecond);
    if(!empty($sloats)){
        session()->setFlashdata('error', 'This slot is already selected');
        $currentURL = current_url();
        return redirect()->to('add_schedule'); // Redirect back to the same URL  
      }else{
        $subjects = implode(', ', $this->request->getPost('subjects'));
            $data = [
                'fullname' => $this->request->getPost('fullname'),
                'gender' => $this->request->getPost('gender'),
                'marital_status' => $this->request->getPost('marital_status'),
                'contact_number' => $this->request->getPost('contact_number'),
                'email' => $this->request->getPost('email'),
                'appointmentType' => $this->request->getPost('appointmentType'),
                'appointmentOption' => $this->request->getPost('appointmentOption'),
                'source' => $this->request->getPost('source'),
                'friendName' => $this->request->getPost('friendName'),
                'timeSlot' => $slotId,
                'timestartslot' => $startTime,

                'appointment_date' => $this->request->getPost('selectedDate'),
                'dob' => $this->request->getPost('dob'),
                'tob' => $this->request->getPost('tob'),
                'Country' => $this->request->getPost('Country'),
                'State' => $this->request->getPost('State'),
                'City' => $this->request->getPost('City'),
                'twins' => $this->request->getPost('twins'),
                'amount' => '700',
                'transaction_id' => $this->request->getPost('transaction_id'),
                'subjects' => $subjects
            ];
            $lastInsertId = '';
            if($this->request->getPost('ap_id') == ''){
            $db->table('tbl_appointment')->insert($data);

            $lastInsertId = $db->insertID();

            $timeSlotId = $slotId;
            $selectedDate = $this->request->getPost('selectedDate');

            $model->insertslots($timeSlotId, $selectedDate , $lastInsertId);

            }else{
                $lastInsertId = $this->request->getPost('ap_id');

                $db->table('tbl_appointment')->where('ap_id', $this->request->getPost('ap_id'))->update($data);


                $timeSlotId = $this->request->getPost('timeSlot');
                list($slotId, $startTime) = explode('|', $timeSlotId);

            $selectedDate = $this->request->getPost('selectedDate');

            $model->updatedata($slotId, $selectedDate , $lastInsertId);

            }
            
            $timeSlot = $this->request->getPost('timeSlot');
            list($slotId, $startTime) = explode('|', $timeSlot);

            $wherecond = array('id' => $slotId);
            $timeSlotInfo = $model->getslotstime('tbl_slots', $wherecond);
            $timeSlot = $timeSlotInfo ? $timeSlotInfo->start_time : '';
            $appoint_data = $model->bookedslotsingle($lastInsertId);

            if (!empty($appoint_data)) {
                $senderMsg = view('emailform', [
                    'fullname' => $this->request->getPost('fullname'),
                    'appointmentType' => $this->request->getPost('appointmentType'),
                    'timeSlot' => $timeSlot,
                    'selectedDate' => $selectedDate,
                    'lastinsertid' => $lastInsertId,
                    'gender' => $appoint_data['gender'],
                    'marital_status' => $appoint_data['marital_status'],
                    'contact_number' => $appoint_data['contact_number'],
                    'appointmentOption' => $appoint_data['appointmentOption'],
                    'source' => $appoint_data['source'],
                    'friendName' => $appoint_data['friendName'],
                    'timeSlot' => $appoint_data['timeSlot'],
                    'timeSlot' => $appoint_data['timestartslot'],

                    'email' => $appoint_data['email'],
                    // 'appointment_date' => $appoint_data['selectedDate'],
                    'dob' => $appoint_data['dob'],
                    'tob' => $appoint_data['tob'],
                    'Country' => $appoint_data['country_name'],
                    'State' => $appoint_data['state_name'],
                    'City' => $appoint_data['city_name'],
                    'twins' => $appoint_data['twins'],
                    'transaction_id' => $appoint_data['transaction_id'],

                    'subjects' => $subjects
                ]);
          
            
            $receiverMsg = view('emailformforreciver', [
                'fullname' => $this->request->getPost('fullname'),
                'appointmentType' => $this->request->getPost('appointmentType'),
                'timeSlot' => $slotId,
                'selectedDate' => $selectedDate,
                'lastinsertid' => $lastInsertId
            ]);
            
            // Send email
            $useremail = $this->request->getPost('email');
            $ccEmails = ['mrunal@vedikastrologer.com'];
            
            $appointmentDateTime = date('d F Y', strtotime($selectedDate));
            
            $receiverSubject = 'Your Appointment is booked Successfully.';
            $senderSubject = 'You Have a New Appointment of ' . $this->request->getPost('fullname') . ' on ' . $appointmentDateTime . ' at ' . $timeSlot;
            
            sendConfirmationEmail($useremail, $ccEmails, $receiverSubject, $receiverMsg, $senderSubject, $senderMsg);
            
           

        }

        return view('sucess', [
            'fullname' => $this->request->getPost('fullname'),
            'appointmentType' => $this->request->getPost('appointmentType'),
            'timeSlot' => $timeSlot,
            'selectedDate' => $selectedDate,
            'lastinsertid' => $lastInsertId
        ]);
            

      }  
}
    public function getSlots()
{
    $selectedDate = $this->request->getPost('selected_date');
    $month = $this->request->getPost('month');
    $year = $this->request->getPost('year');
    $fullDate = $this->request->getPost('full_date');
    
    if (!$selectedDate || !$month || !$year) {
        return json_encode(['error' => 'Missing required data']);
    }
    $selectedDateString = $year . '-' . $month . '-' . $selectedDate;
    $dayName = date('l', strtotime($selectedDateString));
    $model = new Admin_Model();
    $slots = $model->getSlotsByDayName($dayName,$fullDate); 
    return json_encode($slots);
}
    public function updateStatus()
    {
       // print_r($_POST);die;
       $model = new Admin_Model();
        $slotId = $this->request->getPost('slotId');
        $status = $this->request->getPost('status');
        $model->updateSlotStatus($slotId,$status); 
        return redirect()->to('my_slots');
    }

    public function Add_student()
    {
        $model = new Admin_Model();

        $data['country'] = $model->get_country_name();
        $data['states'] = $model->get_states_name();
        $data['citys'] = $model->get_citys_name();
        return view('Add_student',$data);
    }
    public function Add_class()
    {
        return view('Add_class');
    }
    
    public function add_appointment()
{
    $model = new Admin_Model();
    $db = \Config\Database::connect();
  
    $subjects = implode(',', $this->request->getPost('subjects'));
    $conducted = $this->request->getPost('conducted') === 'Yes' ? 'Y' : null;

    $timeSlot = $this->request->getPost('slot');
list($slotId, $startTime) = explode('|', $timeSlot);
// echo "Slot ID: " . $slotId;
// echo "Start Time: " . $startTime;
//   echo "<pre>"; print_r($_POST);die;
    $data = [
           'fullname' => $this->request->getPost('fullname'),
            'gender' => $this->request->getPost('gender'),
            'marital_status' => $this->request->getPost('marital_status'),

            'email'=> $this->request->getPost('email'),
            'contact_number' => $this->request->getPost('contact_number'),
            'appointmentType' => $this->request->getPost('appointmentType'),
            'appointmentOption'=> $this->request->getPost('appointmentOption'),
            'source' => $this->request->getPost('source'),
            'friendName' => $this->request->getPost('friendName'),
            'timeSlot' => $slotId,
            'timestartslot' => $startTime,
            'appointment_date' =>$this->request->getPost('appointment_date'),
            'transaction_id' =>$this->request->getPost('transaction_id'),
            'dob' => $this->request->getPost('dob'),
            'tob' => $this->request->getPost('tob'),
            'Country' => $this->request->getPost('Country'),
            'State' => $this->request->getPost('State'),
            'City' => $this->request->getPost('City'),
            'twins' => $this->request->getPost('twins'),
            'amount' => '700',
            'conducted' => $conducted,
            'subjects' => $subjects
    ];
    
    $db->table('tbl_appointment')->insert($data);
    
    // Get the last inserted ID
    $appm_id = $db->insertID();

    // Update the newly inserted row with the appm_id
    // $db->table('tbl_appointment')->set('appm_id', $appm_id)->where('id', $appm_id)->update();
    $timeSlot = $this->request->getPost('slot');
    list($slotId, $startTime) = explode('|', $timeSlot);
   
    
    $timeSlotId = $slotId;
    $selectedDate = $this->request->getPost('appointment_date');
    $model->insertslotsses($appm_id,$timeSlotId, $selectedDate);
    // $lastInsertId = $db->insertID();


    $wherecond = array('id' => $slotId);
    $timeSlotInfo = $model->getslotstime('tbl_slots', $wherecond);

    // Extract time slot value from the result
    $timeSlot = $timeSlotInfo ? $timeSlotInfo->start_time : '';

    $appoint_data = $model->bookedslotsingle($appm_id);

if (!empty($appoint_data)) {
    $senderMsg = view('emailform', [
        'fullname' => $this->request->getPost('fullname'),
        'appointmentType' => $this->request->getPost('appointmentType'),
        'timeSlot' => $timeSlot,
        // 'timestartslot' => $startTime,

        'selectedDate' => $selectedDate,
        'lastinsertid' => $appm_id,
        'gender' => $appoint_data['gender'],
        'marital_status' => $appoint_data['marital_status'],
        'contact_number' => $appoint_data['contact_number'],
        'appointmentOption' => $appoint_data['appointmentOption'],
        'source' => $appoint_data['source'],
        'friendName' => $appoint_data['friendName'],
        // 'timeSlot' => $appoint_data['timeSlot'],
        'email' => $appoint_data['email'],
        // 'appointment_date' => $appoint_data['selectedDate'],
        'dob' => $appoint_data['dob'],
        'tob' => $appoint_data['tob'],
        'Country' => $appoint_data['country_name'],
        'State' => $appoint_data['state_name'],
        'City' => $appoint_data['city_name'],
        'twins' => $appoint_data['twins'],
        'subjects' => $subjects,
        'transaction_id' => $appoint_data['transaction_id'],

    ]);


    $receiverMsg = view('emailformforreciver', [
        'fullname' => $this->request->getPost('fullname'),
        'appointmentType' => $this->request->getPost('appointmentType'),
        'timeSlot' => $timeSlot,
        'selectedDate' => $selectedDate,
        'lastinsertid' => $appm_id
    ]);
    // Send email
    $useremail = $this->request->getPost('email');
    $subject = 'Your Appointment Booked';
    $ccEmails = ['mrunal@vedikastrologer.com']; 

    $appointmentDateTime = date('d F Y', strtotime($selectedDate));


    $receiverSubject = 'Your Appoinment is booked Succefully.';
    $senderSubject = 'New Appointment of ' . $this->request->getPost('fullname') . ' on this date & time ' . $appointmentDateTime . ' - ' . $timeSlot;

    sendConfirmationEmail($useremail, $ccEmails, $receiverSubject,  $receiverMsg, $senderSubject, $senderMsg, );
}
    return redirect()->to('add_appointment');
}
    public function getnewslots()
    {
        $model = new Admin_Model();
        $fullDate = $this->request->getPost('date');
    
        $dateTime = new \DateTime($fullDate);
        $dayName = $dateTime->format('l');
        
        $slots = $model->getSlotsday($dayName, $fullDate);
    
        // Return the slots data as JSON
        return json_encode($slots);
    }
    public function classForm()
    {
        // print_r($_POST);die;
        // Retrieve form data from POST request
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $contactNumber = $this->request->getPost('contact_number');
        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');
        $batch_name = $this->request->getPost('batch_name');
        $Certificatid = $this->request->getPost('Certificatid');
        $classDays = implode(',', $this->request->getPost('class_days')); // Convert array to comma-separated string
        $startTime = $this->request->getPost('start_time');
        $fees = $this->request->getPost('fees');
    
        // Now you have all the form data, you can use it to insert into your database table
        // Assuming you have a database connection setup, you can write your SQL query here
        $db = \Config\Database::connect();
        $builder = $db->table('classes'); // Replace 'your_table_name' with your actual table name
    
        // Build the query to insert data into the table
        $builder->insert([
            'name' => $name,
            'email' => $email,
            'contact_number' => $contactNumber,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'batch_name' =>$batch_name,
            'class_days' => $classDays,
            'start_time' => $startTime,
            'Certificatid' =>$Certificatid,
            'fees' => $fees
        ]);
    
        // Optionally, you can redirect the user to another page after form submission
        return redirect()->to('Add_class'); // Replace 'success_page' with your actual success page URL
    }

    public function logout()
    {
        $session = session();
        // session_destroy();
        $session->destroy();
        // print_r($_SESSION);die;
        return redirect()->to('/');
    }

    public function services()
    {
        echo view('services');
    }
    public function all_services()
    {
        $db = \Config\Database::connect();
        $data = [
            'service' => $this->request->getPost('service'),
            'name' => $this->request->getPost('name'),
            'mobile' => $this->request->getPost('mobile'),
            'email' => $this->request->getPost('email'),
            'service_date' => $this->request->getPost('service_date'),
            'amount' => $this->request->getPost('amount'),
            'transaction_id' => $this->request->getPost('transaction_id')
        ];
        $db->table('services')->insert($data);

        return redirect()->to('services');
    }
public function Appointment_reports()
{
    $model = new Admin_Model();
    $data['allapt'] =$model->getallAppointment();
    //  echo '<pre>';print_r($data['allapt']);die;
    echo view('Appointment_reports',$data);
}
public function services_Reports()
{
    $model = new Admin_Model();
    $data['allapt'] =$model->getallservicesReports();


    //   print_r($data['allapt']);die;
    echo view('services_Reports',$data);
}
public function Appointment_status()
{

    $db = \Config\Database::Connect();
    $appointment_ids = $this->request->getPost('appointment_ids');
    $conducted = $this->request->getPost('conducted');
    $model = new Admin_Model();
    $takestatus = $db->table('tbl_appointment')->where('ap_id', $appointment_ids);
    $takestatus->update(['conducted' => $conducted]);
    return redirect()->to('admin_dashboard');
}

public function freezeSlots()
{
    $model = new Admin_Model();

    $timeSlotId  = $this->request->getPost('time_slot_id');
    $selectedDate  = $this->request->getPost('selected_date');
    $model->insertslotss($timeSlotId, $selectedDate);
    return redirect()->to('my_slots');
}
public function Booked_Slots()
{
    $model = new Admin_Model();

    $data['bookedslots'] =$model->bookedslots();
//   echo '<pre>'; print_r($data['bookedslots']);die;
    echo view('Booked_Slots',$data);
}

public function reshedule()
{
//    print_r($_POST);die;
   $db = \Config\Database::connect();

   // Get data from POST request
   $slotId = $this->request->getPost('slot_id');
   $appmId = $this->request->getPost('appm_id');
   $appointment_date = $this->request->getPost('appointment_date');
   $selected_slot_id = $this->request->getPost('selected_slot_id');
   // Update book_slots table
   $db->table('book_slots')
       ->where('appm_id', $appmId)
       ->update(['time_slot_id' => $selected_slot_id,'selected_date' =>$appointment_date]);

   // Update tbl_appointment table
   $db->table('tbl_appointment')
       ->where('ap_id', $appmId)
       ->update(['timeSlot' => $selected_slot_id,'appointment_date'=>$appointment_date]);
   
   return redirect()->to('Booked_Slots');
}
public function cancelBooking()
{
    $db = \Config\Database::Connect();
    $slotId = $this->request->getPost('slot_id');

    // Delete row from book_slots table
    $db->table('book_slots')
             ->where('time_slot_id', $slotId)
             ->delete();

    // Delete row from tbl_appointment table
    $db->table('tbl_appointment')
             ->where('timeSlot', $slotId)
             ->delete();

    // Redirect to some success page or reload the same page
    return redirect()->to('Booked_Slots'); // Change 'success-page' to your actual success page URL
}
public function Add_user()
{
    $model = new Admin_Model();

    $data['getUser'] =$model->getUser();
    // echo '<pre>'; print_r($data['getUser']);die;
    echo view('Add_user',$data);
}

public function user_list()
{
    $model = new Admin_Model();

    $data['getUser'] =$model->getUser();
    // echo '<pre>'; print_r($data['getUser']);die;
    echo view('user_list',$data);
}
public function user_create()
{
  // print_r($_POST) ;die;
   $db = \Config\Database::connect();
   $data = [
      
       'name' => $this->request->getPost('name'),
       'password' => $this->request->getPost('password'),
       'email' => $this->request->getPost('email'),
      
   ];
   $db->table('tbl_user')->insert($data);

   return redirect()->to('Add_user');
}
public function delete_user()
    {
        $request = $this->request;
        $userId = $request->getPost('userId');

        $model = new Admin_Model();
        $deleted = $model->deleteUser($userId); // Implement deleteUser method in your model

        $response = [
            'success' => $deleted,
            'message' => $deleted ? 'User deleted successfully' : 'Failed to delete user'
        ];

        return redirect()->to('Add_user');
    }
    public function Income()
    {
        $model = new Admin_Model();
        $data['appoincome'] =$model->getappoincome();
        $data['servicesincome']=$model->servicesincome();
        $data['getallclass'] =$model->getallclass();
        // echo '<pre>';print_r($data['getallclass']);die;
        echo view('allIncome',$data);
    }
    public function getallincome()
    {
        $model = new Admin_Model();
        $data['appoincome'] =$model->getappoincome();
        $data['servicesincome']=$model->servicesincome();
        $data['getallclass'] =$model->getallclass();
        // echo '<pre>';print_r($data['getallclass']);die;
        echo view('Income',$data);
    }
    public function Students()
    {
        $model = new Admin_Model();
        $data['Students']=$model->getStudents();
        // echo '<pre>';print_r($data['Students']);die;
        echo view('Studentslist',$data);
    }
    public function add_fees()
    {
        $model = new Admin_Model();
        $student_id = $this->request->getPost('student_id');
        $paid_amount = $this->request->getPost('Paid_Ammount');
        $existing_paid_amount = $model->db->table('classes')
            ->select('Paid_Ammount')
            ->where('id', $student_id)
            ->get()
            ->getRowArray()['Paid_Ammount'];
        if ($existing_paid_amount !== null) {
            $paid_amount = $existing_paid_amount . ',' . $paid_amount;
        }
        $data = ['Paid_Ammount' => $paid_amount];
        $where = ['id' => $student_id];
        $model->db->table('classes')->where($where)->update($data);
        return redirect()->to('Students');
    }
    public function complete_class()
    {  
         $model = new Admin_Model();
        $student_id = $this->request->getPost('student_id');
        $paidstatus = $this->request->getPost('completion_status'); 
        $data = [
            'completion_status' => $paidstatus
        ];
        $where = ['id' => $student_id];
        $model->db->table('classes')->where($where)->update($data);
        return redirect()->to('Students');
    }
    public function sucess()
    {
        echo view('sucess');
    }
    public function emailform(){
        echo view('emailform'); 
    }


    public function get_state_name_location(){
        $model = new Admin_Model();
        $country_id = $this->request->getVar('country_id');
        // echo "hiii";
        // echo $country_id; exit();

		$model->get_state_name_location($country_id);
	}

    public function get_city_name_location(){

        $model = new Admin_Model();
        $state_id = $this->request->getVar('state_id');
   
		$model->get_city_name_location($state_id);
	}

    public function get_user_details()
    {
        $userId = $this->request->getPost('userId');
        $model = new Admin_Model();
        $wherecond = array('id ' => $userId);
        $user =  $model->getsinglerow('tbl_user', $wherecond);
        if ($user) {
            return $this->response->setJSON($user);
        } else {
            return $this->response->setJSON(['error' => 'User not found']);
        }
    }
    public function update_user()
    {
       // print_r($_POST);die;
        $userId = $this->request->getPost('userId');
        $editName = $this->request->getPost('editName');
        $editEmail = $this->request->getPost('editEmail');
        $Password = $this->request->getPost('editPassword');
        // Get the database connection instance
        $db = \Config\Database::connect();
    
        // Check if the user exists
        $builder = $db->table('tbl_user');
        $user = $builder->getWhere(['id' => $userId])->getRow();
    
        if (!$user) {
            return $this->response->setJSON(['error' => 'User not found']);
        }
    
        // Prepare data for update
        $data = [
            'name' => $editName,
            'email' => $editEmail,
            'Password' => $Password
        ];
    
        // Perform the update operation
        $builder->where('id', $userId);
        $builder->update($data);

        return redirect()->to('Add_user');
        
    }

    public function emailformforreciver(){
        echo view('emailformforreciver'); 
    }

  public function Services_List()
  {

    $model = new Admin_Model();
    $wherecond = array('is_deleted' => 'N');
    $data['services'] =  $model->getalldata('services', $wherecond);
    echo view('Services_List',$data);
  }
  public function cancelservices()
  {
      
      $db = \Config\Database::Connect();
      $slotId = $this->request->getPost('slot_id');
    //   print_r($slotId);die;
      // Delete row from book_slots table
      $db->table('services')
               ->where('id', $slotId)
               ->delete();
  
     
      return redirect()->to('Services_List'); 
  }

public function preparing_kundali()
{
    $userID = session('user_id');
    $model = new Admin_Model();
  
    $data['country'] = $model->get_country_name();
    $data['states'] = $model->get_states_name();
    $data['citys'] = $model->get_citys_name();
    echo view('preparing_kundali',$data);
}

public function kundali()
{
//    print_r($_POST);die;
$model = new Admin_Model();
$db = \Config\Database::connect();
$data = [
    'contact_person_name' => $this->request->getPost('contact_person_name'),
    'contact_number' => $this->request->getPost('contact_number'),
    'full_name' => $this->request->getPost('full_name'),
    'email_address' => $this->request->getPost('email_address'),
    'name_in_devanagari' => $this->request->getPost('name_in_devanagari'),
    'dob' => $this->request->getPost('dob'),
    'gender' => $this->request->getPost('gender'),
    'tob' => $this->request->getPost('tob'),
    'Country' => $this->request->getPost('Country'),
    'State' => $this->request->getPost('State'),
    'City' => $this->request->getPost('City'),
    'fathers_full_name' => $this->request->getPost('fathers_full_name'),
    'mothers_name' => $this->request->getPost('mothers_name'),
    'mothers_maiden_surname' => $this->request->getPost('mothers_maiden_surname'),
    'religion' => $this->request->getPost('religion'),
    'caste' => $this->request->getPost('caste'),
    'sub_caste' => $this->request->getPost('sub_caste'),
    'gotra' => $this->request->getPost('gotra'),
    'address_on_kundali' => $this->request->getPost('address_on_kundali'),
    'source' => $this->request->getPost('source'),
    'friendName' => $this->request->getPost('friendName'),
    'language' => $this->request->getPost('language'),
    'transaction_id' => $this->request->getPost('transaction_id')
];

$db->table('kundali')->insert($data);

$country = $this->request->getPost('Country');
$state = $this->request->getPost('State');
$city = $this->request->getPost('City');

$wherecond = array('id' => $country);
$countryData = $model->getalldata('countries', $wherecond);
$countryName = !empty($countryData) ? $countryData[0]->name : '';

// Fetch state name
$wherecond = array('id' => $state);
$stateData = $model->getalldata('states', $wherecond);
$stateName = !empty($stateData) ? $stateData[0]->name : '';

// Fetch city name
$wherecond = array('id' => $city);
$cityData = $model->getalldata('cities', $wherecond);
$cityName = !empty($cityData) ? $cityData[0]->name : '';

$receiverMsg = view('kundaliemail', [
    'contact_person_name' => $this->request->getPost('contact_person_name'),
    'contact_number' => $this->request->getPost('contact_number'),
    'full_name' => $this->request->getPost('full_name'),
    'email_address' => $this->request->getPost('email_address'),
    'name_in_devanagari' => $this->request->getPost('name_in_devanagari'),
    'dob' => $this->request->getPost('dob'),
    'gender' => $this->request->getPost('gender'),
    'tob' => $this->request->getPost('tob'),
    'Country' =>  $countryName,
    'State'  =>   $stateName,
    'City'    =>   $cityName,
   
    'fathers_full_name' => $this->request->getPost('fathers_full_name'),
    'mothers_name' => $this->request->getPost('mothers_name'),
    'mothers_maiden_surname' => $this->request->getPost('mothers_maiden_surname'),
    'religion' => $this->request->getPost('religion'),
    'caste' => $this->request->getPost('caste'),
    'sub_caste' => $this->request->getPost('sub_caste'),
    'gotra' => $this->request->getPost('gotra'),
    'address_on_kundali' => $this->request->getPost('address_on_kundali'),
    'source' => $this->request->getPost('source'),
    'friendName' => $this->request->getPost('friendName'),
    'language' => $this->request->getPost('language'),
    'transaction_id' => $this->request->getPost('transaction_id')
]);
// print_r($receiverMsg);die;
// $email ='mrunal@vedikastrologer.com';
$email ='siddheshkadgemitech@gmail.com';
// $subject = 'Your Appointment Booked';
$ccEmails = ['mrunal@vedikastrologer.com']; 
$receiverSubject = 'New Kundali Application.';
$senderSubject = 'New Application for kundli';

sendConfirmationEmail($email, $ccEmails, $receiverSubject, $receiverMsg,$senderSubject,);

return redirect()->to('preparing_kundali'); 
}

public function kundaliemail(){
    echo view('kundaliemail'); 
}
}
