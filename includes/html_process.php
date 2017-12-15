<?php
function CSS_Header($title) {
    $css = '';
    $css .= '<title>'.$title.'</title>';
    $css .= '<meta charset="utf-8">';
    $css .= '<meta name="viewport" content="width=device-width, initial-scale=1">';
    $css .= '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />';
    $css .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>';
    $css .= '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
    $css .= '<link rel="stylesheet" href="css/style.css" />';
    return $css;
}
function Footer_Text(){
    $text = '';
    $text .= "Double Dusty Positive Incorporated";
    $text .= "<br>1111 Wookie Way";
    $text .= "<br>&copy; Copyright ".date('Y').' ';
    return $text;
}


?>