<?php 
$result1 = $_POST['sid']; 
$result2 = $_POST['name']; 
$result3 = $_POST['email']; 
$result4 = $_POST['pass'];
$result5 = $_POST['deg']; 
//$subm = $_GET['sub'];

$link = mysqli_connect("localhost", "root", "","d_login");
 
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "INSERT INTO user(id,name,email,pass,deg) VALUES ('$result1','$result2','$result3','$result4','$result5')";
mysqli_query($link, $sql);
echo '<script type="text/javascript">';
               echo ' alert(" SUCCESSFUL REGISTRATION!")';
             //  echo 'window.location.replace("ssign.html")';
                echo '</script>';  

////sssssssssssssssssssssssssss

echo '<script type="text/javascript">';
//                echo ' alert("LOGIN  SUCCESSFUL!")';
               echo 'window.location.replace("ssign.html")';
                echo '</script>';
// Close connection
mysqli_close($link);




?> 