<?php


 ?>

 	<header style="grid-row: 1;">
		<div class="p-3 mb-2 bg-secondary text-white" style="    margin-bottom: 0px!important;">


			<img style="float:left" src="../view/img/sltb_logo.jpg" width="80" height="45">
			<h3 style="text-align:center;margin-left:-8px">Welcome <?php echo($_SESSION['designation']) ; ?></h3>

			<!-- <a href="logout.php" style="float:right;margin-top: 40px;"><i class="fa fa-power-off" aria-hidden="true"></i>Log Out</a>
			<a href="profile.php" style="float:right;margin-top: 40px;"><i class="fa fa-user" aria-hidden="true"></i>My Profile</a>-->


  			<a style="float:right;margin-top: -35px;" class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    			Settings
  			</a>

			<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
				<a class="dropdown-item" href="profile.php">Profile</a>
				<a class="dropdown-item" href="logout.php">Log Out</a>

			</div>


		</div>
	</header>
