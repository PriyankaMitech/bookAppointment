<?php include('header.php'); ?>

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div id="addUserForm">
                                <div class="card">
                                    <div class="card-header"><b>Add Users</b></div>
                                    <div class="card-body">
                                        <form action="user_create" method="post" id="userForm">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Enter your name">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">User name</label>
                                                <input type="text" class="form-control" name="email" id="email"
                                                    aria-describedby="emailHelp" placeholder="Enter username for Login">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" name="password"
                                                    id="password" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="confirmPassword">Confirm Password</label>
                                                <input type="password" class="form-control" name="confirmPassword"
                                                    id="confirmPassword" placeholder="Confirm Password">
                                                <div id="passwordError" style="display: none; color: red;">Passwords do not match</div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="button" class="btn btn-secondary" id="viewUserBtn">View
                                                Users</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="userList" style="display: none;">
                                <div class="card">
                                    <div class="card-header">User List</div>
                                    <div class="card-body">
                                        <ul class="list-group">
                                            <?php foreach ($getUser as $user): ?>
                                            <li class="list-group-item">
                                                <?php echo $user['name']; ?> - <?php echo $user['email']; ?>
                                                <form action="<?php echo base_url('delete_user'); ?>"
                                                    method="post" class="float-right">
                                                    <input type="hidden" name="userId"
                                                        value="<?php echo $user['id']; ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    
                                                </form>
                                            </li>
                                            <?php endforeach; ?>
                                           
                                        </ul>
                                    </div>
                                </div>
                                <!-- <button type="button" class="btn btn-secondary btn-sm" id="createuser">Add User</button> -->
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
document.getElementById("viewUserBtn").addEventListener("click", function() {
    document.getElementById("addUserForm").style.display = "none";
    document.getElementById("userList").style.display = "block";
});
document.getElementById("createuser").addEventListener("click", function() {
    document.getElementById("addUserForm").style.display = "block";
    document.getElementById("userList").style.display = "none";
});

document.getElementById("userForm").addEventListener("submit", function(event) {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    if (password !== confirmPassword) {
        document.getElementById("passwordError").style.display = "block";
        event.preventDefault();
    }
});
</script>
