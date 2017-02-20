<?php
/**
 * Created by PhpStorm.
 * User: Aaditya
 * Date: 11/6/2016
 * Time: 3:26 PM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">-->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/wdmproject3.js"></script>
    <title>CSE5335 - Project 3</title>
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
                    <li class="active"><a href="default.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
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
                        <input type="text" placeholder="Search Paintings" id="searchbar" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary" id="searchbutton">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>
<div class="jumbotron">
    <div class="container">
        <h1>Welcome to WDM Assignment #3</h1>
        <p>This is the third assignment by Aaditya Arvind Kulkarni for CSE 5335</p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-2">
            <h3>
                <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                About Us
            </h3>
            <p>What this page is all about and other stuff</p>
            <button class="btn btn-default" onclick="RedirectToPage('about.php')"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page </button>
        </div>
        <div class="col-sm-2">
            <h3>
                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                Artist List
            </h3>
            <p>Display list of artist names as links</p>
            <button class="btn btn-default" onclick="RedirectToPage('Part01_ArtistsDataList.php')"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page </button>
        </div>
        <div class="col-sm-2">
            <h3>
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                Single Artist
            </h3>
            <p>Display information for a single artist</p>
            <button class="btn btn-default" onclick="RedirectToPage('Part02_SingleArtist.php?id=19')"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page </button>
        </div>
        <div class="col-sm-2">
            <h3>
                <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                Single Work
            </h3>
            <p>Display information for a single work</p>
            <button class="btn btn-default" onclick="RedirectToPage('Part03_SingleWork.php?id=394')"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page </button>
        </div>
        <div class="col-sm-2">
            <h3>
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                Search
            </h3>
            <p>Perform search on Artworks tables</p>
            <button class="btn btn-default" onclick="RedirectToPage('Part04_Search.php')"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page </button>
        </div>
    </div>
</div>
</body>
</html>

