<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link rel="stylesheet" href="CSS/home_mediaQuery.css" />
  <link rel="stylesheet" href="CSS/footer.css">
  <link rel="stylesheet" href="CSS/about_us.css">
</head>

<body>

<?php session_start(); include 'navbar.php';?>

  <div class="main">
    <section class="aboutUs-section">
      <h1 class="aboutUs-h1">About Us</h1>
      <p class="aboutUs-p">Blood donation and transfusion service is an indispensable part of contemporary medicine and
        health care. Blood management has been recognized as a challenging task because of life threatening nature of
        blood products entails the punctilious administration due to its perishable nature & required timely processing
        and it also saves the life.</p>
      <p class="aboutUs-p">Such great challenge has been considerably alleviated with the development of information and
        computer technology. e-Blood Bank is an integrated blood bank automation system. This web based mechanism inter
        connects all the Blood Banks of the State into a single network. Integrated Blood Bank MIS refers the
        acquisition,
        validation, storage and circulation of various live data and information electronically regarding blood donation
        and transfusion service. Such system is able to assemble heterogeneous data into legible reports to support
        decision making from effective donor screening to optimal blood dissemination in the field. Those electronic
        processes will help the public for easy access to the blood availability status of blood banks on finger tips;
        so
        that he can place a requisition of a particular blood group in nearby blood bank (Especially rare groups) save a
        valuable life.</p>
      <p class="aboutUs-p">It also provides online status of blood group wise availability of blood units in all the
        licensed blood banks in the state. It includes online tracking and trailing system of the blood and blood
        products
        (components of blood) by the state level administrators. The system manages all the activities from blood
        collection both from camps & hospitals till the issue of blood units. It includes donor screening, blood
        collection, mandatory testing, storage and issue of the unit (whole human blood IP, different Blood component
        and
        aphaeresis blood products).</p>
    </section>

    <div class="container__cards ">
      <div class="card ">
        <div class="image-holder"><img
            src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
            alt="Couldn't Load"></div>
        <div class="card-content">
          <h1 class="name">Shlok Goswami</h1>
          <div class="description">
            <p>Developer</p>
            <p>Roll_No: 22IT461,2nd year, IT branch in BVM College.</p>
            <p>shlok.goswami2002@gmail.com</p>
            <P>Ph: 7016562277</P>
          </div>
        </div>
      </div>

      <div class="card ">
        <div class="image-holder">
          <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
            alt="Couldn't Load">
        </div>
        <div class="card-content">
          <h1 class="name">Rishi Patodiya</h1>
          <div class="description">
            <p>Developer</p>
            <p>Roll_No: 22IT447,2nd year, IT branch in BVM College.</p>
            <p>rishipatodiya12@gmail.com</p>
            <P>Ph: 8980402010</P>
          </div>
        </div>
      </div>

    </div>

  <?php include 'footer.php'; ?>
    
</body>
<script src="script/about_us.js"></script>
<script src="script/navbar.js"></script>

</html>