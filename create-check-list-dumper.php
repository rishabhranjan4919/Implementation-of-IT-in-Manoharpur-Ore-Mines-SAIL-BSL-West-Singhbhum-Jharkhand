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

    <title>Check List | Dumper</title>
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
    <form method="POST" action="create-check-list-dumper.php" style="margin-left: 2%; margin-right: 2%; margin-top: 2%;">
        <legend>Dumper Check List</legend>
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
        <?php
        $label = array("Horn", "Accelerator", "Guages", "Reverse AV alarm with flasher light", "Seat belt", "Rear vision mirror", "Rear flood light", "Turning indicators", "Head lamp", "Clean windscreen and window", "Propeller shaft guard", "Anti-skid", "Tail end protection", "GPS-GSM based navigation system", "Fatigue control system", "Insulation of hot parts of engine like turbocharger, exhaust and manifold", "Semi-automatic fire detection and suppression system", "Cabin guard extension", "Exhaust/ retard brake", "Limiting speed device(30 kmph)", "Provision of two brakes, one of which is fail safety", "Body lifting position locking arrangement", "Blind spot mirror", "Fire resistant hoses at hot zones", "Electric wires and sleeves are to be of fire resistant quality", "Turbo Charge Guard and exhaust tube coated with heat insulated paint", "Battery cut off switch", "Retro reflective reflectors on all sides", "Seat belt reminder", "Proximity warning devices", "Rear vision camera", "Auto dipping system", "Load indicator and recorder", "Neutral switch interlock with gear", "Self starter protection guard", "Mechanical steering lock", "Mechanical device to avoid head to tail collision of dumpers", "Dump body raised indicator with warning", "Dump body stabilizer");
        $name = array("horn", "accelerator", "guage", "reverse-alarm", "seat-belt", "rear-vision-mirror", "flood-light", "turning-indicator", "head-lamp", "windscreen-window", "shaft-guard", "anti-skid", "tail-end", "gps", "fatigue-control", "insulation", "fire-detection", "cabin-guard", "retard-brake", "speed-limiter", "two-brake", "body-lifting-lock", "blind-spot", "fire-resistant-hose", "electric-wire-quality", "turbo-charge-guard", "battery-cutoff", "retro-reflector", "seat-belt-reminder", "proximity-warning", "rear-vision-camera", "auto-dipping", "load-indicator", "neutral-switch-interlock", "self-start-protect", "steer-lock", "tail-coll-device", "dump-raise-indicator", "dump-stabilize");
        $n = count($name);  //number of fields
        for ($i = 0; $i < $n; $i = $i + 1) {
            echo '<label for="'. $name[$i] .'">'. $label[$i] .'</label><select class="form-control" name="'. $name[$i] .'">
                <option value="1">Yes</option>
                <option value="0">No</option>
                </select>';
            echo '<br />';
        }
        ?>
        <button type="submit" class="btn btn-primary" name="create-check-list" style="width: 100%; margin-bottom: 2%;">CRAETE CHECK LIST</button>
    </form>
    <!-- form end -->
    <!-- php code start -->
    <?php    
    if (isset($_POST['create-check-list']) == true) {
        $fillUpTime =  date("Y-m-d H:i:s");
        $aadharNumber = $_SESSION['aadhar-number'];
        $machineCode = $_POST['machine-code'];
        $horn = $_POST['horn'];
        $accelerator = $_POST['accelerator'];
        $guage = $_POST['guage'];
        $reverseAlarm = $_POST['reverse-alarm'];
        $seatBelt = $_POST['seat-belt'];
        $rearVisionMirror = $_POST['rear-vision-mirror'];
        $floodLight = $_POST['flood-light'];
        $turningIndicator = $_POST['turning-indicator'];
        $headLamp = $_POST['head-lamp'];
        $windscreenWindow = $_POST['windscreen-window'];
        $shaftGuard = $_POST['shaft-guard'];
        $antiSkid = $_POST['anti-skid'];
        $tailEnd = $_POST['tail-end'];
        $gps = $_POST['gps'];
        $fatigueControl = $_POST['fatigue-control'];
        $insulation = $_POST['insulation'];
        $fireDetection = $_POST['fire-detection'];
        $cabinGuard = $_POST['cabin-guard'];
        $retardBrake = $_POST['retard-brake'];
        $speedLimiter = $_POST['speed-limiter'];
        $twoBrake = $_POST['two-brake'];
        $bodyLiftingLock = $_POST['body-lifting-lock'];
        $blindspot = $_POST['blind-spot'];
        $fireResistantHose = $_POST['fire-resistant-hose'];
        $electricWireQuality = $_POST['electric-wire-quality'];
        $turboChargeGuard = $_POST['turbo-charge-guard'];
        $batteryCutoff = $_POST['battery-cutoff'];
        $retroReflector = $_POST['retro-reflector'];
        $seatBeltReminder = $_POST['seat-belt-reminder'];
        $proximityWarning = $_POST['proximity-warning'];
        $rearVisionCamera = $_POST['rear-vision-camera'];
        $autoDipping = $_POST['auto-dipping'];
        $loadIndicator = $_POST['load-indicator'];
        $neutralSwitchInterlock = $_POST['neutral-switch-interlock'];
        $selfStartProtection = $_POST['self-start-protect'];
        $steerLock = $_POST['steer-lock'];
        $tailCollDevice = $_POST['tail-coll-device'];
        $dumpRaiseIndicator = $_POST['dump-raise-indicator'];
        $dumpStabilize = $_POST['dump-stabilize'];        
        try{
            $mysql = new mysqli("localhost", "root", "", "id17132601_database1");
            if($mysql->connect_error)
                throw new Exception();
        }
        catch(Exception $e){
            echo '<div class="alert alert-danger position" role="alert">Cannot connect to database! Error: '. $mysql->connect_error .'.</div>';
            exit(0);
        }
        $sql = "INSERT INTO dumperchecklist VALUES('$fillUpTime', '$aadharNumber', '$machineCode', '$horn', '$accelerator', '$guage', '$reverseAlarm', '$seatBelt', '$rearVisionMirror', '$floodLight', '$turningIndicator', '$headLamp', '$windscreenWindow', '$shaftGuard', '$antiSkid', '$tailEnd', '$gps', '$fatigueControl', '$insulation', '$fireDetection','$cabinGuard', '$retardBrake', '$speedLimiter', '$twoBrake', '$bodyLiftingLock', '$blindspot', '$fireResistantHose', '$electricWireQuality', '$turboChargeGuard', '$batteryCutoff', '$retroReflector', '$seatBeltReminder', '$proximityWarning', '$rearVisionCamera', '$autoDipping', '$loadIndicator', '$neutralSwitchInterlock', '$selfStartProtection', '$steerLock', '$tailCollDevice', '$dumpRaiseIndicator', '$dumpStabilize')";
        if($mysql->query($sql) == true){
            echo '<div class="alert alert-success position" role="alert">
            Check list for machine code: '. $machineCode .' created successfully.
            </div>';
            echo "<script>
                setTimeout(function() {
                window.location.href = \"create-check-list-dumper.php\";
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