<?php

require 'config.php';
require 'functions.php';
$conn =  connect($config);
if($conn){
    $users = get('courses',$conn);
    if ($users) {
        foreach ($users as $user) {
            // print_r($user);
        }
    }
}else{
    echo "Could not connect to the db.";
}

require 'views/index.view.php';
