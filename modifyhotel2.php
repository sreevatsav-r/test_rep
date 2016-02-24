<?php
/*
 * modifyhotel2.php
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
      	if(isset($_SESSION['admin']))
	{
    require_once('navigation.php');
    $hid = $_GET['hid'];
    	if(isset($_POST['update']))
		{
				
				
				$displayname= $_POST['displayname'];
				$managername= $_POST['managername'];
				$phone= $_POST['phone'];  
				
				$address= $_POST['address'];  
				$location= $_POST['location']; 
				$num_tab= $_POST['num_tab'];
				$amount= $_POST['amount'];
				$act_status= $_POST['act_status'];  
				$sub_status= $_POST['sub_status']; 
				$reg_status= $_POST['reg_status'];
				
				
				
					$sql = "UPDATE users SET  displayname = '$displayname', managername = '$managername', phone = '$phone', address = '$address',location = '$location', num_tab = '$num_tab', amount = '$amount', act_status = '$act_status', sub_status = '$sub_status', reg_status = '$reg_status' WHERE hid = '$hid'";
						$query = $pdo->prepare($sql);	
						$query->execute();
						if($query)
						{
							
					echo "<script> alert('Hotel Details updated successfully !');</script>";
				}
				
		}

?>

	

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ALT T Admin</title>
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
                     <h2 class="text-center">Modify Hotel</h2>
                            
                              
                 
            <table class="table table-bordered">
				
			
			  
			  <?php
			  $mysqli = NEW MySQLi("localhost","root","","hotel");
			  $resultSet = $mysqli ->query("SELECT * FROM users where hid= '$hid' ");
	if($resultSet->num_rows >0){
		
		while($rows = $resultSet->fetch_assoc())
		{
			$hid= $rows['hid'];
			$hotelname = $rows['hotelname'];
			$displayname = $rows['displayname'];
			$email = $rows['email'];
			$phone = $rows['phone'];
			$managername = $rows['managername'];
			$address = $rows['address'];
			$location = $rows['location'];
			$num_tab = $rows['num_tab'];
			$amount = $rows ['amount'];			
			$act_status = $rows['act_status'];
			$sub_status = $rows['sub_status'];
			$reg_status = $rows['reg_status'];
			
			?>
			<form method="post" action="" class="form-horizontal" role="form"  >
						<input type="hidden" class="form-control" name="hid" value="<?php echo $hid ?>" />
							<div class="form-group">
								 <label for="inputEmail3" class="col-sm-3 control-label">Hotel Name</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="hotelname" value="<?php echo $hotelname ?>" disabled/>
								</div>
							</div>
							<div class="form-group">
								 <label for="inputEmail3" class="col-sm-3 control-label">Display Name <b style="color:red;">*</b></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="displayname" PlaceHolder="Display Name" value="<?php echo $displayname?>" required/>
								</div>
							</div>
							<div class="form-group">
								 <label for="inputEmail3" class="col-sm-3 control-label">Manager Name<b style="color:red;">*</b></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="managername"  value="<?php echo $managername ?>" required/>
								</div>
							</div>
							<div class="form-group">
								 <label for="inputEmail3" class="col-sm-3 control-label">Email<b style="color:red;">*</b></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="email"  value="<?php echo $email ?>"  disabled />
								</div>
							</div>
							<div class="form-group">
								 <label for="inputEmail3" class="col-sm-3 control-label">Phone</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="phone" value="<?php echo $phone?>" />
								</div>
							</div>
							<div class="form-group">
								 <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="address" value="<?php echo $address ?>" />
								</div>
							</div>
							<div class="form-group">
								 <label for="inputEmail3" class="col-sm-3 control-label">Location<b style="color:red;">*</b></label>
								<div class="col-sm-9">
									<select class="form-control" name="location" required>
						<?php		if(empty($location))
									{
						?>				<option value="" selected><< Select Location >></option>	
						<?php		}
								else{	
						?>				<option value="<?php echo $location?>" selected><?php echo $location ?></option>
						<?php 		}	?>
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
									</select>
								</div>
							</div>
							<div class="form-group">
								 <label for="inputEmail3" class="col-sm-3 control-label">Number Of Tabs<b style="color:red;">*</b></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="num_tab" value="<?php echo $num_tab ?>" required/>
								</div>
							</div>
							<div class="form-group">
								 <label for="inputEmail3" class="col-sm-3 control-label">Amount Paid</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="amount" value="<?php echo $amount?>" required/>
								</div>
							</div>
							<div class="form-group">
								 <label for="inputEmail3" class="col-sm-3 control-label">Registration Status</label>
								<div class="col-sm-9">
										<select class="form-control" name="reg_status" required>
						<?php		if(empty($reg_status))
									{
						?>				<option value="" selected><< Make Active >></option>	
						<?php		}
								else{	
						?>				<option value="<?php echo $reg_status?>" selected><?php echo $reg_status ?></option>
						<?php 		}	?>
										<option value="deactive">deactive</option>
										<option value="active">Active</option>
										
									</select>
								</div>
							</div>
							<div class="form-group">
								 <label for="inputEmail3" class="col-sm-3 control-label">Subscription Status</label>
								<div class="col-sm-9">
									<select class="form-control" name="sub_status" required>
						<?php		if(empty($sub_status))
									{
						?>				<option value="" selected><< Make Active >></option>	
						<?php		}
								else{	
						?>				<option value="<?php echo $sub_status?>" selected><?php echo $sub_status ?></option>
						<?php 		}	?>
										<option value="deactive">deactive</option>
										<option value="active">Active</option>
										
									</select>
								</div>
							</div>
							<div class="form-group">
								 <label for="inputEmail3" class="col-sm-3 control-label">Activation Status</label>
								<div class="col-sm-9">
										<select class="form-control" name="act_status" required>
						<?php		if(empty($act_status))
									{
						?>				<option value="" selected><< Make Active >></option>	
						<?php		}
								else{	
						?>				<option value="<?php echo $act_status?>" selected><?php echo $act_status ?></option>
						<?php 		}	?>
										<option value="deactive">deactive</option>
										<option value="active">Active</option>
										
									</select>
								</div>
							</div>
							
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									 <button type="submit" class="btn" name="update" value ="update" >Update Hotel</button>
								</div>
							</div>
						</form>	
			
			
			
			<?php
		}
		?></table> <?php
		
	}
	?>
			  
			  
			  
			    </div>
                </div> 
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
    
   
</body>
</html>
<?php
	}
	else
	{
		header('Location: index.php');
	}
?>
