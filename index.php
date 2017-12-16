<!DOCTYPE html>
<?php
// DoublePositive Code evaluation
// Author: dustin horning
// Date: 12.14.2017
date_default_timezone_set('America/New_York');
include('includes/html_process.php');
// Okay, so this is some of the CRUD classes i made for a project, i know they should probably be a bit more granular, but i need to meet deadlines etd (you get it lol)
require('app-library/classes.sql.php');
// instantiate vars to avoid warnings
$order_num = '';
// Set a var for order num
if(isset($_POST['order_number'])):
    $order_num = $_POST['order_number'];
endif;
?>
<html lang="en">
    <head>
        <?=CSS_Header('doublepositive')?>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="#">Dusty's Store</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Buttons</a></li>
                        <li><a href="#">That Do</a></li>
                        <li><a href="#">Nothing</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello Matt!<br></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid text-center">
            <div class="row content">
                <div class="col-sm-2 sidenav">
                    <div class="well">
                        <p>Good news everybody!</p>
                        <img class='logo-small' src='images/planetexpress.png'>
                    </div>
                    <div class="well">
                        <p>The empire needs YOU! <br>Now with Flavor!</p>
                        <img class='logo-small' src='images/bachelor.jpeg'>
                    </div>
                    <div class="well">
                        <p>Tune in at 7 eastern!</p>
                        <img class='logo-small' src='images/futurama_hypnotoad.jpg'>
                    </div>
                </div>
                <div class="col-sm-8 text-left">
                    <h1>Order Review: </h1>
                    <hr>
                    <h3>Check Your Orders:</h3>
                    <div style='min-height: 600px; margin-bottom: 50px;'>
                        Please Choose your order
                        <form method='post' action=''>
                            <div style='width: 320px; margin-bottom: 20px;'>
                                <?=Pick_order_Number_DD("order_number","dd-arr dir-control sub-ttle")?>
                            </div>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Continue Shopping</button>
                            <button type="submit" class="btn btn-primary submitBtn">Submit</button>
                        </form>
                        <?php 
                        if(isset($_POST['order_number'])):

                            // Since this query is a bit more complicated than 'select x x x from table' then i am going to use the override to add the query in
                            $item_getter = New SQL_Select("Select order_date, shipping_address, num_items, Description, Image_name from orders as a join order_item as b on a.order_id = b.order_id join items as c on c.item_id = b.item_id where a.order_id = '".$order_num."';",'','', '','','');
                            $item_getter->Connect_DB_execute_Close();
                            $items_assoc_array = $item_getter->records_arr;
                            $num_of_rows = count($items_assoc_array);
                            echo '<h1>Order No: '.$_POST['order_number'].'</h1>';
                            for($i = 0; $i < count($items_assoc_array); $i++) {
                                echo "<hr>";
                                echo('<h4> Order Date: '.$items_assoc_array[$i]['order_date']).'</h4><br>';
                                echo('<h4> Shipping Address: '.$items_assoc_array[$i]['shipping_address']).'</h4><br>';
                                echo('<h4> Number of Items: '.$items_assoc_array[$i]['num_items']).'</h4><br>';
                                echo('<h4> Description: '.$items_assoc_array[$i]['Description']).'</h4><br>';
                                echo('<div><img style="max-width: 25%;" src="items-images/'.$items_assoc_array[$i]['Image_name']).'" /></div>';
                            }
                        endif;
                        ?>
                    </div>
                </div>
                <div class="col-sm-2 sidenav">
                    <div class="well">
                        <p>Try Gunderson's nuts!</p>
                        <img class='logo-small' src='images/gundersons.jpg'>
                    </div>
                    <div class="well">
                        <p>The empire needs YOU! <br>Enlist today!</p>
                        <img class='logo-small' src='images/enlist.jpg'>
                    </div>
                    <div class="well">
                        <p>Powered by Pied Piper!</p>
                        <img class='logo-small' src='images/pied-piper-box.png'>
                    </div>
                </div>
            </div>
        </div>
        <footer class="container-fluid text-center">
            <?=Footer_Text()?>
        </footer>
    </body>
</html>