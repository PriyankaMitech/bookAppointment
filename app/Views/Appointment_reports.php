<?php include('header.php'); ?>

<!-- Add HTML table here -->
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <div class="container">
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
                            <button class="btn btn-primary mr-2" onclick="exportToExcel()">Export to Excel</button>
                            <button class="btn btn-primary" onclick="exportToPDF()">Export to PDF</button>
                        </div>
                    </div>
                    <table id="dataTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Appointment Type</th>
                                <th>Appointment Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allapt as $appointment): ?>
                                <tr>
                                    <td><?php echo $appointment['ap_id']; ?></td>
                                    <td><?php echo $appointment['fullname']; ?></td>
                                    <td><?php echo $appointment['email']; ?></td>
                                    <td><?php echo $appointment['contact_number']; ?></td>
                                    <td><?php echo $appointment['appointmentType']; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($appointment['appointment_date'])); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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
    XLSX.writeFile(wb, "table.xlsx");
}

function exportToPDF() {
    const element = document.getElementById('dataTable');
    html2pdf().from(element).save('table.pdf');
}

// Add event listener for date range filter
document.getElementById('fromDate').addEventListener('change', filterByDateRange);
document.getElementById('toDate').addEventListener('change', filterByDateRange);

function filterByDateRange() {
    const fromDate = document.getElementById('fromDate').value;
    const toDate = document.getElementById('toDate').value;
    const rows = document.querySelectorAll('#dataTable tbody tr');

    rows.forEach(row => {
        const appointmentDate = row.cells[5].innerText; // Assuming Appointment Date is in the 6th column (index 5)
        const formattedAppointmentDate = formatDate(appointmentDate);
        row.style.display = (formattedAppointmentDate >= fromDate && formattedAppointmentDate <= toDate) ? 'table-row' : 'none';
    });
}

// Function to format date as dd-mm-yyyy
function formatDate(date) {
    const parts = date.split('-');
    return `${parts[2]}-${parts[1]}-${parts[0]}`;
}
</script>

<?php include('footer.php'); ?>
