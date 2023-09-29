<?php 
require_once("Include/db.php");
$db=new DataManager();
session_start();

    if (array_key_exists("User", $_SESSION))
    {       
        $isValid=false;
		$user=$_SESSION['User'];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
			if(empty($_POST['opassword']) || empty($_POST['password']) || empty($_POST['rpassword']))
			{
				$isValid=true;
				$msg="Please Fill in All fields";
			}
			else if($_POST["password"]==$_POST['rpassword'])
			{
				if($_SESSION['ROLE']=="USER")
				{	
					$result=$db->authenticateUser($_SESSION['ID'],$_POST['opassword']);	
					if(mysql_num_rows($result) > 0)	
					{	  
				   		$db->userPassword($_SESSION['ID'],$_POST['opassword'],$_POST['rpassword']);
						$isValid=true;
						$msg="Password Saved Sucessfully !!!";
					}					
					else
					{
						$isValid=true;
						$msg="Wrong Password";
					}
				}
				
				if($_SESSION['ROLE']=="DOCTOR")
				{
					$result=$db->authenticateDoctor($_SESSION['ID'],$_POST['opassword']);
					if(mysql_num_rows($result) > 0 )
					{
						$db->doctorPassword($_SESSION['ID'],$_POST['opassword'],$_POST['rpassword']);
						
						$isValid=true;
						$msg="Password Saved Sucessfully !!!";
					}
					else
					{
						$isValid=true;
						$msg="Wrong Password";
					}
				}
				
				if($_SESSION['ROLE']=="ADMIN")
				{
					$result=$db->authenticateAdmin($_SESSION['ID'],$_POST['opassword']);
					if(mysql_num_rows($result) > 0 )
					{
						$db->adminPassword($_POST['opassword'],$_POST['rpassword']);
						
						$isValid=true;
						$msg="Password Saved Sucessfully !!!";
					}
					else
					{
						$isValid=true;
						$msg="Wrong Password";
					}
				}				
			}
			else
			{
				$isValid=true;
				$msg="Passwords Must Be The Same";
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
<title>Change Password</title>
<link href="Style/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="main_container">
  <div class="header">
    	<div id="logo"><a href="index.php"><img src="Style/images/logo.png" alt="" title="" width="162" height="54" border="0" /></a></div>
    <div class="right_header">
        	
            <div class="top_menu">
            <h3>Welcome  <span class="dark_blue"><?php echo $user;?></span></h3>
          
            
            </div>
            <!--<div class="top_menu">
            <a href="login.php" class="login">login</a>
            <a href="#" class="sign_up">signup</a>
            </div>  -->  
        </div>
        
<div class="right_header">
        	
        <div class="top_menu">
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
					else if($_SESSION['ROLE']=="USER")
					{
						echo'
						<li><a href="home.php" title="">Home</a></li>
						<li><a class="current" href="#" title="">My Profile</a></li>
						<li><a href="#" title="">Appointments</a></li>
						<li><a href="#" title="">My Paitents</a></li>';
					}
					?>
                </ul>
      </div>
        </div>
   	  </div>
    
    </div>
    <div class="pattern_bg1">
   <marquee> <h1><font size="+6">CARE GROUP, MEDICAL SERVICE AT YOUR FINGER TIP</font></h1></p></marquee>
    	
        </div>
  <div id="main_content">

		  <div class="box_content2">
					<div class="box_title">
                    	<div class="title_icon"></div>
                        <h2><span class="dark_blue">Change Password</span></h2>
            </div>
                    
                    <div class="box_text_content">
                    <?php
                        if($isValid)
                        echo $msg;
                    ?>
                    </div>

                    <div class="box_text_content">
                    <form method="post">
                        <ol>
                            <li>
                            	<label for="opassword"> Old Password :</label> 
                            	<input type="password" name="opassword" id="opassword" autofocus size="25">
                            </li>  
                            <li>
                            	<label for="password"> New Password:</label> 
                            	<input type="password" name="password" id="password" size="25">
                            </li>   
                            <li>
                            	<label for="rpassword"> (RE) Password:</label> 
                            	<input type="password" name="rpassword" id="rpassword" size="25">
                            </li>                          
                            <li><p/></li> 
                            <li>
                            	<input type="submit" value="Save">
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

