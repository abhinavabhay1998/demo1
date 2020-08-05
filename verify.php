<?php
$host = 'localhost';
$dbname = 'd_login';
$username = 'root';
$password = '';
$link=new PDO("mysql:host=$host;dbname=$dbname", $username, $password);


if(isset($_POST['submit']))
{

    $barcode="";
    $barcode=$_POST['code'];
//***********************************************************
   $nlink = mysqli_connect("localhost", "root", "","d_login");
 
if($nlink === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 // Attempt select query execution
$sql = "SELECT id FROM log where id=$barcode";
if($result = mysqli_query($nlink, $sql))
{
    if(mysqli_num_rows($result) > 0)
    {
        
        while($row = mysqli_fetch_array($result))
        {
             $idd= $row['id'] ;
            $entry= $row['e_time'] ;
            
            $sql ="INSERT INTO logout (id, e_time,l_time,book)
            VALUES ('$idd','$entry',now(),'hh')";
            $link->query($sql) ;
            $barcode="";
            $sql=" DELETE FROM login where id=$barcode"; 
            $link->query($sql) ;
            
      }
        mysqli_free_result($result);
    } 
    else
    {
        //echo "No records matching your query were found.";
        //**************************************************************
        $sql = "INSERT INTO log (id, e_time, date)
        VALUES ('$barcode', now(), 'hh')";
        $link->query($sql) ;
        $barcode="";
        //***************************************************
        
    }
} 
else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
    
//*********************************************************
   
}
?>