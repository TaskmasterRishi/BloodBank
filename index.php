<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="Icon/Icon.png" />
  <link rel="stylesheet" href="CSS/home2.css" />
  <link rel="stylesheet" href="CSS/home_mediaQuery.css" />
  <title>Red Bank</title>
</head>

<body>
  <?php session_start(); unset($_SESSION["camp_id"]); include 'navbar.php';
  ?>
  <div class="main">
    <!-- Image slider Starts-->
    <div class="slider">
      <div class="slides">
        <!--radio buttons start-->
        <input type="radio" name="radio-btn" id="radio1" />
        <input type="radio" name="radio-btn" id="radio2" />
        <input type="radio" name="radio-btn" id="radio3" />
        <input type="radio" name="radio-btn" id="radio4" />
        <!--radio buttons end-->
        <!--slide images start-->
        <div class="slide first">
          <img src="Image/Blood-facts_10-illustration-graphics__canteen.png" alt="" />
          <div class="caption">Blood Bank</div>
        </div>
        <div class="slide">
          <img src="Image/Blood Bank 1.jpg" alt="" />
        </div>
        <div class="slide">
          <img src="Image/Blood Bank 2.jpg" alt="" />
        </div>
        <div class="slide">
          <img src="Image/Blood Bank 3.jpg" alt="" />
        </div>
        <!--slide images end-->
      </div>
      <!--manual navigation start-->
      <div class="navigation-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
        <label for="radio4" class="manual-btn"></label>
      </div>
      <!--manual navigation end-->
    </div>
    <!--image slider end-->
    <!-- Image slider Ends-->
    <section class="whyDonateBlood" id="whyDonateBlood">
      <!-- Content for Become a Donor section goes here -->
      <h1 class="scroll">Why Should I Donate Blood ?</h1>
      <div class="float-con">
        <img class="scroll" src="Image/whyDonateBlood.png" alt="BloodInfo" width="400vw" />
        <br>
        <p class="scroll">Blood is the most precious gift that anyone can give to another person — the gift of life. A
          decision to
          donate
          your blood can save a life, or even several if your blood is separated into its components — red cells,
          platelets and plasma — which can be used individually for patients with specific conditions. Safe blood
          saves
          lives and improves health. Blood transfusion is needed for:</p>
        <p>
          <br>
        <ul class="Text scroll">
          <li class="custom-bullet">women with complications of pregnancy, such as ectopic pregnancies and haemorrhage
            before, during or after childbirth.</li>
          <li class="custom-bullet">children with severe anaemia often resulting from malaria or malnutrition.</li>
          <li class="custom-bullet">people with severe trauma following man-made and natural disasters.</li>
          <li class="custom-bullet">many complex medical and surgical procedures and cancer patients.
          </li>
        </ul>
        </p>
        <br>
        <p class="scroll">
          It is also needed for regular transfusions for people with conditions such as thalassaemia and sickle cell
          disease and is used to make products such as clotting factors for people with haemophilia. There is a
          constant
          need for regular blood supply because blood can be stored for only a limited time before use. Regular blood
          donations by a sufficient number of healthy people are needed to ensure that safe blood will be available
          whenever and wherever it is needed.
        </p><br>
        <p class="scroll">
          In addition to the critical medical situations mentioned, donating blood also fosters a sense of community
          and altruism. By giving blood, individuals directly contribute to the well-being of others, often in their
          own local or regional communities. It's a tangible way to make a positive impact, knowing that your donation
          can directly save or improve someone's life. Furthermore, donating blood has personal health benefits, such
          as reducing the risk of certain health conditions like hemochromatosis, which is the excessive accumulation
          of iron in the body. It's an act of kindness that transcends boundaries and connects individuals in a shared
          commitment to support one another during times of need.</p>
      </div>
    </section>
    <section class="donateBlood " id="why_donate_blood">
      <img src="Image/Donate_blood.jpg" alt="" class="scroll" />
      <div class="bloodGroupTable scroll">
        <table>
          <th colspan="3">Compatible Blood Type Donors</th>
          <tr>
            <td>Blood Type</td>
            <td>Donate Blood To</td>
            <td>Recieve Blood From</td>
          </tr>
          <tr>
            <td>A+</td>
            <td>A+ AB+</td>
            <td>A+ A- O+ O-</td>
          </tr>
          <tr>
            <td>O+</td>
            <td>O+ A+ B+ AB+</td>
            <td>O+ O-</td>
          </tr>
          <tr>
            <td>B+</td>
            <td>B+ AB+</td>
            <td>B+ B- O+ O-</td>
          </tr>
          <tr>
            <td>AB+</td>
            <td>AB+</td>
            <td>Everyone</td>
          </tr>
          <tr>
            <td>A-</td>
            <td>A+ A- AB+ AB-</td>
            <td>A- O-</td>
          </tr>
          <tr>
            <td>O-</td>
            <td>Everyone</td>
            <td>O-</td>
          </tr>
          <tr>
            <td>B-</td>
            <td>B+ B- AB+ AB-</td>
            <td>B- O-</td>
          </tr>
          <tr>
            <td>AB-</td>
            <td>AB+ AB-</td>
            <td>AB- A- B- O-</td>
          </tr>
        </table>
      </div>
    </section>
  <?php include 'footer.php'; ?>
  </div>

</body>
<script src="script/home.js"></script>
<script src="script/navbar.js"></script>

</html>