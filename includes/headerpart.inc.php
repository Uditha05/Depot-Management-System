<?php 


 ?>

 	<header style="background :#ff3333; overflow: auto;">
		<div>
			<h1 style="float: left;">Welcome <?php echo($_SESSION['first_name']) ; ?></h1>
			<a href="logout.php" style="float:right;margin-top: 40px;"><i class="fa fa-power-off" aria-hidden="true"></i>Log Out</a>		
			<a href="profile.php" style="float:right;margin-top: 40px;"><i class="fa fa-user" aria-hidden="true"></i>My Profile</a>
		</div>
	</header>