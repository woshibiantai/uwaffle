<!DOCTYPE html>
<html>
<head>
    <title>uwaffle :: Login</title>
    <link rel="stylesheet" type="text/css" href="styles/login.css">
</head>
<body>
    <div class="logIn">
        <form action='' method='POST'>
            <p>Username:</p>
            <input class="details" type='text' name='user' placeholder="Username">
            <p>Password:</p>
            <input class="details" type='password' name='pass' placeholder="Password">
            <input class="btn" type='submit' value="" name='submit'/>
            <h1> Don't have an account yet? <a href="signup.php">Sign up here!</a></h1>
        </form>

        <?php
        if(isset($_POST['submit'])) {

            $user = $_POST['user'];
            $pass = $_POST['pass'];

            include 'conn.php';

            $sql = "SELECT * FROM Users WHERE Username='".$user."' AND password='".$pass."'";
            $result = $conn->query($sql);
            $numrows = mysqli_num_rows($result);
            if($numrows!=0){
                while($row = $result->fetch_assoc()) {
                    $dbusername = $row['Username'];
                    $dbpassword = $row['Password'];
                }
                if ($user == $dbusername && $pass == $dbpassword) {
                    session_start();
                    $_SESSION['sess_user'] = $user;
                    header('Location: sessPPgenerator.php');
                }
            } else {
                echo 'Invalid username or password!';
            }
        }
        ?>

    </div>

</body>
</html>