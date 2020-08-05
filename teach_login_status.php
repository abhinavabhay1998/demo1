<html>
      <head>
        <title>TEACHER-LOGIN</title>
    
    </head>
    <body>
        
        <center>
        <img src='svit.png' style="margin-left:-600px; margin-top:20px;" width="80" height="80">
        <h1 style="margin-left:120px; margin-top:-60px; font-size:30px;">SAI VIDYA INSTITUTE OF TECHNOLOGY</h1>
        
        
        <h3 style="margin-left:60px;">LIBRARY & INFORMATION CENTER</p><h3>
        <hr>
          <h1> STAFF -  LOGIN  -  STATUS </h1> 
        </center>
         
    </body>
         
</html>



<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "","d_login");
 

// Check connection
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM slog";
if($result = mysqli_query($link, $sql))
{ 
    if(mysqli_num_rows($result) > 0)
    {  
        echo "<div align=center><table border=1>";
            echo "<tr>";
                echo "<th>STAFF-ID</th>";
                echo "<th>ENTRY-TIME</th>";
                echo "<th>DATE</th>";
               ;
            echo "</tr></div>";
        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['e_time'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
        
    } 
    else
    {
        echo "No records matching your query were found.";
    }
} 
else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>

