<?php include('header.php'); ?>

<!-- Add HTML table here -->
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <div class="container">
                    <!-- Date range filter input and service filter -->
                    <div class="row">
                        <div class="col-md-2 form-group">
                            <label for="fromDate">From Date:</label>
                            <input type="date" id="fromDate" class="form-control">
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="toDate">To Date:</label>
                            <input type="date" id="toDate" class="form-control">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="serviceFilter">Filter by Service:</label>
                            <select id="serviceFilter" class="form-control">
                                <option value="">All Services</option>
                                <option value="Prediction">Prediction</option>
                                <option value="Tarot">Tarot</option>
                                <option value="Preparing Kundali">Preparing Kundali</option>
                                <option value="Kundali Matching">Kundali Matching</option>
                                <option value="Muhurta">Muhurta</option>
                                <option value="Astrology Coaching">Astrology Coaching</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <div class="col-md-5" style="padding-top: 28px;">
                            <button class="btn btn-primary " onclick="exportToExcel()">Export to Excel</button>
                            <button class="btn btn-primary" onclick="exportToPDF()">Export to PDF</button>
                        </div>
                    </div>
                    <table id="dataTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Service</th>
                                <th>Service Date</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allapt as $appointment): ?>
                                <tr>
                                    <td><?php echo $appointment['id']; ?></td>
                                    <td><?php echo $appointment['name']; ?></td>
                                    <td><?php echo $appointment['email']; ?></td>
                                    <td><?php echo $appointment['mobile']; ?></td>
                                    <td><?php echo $appointment['service']; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($appointment['service_date'])); ?></td>
                                    <td><?php echo $appointment['amount']; ?></td>
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

// Add event listeners for date range filter and service filter
document.getElementById('fromDate').addEventListener('change', filterData);
document.getElementById('toDate').addEventListener('change', filterData);
document.getElementById('serviceFilter').addEventListener('change', filterData);

function filterData() {
    const fromDate = document.getElementById('fromDate').value;
    const toDate = document.getElementById('toDate').value;
    const serviceFilter = document.getElementById('serviceFilter').value;
    const rows = document.querySelectorAll('#dataTable tbody tr');

    rows.forEach(row => {
        const serviceDate = row.cells[5].innerText; // Assuming Service Date is in the 6th column (index 5)
        const formattedServiceDate = formatDate(serviceDate);
        const serviceName = row.cells[4].innerText; // Assuming Service Name is in the 5th column (index 4)

        const showByDate = (!fromDate || formattedServiceDate >= fromDate) && (!toDate || formattedServiceDate <= toDate);
        const showByService = !serviceFilter || serviceName === serviceFilter;

        row.style.display = (showByDate && showByService) ? 'table-row' : 'none';
    });
}

// Function to format date as dd-mm-yyyy
function formatDate(date) {
    const parts = date.split('-');
    return `${parts[2]}-${parts[1]}-${parts[0]}`;
}
</script>

<?php include('footer.php'); ?>
