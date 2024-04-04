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
            echo "Invalid credentials";
        }
    }
    public function admin_dashboard(){
       
        $model = new Admin_Model();
      $data['Appt'] =$model->getallapp();
      $data['curruntmonthappt']=$model->getcurruntmonthapt();
      $data['allamount']=$model->allamount();
      $data['todayappoinments']=$model->todayAppointments();
    //  echo '<pre>';print_r($data['todayappoinments']);die;
        return view('admin_dashboard',$data);

    }

    public function add_schedule()
    {
         $userID = session('user_id');
//   print_r($userID);die;
        $model = new Admin_Model();
 
        $wherecond = array('user_id' => $userID);

        $data['schedule_data'] =  $model->getalldata('tbl_schedule', $wherecond);

   //echo '<pre>';print_r($data['schedule_data']);die;
        return view('add_schedule',$data);
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
        $userID = session('user_id');
        $model = new Admin_Model();
        $slots = $model->getallslots($userID);
        return view('my_slots', ['slots' => $slots]);
    }
    public function add_workinghour(){
        $userID = session('user_id');

        $model = new Admin_Model();
 
        $wherecond = array('user_id' => $userID,);

        $data['schedule'] =  $model->getalldata('tbl_schedule', $wherecond);


        return view('add_workinghour', $data);

    }
    // public function set_workinghour()
    // {
    //     $userID = session('user_id');
    //     $days = $this->request->getVar('day[]');
    //     $startTimes = $this->request->getVar('start_time[]');
    //     $endTimes = $this->request->getVar('end_time[]');


    //     $currentYear = date('Y');

    //     // Create a common start and end date for the entire year
    //     $commonStartDate = $currentYear . '-01-01';
    //     $commonEndDate = $currentYear . '-12-31';
        
    //     // Validate and modify date format
    //     $commonStartDate = date('Y-m-d', strtotime($commonStartDate));
    //     $commonEndDate = date('Y-m-d', strtotime($commonEndDate));
        
    //     $db = \Config\Database::Connect();
    //     $insertedSchedules = 0;
    //     $db->table('tbl_schedule')->where('user_id', $userID)->delete();

    //     foreach ($days as $index => $day) {
    //         $data = [
    //             'user_id' => $userID,
    //             'day' => $day,
    //             'start_date' => $commonStartDate,
    //             'end_date' => $commonEndDate,
    //             'start_time' => $startTimes[$index],
    //             'end_time' => $endTimes[$index],
    //             'created_on' => date('Y-m-d H:i:s'),
    //         ];
    
    //         if ($this->request->getVar('id') == "") {
    //             $add_data = $db->table('tbl_schedule');
    //             $add_data->insert($data);
    //             $insertedSchedules++;
    //         } else {
    //             $update_data = $db->table('tbl_schedule')->where('id', $this->request->getVar('id'));
    //             $update_data->update($data);
    //         }
    //     }
    
    //     if ($insertedSchedules > 0) {
    //         session()->setFlashdata('success', 'Schedules added successfully.');
    //     } else {
    //         session()->setFlashdata('success', 'Schedules updated successfully.');
    //     }
    
    //     return redirect()->to('add_workinghour');
    // }
    public function set_workinghour()
{
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

    $db->table('tbl_schedule')->where('user_id', $userID)->delete();

    foreach ($days as $index => $day) {
        $data = [
            'user_id' => $userID,
            'day' => $day,
            'start_date' => $commonStartDate,
            'end_date' => $commonEndDate,
            'start_time' => $startTimes[$index],
            'end_time' => $endTimes[$index],
            'created_on' => date('Y-m-d H:i:s'),
        ];

        if ($this->request->getVar('id') == "") {
            $add_data = $db->table('tbl_schedule');
            $add_data->insert($data);
            $insertedSchedules++;
        } else {
            $update_data = $db->table('tbl_schedule')->where('id', $this->request->getVar('id'));
            $update_data->update($data);
        }

        // Convert start and end times to 45-minute increments and insert into tbl_slots
        $start = strtotime($startTimes[$index]);
        $end = strtotime($endTimes[$index]);

        while ($start < $end) {
            $slotEndTime = date('H:i', strtotime('+45 minutes', $start));
            if ($slotEndTime > date('H:i', $end)) {
                $slotEndTime = date('H:i', $end);
            }

            // Insert into tbl_slots
            $slotData = [
                'user_id' => $userID,
                'day' => $day,
                'start_time' => date('H:i', $start),
                'end_time' => $slotEndTime,
                'created_on' => date('Y-m-d H:i:s'),
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

    public function deleteworkinghour(){
        $db = \Config\Database::Connect();

        $currentURL = current_url();

        $segments = explode('/', $currentURL);
    
         $tbl_name = isset($segments[5]) ? $segments[5] : null;
         $day = isset($segments[6]) ? $segments[6] : null;
         $id = isset($segments[7]) ? $segments[7] : null;

        $update_data = $db->table($tbl_name)->where('user_id', $id)->where('day', $day);
        $update_data->update(['is_deleted' => 'Y']);

        session()->setFlashdata('success', 'Data Deleted successfully.');
        return redirect()->to('add_workinghour');
    }

    public function calendar(){

        $userID = session('user_id');

        $model = new Admin_Model();
 
        $wherecond = array('user_id' => $userID, 'is_deleted' => 'N',  'start_time !=' => '00:00:00',
        'end_time !=' => '00:00:00');

        $data['schedule'] =  $model->getalldata('tbl_schedule', $wherecond);
//  echo '<pre>';print_r($data['schedule']);die;
        return view('calendar', $data);

    }

    public function formdata()
{
   // print_r($_POST);die;
    $model = new Admin_Model();
    $db = \Config\Database::connect();
    $timeSlotId = $this->request->getPost('timeSlot');
    $selectedDate = $this->request->getPost('selectedDate');
    $model->insertslots($timeSlotId, $selectedDate);
    $subjects = implode(',', $this->request->getPost('subjects'));
    $data = [
        'fullname' => $this->request->getPost('fullname'),
        'gender' => $this->request->getPost('gender'),
        'contact_number' => $this->request->getPost('contact_number'),
        'appointmentType' => $this->request->getPost('appointmentType'),
        'appointmentOption'=> $this->request->getPost('appointmentOption'),
        'source' => $this->request->getPost('source'),
        'friendName' => $this->request->getPost('friendName'),
        'timeSlot' => $this->request->getPost('timeSlot'),
        'appointment_date' => $selectedDate,

        'dob' => $this->request->getPost('dob'),
        'tob' => $this->request->getPost('tob'),
        'Country' => $this->request->getPost('Country'),
        'State' => $this->request->getPost('State'),
        'City' => $this->request->getPost('City'),
        'twins' => $this->request->getPost('twins'),
        'amount' => '700',
        'subjects' => $subjects
    ];
    $db->table('tbl_appointment')->insert($data);

    return redirect()->to('add_schedule');
}

// public function formdata()
// {
//     $model = new Admin_Model();
//     $db = \Config\Database::connect();

//     // Update the time slot status
//     $timeSlotId = $this->request->getPost('timeSlot');
//     $model->updateSlotStatus($timeSlotId);

//     // Prepare subjects as comma-separated string
//     $subjects = implode(', ', $this->request->getPost('subjects'));

//     // Prepare data array for database insertion
//     $data = [
//         'fullname' => $this->request->getPost('fullname'),
//         'gender' => $this->request->getPost('gender'),
//         'contact_number' => $this->request->getPost('contact_number'),
//         'appointmentType' => $this->request->getPost('appointmentType'),
//         'appointmentOption' => $this->request->getPost('appointmentOption'),
//         'source' => $this->request->getPost('source'),
//         'friendName' => $this->request->getPost('friendName'),
//         'timeSlot' => $this->request->getPost('timeSlot'),
//         'dob' => $this->request->getPost('dob'),
//         'tob' => $this->request->getPost('tob'),
//         'Country' => $this->request->getPost('Country'),
//         'State' => $this->request->getPost('State'),
//         'City' => $this->request->getPost('City'),
//         'twins' => $this->request->getPost('twins'),
//         'amount' => '700',
//         'subjects' => $subjects
//     ];

//     // Insert data into tbl_appointment table
//     $db->table('tbl_appointment')->insert($data);

//     // Prepare email content
//     $emailContent = "Appointment Details:\n";
//     foreach ($data as $key => $value) {
//         $emailContent .= ucfirst($key) . ": $value\n";
//     }

//     // Send email
//     $email = 'siddheshkadge214@gmail.com';
//     $subject = 'New Appointment Request';
//     $ccEmails = []; // Add CC emails if needed
//     sendConfirmationEmail($email, $ccEmails, $subject, $emailContent);

//     return redirect()->to('add_schedule');
// }

    // public function getSlots()
    // {

    // $dayNumber = $this->request->getPost('day_name');
    // $currentYear = date('Y');
    // $currentMonth = date('m');
    // $selectedDate = $currentYear . '-' . $currentMonth . '-' . $dayNumber;

    // $dayName = date('l', strtotime($selectedDate));
    // $model = new Admin_Model();
    // $slots = $model->getSlotsByDayName($dayName); 
    // return json_encode($slots);

    // }


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
        return view('Add_student');
    }
    public function Add_class()
    {
        return view('Add_class');
    }
    public function add_appointment()
    {
      //  print_r($_POST);die;
        $model = new Admin_Model();
        $db = \Config\Database::connect();
        $timeSlotId = $this->request->getPost('slot');
        $selectedDate = $this->request->getPost('appointment_date');
        $model->insertslots($timeSlotId, $selectedDate);
        $subjects = implode(',', $this->request->getPost('subjects'));
        $data = [
            'fullname' => $this->request->getPost('fullname'),
            'gender' => $this->request->getPost('gender'),
            'contact_number' => $this->request->getPost('contact_number'),
            'appointmentType' => $this->request->getPost('appointmentType'),
            'appointmentOption'=> $this->request->getPost('appointmentOption'),
            'source' => $this->request->getPost('source'),
            'friendName' => $this->request->getPost('friendName'),
            'timeSlot' => $this->request->getPost('slot'),
            'appointment_date' =>$this->request->getPost('appointment_date'),
    
            'dob' => $this->request->getPost('dob'),
            'tob' => $this->request->getPost('tob'),
            'Country' => $this->request->getPost('Country'),
            'State' => $this->request->getPost('State'),
            'City' => $this->request->getPost('City'),
            'twins' => $this->request->getPost('twins'),
            'amount' => '700',
            'subjects' => $subjects
        ];
        $db->table('tbl_appointment')->insert($data);
    
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
            'class_days' => $classDays,
            'start_time' => $startTime,
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

}
