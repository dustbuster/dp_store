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

// Pick_order_Number_DD("order_number","dd-arr dir-control sub-ttle");
function Order_Dropdown(){

}

$database = 'orders';
$user = 'root';
$password = 'dgfsty16';
$database_host = 'localhost';

function Pick_order_Number_DD($name,$class) {
    //connection information
    $s = "";
    $ret = "";
    include('connection_strings.php');
    $con = mysqli_connect($database_host, $user, $password);
    mysqli_select_db($con,$database) or die("cannot correct Username");
    $qu = "SELECT order_date, order_id FROM orders";
    $res = mysqli_query($con,$qu);
    // $ret .= "<option selected value=''>-</option>";
    while ($row = mysqli_fetch_assoc($res)):
        $order_num = $row['order_id'];
        $ret .= "<option value='$order_num'>$order_num</option>";
    endwhile;
    mysqli_close($con);
    ?>
    <select name="<?=$name?>" class="<?=$class?>">
        <option value="">-</option>
        <?=$ret?>
    </select>
    <?php
}
?>