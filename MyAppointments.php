<?php 
require_once("Include/db.php");
$db=new DataManager();
session_start();

    if (array_key_exists("User", $_SESSION)&& $_SESSION['ROLE']=='DOCTOR')
    {       
        $isValid=false;
		$user=$_SESSION['User'];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
			if(empty($_POST['title']) || empty($_POST['description']))
			{
				$isValid=true;
				$msg="Please Fill in All requried Field";	
			}
			else if($_POST['day']=='Day' || $_POST['gender']=='Sex' || $_POST['month']=='Month' || $_POST['year']=='Year')
			{
				$isValid=true;
				$msg="Please Enter A Valid Date";	
			}
			else
			{
				$adate=$_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
				$_date=strtotime($adate);
				$_today=strtotime(date('Y-m-d'));
				if($_date > $_today)
				{
					$db->updateAppointment($_SESSION['ID'],$_POST['title'],$adate,$_POST['description']);
					$isValid=true;
					$msg="Sucessful !!!";
				}	
				else
				{
					$isValid=true;
					$msg="Please Enter A Future Date";
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
<title>CARE GROUP | MY APPOINTMENTS</title>
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
                    <li><a class="current" href="#" title="">Appointments</a></li>
                    <li><a href="DocPaitents.php" title="">My Paitents</a></li>
                </ul>
            </div>
        
        </div>
    
    </div>
	<div class="pattern_bg1">
   <marquee> <h1><font size="+6">CARE GROUP, MEDICAL SERVICE AT YOUR FINGER TIP</font></h1></p></marquee>
  </div>
   
                    
       
    <div id="main_content">
    <br/>
    <p><font size="+3">UPDATE SCHEDULE</font></p>
    <div id="programMenu">
    <?php
	  if($isValid)
		echo $msg;
    ?>
   	  <form action="MyAppointments.php" method="POST">
      <table width="393" border="0" cellpadding="8" cellspacing="8">
        
        <tr>
          <th width="137" align="right" bgcolor="#CBCBCB">TITLE</th>
          <td width="200"><input name="title" type="text" id="title" size="25" value="<?php echo $_POST['title']?>"></td>
        </tr>        
        <tr>
          <th align="right" bgcolor="#CBCBCB">DATE</th>
          <td><select name="day" id="day">
            <option value="Day">Day</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
          </select>
            <select name="month" id="month">
              <option value="Month">Month</option>
              <option value="01">Jan</option>
              <option value="02">Feb</option>
              <option value="03">Mar</option>
              <option value="04">Apr</option>
              <option value="05">May</option>
              <option value="06">Jun</option>
              <option value="07">Jul</option>
              <option value="08">Aug</option>
              <option value="09">Sep</option>
              <option value="10">Oct</option>
              <option value="11">Nov</option>
              <option value="12">Dec</option>
          </select>
            <select name="year" id="year">  
              <option value="Year">Year</option>          
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
              <option value="2026">2026</option>
              <option value="2027">2027</option>
              <option value="2028">2028</option>
              <option value="2029">2029</option>
          </select></td>
        </tr>
        <tr>
          <th width="137" align="right" valign="top" bgcolor="#CBCBCB">DESCRIPTION</th>
          <td><textarea name="description" cols="25" rows="5" id="description" ><?php echo $_POST['description']?></textarea>
          </td>
        </tr> 
       <tr>
          <th width="137" align="right" ></th>
          <td width="200"><input type="submit" value="Save"></td>
        </tr> 
      </table>
     <br/>
    <p><font size="+3">Upcoming Appointments</font></p>      
      </form>
    	<table width="439">
    	  <tr bgcolor="#CBCBCB">
    	    <th width="107">Date</th>
    	    <th width="135">Title</th>
            <th width="181">Paitent ID</th>
  	    </tr>
        <?php 
			$result=$db->getDocApp1($_SESSION['ID']);
			while($row=mysql_fetch_array($result))
			{
			  echo'
				<tr>
				  <td>'.$row['DateAP'].'</td>
				  <td>'.$row['Title'].'</td>
				  <td>N/A</td>
				</tr>';
			}
			$result1=$db->getDocApp2($_SESSION['ID']);
			while($row1=mysql_fetch_array($result1))
			{
			  echo'
				<tr>
				  <td>'.$row1['aDate'].'</td>
				  <td>'.$row1['Title'].'</td>
				  <td>'.$row1['PaitentID'].'</td>
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
