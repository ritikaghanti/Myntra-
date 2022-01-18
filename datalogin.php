<!-- //Used to check if username and password matches -->
<?php
echo'ehh';
if($_POST){
$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="myntralogin";
$number=$_POST['number'];
$password=$_POST['password'];
$conn=mysqli_connect($host,$dbUsername,$dbPassword,$dbname);
$query="SELECT * FROM login where number='$number' and password='$password'";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result)==1)
{
    session_start();
    $_SESSION['myntralogin']='true';
    $_SESSION['number']=$number;
    //echo "Welcome,".$_SESSION['username'];
    header('location:profile.php');
    echo'successful';
    $conn->close();
}
else{echo'wrong username or password';}
}
else echo"not enetering";