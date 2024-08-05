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
    .allsbutton{
        padding-bottom: 19px;
    }

</style>

<!-- Add HTML table here -->
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8 col">
                            <div class="page-header-title">
                                <i class="icofont icofont-file-code bg-c-blue"></i>
                                <div class="d-inline">
                                    <h4>Services Report</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Services Report</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container card p-3">
                    <!-- Date range filter input and service filter -->
                    <div class="card-block">
                        <div class="row">
                            <div class="col form-group">
                                <label for="fromDate">From Date:</label>
                                <input type="date" id="fromDate" class="form-control">
                            </div>
                            <div class="col form-group">
                                <label for="toDate">To Date:</label>
                                <input type="date" id="toDate" class="form-control">
                            </div>
                            <div class="col form-group">
                                <label for="serviceFilter">Filter by Service:</label>
                                <select id="serviceFilter" class="form-control">
                                    <option value="">All Services</option>
                                    <!-- <option value="Prediction">Prediction</option> -->
                                    <option value="Tarot">Tarot</option>
                                    <option value="Preparing Kundali">Preparing Kundali</option>
                                    <option value="Kundali Matching">Kundali Matching</option>
                                    <option value="Muhurta">Muhurta</option>
                                    <!-- <option value="Astrology Coaching">Astrology Coaching</option> -->
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            <div class="col d-flex align-items-end allsbutton">
                                <button class="btn btn-danger mr-2" id="clearFilterButton" onclick="clearFilters()" style="display: none;">Clear Filter</button>
                                <button class="btn btn-primary mr-2" onclick="exportToExcel()">Excel</button>
                                <button class="btn btn-primary" onclick="exportToPDF()">PDF</button>
                            </div>

                            <div class="col-md-12 ">
                                <span class="text-c-green f-w-600">Total Amount</span>
                                <h4 class="ms-2"><?php echo ($servicesAmount !== null) ? $servicesAmount : 0; ?></h4>
                            </div>

                        </div>
                        <table id="dataTable" class="table tabler table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Service</th>
                                    <th>Service Date</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($allapt)){ $i=1; ?>
                                <?php foreach ($allapt as $appointment): ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><?php echo $appointment['name']; ?></td>
                                        <td><?php echo $appointment['email']; ?></td>
                                        <td><?php echo $appointment['mobile']; ?></td>
                                        <td><?php echo $appointment['service']; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($appointment['service_date'])); ?></td>
                                        <td><?php echo $appointment['amount']; ?></td>
                                    </tr>
                                <?php $i++; endforeach; ?>
                                <?php }else{ ?>
                                    <tr>
                                        <td colspan="7"><p>No records found.</p></td>
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
        XLSX.writeFile(wb, "service.xlsx");
    }

    function exportToPDF() {
        const element = document.getElementById('dataTable');
        html2pdf().from(element).save('service_report.pdf');
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
        let isFiltered = false;

        rows.forEach(row => {
            const serviceDate = row.cells[5].innerText; // Assuming Service Date is in the 6th column (index 5)
            const formattedServiceDate = formatDate(serviceDate);
            const serviceName = row.cells[4].innerText; // Assuming Service Name is in the 5th column (index 4)

            const showByDate = (!fromDate || formattedServiceDate >= fromDate) && (!toDate || formattedServiceDate <= toDate);
            const showByService = !serviceFilter || serviceName === serviceFilter;

            if (showByDate && showByService) {
                row.style.display = 'table-row';
                isFiltered = true;
            } else {
                row.style.display = 'none';
            }
        });

        document.getElementById('clearFilterButton').style.display = isFiltered ? 'inline-block' : 'none';
    }

    function clearFilters() {
        const rows = document.querySelectorAll('#dataTable tbody tr');
        rows.forEach(row => {
            row.style.display = 'table-row'; // Reset all rows to be visible
        });
        document.getElementById('fromDate').value = ''; // Clear fromDate input
        document.getElementById('toDate').value = ''; // Clear toDate input
        document.getElementById('serviceFilter').value = ''; // Clear serviceFilter input
        document.getElementById('clearFilterButton').style.display = 'none'; // Hide clear filter button
    }

    // Function to format date as yyyy-mm-dd
    function formatDate(date) {
        const parts = date.split('-');
        return `${parts[2]}-${parts[1]}-${parts[0]}`;
    }
</script>

<?php include('footer.php'); ?>
