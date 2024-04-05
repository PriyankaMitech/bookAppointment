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
      $currentYear = date('Y');
      $currentMonth = date('m');
      if ($currentMonth >= 4) {
          $financialYearStart = $currentYear . '-04-01';
          $financialYearEnd = ($currentYear + 1) . '-03-31';
      } else {
          $financialYearStart = ($currentYear - 1) . '-04-01';
          $financialYearEnd = $currentYear . '-03-31';
      }
  
      $appointmentAmount = $this->db->table('tbl_appointment')
          ->selectSum('amount')
          ->where('created_at >=', $financialYearStart)
          ->where('created_at <=', $financialYearEnd)
          ->where('conducted', 'Y') // Add this line to filter by conducted column
          ->get()->getRow()->amount;
      
      $servicesAmount = $this->db->table('services')
          ->selectSum('amount')
          ->where('created_at >=', $financialYearStart)
          ->where('created_at <=', $financialYearEnd)
          ->get()->getRow()->amount;
      
      $classesAmount = $this->db->table('classes')
          ->selectSum('fees')
          ->where('created_at >=', $financialYearStart)
          ->where('created_at <=', $financialYearEnd)
          ->get()->getRow()->fees;
  
      return [
          'appointmentAmount' => $appointmentAmount,
          'servicesAmount' => $servicesAmount,
          'classesamount' => $classesAmount
      ];
  }

  public function getallslots($userID)
  {
      $db = \Config\Database::connect();
      return $db->table('tbl_slots')
          ->where('user_id', $userID)
          ->get()
          ->getResult();
  }

  public function getSlotsByDayName($dayName, $fullDate)
{
    $subquery = $this->db->table('book_slots')
                        ->select('time_slot_id')
                        ->where('selected_date', $fullDate)
                        ->get()
                        ->getResultArray();
    $timeSlotIds = array_column($subquery, 'time_slot_id');
    $query = $this->db->table('tbl_slots')
                     ->where('day', $dayName)
                     ->where('active_status', 'Y');
    if (!empty($timeSlotIds)) {
        $query->whereNotIn('id', $timeSlotIds);
    }
    $results = $query->get()->getResultArray();
    return $results;
}

public function updateSlotStatus($slotId, $status)
{
    $db = \Config\Database::connect();

    // Update the active_status of the time slot with the provided ID
    $builder = $db->table('tbl_slots');
    $builder->where('id', $slotId);
    $builder->update(['active_status' => $status]);
}
public function insertslots($timeSlotId, $selectedDate)
{
    $data = [
        'time_slot_id' => $timeSlotId,
        'selected_date' => $selectedDate,
    ];
    $this->db->table('book_slots')->insert($data); 
}
public function todayAppointments()
{
    $today = date('Y-m-d');

    // Query to fetch appointments with timeSlot
    $query = $this->db->table('tbl_appointment')
        ->where('appointment_date', $today)
        ->get();

    // Fetch the result
    $appointments = $query->getResultArray();

    // Fetch additional data from tbl_slots table
    foreach ($appointments as &$appointment) {
        $timeSlot = $appointment['timeSlot'];
        $bookSlotQuery = $this->db->table('tbl_slots')
            ->where('id', $timeSlot)
            ->get();

        $bookSlots = $bookSlotQuery->getResultArray();
        $appointment['bookSlotData'] = $bookSlots;
    }

    // Return the appointments
    return $appointments;
}

public function getSlotsday($dayName,$fullDate)
{
    // Fetch time_slot_ids from book_slots table for the given selected_date
    $subquery = $this->db->table('book_slots')
                        ->select('time_slot_id')
                        ->where('selected_date',$fullDate)
                        ->get()
                        ->getResultArray();

    // Extract the time_slot_ids from the subquery result
    $timeSlotIds = array_column($subquery, 'time_slot_id');

    // Fetch slots from tbl_slots excluding those with matching time_slot_ids
    $query = $this->db->table('tbl_slots')
                     ->where('day', $dayName)
                     ->where('active_status', 'Y');

    // Check if $timeSlotIds array is not empty
    if (!empty($timeSlotIds)) {
        $query->whereNotIn('id', $timeSlotIds);
    }

    $results = $query->get()->getResultArray();
    return $results;
}
public function getslotstime($table1, $wherecond)
{
    $result = $this->db->table($table1)->where($wherecond)->get()->getRow(); // Change get()->getResult() to get()->getRow()

    return $result ?? false; // Use null coalescing operator to handle the case when $result is null
}
public function getAllAppointment() {
    // Retrieve all appointment data
    $appointments = $this->db->table('tbl_appointment')->get()->getResultArray();
    
    return $appointments;
}
public function getallservicesReports()
{
    $appointments = $this->db->table('services')->get()->getResultArray();
    
    return $appointments;
}

}

