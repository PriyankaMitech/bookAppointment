<?php



namespace App\Models;



use CodeIgniter\Model;



class Admin_Model extends Model

{

    protected $table = 'tbl_user';

    protected $db;

    public function __construct() {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getalldataorderby($table1, $wherecond, $order_by) {
        $builder = $this->db->table($table1);
        $builder->where($wherecond);
        $builder->orderBy($order_by);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getallAppointment()

{

    return $this->db->table('tbl_appointment')->where('conducted', 'Y')->get()->getResultArray();

}

public function getAppointments($filter_date = null)
{
    $builder = $this->db->table('tbl_appointment');

    // Apply filter by date if provided
    if (!empty($filter_date)) {
        $builder->where('DATE(appointment_date)', $filter_date);
    }

    // Order by appointment_date in descending order
    $builder->orderBy('appointment_date', 'DESC');

    // Execute the query and return results
    $query = $builder->get();

    // Debug: Check the query and result
    // echo $this->db->getLastQuery();
    return $query->getResultArray();
}

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

//   public function getallapp(){



//     $count = $this->db->table('tbl_appointment')->countAll();



//     return $count;

    

//   }

public function getallapp() {
    // Get current year
    $currentYear = date('Y');

    // Set the date range for April 1st to March 30th of the current year
    $start_date = $currentYear . '-04-01';
    $end_date = ($currentYear + 1) . '-03-30'; // End date is next year's March 30th

    // Initialize total count
    $total_count = 0;

    // Query to count total services between April 1st and March 30th
    // $services_count = $this->db->table('services')
    //     ->where('service_date >=', $start_date)
    //     ->where('service_date <=', $end_date)
    //     ->where('is_deleted', 'N')
    //     ->countAllResults();
    
    // Query to count total appointments between April 1st and March 30th
    $appointments_count = $this->db->table('tbl_appointment')
        ->where('appointment_date >=', $start_date)
        ->where('appointment_date <=', $end_date)
        ->where('conducted', 'Y')
        ->countAllResults();

    // Calculate total count
    $total_count = $appointments_count;

    return $total_count;
}


public function getallservices() {
    // Get current year
    $currentYear = date('Y');

    // Set the date range for April 1st to March 30th of the current year
    $start_date = $currentYear . '-04-01';
    $end_date = ($currentYear + 1) . '-03-30'; // End date is next year's March 30th

    // Initialize total count
    $total_count = 0;

    // Query to count total services between April 1st and March 30th
    $services_count = $this->db->table('services')
        ->where('service_date >=', $start_date)
        ->where('service_date <=', $end_date)
        ->where('is_deleted', 'N')
        ->countAllResults();
    
    // Query to count total appointments between April 1st and March 30th
    // $appointments_count = $this->db->table('tbl_appointment')
    //     ->where('appointment_date >=', $start_date)
    //     ->where('appointment_date <=', $end_date)
    //     ->where('conducted', 'Y')
    //     ->countAllResults();

    // Calculate total count
    $total_count = $services_count;

    return $total_count;
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
          ->where('conducted', 'Y')


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
            ->where('is_deleted', 'N')


            ->get()->getRow()->amount,

        'classesAmount' => $totalClassesAmount

    ];

}



  public function getallslots($userID)

  {

      $db = \Config\Database::connect();

      return $db->table('tbl_slots')

          ->where('user_id', $userID)

          ->where('is_deleted','N')

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

                     ->where('active_status', 'Y')

                     ->where('is_deleted', 'N');

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

// public function todayAppointments()

// {

//     $today = date('Y-m-d');



//     // Query to fetch appointments with timeSlot

//     $query = $this->db->table('tbl_appointment')

//         ->where('appointment_date', $today)

//         ->get();



//     // Fetch the result

//     $appointments = $query->getResultArray();



//     // Fetch additional data from tbl_slots table

//     foreach ($appointments as &$appointment) {

//         $timeSlot = $appointment['timeSlot'];

//         $bookSlotQuery = $this->db->table('tbl_slots')

//             ->where('id', $timeSlot)

//             ->get();



//         $bookSlots = $bookSlotQuery->getResultArray();

//         $appointment['bookSlotData'] = $bookSlots;

//     }



//     // Return the appointments

//     return $appointments;

// }

public function notcounductedstaus()

{

    $today = date('Y-m-d');



    // Query to fetch appointments with timeSlot, conducted = 'N', and appointment_date today or before today

    $query = $this->db->table('tbl_appointment')

        ->where('conducted IS NULL')

        ->where('appointment_date <', $today)

        ->join('countries', 'tbl_appointment.Country = countries.id')

        ->join('states', 'tbl_appointment.State = states.id')

        ->join('cities', 'tbl_appointment.City = cities.id')

        ->select('tbl_appointment.*, countries.name as country_name, states.name as state_name, cities.name as city_name')

        ->get();

    $appointments = $query->getResultArray();

    foreach ($appointments as &$appointment) {

        $timeSlot = $appointment['timeSlot'];

        $bookSlotQuery = $this->db->table('tbl_slots')

            ->where('id', $timeSlot)

            ->get();



        $bookSlots = $bookSlotQuery->getResultArray();

        $appointment['bookSlotData'] = $bookSlots;

    }



    return $appointments;

}





public function todayAppointments()

{

    $today = date('Y-m-d');



    // Query to fetch appointments with timeSlot and conducted = 'N'

    $query = $this->db->table('tbl_appointment')

    ->where('appointment_date', $today)

    ->where('conducted IS NULL')

    ->join('countries', 'tbl_appointment.Country = countries.id')

    ->join('states', 'tbl_appointment.State = states.id')

    ->join('cities', 'tbl_appointment.City = cities.id')

    ->select('tbl_appointment.*, countries.name as country_name, states.name as state_name, cities.name as city_name')

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

public function todayAppointmentswithstatus()

{

    $today = date('Y-m-d');



    // Query to fetch appointments with timeSlot and conducted = 'N'

    $query = $this->db->table('tbl_appointment')

    ->where('appointment_date', $today)

    ->where('conducted', 'Y')

    ->join('countries', 'tbl_appointment.Country = countries.id')

    ->join('states', 'tbl_appointment.State = states.id')

    ->join('cities', 'tbl_appointment.City = cities.id')

    ->select('tbl_appointment.*, countries.name as country_name, states.name as state_name, cities.name as city_name')

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

public function nottodayAppointmentswithstatus()

{

    $today = date('Y-m-d');



    // Query to fetch appointments with timeSlot and conducted = 'N'

    $query = $this->db->table('tbl_appointment')

    ->where('appointment_date', $today)

    ->where('conducted', 'N')

    ->join('countries', 'tbl_appointment.Country = countries.id')

    ->join('states', 'tbl_appointment.State = states.id')

    ->join('cities', 'tbl_appointment.City = cities.id')

    ->select('tbl_appointment.*, countries.name as country_name, states.name as state_name, cities.name as city_name')

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

                     ->where('active_status', 'Y')

                     ->where('is_deleted', 'N');



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

// public function getcalenderallslots()

// {

//     try {

//         // Fetch the time_slot_ids, appm_id, and selected_date from the book_slots table

//         // $slotsData = $this->db->table('book_slots')

//         //                       ->select('time_slot_id, appm_id, selected_date')

//         //                       ->get()

//         //                       ->getResultArray();

//         $slotsData = $this->db->table('book_slots')

//         ->select('time_slot_id, appm_id, selected_date')

//         ->where('appm_id IS NOT NULL', null, false)

//         ->get()

//         ->getResultArray();

//         $time_slot_ids = array_column($slotsData, 'time_slot_id');

//         $appm_ids = array_column($slotsData, 'appm_id');

//         $selected_dates = array_column($slotsData, 'selected_date');



//         // Fetch data from tbl_slots where active_status is 'Y'

//         $slots = $this->db->table('tbl_slots')

//                           ->where('active_status', 'Y')

//                           ->get()

//                           ->getResult();

//                         //   echo '<pre>';print_r($slots);die;

//         // Initialize an array to store customer names indexed by appm_id

//         $customerNames = [];

        

//         // Fetch customer names based on appm_ids

//         if (!empty($appm_ids)) {

//             $customers = $this->db->table('tbl_appointment')

//                                   ->whereIn('ap_id', $appm_ids)

//                                   ->get()

//                                   ->getResult();

//                                 //   echo '<pre>';print_r($customers);die;

//             // Store customer names in an array indexed by appm_id

//             foreach ($customers as $customer) {

//                 $customerNames[$customer->ap_id] = $customer->fullname;

//             }

//         }



//         // Combine the selected_date with the fetched slots

//         $result = [];

//         echo '<pre>';print_r($customers);die;

//         foreach ($slots as $slot) {

//             // Check if the time_slot_id exists in the $time_slot_ids array

//             if (in_array($slot->id, $time_slot_ids)) {

//                 // Find the index of the matching time_slot_id

//                 $index = array_search($slot->id, $time_slot_ids);

               

//                 // Add appm_id and selected_date to the slot object

//                 $slot->appm_id = $appm_ids[$index];

//                 $slot->customer_name = isset($customerNames[$appm_ids[$index]]) ? $customerNames[$appm_ids[$index]] : 'Unknown'; // Add customer name

//                 $slot->start_date = $selected_dates[$index];

//                 // Add the modified slot to the result array

//                 $result[] = $slot;

//             }

//         }

//         // echo '<pre>';print_r($result);die;

//         return $result;

//     } catch (\Exception $e) {

//         // Handle database errors

//         log_message('error', 'Error in getcalenderallslots: ' . $e->getMessage());

//         return []; // Return an empty array or handle the error as per your application's requirements

//     }

// }

// public function getcalenderallslots()
// {
//     try {
//         // Fetch slots data from the database
//         $slotsData = $this->db->table('book_slots')
//             ->select('book_slots.time_slot_id, book_slots.appm_id, book_slots.selected_date, tbl_slots.id, tbl_slots.day, tbl_slots.user_id, tbl_slots.start_time, tbl_slots.end_time, tbl_slots.created_on, tbl_slots.active_status')
//             ->join('tbl_slots', 'tbl_slots.id = book_slots.time_slot_id')
//             ->where('book_slots.appm_id IS NOT NULL', null, false)
//             ->get()
//             ->getResult();

//         // Check if slots data is fetched
//         if (empty($slotsData)) {
//             return []; // Return empty array if no slots data found
//         }

//         // Fetch customer names based on appm_ids
//         $appm_ids = array_column($slotsData, 'appm_id');

//         // Ensure there are appm_ids to query
//         if (empty($appm_ids)) {
//             return []; // Return empty array if no appm_ids found
//         }

//         $customers = $this->db->table('tbl_appointment')
//             ->whereIn('ap_id', $appm_ids)
//             ->get()
//             ->getResult();

//         // Create an array to store customer names indexed by appm_id
//         $customerNames = [];
//         foreach ($customers as $customer) {
//             $customerNames[$customer->ap_id] = $customer->fullname;
//         }

//         // Initialize the result array
//         $result = [];

//         // Iterate over slots data and add them to the result array
//         foreach ($slotsData as $slotData) {
//             // Create a slot object
//             $slotObject = (object) [
//                 'id' => $slotData->id,
//                 'day' => $slotData->day,
//                 'user_id' => $slotData->user_id,
//                 'start_time' => $slotData->start_time,
//                 'end_time' => $slotData->end_time,
//                 'created_on' => $slotData->created_on,
//                 'active_status' => $slotData->active_status,
//                 'appm_id' => $slotData->appm_id,
//                 'selected_date' => $slotData->selected_date,
//             ];

//             // Add customer name if available
//             $slotObject->customer_name = isset($customerNames[$slotData->appm_id]) ? $customerNames[$slotData->appm_id] : 'Unknown';

//             // Add the slot object to the result array
//             $result[] = $slotObject;
//         }

//         return $result;
//     } catch (\Exception $e) {
//         // Handle database errors
//         log_message('error', 'Error in getcalenderallslots: ' . $e->getMessage());
//         return []; // Return an empty array or handle the error as per your application's requirements
//     }
// }



public function getcalenderallslots()
{
    try {
        // Fetch slots data from the database
        $slotsData = $this->db->table('book_slots')
            ->select('book_slots.time_slot_id, book_slots.appm_id, book_slots.selected_date')
            ->where('book_slots.appm_id IS NOT NULL', null, false)
            ->get()
            ->getResult();

        // Check if slots data is fetched
        if (empty($slotsData)) {
            return []; // Return empty array if no slots data found
        }

        // Fetch customer names and timestartslot based on appm_ids
        $appm_ids = array_column($slotsData, 'appm_id');

        // Ensure there are appm_ids to query
        if (empty($appm_ids)) {
            return []; // Return empty array if no appm_ids found
        }

        // Fetch customer names and timestartslot from tbl_appointment
        $customers = $this->db->table('tbl_appointment')
            ->select('ap_id, fullname, timestartslot') // Select necessary columns including timestartslot
            ->whereIn('ap_id', $appm_ids)
            ->get()
            ->getResult();

        // Create an array to store customer data indexed by appm_id
        $customerData = [];
        foreach ($customers as $customer) {
            $customerData[$customer->ap_id] = [
                'fullname' => $customer->fullname,
                'timestartslot' => $customer->timestartslot,
            ];
        }

        // Initialize the result array
        $result = [];

        // Iterate over slots data and add them to the result array
        foreach ($slotsData as $slotData) {
            // Create a slot object
            $slotObject = (object) [
                'appm_id' => $slotData->appm_id,
                'selected_date' => $slotData->selected_date,
                'start_time' => isset($customerData[$slotData->appm_id]) ? $customerData[$slotData->appm_id]['timestartslot'] : 'Unknown',
            ];

            // Add customer name if available
            $slotObject->customer_name = isset($customerData[$slotData->appm_id]) ? $customerData[$slotData->appm_id]['fullname'] : 'Unknown';

            // Add the slot object to the result array
            $result[] = $slotObject;
        }

        return $result;
    } catch (\Exception $e) {
        // Handle database errors
        log_message('error', 'Error in getcalenderallslots: ' . $e->getMessage());
        return []; // Return an empty array or handle the error as per your application's requirements
    }
}







public function getalluserslots()

{

    // Fetch the time_slot_ids, appm_id, and selected_date from the book_slots table

    $slotsData = $this->db->table('tbl_slots')

                          ->get()

                          ->getResultArray();

 return $slotsData;

}




// public function bookedslots()

// {

//     // Get today's date

//     $todayDate = date('Y-m-d');



//     // Perform a join query to fetch data from all three tables

//     $query = $this->db->table('book_slots')

//                       ->join('tbl_slots', 'tbl_slots.id = book_slots.time_slot_id')

//                       ->join('tbl_appointment', 'tbl_appointment.ap_id = book_slots.appm_id')

//                       ->join('countries', 'tbl_appointment.Country = countries.id')

//                       ->join('states', 'tbl_appointment.State = states.id')

//                       ->join('cities', 'tbl_appointment.City = cities.id')

//                       ->where('book_slots.appm_id IS NOT NULL') // Add the condition here

//                       ->where('tbl_appointment.appointment_date >=', $todayDate) // Condition to fetch only today's or future appointments

//                       ->select('book_slots.*, tbl_appointment.*, tbl_slots.*, countries.name as country_name, states.name as state_name, cities.name as city_name') // Select all columns from all tables

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

    // Get today's date

    $todayDate = date('Y-m-d');



    // Perform a join query to fetch data from all three tables

    $query = $this->db->table('book_slots')

                    //  ->join('tbl_slots', 'tbl_slots.id = book_slots.time_slot_id')

                      ->join('tbl_appointment', 'tbl_appointment.ap_id = book_slots.appm_id')

                      ->join('countries', 'tbl_appointment.Country = countries.id')

                      ->join('states', 'tbl_appointment.State = states.id')

                      ->join('cities', 'tbl_appointment.City = cities.id')

                      ->where('book_slots.appm_id IS NOT NULL') // Add the condition here

                      ->where('tbl_appointment.appointment_date >=', $todayDate) // Condition to fetch only today's or future appointments

                      ->select('book_slots.*, tbl_appointment.*, countries.name as country_name, states.name as state_name, cities.name as city_name') // Select all columns from all tables

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

    return $this->db->table('services')->where('is_deleted', 'N')->get()->getResultArray();

}

public function getStudents()

{

    return $this->db->table('classes')->where('completion_status', 'N')->get()->getResultArray();

}





// public function todayremaingslots(){

//     $currentDayNumeric = date('N');



//     // Calculate the difference to get the first day of the current week

//     $firstCurrentDayNumeric = $currentDayNumeric - 1;



//     // Subtract the difference from the current date to get the first day

//     $firstCurrentDay = date('Y-m-d', strtotime("-$firstCurrentDayNumeric days"));



//     // Convert the first day to the day name (like "Monday", "Tuesday", etc.)

//     $firstCurrentDayName = date('l', strtotime($firstCurrentDay));



//     $todayslot = $this->db->table('tbl_slots')->where('active_status', 'Y')->where('day',$firstCurrentDayName)->get()->getResultArray();



//     // return $firstCurrentDayName;

//    return $todayslot;



// }



public function todayRemainingSlots() {

    // Get today's day name

    $currentDayName = date('l');



    // Fetch records from tbl_slots for the current day

    $todayslots = $this->db->table('tbl_slots')

                           ->where('active_status', 'Y')

                           ->where('day', $currentDayName)

                           ->get()

                           ->getResultArray();



    $bookedSlotIds = $this->db->table('book_slots')

                              ->select('time_slot_id')

                              ->where('selected_date', date('Y-m-d')) // Current date

                              ->get()

                              ->getResultArray();



    $bookedSlotIds = array_column($bookedSlotIds, 'time_slot_id');



    // Filter out the booked slots from todayslots

    $remainingSlots = array_filter($todayslots, function($slot) use ($bookedSlotIds) {

        return !in_array($slot['id'], $bookedSlotIds);

    });



    return $remainingSlots;

}









public function get_country_name(){

    return $this->db->table('countries')

    ->get()

    ->getResult();

}



public function get_states_name(){

    return $this->db->table('states')

    ->get()

    ->getResult();

}

public function get_citys_name(){

    return $this->db->table('cities')

    ->get()

    ->getResult();

}

public function get_state_name_location($country_id){

    $result = $this->db->table('states')->where('country_id', $country_id)->get()->getResult();

    echo json_encode($result);

}



public function get_city_name_location($state_id){

    $result = $this->db->table('cities')->where('state_id', $state_id)->get()->getResult();

    echo json_encode($result);

}

public function bookedslotsingle($lastInsertId)

{

    // Perform a join query to fetch data from all three tables

    $query = $this->db->table('tbl_appointment')

                      ->join('countries', 'tbl_appointment.Country = countries.id')

                      ->join('states', 'tbl_appointment.State = states.id')

                      ->join('cities', 'tbl_appointment.City = cities.id')

                      ->where('tbl_appointment.ap_id ', $lastInsertId) // Add the condition here

                      ->select('tbl_appointment.*, countries.name as country_name, states.name as state_name, cities.name as city_name') // Select all columns from all tables

                      ->get()

                      ->getRowArray();



    // Check if there are any results

    return $query;

}





public function update_user($userId, $data)

{

  //  print_r($data);die;

    // Update the user information in the 'update_user' table where 'id' matches $userId

    return $this->table('update_user')->where('id', $userId)->update($data);

}

}



