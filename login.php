<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@100;300;400&display=swap');

        * {
            font-family: 'Noto Sans Mono';
        }

        .position {
            position: absolute;
            top: 5%;
            width: 96%;
            z-index: -1;
            margin-left: 2%;
        }
    </style>
</head>

<body>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">SAIL-MOM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mailto: rishabhranjan2000@gmail.com?subject=Password change request">Forgot password?</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- navbar end -->
    <!-- form start -->
    <form method="get" action="login.php" style="width: 40%; transform: translate(70%, 160%); border: 1px solid black; border-radius: 3px;">
        <input class="form-control" type="text" placeholder="Username" name="username"  required="required" style="margin-left: 2%; margin-right: 2%; margin-top: 2%; width: 95%;">
        <input class="form-control" type="password" placeholder="Password" name="password" required="required" style="margin-left: 2%; margin-right: 2%; margin-top: 2%; width: 95%;">        
        <button type="submit" class="btn btn-primary" name="login"  style="margin-left: 2%; margin-right: 2%; margin-top: 2%; margin-bottom: 2%; width: 95%;">LOGIN</button>
    </form>
    <!-- form end -->
    <!-- php code start -->
    <?php
    if (isset($_GET['login']) == true) {
        $curruser = $_GET['username'];
        $currpass = $_GET['password'];        
        try {
            $mysql = new mysqli("localhost", "root", "", "id17132601_database1");
            if ($mysql->connect_error) {
                throw new Exception();
            }
        } catch (Exception $e) {
            echo '<div class="alert alert-danger position" role="alert">
            Cannot connect to database. Error: ' . $mysql->connect_error . '
            .</div>';
            exit(0);
        }
        $sql = "SELECT * FROM credentials";
        $ret = $mysql->query($sql);
        $flag = 0;
        for ($i = 0; $i < $ret->num_rows; $i = $i + 1) {
            $row = $ret->fetch_array();
            if ($curruser == $row[1] && $currpass == $row[2]) {
                $flag = 1;
                $_SESSION['aadhar-number'] = $row[0];                
                $logintimestamp =  date("Y-m-d H:i:s");                
                $sql = "INSERT INTO VALUES('$row[0]', '$curruser', '$logintimestamp')";
                $mysql->query($sql);
                break;
            }
        }
        if ($flag == 1) {
            echo '<div class="alert alert-success position" role="alert">
            Logged in successfully!
            </div>';
            echo "<script>
                    setTimeout(function() {
                    window.location.href = \"services.php\";
                    }, 2000);
                    </script>";
        } else if ($flag == 0) {
            echo '<div class="alert alert-warning position" role="alert">
            Incorrect username or password! Please try again.
            </div>';
            exit(0);
        }
        $mysql->close();
    }
    ?>
    <!-- php code end -->
</body>

</html>