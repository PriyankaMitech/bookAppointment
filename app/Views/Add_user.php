<?php include('header.php'); ?>

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
                                    <h4>Add User</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Add User</a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">

                            <div class="row">
                                <div id="userList" class="col-md-12">
                                    <div class="page-header card">
                                        <div class="card-header">User List</div>
                                        <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Password</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($getUser as $user): ?>
                                                    <tr>
                                                        <td><?php echo $user['name']; ?></td>
                                                        <td><?php echo $user['email']; ?></td>
                                                        <td><?php echo $user['password']; ?></td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    <div class="btn-group" role="group"
                                                                        aria-label="User Actions">
                                                                        <button type="button"
                                                                            class="btn btn-primary btn-sm edit-btn"
                                                                            data-userid="<?php echo $user['id']; ?>">Edit</button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <form
                                                                        action="<?php echo base_url('delete_user'); ?>"
                                                                        method="post">
                                                                        <input type="hidden" name="userId"
                                                                            value="<?php echo $user['id']; ?>">
                                                                        <button type="submit"
                                                                            class="btn btn-danger btn-sm">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Modal for Edit User -->
                            <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog"
                                aria-labelledby="editUserModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form to Edit User Details -->
                                            <form id="editUserForm" action="<?php echo base_url('update_user'); ?>"
                                                method="post">
                                                <input type="hidden" name="userId" id="editUserId">
                                                <div class="form-group">
                                                    <label for="editName">Name</label>
                                                    <input type="text" class="form-control" id="editName"
                                                        name="editName" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="editEmail">Email address</label>
                                                    <input type="email" class="form-control" id="editEmail"
                                                        name="editEmail" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Password">Password</label>
                                                    <input type="email" class="form-control" id="Password"
                                                        name="Password" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
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
</div>

<?php include('footer.php'); ?>
<script>
// JavaScript to handle edit button click event and populate modal with user data
$(document).ready(function() {
    $('.edit-btn').click(function() {
        var userId = $(this).data('userid');
        // Assume getUserDetails function retrieves user details by userId via AJAX
        $.ajax({
            url: '<?php echo base_url('get_user_details'); ?>',
            type: 'POST',
            data: {
                userId: userId
            },
            dataType: 'json',
            success: function(response) {
                $('#editUserId').val(response.id);
                $('#editName').val(response.name);
                $('#editEmail').val(response.email);
                $('#Password').val(response.Password);
                $('#editUserModal').modal('show');
            },
            error: function() {
                alert('Error fetching user details');
            }
        });
    });
});
</script>