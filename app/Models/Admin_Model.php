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
  public function getallapp(){

    $count = $this->db->table('tbl_appointment')->countAll();

    return $count;
    
  }
  public function getcurruntmonthapt()
  {
      // Get the current month and year
      $currentMonth = date('m');
      $currentYear = date('Y');

      // Construct the SQL query to fetch records for the current month based on the created_at column
      $query = $this->db->table('tbl_appointment')
          ->where('MONTH(created_at)', $currentMonth)
          ->where('YEAR(created_at)', $currentYear)
          ->get();

      // Return the result set
      return $query->getResult();
  }
  public function allamount()
  {
      // Construct the SQL query to fetch the sum of amounts
      $query = $this->db->table('tbl_appointment')
          ->selectSum('amount')
          ->get();
      return $query->getRow()->amount;
  }

  public function getallslots($userID)
  {
      $db = \Config\Database::connect();
      return $db->table('tbl_slots')
          ->where('user_id', $userID)
          ->get()
          ->getResult();
  }

//   public function getSlotsByDayName($dayName)
//   {
//       return $this->db->table('tbl_slots')
//                       ->where('day', $dayName)
//                       ->where('active_status', 'Y')
//                       ->get()
//                       ->getResultArray();
//   }

public function getSlotsByDayName($dayName)
{
    $results = $this->db->table('tbl_slots')
                        ->where('day', $dayName)
                        ->where('active_status', 'Y')
                        ->get()
                        ->getResultArray();

                        // echo"<pre>";print_r($results);exit();



    return $results;
}
}

