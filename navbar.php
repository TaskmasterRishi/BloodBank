<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="CSS/navbarMediaQuery.css">
    <style>

.profile{

height: auto;
width: auto;
overflow: hidden;
position: relative;
z-index: 100;
}
.profile > img{
    
height: 6rem;
aspect-ratio:1;
border-radius: 50%;
}
.p_link{

    color:white;
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;

}
    </style>
</head>

<body>
    <header class="header">
        <nav class="navbar">
            <a href="index.php" class="nav-logo">
                <img src="Icon/Icon.png" alt="Icon" height="40px" width="auto" />
                <h1>Red Bank</h1>
            </a>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php#whyDonateBlood" class="nav-link">Why Donate Blood</a>
                </li>
                <li class="nav-item">
                    <a href="donateBlood.php" class="nav-link">Become a Donor</a>
                </li>
                <li class="nav-item">
                    <a href="needBlood.php" class="nav-link">Need Blood</a>
                </li>
                <li class="nav-item">
                    <a href="about_us.php" class="nav-link">About Us</a>
                </li>
            </ul>
            <div class="hem-and-log">
                <!-- <div class="dropdown">
                    <button class="login-button">
                        <svg class="person-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M12 2C9.19 2 7 4.19 7 7c0 1.57.64 3.02 1.68 4.06C6.69 12.29 4 15.36 4 19h16c0-3.64-2.69-6.71-4.68-8.94C16.36 10.02 17 8.57 17 7c0-2.81-2.19-5-5-5zm0 10c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z" />
                        </svg>
                        <p class="login">Login &#9660;</p>
                    </button>
                    <div class="dropdown-content">
                        <a href="hospital_login.php">Hospital Login</a>
                        <a href="donor_login.php">Donor Login</a>
                    </div>
                    
                </div> -->

                <?php  
                     
                     if(isset($_SESSION["user_id"])){

                         echo'
                        
                         <a href="donor_profile.php" class="p_link">

                         <div class="profile"><img src="Image/empty_profile.jpg"></div>
                         <span>Donor Profile</span>
     
                        </a>

                         ';
                     }
                     else if(isset($_SESSION["hospital_id"])){

                        echo ' 
                        
                        <a href="hospital_profile.php" class="p_link">

                        <div class="profile"><img src="Image/empty_profile.jpg"></div>
                        <span>Hospital Profile</span>

                        </a>
                        
                        ';
                     }
                     else{

                         echo '
                        
                         <div class="dropdown">
                            <button class="login-button">
                             <svg class="person-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                 <path d="M0 0h24v24H0z" fill="none" />
                                 <path
                                     d="M12 2C9.19 2 7 4.19 7 7c0 1.57.64 3.02 1.68 4.06C6.69 12.29 4 15.36 4 19h16c0-3.64-2.69-6.71-4.68-8.94C16.36 10.02 17 8.57 17 7c0-2.81-2.19-5-5-5zm0 10c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z" />
                                </svg>
                             <p class="login">Login &#9660;</p>
                            </button>
                            <div class="dropdown-content">
                                <a href="hospital_login.php">Hospital Login</a>
                                <a href="donor_login.php">Donor Login</a>
                            </div>
                        
                     </div>

                         ';
                     }
                
                ?> 


                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>

            </div>
        </nav>
    </header>
</body>
<script src="script/navbar.js"></script>
</html>