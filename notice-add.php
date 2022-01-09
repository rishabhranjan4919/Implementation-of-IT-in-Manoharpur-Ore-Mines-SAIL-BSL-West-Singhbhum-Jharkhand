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
    <title>Notice | Add</title>
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
    <form method="POST" action="notice-add.php" enctype="multipart/form-data" style="margin-top: 2%; margin-left: 2%; margin-right: 2%;">
        <legend>Add Notice</legend>
        <div class="form-group">
            <label for="File">(File size should be less than 5 MB)</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="notice">
        </div>        
        <br />
        <button type="submit" class="btn btn-primary" name="add-notice" style="width: 100%;">ADD NOTICE</button>
    </form>
    <!-- form end -->
    <!-- php code start -->
    <?php
    if (isset($_POST['add-notice']) == true) {
        try {
            $mysql = new mysqli("localhost", "root", "", "id17132601_database1");
            if ($mysql->connect_error) {
                throw new Exception();
            }
        } catch (Exception $e) {
            echo '<div class="alert alert-danger position" role="alert">
            Cannot connect to database! Error: ' . $mysql->connect_error . '.
            </div>';
            exit(0);
        }
        $name = $_FILES['notice']['name'];
        if ($_FILES['Noticepdf']['size'] > 5242880) {
            echo '<div class="alert alert-warning position" role="alert">
            Upload failed! Error: File size exceeded 5 MB.
            </div>';
            exit(0);
        }
        $date = date("Y-m-d");
        $sql = "INSERT INTO notices(NoticeDate,NoticeName) VALUES('$date','$name')";
        $ret = $mysql->query($sql);
        $targetdir = "Notices/";
        $filename = $targetdir . basename($_FILES['Noticepdf']['name']);
        $tempname = $_FILES['Noticepdf']['tmp_name'];
        if (move_uploaded_file($tempname, $filename) == true) {
            echo '<div class="alert alert-success position" role="alert">
            Notice uploaded successfully.
            </div>';
            echo '<script>
            setTimeout(function() {
                window.location.href = \"notice-add.php\";
            }, 2000);
            </script>';
        } else {
            echo '<div class="alert alert-warning position" role="alert"> 
                Unable to add notice! Error: ' . $mysql->error . '.
                </div>';
            exit(0);
        }
        $mysql->close();
    }
    ?>
    <!-- php code end -->

</body>

</html>