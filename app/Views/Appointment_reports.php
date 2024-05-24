<?php include('header.php'); ?>
<style>
    /* Make the thead sticky */
    #dataTable thead {
        position: sticky;
        top: 0;
        background-color: #fff;
        z-index: 1; 
    }
    #dataTable tbody {
        max-height: 300px; 
        overflow-y: auto;
    }

    #dataTable th,
    #dataTable td {
        white-space: nowrap; 
    }
</style>

<!-- Add HTML table here -->
<!-- Add HTML table here -->
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="icofont icofont-file-code bg-c-blue"></i>
                                <div class="d-inline">
                                    <h4>Appointment Report</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Appointment Report</a>
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
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div style="max-height: 300px; overflow-y: auto;">
                            <table id="dataTable" class="table table-bordered">
                                <thead style="position: sticky; top: 0; background-color: #fff; z-index: 1;">
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Appointment Type</th>
                                        <th>Marital Status</th>
                                        <th>Appointment Date</th>
                                        <th>DOB</th>
                                        <th>TOB</th>
                                        <th>Reference</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($allapt)){ $i=1; ?>
                                    <?php foreach ($allapt as $appointment): ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><?php echo $appointment['fullname']; ?></td>
                                        <td><?php echo $appointment['email']; ?></td>
                                        <td><?php echo $appointment['contact_number']; ?></td>
                                        <td><?php echo $appointment['appointmentType']; ?></td>
                                        <td><?php echo $appointment['marital_status']; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($appointment['appointment_date'])); ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($appointment['dob'])); ?></td>
                                        <td><?php echo $appointment['tob']; ?></td>
                                        <td><?php echo $appointment['source']; ?></td>
                                    </tr>
                                    <?php $i++; endforeach; ?>
                                    <?php }else{ ?>
                                    <tr>
                                        <td colspan="10">
                                            <p>No records found.</p>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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

<!-- JavaScript for exporting functionality and date filtering -->
<script>
    function exportToExcel() {
        const table = document.getElementById('dataTable');
        const ws = XLSX.utils.table_to_sheet(table);
        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
        XLSX.writeFile(wb, "Appointment_report.xlsx");
    }

    function exportToPDF() {
        const element = document.getElementById('dataTable');
        const columns = Array.from(element.querySelectorAll('thead th')).map(th => th.innerText); // Get column headers
        const rows = Array.from(element.querySelectorAll('tbody tr')).map(row => {
            return Array.from(row.children).map(cell => cell.innerText); // Get row data
        });
        const data = [columns, ...rows]; // Combine column headers and row data
        const html = data.map(row => `<tr>${row.map(cell => `<td>${cell}</td>`).join('')}</tr>`).join(''); // Convert data to HTML table
        html2pdf().from(`<table>${html}</table>`).save('Appointment_report.pdf'); // Generate PDF
    }

    // Add event listener for date range filter
    document.getElementById('fromDate').addEventListener('change', filterByDateRange);
    document.getElementById('toDate').addEventListener('change', filterByDateRange);

    function filterByDateRange() {
        const fromDate = document.getElementById('fromDate').value;
        const toDate = document.getElementById('toDate').value;
        const rows = document.querySelectorAll('#dataTable tbody tr');

        rows.forEach(row => {
            // Get the appointment date from the table cell
            const appointmentDate = row.cells[6].innerText; // Assuming Appointment Date is in the 7th column (index 6)
            const formattedAppointmentDate = formatDate(appointmentDate);
            // Compare the formatted date with the selected date range
            if (formattedAppointmentDate >= fromDate && formattedAppointmentDate <= toDate) {
                row.style.display = 'table-row'; // Show the row if it falls within the date range
            } else {
                row.style.display = 'none'; // Hide the row if it's outside the date range
            }
        });
    }

    // Function to format date as dd-mm-yyyy
    function formatDate(date) {
        const parts = date.split('-');
        return `${parts[2]}-${parts[1]}-${parts[0]}`;
    }
</script>

<?php include('footer.php'); ?>
