<?php
//connection.php File 
//mysqli_connect("localhost","root",""); 
//mysql_select_db("test"); 
$localhost = "localhost"; #localhost
$dbusername = "root"; #username of phpmyadmin
$dbpassword = "";  #password of phpmyadmin
$dbname = "myntralogin";  #database name

session_start();
#connection string
$conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);
$query="select * from login"; 
$result=mysqli_query($conn,$query); 
$user=$_SESSION['number']
// $user=$_SESSION['name']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Myntra</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
<link rel="stylesheet" href="style.css">

</head>
<body style="background:#ffecec;">
            <!--Navigation-->
    <nav class="navbar bg-light navbar-light navbar-expand-lg ">
        <a href="first.html" class="navbar-brand"> <img src="Pictures/logosmall.png" alt="" height="30" width="30"></a>  


        <div class="dropdown">
          <button class="dropbtn">Men</button>
          <div class="dropdown-content">
            <a href="https://www.myntra.com/men-tshirts">T-shirts</a>
            <a href="https://www.myntra.com/men-casual-shirts">Casual shirts</a>
            <a href="https://www.myntra.com/men-formal-shirts">Formal Shirts</a>
          </div>
        </div>

        <div class="dropdown">
          <button class="dropbtn">Women</button>
          <div class="dropdown-content">
            <a href="https://www.myntra.com/women-kurtas-kurtis-suits">Kurtas&Suits</a>
            <a href="https://www.myntra.com/women-ethnic-wear">Ethnic Wear</a>
            <a href="https://www.myntra.com/skirts-palazzos">Skirts&Plazzos</a>
          </div>
        </div>

        <div class="dropdown">
          <button class="dropbtn">Kids</button>
          <div class="dropdown-content">
            <a href="https://www.myntra.com/kids?f=Categories%3AClothing%20Set%2CDungarees%3A%3AGender%3Aboys%2Cboys%20girls">Clothing set</a>
            <a href="https://www.myntra.com/kids?f=Categories%3ALounge%20Shorts%2CShorts%3A%3AGender%3Aboys%2Cboys%20girls">Shorts</a>
            <a href="https://www.myntra.com/kids?f=Categories%3ABoxers%2CBriefs%2CInnerwear%20Vests%2CNight%20suits%2CSleepsuit%3A%3AGender%3Aboys%2Cboys%20girls">Inner Sleepwear</a>
          </div>
        </div>


        <div class="dropdown">
          <button class="dropbtn">Home&Living</button>
          <div class="dropdown-content">
            <a href="https://www.myntra.com/bedsheets">Bedsheets</a>
            <a href="https://www.myntra.com/bedding-sets">Bedding sets</a>
            <a href="https://www.myntra.com/carpets">Carpets</a>
          </div>
        </div>


    <div class="container-fluid">
    <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search for products,brands and more" aria-label="Search">
    </form>
    </div>

    <div class="btn-group">
    <button class="btn btn-secondary btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
     <img src="pictures/profile.png" alt="" width="20" height="20"> 
     <span class="caption">Profile</span>
    </button>
    <ul class="dropdown-menu custom dropdown-menu-right" >
      <!-- Welcome
      To access account and manage orders -->
      <a href="login.html"></a>
      <!-- <button type="button" class="btn btn-outline-danger">Login/Sign Up</button> -->
      <div class="text">
      <!-- <h6>Welcome,  </h6> -->
            <h6> Welcome <?php echo $user?> </h6>

            <!-- <a href="Dashboard.php" style="color: rgb(96, 100, 100); text-decoration: none;">Dashboard</a> -->
         </div>
    
      <hr size="4" width="100%" color="black">  
      <a href="https://www.myntra.com/my/orders" style="text-decoration: none; color: #000;">Orders</a><br>
      <a href="https://www.myntra.com/wishlist" style="text-decoration: none; color: #000;">Wishlist</a><br>
      <a href="https://www.myntra.com/giftcard https://www.myntra.com/giftcard" style="text-decoration: none; color: #000;">Gift Card</a><br>
      <a href="https://www.myntra.com/contactus" style="text-decoration: none; color: #000;">Contact Us</a><br>
      <a href="https://www.myntra.com/myntrainsider?cache=false" style="text-decoration: none; color: #000;">Myntra Insider</a><br>
      <hr size="4" width="100%" color="black">
      <a href="https://www.myntra.com/my/myntracredit" style="text-decoration: none; color: #000;">Myntra credit</a><br>
      <a href="https://www.myntra.com/my/coupons" style="text-decoration: none; color: #000;">Coupons</a><br>
      <a href="https://www.myntra.com/my/savedcards" style="text-decoration: none; color: #000;">Saved Cards</a><br>
      <a href="https://www.myntra.com/my/address" style="text-decoration: none; color: #000;">Saved Addresses</a><br>
    </ul>
    <button class="btn btn-secondary btn-sm" type="button">
        <img src="pictures/heart.png" alt="" height="20" width="20">
        <span class="caption">Wishlist</span>
      </button>

      <button class="btn btn-secondary btn-sm " type="button" >
          <img src="pictures/bag.png" alt="" height="20" width="20">
          <span class="caption">Bag</span>
      </button>
  </div>
</nav>

<div class="space1"> 
    <a href="https://www.myntra.com/shop/men">
    <img src="Pictures/first.JPG" alt="Men's style" width="100%" height="100%">
    </a>

     

    <div class="ads">
      <a href="https://www.myntra.com/shop/citibank-offer20">
        <img src="Pictures/ad.JPG" alt="" width="100%">
      </a>
    </div>


    <div class="row">
      <div class="col-sm-4">
        <a href="https://www.myntra.com/myntra?f=Coupons:EPICHR15">
          <img src="Pictures/coupon1.JPG" alt=""></a>
      </div>
      <div class="col-sm-4">
        <a href="https://www.myntra.com/myntra?f=Coupons:EPICHR12">
        <img src="Pictures/coupon2.JPG" alt=""></a>
      </div>
      <div class="col-sm-4">
        <a href="https://www.myntra.com/myntra?f=Coupons:EPICHR10">
        <img src="Pictures/coupon3.JPG" alt=""></a>
      </div>
    </div>

    


    <h4 style="font-size:3vw;">BEST OF BRAND</h4>



      <div class="row">
            <div class="col-sm">
            <a href="https://www.myntra.com/biba?plaEnabled=false&rf=Discount%20Range%3A10.0_100.0_10.0%20TO%20100.0">
                <img style="width: 100%;" src="Pictures/biba.JPG" alt="">
            </a>
            </div>
            <div class="col-sm">
            <a href="https://www.myntra.com/forever-21?f=Gender%3Amen%20women%2Cwomen&plaEnabled=false&rf=Price%3A299.0_4165.0_299.0%20TO%204165.0">
            <img style="width: 100%;" src="pictures/forever21.JPG" alt=""></a>
            </div>
            <div class="col-sm">
            <a href="https://www.myntra.com/h-and-m?plaEnabled=false&rf=Discount%20Range%3A10.0_100.0_10.0%20TO%20100.0">
                <img style="width: 100%;" src="pictures/h&m.JPG" alt="">
            </a>
            </div>
            <div class="col-sm">
            <a href="https://www.myntra.com/jack-and-jones?f=Gender%3Amen%2Cmen%20women&plaEnabled=false&rf=Discount%20Range%3A10.0_100.0_10.0%20TO%20100.0">
                <img style="width: 100%;" src="Pictures/jacandjones.JPG" alt="">
            </a>
            </div>
      </div>
        
          <div class="row">
            <div class="col-sm">
              <a href="https://www.myntra.com/levis?plaEnabled=false&rf=Discount%20Range%3A40.0_100.0_40.0%20TO%20100.0">
                <img style="width: 100%;" src="Pictures/levis.JPG" alt="">
              </a>
            </div>
            <div class="col-sm">
              <a href="https://www.myntra.com/mango?f=Gender%3Amen%20women%2Cwomen&plaEnabled=false&rf=Discount%20Range%3A10.0_100.0_10.0%20TO%20100.0">
                <img style="width: 100%;" src="pictures/mango.JPG" alt="">
              </a>
            </div>
            <div class="col-sm">
              <a href="https://www.myntra.com/nautica?plaEnabled=false&rf=Discount%20Range%3A55.0_100.0_55.0%20TO%20100.0">
                <img style="width: 100%;" src="pictures/nautica.JPG" alt=""></a>
            </div>
            <div class="col-sm">
              <a href="https://www.myntra.com/nike?plaEnabled=false&rf=Discount%20Range%3A10.0_100.0_10.0%20TO%20100.0">
              <img style="width: 100%;" src="pictures/nike.JPG" alt=""></a>
              </div>
          </div>
        </div>

       
          <div class="row">
            <div class="col-sm">
              <a href="https://www.myntra.com/only?plaEnabled=false&rf=Discount%20Range%3A40.0_100.0_40.0%20TO%20100.0">
                <imgstyle="width: 100%;" src="pictures/only.JPG" alt="">
                </a>
            </div>
            <div class="col-sm">
            <a href="https://www.myntra.com/skechers?plaEnabled=false&rf=Discount%20Range%3A10.0_100.0_10.0%20TO%20100.0">
              <img style="width: 100%;" src="pictures/sketchers.JPG" alt="">
            </a>
            </div>
            <div class="col-sm">
              <a href="https://www.myntra.com/myntra-fashion-store?f=Brand%3AVero%20Moda%3A%3AGender%3Amen%20women%2Cwomen&rf=Discount%20Range%3A50.0_100.0_50.0%20TO%20100.0">
              <img style="width: 100%;" src="pictures/veromoda.JPG" alt=""></a>
            </div>
            <div class="col-sm">
              <a href="https://www.myntra.com/myntra-fashion-store?f=Brand%3APuma%2Cone8%20x%20PUMA%3A%3AGender%3Amen%20women%2Cwomen&rf=Discount%20Range%3A30.0_100.0_30.0%20TO%20100.0">
              <img style="width: 100%;" src="Pictures/puma.JPG" alt="">
              </a>
            </div>
          </div>
       



        <h4 style="font-size:3vw;">TOP CATEGORIES</h4>


        
          <div class="row">
            <div class="col-sm">
            <a href="https://www.myntra.com/men?f=Categories%3AKurta%20Sets%2CKurtas&plaEnabled=false">
                <img style="width: 100%;" src="pictures/kurta.JPG" alt="" >
                </a>          
            </div>
            <div class="col-sm">
            <a href="https://www.myntra.com/loungwear?f=Gender%3Amen%2Cmen%20women&plaEnabled=false">
                <img style="width: 100%;" src="pictures/lounge.JPG" alt="" >
                </a>
            </div>
            <div class="col-sm">
            <a href="https://www.myntra.com/plus-size-all?f=Gender%3Amen%2Cmen%20women&plaEnabled=false">
                <img style="width: 100%;" src="pictures/mensplus.JPG" alt="">
            </a>
            </div>
            <div class="col-sm">
            <a href="https://www.myntra.com/men-ethnic-wear?f=Categories%3ANehru%20Jackets%2CSherwani&plaEnabled=false">
                <img style="width: 100%;" src="pictures/Nehru.JPG" alt="">
            </a>
            </div>
        
      </div>
    

  <footer style="background-color: #fafbfc;">

      <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
          <h5 class="mb-3" style="letter-spacing: 2px; color: #7f4722;">Online shopping</h5>
          <ul class="list-unstyled mb-0">
            <li class="mb-1">
              <a href="https://www.myntra.com/shop/men" style="color: #4f4f4f;text-decoration: none">Men</a>
            </li>
            <li class="mb-1 ">
              <a href="https://www.myntra.com/shop/women" style="color: #4f4f4f;text-decoration: none">Women</a>
            </li>
            <li class="mb-1">
              <a href="https://www.myntra.com/shop/kids" style="color: #4f4f4f;text-decoration: none">pricing</a>
            </li>
            <li>
              <a href="https://www.myntra.com/shop/home-living" style="color: #4f4f4f;text-decoration: none">Home-living</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <h5 class="mb-3" style="letter-spacing: 2px; color: #7f4722;">Useful links </h5>
          <ul class="list-unstyled mb-0">
            <li class="mb-1">
              <a href="https://www.myntra.com/contactus" style="color: #4f4f4f;text-decoration: none">Contact us</a>
            </li>
            <li class="mb-1">
              <a href="https://www.myntra.com/faqs" style="color: #4f4f4f;text-decoration: none">FAQ</a>
            </li>
            <li class="mb-1">
              <a href="https://www.myntra.com/tac" style="color: #4f4f4f;text-decoration: none">TAC</a>
            </li>
            <li>
              <a href="https://www.myntra.com/termsofuse" style="color: #4f4f4f;text-decoration: none">Terms of use</a>
            </li>
            <li>
              <a href="https://www.myntra.com/my/orders" style="color:#4f4f4f;text-decoration: none">My orders</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <h5 class="mb-3" style="letter-spacing: 2px; color: #7f4722;">Experience Myntra app on mobile </h5>
          <ul class="list-unstyled mb-0">
            <li class="mb-1"></li>
              <a href="https://play.google.com/store/apps/details?id=com.myntra.android" style="color: #4f4f4f;text-decoration: none;">
                <img src="pictures/play.png" alt="" style="height: 30px; width: 90px;"></a>
                <a href="https://itunes.apple.com/in/app/myntra-indias-fashion-store/id907394059" style="color: #4f4f4f;text-decoration: none;">
                  <img src="pictures/apple.png" alt="" style="height: 30px; width: 90px;"></a>   
            </li>
            <li class="socials">
              <a href="https://www.facebook.com/myntra" class="fa fa-facebook"></a>
              <a href="https://twitter.com/myntra" class="fa fa-twitter"></a>
              <a href="https://www.instagram.com/myntra" class="fa fa-instagram"></a>
              <a href="https://www.youtube.com/user/myntradotcom" class="fa fa-youtube"></a>
            </li>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <h5 class="mb-3" style="letter-spacing: 2px; color: #7f4722;"></h5>
        <ul class="list-unstyled mb-0">
          <li class="mb-1"></li>
          <img src="Pictures/return.jpeg" alt="" style="height: 350x; width: 250px;">
    </div>
</div>
      </div>
    </footer>


    

</body>
</html>
