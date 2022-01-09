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

    <title>Check List | View | Workshop</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@300;400&display=swap');

        * {
            font-family: 'Noto Sans Mono';
        }

        .position {
            position: absolute;
            top: 2%;
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

    <br /><br /><br />
    <!-- php code start -->
    <?php
    try {
        $mysql = new mysqli("localhost", "root", "", "id17132601_database1");
        if ($mysql->connect_error)
            throw new Exception();
    } catch (Exception $e) {
        echo '<div class="alert alert-danger position" role="alert">Cannot connect to database! Error: ' . $mysql->connect_error . '.</div>';
        exit(0);
    }    
    echo '<table class="table table-bordered" style="margin-left: 2%; margin-right: 2%; width: 96%; margin-top: 2%;">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">DATE</th>
                <th scope="col">SUPERVISOR</th>
                <th scope="col">PROTECTIVE CAGE FOR TYRE INFLATION WORK</th>
                <th scope="col">FLASH BACK ARRESTER IN CUTTING TORCH</th>
                <th scope="col">AIR PRESSURE RECEIVER TANK TESTING OF COMPRESSOR FOR HYDRAULICALLY AND ULTRASONICALLY TO ASSESS SAFE WORKING PRESSURE</th>                
                </tr>
            </thead>
            <tbody>';
    $sql = "SELECT * FROM workshopchecklist";
    $ret = $mysql->query($sql);
    for ($i = 0; $i < $ret->num_rows; $i = $i + 1) {
        $resarr = $ret->fetch_array();
        $resarr[0] = date('d-M-Y h:i A', strtotime($resarr[0]));
        $sql = "SELECT Name, Surname FROM personaldetails WHERE AadharNumber='$resarr[1]'";
        $ret1 = $mysql->query($sql);
        $resarr1 = $ret1->fetch_array();
        $name = $resarr1[0] . " " . $resarr1[1];
        echo '<tr>
                <th scope="row">' . ($i+1) . '</th><td>' . $resarr[0] . '</td><td>' . $name . '</td>';
        for ($j = 2; $j < 5; $j = $j + 1) {
            if ($resarr[$j] == '1')
                echo '<td><img src="image/tick.png" style="height: 10px; width: 10px;" /></td>';
            else
                echo '<td><img src="image/cross.png" style="height: 10px; width: 10px;" /></td>';
        }
        echo '</tr>';
    }
    $mysql->close();
    ?>
    <!-- php code end -->
</body>

</html>