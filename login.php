<?php  
require_once("Include/db.php");
$db=new DataManager();

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {   
        if(!empty($_POST['userlogin-Submit']))
        {   
            if(empty($_POST['userid']) || empty($_POST['userpassword']))
            {
                $notValidPat=true;
                $msg="Enter your Username and/or Password";
            } 
            else
            {
                 $result=$db->authenticateUser($_POST['userid'], $_POST['userpassword']);

                if(mysql_num_rows($result) > 0 )
                {
					$result1=$db->getUserDetails($_POST['userid']);
					
					if(mysql_num_rows($result1) > 0)
					{
						$row=mysql_fetch_array($result1);
						$user=$row['First_Name'].' '.$row['Last_Name'];
						
						session_start();        
						$_SESSION["User"]=$user;
						$_SESSION['ROLE']="USER";	
						$_SESSION['ID']=$_POST['userid'];					        
						header('Location: home.php' );  
					}
					else
					{
						session_start();        
						$_SESSION["PaitentID"]=$_POST["userid"];        
						header('Location: Register.php' );  	
					}
                }
                else
                {
                    $notValidPat=true;
                    $msg="Invalid User And/Or Password";
                } 
            }
        }
        if(!empty($_POST['doclogin-Submit']))
        {   
            if(empty($_POST['doctorid']) || empty($_POST['docpassword']))
            {
                $notValidDoc=true;
                $msg="Enter your Username and/or Password";
            } 
            else
            {
                 $result=$db->authenticateDoctor($_POST['doctorid'], $_POST['docpassword']);

                if(mysql_num_rows($result)>0)
                {
                    $result1=$db->getDocDetails($_POST['doctorid']);
					
					if(mysql_num_rows($result1) > 0)
					{
						$row=mysql_fetch_array($result1);
						$user=$row['First_Name'].' '.$row['Last_Name'];
						
						session_start();        
						$_SESSION["User"]=$user;	
						$_SESSION['ROLE']="DOCTOR";
						$_SESSION['ID']=$_POST['doctorid'];											        
						header('Location: DoctorHome.php' );  
					}
					else
					{
						session_start();        
						$_SESSION["ID"]=$_POST["doctorid"];   
						//$_SESSION['ROLE']="DOCTOR";     
						header('Location: RegisterDoctor.php' );  	
					}
                }
                else
                {
                    $notValidDoc=true;
                    $msg="Invalid User And/Or Password";
                } 
            }
        }
               
    }
	   
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>CARE GROUP | LOGIN</title>
<link href="Style/style.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="main_container">
  <div class="header">
    	<div id="logo"><a href="index.php"><img src="Style/images/logo.png" alt="" title="" width="162" height="54" border="0" /></a></div>
    <div class="right_header">
        	
            <div class="top_menu">
            <a href="#" class="login">login</a>
            <a href="signup.php" class="sign_up">signup</a>
            </div>
        
            <!--<div id="menu">
                <ul>                                              
                    <li><a class="current" href="#" title="">Home</a></li>
                    <li><a href="about.php" title="">About Us</a></li>
                    <li><a href="#" title="">Services</a></li>
                    <li><a href="#" title="">Contact Us</a></li>
                </ul>
            </div>-->
        
        </div>
<div class="right_header">
        	
        <div class="top_menu"></div>
   	  </div>
    
    </div>
    <div class="pattern_bg1">
   <marquee> <h1><font size="+6">CARE GROUP, MEDICAL SERVICE AT YOUR FINGER TIP</font></h1></p></marquee>
        </div>
        
  <div id="main_content">
    
		  <div class="box_content">
					<div class="box_title">
                    	<div class="title_icon"></div>
                        <h2>Patients<span class="dark_blue"> Login</span></h2>
                         </div>
                    
                    <div class="box_text_content">
                    <?php
                    if($notValidPat) 
                        echo $msg;
                    ?>
                    </div>

                    <div class="box_text_content">
                    <form method="post" action="login.php" id="userlogin">
                        <ol>
                            <li>
                            	<label for="userid"> User ID:</label> 
                            	<input type="text" name="userid" id="userid" autofocus size="25">
                            </li>  
                            <li>
                            	<label for="userpassword"> Password:</label> 
                            	<input type="password" name="userpassword" id="userpassword" size="25">
                            </li>                             
                            <li><p/></li> 
                            <li>
                            	<input name="userlogin-Submit" type="submit" value="Submit">
                            </li>
                        </ol>                      
                    </form>
                    </div>                    
	
    </div>
    <div class="box_content2">
					<div class="box_title">
                    	<div class="title_icon"><img src="Style/images/mini_icon3.gif" alt="" title="" /></div>
                        <h2>Doctors <span class="dark_blue">Login</span></h2>
                    </div>
                    
                    <div class="box_text_content">
                    	<?php
                    if($notValidDoc) 
                        echo $msg;
                    ?>
                    </div>

                    <div class="box_text_content">
                    <form method="post" action="login.php" id="doctorlogin">
                        <ol>
                            <li>
                            	<label for="doctorid"> Doctor ID:</label> 
                            	<input type="text" name="doctorid" id="doctorid" size="25">
                            </li>  
                            <li>
                            	<label for="docpassword"> Password:</label> 
                            	<input type="password" name="docpassword" id="docpassword" size="25">
                            </li>                             
                            <li><p/></li> 
                            <li>
                            	<input name="doclogin-Submit" type="submit" value="Submit">
                            </li>
                        </ol>                      
                    </form>
	
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
