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
        $where = ['email' => $this->request->getVar('email'),
                   'password' => $this->request->getVar('password')      
                ];
		$result = $model->checkCredentials($where);

        if($result == 'null'){
            echo "hiii";
        }else{
       return redirect('admin_dashboard');

        }

		
		

 
    }

    public function admin_dashboard(){
        return view('admin_dashboard');

    }
}
