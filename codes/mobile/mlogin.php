<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>uwaffle! :: login</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="css/login.css">

  </head>
  <body>
<div class="container-fluid">

<div class="row logo-row">
    <div class="col-md-12 logo">
        <img src="assets/login/logo.svg">
    </div> 
</div>

<div class="row loginForm-row">
    <div class="col-xs-12 loginForm-col">
    <form action='' method='POST'>
        <div class="row username-row">
            <div class="col-xs-12 username-col"><input type="text" name="user" placeholder="Username"></div>
        </div>
        <div class="row password-row">
            <div class="col-xs-12 password-col"><input type="password" name="pass" placeholder="Password"></div>
        </div>
        <div class="row logCheck-row">
            <div class="col-xs-6 logCheck-col"><input type="checkbox" name="logMemory" value="true"> Keep me logged in</div>
            <div class="col-xs-6 logCheck-col">Forgot Password?</div>
        </div>
        <div class="row loginBtn-row">
            <div class="col-xs-6 loginBtn-col">
                <input id="loginBtn" type="submit" value="" name="submit">
            </div>
            <div class="col-xs-6 loginBtn-col">
                <a href="signup.php" id="signupBtn"></a>
            </div>
        </div>
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
                    header('Location: msessPPgenerator.php');
                }
            } else {
                echo 'Invalid username or password!';
            }
        }
        ?>
    </div>
</div>

</div>    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.0.0.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>