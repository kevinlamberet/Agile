<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Docufy  Favoris</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">
    <link href="css/docufy.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="page-top" class="index">

<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=docufy;charset=utf8', 'root', '');

}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}



if (!empty($_POST['username'])){

$first_name = "rien rentré";
$last_name = "rien rentré";
$password = "rien rentré";
$theme_color = "rien rentré";
$theme_font = "rien rentré";
$theme_font_color = "rien rentré";
$creation_date = "rien rentré";
$updating_date = "rien rentré";
$username = "rien rentré";
$email = "rien rentré";

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$password = $_POST['password'];
$username = $_POST['username'];
$email = $_POST['email'];

$req = $bdd->prepare("INSERT INTO `user` (`first_name`, `last_name`, `password`,`username`, `email`) VALUES
(:first_name, :last_name, :password,:username, :email)");

$req->execute(array(
    'first_name' => $first_name,
    'last_name' => $last_name,
    'password' => $password,
    'username' => $username,
    'email' => $email,
    ));



var_dump($_POST);
}


?>

<div id="skipnav"><a href="#maincontent">Skip to main content</a></div>

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">Docufy</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#inscription">Inscription</a>
                    </li>
                    <li class="">
                        <a href="connexion.html">Connexion</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container" id="maincontent" tabindex="-1">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="img/profile.png" alt="">
                    <div class="intro-text">
                        <h1 class="name">Docufy</h1>
                        <hr class="star-light">
                        <span class="skills">Trouver des documents efficacement</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
<section id="inscription">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Inscription</h2>
                <hr class="star-primary">
            </div>
        </div>

        <div class="row">
          <form method="post">
            <div class="form-group">
              <label class="col-lg-2 control-label">Nom</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" name="first_name" placeholder="toto">
              </div>
            </div><br/><br/><br/>

            <div class="form-group">
              <label class="col-lg-2 control-label">Prenom</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" name="last_name" placeholder="kevin">
              </div>
            </div><br/><br/>

            <div class="form-group">
              <label class="col-lg-2 control-label">Mail</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" name="email" placeholder="kevin.toto@truc.fr">
              </div>
            </div><br/><br/>

            <div class="form-group">
              <label class="col-lg-2 control-label">Login</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" name="username" placeholder="xx_Dark_keke">
              </div>
            </div><br/><br/>

            <div class="form-group">
              <label class="col-lg-2 control-label">Password</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" name="password" placeholder="123456">
              </div>
            </div><br/><br/>

          <br/><br/><center><button type="submit" name="submit" class="btn btn-primary">Valider</button></center>
          </form>
        </div>
    </div>
</section>

<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-6">
                    <h3>Location</h3>
                    <p>3481 Melrose Place
                        <br>Beverly Hills, CA 90210</p>
                </div>
                <div class="footer-col col-md-6">
                    <h3>Around the Web</h3>
                    <ul class="list-inline">
                        <li>
                            <a href="#" class="btn-social btn-outline"><span class="sr-only">Facebook</span><i class="fa fa-fw fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><span class="sr-only">Google Plus</span><i class="fa fa-fw fa-google-plus"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><span class="sr-only">Twitter</span><i class="fa fa-fw fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><span class="sr-only">Linked In</span><i class="fa fa-fw fa-linkedin"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><span class="sr-only">Dribble</span><i class="fa fa-fw fa-dribbble"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; Your Website 2016
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

<!-- Theme JavaScript -->
<script src="js/freelancer.min.js"></script>

</body>

</html>
