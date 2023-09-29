<?php 
require_once("Include/db.php");
$db=new DataManager();
session_start();

    if (array_key_exists("User", $_SESSION))
   	{
		if(array_key_exists("Doc_ID",$_REQUEST)) 
		{
			$did=$_REQUEST['Doc_ID'];			
		}
		else
		{			
			$did=$_SESSION['ID'];		
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
<title>Manage Doctors</title>
<link href="Style/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="main_container">
  <div class="header">
    	<div id="logo"><a href="index.php"><img src="Style/images/logo.png" alt="" title="" width="162" height="54" border="0" /></a></div>
    
   	<div class="right_header">
        	
      <div class="top_menu">
        <h3>Welcome  <span class="dark_blue"><?php echo $_SESSION['User'];?></span></h3>
            <h4><a href="changePW.php">Reset Password</a></h4>
      </div>
        
      <div id="menu">
                <ul>                                              
                	<?php 
					if($_SESSION['ROLE']=="ADMIN")
					{
						echo'
						<li><a href="AdminHome.php?" title="">Home</a></li>
						<li><a class="current" href="#" title="">Doctors</a></li>
						<li><a href="Locations.php" title="">Locations</a></li>
						<li><a href="Paitents.php" title="">Paitents</a></li>
						<li><a href="AddContent.php" title="">Contents</a></li>';
					}
					else if($_SESSION['ROLE']=="DOCTOR")
					{
						echo'
						<li><a href="DoctorHome.php" title="">Home</a></li>
						<li><a class="current" href="#" title="">My Profile</a></li>
						<li><a href="MyAppointments.php" title="">Appointments</a></li>
						<li><a href="DocPaitents.php" title="">My Paitents</a></li>';
					}
					?>
                </ul>
      </div>
        
    </div>
    
  </div>
	
    <div class="pattern_bg1">
   <marquee> <h1><font size="+6">CARE GROUP, MEDICAL SERVICE AT YOUR FINGER TIP</font></h1></p></marquee>
  </div>
    <div id="main_content">
    <br/>
    <?php
		if($_SESSION['ROLE']==USER)
		{
			echo '<p><font size="+3"><a href="searchDoctors.php">BACK</a></font></p>';
		}
		else
		{
			echo '<p><font size="+3">DOCTOR ID '.$did.'</font></p>';
        }
    ?>
    <div id="programMenu">
    <?php
	$result=$db->getDoc($did);
	$result2=$db->getDocDetail($did);
	$row=mysql_fetch_array($result);
	$row2=mysql_fetch_array($result2);
	echo'	  
		<table width="393" border="0" cellpadding="8" cellspacing="8">		  
		  <tr>
			<th width="116" align="right" bgcolor="#F0F0F0">DOCTOR ID</th>
			<td width="261"><input name="docID" type="text" id="docID" size="25" readonly="readonly" value='.$row['DocID'].'></td>
		  </tr>        
		  <tr>
			<th align="right" bgcolor="#F0F0F0">FIRST NAME</th>
			<td><input name="docID2" type="text" id="docID2" size="25" readonly="readonly" value='.$row['First_Name'].'></td>
		  </tr>
		  <tr>
			<th align="right" bgcolor="#F0F0F0">LAST NAME</th>
			<td><input name="docID3" type="text" id="docID3" size="25" readonly="readonly" value='.$row['Last_Name'].' ></td>
		  </tr>
		  <tr>
			<th align="right" bgcolor="#F0F0F0">SEX</th>
			<td><input name="docID4" type="text" id="docID4" size="25" readonly="readonly" value='.$row['Gender'].'></td>
		  </tr>
		  <tr>
			<th align="right" bgcolor="#F0F0F0">LOCATION</th>
			<td><input name="docID5" type="text" id="docID5" size="25" readonly="readonly" value='.$row2[1].'></td>
		  </tr>
		  <tr>
			<th align="right" bgcolor="#F0F0F0">SPECIALITY</th>
			<td><input name="docID" type="text" id="docID6" size="25" readonly="readonly" value='.$row2[2].'></td>
		  </tr>
		  <tr>
			<th align="right" bgcolor="#F0F0F0">Description</th>
			<td><textarea name="docID" cols="25" rows="5" readonly="readonly">'.$row2[3].'</textarea></td>
		  </tr>
		</table>
		';
		?>
        <?php
		if($_SESSION['ROLE']=="ADMIN")
		{
			echo' 
		  <div id="controlmenu">
		  <ul>
				<li><a href="ViewDoctors.php">View Doctors</a></li>
				<li><a href="AddDoctor.php">Add New</a></li>
				<li><a href="">Delete</a></li>
			</ul>
		  </div>';
		}
		else if($_SESSION['ROLE']=="DOCTOR")
		{
			echo' 
		  <div id="controlmenu">
		  <ul>
				<li><a href="editDoctor.php">Edit Details</a></li>
		</ul>
		  </div>';
		}
		else if($_SESSION['ROLE']=="USER")
		{
			echo' 
		  <div id="controlmenu">
		  <ul>
				<li><a href="PaitentsAppointments.php?DocId='.$did.'">View Schedule</a></li>
				<li><a href="PaitentsAppointments.php?DocId='.$did.'">Book Appoint..</a></li>
			</ul>
		  </div>';
		}
	  ?>
    </div>
      
    </div>
    <div class="clear"></div>    
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