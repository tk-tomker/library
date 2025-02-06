<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oundle School Library</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<style>
.active{
    background-color: aqua;
}
.navbar {
  margin-bottom: 0;
  background-color: black;
  z-index: 9999;
  border: 0;
  font-size: 12px !important;
  line-height: 1.42857143 !important;
  letter-spacing: 4px;
  border-radius: 0;
  position:sticky;
}

.navbar li a, .navbar .navbar-brand {
  color: #fff !important;
}

.navbar-nav li a:hover, .navbar-nav li.active a {
  color: black !important;
  background-color: #fff !important;
}

.navbar-default .navbar-toggle {
  border-color: transparent;
  color: #fff !important;
}

.modal:before {
  content: '';
  display: inline-block;
  height: 25%;
  vertical-align: middle;
  margin-right: -4px;
}

</style>
<body>
<?php 
session_start(); 
$current_page = basename($_SERVER['PHP_SELF']); 
?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-book"></span> Library</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="mainpage.php">HOME</a></li>
                <?php
                if (!isset($_SESSION["pupilid"])){
                    echo "<li><a href='#LOGIN' data-toggle='modal' data-target='#myModal'><span class='glyphicon glyphicon-info-sign'></span>LOGIN</a></li>";
                } else{
                    $role = $_SESSION["role"];
                    $forename = $_SESSION["forename"];
                    if ($role == 0){
                        echo "<li><a href='#ME'>" . $forename;
                    }
                    elseif ($role == 1){
                        echo "<li><a href='userandhouse.php'>ADMINPAGE</a></li><li><a href='book.php'>BOOKS</a></li>";
                    }
                    echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> LOGOUT</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <?php
                    if (isset($_SESSION['login_error'])) {
                        echo "<div class='alert alert-danger'>" . $_SESSION['login_error'] . "</div>";
                    }
                    elseif (isset($_SESSION['message'])) {
                        echo "<div class='alert alert-danger'>" . $_SESSION['message'] . "</div>";
                    }
                ?>
                <form action="loginprocess.php" method= "POST">
                    Username:<input type="text" name="Username" required><br>
                    Password:<input type="password" name="password" required><br>
                    <input type="submit" value="Login" class="btn btn-primary">
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<script>
$(document).ready(function(){
    <?php if(isset($_SESSION['login_error']) || isset($_SESSION['message'])): ?>
        $("#myModal").modal("show");
    <?php unset($_SESSION['login_error']); unset($_SESSION['message']);endif; ?>
});
</script>
</body>