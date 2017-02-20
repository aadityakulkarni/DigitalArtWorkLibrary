<?php
/**
 * Created by PhpStorm.
 * User: Aaditya
 * Date: 11/14/2016
 * Time: 4:08 PM
 */
include 'db_connect.php';

$filter = filter_input(INPUT_GET, 'filter', FILTER_SANITIZE_STRING);
$filter_value = filter_input(INPUT_GET, 'filter_value', FILTER_SANITIZE_STRING);

//echo "$filter $filter_value";
if($filter == 'title' && !empty($filter_value)){
    $filter_output = '';
    $filter_array = explode(" ",$filter_value);
    foreach($filter_array as $x){
        $filter_output .= "%".$x."%";
    }

    $title_sql = "select * from artworks where Title LIKE '".$filter_output."'";
    $output = '';
    $title_query = mysqli_query($mysqli, $title_sql);
    while($title_output = mysqli_fetch_array($title_query)){
        $title_name = $title_output['Title'];
        $title_description = $title_output['Description'];
       /* foreach($filter_array as $x){
            $title_highlight = str_replace($x,"<mark>$x</mark>", $title_description);
        }*/

        $title_ImageFileName = $title_output['ImageFileName'].".jpg";
        $title_ID = $title_output['ArtWorkID'];
        $output .=
            "<div class='row'>
                 <div class='col-md-2'>
                    <img src='images/art/works/square-medium/$title_ImageFileName' class='img-responsive'
                    style='width: 100%;' onclick='RedirectToPage(\"Part03_SingleWork.php?id=$title_ID\")'>
                </div>
                <div class='col-md-10'>
                    <h4><a href='Part03_SingleWork.php?id=$title_ID'>$title_name</a></h4>
                    <p>$title_description</p>
                </div>
            </div>
            <br>   
              ";
    }
    echo $output;
}
elseif ($filter == 'description' && !empty($filter_value)){
    $filter_output = '';
    $filter_array = explode(" ",$filter_value);
    foreach($filter_array as $x){
        $filter_output .= "%".$x."%";
    }

    $title_sql = "select * from artworks where Description LIKE '".$filter_output."'";
    $output = '';
    $title_query = mysqli_query($mysqli, $title_sql);
    while($title_output = mysqli_fetch_array($title_query)){
        $title_name = $title_output['Title'];
        $title_description = $title_output['Description'];
         foreach($filter_array as $x){
             $title_highlight = str_ireplace($x,"<mark>$x</mark>", $title_description);
         }

        $title_ImageFileName = $title_output['ImageFileName'].".jpg";
        $title_ID = $title_output['ArtWorkID'];
        $output .=
            "<div class='row'>
                 <div class='col-md-2'>
                    <img src='images/art/works/square-medium/$title_ImageFileName' class='img-responsive'
                    style='width: 100%;' onclick='RedirectToPage(\"Part03_SingleWork.php?id=$title_ID\")'>
                </div>
                <div class='col-md-10'>
                    <h4><a href='Part03_SingleWork.php?id=$title_ID'>$title_name</a></h4>
                    <p>$title_highlight</p>
                </div>
            </div>
            <br>   
              ";
    }
    echo $output;

}
elseif ($filter == 'nofilter' && !empty($filter_value)){
/*    $filter_output = '';
    $filter_array = explode(" ",$filter_value);
    foreach($filter_array as $x){
        $filter_output .= "%".$x."%";
    }*/

    $title_sql = "select * from artworks";
    $output = '';
    $title_query = mysqli_query($mysqli, $title_sql);
    while($title_output = mysqli_fetch_array($title_query)){
        $title_name = $title_output['Title'];
        $title_description = $title_output['Description'];
        $title_ImageFileName = $title_output['ImageFileName'].".jpg";
        $title_ID = $title_output['ArtWorkID'];
        $output .=
            "<div class='row'>
                 <div class='col-md-2'>
                    <img src='images/art/works/square-medium/$title_ImageFileName' class='img-responsive'
                    style='width: 100%;' onclick='RedirectToPage(\"Part03_SingleWork.php?id=$title_ID\")'>
                </div>
                <div class='col-md-10'>
                    <h4><a href='Part03_SingleWork.php?id=$title_ID'>$title_name</a></h4>
                    <p>$title_description</p>
                </div>
            </div>
            <br>   
              ";
    }
    echo $output;

}
else {
    $output = "0";
    echo $output;
}


?>
