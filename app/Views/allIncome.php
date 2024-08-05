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

                                    <h4>Class Income Report</h4>

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

                                    <li class="breadcrumb-item"><a href="#!">Class Income Report</a>

                                    </li>

                                    



                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="container card p-3">

                    <!-- Date range filter input -->
                    <div class="card-block">

                    <div class="row">

                        <div class="col-md-3 form-group">

                            <label for="fromDate">From Date:</label>

                            <input type="date" id="fromDate" class="form-control">

                        </div>

                        <div class="col-md-3 form-group">

                            <label for="toDate">To Date:</label>

                            <input type="date" id="toDate" class="form-control">

                        </div>

                        <div class="col-md-6" style="padding-top: 28px;">

                        <button class="btn btn-primary " onclick="exportToExcel()">Excel</button>

                            <button class="btn btn-primary" onclick="exportToPDF()">PDF</button>

                           

                        </div>

                    </div>

                    <div class="table-wrapper" id="tableWrapper">

                        <!-- Table wrapper -->

                        <table id="dataTable" class="table tabler table-bordered">

                            <thead>

                                <tr>

                                    <th>ID</th>

                                    <th>Name</th>

                                    <th>Email</th>

                                    <th>Contact Number</th>

                                 

                                    <th>Batch Name</th>

                                    <th>Fees</th>

                                    <th>Paid Fees</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php if(!empty($getallclass)) { ?>

                                <?php foreach ($getallclass as $count => $appointment): ?>

                                <tr>

                                    <td><?php echo $count + 1; ?></td>

                                    <td><?php echo $appointment['name']; ?></td>

                                    <td><?php echo $appointment['email']; ?></td>

                                    <td><?php echo $appointment['contact_number']; ?></td>

                                  

                                    <td><?php echo $appointment['batch_name']; ?></td>

                                    <td><?php echo $appointment['fees']; ?></td>

                                    <td>

                                        <?php

                                         

                                            $paidAmounts = explode(',', $appointment['Paid_Ammount']);

                                         

                                            $rowTotal = array_sum($paidAmounts);

                                            echo $rowTotal;

                                        ?>

                                    </td>

                                </tr>

                                <?php endforeach; ?>

                                <?php }else{ ?>

                                    <tr>

                                    <td colspan="7"><p>No records found.</p></td>

                               

                                </tr>

                                    <?php } ?>

                            </tbody>

                        </table>



                    </div>



                    <div class="card" id="incomeCards" style="display: none;">

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

                                            <th>Total Income</th> 

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php

                                        $currentMonth = date('m');

                                        $currentYear = date('Y');

                                        $financialYearStart = ($currentMonth < 4) ? ($currentYear - 1) . '-04-01' : $currentYear . '-04-01'; // April 1st of the current or previous year

                                        $financialYearEnd = ($currentMonth < 4) ? $currentYear . '-03-31' : ($currentYear + 1) . '-03-31'; // March 31st of the current or next year

                                        $currentMonthTotal = 0;

                                        $financialYearTotal = 0;

                                        $totalIncome = 0;



                                        foreach ($appoincome as $income) {

                                            $appointmentMonth = date('m', strtotime($income['created_at']));

                                            $appointmentYear = date('Y', strtotime($income['created_at']));

                                            $incomeAmount = $income['amount'];



                                            if ($currentMonth == $appointmentMonth && $currentYear == $appointmentYear) {

                                                $currentMonthTotal += $incomeAmount;

                                            }



                                            if ($income['created_at'] >= $financialYearStart && $income['created_at'] <= $financialYearEnd) {

                                                $financialYearTotal += $incomeAmount;

                                            }



                                            $totalIncome += $incomeAmount;

                                        }

                                        ?>

                                        <tr>

                                            <td><?php echo date('F Y'); ?></td>

                                            <td><?php echo $currentMonthTotal; ?></td>

                                            <td><?php echo $financialYearTotal; ?></td>

                                            <td><?php echo $totalIncome; ?></td> 

                                        </tr>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                    <div class="card" id="serviceIncomeCards" style="display: none;">

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

                                            <th>Total Income</th>



                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php

                                        $currentMonth = date('m');

                                        $currentYear = date('Y');

                                        $financialYearStart = ($currentMonth < 4) ? ($currentYear - 1) . '-04-01' : $currentYear . '-04-01'; // April 1st of the current or previous year

                                        $financialYearEnd = ($currentMonth < 4) ? $currentYear . '-03-31' : ($currentYear + 1) . '-03-31'; // March 31st of the current or next year

                                        $currentMonthTotal = 0;

                                        $financialYearTotal = 0;

                                        $totalIncome = 0;

                                        foreach ($servicesincome as $income) {

                                            $appointmentMonth = date('m', strtotime($income['created_at']));

                                            $appointmentYear = date('Y', strtotime($income['created_at']));

                                            $incomeAmount = $income['amount'];

                                            if ($currentMonth == $appointmentMonth && $currentYear == $appointmentYear) {

                                                $currentMonthTotal += $incomeAmount;

                                            }

                                            if ($income['created_at'] >= $financialYearStart && $income['created_at'] <= $financialYearEnd) {

                                                $financialYearTotal += $incomeAmount;

                                            }

                                            $totalIncome += $incomeAmount;

                                        }

                                        ?>

                                        <tr>

                                            <td><?php echo date('F Y'); ?></td>

                                            <td><?php echo $currentMonthTotal; ?></td>

                                            <td><?php echo $financialYearTotal; ?></td>

                                            <td><?php echo $totalIncome; ?></td> 

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

</div>







<?php include('footer.php'); ?>