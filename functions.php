<?php

//database connection
function connectDatabase($host, $user, $pass, $db) {
    $db = new mysqli($host, $user, $pass, $db);
    return $db;
}


$con = connectDatabase("localhost", "root", "", "group project");



function adminLogin($username, $password) {
    $con = connectDatabase("localhost", "root", "", "group project");
    $encrypt = md5($password);
    $sql="select * from admin where username = '$username' AND password = '$encrypt' AND status = '1'"; //create mySQL query
    $result = mysqli_query ($con,$sql) or die (mysqli_error ($con));
    $row = mysqli_fetch_assoc ($result);
    return $row;

}


function addEvent($data,$username) {
    $con = connectDatabase("localhost", "root", "", "group project");
    $name = $data['name'];
    $categories=  $data['categories'];
    $event_date=  $data['date'];
    $event_time = $data['time'];
    $avenue=  $data['avenue'];
    $description= $data['description'];
    $post_date=  date('y/m/d');
    $post_by =  $username;

//insert SQLquery
    $sql = "INSERT INTO event(name,event_categories,event_date,event_time,event_avenue,event_description,event_posted_date,event_posted_by) VALUES('$name','$categories','$event_date','$event_time','$avenue','$description','$post_date','$post_by')";
    
    if(mysqli_query($con,$sql)){
        $id = $con->insert_id;
        $result = $con->query("SELECT * FROM event WHERE id=$id;");
        return $result->fetch_assoc();
    }
    else{
        return false;
    }
}


function loadEvents($no) {
    $con = connectDatabase("localhost", "root", "", "group project");
    $result = $con->query("SELECT * FROM event ORDER BY id DESC LIMIT $no;");
    return $result;
}