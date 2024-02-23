<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin_Model extends Model
{
    protected $table = 'tbl_user';
    public function checkCredentials($where)
    {
        
        // echo 'Table: ' . $table . '<br>';
        // echo 'Where: ';
        // print_r($where);
        // exit();

        $user = $this->table($this->table) // Set the table explicitly
                     ->where($where)
                     ->first();
;
             

        if ($user) {
            // Verify the password
            if (password_verify($where['password'], $user['password'])) {
                return $user; // Login successful
            }
        }

        return null; // Login failed
    }
}

