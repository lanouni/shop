<link rel="stylesheet" href="../css/MyCss.css">
<?php
    class Produit{
        private $produit_nom;
        private $description;
        private $prix;
        private $produit_url;
        private $image_url ;
        private $local_url;
        private $category;

        public function __construct ($produit_nom,$description,$prix,$produit_url,$image_url,$local_url,$category){
            $this->produit_nom = $produit_nom;
            $this->description = $description;
            $this->prix = $prix;
            $this->produit_url = $produit_url;
           $this->image_url = $image_url;
            $this->local_url = $local_url;
            $this->category = $category;
        }
        
        public function  getName(){
            return $this->produit_nom;
        }
        public function  getDescription(){
            return $this->description;
        }
        public function  getPrix(){
            return $this->prix;
        }
        public function  getProduitUrl (){
            return $this->produit_url ;
        }
        public function  getImageUrl (){
            return $this->image_url ;
        }
        public function  getLocalUrl(){
            return $this->local_url;
        }
        public function GetCategory(){
            return $this->category;
        }      

        public function insert(){
            include "connexion.php";
            $stmt = $dbh->prepare("insert into produit (produit_nom,description,prix, produit_url,image_url, local_url,category) values (?,?,?,?,?,?,?)");
            $stmt->execute(array($this->getName(),$this->getDescription(),floatval($this->getPrix()),$this->getProduitUrl(),$this->getImageUrl(),$this->getLocalUrl(),$this->GetCategory()));
        }

        public static function getAllCategory(){
            include "connexion.php";
            $stmt = $dbh->query("select distinct category from produit");
            if($stmt->rowCount() !=0){
                
            while ($donnee = $stmt->fetch()) {
                if($donnee["category"]!=null){
                ?>

										<li><a href="category-product?category=<?php echo $donnee["category"]; ?>"> <?php echo $donnee["category"]; ?></a></li>
										
								
                <?php
                     }
            }
           
            }
        }

        public static function GetProductByCategory($category){
            include "connexion.php";
            $stmt = $dbh->prepare("select * from produit where category like ?");
            $stmt->execute(array('%'.$category.'%'));
            if($stmt->rowCount() == 0){
              include "Product-Not-Found.php";
              erreur();
              exit;
            }
            else{
                while($donnee = $stmt->fetch()){
                    ?>
                     
							<div class="col-lg-4 col-md-6 col-12">
								<div class="single-product">
									<div class="product-img">
										<a href="product-details.php?produit_id=<?php echo $donnee["id"]; ?>">
											<img class="default-img" style="width:550px;height:250px;"src="<?php echo $donnee["local_url"]; ?>" >
											
										</a>
									</div>
									<div class="product-content">
										<h3><a href="product-details.php?produit_id=<?php echo $donnee["id"]; ?>"><?php echo $donnee["produit_nom"];?></a></h3>
										<div class="product-price">
											<span>$<?php echo $donnee["prix"]; ?></span>
										</div>
									</div>
								</div>
							</div>
                    <?php
                }
            }
        }

        public static function get (){
            include "connexion.php";
            $stmt = $dbh->query("select * from produit");
            while($donnee = $stmt->fetch()){

           
            ?>
            
							<div class="col-lg-4 col-md-6 col-12">
								<div class="single-product">
									<div class="product-img">
										<a href="product-details.php?produit_id=<?php echo $donnee["id"]; ?>">
											<img class="default-img" style="width:550px;height:250px;"src="<?php echo $donnee["local_url"]; ?>" >
											
										</a>
									</div>
									<div class="product-content">
										<h3><a href="product-details.php?produit_id=<?php echo $donnee["id"]; ?>"><?php echo $donnee["produit_nom"];?></a></h3>
										<div class="product-price">
											<span>$<?php echo $donnee["prix"]; ?></span>
										</div>
									</div>
								</div>
                            </div>
							
							
             <?php
            }
        } 

        public static function getRaindomProduct (){
            include "connexion.php";
            $stmt = $dbh->query("select * from produit as p join (select id from produit order by rand() limit 8) as p2 on p.id = p2.id ");
           
            while($donnee = $stmt->fetch()){
            ?>
               
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="product-details.php?produit_id=<?php echo $donnee["id"]; ?>">
															<img class="default-img" style="width:550px;height:250px;" src="<?php echo $donnee['local_url']; ?>" alt="#">
															<span class="out-of-stock">Hot</span>
														</a>
													</div>
													<div class="product-content">
														<h3><a href="product-details.html"><?php echo $donnee['produit_nom']; ?></a></h3>
														<div class="product-price">
															<span><?php echo $donnee["prix"]; ?>$</span>
														</div>
													</div>
												</div>
											</div>
                
							
             <?php
            }
        } 

        public static function GetProduct($id){
            include "connexion.php";
            $stmt = $dbh->prepare("select * from produit where id=?");
            $stmt->execute(array($id));
            if($stmt->rowCount() == 0){
              include "error.php";
              erreur();
              exit;
            }
            else{
                while($donnee = $stmt->fetch()){
                    ?>
                     <div class="container" style="margin-top:30px;">
                        <div class="card">
                            <div class="container-fliud">
                                <div class="wrapper row">
                                    <div class="preview col-md-6">
                                        <div class="preview-pic tab-content">
                                        <div class="tab-pane active" id="pic-1"><img src="<?php echo $donnee["local_url"];  ?>" /></div>
                                        </div>
                                    </div>
                                    <div class="details col-md-6">
                                        <h3><?php
                                                echo $donnee["produit_nom"];?></h3>
                                        <br><br>    
                                        <p class="product-description"><?php echo $donnee["description"]; ?></p>
                                        <br><br>
                                        <h5 class="price">current price: <span>$<?php echo $donnee["prix"]; ?></span></h5>
                                        <br><br>
                                        <a href="<?php echo $donnee["produit_url"] ?>"><button class="btn btn-success" style="background-color:green;">buy</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        }

        public static function search($nom){
            include "connexion.php";
            $stmt = $dbh->prepare("select * from produit where produit_nom like ? ");
            $stmt->execute(array('%'.$nom.'%'));
           
            if($stmt->rowCount() == 0){
              include "error.php";
              erreur();
              exit;
            }
            else{
                while($donnee = $stmt->fetch()){

           
                    ?>
                    <div class="row">
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="product-details.php?produit_id=<?php echo $donnee["id"]; ?>">
                                                    <img class="default-img" style="width:550px;height:250px;"src="<?php echo $donnee["local_url"]; ?>" >
                                                    
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="product-details.php?produit_id=<?php echo $donnee["id"]; ?>"><?php echo $donnee["produit_nom"];?></a></h3>
                                                <div class="product-price">
                                                    <span>$<?php echo $donnee["prix"]; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                     <?php
                    }
            }
        }
    }
    
?>
<script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<!-- Popper JS -->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Color JS -->
	<script src="js/colors.js"></script>
	<!-- Slicknav JS -->
	<script src="js/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="js/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="js/magnific-popup.js"></script>
	<!-- Fancybox JS -->
	<script src="js/facnybox.min.js"></script>
	<!-- Waypoints JS -->
	<script src="js/waypoints.min.js"></script>
	<!-- Countdown JS -->
	<script src="js/finalcountdown.min.js"></script>
	<!-- Nice Select JS -->
	<script src="js/nicesellect.js"></script>
	<!-- Ytplayer JS -->
	<script src="js/ytplayer.min.js"></script>
	<!-- Flex Slider JS -->
	<script src="js/flex-slider.js"></script>
	<!-- ScrollUp JS -->
	<script src="js/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="js/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="js/easing.js"></script>
	<!-- Active JS -->
	<script src="js/active.js"></script>