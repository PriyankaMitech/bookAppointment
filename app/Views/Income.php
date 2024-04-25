<?php include('header.php'); ?>

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
            <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="icofont icofont-file-code bg-c-blue"></i>
                                <div class="d-inline">
                                    <h4>Income Report</h4>
                                    <!-- <span>Lorem ipsum dolor sit <code>amet</code>, consectetur adipisicing elit</span> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
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
                    <!-- Date range filter input -->
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
                            <button class="btn btn-warning" onclick="toggleIncome()">View income</button>
                            <!-- Toggle button -->
                        </div>
                    </div>
                    <div class="table-wrapper" id="tableWrapper">
                        <!-- Table wrapper -->
                        <table id="dataTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <!-- <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Class Days</th>
                                    <th>Start Time</th> -->
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
                                    <!-- <td><?php echo $appointment['start_date']; ?></td>
                                    <td><?php echo $appointment['end_date']; ?></td>
                                    <td><?php echo $appointment['class_days']; ?></td>
                                    <td><?php echo $appointment['start_time']; ?></td> -->
                                    <td><?php echo $appointment['batch_name']; ?></td>
                                    <td><?php echo $appointment['fees']; ?></td>
                                    <td>
                                        <?php
                                            // Split the "Paid Fees" string by commas
                                            $paidAmounts = explode(',', $appointment['Paid_Ammount']);
                                            // Sum up the values for this row
                                            $rowTotal = array_sum($paidAmounts);
                                            echo $rowTotal; // Display the sum for this row
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

                    <!-- Cards for income -->
                    <div class="card" id="incomeCards" style="display: none;">
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
                    <div class="card" id="serviceIncomeCards" style="display: none;">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

<!-- JavaScript for exporting functionality -->
<script>
function exportToExcel() {
    const table = document.getElementById('dataTable');
    const ws = XLSX.utils.table_to_sheet(table);
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
    XLSX.writeFile(wb, "income_report.xlsx");
}

function exportToPDF() {
    const element = document.getElementById('dataTable');
    html2pdf().from(element).save('income_report.pdf');
}

function toggleIncome() {
    const tableWrapper = document.getElementById('tableWrapper'); // Get the table wrapper element
    const incomeCards = document.getElementById('incomeCards'); // Get the income cards container element
    const serviceIncomeCards = document.getElementById(
        'serviceIncomeCards'); // Get the service income cards container element

    if (tableWrapper.style.display === 'none') { // If table is hidden, show table and hide cards
        tableWrapper.style.display = 'block';
        incomeCards.style.display = 'none';
        serviceIncomeCards.style.display = 'none';
    } else { // If table is shown, hide table and show cards
        tableWrapper.style.display = 'none';
        incomeCards.style.display = 'block';
        serviceIncomeCards.style.display = 'block';
    }
}

// Add event listener for date range filter
document.getElementById('fromDate').addEventListener('change', filterByDateRange);
document.getElementById('toDate').addEventListener('change', filterByDateRange);

function filterByDateRange() {
    const fromDate = document.getElementById('fromDate').value;
    const toDate = document.getElementById('toDate').value;

    if (!fromDate || !toDate) {
        // If either fromDate or toDate is not selected, show all rows
        showAllRows();
        return;
    }

    const rows = document.querySelectorAll('#dataTable tbody tr');

    rows.forEach(row => {
        const createdAt = row.cells[4].innerText; // Assuming Start Date is in the 5th column (index 4)
        const formattedCreatedAt = formatDate(createdAt);

        if (formattedCreatedAt >= fromDate && formattedCreatedAt <= toDate) {
            row.style.display = 'table-row';
        } else {
            row.style.display = 'none';
        }
    });
}

function showAllRows() {
    const rows = document.querySelectorAll('#dataTable tbody tr');
    rows.forEach(row => {
        row.style.display = 'table-row';
    });
}

// Function to format date as yyyy-mm-dd
function formatDate(date) {
    return new Date(date).toISOString().split('T')[0];
}
</script>

<style>
.table-wrapper {
    max-height: 400px;
    /* Set maximum height for the table */
    overflow-y: auto;
    /* Enable vertical scrollbar */
}
</style>

<?php include('footer.php'); ?>