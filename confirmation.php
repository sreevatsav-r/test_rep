<?php
/*
 * confirmation.php
 * 
 * Copyright 2016 Raja Sekhar P <Raja Sekhar P@RAJASEKHAR-PC>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * 
 * 
 */

?>

<?php
include('config.php');


// Passkey that got from link 
$passkey=$_GET['passkey'];


// Retrieve data from table where row that match this passkey 
$sql1="SELECT * FROM temp_users WHERE confirm_code ='$passkey' and email_status = 'no' ";
$result1=mysql_query($sql1);

// If successfully queried 
if($result1){

// Count how many row has this passkey
$count=mysql_num_rows($result1);

// if found this passkey in our database, retrieve data from table "temp_members_db"
if($count==1){

$rows=mysql_fetch_array($result1);
				$hid= $rows['hid'];
				$hotelname= $rows['hotelname'];
				$displayname= $rows['displayname'];
				$managername= $rows['managername'];
				$phone= $rows['phone'];  
				$email= $rows['email'];  
				$address= $rows['address'];  
				$location= $rows['location']; 
				$num_tab= $rows['num_tab'];
				$amount= $rows['amount'];
				$password= $rows['password'];			 
				$reg_status= "active";
				$fromdate= $rows['fromdate'];
				$tilldate= $rows['tilldate'];


// Insert data that retrieves from "temp_members_db" into table "registered_members" 
$sql2="INSERT INTO users(hid,hotelname,displayname,managername,phone,email,address,location,num_tab,amount,password,reg_status,fromdate,tilldate)VALUES('$hid','$hotelname', '$displayname', '$managername','$phone', '$email', '$address', '$location','$num_tab', '$amount', '$password', '$reg_status', '$fromdate', '$tilldate')";
$result2= mysql_query($sql2);
if($result2){

echo '<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<h1 style="text-align: center;">Congratulations Your Email <a href=""></a>&nbsp;is verified sucssfully.</h1>
<h1 style="text-align: center;"><a href="">Click here to Login</a></h1>';

$status= "yes";

// update information of this user from table "temp_users" that has this passkey 
$sql3="UPDATE temp_users SET email_status = '$status' WHERE confirm_code = '$passkey'";
$result3=mysql_query($sql3);

}
}

// if not found passkey, display message "Wrong Confirmation code" 
else {
echo '<h1 style="text-align: center;">&nbsp;</h1>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<h1 style="text-align: center;"><span style="color: red"><strong>This email  already verified ......</strong></span></h1>';
}

// if successfully moved data from table"temp_users" to table "users" displays message "Your account has been activated" and don't forget to delete confirmation code from table "temp_members_db"


}
?>
