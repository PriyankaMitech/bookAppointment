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

        return view('admin_dashboard');

    }

    public function add_schedule()
    {

         $userID = session('user_id');

        $model = new Admin_Model();
 
        $wherecond = array('user_id' => $userID);

        $data['schedule'] =  $model->getalldata('tbl_schedule', $wherecond);


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
    public function add_workinghour(){
        $userID = session('user_id');

        $model = new Admin_Model();
 
        $wherecond = array('user_id' => $userID,);

        $data['schedule'] =  $model->getalldata('tbl_schedule', $wherecond);


        return view('add_workinghour', $data);

    }
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
        
        $db = \Config\Database::Connect();
        $insertedSchedules = 0;
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
        }
    
        if ($insertedSchedules > 0) {
            session()->setFlashdata('success', 'Schedules added successfully.');
        } else {
            session()->setFlashdata('success', 'Schedules updated successfully.');
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

    
}
