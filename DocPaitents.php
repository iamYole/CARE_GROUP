<?php 
require_once("Include/db.php");
$db=new DataManager();
session_start();

    if (array_key_exists("User", $_SESSION)&& $_SESSION['ROLE']=='DOCTOR')
    {       
        $isValid=false;
		$show=false;
		$user=$_SESSION['User'];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
			$result=$db->getDocPats($_SESSION['ID']);
			if(mysql_num_rows($result) > 0)
			{
				$result1=$db->getPaitentsByID($_POST['pats']);
				if(mysql_num_rows($result1) == 1)
				{
					$show=true;
				}
			}
			else
			{
				$show=false;	
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
<title>CARE GROUP | MY PAITENTS</title>
<link href="Style/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
#apDiv1 {
	position:absolute;
	width:361px;
	height:221px;
	z-index:1;
	left: 573px;
	top: 513px;
}
</style>
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
                    <li><a href="Doctors.php" title="">My Profile</a></li>
                    <li><a href="MyAppointments.php" title="">Appointments</a></li>
                    <li><a class="current" href="#" title="">My Paitents</a></li>
                </ul>
            </div>
        
        </div>
    
    </div>
	<div class="pattern_bg1">
   <marquee> <h1><font size="+6">CARE GROUP, MEDICAL SERVICE AT YOUR FINGER TIP</font></h1></p></marquee>
  </div>
   
                    
       
    <div id="main_content">
    <br/>
    <p><font size="+3">MY PAITENTS</font></p>
    <div id="programMenu">
    <?php
	  if($isValid)
		echo $msg;
    ?>
   	  <form action="DocPaitents.php" method="POST">
      <table width="393" border="0" cellpadding="8" cellspacing="8">
        
        <tr>
          <th width="137" align="right" bgcolor="#CBCBCB">Search Paitent</th>
          <td width="200"><select name="pats" id="pats">
            <?php 
				$result=$db->getDocPats($_SESSION['ID']);
				while($row=mysql_fetch_array($result))
				{
					echo'<option value='.$row[0].'>'.$row[0].'</option>';	
				}
			?>
            </select>
            <input type="submit" value="Search"></td>
        </tr>        
        </table>
</form>
<?php
	if($show)
	{
		$result1=$db->getPaitentsByID($_POST['pats']);
		$result2=$db->getAge($_POST['pats']);
		$row=mysql_fetch_array($result1);
		$row2=mysql_fetch_array($result2);
	echo'
    <br/>
    <p align="center"><font size="+2">PAITENT DETAILS</font></p>
    <div>
    <br/><br/>
    	<table width="842" cellpadding="8" cellspacing="8">
    	  <tr>
    	    <th width="158" align="right" bgcolor="#CBCBCB">FULL NAME</th>
    	    <td width="172">'.$row['First_Name'].' '.$row['Last_Name'].'</td>
    	    <td width="54">&nbsp;</td>
    	    <th width="166" align="right" bgcolor="#CBCBCB">BLOOD GROUP</th>
    	    <td width="162">'.$row['bloodgroup'].'</td>
  	      </tr>
    	  <tr>
    	    <th align="right" bgcolor="#CBCBCB">SEX</th>
    	    <td>'.$row['Gender'].'</td>
    	    <td>&nbsp;</td>
    	    <th align="right" bgcolor="#CBCBCB">GENOTYPE</th>
    	    <td>'.$row['genotype'].'</td>
  	      </tr>
    	  <tr>
    	    <th align="right" bgcolor="#CBCBCB">AGE</th>
    	    <td>'.$row2[1].' years old</td>
    	    <td>&nbsp;</td>
    	    <th align="right" bgcolor="#CBCBCB">HEIGHT</th>
    	    <td>'.$row['height'].'</td>
  	      </tr>
    	  <tr>
    	    <th align="right" bgcolor="#CBCBCB">CONTACT NUMBER</th>
    	    <td>'.$row['Mobile_No'].'</td>
    	    <td>&nbsp;</td>
    	    <th align="right" bgcolor="#CBCBCB">WEIGHT</th>
    	    <td>'.$row['weight'].'</td>
  	      </tr>
    	  <tr>
    	    <th align="right" bgcolor="#CBCBCB">EMAIL ADDRESS</th>
    	    <td>'.$row['EmailAddy'].'</td>
    	    <td>&nbsp;</td>
    	    <th align="right" bgcolor="#CBCBCB">ALLERGIES</th>
    	    <td>'.$row['allergies'].'</td>
  	      </tr>
  	    </table>
    </div>
	';
	}
	?>
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