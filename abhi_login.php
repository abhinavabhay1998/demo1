<?php 
$result1 = $_POST['user']; 
$result2 = $_POST['pass']; 
//$subm = $_GET['sub'];

$link = mysqli_connect("localhost", "root", "","d_login");
 
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM user";
if($result = mysqli_query($link, $sql))
{ 
    if(mysqli_num_rows($result) > 0)
    {  
        while($row = mysqli_fetch_array($result))
        {
            if($row['id']==$result1 && $row['pass']==$result2)
            {
                
                        echo '<script type="text/javascript">';
                    echo ' alert("LOGIN SUCESSFUL!!")';   //not showing an alert box.
                    echo '</script>'; 
                echo '<script type="text/javascript">';
//                echo ' alert("LOGIN  SUCCESSFUL!")';
               echo 'window.location.replace("ssign.html")';
                echo '</script>';  
//               echo "<a  href=\"ssign.html\" target=\"_blank\">title</a>"; 
                die();
        
                
            }
             
        }
        
        echo '<script type="text/javascript">';
        echo ' alert("INVALID ATTEMPT!")';   //not showing an alert box.
        echo '</script>'; 
        include 'abhi_login.html';
        die();
        // Free result set
        mysqli_free_result($result);
      
    } 
    else
    {
        //
    }
} 
else
{
    echo "ERROR: Cannot execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);




?> 