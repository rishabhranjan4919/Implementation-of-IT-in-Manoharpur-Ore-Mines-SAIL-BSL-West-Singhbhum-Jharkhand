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

    <title>A-Register | View</title>
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
    <!-- table start -->
    <table class="table table-bordered" style="margin-left: 2%; margin-bottom: 2%; margin-right: 2%; margin-top: 2%; width: 400%;">
        <thead>
            <tr>
                <th scope="col" colspan="30">PART-A</th>
                <th scope="col" colspan="13">PART-B</th>                
            </tr>
            <tr>
                <th scope="col">#</th>
                <th scope="col">AADHAR NUMBER</th>
                <th scope="col">EMPLOYEE CODE</th>
                <th scope="col">NAME</th>
                <th scope="col">SURNAME</th>
                <th scope="col">GENDER</th>
                <th scope="col">DATE OF BIRTH</th>
                <th scope="col">FATHER'S NAME</th>
                <th scope="col">NATIONALITY</th>
                <th scope="col">EDUCATION LEVEL</th>
                <th scope="col">DESIGNATION</th>
                <th scope="col">CATEGORY</th>
                <th scope="col">TYPE OF EMPLOYMENT</th>
                <th scope="col">MOBILE NUMBER</th>
                <th scope="col">UAN NUMBER</th>
                <th scope="col">PAN</th>
                <th scope="col">ESIC NUMBER</th>
                <th scope="col">LWF</th>
                <th scope="col">ACCOUNT NUMBER</th>
                <th scope="col">BANK NAME</th>
                <th scope="col">IFSC CODE</th>
                <th scope="col">PRESENT ADDRESS</th>
                <th scope="col">PERMANENT ADDRESS</th>
                <th scope="col">SERVICE BOOK NUMBER</th>
                <th scope="col">DATE OF EXIT</th>
                <th scope="col">REASON OF EXIT</th>
                <th scope="col">IDENTIFICATION MARK</th>
                <th scope="col">REMARKS</th>
                <th scope="col">PHOTO</th>
                <th scope="col">SIGNATURE</th>
                <th scope="col">TOKEN NUMBER</th>
                <th scope="col">DATE OF FIRST APPOINTMENT</th>
                <th scope="col">AGE/ FITNESS CERTIFICATE NUMBER</th>
                <th scope="col">PLACE OF EMPLOYMENT</th>
                <th scope="col">PME DATE</th>
                <th scope="col">VT CERTIFICATE NUMBER</th>
                <th scope="col">VT CERTIFICATE DATE</th>
                <th scope="col">NOMINEE NAME</th>
                <th scope="col">NOMINEE ADDRESS</th>
                <th scope="col">EMERGENCY CONTACT NAME</th>
                <th scope="col">EMERGENCY CONTACT ADDRESS</th>
                <th scope="col">EMERGENCY CONTACT MOB NO</th>
                <th scope="col">REMARKS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM personaldetails NATURAL JOIN jobdetails NATURAL JOIN contactdetails NATURAL JOIN bankdetails NATURAL JOIN addressdetails NATURAL JOIN otherdetails NATURAL JOIN documents NATURAL JOIN partb ORDER BY Name ASC";
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
            $res = $mysql->query($sql);
            for ($i = 0; $i < $res->num_rows; $i = $i + 1) {
                $resarr = $res->fetch_array();
                if ($resarr['AadharNumber'] == '360505233553')
                    continue;
                $resarr['DateOfBirth'] = date('d-M-Y', strtotime($resarr['DateOfBirth']));
                $resarr['DateOfExit'] = date('d-M-Y', strtotime($resarr['DateOfExit']));
                $resarr['DateFirstAppnt'] = date('d-M-Y', strtotime($resarr['DateFirstAppnt']));
                $resarr['PMEDate'] = date('d-M-Y', strtotime($resarr['PMEDate']));
                $resarr['VTDate'] = date('d-M-Y', strtotime($resarr['VTDate']));
                echo '<tr>
                        <th scope="row">' . ($i+1) . '</th>
                    <td>' . $resarr['AadharNumber'] . '</td>
                    <td>' . $resarr['EmpCode'] . '</td>
                    <td>' . $resarr['Name'] . '</td>
                    <td>' . $resarr['Surname'] . '</td>
                    <td>' . $resarr['Gender'] . '</td>
                    <td>' . $resarr['DateOfBirth'] . '</td>
                    <td>' . $resarr['FatherName'] . '</td>
                    <td>' . $resarr['Nationality'] . '</td>
                    <td>' . $resarr['EducationLevel'] . '</td>
                    <td>' . $resarr['Designation'] . '</td>
                    <td>' . $resarr['Category'] . '</td>
                    <td>' . $resarr['TypeOfEmployment'] . '</td>
                    <td>' . $resarr['MobileNumber'] . '</td>
                    <td>' . $resarr['UANNumber'] . '</td>
                    <td>' . $resarr['PANNumber'] . '</td>
                    <td>' . $resarr['ESICNumber'] . '</td>
                    <td>' . $resarr['LWF'] . '</td>
                    <td>' . $resarr['AccountNumber'] . '</td>
                    <td>' . $resarr['BankName'] . '</td>
                    <td>' . $resarr['IFSCCode'] . '</td>
                    <td>' . $resarr['PresentAddress'] . '</td>
                    <td>' . $resarr['PermanentAddress'] . '</td>
                    <td>' . $resarr['ServiceBookNumber'] . '</td>
                    <td>' . $resarr['DateOfExit'] . '</td>
                    <td>' . $resarr['ReasonOfExit'] . '</td>
                    <td>' . $resarr['IdentificationMark'] . '</td>
                    <td>' . $resarr['Remarks'] . '</td>
                    <td><a href="' . $resarr['Photo'] . '" target="_blank"><img class="ImgTable" src="' . $resarr['Photo'] . '" alt="' . $resarr['Photo'] . '" style="height: 100%; width: 100%" /></a></td>
                    <td><a href="' . $resarr['Signature'] . '" target="_blank"><img class="ImgTable" src="' . $resarr['Signature'] . '" alt="' . $resarr['Signature'] . '" style="height: 100%; width: 100%" /></a></td>
                    <td>' . $resarr['TokenNumber'] . '</td>
                    <td>' . $resarr['DateFirstAppnt'] . '</td>
                    <td>' . $resarr['CertAgeFitNum'] . '</td>
                    <td>' . $resarr['PlaceOfEmp'] . '</td>
                    <td>' . $resarr['PMEDate'] . '</td>
                    <td>' . $resarr['VTNumber'] . '</td>
                    <td>' . $resarr['VTDate'] . '</td>
                    <td>' . $resarr['NomName'] . '</td>
                    <td>' . $resarr['NomAdd'] . '</td>
                    <td>' . $resarr['EmerName'] . '</td>
                    <td>' . $resarr['EmerAdd'] . '</td>
                    <td>' . $resarr['EmerMob'] . '</td>
                    <td>' . $resarr['Remarks'] . '</td></tr>';
            }
            echo '</tbody></table>';
            ?>
        </tbody>
    </table>
    <!-- table end -->
</body>

</html>