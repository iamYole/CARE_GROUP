<?php 
require_once("Include/db.php");
$db=new DataManager();
session_start();

    if (array_key_exists("User", $_SESSION)&& $_SESSION['ROLE']=='USER')
    {       
        $isValid=false;
		$user=$_SESSION['User'];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
		}
     }
    else
    {
        header('Location: login.php' );
    }
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>CARE GROUP | BOOK APPOINTMENT</title>
<link href="Style/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
#main_container #main_content #programMenu table {
	text-align: left;
}
</style>
</head>

<body>
<div id="main_container">
	<div class="header">
    	<div id="logo"><a href="home.php"><img src="Style/images/logo.png" alt="" title="" width="162" height="54" border="0" /></a></div>
    
    	<div class="right_header">
        	
            <div class="top_menu">
            <h3>Welcome  <span class="dark_blue"><?php echo $_SESSION['User'];?></span></h3>
             <h4><a href="userProfile.php">Edit Profile</a></h4>
            
            </div>       
        
        </div>
    
    </div>
	 <div class="pattern_bg">
    
    	<div class="pattern_box">
            <div class="pattern_box_icon"><img src="Style/images/icon1.png" alt="" title="" width="70" height="112" /></div>
            <div class="pattern_content">
            <h1><span class="blue">Diesases, Preventions & Cure </span></h1>
            <p class="pat">Read articles on helath tips to find information on common dieseases, their prevention as well as cure.</p>
            </div>
        </div>
        
        
    	<div class="pattern_box">
            <div class="pattern_box_icon"><img src="Style/images/icon2.png" alt="" title="" width="70" height="112" /></div>
            <div class="pattern_content">
            <h1><span class="blue"> Latest Medical News</span></h1>
            <p class="pat">Seven, which provides great value to the business is a medical-office management software package.
             Please download the Trial Edition and check specific regulations for your country before buying the application. </p>
            </div>
        </div>     
  </div>
   
                    
       
    <div id="main_content">
    <br/>
    <p><font size="+3">Upcoming Appointments</font></p>
    <div id="programMenu">
    <?php
	  if($isValid)
		echo $msg;
    ?>
    	<table width="452">
    	  <tr bgcolor="#CBCBCB">
    	    <th width="106">Date</th>
    	    <th width="119">Title</th>
            <th width="211">Doctor's Name</th>
  	    </tr>
        <?php 
			$result=$db->getPatApp($_SESSION['ID']);
			if(mysql_num_rows($result) > 0)
			{
			  while($row=mysql_fetch_array($result))
			  {
				echo'
				  <tr>
					<td>'.$row['aDate'].'</td>
					<td>'.$row['Title'].'</td>
					<td>Dr. '.$row['First_Name'].' '.$row['Last_Name'].'</td>
				  </tr>';
			  }
			}
			else
			{
				echo'
				  <tr>
					<td>No Appointments Booked</td>
					<td></td>
					<td></td>
				  </tr>';	
			}
		?>
  	  </table>
    	<br/>
  	 
    </div>
   </div>
    <div class="clear"></div>    
</div>     
       
       </div>     
            
     <div id="footer">
     	<div class="copyright">
        <img src="Style/images/footer_logo.gif" alt="" title="" />
        </div>
        <div class="center_footer">&copy;care group 2008. All Rights Reserved</div>
   	   <div class="footer_links">
        <a href="http://csstemplatesmarket.com"><img src="Style/images/csstemplatesmarket.gif" alt="csstemplatesmarket" title="csstemplatesmarket" border="0" /></a><br />
   	   </div>
    
    
    </div>


</div>
</body>
</html>
