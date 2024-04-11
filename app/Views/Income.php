<?php include("header.php"); ?>

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
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
                    <div class="card">
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
    </div>
</div>

<?php include("footer.php"); ?>
