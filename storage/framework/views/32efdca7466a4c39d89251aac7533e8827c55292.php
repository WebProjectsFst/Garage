<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo Html::style('css/bootstrap.min.css'); ?>

    <?php echo Html::style('css/bootstrap-theme.min.css'); ?>

    <?php echo Html::style('css/home.css'); ?>

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/home.js"></script>
    <title>Mechanic</title>
  </head>
  <body onscroll="test()" id="B">
    <nav id="navigationBar" class="navbar navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img id="logo" src="images/mechanic-logo.png" alt="">
                </a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav menu-ul">
                    <li>
                        <a  data-toggle="modal" data-target="#myModal">Login</a>
                    </li>
                    <li>
                        <a href="#">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid" id="carousel-container">
      <div id="myCarousel" class="carousel-fade carousel slide" data-ride="carousel">
        <ol class="carousel-indicators carousel-indicators-numbers">
          <li data-target="#myCarousel" data-slide-to="0" class="carousel-li-item active">Inspections</li><!--
          --><li data-target="#myCarousel" data-slide-to="1" class="carousel-li-item">Oil and Filters</li><!--
          --><li data-target="#myCarousel" data-slide-to="2" class="carousel-li-item">Engine Tuning</li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="images/banner_img01.jpg" alt="Chania" class="img-responsive">
            <div id="carousel-foreground"></div>
            <div class="col-sm-8 col-sm-offset-2 img-desc">
              <h3 class="titre">Inspections</h3>
              <div class="excerpt">WE KEEP YOUR CAR IN SHAPE.</div>
            </div>
          </div>

          <div class="item">
            <img src="images/banner_img02.jpg" alt="Chania" class="img-responsive">
            <div id="carousel-foreground"></div>
            <div class="col-sm-8 col-sm-offset-2 img-desc">
              <h3 class="titre">Oil and Filters</h3>
              <div class="excerpt">LIQUIDS, ESSENCIAL FOR EVERY CAR.</div>
            </div>
          </div>

          <div class="item">
            <img src="images/banner_img03.jpg" alt="Flower" class="img-responsive">
            <div id="carousel-foreground"></div>
            <div class="col-sm-8 col-sm-offset-2 img-desc">
              <h3 class="titre">Engine Tuning</h3>
              <div class="excerpt">BECAUSE LIFE IS MOTION.</div>
            </div>
          </div>
          <div id="carousel-indicators-background"></div>
        </div>
      </div>
    </div>
    <div class="container-fluid" id="content">
      <div class="col-sm-offset-4 col-sm-4">
        <div class="col-sm-offset-2 col-sm-8">
          <h2>WHY CHOOSE US?</h2>
        </div>
      </div>
      <div class="col-sm-12">
        <p id="par1">
          We are one of the leading auto repair shops serving customers in Tunisia.<br>
          All mechanic services are performed by highly qualified mechanics.
        </p>
      </div>
      <div class="col-sm-offset-1 col-sm-10" id="services-wraper">
        <div class="col-sm-4">
          <img src="images/service_img01.jpg" alt="EVERY JOB IS PERSONAL" style="height: 130px">
          <h4>EVERY JOB IS PERSONAL</h4>
          <div class="h4-bottom-line"></div>
          <div class="services-desc">
            <p>If you want the quality you would expect from the<br/>dealership, but with a more personal and friendly<br/>atmosphere, you have found it.</p>
          </div>
        </div>
        <div class="col-sm-4">
          <img src="images/service_img02.jpg" alt="BEST MATERIALS" style="height: 130px">
          <h4>BEST MATERIALS</h4>
          <div class="h4-bottom-line"></div>
          <div class="services-desc">
            <p>We have invested in all the latest specialist tools and<br/>diagnostic software that is specifically tailored for the<br/>software in your vehicle.</p>
          </div>
        </div>
        <div class="col-sm-4">
          <img src="images/service_img03.jpg" alt="PROFESSIONAL STANDARDS" style="height: 130px">
          <h4>PROFESSIONAL STANDARDS</h4>
          <div class="h4-bottom-line"></div>
          <div class="services-desc">
            <p>Our auto repair shop is capable of servicing a variety<br/>of models. We only do the work that is needed to fix<br/>your problem.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
       <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Login</h4>
         </div>
          <div class="modal-body">
          lena contenu
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Login</button>
        </div>
        </div>
      </div>
    </div>

    <div class="container-fluid" id="footer">
    </div>
  </body>
</html>
