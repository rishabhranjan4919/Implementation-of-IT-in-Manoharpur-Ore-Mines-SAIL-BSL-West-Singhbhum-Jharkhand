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

    <title>Services</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@100;300;400&display=swap');

        * {
            font-family: 'Noto Sans Mono';
        }

        iframe {
            border: none;
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

    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">SAIL-MOM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php
                try {
                    $mysql = new mysqli("localhost", "root", "", "id17132601_database1");
                    if ($mysql->connect_error) {
                        throw new Exception();
                    }
                } catch (Exception $e) {
                    echo '<div class="alert alert-danger position" role="alert">
                    Cannot connect to database. Error: ' . $mysql->connect_error . '
                    .</div>';
                    exit(0);
                }
                $anum = $_SESSION['aadhar-number'];
                $sql = "SELECT permit FROM permission WHERE aadharNumber='$anum'";
                $ret = $mysql->query($sql);
                for ($i = 0; $i < $ret->num_rows; $i = $i + 1) {
                    $resarr = $ret->fetch_array();
                    switch ($resarr[0]) {
                        case 1:
                            echo '<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                                A-Register
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" onclick="changeAttribute(\'a-register-add.php\')">Add Record</a>
                                <a class="dropdown-item" onclick="changeAttribute(\'a-register-delete.php\')">Delete Record</a>                        
                                <a class="dropdown-item" onclick="changeAttribute(\'a-register-view.php\')">View Records</a>
                            </div>
                            </li>';
                            break;
                        case 2:
                            echo '<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                                Contractor
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" onclick="changeAttribute(\'contractor-add.php\')">Add</a>
                                <a class="dropdown-item" onclick="changeAttribute(\'contractor-remove.php\')">Remove</a>
                                <a class="dropdown-item" onclick="changeAttribute(\'contractor-view.php\')">View</a>
                            </div>
                            </li>';
                            break;
                        case 3:
                            echo '<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                                Machine Check List
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        
                                <a class="dropdown-item" onclick="changeAttribute(\'create-check-list-dumper.php\')">Create Dumper Check List</a>
                                <a class="dropdown-item" onclick="changeAttribute(\'view-check-list-dumper.php\')">View Dumper Check List</a>
                                <a class="dropdown-item" onclick="changeAttribute(\'create-check-list-excavator.php\')">Create Excavator Check List</a>
                                <a class="dropdown-item" onclick="changeAttribute(\'view-check-list-excavator.php\')">View Excavator Check List</a>
                                <a class="dropdown-item" onclick="changeAttribute(\'create-check-list-drill.php\')">Create Drill Check List</a>
                                <a class="dropdown-item" onclick="changeAttribute(\'view-check-list-drill.php\')">View Drill Check List</a>
                                <a class="dropdown-item" onclick="changeAttribute(\'create-check-list-cs-plant.php\')">Create Crushing and Screening Plant Check List</a>
                                <a class="dropdown-item" onclick="changeAttribute(\'view-check-list-cs-plant.php\')">View Crushing and Screening Plant Check List</a>
                                <a class="dropdown-item" onclick="changeAttribute(\'create-check-list-workshop.php\')">Create Workshop Check List</a>
                                <a class="dropdown-item" onclick="changeAttribute(\'view-check-list-workshop.php\')">View Workshop Check List</a>
                            </div>
                            </li>';
                            break;
                        case 4:
                            echo '<li class="nav-item">
                            <a class="nav-link" onclick="changeAttribute(\'id-card-generator.php\')">ID Card Generator</a>
                            </li>';
                            break;
                        case 5:
                            echo '<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                                Notice
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" onclick="changeAttribute(\'notice-add.php\')">Add Notice</a>
                                <a class="dropdown-item" onclick="changeAttribute(\'notice-delete.php\')">Delete Notice</a>
                            </div>
                            </li>';
                            break;
                        case 6:
                            echo '<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                                User
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" onclick="changeAttribute(\'user-add.php\')">Add</a>
                                <a class="dropdown-item" onclick="changeAttribute(\'user-remove.php\')">Remove</a>
                                <a class="dropdown-item" onclick="changeAttribute(\'user-permission.php\')">Permissions</a>                                
                            </div>
                            </li>';
                            break;
                    }
                }
                if ($anum == "360505233553") {                
                    echo '<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                        User
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" onclick="changeAttribute(\'user-add.php\')">Add</a>
                        <a class="dropdown-item" onclick="changeAttribute(\'user-remove.php\')">Remove</a>
                        <a class="dropdown-item" onclick="changeAttribute(\'user-permission.php\')">Permissions</a>                     
                        <a class="dropdown-item" onclick="changeAttribute(\'user-log.php\')">Log</a>                                
                    </div>
                    </li>';
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- navbar end -->
    <!-- javascript start -->
    <script>
        function changeAttribute(srcValue) {
            document.querySelector("iframe").setAttribute("src", srcValue);
        }
    </script>
    <!-- javascript end -->
    <!-- iframe start -->
    <iframe id="iframe-src" width="100%" height="887"></iframe>
    <!-- iframe end -->
</body>

</html>