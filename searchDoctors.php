<?php 
require_once("Include/db.php");
$db=new DataManager();
session_start();

    if (array_key_exists("User", $_SESSION)&& $_SESSION['ROLE']=='USER')
    {       
        $isValid=false;
		$user=$_SESSION['User'];
		$showSpec=false;
		$showLoc=false;
        
		if(!empty($_POST['location-Submit']))
        {
		  if ($_SERVER["REQUEST_METHOD"] == "POST")
		  {
			  $result=$db->searchByLoc($_POST['loc']);
			  $showLoc=true;
			  $showSpec=false;
		  }
		}
		
		if(!empty($_POST['Spec-Submit']))
        {
		  if ($_SERVER["REQUEST_METHOD"] == "POST")
		  {
			  $result=$db->searchBySpec($_POST['Spec']);
			  $showLoc=false;
			  $showSpec=true;
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
<title>CARE GROUP | DOCTORS</title>
<link href="Style/style.css" rel="stylesheet" type="text/css">
</head>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>CARE GROUP | HOME</title>
<link href="Style/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="main_container">
	<div class="header">
    	<div id="logo"><a href="home.php"><img src="Style/images/logo.png" alt="" title="" width="162" height="54" border="0" /></a></div>
    
    	<div class="right_header">
        	
            <div class="top_menu">
            <h3>Welcome  <span class="dark_blue"><?php echo $user;?></span></h3>
            <h4><a href="userProfile.php">Edit Profile</a></h4>
            
            </div> 
            
        
        </div>
    
    </div>
    
    
   <!-- <div id="middle_box">
    	<div class="middle_box_content"><img src="Style/images/banner_content.jpg" alt="" title="" /></div>
    </div>-->
    
    
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
     <form id="myLocation" action="searchDoctors.php" method="post">
    <table width="872" align="left">
      <tr align="center">
        <td width="98" align="left"> By Location</td>
        <td width="338" align="left"><select name="location" id="ciyt">
          <?php
                	$result=$db->getLocations();
					while($row=mysql_fetch_array($result))
					{
						echo'<option value='.$row[0].'>'.$row[1].','.$row[2].'</option>';
					}  
				?>
        </select> <input name="location-Submit" type="submit" value="Search"></td>
        <td width="13" align="left">&nbsp;</td>
        </form>
        <form id="bySpec" action="searchDoctors.php" method="post">
        <td width="196" align="left"> By Speciality</td>
        <td width="203" align="left"><select name="spec" id="location">
          <?php
							  $result=$db->getSpecs();
							  while($row=mysql_fetch_array($result))
							  {
								  echo'<option value='.$row[0].'>'.$row[0].'</option>';
							  }  
							?>
        </select>
        <input name="Spec-Submit" type="submit" value="Search"></td>        
      </tr>
    </table>
    </form>
    <br/>
    <div id="programMenu">
    <?php 
		if($showLoc)
		{
			echo'
			   <table width="830" border="0" align="center">		  
				  <tr bgcolor="#E8EFF2">
					<th width="119"><strong>FIRST NAME</strong></th>
					<th width="112"><strong>LAST NAME</strong></th>
					<th width="83"><strong>SEX</strong></th>
					<th width="145">EMAIL ADDRESS</th>
					<th width="145">SPECIALTY</th>
				  </tr>';
			        
						$result=$db->searchByLoc($_POST['location']);
						while($row=mysql_fetch_array($result))
						{
					 echo '    
						  <tr  align="center" valign="baseline">					
							<td><a href="Doctors.php?Doc_ID='.$row['DocID'].'">'.$row['First_Name'].'</td>
							<td>'.$row['Last_Name'].'</td>
							<td>'.$row['Gender'].'</td>					
							<td>'.$row['EmailAddy'].'</td>
							<td>'.$row['spec_id'].'</td>
						  </tr>';
					   }
			echo'
			  </table>
			  ';
		}
		else if($showSpec)
		{
			echo'
			   <table width="830" border="0" align="center">		  
				  <tr bgcolor="#E8EFF2">
					<th width="119"><strong>FIRST NAME</strong></th>
					<th width="112"><strong>LAST NAME</strong></th>
					<th width="83"><strong>SEX</strong></th>
					<th width="145">EMAIL ADDRESS</th>
					<th width="145">LOCATION</th>
				  </tr>';
			        
						$result=$db->searchBySpec($_POST['spec']);
						while($row=mysql_fetch_array($result))
						{
					 echo '    
						  <tr  align="center" valign="baseline">					
							<td><a href="Doctors.php?Doc_ID='.$row['DocID'].'">'.$row['First_Name'].'</td>
							<td>'.$row['Last_Name'].'</td>
							<td>'.$row['Gender'].'</td>					
							<td>'.$row['EmailAddy'].'</td>
							<td>'.$row['Location_Name'].', '.$row['Country'].'</td>
						  </tr>';
					   }
			echo'
			  </table>
			  ';
		}
      ?>
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