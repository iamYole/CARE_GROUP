<?php 
require_once("Include/db.php");
$db=new DataManager();
session_start();

    if (array_key_exists("ID", $_SESSION))
    {        
        $isValid=false;
        
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
			if(empty($_POST['fn']) || empty($_POST['ln']) || empty($_POST['addy']) ||empty($_POST['mobile']) ||  empty($_POST['mail']))
			{
				$isValid=true;
				$msg="Please Fill in All requried Field";	
			}
			else if(! is_numeric($_POST['mobile']))
			{
				$isValid=true;
				$msg="Invalid Mobile No";	
			}
			else if($_POST['day']=='Day' || $_POST['gender']=='Sex' || $_POST['month']=='Month' || $_POST['year']=='Year')
			{
				$isValid=true;
				$msg="Please Fill in All Fields Correctly";	
			}
			else
			{
				$isValid=true;
				$dob=$_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
				$db->registerDoc($_POST['fn'],$_POST['ln'],$_POST['ons'],$_POST['gender'],$_POST['addy'],$_POST['mobile'],
								$_POST['mail'],$dob,$_SESSION['ID']);
								$db->registerDoc2($_POST['desc'],$_SESSION['ID']);
																
				session_start();        
				$_SESSION["User"]=$_POST['fn'].' '.$_POST['ln'];    
				$_SESSION['ROLE']='DOCTOR';    
				$_SESSION['ID']=$_SESSION['ID'];
				header('Location: DoctorHome.php' ); 
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
<title>CARE GROUP | Registration</title>
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
<div class="right_header">
        	
        <div class="top_menu"></div>
   	  </div>
    
    </div>
    <div class="pattern_bg1">
   <marquee> <h1><font size="+6">CARE GROUP, MEDICAL SERVICE AT YOUR FINGER TIP</font></h1></p></marquee>
    	
        </div>
  <div id="main_content">
    <div align="center"><font size="+1">PLEASE ENTER YOUR PERSONAL INFORMATION</font></div>
		  <div class="box_content">
				  <div class="box_title">
                    	<div class="title_icon"></div>
                        <h2><span class="dark_blue">Sign Up</span></h2>
                         </div>
                    
                    <div class="box_text_content">
                    <?php
                    	if($isValid)
						echo $msg;
					?>
                    </div>

                    <div class="box_text_content">
                    <form method="post" action="RegisterDoctor.php">
                        <ol>                       	  
                            <li>
                            	<label for="fn">First Name</label> 
                            	<input type="text" name="fn" id="fn" autofocus  size="25" Value="<?php echo $_POST['fn']; ?>">
                            </li>  
                            <li>
                            	<label for="ln"> Last Name</label>
                                <input type="text" name="ln" id="ln" size="25"  Value="<?php echo $_POST['ln']; ?>">
                            </li> 
                            <li>
                            	<label for="ons"> Other Name(s)</label> 
                            	<input type="text" name="ons" id="ons" size="25" Value="<?php echo $_POST['ons']; ?>">
                            </li>
                             <li>
                            	<label for="gender"> Gender<br>
                           	   </label>                             
                            	<select name="gender" id="gender">
                            	  <option value="Sex">Sex</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </li>
                            <li>
                            	<label for="dob"> Date Of Birth: <br>
                           	   </label>                             
                            	<select name="day" id="day">
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
                                  <option value="1960">1960</option>
                                      <option value="1961">1961</option>
                                  <option value="1962">1962</option>
                                  <option value="1963">1963</option>
                                      <option value="1964">1964</option>
                                      <option value="1965">1965</option>
                                      <option value="1966">1966</option>
                                      <option value="1967">1967</option>
                                      <option value="1968">1968</option>
                                      <option value="1969">1969</option>
                                      <option value="1970">1970</option>
                                      <option value="1971">1971</option>
                                      <option value="1972">1972</option>
                                      <option value="1973">1973</option>
                                      <option value="1974">1974</option>
                                      <option value="1975">1975</option>
                                      <option value="1976">1976</option>
                                      <option value="1977">1977</option>
                                      <option value="1978">1978</option>
                                      <option value="1979">1979</option>
                                      <option value="1980">1980</option>
                                      <option value="1981">1981</option>
                                      <option value="1982">1982</option>
                                      <option value="1983">1983</option>
                                      <option value="1984">1984</option>                                     
                                      <option value="1985">1985</option>
                                      <option value="1986">1986</option>
                                      <option value="1987">1987</option>
                                      <option value="1988">1988</option>
                                      <option value="1989">1989</option>
                                      <option value="1900" >1990</option>
                                      <option value="1991">1991</option>
                                      <option value="1992">1992</option>
                                      <option value="1993">1993</option>
                                      <option value="1994">1994</option>
                                      <option value="1995">1995</option>
                                      <option value="1996">1996</option>
                                      <option value="1997">1997</option>
                                      <option value="1998">1998</option>
                                      <option value="1999">1999</option>
                                      <option value="2000">2000</option>
                                      <option value="2001">2001</option>
                                      <option value="2002">2002</option>
                                      <option value="2003">2003</option>
                                      <option value="2004">2004</option>
                                      <option value="2005">2005</option>
                                      <option value="2006">2006</option>
                                      <option value="2007">2007</option>
                                      <option value="2008">2008</option>
                                      <option value="2009">2009</option>
                                      <option value="2010">2010</option>
                                      <option value="2011">2011</option>
                                      <option value="2012">2012</option>
                                      <option value="2013">2013</option>
                                      <option value="2014">2014</option>
                                      <option value="2015">2015</option>
                                      <option value="2016">2016</option>
                                      <option value="2017">2017</option>
                                      <option value="2018">2018</option>
                                      <option value="2019">2019</option>
                                      <option value="2020">2020</option>                                   
                              </select>
                            </li>
                            <li>
                            	<label for="addy"> Address <br>
                            	</label> 
                            	<textarea name="addy" id="addy" cols="25" rows="5"><?php echo $_POST['addy']; ?></textarea>
                            </li>
                            <li>
                            	<label for="mobile"> Mobile No:</label> 
                            	<input type="text" name="mobile" id="mobile" size="25" Value="<?php echo $_POST['mobile']; ?>">
                            </li>
                            <li>
                            	<label for="mobile"> Email Address:</label> 
                            	<input type="text" name="mail" id="mail" size="25" Value="<?php echo $_POST['mail']; ?>">
                            </li>
                            <li>
                            	<label for="desc">Brief Description:</label> 
                            	<textarea name="desc" id="desc" cols="25" rows="5" placeholder="Brief Medical History"><?php echo $_POST['addy']; ?></textarea>
                            </li>
                            <li>
                            	<input type="submit" value="Submit">
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
