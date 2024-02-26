<?php

namespace App\Controllers;
use App\Models\Admin_Model;


class Admin_Controller extends BaseController
{
    public function index(): string
    {
        return view('login');
    }
    // public function login()
    // {
 
    //     $model = new Admin_Model();
    //     $where = ['email' => $this->request->getVar('email'),
    //                'password' => $this->request->getVar('password')      
    //             ];
	// 	$result = $model->checkCredentials($where);
        
    //     if($result != ''){
    //         return redirect('admin_dashboard');
    //     }else if($result == null){
    //     echo "hiii"; 
    //     }
 
    // }
    public function login()
{
    $model = new Admin_Model();
    $where = [
        'email' => $this->request->getVar('email'),
        'password' => $this->request->getVar('password')      
    ];
    $result = $model->checkCredentials($where);
    
    if($result != '') {
        $userData = [
            'id' => $result['id'], 
            'name' => $result['name'], 
        ];
        session()->set('userData', $userData);
        return redirect('admin_dashboard');
    } else {
        echo "hiii";
    }
}

    public function admin_dashboard(){
        return view('admin_dashboard');

    }
    public function giveslots()
    {
        $model = new Admin_Model();
        $sessionData = session()->get('userData');
        $registerId = $sessionData['id'];
        $wherecond = array('id' => $registerId);

        $data['schedule_data'] =  $model->getalldata('schedule_list', $wherecond);
    // print_r($data['schedule_data']);die;
        return view('giveslots',$data);
    }
    public function save_schedule()
    {
        
    }
}
