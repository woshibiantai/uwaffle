<!DOCTYPE html>
<html>
<head>
    <title>uwaffle :: Sign Up</title>
    <link rel="stylesheet" type="text/css" href="styles/login.css">
</head>
<body>
    <div class="logIn">
        <form action='' method='POST'>
            <p>Pick a username:</p>
            <input class="details" type='text' name='user' placeholder="Username">
            <p>Enter your password:</p>
            <input class="details" type='password' name='pass' placeholder="Password">
            <h1> Are you a local in this area?<br>
            <span><input type='radio' name='Local' value="local">  Local</span>
            <span><input type='radio' name='Local' value="nonlocal">  Foreigner</span></h1>
            <input class="signup-btn" type='submit' value="" name='submit'/>
            <h1><a href="index.php">cancel</a></h1>
        </form>

        <?php
        if(isset($_POST['submit'])){
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $nature = $_POST['Local'];

            include 'conn.php';
            
            $sql = "SELECT * FROM Users WHERE Username='".$user."'";
            $result = $conn->query($sql);
            $numrows = mysqli_num_rows($result);
            if($numrows==0){
                $sql2 = "INSERT INTO Users(Username, Password, nature) VALUES('$user', '$pass', '$nature')";
                $result2 = $conn->query($sql2);
                $sql3 = "INSERT INTO sessPic(Username) VALUES('$user')";
                $result3 = $conn->query($sql3);
                $sql4 = "INSERT INTO Constants(Username) VALUES('$user')";
                $result4 = $conn->query($sql4);
                if($result2==TRUE and $result3==TRUE and $result4==TRUE){
                    echo 'Account Successfully Created';
                    session_start();
                    $_SESSION['sess_user'] = $user;
                    header('Location: sessPPgenerator.php');
                } else {
                    echo 'Error!';
                }
            } else {
                echo 'That username already exists! Please try again with a different username.';
            }
        }
        ?>

    </div>

</body>
</html>