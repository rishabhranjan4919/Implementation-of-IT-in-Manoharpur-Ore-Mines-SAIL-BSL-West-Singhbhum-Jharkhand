<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>ID Card Generator</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@100;300;400&display=swap');

        * {
            font-family: 'Noto Sans Mono';
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
    <!-- php code start -->
    <?php
    $mysql = new mysqli("localhost", "root", "", "id17132601_database1");
    $anum = $_GET['aadhar-number'];
    $sql = "SELECT Name, Surname, EmpCode, Gender FROM personaldetails WHERE AadharNumber=$anum";
    $res = $mysql->query($sql);
    $resarr = $res->fetch_array();
    $name = $resarr[0] . " " . $resarr[1];
    $empcode = $resarr[2];
    $gender = $resarr[3];
    $sql = "SELECT Designation FROM jobdetails WHERE AadharNumber=$anum";
    $res = $mysql->query($sql);
    $resarr = $res->fetch_array();
    $desg = $resarr[0];
    $sql = "SELECT Photo FROM documents WHERE AadharNumber=$anum";
    $res = $mysql->query($sql);
    $resarr = $res->fetch_array();
    $photo = $resarr[0];
    $sql = "SELECT PMEDate, VTDate FROM partb WHERE AadharNumber=$anum";
    $res = $mysql->query($sql);
    $resarr = $res->fetch_array();
    $pmedate = $resarr[0];
    $vtdate = $resarr[1];
    $sql = "SELECT PresentAddress FROM addressdetails WHERE AadharNumber=$anum";
    $res = $mysql->query($sql);
    $resarr = $res->fetch_array();
    $addr = $resarr[0];
    echo '<div class="card" style="width: 50%; margin-left: 2%; margin-top: 2%;">
    <img src="../images/instagram-logo.png" class="card-img-top" alt="..." style="height: 40%; width: 40%; border-radius: 40%; margin-left: 30%; margin-right: 30%; margin-top: 5%;">
    <div class="card-body">
    <h5 class="card-title" style="text-align: center;">' . $name . '</h5>
    <p class="card-text">Employee Code: ' . $empcode . '</p>    
    <p class="card-text">Gender: ' . $gender . '</p>
    <p class="card-text">Designation: ' . $desg . '</p>
    <p class="card-text">Address: ' . $addr . '</p>    
    <p class="card-text">PME Date: ' . $pmedate . '</p>
    <p class="card-text">VT Date: ' . $vtdate . '</p>
    <p class="card-text">Address: ' . $addr . '</p>
    <p class="card-text">Aadhar Number: ' . $anum . '</p>
    </div>
    </div>';
    ?>
</body>

</html>