<?php
    class DataManager 
    {    
        var $user = "Admin";
        var $pass = "P@SSW)RD";
        var $dbName = "care_group_db";
        var $dbHost = "localhost";
        var $con;

        function DataManager()
        {
            $this->con = mysql_connect($this->dbHost, $this->user, $this->pass)
            or die ("Could not connect to db: " . mysql_error());
            mysql_select_db($this->dbName, $this->con)
            or die ("Could not select db: " . mysql_error());
		}
        
        function authenticateUser($username,$password)
        {
            return mysql_query("SELECT * FROM paitent_table where PaitentID='".$username."' and Password='".$password."' ");
        }
        function authenticateDoctor($username,$password)
        {
            return mysql_query("select * from  doctors_table where DocID='".$username."' and password='".$password."' ");
        }
        function authenticateAdmin($username,$password)
        {
            return mysql_query("select * from admin_login where Admin='".$username."' and password='".$password."' ");
        }
        function sign_up($paitentid,$password)
        {
			mysql_query("INSERT INTO paitent_table (PaitentID,Password)
						VALUES('".$paitentid."','".$password."')") or
				die(mysql_error());//("Error Processing Page. Please contact the Administrator");
		}
        function validateUser($pid)
        {
            return mysql_query("select * from paitent_table where PaitentID='".$pid."'");
        }  
		function registerUser($fn,$ln,$ons,$gender,$addy,$mobile,$email,$dob,$pd)
		{
			mysql_query("INSERT INTO users_table (First_Name,Last_Name,Other_Names,Gender,Address,Mobile_No,EmailAddy,DOB,PaitentID,User_Type)
						VALUES('".$fn."','".$ln."','".$ons."','".$gender."','".$addy."','".$mobile."','".$email."','".$dob."','".$pd."','USER')")
						or die("Error Processing Page. Please contact the Administrator");
		}   
		function registerDoc($fn,$ln,$ons,$gender,$addy,$mobile,$email,$dob,$did)
		{
			mysql_query("INSERT INTO users_table (First_Name,Last_Name,Other_Names,Gender,Address,Mobile_No,EmailAddy,DOB,DocID,User_Type)
						VALUES('".$fn."','".$ln."','".$ons."','".$gender."','".$addy."','".$mobile."','".$email."','".$dob."','".$did."','DOCTOR')")
						or die(mysql_error());//"Error Processing Page. Please contact the Administrator");
		} 
		function registerDoc2($desc,$did)
		{
			mysql_query("UPDATE doctors_table SET Description='".$desc."' where DocID='".$did."'");	
		} 
		function getUserDetails($pid)
		{
				return mysql_query("SELECT First_Name,Last_Name FROM users_table u where PaitentID='".$pid."' ");
		}  
		function getDocDetails($did)
		{
				return mysql_query("SELECT First_Name,Last_Name FROM users_table u where DocID='".$did."' ");
		} 
		function addcity($locationID,$locationName,$Country)
		{
			mysql_query("INSERT INTO location_table (Location_ID,Location_Name,Country)
						VALUES('".$locationID."','".$locationName."','".$Country."')")
						or die("Error Processing Page. Please contact the Administrator");	
		}   
		function addSpec($specID,$desc)
		{
			mysql_query("INSERT INTO doc_types (spec_id,Description) 
						VALUES ('".$specID."','".$desc."')")
						or die("Error Processing Page. Please contact the Administrator");	
		}  
		function getLocations()
		{
			return mysql_query("SELECT * FROM location_table ORDER BY Country");			
		}
		function getSpecs()
		{
			return mysql_query("SELECT * FROM doc_types ORDER BY spec_id");	
		}
		function addAdoctor($docid,$location,$spec)
		{
			mysql_query("INSERT INTO doctors_table (DocID,Location_ID,Spec_ID,PASSWORD)
						VALUES('".$docid."','".$location."','".$spec."','PASSWORD')")
						or die("Error Processing Page. Please contact the Administrator");		
		}
		function getDoctors()
		{
			return mysql_query("SELECT * FROM users_table where User_Type = 'DOCTOR' ");	
		}
		function getLocationByID($id)
		{
				mysql_query("SELECT * FROM location_table where location_id='".$id."'");
		}		
		function getPaitents()
		{
			return mysql_query("SELECT * FROM users_table where User_Type = 'USER' ");	
		}	
		function getPaitentsByID($pid)
		{
			return mysql_query("SELECT * FROM care_group_db.paitent_table p,care_group_db.users_table u where (p.paitentid='".$pid."'&& u.paitentid='".$pid."')");	
		}	
		function getAge($pid)
		{
			return mysql_query("SELECT dob,EXTRACT(YEAR FROM CURDATE())-EXTRACT(YEAR FROM dob) AS AGE FROM care_group_db.users_table where PaitentID='".$pid."'");	
		}
		function getDoc($id)
		{
			return mysql_query("SELECT * FROM users_table where DocID='".$id."'");	
		}
		function getDocDetail($id)
		{
			return mysql_query("SELECT * FROM doctors_table where DocID='".$id."'");
		}
		function editDoc($fn,$ons,$ln,$id)
		{
			mysql_query("UPDATE users_table SET First_Name='".$fn."', Other_Names='".$ons."', Last_Name='".$ln."' WHERE DocID='".$id."' ")
			or die("Error Processing Page. Please contact the Administrator");		
		}
		function editDoc2($desc,$id)
		{
			mysql_query("UPDATE doctors_table SET Description='".$desc."' WHERE DocID='".$id."'")
			or die("Error Processing Page. Please contact the Administrator");	
		}
		function userPassword($user,$op,$np)
		{
			return mysql_query("UPDATE paitent_table SET Password='".$np."' WHERE (PaitentID='".$user."' && Password='".$op."')")
			or die("Error Processing Page. Please contact the Administrator");		
		}
		function doctorPassword($did,$op,$np)
		{
			mysql_query("UPDATE doctors_table SET Password='".$np."' WHERE (DocID='".$did."' && Password='".$op."')");	
		}
		function adminPassword($op,$np)
		{
			mysql_query("UPDATE admin_login set Password='".$np."' WHERE Password='".$op."'");
		}
		function updateAppointment($did,$title,$aDate,$description)
		{
			mysql_query("INSERT INTO doc_schedule (DocID,Title,DateAP,Description)
						VALUES('".$did."','".$title."','".$aDate."','".$description."')")
						or die("Error Processing Page. Please contact the Administrator");	
		}
		function getDocApp1($did)
		{
			return mysql_query("SELECT * FROM doc_schedule WHERE DocID='".$did."'");	
		}
		function getDocApp2($did)
		{
			return mysql_query("SELECT * FROM appointments WHERE DocID='".$did."'");	
		}
		function getPatApp($pid)
		{
			return mysql_query("SELECT * FROM care_group_db.users_table u,care_group_db.appointments a 
									where a.paitentid='".$pid."' and a.docid=u.docid");
		}		
		function confirmDate1($did,$val)
		{			
			return mysql_query("SELECT * FROM doc_schedule WHERE DocID='".$did."' && DateAP='".$val."'");
		}
		function confirmDate2($did,$val)
		{			
			return mysql_query("SELECT * FROM appointments WHERE DocID='".$did."' && aDate='".$val."'");
		}		
		function getDocPats($did)
		{
			return mysql_query("SELECT PaitentID FROM appointments  where DocID='".$did."'");	
		}
		function searchByLoc($val)
		{
			return mysql_query("SELECT * FROM care_group_db.doctors_table d,care_group_db.users_table u,care_group_db.location_table l 
								where ((d.DocID=u.DocID && d.location_ID=l.Location_id) && l.location_ID='".$val."')");	
		}
		function searchBySpec($val)
		{
			return mysql_query("SELECT * FROM care_group_db.doctors_table d,care_group_db.users_table u,care_group_db.location_table l 
								where ((d.DocID=u.DocID && d.location_ID=l.Location_id) && d.spec_id='".$val."')");	
		}
		function bookApp($pid,$did,$title,$apDate,$desc)
		{
			mysql_query("INSERT INTO appointments (PaitentID,Docid,aDate,Description,Title)
						VALUES('".$pid."','".$did."','".$apDate."','".$desc."','".$title."')")
						or die("Error Processing Page. Please contact the Administrator");
		}
		function updateUser($fn,$ln,$ons,$em,$cn,$pid)
		{
			mysql_query("UPDATE users_table SET First_Name='".$fn."',Last_Name='".$ln."',Other_Names='".$ons."',Mobile_No='".$cn."',EmailAddy='".$em."'
						WHERE PaitentID='".$pid."'")
						or die("Error Processing Page. Please contact the Administrator");
		}
		function updateUser2($bg,$gn,$ht,$wt,$all,$pid)
		{
			mysql_query("UPDATE paitent_table SET bloodgroup='".$bg."', genotype='".$gn."',height='".$ht."',weight='".$wt."',allergies='".$all."'
						WHERE PaitentID='".$pid."'")
						or die("Error Processing Page. Please contact the Administrator");
		}
		function getDetials($pid)
		{
			return mysql_query("SELECT * FROM care_group_db.paitent_table p,care_group_db.users_table u where u.PaitentID='".$pid."'");	
		}
		function insertContent($name,$headline,$text,$author)
		{
			mysql_query("INSERT INTO Content (Name,Headline,Content_Text,Author)
						VALUES('".$name."','".$headline."','".$text."','".$author."')")
						or die("Error Processing Page. Please contact the Administrator");	
		}
		function getContents()
		{
			return mysql_query("SELECT * FROM Content");	
		}
		function getItem($id)
		{
			return mysql_query("SELECT * FROM Content WHERE id='".$id."'");
		}
	}
?>
