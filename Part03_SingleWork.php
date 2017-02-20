<?php
/**
 * Created by PhpStorm.
 * User: Aaditya
 * Date: 11/13/2016
 * Time: 8:20 PM
 */
include 'db_connect.php';

$artwork_id = $_GET['id'];
if($artwork_id){

    $artwork_data = "SELECT * FROM artworks where ArtWorkID='".$artwork_id."'";
    $artwork_data_query = mysqli_query($mysqli, $artwork_data);
    $artwork_count = mysqli_num_rows($artwork_data_query);


    if ($artwork_count > 0) {
        while($artwork_data_result = mysqli_fetch_array($artwork_data_query)){
            $ArtWorkID = $artwork_data_result['ArtWorkID'];
            $ArtistID = $artwork_data_result['ArtistID'];
            $ImageFileName = $artwork_data_result['ImageFileName'];
            $Title = $artwork_data_result['Title'];
            $Description = $artwork_data_result['Description'];
            $Excerpt = $artwork_data_result['Excerpt'];
            $ArtWorkType = $artwork_data_result['ArtWorkType'];
            $YearOfWork = $artwork_data_result['YearOfWork'];
            $Width = $artwork_data_result['Width'];
            $Height = $artwork_data_result['Height'];
            $Medium = $artwork_data_result['Medium'];
            $OriginalHome = $artwork_data_result['OriginalHome'];
            $GalleryID = $artwork_data_result['GalleryID'];
            $Cost = $artwork_data_result['Cost'];
            $MSRP = $artwork_data_result['MSRP'];
            $ArtWorkLink = $artwork_data_result['ArtWorkLink'];
            $GoogleLink = $artwork_data_result['GoogleLink'];
        }
        $artist_data = "select * from artists where ArtistID='".$ArtistID."'";
        $artist_data_query = mysqli_query($mysqli, $artist_data);
        while($artist_data_result = mysqli_fetch_array($artist_data_query)){
            $FirstName =  $artist_data_result['FirstName'];
            $LastName =  $artist_data_result['LastName'];
            $Nationality =  $artist_data_result['Nationality'];
            $YearOfBirth =  $artist_data_result['YearOfBirth'];
            $YearOfDeath =  $artist_data_result['YearOfDeath'];
            $Details =  $artist_data_result['Details'];
            $ArtistLink =  $artist_data_result['ArtistLink'];
        }
    }
    else{
        // error number 2 -> unknown artwork id
        header('Location:error.php?error_no=2');
    }
}
else {
    // error number 3 -> artwork id not given
    header('Location:error.php?error_no=3');
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
                            <li class="active"><a href="Part03_SingleWork.php?id=394">Single Work (Part 3)</a></li>
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
            <h1><?php echo $Title; ?></h1>
            <p>By <?php echo "<a href='Part02_SingleArtist.php?id=".$ArtistID."'>".$FirstName." ". $LastName."</a>"; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <img class="img-responsive img-thumbnail" onclick="showmodal()"
                 src="<?php echo 'images/art/works/medium/'.$ImageFileName.'.jpg'?>">
        </div>
        <div class="col-md-6">
            <?php echo $Description; ?>
            <br>
            <h4><strong><?php echo"<span class='cost'>$".
                    number_format($MSRP, 2 ,"." ,"," )."</span>"; ?></strong></h4>
            <br>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-gift text-primary"></span>
                    <span class="text-primary">Add To Wish List</span>
                </button>
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-shopping-cart text-primary"></span>
                    <span class="text-primary">Add To Shopping Cart</span>
                </button>
            </div>
            <br><br>
            <div class="panel panel-default">
                <div class="panel-heading"> Product Details</div>
                <table class="table">
                    <tr>
                        <th>Date: </th>
                        <td><?php echo $YearOfWork; ?> </td>
                    </tr>
                    <tr>
                        <th>Medium: </th>
                        <td><?php echo $Medium; ?> </td>
                    </tr>
                    <tr>
                        <th>Dimensions: </th>
                        <td><?php echo $Width."cm x ".$Height."cm"; ?> </td>
                    </tr>
                    <tr>
                        <th>Home: </th>
                        <td><?php echo $OriginalHome; ?> </td>
                    </tr>
                    <tr>
                        <th>Genres: </th>
                        <td>
                            <?php
                            $genre_sql = "select * from artworkgenres where ArtWorkID='".$ArtWorkID."'";
                            $genre_query = mysqli_query($mysqli, $genre_sql);
                            while($genre_data = mysqli_fetch_array($genre_query)){
                                $genre_sql1 = "select * from genres where GenreID='".$genre_data['GenreID']."'";
                                $genre_query1 = mysqli_query($mysqli, $genre_sql1);
                                while($genre_data1 = mysqli_fetch_array($genre_query1)){
                                    echo "<a href='#'>".$genre_data1['GenreName']."</a><br>";
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Subjects: </th>
                        <td>
                            <?php
                            $subject_sql = "select * from artworksubjects where ArtWorkID='".$ArtWorkID."'";
                            $subject_query = mysqli_query($mysqli, $subject_sql);
                            while($subject_data = mysqli_fetch_array($subject_query)){
                                $subject_sql1 = "select * from subjects where SubjectID='".$subject_data['SubjectID']."'";
                                $subject_query1 = mysqli_query($mysqli, $subject_sql1);
                                while($subject_data1 = mysqli_fetch_array($subject_query1)){
                                    echo "<a href='#'>".$subject_data1['SubjectName']."</a><br>";
                                }
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel panel-info">
                <div class="panel-heading">Sales</div>
                <div class="panel-body">
                    <?php
                    $order_sql = "select * from orderdetails where ArtWorkID='".$ArtWorkID."'";
                    $order_query = mysqli_query($mysqli, $order_sql);
                    while($order_data = mysqli_fetch_array($order_query)){
                        $order_sql1 = "select * from orders where OrderID='".$order_data['OrderID']."'";
                        $order_query1 = mysqli_query($mysqli, $order_sql1);
                        while($order_data1 = mysqli_fetch_array($order_query1)){
                            echo "<a href='#'><p>".$new_date = date('n/d/Y', strtotime($order_data1['DateCreated']))."</p></a>";
                        }
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"><?php echo $Title . " By " . $FirstName. " ". $LastName; ?></h3>
            </div>
            <div class="modal-body">
                <img class="img-responsive" style="width: 100%;"
                     src="<?php echo 'images/art/works/medium/'.$ImageFileName.'.jpg'?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    function showmodal() {
        $(".modal").modal('show');
    }
</script>
</body>
</html>
