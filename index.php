<!DOCTYPE html>
<?php
// DoublePositive Code evaluation
// Author: dustin horning
// Date: 12.14.2017
// I started off with a bootstrap template.
date_default_timezone_set('America/New_York');

// I name my function files after what they do, html <- content process <- it processes other code
include('includes/html_process.php');
// Okay, so this is some of the CRUD classes i made for a project, i know they should probably be a bit more granular, but i need to meet deadlines etd (you get it lol)
require('app-library/classes.sql.php');
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
                    <h1>Welcome to Dusty's Store! <br>Review Order</h1>
                    
                    <hr>
                    <h3>Test</h3>
                    <div style='height: 600px;'>
                        <form method='post' action=''>
                            <div style='width: 320px'>
                                <?=Pick_order_Number_DD("order_number","dd-arr dir-control sub-ttle")?>
                            </div>
                        </form>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Continue Shopping</button>
                        <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">Submit</button>
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