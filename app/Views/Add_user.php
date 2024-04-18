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
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("userForm").addEventListener("submit", function(event) {
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;
        var nameError = document.getElementById("nameError");
        var emailError = document.getElementById("emailError");
        var passwordError = document.getElementById("passwordError");
        var confirmPasswordError = document.getElementById("confirmPasswordError");
        var hasError = false; // Set hasError to false initially

        // Reset error messages
        nameError.textContent = "";
        emailError.textContent = "";
        passwordError.textContent = "";
        confirmPasswordError.textContent = "";

        // Validate name
        if (!name.trim()) {
            nameError.textContent = "Please enter your name";
            nameError.style.display = "block";
            hasError = true; // Set hasError to true if there's an error
        }

        // Validate email
        if (!email.trim()) {
            emailError.textContent = "Please enter your email";
            emailError.style.display = "block";
            hasError = true;
        }

        // Validate password
        if (!password.trim()) {
            passwordError.textContent = "Please enter your password";
            passwordError.style.display = "block";
            hasError = true;
        }

        // Validate confirm password
        if (!confirmPassword.trim()) {
            confirmPasswordError.textContent = "Please confirm your password";
            confirmPasswordError.style.display = "block";
            hasError = true;
        }

        // Check if passwords match
        if (password.trim() !== confirmPassword.trim()) {
            passwordError.textContent = "Passwords do not match";
            passwordError.style.display = "block";
            confirmPasswordError.textContent = "Passwords do not match";
            confirmPasswordError.style.display = "block";
            hasError = true;
        }

        // Prevent form submission if there's any error
        if (hasError) {
            event.preventDefault();
        }
    });
});

document.getElementById("viewUserBtn").addEventListener("click", function() {
    document.getElementById("addUserForm").style.display = "none";
    document.getElementById("userList").style.display = "block";
});

document.getElementById("createuser").addEventListener("click", function() {
    document.getElementById("addUserForm").style.display = "block";
    document.getElementById("userList").style.display = "none";
});
</script>
