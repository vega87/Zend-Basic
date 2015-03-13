<!DOCTYPE html>

<html lang="de">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MWD Systems TimeTrackingTool</title>

    <!-- Le styles -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700' rel='stylesheet' type='text/css'>
    {$this->headLink()->prependStylesheet('/css/style.css')|truncate:0:""}
    {$this->headLink()->prependStylesheet('/css/bootstrap.min.css')|truncate:0:""}
    {$this->headLink()->prependStylesheet('/css/bootstrap-theme.min.css')|truncate:0:""}

    {$this->headLink()}

    <!-- Scripts -->
    {$this->headScript()->prependFile('/js/bootstrap.min.js')|truncate:0:""}
    {$this->headScript()->prependFile('/js/jquery.min.js')|truncate:0:""}

    {$this->headScript()}

</head>

<body>

<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">

    <!-- Brand and toggle get grouped for better mobile display -->

    <div class="container">

        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">

                <span class="sr-only">Toggle navigation</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

            </button>

            <a class="navbar-brand" href="#">PasswordManager</a>

        </div>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <!--
            <ul class="nav navbar-nav">
                <li class=""><a href="#">Home</a></li>
                <li class=""><a href="#">Benutzer</a></li>
                <li class=""><a href="#">Klienten</a></li>
                <li class=""><a href="#">Projekte</a></li>
                <li class=""><a href="#">Abrechnung</a></li>
                <li class=""><a href="#">Einstellungen</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
            -->
        </div>

    </div>

</nav>

<div class="container" style="margin-top: 60px;">

    {$this->layout()->content}
    <hr>

    <div class="row">

        <div class="col-sm-12">

            <footer>

                <p>MWD-Systems &copy; 2015</p>

            </footer>

        </div>

    </div>

</div>
</body>

</html>

