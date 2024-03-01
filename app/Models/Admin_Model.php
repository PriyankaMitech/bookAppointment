<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin_Model extends Model
{
    protected $table = 'tbl_user';
    public function checkCredentials($where)
    {
        $user = $this->table($this->table) // Set the table explicitly
                     ->where($where)
                     ->first();
        if ($user) {
                return $user; // Login successful  
        }
        return null; // Login failed
    }
    public function getalldata($table1, $wherecond)
    {
        $result = $this->db->table($table1)->where($wherecond)->get()->getResult();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}

