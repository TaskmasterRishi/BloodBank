<?php                 
require_once("php/connection.php");

if(isset($_POST["search-submit"])){

    if(isset($_POST["district"]) && !isset($_POST["state"])){

        $_POST["district"]=NULL;
        $_POST["state"]=NULL;
        $_POST["bloodgroup"]=NULL;
        header("location: needBlood.php?error=*Select State first.");
        die();
    }
    else if((!isset($_POST["district"]) && !isset($_POST["state"])) && isset($_POST["bloodgroup"])){
        $_POST["district"]=NULL;
        $_POST["state"]=NULL;
        $_POST["bloodgroup"]=NULL;
        header("location: needBlood.php?error=*Select State or District first.");
        die();
    }
    else if(!isset($_POST["state"]) && !isset($_POST["district"]) && !isset($_POST["bloodgroup"])){
        $_POST["district"]=NULL;
        $_POST["state"]=NULL;
        $_POST["bloodgroup"]=NULL;
        header("location: needBlood.php?error=*Select State and District and Blood Group first.");
        die();
    }
    else{$_GET["error"]=NULL;}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <title>Need Blood</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/needBlood.css?v=0">
    <link rel="stylesheet" href="CSS/needBloodMedia.css">
    <style>

.custom_validate{

color: red;
font-size: 15px;
width: auto;
height: 12px;
text-align:center;

}

    </style>
</head>

<body>
    <?php session_start(); include 'navbar.php'; ?>

    <div class="main">
        <div class="head">
            <h1>Blood Stock Availability</h1>
        </div>
        <form action="" method="post">
            <table class="serchBox">
                <tr class="serchHead">
                    <td>Search Blood Stock</td>
                </tr>
                <tr class="inputField">
                    <td>
                        
                        <form action="needBlood.php" method="post">
                    <!-- <select name="country" class="country" id="country" style="display:none">
                            <option value="" selected disabled>Select Country</option>
                        </select> -->
                        <select name="state" class="state" id="state">
                            <option value="" selected disabled>Select State</option>
                        <?php
                  
                            $statequery="SELECT DISTINCT state FROM bloodcenterdetail";
                            $stateresult=mysqli_query($con,$statequery);

                            while($state=mysqli_fetch_array($stateresult)){

                                echo "
                                    <option value='".$state["state"]."'>".$state["state"]."</option>
                                ";
                            }

                        ?>
                        </select>
                        <select name="district" class="city" id="district">
                            <option value="" selected disabled>Select District</option>
                            <?php
                  
                            $districtquery="SELECT DISTINCT district FROM bloodcenterdetail";
                            $districtresult=mysqli_query($con,$districtquery);

                            while($district=mysqli_fetch_array($districtresult)){

                                echo "
                                    <option value='".$district["district"]."'>".$district["district"]."</option>
                                ";
                            }

                        ?>
                        </select>
                        <select id="bloodgroup" name="bloodgroup">
                            <option value="" disabled selected>Select Blood Group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </td>
                </tr>
            </table><br><br>
            <center>
                    <button type="submit" name="search-submit" value="submit" class="submit">Search</button>
                </form>
                <br>
                <div class="custom_validate"><?php if(isset($_GET["error"])){echo $_GET["error"];} ?></div>
            </center>
            <div class="container">
                <div class="icon-container">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
                <div class="text-container">
                    <p>Select State and/or District for stock availability.</p>
                </div>
            </div>
        </form>

        <div class="head">
            <h1>Results</h1>
        </div>

            <div class="centerdetail ">
                <table class="serchBox">
                    <tr class="serchHead">
                        <td>Name</td>
                        <td>E-mail</td>
                        <td>District</td>
                        <td>State</td>
                        <td>Available</td>
                    </tr>

<?php
                          
                          
    if(isset($_POST["search-submit"])){
                              
                                
        if(isset($_POST["state"]) && isset($_POST["district"]) && isset($_POST["bloodgroup"])){

            $state=$_POST["state"];
            $district=$_POST["district"];
            $type=$_POST["bloodgroup"];
                                    
        $joinquery="SELECT bloodcenterdetail.name,bloodcenterdetail.email,bloodcenterdetail.district,bloodcenterdetail.state,blooddetail.type
        FROM 
        bloodcenterdetail INNER JOIN blooddetail ON bloodcenterdetail.id=blooddetail.bloodcenterid
        where 
        bloodcenterdetail.state='$state' AND bloodcenterdetail.district='$district' AND blooddetail.type='$type'   
        ";
        }
        else if(isset($_POST["state"]) && isset($_POST["bloodgroup"])){

            $state=$_POST["state"];
          
            $type=$_POST["bloodgroup"];
            $joinquery="SELECT bloodcenterdetail.name,bloodcenterdetail.email,bloodcenterdetail.district,bloodcenterdetail.state,blooddetail.type
        FROM 
        bloodcenterdetail INNER JOIN blooddetail ON bloodcenterdetail.id=blooddetail.bloodcenterid
        where 
        bloodcenterdetail.state='$state' AND blooddetail.type='$type'   
        ";
        }
        else if(isset($_POST["state"])){
    
            $joinquery="SELECT * from bloodcenterdetail where state='".$_POST["state"]."'";
    
        }

        $joinresult=mysqli_query($con,$joinquery);

        while($row=mysqli_fetch_array($joinresult)){


            $available="Available<br>";
            $temp=$available;
            $bloodquery="SELECT type FROM blooddetail where bloodcenterid = ".$row["id"];
            $result2=mysqli_query($con,$bloodquery);

                while($row2=mysqli_fetch_array($result2)){

                        $available=$available." ".$row2["type"].", ";
                }
                                        
                echo "
                                        
                    <tr>
                    <td>".$row["name"]."</td>
                    <td>".$row["email"]."</td>
                    <td>".$row["district"]."</td>
                    <td>".$row["state"]."</td>
                    <td>";
                                        
                    if($available==$temp){
                                            
                        echo "<h4 style='color:red;'>Not Available</h4>";
                    }
                    else{
                                            
                        $available=substr($available,0,strlen($available)-2);
                            echo $available;
                        }
                        echo "</td>
                    </tr>
                                    
                ";
            }

                            

    }
    else{
                                $query="SELECT * FROM bloodcenterdetail";
                                $result=mysqli_query($con,$query);

                                while($row=mysqli_fetch_array($result)){


                                        $available="Available<br>";
                                        $temp=$available;
                                        $bloodquery="SELECT type FROM blooddetail where bloodcenterid = ".$row["id"];
                                        $result2=mysqli_query($con,$bloodquery);

                                        while($row2=mysqli_fetch_array($result2)){

                                                $available=$available." ".$row2["type"].", ";
                                        }
                                        
                                        echo "
                                        
                                        <tr>
                                        <td>".$row["name"]."</td>
                                        <td>".$row["email"]."</td>
                                        <td>".$row["district"]."</td>
                                        <td>".$row["state"]."</td>
                                        <td>";
                                        
                                        if($available==$temp){
                                            
                                            echo "<h4 style='color:red;'>Not Available</h4>";
                                        }
                                        else{
                                            
                                            $available=substr($available,0,strlen($available)-2);
                                                echo $available;
                                            }
                                            echo "</td>
                                        </tr>
                                    
                                    ";
                                }

    }
?>

                </table>
            </div>

        <?php include 'footer.php'; ?>

    </div>

</body>
<script src="script/stateData.js"></script>
<script src="script/stateAPI.js"></script>

</html>