<?php include('header.php'); ?>



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

                                    <h4>Add User</h4>

                                   

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

                                    <li class="breadcrumb-item"><a href="#!">Add User</a>

                                    </li>

                                    <li class="breadcrumb-item">

                                    <a href="<?=base_url(); ?>user-list">View

                                        Users</a>

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

                                    <div class="card">


                                        <div class="card-body">

                                        <form action="user_create" method="post" id="userForm">

                                        <div class="form-group">

                                        <label for="name">Name</label>

                                        <input type="text" class="form-control" name="name" id="name"

                                        placeholder="Enter your name">

                                        <div id="nameError" style="display: none; color: red;"></div>

                                        </div>

                                        <div class="form-group">

                                        <label for="email">User Name</label>

                                        <input type="text" class="form-control" name="email" id="email"

                                        aria-describedby="emailHelp" placeholder="Enter username for Login">

                                        <div id="emailError" style="display: none; color: red;"></div>

                                        </div>

                                        <div class="form-group">

                                        <label for="password">Password</label>

                                        <input type="password" class="form-control" name="password"

                                        id="password" placeholder="Password">

                                        <div id="passwordError" style="display: none; color: red;"></div>

                                        </div>

                                        <div class="form-group">

                                        <label for="confirmPassword">Confirm Password</label>

                                        <input type="password" class="form-control" name="confirmPassword"

                                        id="confirmPassword" placeholder="Confirm Password">

                                        <div id="confirmPasswordError" style="display: none; color: red;"></div>

                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>

                                     

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