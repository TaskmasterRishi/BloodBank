<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Profile</title>
    <link rel="stylesheet" href="CSS/hospitalProfile.css">
</head>
<body>
     <?php session_start(); include "navbar.php";?> 
    <div class="dummy"></div>
<div class="background"></div>
    <div class="donortext">Hospital Details</div>
    
        <div class="donordetail">
            <?php
            require_once("php/connection.php");
            
                if(isset($_POST["edit"])){
                    
                    echo '
                    
                    

                    ';

                }
                else{

                    $query="SELECT * FROM bloodcenterdetail WHERE id=".$_SESSION["hospital_id"];
                    $result=mysqli_query($con,$query);

                    $row=mysqli_fetch_array($result);

                    foreach($row as $k => $v){
                        if($row[$k]==0 || $row[$k]==""){
                            $row[$k]="- -";
                        }
                    }
                    echo '
                    
                    <table class="table">
                    <tr>
                        <td><span>Name:</span></td>
                        <td>'.$row["name"].'</td>
                        <td></td>
                        <td><span>E-mail:</span></td>
                        <td>'.$row["email"].'</td>
                    </tr>
                    <tr>
                        <td><span>State:</span></td>
                        <td>'.$row["state"].'</td>
                        <td></td>
                        <td><span>District:</span></td>
                        <td>'.$row["district"].'</td>
                    </tr>
                    <tr>
                        <td><span>Address:</span></td>
                        <td>'.$row["district"].'</td>
                        <td></td>
                        <td><span>Pincode:</span></td>
                        <td>'.$row["pincode"].'</td>
                    </tr>
                    <tr>
                        <td><span>Category:</span></td>
                        <td>'.$row["category"].'</td>
                        <td></td>
                        <td><span>No. of Beds:</span></td>
                        <td>'.$row["beds"].'</td>
                    </tr>
                    </table>

                    ';

                }

            ?>
            
<div class="buttonholder">
    
    <button class="button edit" onmousedown="formpopup();" name="edit" value="<?php echo $_SESSION["hospital_id"]?>">Edit Details</button>
    <form action="hospitalProfile.php" method="post">
        <input type="submit" class="button" name="delete" value="Delete Hospital">

    </form>
</div>
        </div>
<div class="editform editform-position">
    <div class="formtext">Edit Form</div>
<div class="close">
    <div class="cross cross1"></div>
    <div class="cross cross2"></div>
</div>
<form action="php/updatehospitalprofile.php" class="form1" method="post" >
                <?php 
                
                $query="SELECT * FROM bloodcenterdetail WHERE id=".$_SESSION["hospital_id"];
                $result=mysqli_query($con,$query);

                $row=mysqli_fetch_array($result);

                echo '
                
                <table class="table">
                <tr>
                    <td><span>Name:</span></td>
                    <td><input type="text" name="name" value='.$row["name"].'><br><div class="nameerror"></td>
                    <td></td>
                    <td><span>E-mail:</span></td>
                    <td><input type="text" name="email" value='.$row["email"].'><br><div class="emailerror"></td>
                </tr>
                <tr>
                    <td><span>State:</span></td>
                    <td><input type="text" name="state" value='.$row["state"].'><br><div class="stateerror"></td>
                    <td></td>
                    <td><span>District:</span></td>
                    <td><input type="text" name="district" value='.$row["district"].'><br><div class="districterror"></td>
                </tr>
                <tr>
                    <td><span>Address:</span></td>
                    <td><input type="text" name="address" value='.$row["district"].'><br><div class="addresserror"></td>
                    <td></td>
                    <td><span>Pincode:</span></td>
                    <td><input type="number" name="pincode" value='.$row["pincode"].'><br><div class="pincodeerror"></td>
                </tr>
                <tr>
                    <td><span>Category:</span></td>
                    <td><input type="text" name="type" value='.$row["category"].'><br><div class="typeerror"></td>
                    <td></td>
                    <td><span>No. of Beds:</span></td>
                    <td><input type="number" name="beds" value='.$row["beds"].'><br><div class="bedserror"></td>
                </tr>
                </table>

                ';
                
                ?>
                    <div class="done"><button onsubmit="customValidate()" class="button update" id="update" type="submit" name="update" value="dupdate">Update</button></div>
            </form>           
</div>
     <div class="footercontainer"><?php include "footer.php";?></div>

<script>

        const closebutton = document.querySelector(".close");
        const f = document.querySelector(".editform");
        const b=document.querySelector(".background");

        // document.querySelector(".edit").addEventListener("click",() => {

        //     f.classList.toggle("editform-position");
        //     b.classList.toggle("opacity");

        // });
function formpopup(){

    f.classList.toggle("editform-position");
    b.classList.toggle("opacity");
}

closebutton.addEventListener("click",() => {

    f.classList.toggle("editform-position");
    b.classList.toggle("opacity");
});
//  document.getElementById("update").addEventListener("click", (event) => {

//      const name=document.querySelector(".nameerror");
//      const email=document.querySelector(".emailerror");
//      const state=document.querySelector(".stateerror");
//      const district=document.querySelector(".districterror");
//      const address=document.querySelector(".addresserror");
//      const pincode=document.querySelector(".pincodeerror");
//      const type=document.querySelector(".typeerror");
//      const beds=document.querySelector(".bedserror");
    
    
//     if(name.value="" || name.value.match(/[!@#$%^&*()+-[]{}/)){
//          e.preventDefault();
//          name.innerHTML=name.value."";
//      }

//  });

//  function customValidate(){

//     const name=document.querySelector(".nameerror");
//      const email=document.querySelector(".emailerror");
//      const state=document.querySelector(".stateerror");
//      const district=document.querySelector(".districterror");
//      const address=document.querySelector(".addresserror");
//      const pincode=document.querySelector(".pincodeerror");
//      const type=document.querySelector(".typeerror");
//      const beds=document.querySelector(".bedserror");
    
    
//     if(name.value="" || name.value.match(/[!@#$%^&*()+-[]{}/)){
//          e.preventDefault();
//          name.innerHTML=name.value."";
//      }

//  }


    

     </script>
</body>
</html>