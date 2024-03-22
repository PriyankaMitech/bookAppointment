<?php

namespace App\Controllers;
use App\Models\Admin_Model;


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
        $model = new Admin_Model();
        $db = \Config\Database::connect();
        // print_r($_POST);die;
        $subjects = implode(',', $this->request->getPost('subjects'));

        // Prepare data array for database insertion
        $data = [
            'fullname' => $this->request->getPost('fullname'),
            'gender' => $this->request->getPost('gender'),
            'contact_number' => $this->request->getPost('contact_number'),
            'appointmentType' => $this->request->getPost('appointmentType'),
            'appointmentOption'=> $this->request->getPost('appointmentOption'),
            'source' => $this->request->getPost('source'),
            'friendName' => $this->request->getPost('friendName'),
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

    public function getSlots()
    {
        // Get the day number from the POST data
        $dayNumber = $this->request->getPost('day_name');
    
        // Get the current year and month
        $currentYear = date('Y');
        $currentMonth = date('m');
    
        // Construct the date string for the current month
        $selectedDate = $currentYear . '-' . $currentMonth . '-' . $dayNumber;
    
        // Parse the date string to obtain the day name
        $dayName = date('l', strtotime($selectedDate));
    
        // Instantiate the model
        $model = new Admin_Model();
    
        // Call the model method to retrieve slots by day name
        $slots = $model->getSlotsByDayName($dayName); 

      
        // Initialize the response data
      
    }
}
