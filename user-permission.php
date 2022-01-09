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

    <title>User | Permission</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@100;300;400&display=swap');

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
    <form action="user-permission.php" method="POST" style="margin-left: 2%; margin-right: 2%; margin-top: 2%;">
        <legend>User Permission</legend>
        <!-- table start -->
        <table class="table table-striped">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">AADHAR NUMBER</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">SELECTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $mysql = new mysqli("localhost", "root", "", "id17132601_database1");
                    if ($mysql->connect_error)
                        throw new Exception();
                } catch (Exception $e) {
                    echo '<div class="alert alert-danger position" role="alert">
                    Cannot connect to database! Error: ' . $mysql->connect_error . '.</div>';
                    exit(0);
                }
                $sql = "SELECT * FROM credentials";
                $ret = $mysql->query($sql);
                for ($i = 0; $i < $ret->num_rows; $i = $i + 1) {
                    $retarr = $ret->fetch_array();
                    echo '<tr>
                        <th scope="row">' . ($i + 1) . '</th>
                        <td>' . $retarr[0] . '</td>
                        <td>' . $retarr[1] . '</td>                        
                        <td><div class="form-check">
                        <input class="form-check-input position-static" type="radio" name="aadhar-number" id="blankRadio1" value="' . $retarr[0] . '" aria-label="...">
                        </div></td>
                        </tr>';
                }
                ?>
            </tbody>
        </table>
        <!-- table end -->
        <?php
        $label = array("A-Register", "Contractor", "Check List", "ID-Card Generator", "Notice", "User");
        $n = count($label); //number of fields
        for ($i = 0; $i < $n; $i = $i + 1) {
            echo '<div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="inlineRadio1" name="permit" value="' . ($i + 1) . '">
            <label class="form-check-label" for="inlineRadio1">' . $label[$i] . '</label>
            </div>';
        }
        ?>
        <button type="submit" class="btn btn-primary" name="permit-user" style="width: 100%;">PERMIT USER</button>
    </form>
    <!-- form end -->
    <!-- php code start -->
    <?php
    if (isset($_POST['permit-user']) == true) {        
        try {
            $anum = $_POST['aadhar-number'];
            if ($anum == NULL)
                throw new Exception();
        } catch (Exception $e) {
            echo '<div class="alert alert-warning position" role="alert">
            Please select a user.</div>';
            exit(0);
        }        
        try {
            $permit = $_POST['permit'];
            if ($permit == NULL)
                throw new Exception();
        } catch (Exception $e) {
            echo '<div class="alert alert-warning position" role="alert">
            Please select permission.</div>';
            exit(0);
        }        
        $sql = "INSERT INTO permission VALUES('$anum','$permit')";
        if ($mysql->query($sql) == true) {
            echo '<div class="alert alert-success position" role="alert">
            Permission updated successfully.
            </div>';
            echo "<script>
                setTimeout(function() {
                window.location.href = \"user-permission.php\";
                }, 2000);
                </script>";
        } else {
            echo '<div class="alert alert-warning position" role="alert">
            Unable to update permission! Error: ' . $mysql->error . '.</div>';
        }
        $mysql->close();
    }
    ?>
    <!-- php code end -->

</body>

</html>