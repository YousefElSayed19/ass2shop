<?php 
    session_start();
    include("./connection.php");
    $state = false;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $full_name;
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $resultCheck = $conn->query($sql);
        $resultId = mysqli_query($conn, $sql);

        if (mysqli_num_rows($resultId) > 0) {
            $row = mysqli_fetch_assoc($resultId);
            $_SESSION['id'] = $row['id'];
        }

        $sql_Full_Name = "SELECT full_name FROM users WHERE username = '$username'";
        $resultFull_Name = mysqli_query($conn, $sql);

        if (mysqli_num_rows($resultFull_Name) > 0) {
            $row = mysqli_fetch_assoc($resultFull_Name);
            $full_name = $row['full_name'];
        }

        if ($resultCheck->num_rows > 0) {
            $user = $resultCheck->fetch_assoc(); 
            if ($password == $user['password']) {
                $state = true;
                $_SESSION['state'] = $state;
                $_SESSION['full_name'] = $full_name;
                $result = $conn->query($sql);
                $user = $result->fetch_assoc();
                $_SESSION['image'] = $user["image"];
                if($user["role"] =="admin"){
                    $_SESSION['admin'] = true;
                }
                header("Location: ../index.php");
            } else {
                $state = false;
            }
        } else {
            echo "<script>alert('User Name Or Password Is Wrong ');</script>";
            $state = false;
        }
    }
?>
<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="UTF-8">
        <title>Login Page</title>
        <link rel="stylesheet" href="../style/loginStyle.css">
    </head>
    <body>
        <div class="login-container">
        <h2>Login</h2>
        <form method="post" action="">
            <label for="username">User Name</label>
            <input type="text" name="username" id="username" placeholder="Username" required>
            <br>
            <div class="input-field">   
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span class="eye-icon" id="password1" onclick="togglePassword('password')">👁️</span>
            </div>
            <br>
            <button type="submit">Login</button>
        </form>
        <br>
        <a href="register.php">U dont have account !</a>
    </div>
    <script src="../script/registetForm.js"></script>
    </body>
</html>