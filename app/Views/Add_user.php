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
                                    <div class="card-header">Add Users</div>
                                    <div class="card-body">
                                        <form action="user_create" method="post">
                                            <div class="form-group">
                                                <label for="email">Email address</label>
                                                <input type="email" class="form-control" name="email" id="email"
                                                    aria-describedby="emailHelp" placeholder="Enter email">
                                                <small id="emailHelp" class="form-text text-muted">We'll never share
                                                    your email with anyone else.</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" name="password"
                                                    id="password" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Enter your name">
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
                                                    <button type="button" class="btn btn-secondary btn-sm" id="createuser">Add User</button>
                                                </form>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
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
document.getElementById("viewUserBtn").addEventListener("click", function() {
    document.getElementById("addUserForm").style.display = "none";
    document.getElementById("userList").style.display = "block";
});
document.getElementById("createuser").addEventListener("click", function() {
    document.getElementById("addUserForm").style.display = "block";
    document.getElementById("userList").style.display = "none";
});
</script>