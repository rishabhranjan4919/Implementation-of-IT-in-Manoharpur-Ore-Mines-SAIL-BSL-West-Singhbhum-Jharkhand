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

    <title>Check List | Create | Crushing and Screening Plant</title>
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
    <!-- form start -->
    <form method="POST" action="create-check-list-cs-plant.php" style="margin-left: 2%; margin-right: 2%; margin-top: 2%;">
        <legend>Crushing and Screening Plant Check List</legend>
        <label for="machine-code">Machine Code:</label>
        <?php
        $n = 2; //Number of machines
        for ($i = 0; $i < $n; $i = $i + 1) {
            echo '<div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="machine-code" id="inlineRadio1" value="' . ($i+1) . '">
                    <label class="form-check-label" for="inlineRadio1">' . ($i+1) . '</label>
                </div>';
        }
        ?>
        <br />
        <?php
        $label = array("Provision of suitable guards and fences at the drive head and tail end of belt conveyor", "Cleaning of belt and conveyor drums when the machinery was in motion", "Semi-automatic fire detection and suppression system", "Provision of dust suppression arrangement", "Tail-end guard in conveyor belt system", "Pull chord switch in conveyor belt system", "Suitable fence guard in rotating part of secondary crusher drive unit, fines conveyor belt and finished product drive unit");
        $name = array("fence-drive-head", "belt-conveyor-cleaning", "fire-detection", "dust-suppression", "tail-end-guard", "pull-chord-switch", "fence-guard");
        $n = count($name);  //number of fields
        for ($i = 0; $i < $n; $i = $i + 1) {
            echo '<label for="' . $name[$i] . '">' . $label[$i] . '</label><select class="form-control" name="' . $name[$i] . '">
                <option value="1">Yes</option>
                <option value="0">No</option>
                </select>';
            echo '<br />';
        }
        ?>
        <button type="submit" class="btn btn-primary" name="create-check-list" style="width: 100%; margin-bottom: 2%;">CREATE CHECK LIST</button>
    </form>
    <!-- form end -->
    <!-- php code start -->
    <?php
    if (isset($_POST['create-check-list']) == true) {
        $fillUpTime =  date("Y-m-d H:i:s");
        $aadharNumber = $_SESSION['aadhar-number'];
        $machineCode = $_POST['machine-code'];
        $fenceDriveHead = $_POST['fence-drive-head'];
        $beltConveyorCleaning = $_POST['belt-conveyor-cleaning'];
        $fireDetection = $_POST['fire-detection'];
        $dustSuppression = $_POST['dust-suppression'];
        $tailEndGuard = $_POST['tail-end-guard'];
        $pullChordSwitch = $_POST['pull-chord-switch'];
        $fenceGuard = $_POST['fence-guard'];
        try {
            $mysql = new mysqli("localhost", "root", "", "id17132601_database1");
            if ($mysql->connect_error)
                throw new Exception();
        } catch (Exception $e) {
            echo '<div class="alert alert-danger position" role="alert">Cannot connect to database! Error: ' . $mysql->connect_error . '.</div>';
            exit(0);
        }
        $sql = "INSERT INTO cschecklist VALUES('$fillUpTime', '$aadharNumber', '$machineCode', '$fenceDriveHead', '$beltConveyorCleaning', '$fireDetection', '$dustSuppression', '$tailEndGuard', '$pullChordSwitch', '$fenceGuard')";
        if ($mysql->query($sql) == true) {
            echo '<div class="alert alert-success position" role="alert">
            Check list for machine code: ' . $machineCode . ' created successfully.
            </div>';
            echo "<script>
                setTimeout(function() {
                window.location.href = \"create-check-list-cs-plant.php\";
                }, 2000);
                </script>";
        } else {
            echo '<div class="alert alert-warning position" role="alert">
            Check list was not created! Error: ' . $mysql->error . '.</div>';
            exit(0);
        }
        $mysql->close();
    }
    ?>
    <!-- php code end -->
</body>

</html>