<html>
	<head>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">	
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">	
		<link href="css/style.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>		
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php
		/////////////////////////////////////////////////////////////////////////
		function loadClass($class) { require $class . '.php'; }
		spl_autoload_register('loadClass');
		/////////////////////////////////////////////////////////////////////////
		require 'vendor/autoload.php';
		$db = new PDO('mysql:host=localhost;dbname=aireade', 'root', '');
		/////////////////////////////////////////////////////////////////////////
		?>
		<header>
		  <!-- Fixed navbar -->
		  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		    <a class="navbar-brand" href="index.php">OreAds</a>
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarCollapse">
		      <ul class="navbar-nav mr-auto">
		        <li class="nav-item active">
		          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#">Link</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link disabled" href="#">Disabled</a>
		        </li>
		      </ul>
		    </div>
		  </nav>
		</header>

		<!-- Begin page content -->
		<main role="main" class="container">
			<?php
			if(isset($_GET['page']))
			{
				if(is_file('controllers/'.$_GET['page'].'.php'))
				{
					include("controllers/".$_GET['page'].'.php');
				}
				else
				{
					echo $_GET['page'].' controller not found!';
				}
			}
			else
			{
				echo "<a href='index.php?page=home'>HOME</a>";
			} 
			?>
		</main>

		<!-- Sticky footer -->
		<footer class="footer">
		  <div class="container">
		    <span class="text-muted">OreAds&copy; - Copyright 2018 [BN]</span>
		  </div>
		</footer>		
	</body>
</html>