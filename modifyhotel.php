<?php
/*
 * modifyhotel.php
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
                            
                              
                 
         
                     <table class="table table-bordered search-table ">
						 <thead>
				
			<tr><th>Hotel Name</th><th> Manager</th><th> Validaty</th><th> Registration</th><th> Subscription</th><th> Activation</th></tr>
						</thead>
			  <?php
			  $today = date("y-m-d");

			  $mysqli = NEW MySQLi("localhost","root","","hotel");
			  $resultSet = $mysqli ->query("SELECT * FROM users ORDER BY `users`.`tilldate` ASC; ");
	if($resultSet->num_rows >0){
		
		while($rows = $resultSet->fetch_assoc())
		{
			$hotelname = $rows['hotelname'];
			$displayname = $rows['displayname'];
			$email = $rows['email'];
			$phone = $rows['phone'];
			$managername = $rows['managername'];
			$fromdate = $rows['fromdate'];
			$tilldate = $rows['tilldate'];
			$sub_status = $rows['sub_status'];
			$act_status = $rows['act_status'];
			$reg_status = $rows['reg_status'];
			$hid = $rows['hid'];
			$date1 = new DateTime($tilldate);
			$date2 = new DateTime($today);
			$diff = $date2->diff($date1)->format("%r%a");

		
			?><tbody>
			<tr>
			
			<td> <?php echo $hotelname; ?></td>
				<td> <?php echo $managername; ?></td>
			
			<td> <?php echo $diff; ?></td>
			<td> <?php echo $reg_status; ?></td>
			<td> <?php echo $sub_status; ?></td>
			<td> <?php echo $act_status; ?></td>
			 <td > <a href="modifyhotel2.php?hid=<?php echo $rows['hid']; ?> " class="btn btn-primary btn-mini"> Modify</a> 
				
			</td>
			
			</tr>		
			
			</tbody>
			
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
