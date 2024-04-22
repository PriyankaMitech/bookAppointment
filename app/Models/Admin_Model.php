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
//   public function allamount()
//   {
//       $currentYear = date('Y');
//       $currentMonth = date('m');
//       if ($currentMonth >= 4) {
//           $financialYearStart = $currentYear . '-04-01';
//           $financialYearEnd = ($currentYear + 1) . '-03-31';
//       } else {
//           $financialYearStart = ($currentYear - 1) . '-04-01';
//           $financialYearEnd = $currentYear . '-03-31';
//       }
  
//       $appointmentAmount = $this->db->table('tbl_appointment')
//           ->selectSum('amount')
//           ->where('created_at >=', $financialYearStart)
//           ->where('created_at <=', $financialYearEnd)
//           ->where('conducted', 'Y') // Add this line to filter by conducted column
//           ->get()->getRow()->amount;
      
//       $servicesAmount = $this->db->table('services')
//           ->selectSum('amount')
//           ->where('created_at >=', $financialYearStart)
//           ->where('created_at <=', $financialYearEnd)
//           ->get()->getRow()->amount;
      
//       $classesAmount = $this->db->table('classes')
//           ->selectSum('Paid_Ammount')
//           ->where('created_at >=', $financialYearStart)
//           ->where('created_at <=', $financialYearEnd)
//           ->get()->getRow()->Paid_Ammount;
  
//       return [
//           'appointmentAmount' => $appointmentAmount,
//           'servicesAmount' => $servicesAmount,
//           'classesamount' => $classesAmount
//       ];
//   }
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

    // Fetch records from the classes table
    $classesRecords = $this->db->table('classes')
        ->where('created_at >=', $financialYearStart)
        ->where('created_at <=', $financialYearEnd)
        ->get()->getResult();

    // Initialize total amount variable
    $totalClassesAmount = 0;

    // Loop through each record
    foreach ($classesRecords as $record) {
        // Split the Paid_Ammount string by comma and sum the values
        $amounts = explode(',', $record->Paid_Ammount);
        foreach ($amounts as $amount) {
            // Remove any non-numeric characters and add to total
            $amount = preg_replace('/[^0-9]/', '', $amount);
            $totalClassesAmount += (int)$amount; // Convert string to integer
        }
    }

    // Return the total classes amount along with other amounts
    return [
        'appointmentAmount' => $this->db->table('tbl_appointment')
            ->selectSum('amount')
            ->where('created_at >=', $financialYearStart)
            ->where('created_at <=', $financialYearEnd)
            ->where('conducted', 'Y')
            ->get()->getRow()->amount,
        'servicesAmount' => $this->db->table('services')
            ->selectSum('amount')
            ->where('created_at >=', $financialYearStart)
            ->where('created_at <=', $financialYearEnd)
            ->get()->getRow()->amount,
        'classesAmount' => $totalClassesAmount
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
public function insertslots($timeSlotId, $selectedDate,$lastInsertId)
{
    $data = [
        'time_slot_id' => $timeSlotId,
        'selected_date' => $selectedDate,
        'appm_id' => $lastInsertId,
    ];
    $this->db->table('book_slots')->insert($data); 
}
public function insertslotss($timeSlotId, $selectedDate)
{
    $data = [
        'time_slot_id' => $timeSlotId,
        'selected_date' => $selectedDate,
       
    ];
    $this->db->table('book_slots')->insert($data); 
}
public function insertslotsses($appm_id,$timeSlotId, $selectedDate)
{
    $data = [
        'appm_id' => $appm_id,
        'time_slot_id' => $timeSlotId,
        'selected_date' => $selectedDate,
       
    ];
    $this->db->table('book_slots')->insert($data); 
}
public function updatedata($timeSlotId, $selectedDate,$lastInsertId)
{
    $data = [
        'time_slot_id' => $timeSlotId,
        'selected_date' => $selectedDate,
    ];
    $this->db->table('book_slots')->where('appm_id', $lastInsertId)->update($data); 
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
public function getallAppointment()
{
    return $this->db->table('tbl_appointment')->where('conducted', 'Y')->get()->getResultArray();
}

public function getallservicesReports()
{
    $appointments = $this->db->table('services')->get()->getResultArray();
    
    return $appointments;
}
public function getallclass()
{
    $appointments = $this->db->table('classes')->get()->getResultArray();
    
    return $appointments;
}
public function getcalenderallslots()
{
    // Fetch the time_slot_ids and selected_date from the book_slots table
    $slotsData = $this->db->table('book_slots')
                          ->select('time_slot_id, selected_date')
                          ->get()
                          ->getResultArray();

    // Extract the time_slot_ids and selected_date from the result set
    $time_slot_ids = array_column($slotsData, 'time_slot_id');
    $selected_dates = array_column($slotsData, 'selected_date');

    // Fetch data from tbl_slots where active_status is 'Y' and id matches
    $slots = $this->db->table('tbl_slots')
                      ->where('active_status', 'Y')
                      ->whereIn('id', $time_slot_ids)
                      ->get()
                      ->getResult();

    // Combine the selected_date with the fetched slots
    $result = [];
    foreach ($slots as $slot) {
        $index = array_search($slot->id, $time_slot_ids);
        if ($index !== false) {
            $slot->start_date = $selected_dates[$index];
            $result[] = $slot;
        }
    }

    return $result;
}

//public function bookedslots()
// {
//     // Perform a join query to fetch data from both tables
//     $query = $this->db->table('book_slots')
//                       ->join('tbl_slots', 'tbl_slots.id = book_slots.time_slot_id')
//                       ->where('book_slots.appm_id IS NOT NULL') // Add the condition here
//                       ->get();

//     // Check if there are any results
//     if ($query->getNumRows() > 0) {
//         // Return the array containing booked slots data
//         return $query->getResultArray();
//     } else {
//         // No matching records found, return an empty array
//         return [];
//     }
// }
public function bookedslots()
{
    // Perform a join query to fetch data from all three tables
    $query = $this->db->table('book_slots')
                      ->join('tbl_slots', 'tbl_slots.id = book_slots.time_slot_id')
                      ->join('tbl_appointment', 'tbl_appointment.ap_id = book_slots.appm_id')
                      ->where('book_slots.appm_id IS NOT NULL') // Add the condition here
                      ->select('book_slots.*, tbl_appointment.*, tbl_slots.*') // Select all columns from all tables
                      ->get();

    // Check if there are any results
    if ($query->getNumRows() > 0) {
        // Return the array containing booked slots data
        return $query->getResultArray();
    } else {
        // No matching records found, return an empty array
        return [];
    }
}
public function getUser()
{
    return $this->db->table('tbl_user')->where('status', 'Y')->get()->getResultArray();
}

public function deleteUser($userId)
{
    
    $this->table('tbl_user')->where('id', $userId)->delete();
    return $this->db->affectedRows() > 0; 
}
public function getsinglerow($table, $wherecond)
{

    $result = $this->db->table($table)->where($wherecond)->get()->getRow();

    if ($result) {
        return $result;
    } else {
        return false;
    }
}
public function getappoincome()
{
    return $this->db->table('tbl_appointment')->where('conducted', 'Y')->get()->getResultArray();
}
public function servicesincome()
{
    return $this->db->table('services')->get()->getResultArray();
}
public function getStudents()
{
    return $this->db->table('classes')->where('completion_status', 'N')->get()->getResultArray();
}
}

