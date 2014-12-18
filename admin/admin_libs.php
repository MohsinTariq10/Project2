<?php

function is_admin(){
    if(!isset($_SESSION['userdata'])) return false;
    // implement admin logic here
}
