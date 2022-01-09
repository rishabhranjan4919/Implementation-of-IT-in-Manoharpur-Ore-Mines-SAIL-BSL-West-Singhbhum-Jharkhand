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

    <title>Check List | Excavator</title>
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
    <form method="POST" action="create-check-list-excavator.php" style="margin-left: 2%; margin-right: 2%; margin-top: 2%;">
        <legend>Excavator Check List</legend>

        <label for="machine-code">Machine Code:</label>
        <?php 
            $n = 6; //Number of machines
            for($i = 0;$i < $n;$i = $i + 1){
                echo '<div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="machine-code" id="inlineRadio1" value="'. ($i+1) .'">
                    <label class="form-check-label" for="inlineRadio1">'. ($i+1) .'</label>
                </div>';
            }
        ?>        
        <br />
        <label for="fire-detection">Semi-automatic fire detection and suppression system</label><select class="form-control" name="fire-detection">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        <br />
        <label for="hydraulic-safety-valve">Hydraulic safety valve interlock</label><select class="form-control" name="hydraulic-safety-valve">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        <br />
        <label for="neutral-switch-interlock">Neutral switch interlock with gear</label><select class="form-control" name="neutral-switch-interlock">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        <br />
        <label for="self-start-protection">Self start protection guard</label><select class="form-control" name="self-start-protection">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        <br />
        <label for="func-cutoff-switch">All function cut-off switch</label><select class="form-control" name="func-cutoff-switch">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        <br />
        <label for="swing-motor-brake">Swing motor brake</label><select class="form-control" name="swing-motor-brake">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        <br />
        <label for="fire-resistant-hydraulic-hose">Fire resistant hydraulic hoses, sleeves and conduit</label><select class="form-control" name="fire-resistant-hydraulic-hose">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        <br />
        <label for="turbo-charge">Turbo charge guard</label><select class="form-control" name="turbo-charge">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        <br />
        <label for="hydraulic-tank-vent">Hydraulic tank vent valve</label><select class="form-control" name="hydraulic-tank-vent">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        <br />
        <label for="baffle-plate">Baffle plate between cold zone and hot zone</label><select class="form-control" name="baffle-plate">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        <br />
        <label for="hydraulic-cylinder-stopper">Provision for limiting of hydraulic cylinder-stopper</label><select class="form-control" name="hydraulic-cylinder-stopper">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        <br />
        <label for="rear-vision-camera">Rear vision camera</label><select class="form-control" name="rear-vision-camera">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        <br />
        <label for="warning-operator-fatigue">Warning system for operator fatigue</label><select class="form-control" name="warning-operator-fatigue">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        <br />
        <label for="stability-test">Stability test</label><select class="form-control" name="stability-test">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        <br />
        <label for="non-destructive-test">Non destructive test, boom foot pin and eye of the excavator</label><select class="form-control" name="non-destructive-test">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        <br />
        <button type="submit" class="btn btn-primary" name="create-check-list" style="width: 100%; margin-bottom: 2%;">CREATE CHECK LIST</button>
    </form>
    <!-- form end -->
    <!-- php code start -->
    <?php    
    if (isset($_POST['create-check-list']) == true) {
        $fillUpTime =  date("Y-m-d H:i:s");
        $aadharNumber = $_SESSION['aadhar-number'];
        $machineCode = $_POST['machine-code'];
        $fireDetection = $_POST['fire-detection'];
        $hydraulicSafetyValve = $_POST['hydraulic-safety-valve'];
        $neutralSwitchInterlock = $_POST['neutral-switch-interlock'];
        $selfStartProtection = $_POST['self-start-protection'];
        $funcCutoffSwitch = $_POST['func-cutoff-switch'];
        $swingMotorBrake = $_POST['swing-motor-brake'];
        $fireResistantHydraulicHose = $_POST['fire-resistant-hydraulic-hose'];
        $turboChargeGuard = $_POST['turbo-charge'];
        $hydraulicTankVent = $_POST['hydraulic-tank-vent'];
        $bafflePlate = $_POST['baffle-plate'];
        $hydraulicCylinderStopper = $_POST['hydraulic-cylinder-stopper'];
        $rearVisionCamera = $_POST['rear-vision-camera'];
        $warningOperatorFatigue = $_POST['warning-operator-fatigue'];
        $stability = $_POST['stability-test'];
        $nonDestructiveTest = $_POST['non-destructive-test'];
        try{
            $mysql = new mysqli("localhost", "root", "", "id17132601_database1");
            if($mysql->connect_error)
                throw new Exception();
        }
        catch(Exception $e){
            echo '<div class="alert alert-danger position" role="alert">Cannot connect to database! Error: '. $mysql->connect_error .'.</div>';
            exit(0);
        }
        $sql = "INSERT INTO excavatorCheckList VALUES('$fillUpTime', '$aadharNumber', '$machineCode', '$fireDetection', '$hydraulicSafetyValve', '$neutralSwitchInterlock', '$selfStartProtection', '$funcCutoffSwitch', '$swingMotorBrake', '$fireResistantHydraulicHose', '$turboChargeGuard', '$hydraulicTankVent', '$bafflePlate', '$hydraulicCylinderStopper', '$rearVisionCamera', '$warningOperatorFatigue', '$stability', '$nonDestructiveTest')";        
        if($mysql->query($sql) == true){
            echo '<div class="alert alert-success position" role="alert">
            Check list for machine code: '. $machineCode .' created successfully.
            </div>';
            echo "<script>
                setTimeout(function() {
                window.location.href = \"create-check-list-excavator.php\";
                }, 2000);
                </script>";
        }
        else{
            echo '<div class="alert alert-warning position" role="alert">
            Check list was not created! Error: '. $mysql->error . '.</div>'; 
            exit(0);
        }
        $mysql->close();
    }
    ?>
    <!-- php code end -->
</body>

</html>