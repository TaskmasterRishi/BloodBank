<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="Icon/Icon.png" />
  <link rel="stylesheet" href="CSS/home2.css"/>
  <link rel="stylesheet" href="CSS/home_mediaQuery.css" />
  <title>Red Bank</title>
  <style>

.graphcontainer{

height: 350px;
width:350px;
box-shadow:-1px 1px 0px 0px black;
position: relative;
z-index:100;
color:antiquewhite;
overflow:visible;
background-color: transparent;

}

.graphtext{
  position: absolute;
  top:0px;
  left:50%;
  transform:translate(-50%,-100%);
  color:red;
  font-size:20px;
  font-weight:700;
  width:max-content;
}
.graphbar{

  width:40px;
  height:50px;
  /* box-shadow:0px -1px 0px 1px black; */
  position: absolute;
  bottom:0px;
  z-index:10;
  color:black;
  
}
.graphbar > span{

  position: absolute;
  bottom:0px;
  left:50%;
  transform:translate(-50%,100%);
}
.showamount{
  position: absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%);
  overflow:visible;
  width:5px;
  height:5px;
  border-radius:50%;
  display:flex;
  justify-content:center;
  align-items:center;
  color: white;
  font-weight: 900;
}
.gb1{
  background-color:red;
  right:0px;
}
.gb2{
  background-color:#E41E3F;
  right:43px;
}
.gb3{
  background-color:#0B5394;
right:86px;
}
.gb4{
  background-color:blue;
  right:129px;
}
.gb5{
  background-color:blueviolet;
  right:172px;
}
.gb6{
  background-color:darkblue;
  right:215px;
}
.gb7{
  background-color:indigo;
  right:258px;
}
.gb8{
  background-color:orange;
  right:301px;
}
.graphscale{
  height:35px;
  width:100%;
  border-bottom:0.5px dashed black;
  color:black;
  position: relative;
}
.graphscale > span{

  position: absolute;
  left:0px;
  bottom:0px;
  width:fit-content;
  transform:translate(-150%,50%);
}
  </style>

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
      <h1 class="reveal">Why Should I Donate Blood ?</h1>
      <div class="float-con">
        <img class="reveal" src="Image/whyDonateBlood.png" alt="BloodInfo" width="350vw" />
        <br>
        <p class="reveal">Blood is the most precious gift that anyone can give to another person — the gift of life. A
          decision to
          donate
          your blood can save a life, or even several if your blood is separated into its components — red cells,
          platelets and plasma — which can be used individually for patients with specific conditions. Safe blood
          saves
          lives and improves health. Blood transfusion is needed for:</p>
        <p>
          <br>
        <ul class="Text reveal">
          <li class="custom-bullet">women with complications of pregnancy, such as ectopic pregnancies and haemorrhage
            before, during or after childbirth.</li>
          <li class="custom-bullet">children with severe anaemia often resulting from malaria or malnutrition.</li>
          <li class="custom-bullet">people with severe trauma following man-made and natural disasters.</li>
          <li class="custom-bullet">many complex medical and surgical procedures and cancer patients.
          </li>
        </ul>
        </p>
        <br>
        <p class="reveal">
          It is also needed for regular transfusions for people with conditions such as thalassaemia and sickle cell
          disease and is used to make products such as clotting factors for people with haemophilia. There is a
          constant
          need for regular blood supply because blood can be stored for only a limited time before use. Regular blood
          donations by a sufficient number of healthy people are needed to ensure that safe blood will be available
          whenever and wherever it is needed.
        </p><br>
        <p class="reveal">
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
      <img src="Image/Donate_blood.jpg" alt="" class="reveal" />


      <div class="graphcontainer reveal">
        <div class="graphtext">Graph for Available Blood(in ml)</div>
        <div class="graphbar gb1"><span>AB-</span><div></div></div>
        <div class="graphbar gb2"><span>AB+</span><div></div></div>
        <div class="graphbar gb3"><span>0-</span><div></div></div>
        <div class="graphbar gb4"><span>0+</span><div></div></div>
        <div class="graphbar gb5"><span>B-</span><div></div></div>
        <div class="graphbar gb6"><span>B+</span><div></div></div>
        <div class="graphbar gb7"><span>A-</span><div></div></div>
        <div class="graphbar gb8"><span>A+</span><div></div></div>

        <div class="graphscale"><span></span></div>
        <div class="graphscale"><span></span></div>
        <div class="graphscale"><span></span></div>
        <div class="graphscale"><span></span></div>
        <div class="graphscale"><span></span></div>
        <div class="graphscale"><span></span></div>
        <div class="graphscale"><span></span></div>
        <div class="graphscale"><span></span></div>
        <div class="graphscale"><span></span></div>
        <div class="graphscale"><span></span></div>
      </div>


      <div class="bloodGroupTable reveal">
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

<?php

require_once("php/connection.php");

$query="SELECT SUM(amount) FROM blooddetail";

$result=mysqli_query($con,$query);

$row=mysqli_fetch_array($result);
echo "<script>";

echo "let total=".$row["SUM(amount)"].";";

echo "console.log(total);";

echo "</script>";
?>
<script>

  const graphscale= document.querySelectorAll(".graphscale");

  let digits=total.toString().length;
  let maxAmount=1;
  for( let i=0;i<digits;i++){

    maxAmount=10*maxAmount;
  }

let scale=maxAmount/10;

for(let i=0;i<graphscale.length;i++){

  graphscale[9-i].querySelector("span").innerHTML=((i)*scale)+"";

}
let scalefactor=maxAmount/document.querySelector(".graphcontainer").offsetHeight;//Unit of  scalefactor is ml/px i.e. mililitre per pixel

let ml=[];// Order in array is  A+ A- B+ B- O+ O- AB+ AB-
<?php
$query="SELECT amount,type FROM blooddetail";
$result=mysqli_query($con,$query);

$ans=array();
$ans["A+"]=0;
$ans["A-"]=0;
$ans["B+"]=0;
$ans["B-"]=0;
$ans["O+"]=0;
$ans["O-"]=0;
$ans["AB+"]=0;
$ans["AB-"]=0;

  while($row=mysqli_fetch_array($result)){

    if($row["type"]=="A+"){

      $ans["A+"]=$ans["A+"]+$row["amount"];
    }
    else if($row["type"]=="A-"){

      $ans["A-"]=$ans["A-"]+$row["amount"];
    }
    else if($row["type"]=="B+"){

      $ans["B+"]=$ans["B+"]+$row["amount"];
    }
    else if($row["type"]=="B-"){

      $ans["B-"]=$ans["B-"]+$row["amount"];
    }
    else if($row["type"]=="O+"){

      $ans["O+"]=$ans["O+"]+$row["amount"];
    }
    else if($row["type"]=="O-"){

      $ans["O-"]=$ans["O-"]+$row["amount"];
    }
    else if($row["type"]=="AB+"){

      $ans["AB+"]=$ans["AB+"]+$row["amount"];
    }
    else if($row["type"]=="AB-"){

      $ans["AB-"]=$ans["AB-"]+$row["amount"];
    }
  }
$i=0;
  foreach($ans as $k => $v){
    
    echo "ml[$i]=".$v.";";
    $i++;
  }
?>

const graphbar=document.querySelectorAll(".graphbar");


for(let i=0;i<8;i++){
if(ml[i]!=0){
  graphbar[7-i].querySelector("div").innerHTML=ml[i]+"";
  graphbar[7-i].querySelector("div").classList.add("showamount");
}
  graphbar[7-i].style.height=(ml[i]/scalefactor)+"px";
}

</script>


</body>
<script src="script/home.js"></script>
<script src="script/navbar.js"></script>

</html>