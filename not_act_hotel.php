<!--
   not_act_hotel.php
   
   Copyright 2016 Raja Sekhar P <Raja Sekhar P@RAJASEKHAR-PC>
   
   This program is free software; you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation; either version 2 of the License, or
   (at your option) any later version.
   
   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.
   
   You should have received a copy of the GNU General Public License
   along with this program; if not, write to the Free Software
   Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
   MA 02110-1301, USA.
   
   
-->


<?php
   session_start();
   include_once('../includes/connection.php');
   include_once('../includes/functions.php');
  	if(isset($_SESSION['admin']))
	{
?>
<?php
    require_once('navigation.php');
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
   
   
   <script src="../ckeditor/ckeditor.js"></script>
   
</head>
<body>
    <div id="wrapper">
       
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                   
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                  <h1 style="color: red" align="center"> Hotels  Details : Not Actvited</h1>
				<table class="table table-bordered search-table">
				<thead>
					<tr>
						<th>
							Sl No.
						</th>
						<th>
							Hotel Name
						</th>
						<th>
							Display Name
						</th>
						<th width="">
							Manager
						</th>
						<th>
							email
						</th>
						<th>
							Phone
						</th>
						<th>
							validity
						</th>
						
						<th>
							No.TABs
						</th>
						<th>
							Amount
						</th>
						<th>
							Reg_Status
						</th>
						<th>
							Sub_Status
						</th>
						<th>
							Act_Status
						</th>
					</tr>
				</thead>
				<tbody>
					<?php 
							$today = date("y-m-d");
							$user = new Functions;
							$users = $user->fetch_all_hotel_not_act();
							foreach($users as $user)
							{
								$fromdate = $user['fromdate'];
								$tilldate = $user['tilldate'];
								$date1 = new DateTime($tilldate);
								$date2 = new DateTime($today);
								$diff = $date2->diff($date1)->format("%r%a");
						?>
					<tr>
						<td>
							<?php echo $user['id'];?>
						</td>
						<td>
							<?php echo $user['hotelname'];?>
						</td>
						<td>
							<?php echo $user['displayname'];?>
						</td>
						<td>
							<?php echo $user['managername'];?>
						</td>
						<td>
							<?php echo $user['email'];?>
						</td>
						<td>
							<?php echo $user['phone'];?>
						</td>
						<td>
							<?php echo $diff;?>
						</td>
						<td>
							<?php echo $user['num_tab'];?>
						</td>
						<td>
							<?php echo $user['amount'];?>
						</td>
						<td>
							<?php echo $user['reg_status'];?>
						</td>
						<td>
							<?php echo $user['sub_status'];?>
						</td>
						<td>
							<?php echo $user['act_status'];?>
						</td>
						
					</tr>
					<?php }?>
				</tbody>
			
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="html-table-search.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('table.search-table').tableSearch({
					searchText:'Search Table',
					searchPlaceHolder:'Input Value'
				});
			});
		</script>
    
   
</body>
</html>
<?php
	}
	else
	{
		header('Location: index.php');
	}
?>
