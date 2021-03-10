<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Eshop - eCommerce HTML5 Template.</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
	<!-- Jquery Ui -->
    <link rel="stylesheet" href="css/jquery-ui.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/MyCss.css">
</head>
<body>
 <!-- Header -->
 <header class="header shop">
		<!-- Topbar -->
		
		</div>
		<!-- End Topbar -->
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="index.html"><img src="images/logo.png" alt="logo"></a>
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form class="search-form">
									<input type="text" placeholder="Search here..." name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">
							
								<form>
									<input name="search" placeholder="Search Products Here....." type="search">
									<button class="btnn"><i class="ti-search"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						
					</div>
				</div>
			</div>
		</div>
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
											<ul class="nav main-menu menu navbar-nav">
													<li class="active"><a href="#">Home</a></li>
													<li><a href="shop-grid.php">Shop Grid</a></li>												
																			
													<li><a href="#">Blog<i class="ti-angle-down"></i></a>
														
													</li>
													<li><a href="contact.html">Contact Us</a></li>
												</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
    <div class="insert_place">
		
        <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="formGroupExampleInput">nom produit</label>
            <input type="text" name="nom" class="form-control" id="formGroupExampleInput" placeholder="name input placeholder">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">description</label>
            <textarea class="form-control" name="description" placeholder="description input placeholder" ></textarea>
        </div>
		<div class="form-group">
            <label for="formGroupExampleInput">Prix</label>
            <input type="number" class="form-control" name="Prix" id="formGroupExampleInput" placeholder="link input placeholder">
        </div>
		<div class="form-group">
            <label for="formGroupExampleInput">Lien Produit</label>
            <input type="text" class="form-control" name="lienP" id="formGroupExampleInput" placeholder="link picture input placeholder">
        </div>
		<div class="form-group">
            <label for="formGroupExampleInput">lien image</label>
            <input type="text" class="form-control" name="lienI" id="formGroupExampleInput" placeholder="link picture input placeholder">
        </div>
		<div class="form-row">
		<div class="form-group col-md-6">
            <label for="formGroupExampleInput">lien image local</label>
            <input type="file" class="form-control" name="image" id="fichier" placeholder="link picture input placeholder">
        </div><div class="form-group col-md-6">
            <label for="formGroupExampleInput">categorie</label>
            <input type="text" class="form-control" name="categorie" id="fichier" placeholder="link picture input placeholder">
        </div>
		</div>
		<div>
			<button type="submit" alue="Upload Image" name="submit" class="btn btn-primary">Submit</button>
		</div>
        </form>
		<?php
			 if(isset($_FILES['image'])){
				$errors= array();
				$file_name = $_FILES['image']['name'];
				$file_size =$_FILES['image']['size'];
				$file_tmp =$_FILES['image']['tmp_name'];
				$file_type=$_FILES['image']['type'];
				$tmp = (explode('.',$_FILES['image']['name']));
				$file_ext=end($tmp);
				$extensions= array("jpeg","jpg","png");
				
				if(in_array($file_ext,$extensions)=== false){
				   $errors[]="extension not allowed, please choose a JPEG or PNG file.";
				}
				
				if($file_size > 2097152){
				   $errors[]='File size must be excately 2 MB';
				}
				
				if(empty($errors)==true){
					$nom = "images/download/".$_POST["nom"].".".$file_ext;
				   move_uploaded_file($file_tmp,$nom);
				   echo "Success";
				}else{
				   print_r($errors);
				   exit;
				}
			 }
			if (isset($_POST["submit"])) {
			include "php/Produit.php";
			$produit = new Produit($_POST["nom"],$_POST["description"],$_POST["Prix"],$_POST["lienP"],$_POST["lienI"] , $nom , $_POST["categorie"]);
			$produit->insert();

			}
		?>
		
    </div>
</body>
</html>