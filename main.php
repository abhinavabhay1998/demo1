<?php
$host = 'localhost';
$dbname = 'd_login';
$username = 'root';
$password = '';
$barcod='';
$flag=0;
//$link=new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$link = mysqli_connect("localhost", "root", "","d_login");

if(isset($_POST['submit']))
{
    $barcod='';
    
    $barcod=$_POST['code'];
    
    if(preg_match("/STAFF/",$barcod))
    {
        //***********************************************
         $sql = "SELECT * FROM slog";
        if($result = mysqli_query($link, $sql))
        { 
            $flag=0;
            if(mysqli_num_rows($result) > 0)
            {  
                
                while($row = mysqli_fetch_array($result))
                {
                
                    if( $row['id'] == $barcod)
                    {
                        $flag=1;
                     //  echo "matched ";
                       $t=$row['e_time'];
                       $Date=date('d/m/y');
                       $sql = "INSERT INTO slogout(id,e_time,l_time,date,duration) VALUES ('$barcod','$t',now(),'$Date','NULL')";
                       mysqli_query($link, $sql);
                        $sql="DELETE FROM `slog` WHERE id= '$barcod'";
                        mysqli_query($link, $sql);
                        
                    }
                
                 }
                    // Free result set
                mysqli_free_result($result);
        
            }
                if($flag==0)
            {
               // echo "No records matching ";
                $Date=date('d/m/y');
                $sql2 = "INSERT INTO slog(id, e_time,date) VALUES ('$barcod', now(),'$Date')";
                mysqli_query($link, $sql2);
            }
            
        } 
        else
        {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }  
        
        
    }
    else
    {
         //*****************************************************************************************************
        
        $sql = "SELECT * FROM log";
        if($result = mysqli_query($link, $sql))
        { 
            $flag=0;
            if(mysqli_num_rows($result) > 0)
            {  
                
                while($row = mysqli_fetch_array($result))
                {
                
                    if( $row['id'] == $barcod)
                    {
                        $flag=1;
                      // echo "matched ";
                       $t=$row['e_time'];
                       $Date=date('d/m/y');
                       $sql = "INSERT INTO logout(id,e_time,l_time,date,duration) VALUES ('$barcod','$t',now(),'$Date','NULL')";
                       mysqli_query($link, $sql);
                        $sql="DELETE FROM `log` WHERE id= '$barcod'";
                        mysqli_query($link, $sql);
                        
                    }
                
                 }
                    // Free result set
                mysqli_free_result($result);
        
            } 
            
            if($flag==0)
            {
               // echo "No records matching ";
                $Date=date('d/m/y');
                $sql2 = "INSERT INTO log(id, e_time,date) VALUES ('$barcod', now(),'$Date')";
                mysqli_query($link, $sql2);
            }
            
        } 
        else
        {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        //********************************************************************************************
       
        
    }


   
}
?>
<html>
    
<head>
    <title>Home</title>
    <link rel=stylesheet href="main.css">
    <!-- <link rel="" type="text/css" href=""> -->
<!--<script type="text/php" src="php/main.php"></script>-->

<script>
    
    function l()
    {
        window.location.href="l_login.html";
    }
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);

}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>
</head>

<body onload="startTime()">
    
    
    
    
    <img  src="svit.png" width="100" height="100" style="position: absolute;margin-left: 625px; "><br><br><br><br><br><br>
    <fieldset style="border-color: white">
      <legend style="text-align: center; font-size: 56px; text-shadow: 0px 5px 5px;font-size: 56px; color: white; position: relative;">SAI VIDYA INSTITUTE OF TECHNOLOGY</legend>
      <!-- <legend style="font-family: sans-serif;  font-size: 46; color: white; text-align: center">WELCOME TO SVIT LIBRARY AND INFORMATION CENTRE</legend>-->
      <br>
      <center>
       <label style="font-family: sans-Serif; color: white; text-shadow: 0px 1px 10px; font-size: 40px;">LIBRARY AND INFORMATION CENTER</label>
      
      <br><br>
        <table align="center" style="font-size: 28; font-family: sans-serif; border-color:lightgrey; " border="3">
            <tr><th colspan="2">Timings</th></tr>
            <tr style="font-size: 22">
              <td>Library timings</td>
              <td>8.30am to 8.00pm</td>
            </tr>
            <tr style="font-size: 22">
              <td>Circulation counter</td>
              <td>9.00am to 4.00pm</td>
            </tr>
            <tr style="font-size: 22">
              <td>Reference section</td>
              <td>9.00am to 8.00pm</td>
            </tr>
        </table>

      </center>
    </fieldset>

    
    <a href="abhi_login.html"><button style="background-color:black; border-radius:20; font-size: 20; margin-left: 1270; font-size:14; color:white;"> Sign In </button></a> 
    

    <br>
      <center>
          <span id="txt" style="font-size: 72px; margin-left:10px;"></span><br>

            <div>
                <form method="post" action="main.php"> 
                  <input type="text" autofocus id="ip" name="code" style="font-size:70px; width:400px; text-align:center;" autocomplete="off" />
                <input name ="submit"  style="background:none; font-size:0px;outline:none; border:none;" type="submit"/>

<!--                    style="background:none; font-size:0px;outline:none; border:none;"-->
                 </form>   
            </div>
      </center>
    <br>     
    <marquee scrollamount="20" style="font-size: 28;"><i><b>Scan your ID card!</b></i></marquee>




    
   
    
</body>

</html>