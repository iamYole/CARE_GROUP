<?php 
require_once("Include/db.php");
$db=new DataManager();
session_start();

    if (array_key_exists("User", $_SESSION)&& $_SESSION['ROLE']=='USER')
    {   
		    
		  $isValid=false;
		  $user=$_SESSION['User'];
		  
		  $result=$db->getDocDetails($_REQUEST['DocId']);
		  $row=mysql_fetch_array($result);
		  $doc=$row['First_Name'].' '.$row['Last_Name'];
		  $did=$_REQUEST['DocId'];
		  
		  if ($_SERVER["REQUEST_METHOD"] == "POST")
		  {
			  $doc=$_POST['doc'];
			  $did=$_POST['did'];
			  
			  
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
					  $result=$db->confirmDate1($did,$adate);
					  $result1=$db->confirmDate2($did,$adate);
					  if(mysql_num_rows($result) > 0 || mysql_num_rows($result1) > 0)
					  {
						  $isValid=true;
						  $msg="Date has already been booked";
					  }
					  else
					  {
						  $db->bookApp($_SESSION['ID'],$did,$_POST['title'],$adate,$_POST['description']);
						  $isValid=true;
						  $msg="Appointment Booked Sucessfully";	
					  }
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
</head>

<body>
<div id="main_container">
	<div class="header">
    	<div id="logo"><a href="home.php"><img src="Style/images/logo.png" alt="" title="" width="162" height="54" border="0" /></a></div>
    
    	<div class="right_header">
        	
            <div class="top_menu">
            <h3>Welcome  <span class="dark_blue"><?php echo $_SESSION['User'];?></span></h3>
            <h4><a href="userProfile.php">Edit Profile</a></h4>
            
            </div>                  
        
        </div>
    
    </div>
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
    <p><font size="+3">Appointment with Dr.<?php echo $doc;?>
    </font></p>
    <div id="programMenu">
    <?php
	  if($isValid)
		echo $msg;
    ?>
   	  <form action="PaitentsAppointments.php" method="POST">
      <table width="393" border="0" cellpadding="8" cellspacing="8">     
         <tr>
         	<td><input name="did" type="hidden" id="did" value="<?php echo $did;?>"></td>
            <td><input name="doc" type="hidden" id="doc" value="<?php echo $doc?>"></td>
         </tr> 
         <tr>
         	<th align="right" bgcolor="#CBCBCB">Title</th>
            <td><label for="title"></label>
              <label for="title2"></label>
            <input name="title" type="text" id="title2" value="<?php echo $_POST['title']?>"></td>
         </tr>       
        <tr>
          <th align="right" bgcolor="#CBCBCB">DATE</th>
          <td><select name="day" id="day">
            <option value="Day">Day</option>
            <option value="01">1</option>
            <option value="02">2</option>
            <option value="03">3</option>
            <option value="04">4</option>
            <option value="05">5</option>
            <option value="06">6</option>
            <option value="07">7</option>
            <option value="08">8</option>
            <option value="09">9</option>
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
      
   	  </form>
    	 <br/>
    <p><font size="+3">Upcoming Appointments</font></p>      
      </form>
    	<table width="321">
    	  <tr bgcolor="#CBCBCB">
    	    <th width="103">Date</th>
    	    <th width="279">Title</th>
  	    </tr>
        <?php 
			$result=$db->getDocApp1($did);
			while($row=mysql_fetch_array($result))
			{
			  echo'
				<tr>
				  <td>'.$row['DateAP'].'</td>
				  <td>'.$row['Title'].'</td>
				</tr>';
			}
			$result1=$db->getDocApp2($did);
			while($row1=mysql_fetch_array($result1))
			{
			  echo'
				<tr>
				  <td>'.$row1['aDate'].'</td>
				  <td>'.$row1['Title'].'</td>
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