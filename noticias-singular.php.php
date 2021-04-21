<?php
require 'include/settings.inc.php';
include $arrSETTINGS['dir_site'].'/include/db.inc.php';
db_connect();
$id = $_GET['id'];
$query = "SELECT * FROM noticias WHERE estado = 1 AND id = $id";
$arrRes = db_query($query);
$pages = $arrRes[0];
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- courses-detail21:19  -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="shortcut icon" href="images/colgaialogo.png">
    <title>Notícias</title>

    <!-- Css Files -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/flaticon.css" rel="stylesheet">
    <link href="css/slick-slider.css" rel="stylesheet">
    <link href="css/prettyphoto.css" rel="stylesheet">
    <link href="build/mediaelementplayer.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="css/color.css" rel="stylesheet">
    <link href="css/color-two.css" rel="stylesheet">
    <link href="css/color-three.css" rel="stylesheet">
    <link href="css/color-four.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	
    <!--// Main Wrapper \\-->
    <div class="wm-main-wrapper">
        
        <!--// Header \\-->
		<header id="wm-header" class="wm-header-one">


            <!--// MainHeader \\-->
            
                           <?php include $arrSETTINGS['dir_site'].'/include/menu.inc.php' ?>
                        
            <!--// MainHeader \\-->

		</header>
		<!--// Header \\-->

		<!--// Mini Header \\-->
		
  		<!--// Mini Header \\-->

		<!--// Main Content \\-->
		<div class="wm-main-content">

			<!--// Main Section \\-->
			<div class="wm-main-section">
				<div class="container">
					<div class="row">
					
						<div class="col-md-9">
							<div class="wm-blog-single">
								<figure class="wm-detail-thumb">
									<img src="images/<?php echo $pages['foto'] ?>" alt="">
								</figure>					
							</div>
												
            </div>
            <div class="wm-main-wrapper">
            <div class="wm-our-course-detail">
								<div class="wm-title-full">
									<h2><?php echo $pages['titulo'] ?></h2>
								</div>
								<p class="wm-text"> <?php echo $pages['texto'] ?></p>
                <break>
                </div>
                <div class="wm-main-section wm-learn-listing-full">
                <div class="container">
                    <div class="row">
                        
                        

                    </div>
                </div>
            </div>
                
							</div>
					</div>
				</div>
			</div>
			<!--// Main Section \\-->

            <!--// Main Section \\-->
		</div>
		<!--// Main Content \\-->

		<!--// Footer \\-->
		<footer id="wm-footer" class="wm-footer-one">
			
            <!--// FooterNewsLatter \\-->
            
            <!--// FooterNewsLatter \\-->

            <!--// FooterWidgets \\-->
            <div class="wm-footer-widget">
                <div class="container">
                    <div class="row">
					<aside class="widget widget_contact_info col-md-3">
                           <?php include $arrSETTINGS['dir_site'].'/include/rodape.inc.php'?>
                        </aside>
                       
                    </div>
                </div>
            </div>
            <!--// FooterWidgets \\-->

            <!--// FooterCopyRight \\-->
            
            <!--// FooterCopyRight \\-->

		</footer>
		<!--// Footer \\-->

	<div class="clearfix"></div>
    </div>
    <!--// Main Wrapper \\-->

    <!-- ModalLogin Box -->
    
    <!-- ModalLogin Box -->

    <!-- ModalSearch Box -->
    <div class="modal fade" id="ModalSearch" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            
            <div class="wm-modallogin-form">
                <span class="wm-color">Search Your KeyWord</span>
                <form>
                    <ul>
                        <li> <input type="text" value="Keywords..." onblur="if(this.value == '') { this.value ='Keywords...'; }" onfocus="if(this.value =='Keywords...') { this.value = ''; }"> </li>
                        <li> <input type="submit" value="Search"> </li>
                    </ul>
                </form>
            </div>

          </div>
        </div>
      <div class="clearfix"></div>
      </div>
    </div>
    <!-- ModalSearch Box -->

	<!-- jQuery (necessary for JavaScript plugins) -->
	<script type="text/javascript" src="script/jquery.js"></script>
	<script type="text/javascript" src="script/modernizr.js"></script>
    <script type="text/javascript" src="script/bootstrap.min.js"></script>
    <script type="text/javascript" src="script/jquery.prettyphoto.js"></script>
    <script type="text/javascript" src="script/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="script/fitvideo.js"></script>
    <script type="text/javascript" src="script/skills.js"></script>
    <script type="text/javascript" src="script/slick.slider.min.js"></script>
    <script type="text/javascript" src="script/waypoints-min.js"></script>
    <script type="text/javascript" src="build/mediaelement-and-player.min.js"></script>
    <script type="text/javascript" src="script/isotope.min.js"></script>
    <script type="text/javascript" src="script/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    <script type="text/javascript" src="script/functions.js"></script>

  </body>

<!-- courses-detail21:28  -->
</html>
<?php
	db_close();
?>