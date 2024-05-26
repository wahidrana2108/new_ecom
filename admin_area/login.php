<?php
session_start();

if (!isset($_SESSION['username'])) {
    include("includes/header.php");
    echo "
    <div class='container mt-5'>
        <div class='row justify-content-center'>
            <div class='col-md-6'>
                <div class='card'>
                    <div class='card-header text-center'>
                        <h2>Admin Login</h2>
                    </div>
                    <div class='card-body'>
                        <form action='' method='POST' enctype='multipart/form-data'>
                            <div class='form-group mb-3'>
                                <label for='username' class='form-label'>Username</label>
                                <input type='text' id='username' name='username' class='form-control' placeholder='Enter your username' required>
                            </div>
                            <div class='form-group mb-3'>
                                <label for='password' class='form-label'>Password</label>
                                <input type='password' id='password' name='password' class='form-control' placeholder='Enter your password' required>
                            </div>
                            <div class='d-grid'>
                                <button type='submit' name='login' class='btn btn-primary btn-block'>Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>";

    include("includes/footer.php");

    if (isset($_POST['login'])) {
        $email = mysqli_real_escape_string($conn, $_POST['username']);
        $pass = mysqli_real_escape_string($conn, $_POST['password']);
        $select_admin = "SELECT * FROM admin_users WHERE username='$email' AND password='$pass'";
        $run_admin = mysqli_query($conn, $select_admin);
        $check_admin = mysqli_num_rows($run_admin);

        if ($check_admin == 0) {
            echo "<script>alert('Your username or password is wrong!')</script>";
            exit();
        } else {
            $_SESSION['username'] = $email;
            echo "<script>alert('You are Logged in Successfully!')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }
} else {
    echo "<script>window.open('index.php', '_self')</script>";
}
?>
