<?php include('header.php'); ?>



<div class="pcoded-content">

    <div class="pcoded-inner-content">

        <div class="main-body">

            <div class="page-wrapper">

            <div class="page-header card">

                    <div class="row align-items-end">

                        <div class="col-lg-8 col">

                            <div class="page-header-title">

                                <i class="icofont icofont-file-code bg-c-blue"></i>

                                <div class="d-inline">

                                    <h4>Income Report</h4>

                                    <!-- <span>Lorem ipsum dolor sit <code>amet</code>, consectetur adipisicing elit</span> -->

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-4 col">

                            <div class="page-header-breadcrumb">

                                <ul class="breadcrumb-title">

                                    <li class="breadcrumb-item">

                                        <a href="<?php echo base_url() ?>admin_dashboard">

                                            <i class="icofont icofont-home"></i>

                                        </a>

                                    </li>

                                    <li class="breadcrumb-item"><a href="#!">Income Report</a>

                                    </li>

                                    



                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="container card p-5">

                    <div class="card" id="incomeCards">

                        <!-- Cards container -->

                        <div class="card-header">

                            <h5>Appointment Income</h5>

                        </div>

                        <div class="card-block">

                            <div class="table-responsive">

                                <table class="table table-bordered">

                                    <thead>

                                        <tr>

                                            <th>Month</th>

                                            <th>Current Month Total</th>

                                            <th>Financial Year Total</th>

                                            <th>Total Income</th> <!-- New Column -->

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php

                                        // Get current month and year

                                        $currentMonth = date('m');

                                        $currentYear = date('Y');

                                        $financialYearStart = ($currentMonth < 4) ? ($currentYear - 1) . '-04-01' : $currentYear . '-04-01'; // April 1st of the current or previous year

                                        $financialYearEnd = ($currentMonth < 4) ? $currentYear . '-03-31' : ($currentYear + 1) . '-03-31'; // March 31st of the current or next year



                                        // Initialize variables for current month, financial year, and total incomes

                                        $currentMonthTotal = 0;

                                        $financialYearTotal = 0;

                                        $totalIncome = 0;



                                        foreach ($appoincome as $income) {

                                            // Extract month and year from appointment date

                                            $appointmentMonth = date('m', strtotime($income['appointment_date']));

                                            $appointmentYear = date('Y', strtotime($income['appointment_date']));

                                            $incomeAmount = $income['amount'];



                                            // Check if appointment is in the current month

                                            if ($currentMonth == $appointmentMonth && $currentYear == $appointmentYear) {

                                                $currentMonthTotal += $incomeAmount;

                                            }



                                            // Check if appointment is in the financial year

                                            if ($income['created_at'] >= $financialYearStart && $income['created_at'] <= $financialYearEnd) {

                                                $financialYearTotal += $incomeAmount;

                                            }



                                            // Increment total income for each appointment

                                            $totalIncome += $incomeAmount;

                                        }

                                        ?>

                                        <tr>

                                            <td><?php echo date('F Y'); ?></td>

                                            <td><?php echo $currentMonthTotal; ?></td>

                                            <td><?php echo $financialYearTotal; ?></td>

                                            <td><?php echo $totalIncome; ?></td> <!-- Display total income -->

                                        </tr>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                    <div class="card" id="serviceIncomeCards">

                        <!-- Cards container -->

                        <div class="card-header">

                            <h5>Service Income</h5>

                        </div>

                        <div class="card-block">

                            <div class="table-responsive">

                                <table class="table table-bordered">

                                    <thead>

                                        <tr>

                                            <th>Month</th>

                                            <th>Current Month Total</th>

                                            <th>Financial Year Total</th>

                                            <th>Total Income</th> <!-- New Column -->



                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php

                                        // Get current month and year

                                        $currentMonth = date('m');

                                        $currentYear = date('Y');

                                        $financialYearStart = ($currentMonth < 4) ? ($currentYear - 1) . '-04-01' : $currentYear . '-04-01'; // April 1st of the current or previous year

                                        $financialYearEnd = ($currentMonth < 4) ? $currentYear . '-03-31' : ($currentYear + 1) . '-03-31'; // March 31st of the current or next year



                                        // Initialize variables for current month, financial year, and total incomes

                                        $currentMonthTotal = 0;

                                        $financialYearTotal = 0;

                                        $totalIncome = 0;



                                        foreach ($servicesincome as $income) {

                                            // Extract month and year from appointment date

                                            $appointmentMonth = date('m', strtotime($income['created_at']));

                                            $appointmentYear = date('Y', strtotime($income['created_at']));

                                            $incomeAmount = $income['amount'];



                                            // Check if appointment is in the current month

                                            if ($currentMonth == $appointmentMonth && $currentYear == $appointmentYear) {

                                                $currentMonthTotal += $incomeAmount;

                                            }



                                            // Check if appointment is in the financial year

                                            if ($income['created_at'] >= $financialYearStart && $income['created_at'] <= $financialYearEnd) {

                                                $financialYearTotal += $incomeAmount;

                                            }



                                            // Increment total income for each appointment

                                            $totalIncome += $incomeAmount;

                                        }

                                        ?>

                                        <tr>

                                            <td><?php echo date('F Y'); ?></td>

                                            <td><?php echo $currentMonthTotal; ?></td>

                                            <td><?php echo $financialYearTotal; ?></td>

                                            <td><?php echo $totalIncome; ?></td> <!-- Display total income -->

                                        </tr>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>



              

                </div>

            </div>

        </div>

    </div>

</div>



<!-- Include required JavaScript libraries -->



<?php include('footer.php'); ?>