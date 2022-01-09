<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  <title>Home</title>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@100;300;400&display=swap');

    * {
      font-family: 'Noto Sans Mono';
    }

    .margin {
      margin-left: 2%;
      margin-right: 2%;
    }
  </style>
</head>

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

<body>
  <!-- navbar start -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="position: fixed; width: 100%; opacity: 0.9">
    <a class="navbar-brand" href="#">SAIL-MOM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#notice">Notice</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about-mine">About mine</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#head-of-department">Head of department</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- navbar end -->
  <br />
  <br />
  <br />
  <div class="margin">
    <!-- notice start -->
    <h3 id="notice">Notice</h3>
    <?php
    $mysql = new mysqli("localhost", "root", "", "id17132601_database1");
    $sql = "SELECT * FROM notices";
    $ret = $mysql->query($sql);
    echo '<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">DATE</th>
            <th scope="col">TITLE</th>
        </tr>
    </thead><tbody>';
    for ($i = 0; $i < $ret->num_rows; $i = $i + 1) {
      $row = $ret->fetch_array();
      $row[1] = date("d-M-Y", strtotime($row[1]));
      echo '<tr><th scope="row">' . ($i + 1) . '</th><td>' . $row[1] . '</td><td><a href="Notices/' . $row[2] . '" download>' . $row[2] . '</td></tr>';
    }
    echo '</tbody></table>';
    ?>
    <!-- notice end -->
    <br />
    <!-- about-mine start -->
    <h3 id="about-mine">About mine</h3>
    <table class="table table-striped">
      <figcaption class="figure-caption">Table 1: Mining leases of Manoharpur Ore Mines</figcaption>
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">LEASE NAME</th>
          <th scope="col">LEASE AREA(IN HECTARES)</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Ajitaburu</td>
          <td>323.887</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Mclellan (Budhaburu)</td>
          <td>823.617</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Dhobil</td>
          <td>513.036</td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>Sukri-Luturburu</td>
          <td>609.554</td>
        </tr>
        <tr>
          <th scope="row">5</th>
          <td>Sukri-Luturburu</td>
          <td>609.554</td>
        </tr>
        <tr>
          <th scope="row">6</th>
          <td>Anqua</td>
          <td>67.178</td>
        </tr>
        <tr>
          <th scope="row">7</th>
          <td>Tatiburu</td>
          <td>38.85</td>
        </tr>
        <tr>
          <th scope="row"></th>
          <td style="font-weight: bold">Total</td>
          <td style="font-weight: bold">2376.122</td>
        </tr>
      </tbody>
    </table>
    <figure class="figure" style="display: flex;">

      <img src="image/chiria-lease-1.png" class="figure-img img-fluid rounded" alt="chiria-lease-1" style="width: 30%; height: 30%;">
      <ul style="float: right">
        <li>Three leases (Ajitaburu Mclellan Sukri-Luturburu) have been operated in the past. Ajitaburu was operated till 1995, Mclellan till 2005, Sukri-Luturburu till 2009 and these leases are non-operational at present for want of stage-II forest clearance.</li>
        <li>I Forest Clearance has been obtained for 595.075 ha on 07.03.2011. (Budhaburu-379.228 ha, Ajitaburu-153.036 ha,Sukri-33.400 ha and Dhobil-29.411 ha.).</li>
        <li>Two small leases i.e. Anqua and Tatiburu have neither been explored nor operated since their grant.</li>
        <li>The mining in Dhobil at annual production rate of 0.75 MTPA as per the capacity of Environment Clearance and approved Mining Plan.</li>
      </ul>
    </figure>
    <!-- about-mine end -->
  </div>  
  <!-- contact start -->
  <div class="card" style="position: absolute; width: 100%; border: none; bottom: -1; background-color: lightgray" id="contact">
    <div class="card-body">
      <a href="https://wa.me/7781023568"><img src="logo/whatsapp-logo.png" style="height: 20px; width: 20px;"></a>
      <a href="https://www.instagram.com/rishabhranjan_ig/"><img src="logo/instagram-logo.png" style="height: 20px; width: 20px;"></a>
      <a href="https://www.linkedin.com/in/rishabh-ranjan-4b7495196/"><img src="logo/linkedin-logo.png" style="height: 20px; width: 20px;"></a>
      <a href="https://github.com/rishabhranjan4919"><img src="logo/github-logo.png" style="height: 20px; width: 20px;"></a>
      <a href="https://www.facebook.com/rishabhranjan.fb/"><img src="logo/facebook-logo.png" style="height: 20px; width: 20px;"></a>
    </div>
  </div>
  <!-- contact end -->
</body>

</html>