<?php 

$db = new PDO("mysql: host=localhost;dbname=products;" , "root" , "");





if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $getEmail =$db->prepare("SELECT email FROM customer WHERE id = 7");
    $getEmail->execute();

    foreach($getEmail as $dt)
    {
        $email = $dt['email'];
    }
    $password = $_POST['password'];
    $birthdate = $_POST['birthdate'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['Gender'];

    $sql = $db->prepare("UPDATE customer SET username='$username' ,email='$email', password='$password' ,birthdate='$birthdate',  phone='$phone', address='$address', gender='$gender' WHERE id = 7");
    $sql-> execute();
}



$get = $db->prepare("SELECT * FROM customer WHERE id = 7");
$get->execute();


foreach($get as $result){
    $user = $result['username'];
        $pass = $result['password'];
        $em = $result['email'];
        $date = $result['birthdate'];
        $add = $result['address'];
        $phoneNo = $result['phone'];
        $gen = $result['gender'];
    }


    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="edit.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header>
        <div class="container">
            <div class="main">
                <!--  logo of the page  -->
                <div class="logo">
                    <a href="mainpage.html">
                        <img src="../../alivelogo.webp" alt="logo">
                    </a>
                </div>
    
                <!-- search bar -->
                <div class="search">
                    <span><i class='bx bx-search-alt-2' ></i></span>
                    <input type="text" placeholder="Search for a product"/>
                    <span>All Categories</span>
                </div>
    
    
                <div class="btns">
                    <a href="../profile.php"><i class='bx bx-user' ></i></a>
                    <a href="../../cart/cart.html"><i class='bx bxs-shopping-bag' ></i></a>
                </div>
    
            </div>
    
    
    
            <div class="sub">
                <div class="category">
                    <i class='bx bx-library'></i>
                    <select >
                            <option value="none" disabled hidden selected>Category</option>
                            <option>two</option>
                            <option>three</option>
                            <option>four</option>
                    </select>
                </div>
    
                <!-- links -->
                <ul class="links">
                    <li><a href="">home</a></li>
                    <li><a href="">pages</a></li>
                    <li><a href="./loginandsignupform/index.html">user account</a></li>
                    <li><a href="">vendor account</a></li>
                    <li><a href="">track my order</a></li>
                    <li><a href="">contact</a></li>
                </ul>
    
            </div>
        </div>
    </header>

<div class="edit">
    <div class="container">
        <form action="" method="POST" id="">
                <h2>Account settings</h2>

                <label for="username">username</label>
                <input type="text" name="username" id="username" value="<?="$user"?>">
        
                <label for="password">password</label>
                <div>
                    <input type="password" id="password" name="password" value="<?="$pass"?>">
                    <i class='bx bx-low-vision' ></i>
                </div>
        
                <label for="email">email</label>
                <input type="text" name="email"  readonly value="<?="$em"?>">
        
                <label for="date">birthdate</label>
                <input type="date" name="birthdate" id="date" value="<?="$date"?>">
        
                <label for="phone">phone number</label>
                <input type="text" name="phone" id="phone" value="<?="$phoneNo"?>">
        
                <label for="address">address</label>
                <input type="text" name="address" id="address" value="<?="$add"?>">
        
                <h3>Gender</h3>
                <div>
                    <label>
                        Male
                    <input type="radio" name="Gender" value="Male" <?php if($gen == "Male"){?> checked="true" <?php } ?>>
                    </label>
                    <label>
                        Female
                    <input type="radio" name="Gender" value="Female" <?php if($gen == "Female"){?> checked="true" <?php } ?>  >
                    </label>
                </div>
                

                <input type="submit" name="submit" id="submit">
            </form>
        
    </div>
</div>



    <div class="footer">
        <div class="container">
            <div class="left">
                <img src="../alivelogo.webp" alt="">
            </div>
            <div class="right">
                <div class="link">
                    <i class='bx bxl-facebook'></i>
                </div>
                <div class="link">
                    <i class='bx bxl-instagram' ></i>
                </div>
                <div class="link">
                    <i class='bx bxl-twitter' ></i>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="edit.js"></script>
</html>