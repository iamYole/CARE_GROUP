<?php 
require_once("Include/db.php");
$db=new DataManager();
session_start();

    if (array_key_exists("User", $_SESSION)&& $_SESSION['ROLE']=='DOCTOR')
   	{
		if(array_key_exists("Doc_ID",$_REQUEST)) 
		{
			$did=$_REQUEST['Doc_ID'];			
		}
		else
		{			
			$did=$_SESSION['ID'];		
		}	
		
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(empty($_POST['fn']) ||  empty($_POST['ln']) || empty($_POST['desc']))
			{
				$notValid=true;
                $msg="Please Fill in All Fields";
			}		
			else
			{
				$db->editDoc($_POST['fn'],$_POST['ons'],$_POST['ln'],$_SESSION['DID']);
				$db->editDoc2($_POST['desc'],$_SESSION['DID']);
				
				header('Location: Doctors.php' ); 
			}		
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
<title>Edit</title>
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
                  <li><a href="DoctorHome.php" title="">Home</a></li>
                  <li><a class="current" href="#" title="">My Profile</a></li>
                  <li><a href="MyAppointments.php" title="">Appointments</a></li>
                  <li><a href="DocPaitents.php" title="">My Paitents</a></li>';

                </ul>
      </div>
        
    </div>
    
  </div>
	
    <div class="pattern_bg1">
   <marquee> <h1><font size="+6">CARE GROUP, MEDICAL SERVICE AT YOUR FINGER TIP</font></h1></p></marquee>
  </div>
    <div id="main_content">
    <br/>
    <p><font size="+3">DOCTOR ID</font></p>
    <div id="programMenu">
    <?php
    	if($notValid)
		echo $msg;
	?>
    <form action="editDoctor.php" method="post">
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
			<td><input name="fn" type="text" id="fn" size="25" " value='.$row['First_Name'].'></td>
		  </tr>      
		  <tr>
			<th align="right" bgcolor="#F0F0F0">OTHER NAME(S</th>
			<td><input name="ons" type="text" id="ons" size="25" " value='.$row['Other_Names'].'></td>
		  </tr>
		  <tr>
			<th align="right" bgcolor="#F0F0F0">LAST NAME</th>
			<td><input name="ln" type="text" id="ln" size="25"  value='.$row['Last_Name'].' ></td>
		  </tr>		  
		  <tr>
			<th align="right" bgcolor="#F0F0F0">Description</th>
			<td><textarea name="desc" cols="25" rows="5" >'.$row2[3].'</textarea></td>
		  </tr>
		  <tr>
			<th align="right"></th>
			<td><input type="Submit" value="Save" ></td>
		  </tr>
		</table>
		';
		?>
        </form>
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
				<li><a href="Doctors.php">Back</a></li>
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