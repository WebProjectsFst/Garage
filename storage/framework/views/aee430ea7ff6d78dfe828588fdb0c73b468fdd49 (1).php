<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo Html::style('css/bootstrap.min.css'); ?>

    <?php echo Html::style('css/bootstrap-theme.min.css'); ?>

    <?php echo Html::style('css/home.css'); ?>

    <title>Mechanic</title>
  </head>
  <body>
    <nav class="navbar navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="images/mechanic-logo.png" alt="">
                </a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav menu-ul">
                    <li>
                        <a href="#">Login</a>
                    </li>
                    <li>
                        <a href="#">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid" id="carousel-container">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="images/banner_img01.jpg" alt="Chania">
          </div>

          <div class="item">
            <img src="images/banner_img02.jpg" alt="Chania">
          </div>

          <div class="item">
            <img src="images/banner_img03.jpg" alt="Flower">
          </div>
        </div>
      </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
