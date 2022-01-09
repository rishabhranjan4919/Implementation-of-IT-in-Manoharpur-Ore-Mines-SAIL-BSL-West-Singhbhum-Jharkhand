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

    <title>A-Register | Add</title>
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
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
    <br /><br /><br />
    <!-- form start -->
    <form action="a-register-add.php" method="post" style="margin-left: 2%; margin-right: 2%; margin-bottom: 2%; margin-top: 2%; width: 96%;">
        <!-- part a start -->
        <legend id="part-a">Part-A</legend>
        <!-- personal details start -->
        <fieldset>
            <legend id="personal-details">Personal Details</legend>
            <input class="form-control" type="text" placeholder="Aadhar Number" name="aadhar-number" maxlength="12" required>
            <br />
            <input class="form-control" type="text" placeholder="Employee Code" name="employee-code" maxlength="10" required>
            <br />
            <input class="form-control" type="text" placeholder="Name" name="name" maxlength="15" required>
            <br />
            <input class="form-control" type="text" placeholder="Surname" name="surname" maxlength="15" required>
            <br />
            <label for="gender">Gender</label><select class="form-control" name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <br />
            <label>Date of birth</label><input class="form-control" type="date" name="date-of-birth" style="width: 25%;">
            <br />
            <input class="form-control" type="text" placeholder="Father's Name" name="father-name" maxlength="30" required>
            <br />
            <label for="nationality">Nationality</label><select class="form-control" name="nationality">
                <option value="Indian">Indian</option>
                <option value="Others">Others</option>
            </select>
        </fieldset>
        <!-- personal details end -->
        <br />
        <!-- job details start -->
        <fieldset>
            <legend id="job-details">Job Details</legend>
            <label for="education">Education</label><select class="form-control" name="education">
                <option value="Under-matric">Under-matric</option>
                <option value="Matric">Matric</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Under-graduate">Under-graduate</option>
                <option value="Graduate">Graduate</option>
                <option value="Post-graduate">Post-graduate</option>
            </select>
            <br />
            <input class="form-control" type="text" placeholder="Designation" name="designation" required>
            <br />
            <label for="category">Category</label><select class="form-control" name="category">
                <option value="Unskilled">Unskilled</option>
                <option value="Semi-skilled">Semi-skilled</option>
                <option value="Skilled">Skilled</option>
                <option value="Highly-skilled">Highly-skilled</option>
            </select>
            <br />
            <label for="type-of-employment">Type of employment</label><select class="form-control" name="type-of-employment">
                <option value="Temporary">Temporary</option>
                <option value="Permanent">Permanent</option>
            </select>
        </fieldset>
        <!-- job details end -->
        <br />
        <!-- contact details start -->
        <fieldset>
            <legend id="contact-details">Contact details</legend>
            <input class="form-control" type="text" placeholder="Mobile Number" name="mobile-number" maxlength="10" required>
            <br />
            <input class="form-control" type="text" placeholder="UAN Number" name="uan-number" maxlength="12" required>
            <br />
            <input class="form-control" type="text" placeholder="PAN Number" name="pan-number" maxlength="10" required>
            <br />
            <input class="form-control" type="text" placeholder="ESIC Number" name="esic-number" maxlength="11">
            <br />
            <input class="form-control" type="text" placeholder="LWF" name="lwf" maxlength="11">
            <br />
        </fieldset>
        <!-- contact details end -->
        <br />
        <!-- bank details start -->
        <fieldset>
            <legend id="bank-details">Bank details</legend>
            <input class="form-control" type="text" placeholder="Account Number" name="account-number" maxlength="12" required>
            <br />
            <input class="form-control" type="text" placeholder="Bank Name" name="bank-name" maxlength="15" required>
            <br />
            <input class="form-control" type="text" placeholder="IFSC Code" name="ifsc-code" maxlength="12" required>
        </fieldset>
        <!-- bank details end -->
        <br />
        <!-- address details start -->
        <fieldset>
            <legend id="address-details">Address details</legend>
            <input class="form-control" type="text" placeholder="Present Address" name="present-addr" maxlength="200" required>
            <br />
            <input class="form-control" type="text" placeholder="Permanent Address" name="permanent-addr" maxlength="200" required>
        </fieldset>
        <!-- address details end -->
        <br />
        <!-- other details start -->
        <fieldset>
            <legend id="other-details">Other details</legend>
            <input class="form-control" type="text" placeholder="Service Book Details" name="service-book-num">
            <br />
            <label>Date of Exit</label>
            <input class="form-control" type="date" name="date-of-exit" style="width: 25%;">
            <br />
            <input class="form-control" type="text" placeholder="Reason of Exit" name="reason-of-exit" maxlength="15" required>
            <br />
            <input class="form-control" type="text" placeholder="Identification Mark" name="iden-mark" maxlength="30" required>
            <br />
            <input class="form-control" type="text" placeholder="Remarks" name="remark-1" maxlength="15">
        </fieldset>
        <!-- other details end -->
        <br />
        <!-- documents start -->
        <fieldset>
            <legend id="documents">Documents</legend>
            <div class="form-group">
                <label for="photo">Photo(File size must be less than 100 kB)</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="photo" required>
            </div>
            <div class="form-group">
                <label for="signature">Signature(File size must be less than 100 kB)</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="signature" required>
            </div>
        </fieldset>
        <!-- documents end -->
        <!-- part a end -->
        <hr />
        <!-- part b start -->
        <fieldset>
            <legend id="part-b">Part-B</legend>
            <input class="form-control" type="text" placeholder="Token Number" name="token-num" maxlength="10" required>
            <br />
            <label for="date-of-appointment">Date of Appointment</label><input class="form-control" type="date" name="date-of-appt" style="width: 25%;">
            <br />
            <input class="form-control" type="text" placeholder="Certificate Number of Age/ fitness taken(for 14 to 18 years)" name="cert-num" maxlength="10">
            <br />
            <label for="place-of-employment">Place of Employment</label>
            <select class="form-control" name="place-of-employment">
                <option value="Underground">Underground</option>
                <option value="Open-cast">Open-cast</option>
                <option value="Surface">Surface</option>
            </select>
            <br />
            <label id="pme-date">PME Date</label><input class="form-control" type="date" name="pme-date" style="width: 25%;" />
            <br />
            <!-- vocational training details start -->
            <fieldset>
                <legend id="vocational-details">Vocational training details</legend>
                <input class="form-control" type="text" placeholder="Certificate Number" name="voc-train-num" maxlength="10">
                <br />
                <label for="vt-date">Date</label><input class="form-control" type="date" name="voc-train-date" style="width: 25%;" />
            </fieldset>
            <!-- vocational training details end -->
            <br />
            <!-- nominee details start -->
            <fieldset>
                <legend id="nominee-details">Nominee details</legend>
                <input class="form-control" type="text" placeholder="Name" name="nom-name" maxlength="30" required>
                <br />
                <input class="form-control" type="text" placeholder="Address" name="nom-addr" maxlength="200" required>
            </fieldset>
            <!-- nominee details end -->
            <br />
            <!-- emergency contact details start -->
            <fieldset>
                <legend id="emergency-details">Emergency contact details</legend>
                <input class="form-control" type="text" placeholder="Name" name="emer-cont-name" maxlength="30" required>
                <br />
                <input class="form-control" type="text" placeholder="Address" name="emer-cont-addr" maxlength="200" required>
                <br />
                <input class="form-control" type="text" placeholder="Mobile" name="emer-cont-num" maxlength="11" required>
            </fieldset>
            <!-- emergency contact details end -->
            <br />
            <input class="form-control" type="text" placeholder="Remarks" name="remark-2" maxlength="15">
            <br />
            <!-- part b end -->
            <button type="submit" class="btn btn-primary" name="add-record" style="width: 100%;">ADD RECORD</button>
    </form>
    <?php
    if (isset($_POST['add-record']) == true) {
        $anum = $_POST['aadhar-number'];
        $code = $_POST['employee-code'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $gender = $_POST['gender'];
        $dob = $_POST['date-of-birth'];
        $fname = $_POST['father-name'];
        $nat = $_POST['nationality'];
        $edu = $_POST['education'];
        $desg = $_POST['designation'];
        $cat = $_POST['category'];
        $toe = $_POST['type-of-employment'];
        $mob = $_POST['mobile-number'];
        $uan = $_POST['uan-number'];
        $pan = $_POST['pan-number'];
        $esic = $_POST['esic-number'];
        $lwf = $_POST['lwf'];
        $accnum = $_POST['account-number'];
        $bname = $_POST['bank-name'];
        $ifsc = $_POST['ifsc-code'];
        $preadd = $_POST['present-addr'];
        $peradd = $_POST['permanent-addr'];
        $serbnum = $_POST['service-book-num'];
        $doe = $_POST['date-of-exit'];
        $roe = $_POST['reason-of-exit'];
        $idmark = $_POST['iden-mark'];
        $rem1 = $_POST['remark-1'];
        $photo = $_FILES['photo']['name'];
        $sign = $_FILES['signature']['name'];
        $token = $_POST['token-num'];
        $doa = $_POST['date-of-appt'];
        $fitcernum = $_POST['cert-num'];
        $poemp = $_POST['place-of-employment'];
        $pmedate = $_POST['pme-date'];
        $vtnum = $_POST['voc-train-num'];
        $vtdate = $_POST['voc-train-date'];
        $nomname = $_POST['nom-name'];
        $nomadd = $_POST['nom-addr'];
        $ecname = $_POST['emer-cont-name'];
        $ecadd = $_POST['emer-cont-addr'];
        $ecmob = $_POST['emer-cont-num'];
        $rem2 = $_POST['remark-2'];
        if ($_FILES['photo']['size'] > 102400 || $_FILES['signature']['size'] > 102400) {
            echo '<div class="alert alert-warning position" role="alert">
            Upload failed! Reason: File size exceeded 100 KB.</div>';
            exit(0);
        }
        $targetdir = "Photos/";
        $filename = $targetdir . basename($_FILES['photo']['name']);
        $tempname = $_FILES['photo']['tmp_name'];
        move_uploaded_file($tempname, $filename);
        $photo = $filename;
        $targetdir = "Signatures/";
        $filename = $targetdir . basename($_FILES['signature']['name']);
        $tempname = $_FILES['signature']['tmp_name'];
        move_uploaded_file($tempname, $filename);
        $sign = $filename;
        try {
            $mysql = new mysqli("localhost", "root", "", "id17132601_database1");
            if ($mysql->connect_error)
                throw new Exception();
        } catch (Exception $e) {
            echo '<div class="alert alert-danger position" role="alert">
            Cannot connect to database! Error: ' . $mysql->connect_error . '.</div>';
            exit(0);
        }
        $sql1 = "INSERT INTO personaldetails VALUES('$anum','$code','$name','$surname','$gender','$dob','$fname','$nat')";
        $sql2 = "INSERT INTO jobdetails VALUES('$anum', '$edu','$desg','$cat','$toe')";
        $sql3 = "INSERT INTO contactdetails VALUES('$anum','$mob','$uan','$pan','$esic','$lwf')";
        $sql4 = "INSERT INTO bankdetails VALUES('$anum','$accnum','$bname','$ifsc')";
        $sql5 = "INSERT INTO addressdetails VALUES('$anum','$preadd','$peradd')";
        $sql6 = "INSERT INTO otherdetails VALUES('$anum','$serbnum','$doe','$roe','$idmark','$rem1')";
        $sql7 = "INSERT INTO documents VALUES('$anum','$photo','$sign')";
        $sql8 = "INSERT INTO partb VALUES('$anum','$token','$doa','$fitcernum','$poemp','$pmedate','$vtnum','$vtdate','$nomname','$nomadd','$ecname','$ecadd','$ecmob','$rem2')";
        if ($mysql->query($sql1) === true && $mysql->query($sql2) === true && $mysql->query($sql3) === true && $mysql->query($sql4) === true && $mysql->query($sql5) === true && $mysql->query($sql6) === true && $mysql->query($sql7) === true && $mysql->query($sql8) === true) {
            echo '<div class="alert alert-success position" role="alert">
            Record added successfully.</div>';
            echo '<script>
                setTimeout(function() {
                window.location.href = \"a-register-add.php\";
                }, 2000);
                </script>';
        } else {
            echo '<div class="alert alert-warning position" role="alert">
            Record was not added! Error: ' . $mysql->error . '.</div>';
            exit(0);
        }
        $mysql->close();
    }
    ?>
</body>

</html>