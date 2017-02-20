<?php
/**
 * Created by PhpStorm.
 * User: Aaditya
 * Date: 11/13/2016
 * Time: 8:20 PM
 */
include 'db_connect.php';
$title_value = filter_input(INPUT_GET, 'title', FILTER_SANITIZE_STRING);
$script = '';
if(isset($_GET['title']) && empty($title_value)){
   header('Location:error.php?error_no=5');
}
else if(isset($_GET['title']) && !empty($title_value)){
    $script = "<script>
    
    $(function() {
    $(\"#title\").trigger(\"click\");
    $(\"#searchtitle\").val('$title_value');
    $(\"#filterbutton\").trigger(\"click\");
});
 
 </script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/wdmproject3.css">
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
                    <li ><a href="default.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Pages <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="Part01_ArtistsDataList.php">Artist Data list (Part 1)</a></li>
                            <li><a href="Part02_SingleArtist.php?id=19">Single Artist (Part 2)</a></li>
                            <li><a href="Part03_SingleWork.php?id=394">Single Work (Part 3)</a></li>
                            <li class="active"><a href="Part04_Search.php">Search (Part 4)</a></li>
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

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>Search Results</h1>
            </div>
        <div class="well">
            <input type="radio" name="searchtype" value="title" id="title" style="margin-bottom: 10px;" > Filter By Title:</input><br>
            <input type="text" name="searchtitle" id="searchtitle" class="form-control"/>
            <input type="radio" name="searchtype"  value="description" id="description" style="margin-bottom: 10px;" > Filter By Description :</input><br>
            <input type="text" name="searchdescription" id="searchdescription" class="form-control" />
            <input type="radio" name="searchtype"  value="nofilter" id="nofilter" style="margin-bottom: 15px;" > No Filter (Show all Art works) :</input><br>
            <input type="button" class="btn btn-primary" id="filterbutton" value="Filter" />
        </div>
    </div>
</div>
<div class="container" id="filteroutput">
</div>
<?php echo $script; ?>
</body>
</html>
