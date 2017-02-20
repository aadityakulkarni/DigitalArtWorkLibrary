<?php
/**
 * Created by PhpStorm.
 * User: Aaditya
 * Date: 11/6/2016
 * Time: 3:26 PM
 */
date_default_timezone_set('America/Chicago');
?>
<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">-->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/wdmproject3.js"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="default.php">WDM Project 3</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="default.php">Home</a></li>
                    <li class="active"><a href="about.php">About</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Pages <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="Part01_ArtistsDataList.php">Artist Data list (Part 1)</a></li>
                            <li><a href="Part02_SingleArtist.php?id=19">Single Artist (Part 2)</a></li>
                            <li><a href="Part03_SingleWork.php?id=394">Single Work (Part 3)</a></li>
                            <li><a href="Part04_Search.php">Search (Part 4)</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right">
                    <div class="form-group">
                        <label for="" style="color:#9d9d9d;">Aaditya Arvind Kulkarni &nbsp; </label>
                        <input type="text" placeholder="Search Paintings" id="searchbar"  class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary" id="searchbutton">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>
<div class="jumbotron">
    <div class="container">
        <h3>This site is an assignment for CSE 5335</h3>
        <h3>Name: Aaditya Arvind Kulkarni</h3>
        <h3>UTA ID: 1001238152</h3>
        <h3>Date: <?php echo date("Y-m-d H:i:s"); ?></h3>
    </div>
</div>
</body>
</html>

