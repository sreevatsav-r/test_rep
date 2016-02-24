<?php
/*
 * addhotel.php
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
   session_start();
   include_once('../includes/connection.php');
   include_once('../includes/functions.php');
   require_once('navigation.php');
   
      	if(isset($_SESSION['admin']))
	{
?>

<?php 
	if(isset($_POST['hotelname'],$_POST['displayname'],$_POST['managername'],$_POST['phone'],$_POST['email'],$_POST['address'],$_POST['location'],$_POST['num_tab'],$_POST['amount']))
	{
	   $hotelname= $_POST['hotelname'];
	   $displayname= $_POST['displayname'];
	   $managername= $_POST['managername'];
	   $phone= $_POST['phone'];  
	   $email= $_POST['email'];  
	   $address= $_POST['address'];  
	   $location= $_POST['location']; 
	   $num_tab= $_POST['num_tab'];
	   $amount= $_POST['amount'];
	   $fromdate= $_POST['fromdate'];
	   $tilldate= $_POST['tilldate']; 
	   $con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('hotel') or die("cannot select DB");
	   $count=mysql_query("SELECT id FROM temp_users WHERE email = '$email'")or die(mysql_error());
			
			if(mysql_num_rows($count) < 1)
			{
					$hid = new Functions;
					$hids = $hid->fetch_hids();
					if(!isset($hids['0']))
					{	
						$h_no = 1;
					}
					else
					{	
						$hid = new Functions;
						$hids = $hid->fetch_hids();
						$array = $hids['hid'];
						if($array[2] != 0)
						{
							$h_no = $array[2] . $array[3] . $array[4] . $array[5] . $array[6] . $array[7];
						}
						else if($array[3] != 0)
						{
							$h_no = $array[3] . $array[4] . $array[5] . $array[6] . $array[7];
						}
						else if($array[4] != 0)
						{
							$h_no = $array[4] . $array[5] . $array[6] . $array[7];
						}
						else if($array[5] != 0)
						{
							$h_no = $array[5] . $array[6] . $array[7];
						}
						else if($array[6] != 0)
						{
							$h_no = $array[6] . $array[7];
						}
						else if($array[7] != 0)
						{
							$h_no = $array[7];
						}
						$h_no = $h_no + 1;
					}
				
					$tot = strlen($h_no);
					
					switch($tot)
					{
						case 1 :
								$zeros = "00000";
									break;
						case 2 :
								$zeros = "0000";
									break;
						case 3 :
								$zeros = "000";
									break;
						case 4 :
								$zeros = "00";
									break;
						case 5 :
								$zeros = "0";
					}					
					$hid = "HH" . $zeros . $h_no; 
					
					$randstr = ""; 
					  for($i=0; $i<8; $i++){ 
						 $randnum = mt_rand(0,61); 
						 if($randnum < 10){ 
							$randstr .= chr($randnum+48); 
						 }else if($randnum < 36){ 
							$randstr .= chr($randnum+55); 
						 }else{ 
							$randstr .= chr($randnum+61); 
						 } 
					  } 
					$password = $randstr;
                   $confirm_code=md5(uniqid(rand()));
	   
	   $query= $pdo ->prepare('INSERT INTO temp_users (hotelname,displayname,managername,phone,email,address,location,num_tab,amount,hid,password,confirm_code,fromdate,tilldate) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
	   $query->bindValue(1, $hotelname); 
	   $query->bindValue(2, $displayname); 
	   $query->bindValue(3, $managername); 
	   $query->bindValue(4, $phone);
	   $query->bindValue(5, $email); 
	   $query->bindValue(6, $address); 
	   $query->bindValue(7, $location);
	   $query->bindValue(8, $num_tab);
	   $query->bindValue(9, $amount);
	   $query->bindValue(10, $hid);
	   $query->bindValue(11, $password);
	   $query->bindValue(12, $confirm_code);
	    $query->bindValue(13, $fromdate);
	   $query->bindValue(14, $tilldate);
	   $query->execute();
	   $num = $query->rowCount();
   	  				include 'smtp/Send_Mail.php';
				require_once('smtp/class.smtp.php');
				$to=$email;
				$subject="Alt T Labs Email verification";
				$body='<html>
	<head>
		<title></title>
	</head>
	<body>
		<h1 class="header1" style="text-align: center;">
			Welcome to ALT T LABS</h1>
		<hr />
		<p>
			&nbsp;</p>
		<p>
			&nbsp;<span style="font-size: 1.17em;">&nbsp; &nbsp; &nbsp; &nbsp;Hai! </span><font color="#ff0000"><b><u>' . $managername . '</u></b></font><span style="font-size: 1.17em;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p>
		<p>
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Thank you for choosing for ALT T Labs Software, Here is your Subscription Details.</p>
		<h2>
			<span style="font-size:14px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Hotel Name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <span style="color:#ff8c00;">' . $hotelname . '</span></span></h2>
		<h2>
			<span style="font-size: 14px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;E-mail &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : ' . $email . '</span></h2>
		<h2>
			<span style="font-size:14px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Number Of Tabs &nbsp; &nbsp; &nbsp; &nbsp; : ' . $num_tab . '</span></h2>
		<h2>
			<span style="font-size:14px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Total Amount &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : ' . $amount . '</span></h2>
		<h2>
			<span style="font-size:14px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Subscription Duration &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : ' . $fromdate . ' to ' . $tilldate . '</span></h2>
		<p>
			<span style="font-size:14px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;U</span>ser Credentials<span style="font-size:14px;">&nbsp; &nbsp; &nbsp;User Name : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><span style="font-size: 14px;">' . $email . '</span></p>
		<p>
			<span style="font-size: 14px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Password &nbsp;</span><span style="font-size: 14px;">&nbsp;: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;' . $password . '</span></p>
		<p>
			<span style="font-size: 14px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color:#0000ff;"><a href="http://192.168.100/raj/alt/confirmation.php?passkey='.$confirm_code.'  ">Click Here</a></span> to Verify Your email and Complete Email Verification.</span></p>
		<p>
			Activation Procedure followed by&nbsp;</p>
		<p>
			<span style="text-decoration: line-through;">Registration</span> &nbsp;----&gt; &nbsp; <span style="text-decoration: underline;">Email verification*</span> &nbsp;-----&gt; Subscription &nbsp; -----&gt; Activation&nbsp;</p>
		<p>
			*your Status</p>
		<hr />
		<p>
			Thanks and Regards Team <span style="color:#a52a2a;"><span style="text-decoration: underline;">ATL T LABS</span></span></p>
	</body>
</html>

';
		    Send_Mail($to,$subject,$body);
	}
	else
			{
				echo "<script> alert('The email is already taken, Hotel already Registered!');</script>";
			}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alt T ADMIN</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
       
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin ALT T</h2>   
                        <h5>Welcome Admin , You can add, edit and manage all the Hotel Details. </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row" id="staticParent">
				   <div class="col-md-6">
					<form method="post" action="">
						Hotel Name<br>
						<input type="text" class="form-control " name="hotelname" required><br>
						Display Name<br>
						<input type="text" class="form-control " name="displayname" required><br>
						Manager Name<br>
						<input type="text" class="form-control" name="managername" required><br>
						Email<br>
						<input type="email" class="form-control" name="email" required><br>
						Phone No<br>
						<input type="text" id="child" class="form-control" name="phone" required><br>
						Address<br>
						<input type="text" class="form-control" name="address" required ><br>
						
						Select State:<br>
						<select name="location"  class="form-control" required>
						<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
										<option value="Andhra Pradesh">Andhra Pradesh</option>
										<option value="Arunachal Pradesh">Arunachal Pradesh</option>
										<option value="Assam">Assam</option>
										<option value="Bihar">Bihar</option>
										<option value="Chandigarh">Chandigarh</option>
										<option value="Chhattisgarh">Chhattisgarh</option>
										<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
										<option value="Daman and Diu">Daman and Diu</option>
										<option value="Delhi">Delhi</option>
										<option value="Goa">Goa</option>
										<option value="Gujarat">Gujarat</option>
										<option value="Haryana">Haryana</option>
										<option value="Himachal Pradesh">Himachal Pradesh</option>
										<option value="Jammu and Kashmir">Jammu and Kashmir</option>
										<option value="Jharkhand">Jharkhand</option>
										<option value="Karnataka">Karnataka</option>
										<option value="Kerala">Kerala</option>
										<option value="Lakshadweep">Lakshadweep</option>
										<option value="Madhya Pradesh">Madhya Pradesh</option>
										<option value="Maharashtra">Maharashtra</option>
										<option value="Manipur">Manipur</option>
										<option value="Meghalaya">Meghalaya</option>
										<option value="Mizoram">Mizoram</option>
										<option value="Nagaland">Nagaland</option>
										<option value="Orissa">Orissa</option>
										<option value="Pondicherry">Pondicherry</option>
										<option value="Punjab">Punjab</option>
										<option value="Rajasthan">Rajasthan</option>
										<option value="Sikkim">Sikkim</option>
										<option value="Tamil Nadu">Tamil Nadu</option>
										<option value="Telangana">Telangana</option>
										<option value="Tripura">Tripura</option>
										<option value="Uttaranchal">Uttaranchal</option>
										<option value="Uttar Pradesh">Uttar Pradesh</option>
										<option value="West Bengal">West Bengal</option>
						</select><br><br>
						Tab No<br>
						<input type="text" id="child" class="form-control" name="num_tab"><br>
						Amount<br>
						<input type="text" id="child" class="form-control" name="amount"><br>
						
						Validity<br>
						<input type="date"  name="fromdate" size="10"> to <input type="date"  name="tilldate"><br><br>
						<br>
						<center><input type="submit"  class="btn btn-lg" name="submit" value="Add Hotel Details"/></center>
					</form>
				   </div>
			    </div>
                 <!-- /. ROW  -->
                       
            </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>$(function() {
  $('#staticParent').on('keydown', '#child', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})</script>
    
   
</body>
</html>
<?php
	}
	else
	{
		header('Location: index.php');
	}
?>
