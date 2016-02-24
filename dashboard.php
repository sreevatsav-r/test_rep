<?php
/*
 * dashboard.php
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
   <style>
.container{
 margin: 1cm 1cm 1cm 1cm;

}

#btn-sty{

height:100px;
width:200px;
border-radius: 12px;
}

</style>
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
               
				   <div class="container">
					   
					   
							<?php
								$con=mysql_connect('localhost','root','') or die(mysql_error());
								mysql_select_db('hotel') or die("cannot select DB");
								
								
									$query1 = mysql_query("SELECT count(`id`) from users");									
									$reg_hotel = mysql_fetch_row($query1);
									$query2 = mysql_query("SELECT count(`id`) FROM `users` WHERE `sub_status` = 'active'");									
									$sub_hotel = mysql_fetch_row($query2);
									$query3 = mysql_query("SELECT count(`id`) FROM `users` WHERE `act_status` = 'active'");									
									$act_hotel = mysql_fetch_row($query3);
									$query4 = mysql_query("SELECT count(id) from users where DATEDIFF(`tilldate`,CURDATE()) <= 365");									
									$exp_hotel = mysql_fetch_row($query4);
									$query5 = mysql_query("SELECT count(`id`) FROM `users` WHERE `sub_status` = 'deactive'");									
									$sub_hotel_exp = mysql_fetch_row($query5);
									$query6 = mysql_query("SELECT count(`id`) FROM `users` WHERE `act_status` = 'deactive'");									
									$act_hotel_exp = mysql_fetch_row($query6);
									
									
												
			
							?>
					    <button type="button" id="btn-sty" class="btn btn-primary" onclick="window.location.href='../alttlabs/viewhotel.php'">Registered <br>Hotels <br><span class="badge" style="font-size: 40px;" ><?php echo $reg_hotel[0]; ?></span></button>&nbsp &nbsp &nbsp &nbsp
						<button type="button" id="btn-sty" class="btn btn-success" onclick="window.location.href='../alttlabs/viewhotel.php'">Subscribed <br>Hotels  <br><span class="badge" style="font-size: 40px;"><?php echo $sub_hotel[0]; ?></span></button>&nbsp &nbsp &nbsp &nbsp
						<button type="button" id="btn-sty" class="btn btn-primary" onclick="window.location.href='../alttlabs/viewhotel.php'">Active <br>Hotels <br><span class="badge" style="font-size: 40px;"> <?php echo $act_hotel[0]; ?> </span></button>  </br> 
						</br></br>
						<button type="button" id="btn-sty" class="btn btn-primary" onclick="window.location.href='../alttlabs/hotel_exp.php'">About to Exp <br>Hotels <br><span class="badge" style="font-size: 40px;"><?php echo $exp_hotel[0]; ?></span></button>&nbsp &nbsp &nbsp &nbsp
						<button type="button" id="btn-sty" class="btn btn-success" onclick="window.location.href='../alttlabs/modifyhotel.php'">Awaiting <br>Subscription <br><span class="badge" style="font-size: 40px;"><?php echo $sub_hotel_exp[0]; ?></span></button> &nbsp &nbsp &nbsp &nbsp   
						<button type="button" id="btn-sty" class="btn btn-primary" onclick="window.location.href='../alttlabs/modifyhotel.php'">Deactivated <br>Hotels <br><span class="badge" style="font-size: 40px;"><?php echo $act_hotel_exp[0]; ?></span></button>   
					   
					   
					   
					   
					
				 
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
