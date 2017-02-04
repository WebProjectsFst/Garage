<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo Html::style('css/bootstrap.min.css'); ?>

    <?php echo Html::style('css/bootstrap-theme.min.css'); ?>

    <?php echo Html::style('css/dashboard-template.css'); ?>

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    
</head>
<body>
    <div class="container-fluid">
        <div class="navbar-left dashboard">
            <div id="dashboard-title">
                <h2>Dashboard</h2>
            </div>
            <div id="dashboard-menu">
                <ul class="menu list-unstyled">
                    <li class="menu-item selected"><span>Creer Fiche Prestation</span></li>
                    <li class="menu-item" id="Yoo1"><span>Ajouter Cient</span></li>
                    <li class="menu-item" id="yoo2"><span>Consulter Liste Client</span></li>
                </ul>
            </div>
            <div class="account-info">
                <div class="header">
                    <span>Seif Abdennadher</span><img class="down" src="images/icons/drop_down_arrow.png" alt=""><br>
                    <span><b>Manager</b></span>
                </div>
                <div class="footer">
                    <div id="clock"></div>
                </div>
            </div>

        </div>
        <div class="content">
        </div>
    </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/dashboard-template.js"></script>
</body>
</html>
