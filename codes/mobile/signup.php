<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>uwaffle! :: sign up</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="css/signup.css">

  </head>
  <body>
<div class="container-fluid">

<div class="row loginTitle-row">
    <div class="col-xs-12 loginTitle-col"> Sign up and join the uwaffle community! </div>
</div>

<div class="row loginForm-row">
    <div class="col-xs-12 loginForm-col">
    <form action='' method='POST'>
        <div class="row username-row">
            <div class="col-xs-12 username-col">Pick a Username: <br><input type="text" name="user" placeholder="Username"></div>
        </div>
        <div class="row password-row">
            <div class="col-xs-12 password-col">Login Password: <input type="password" name="pass" placeholder="Password"></div>
        </div>
        <div class="row logCheck-row">
            <div class="col-xs-12 logCheck-col">Are you a local in this area?</div>
            <div class="col-xs-6 logCheck-col"><input type="radio" name="nature" value="local">  Local</div>
            <div class="col-xs-6 logCheck-col"><input type="radio" name="nature" value="nonlocal">  Non-local</div>
        </div>
        <div class="row loginBtn-row">
            <div class="col-xs-6 col-xs-offset-3 loginBtn-col">
                <input id="signupBtn" type="submit" value="" name="submit">
            </div>
            <div class="col-xs-12 loginBtn-col"><br>
                <a href="index.php"><u>cancel</u></a>
            </div>
        </div>
    </form>
    <?php
    if(isset($_POST['submit'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $nature = $_POST['nature'];

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
            $sql5 = "INSERT INTO Favorites(Username) VALUES('$user')";
            $result5 = $conn->query($sql5);
            if($result2==TRUE and $result3==TRUE and $result4==TRUE and $result5==TRUE){
                echo 'Account Successfully Created';
                session_start();
                $_SESSION['sess_user'] = $user;
                header('Location: msessPPgenerator.php');
            } else {
                echo 'Error!';
            }
        } else {
            echo 'That username already exists! Please try again with a different username.';
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