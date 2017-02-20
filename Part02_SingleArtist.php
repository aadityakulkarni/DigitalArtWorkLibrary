<?php
/**
 * Created by PhpStorm.
 * User: Aaditya
 * Date: 11/6/2016
 * Time: 3:26 PM
 */
//include database connection file
include_once 'db_connect.php';
date_default_timezone_set('America/Chicago');
$artist_id = $_GET['id'];
if($artist_id){

    $artists_data = "SELECT * FROM artists where ArtistID='$artist_id'";
    $artists_data_query = mysqli_query($mysqli, $artists_data);
    $artist_count = mysqli_num_rows($artists_data_query);


    if ($artist_count > 0) {
        while($artists_data_result = mysqli_fetch_array($artists_data_query)){
            $ArtistID = $artists_data_result['ArtistID'];
            $FirstName = $artists_data_result['FirstName'];
            $LastName = $artists_data_result['LastName'];
            $Nationality = $artists_data_result['Nationality'];
            $YearOfBirth = $artists_data_result['YearOfBirth'];
            $YearOfDeath = $artists_data_result['YearOfDeath'];
            $Details = $artists_data_result['Details'];
            $ArtistLink = $artists_data_result['ArtistLink'];
        }
    }
    else{
        // error number 1 -> unknown artist id
        header('Location:error.php?error_no=1');
    }
}
else {
    // error number 0 -> artist id not given
    header('Location:error.php?error_no=0');
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
                            <li class="active"><a href="Part02_SingleArtist.php?id=19">Single Artist (Part 2)</a></li>
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

<div class="container">
    <div class="row">
        <div class="page-header">
            <h1><?php echo $FirstName." ".$LastName; ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <img class="img-responsive img-thumbnail" src="<?php echo 'images/art/artists/medium/'.$ArtistID.'.jpg'?>">
        </div>
        <div class="col-md-5">
            <?php echo $Details; ?>
            <br>
            <br>
            <button class="btn btn-default">
                <span class="glyphicon glyphicon-heart text-primary" aria-hidden="true"></span>
                <span class="text-primary"> Add To Favourites List </span>
            </button>
            <br>
            <br>
            <div class="panel panel-default">
                <div class="panel-heading"> Artist Details</div>
                <table class="table">
                    <tr>
                        <th>Date: </th>
                        <td><?php echo $YearOfBirth. " - " .$YearOfDeath; ?> </td>
                    </tr>
                    <tr>
                        <th>Nationality: </th>
                        <td><?php echo $Nationality; ?> </td>
                    </tr>
                    <tr>
                        <th>More Info: </th>
                        <td><a href="<?php echo $ArtistLink; ?>" target="_blank"><?php echo $ArtistLink; ?></a> </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Art By <?php echo "$FirstName $LastName"; ?></h3>
        </div>
    </div>
    <div class="row">

        <?php

        $artwork_data = "SELECT * FROM artworks where 
                         ArtistID='$artist_id'";

        $artwork_data_query = mysqli_query($mysqli, $artwork_data);
        while($artwork_data_result = mysqli_fetch_array($artwork_data_query)){
            $artwork_link = 'Part03_SingleWork.php?id='.$artwork_data_result['ArtWorkID'];
            $artwork_title = $artwork_data_result['Title'];
            $artwork_year = $artwork_data_result['YearOfWork'];
            echo "
                <div class='col-md-3 text-center'>
                    <div class='thumbnail' style='margin-bottom:0px;'>
                    <a href='$artwork_link'>
                  <img class ='img-thumbnail' src='images/art/works/square-medium/".
                $artwork_data_result['ImageFileName'].".jpg'><br>
                    <p class ='imgText'>
                      ".$artwork_title.", ".$artwork_year."</p></a><br><br>
                      <button class='btn btn-sm btn-primary' onclick='RedirectToPage(\"$artwork_link\")'>
                      <span class=\"glyphicon glyphicon-info-sign\" aria-hidden=\"true\"></span>
                        View
                      </button>
                      <button class='btn btn-sm btn-success' >
                      <span class=\"glyphicon glyphicon-gift\" aria-hidden=\"true\"></span>
                        Wish
                      </button>
                      <button class='btn btn-sm btn-info'>
                      <span class=\"glyphicon glyphicon-shopping-cart\" aria-hidden=\"true\"></span>
                        Cart
                      </button>
                    </div>  
                  </div>";
        }

        ?>
    </div>
</div>

</body>
</html>

