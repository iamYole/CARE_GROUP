<?php 
require_once("Include/db.php");
$db=new DataManager();
session_start();

    if (array_key_exists("User", $_SESSION)&& $_SESSION['ROLE']=='USER')
    {       
        $isValid=false;
		$Valid=false;
		$user=$_SESSION['User'];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
			if(!empty($_POST['details-Submit']))
			{
			  if(empty( $_POST['fn']) || empty($_POST['ln']) || empty($_POST['cn']) || empty($_POST['email']) || 
					  empty($_POST['bloodgrp']) || empty($_POST['heit']) || empty($_POST['weit']) || empty($_POST['geno']) )
			  {
				  $isValid=true;
				  $msg="Please Fill in All Requried Fields";
			  }
			  else
			  {
				  if(is_numeric($_POST['cn']) && is_numeric($_POST['heit']) && is_numeric($_POST['weit']))
				  {
					  $db->updateUser($_POST['fn'],$_POST['ln'],$_POST['ons'],$_POST['email'],$_POST['cn'],$_SESSION['ID']);
					  $db->updateUser2($_POST['bloodgrp'],$_POST['geno'],$_POST['heit'],$_POST['weit'],$_POST['all'],$_SESSION['ID']);
					$isValid=true;
					$msg="RECORD UPDATED SUCESSFULLY";
				  }
				  else
				  {
					$isValid=true;
					$msg="Please Enter Numeric Values for Contact No, Weight and Height";
				  }
			  }
			}
			
			if(!empty($_POST['password-Sumbit']))
			{
				if(empty($_POST['op']) || empty($_POST['np']) || empty($_POST['rp']))
				{
					$Valid=true;
					$msg="Please Fill in All Fields";	
				}
				else 
				{
					if($_POST['np']==$_POST['rp'])
					{
					  $result=$db->authenticateUser($_SESSION['ID'],$_POST['op']);	
					  if(mysql_num_rows($result) > 0)	
					  {	  
						  $db->userPassword($_SESSION['ID'],$_POST['op'],$_POST['rp']);
						  $Valid=true;
						  $msg="Password Saved Sucessfully !!!";
					  }					
					  else
					  {
						  $Valid=true;
						  $msg="Wrong Password";
					  }
					}
					else
					{
						$Valid=true;
						$msg="Passwords Must Be The Same";
					}
				}
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
<title>CARE GROUP | USER PROFILE</title>
<link href="Style/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
#main_container #main_content #programMenu div form table tr td {
	text-align: right;
}
#main_container #main_content #programMenu div form table tr td {
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
            <h4><a href="#">Edit Profile</a></h4>
            
            </div>
        
           
        
        </div>
    
    </div>
	<div class="pattern_bg1">
   <marquee> <h1><font size="+6">CARE GROUP, MEDICAL SERVICE AT YOUR FINGER TIP</font></h1></p></marquee>
  </div>
   
                    
       
    <div id="main_content">
    <br/>
    <p><font size="+3">PAITENTS DETAILS</font></p>
    <div id="programMenu">
    <?php
	  if($isValid)
		echo $msg;
    ?>
    
   <!-- <br/>
    <p align="center"><font size="+2">PAITENT DETAILS</font></p>-->
    <div>
    
    <form action="userProfile.php" method="post">
    <?php
		$result=$db->getDetials('johndoe');
		$row=mysql_fetch_array($result);
		echo'
    	<table width="842" cellpadding="8" cellspacing="8">
    	  <tr>
    	    <th width="157" align="right" bgcolor="#CBCBCB">FIRST NAME</th>
    	    <td width="149"><label for="fn"></label>
    	      <input type="text" name="fn" id="fn" value='.$row['First_Name'].'></td>
    	    <td width="72">&nbsp;</td>
    	    <th width="171" align="right" bgcolor="#CBCBCB">BLOOD GROUP</th>
    	    <td width="163"><label for="bloodgrp"></label>
    	      <select name="bloodgrp" id="bloodgrp">
    	        <option value="A">A</option>
    	        <option value="B">B</option>
    	        <option value="AB">AB</option>
    	        <option value="O" selected>O</option>
  	          </select></td>
  	      </tr>
    	  <tr>
    	    <th align="right" bgcolor="#CBCBCB">LAST NAME</th>
    	    <td><input type="text" name="ln" id="ln" value='.$row['Last_Name'].'></td>
    	    <td>&nbsp;</td>
    	    <th align="right" bgcolor="#CBCBCB">GENOTYPE</th>
    	    <td><select name="geno" id="geno">
    	      <option value="AA">AA</option>
    	      <option value="AS" selected>AS</option>
    	      <option value="SS">SS</option>
            </select></td>
  	      </tr>
    	  <tr>
    	    <th align="right" bgcolor="#CBCBCB">OTHER NAMES</th>
    	    <td><input type="text" name="ons" id="ons" value='.$row['Other_Names'].'></td>
    	    <td>&nbsp;</td>
    	    <th align="right" bgcolor="#CBCBCB">HEIGHT</th>
    	    <td><input type="text" name="heit" id="heit" placeholder="height in Inches" value='.$row['height'].'></td>
  	      </tr>
    	  <tr>
    	    <th align="right" bgcolor="#CBCBCB">CONTACT NUMBER</th>
    	    <td><input type="text" name="cn" id="cn" value='.$row['Mobile_No'].'></td>
    	    <td>&nbsp;</td>
    	    <th align="right" bgcolor="#CBCBCB">WEIGHT</th>
    	    <td><input type="text" name="weit" id="weit" placeholder="weight in kg" value='.$row['weight'].'></td>
  	      </tr>
    	  <tr>
    	    <th align="right" bgcolor="#CBCBCB">EMAIL ADDRESS</th>
    	    <td><input type="text" name="email" id="email" value='.$row['EmailAddy'].'></td>
    	    <td>&nbsp;</td>
    	    <th align="right" bgcolor="#CBCBCB">ALLERGIES</th>
    	    <td><input type="text" name="all" id="all" value='.$row['allergies'].'></td>
  	      </tr>
    	  <tr>
    	    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    	    <td>&nbsp;</td>
    	    <td><input type="submit" name="details-Submit" id="details-Submit" value="Save"></td>
    	    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    	    <td>&nbsp;</td>
  	    </tr>
  	    </table>
		';
		?>
        </form>
        <br/><br/>
        <p><font size="+3">CHANGE PASSWORD</font></p>
        <form action="userProfile.php" method="post">
        <?php
		  if($Valid)
			echo $msg;
		?>
          <table width="380" cellpadding="8" cellspacing="8">
            <tr>
              <th width="157" align="right" bgcolor="#CBCBCB">OLD PASSWORD</th>
              <td width="228"><input type="password" name="op" id="op"></td>
            </tr>
            <tr>
              <th width="157" align="right" bgcolor="#CBCBCB">NEW PASSWORD </th>
              <td><input type="password" name="np" id="np"></td>
            </tr>
            <tr>
              <th width="157" align="right" bgcolor="#CBCBCB">(RE) PASSWORD</th>
              <td><input type="password" name="rp" id="rp"></td>
            </tr>
            <tr>
              <th>&nbsp;</th>
              <td><input type="submit" name="password-Sumbit" id="password-sumbit2" value="Save"></td>
            </tr>
          </table>
        </form>
    </div>
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