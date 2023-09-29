<?php 
require_once("Include/db.php");
$db=new DataManager();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>CARE GROUP | ARTICLES</title>
<link href="Style/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="main_container">
	<div class="header">
    	<div id="logo"><a href="index.php"><img src="Style/images/logo.png" alt="" title="" width="162" height="54" border="0" /></a></div>
    
    	<div class="right_header">
        	
            <div class="top_menu">
            <a href="login.php" class="login">login</a>
            <a href="signup.php" class="sign_up">signup</a>
            </div>
        
            
        
        </div>
    
    </div>
    
    
    <div id="middle_box">
    	<div class="middle_box_content"><img src="Style/images/banner_content.jpg" alt="" title="" /></div>
    </div> 

    <div id="main_content">
    <br/>
    <p><font size="+3">Articles</font></p>
    <br/><br/>
    <div id="programMenu">
    <li>
    	<?php
        	$result=$db->getContents();
			while($row=mysql_fetch_array($result))
			{
				echo'
						<li><a href="Article.php?ID='.$row['id'].'">'.$row['Headline'].'      -   '.$row['Author'].'</a></li>
					';	
			}
		?>        
    </li>
    </div>
    </div>
    <div class="clear"></div>    
</div>     
            
            
     <div id="footer">
     	<div class="copyright">
        <img src="Style/images/footer_logo.gif" alt="" title="" />
        </div>
        <div class="center_footer">&copy;care group 2012. All Rights Reserved</div>
   	   <div class="footer_links">
        <a href="http://csstemplatesmarket.com"><img src="Style/images/csstemplatesmarket.gif" alt="csstemplatesmarket" title="csstemplatesmarket" border="0" /></a><br />
   	   </div>
    
    </div>


</div>
</body>
</html>
