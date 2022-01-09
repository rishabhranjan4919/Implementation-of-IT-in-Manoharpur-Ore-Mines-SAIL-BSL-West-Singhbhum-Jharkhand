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

    <title>Check List | View | Dumper</title>
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
    <form method="GET" action="view-check-list-dumper.php" style="margin-left: 2%; margin-right: 2%; margin-top: 2%;">
        <legend>View Dumper Check List</legend>
        <label for="machine-code">Machine Code:</label>
        <?php
        $n = 11; //Number of machines
        for ($i = 0; $i < $n; $i = $i + 1) {
            echo '<div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="machine-code" id="inlineRadio1" value="' . ($i+1) . '">
                    <label class="form-check-label" for="inlineRadio1">' . ($i+1) . '</label>
                </div>';
        }
        ?>
        <br />
        <button type="submit" class="btn btn-primary" name="view-check-list">VIEW CHECK LIST</button>
    </form>
    <br />
    <!-- form end -->
    <!-- php code start -->
    <?php
    if (isset($_GET['view-check-list']) == true) {
        try {
            $mysql = new mysqli("localhost", "root", "", "id17132601_database1");
            if ($mysql->connect_error)
                throw new Exception();
        } catch (Exception $e) {
            echo '<div class="alert alert-danger position" role="alert">Cannot connect to database! Error: ' . $mysql->connect_error . '.</div>';
            exit(0);
        }
        echo '<table class="table table-bordered" style="width: 400%;">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">DATE</th>
            <th scope="col">SUPERVISOR</th>
            <th scope="col">HORN</th>
            <th scope="col">ACCELERATOR</th>
            <th scope="col">GUAGE</th>
            <th scope="col">REVERSE AV ALARM WITH FLASHER LIGHT</th>
            <th scope="col">SEAT BELT</th>
            <th scope="col">REAR VISION MIRROR</th>
            <th scope="col">REAR FLOOD LIGHT</th>
            <th scope="col">TURNING INDICATORS</th>
            <th scope="col">HEAD LAMPS</th>
            <th scope="col">CLEAN WINDSCREEN AND WINDOW</th>
            <th scope="col">PROPELLOR SHAFT GUARD</th>
            <th scope="col">ANTI-SKID</th>
            <th scope="col">TAIL-END PROTECTION</th>
            <th scope="col">GPS-GSM BASED NAVIGATION SYSTEM</th>
            <th scope="col">FATIGUE CONTROL SYSTEM</th>
            <th scope="col">INSULATION OF HOT PARTS OF ENGINE LIKE TUROCHARGER, EXHAUST AND MANIFOLD</th>
            <th scope="col">SEMI-AUTOMATIC FIRE DETECTION AND SUPPRESSION SYSTEM</th>
            <th scope="col">CABIN GUARD EXTENSION</th>
            <th scope="col">EXHAUST/ RETARD BRAKE</th>
            <th scope="col">SPEED LIMITING DEVICE(30 KMPH)</th>
            <th scope="col">PROVISION OF TWO BRAKES, ONE OF WHICH IS FAIL SAFETY</th>
            <th scope="col">BODY LIFTING POSITION LOCKING ARRANGEMENT</th>
            <th scope="col">BLIND SPOT MIRROR</th>
            <th scope="col">FIRE RESISTANT HOSE AT HOT ZONES</th>
            <th scope="col">ELECTRIC WIRES AND SLEEVES OF FIRE RESISTANT QUALITY</th>
            <th scope="col">TURBO CHARGE GUARD AND EXHAUST TUBE COATED WITH HEAT INSULATED PAINT</th>
            <th scope="col">BATTERY CUT-OFF SWITCH</th>
            <th scope="col">RETRO REFLECTIVE REFLECTORS ON ALL SIDES</th>
            <th scope="col">SEAT BELT REMINDER</th>
            <th scope="col">PROXIMITY WARNING DEVICE</th>
            <th scope="col">REAR VISION CAMERA</th>
            <th scope="col">AUTO DIPPING SYSTEM</th>
            <th scope="col">LOAD INDICATOR AND RECORDER</th>
            <th scope="col">NEUTRAL SWITCH INTERLOCK WITH GEAR</th>
            <th scope="col">SELF STARTER PROTECTION GUARD</th>
            <th scope="col">MECHANICAL STEERING LOCK</th>
            <th scope="col">MECHANICAL DEVICE TO AVOID HEAD TO TAIL COLLISION</th>
            <th scope="col">DUMP BODY RAISED INDICATOR WITH WARNING</th>
            <th scope="col">DUMP BODY STABILIZER</th>                        
          </tr>
        </thead>
        <tbody>';
        $machineCode = $_GET['machine-code'];
        $sql = "SELECT * FROM dumperchecklist WHERE machineCode='$machineCode'";
        $ret = $mysql->query($sql);
        for ($i = 0; $i < $ret->num_rows; $i = $i + 1) {
            $resarr = $ret->fetch_array();
            $resarr[0] = date('d-M-Y h:i A', strtotime($resarr[0]));
            $sql = "SELECT Name, Surname FROM personaldetails WHERE AadharNumber='$resarr[1]'";
            $ret1 = $mysql->query($sql);
            $resarr1 = $ret1->fetch_array();
            $name = $resarr1[0] . " " . $resarr1[1];
            echo '<tr>
            <th scope="row">' . ($i + 1) . '</th><td>' . $resarr[0] . '</td><td>' . $name . '</td>';
            for ($j = 3; $j < 42; $j = $j + 1) {
                if ($resarr[$j] == '1')
                    echo '<td><img src="image/tick.png" style="height: 10px; width: 10px;" /></td>';
                else
                    echo '<td><img src="image/cross.png" style="height: 10px; width: 10px;" /></td>';
            }
            echo '</tr>';
        }
        $mysql->close();
    }
    ?>
    </tbody>
    </table>
    <!-- php code end -->
</body>

</html>