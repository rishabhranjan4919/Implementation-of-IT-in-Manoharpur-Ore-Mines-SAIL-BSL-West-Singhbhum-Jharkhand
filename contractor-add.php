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
    <title>Contractor | Add</title>
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
    <form method="POST" action="contractor-add.php" style="margin-left: 2%; margin-right: 2%; margin-top: 2%;">
        <legend>Add Contractor</legend>
        <input class="form-control" type="text" placeholder="Contractor's name" name="cont-name" required>
        <br />
        <input class="form-control" type="text" placeholder="Work order number" name="work-ord-number" required>
        <br />
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="cont-doc">
            <label class="custom-file-label" for="Contract document">Contract Document</label>
        </div>
        <br />
        <br />
        <!-- table start -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">AADHAR NUMBER</th>
                    <th scope="col">EMPLOYEE NAME</th>
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
                    echo '<div class="alert alert-danger position" role="alert">Cannot connect to database! Error: ' . $mysql->connect_error . '.</div>';
                    exit(0);
                }
                $sql = "SELECT personaldetails.AadharNumber,personaldetails.Name,personaldetails.Surname FROM personaldetails,jobdetails WHERE personaldetails.AadharNumber=jobdetails.AadharNumber AND jobdetails.TypeOfEmployment='Temporary' ORDER BY Name ASC";
                $res = $mysql->query($sql);
                for ($i = 0; $i < $res->num_rows; $i = $i + 1) {
                    $resarr = $res->fetch_array();
                    $name = $resarr['Name'] . " " . $resarr['Surname'];
                    echo '<tr><th scope="row">' . $i + 1 . '</th><td>' . $resarr[0] . '</td><td>' . $name . '</td><td><input type="checkbox" name="selection[]" value="' . $resarr[0] . '" /></td></tr>';
                }
                ?>
            </tbody>
        </table>
        <!-- table end -->
        <button type="submit" class="btn btn-primary" name="add-contractor" style="width: 100%; margin-bottom: 2%;">ADD CONTRACTOR</button>
    </form>
    <!-- form end -->
    <?php   
    if (isset($_POST['add-contractor']) == true) {
        $contname = $_POST['cont-name'];
        $wonum = $_POST['work-ord-number'];
        $emparr = $_POST['selection'];
        if ($emparr == null) {
            echo '<div class="alert alert-warning position" role="alert">
            Please select at least one employee.
            </div>';
            exit(0);
        }
        $flag = 0;
        for ($i = 0; $i < count($emparr); $i = $i + 1) {
            $sql1 = "SELECT Name,Surname FROM personaldetails WHERE AadharNumber=$emparr[$i]";
            $res = $mysql->query($sql1);
            $row = $res->fetch_array();
            $name = $row['Name'] . " " . $row['Surname'];
            $sql2 = "INSERT INTO contractor VALUES('$contname','$wonum','$emparr[$i]','$name')";
            $mysql->query($sql2);
            if ($mysql == false) {
                $flag = 1;
                break;
            }
        }
        if ($flag == 0) {
            echo '<div class="alert alert-success position" role="alert">
            Contractor added successfully.
            </div>';
            echo '<script>
            setTimeout(function() {
                window.location.href = \"contractor-add.php\";
            }, 2000);
            </script>';
        } else if ($flag == 1) {
            echo '<div class="alert alert-warning position" role="alert">
            Unable to add contractor! Error: ' . $mysql->error . '.
            </div>';
            exit(0);
        }
        $mysql->close();
    }
    ?>
</body>

</html>