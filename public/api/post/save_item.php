<?php 

$title = $_POST['title'];
$details = $_POST['details'];

if(!$title){
    $output['errors'][] = "No title given.";
}

if(!$details){
    $output['errors'][] = "No details given.";
}

if(empty($output['errors'])){
    $query = "INSERT INTO `items` (`title`, `details`) VALUES('$title', '$details')";
    $result = mysqli_query($conn, $query);
    if(mysqli_affected_rows($conn) > 0){
        $output['success'] = true;
        $output['insertId'] = mysqli_insert_id($conn);
    } else {
        $output['errors'][] = 'Well you see what had happened was there was error instering the stuff to thing database';
    }
}
