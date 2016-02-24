<!--
   navigation.html
   
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

  <nav style="margin-top:0px;margin-bottom:0px;" class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0px;margin-top:-20px;">
            
			<div style=" font-size: 25px;color: #FFFFFF;padding: 10px 50px 5px 15px;float: left;">ALT T LABS</div>
             <form role="form" action="login.php" method="POST" enctype="multipart/form-data">
				<div style="color: white;margin: 15px 15px 5px 0px;float: right;font-size: 16px;"><?php echo "<i class='glyphicon glyphicon-user'></i>" . " " . $_SESSION['username']; ?>&nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust" >LogOut</a> </div>      
			</form>
		</nav>    <?php
    require 'timeout.php';
?>
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="logo.png" class="user-image img-responsive" style="background:#00BA8B"/>
					</li>
					<li>
                        <a  href="dashboard.php" ><i class="fa fa-dashboard "></i> Dashboard </a>
                    </li>
					
                    <li>
                        <a  href="addhotel.php"><i class="fa fa-dashboard "></i> Add Hotel </a>
                    </li>
                     <li>
                        <a  href="Modifyhotel.php"><i class="fa fa-desktop "></i> Modify Hotel</a>
                    </li>                              
                    
					<li>
                        <a  href="viewhotel.php"><i class="fa fa-list-alt "></i> View Hotel</a>
                        <ul class="nav nav-second-level">
							<li>
                                <a href="viewhotel.php">ALL Hotels</a>
                            </li>                            
                            <li>
                                <a href="not_reg_hotel.php">Not Registered</a>
                            </li>
							<li>
                                <a href="not_sub_hotel.php">Not Subscibed</a>
                            </li>
                            <li>
                                <a href="not_act_hotel.php">Not Activated</a>
                            </li>
                            <li>
                                <a href="hotel_exp.php">About To Exp</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a  href="#"><i class="fa fa-user "></i> Settings</a>
                    </li>
                    <li>
                        <a  href="#"><i class="fa fa-list-alt "></i> Ad Management</a>
                    </li>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
