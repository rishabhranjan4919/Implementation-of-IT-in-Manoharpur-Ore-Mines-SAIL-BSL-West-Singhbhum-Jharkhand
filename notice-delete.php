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

    <title>User | Add User</title>

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
    <form method="POST" action="notice-delete.php" style="margin-left: 2%; margin-right: 2%; margin-top: 2%;">
        <!-- table start -->
        <table class="table table-striped">
            <legend>Delete Notice</legend>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NOTICE DATE</th>
                    <th scope="col">NOTICE TITLE</th>
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
                        Cannot connect to database! Error: ' . $mysql->connect_error . '.
                        </div>';
                    exit(0);
                }
                $sql = "SELECT * FROM notices";
                $ret = $mysql->query($sql);
                for ($i = 0; $i < $ret->num_rows; $i = $i + 1) {
                    $resarr = $ret->fetch_array();
                    echo '<tr>
                        <th scope="row">' . $i + 1 . '</th>
                        <td>' . $resarr[1] . '</td>
                        <td>' . $resarr[2] . '</td>
                        <td><div class="form-check">
                        <input class="form-check-input position-static" type="radio" name="selection" id="blankRadio1" value="' . $resarr[0] . '" aria-label="...">
                        </div></td>
                        </tr>';
                }
                ?>
            </tbody>
        </table>
        <!-- table end -->
        <button type="submit" class="btn btn-primary" name="delete-notice" style="width: 100%;">DELETE NOTICE</button>
    </form>
    <!-- form end -->
    <!-- php code start -->
    <?php
    if (isset($_POST['delete-notice']) == true) {
        $selection = $_POST['selection'];
        if ($selection == null) {
            echo '<div class="alert alert-warning position" role="alert">
                Please select a notice.
                </div>';
            exit(0);
        }
        $sql = "DELETE FROM notices WHERE NoticeId='$selection'";
        $ret = $mysql->query($sql);
        if ($ret != false) {
            echo '<div class="alert alert-success position" role="alert">Notice deleted successfully.</div>';
            echo "<script>
                    setTimeout(function() {
                    window.location.href = \"notice-delete.php\";
                    }, 2000);
                    </script>";
        } else {
            echo '<div class="alert alert-warning position" role="alert">
                Notice was not deleted! Error: ' . $mysql->error . '
                .</div>';
            exit(0);
        }
        $mysql->close();
    }
    ?>
    <!-- php code end -->
</body>

</html>