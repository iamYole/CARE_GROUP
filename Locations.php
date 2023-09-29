<?php  
require_once("Include/db.php");
$db=new DataManager();
session_start();
	if (array_key_exists("User", $_SESSION) && $_SESSION['ROLE']=='ADMIN')
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{   
			  if(!empty($_POST['cityForm-Submit']))
			  {   
				  if(empty($_POST['noc']) || empty($_POST['country']) || empty($_POST['cc']))
				  {
					  $notValidPat=true;
					  $msg="Fill in All Fields Correctly";
				  } 
				  else
				  {
					  $notValidPat=true;
					  $db->addcity($_POST['cc'],$_POST['noc'],$_POST['country']);	
					  $msg="Record Saved Sucessfully !!!";	  
				  }
			  }
			  if(!empty($_POST['doctorsForm-Submit']))
			  {   
				  if(empty($_POST['tod']) || empty($_POST['description']))
				  {
					  $notValidDoc=true;
					  $msg="Fill in All Fields Correctly";
				  } 
				  else
				  {
					  $notValidDoc=true;
					   $db->addSpec($_POST['tod'],$_POST['description']);
						$msg="Record Saved Sucessfully !!!";
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
<title>CARE GROUP | Locations</title>
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
                    <li><a href="AdminHome.php" title="">Home</a></li>
                    <li><a href="ViewDoctors.php" title="">Doctors</a></li>
                    <li><a class="current" href="#" title="">Locations</a></li>
                    <li><a href="Paitents.php" title="">Paitents</a></li>
                    <li><a href="AddContent.php" title="">Contents</a></li>
                </ul>
      </div>
        
    </div>
    
  </div>
	
    <div class="pattern_bg1">
   <marquee> <h1><font size="+6">CARE GROUP, MEDICAL SERVICE AT YOUR FINGER TIP</font></h1></p></marquee>
  </div>
  <div id="main_content">
    <br/>
    <table width="540" align="center">
      <tr align="center">
        <td width="117"><h2><a href="Locations.php"><strong>Add City</strong></a></h2></td>
        <td width="133"><h2><a href="ViewCities.php"><strong>View Cities</strong></a></h2></td>
        <td width="125"><h2><a href="Locations.php"><strong>Add Speciality</strong></a></h2></td>
        <td width="145"><h2><a href="TypesOfDoctors.php"><strong>View Specialities</strong></a></h2></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <div class="box_content">
					<div class="box_title">
                    	<div class="title_icon"></div>
                        <h2>Add<span class="dark_blue"> New City</span></h2>
      </div>
                    
                    <div class="box_text_content">
                    <?php
                    if($notValidPat) 
                        echo $msg;
                    ?>
                    </div>

                    <div class="box_text_content">
					<form method="post" action="Locations.php" id="cityForm">
                        <ol>
                        	<li>
                            	<label for="noc"> City Code:</label> 
                            	<input type="text" name="cc" id="cc"  size="25" placeholder="NYC">
                            </li> 
                            <li>
                            	<label for="noc"> Name Of City:</label> 
                            	<input type="text" name="noc" id="noc"  size="25" placeholder="NEW YORK CITY">
                            </li>  
                          <li>
                           	<label for="country"> Country:</label> 
                           	  <input type="text" name="country" id="country" size="25" placeholder="UNITED STATES">
                            </li>                             
                            <li><p/></li> 
                            <li>
                            	<input name="cityForm-Submit" type="submit" value="Submit">
                            </li>
                        </ol>                      
                    </form>
                    </div>                  
    </div>
    
    <div class="box_content2">
					<div class="box_title">
					  <h2>New <span class="dark_blue">Doctor Speciality</span></h2>
      </div>
                    
                    <div class="box_text_content">
                    	<?php
                    if($notValidDoc) 
                        echo $msg;
                    ?>
                    </div>

                    <div class="box_text_content">
						<form method="post" action="Locations.php" id="doctorsForm">
                        <ol>
                            <li>
                            	<label for="tod"> Type Of Doctor:</label> 
                            	<input type="text" name="tod" id="tod" size="25">
                          </li>  
                            <li>
                            	<label for="description"> Description:</label>
                                <textarea name="description" cols="25" rows="5" id="description"></textarea>
                          </li>                             
                            <li><p/></li> 
                            <li>
                            	<input name="doctorsForm-Submit" type="submit" value="Submit">
                            </li>
                        </ol>                      
                    </form>
	
            </div>
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