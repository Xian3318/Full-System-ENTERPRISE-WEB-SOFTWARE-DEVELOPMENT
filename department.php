<?php
	session_start();
	include('conn.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://use.fontawesome.com/fe459689b4.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</head>
	
	<style>
	body {
	margin: 0px;
	font-family: 'segoe ui';
	background-color:#e0ebeb;
	}
	 /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
		
      }
      .row.content {height:auto;} 
    }

#department {
    background: #eee ;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    text-transform: uppercase;
}

#department .card {
    border: none;
    background: #ffffff;
}

.frontside {
    position: relative;
    -webkit-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    z-index: 2;
    margin-bottom: 30px;
}

.frontside .card{
    min-height: 250px;
}

.frontside .card .card-title,
.backside .card .card-title {
    color: #007b5e !important;
}

.frontside .card .card-body img{
  width:100%;

}

	</style>
	
	<body>
		<?php 
			$staffID = $_SESSION['staffID'] ;
			
			$list = mysqli_query($conn,"SELECT * FROM staff WHERE staffID = '$staffID'");  
			while($row_list = mysqli_fetch_array($list))
			{  
				$fName = $row_list['fName'];
		?>	
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					<a class="navbar-brand" href="department.php">Idea Collector</a>
				</div>
	  
				<ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> <?php  echo $fName; ?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
                            <li>
								<a href="profilestaff.php"><i class="glyphicon glyphicon-user"></i>Profile</a>
                            </li>
							<li class="divider"></li>
                            <li>
								<a href="logout.php"><i class="glyphicon glyphicon-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
				</ul>
			</div>
		</nav>
		<?php
			}
		?>
                 
\

		<section id="department" >
			<div class="container">
				<h5 class="section-title h1">Department</h5>
				<br>
				<div class="row">
					<?php
						$query = mysqli_query($conn,"SELECT * FROM department");  
						while($row = mysqli_fetch_array($query))
						{  
							$departmentID = $row['departmentID'];
							$departmentName = $row['departmentName'];
							$departmentImage = $row['departmentImage'];
					?>
					<div class="col-xs-12 col-sm-6 col-md-4">
						<a href="category.php?department=<?php echo $departmentID ?>" style="text-decoration: none">
							<div class="frontside">
								<div class="card">
									<div class="card-body text-center">
										<p><?php echo "<img src='$departmentImage' alt='card image'>";?></p>
											<h4 class="card-title"><?php echo $departmentName;?></h4>
									</div>
								</div>
							</div>
						</a>
					</div>
					<?php
						}
					?>
				</div>
			</div>
		</section>
	<?php
		
	?>
	</body>
</html>