<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <title>Fake Database</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/ico/favicon.ico">
    </head><!--/head-->

    <body>
        <?php
        include 'Sailor_Boat.php';
        if (!isset($_SESSION['list'])) {
            $_SESSION['list'] = array();
            $obj1 = new Sailor_Boat("Anisha", "Singh", "Cataline", "Auto", "225", "1980", "false", "A2");
            $obj2 = new Sailor_Boat("Vinit", "Singh", "Hunter", "Mannual", "345", "1990", "false", "A7");
            $obj3 = new Sailor_Boat("Vinit", "Kumar", "Hunter", "Mannual", "345", "1990", "false", "A5");
            $obj4 = new Sailor_Boat("Vinit", "Singh", "Cataline", "Mannual", "309", "1999", "false", "A4");
            $obj5 = new Sailor_Boat("Anisha", "Narayan", "Cataline", "Auto", "165", "1990", "true", "A3");


            array_push($_SESSION['list'], $obj1, $obj2, $obj3, $obj4, $obj5);
        }

        // put your code here
        ?>
        <div class="container">

            <div class="row">
                <div class="col col-lg-12 col-md-12 col-sm-12">
                    <h2 class="text-center text-primary">Assignment</h2>
                    <div class="container">
                        <div class="row">
                            <div class="col col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12">
                                <div class="row">
                                    <div class="col col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <button type="button" class="btn btn-primary" onclick="fetchAllRecords()">SHOW ALL</button>
                                    </div>
                                    <div class="col col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <a href="add.php" class="btn btn-success ">ADD</a>
                                    </div>
                                    <div class="col col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <input type="text" class="form-control" name="searchName" id="searchName" placeholder="Search with First Name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-hover" id="boatList">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Boat Type</th>
                                    <th>Boat Motor</th>
                                    <th>Boat Length</th>
                                    <th>Boat Built</th>
                                    <th>Payment</th>
                                    <th>Page</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <div class="row marT50 marB50" id="updateHolder">
                            <h2>UPDATE</h2>
                            <div class="col col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12">
                                <form novalidate>
                                    <input type="hidden" class="form-control" name="id" id="id">
                                    <div class="form-group">
                                        <label for="firstName">First Name : </label>
                                        <input type="text" class="form-control" name="firstName" id="firstName">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastName">Last Name : </label>
                                        <input type="text" class="form-control" name="lastName" id="lastName">
                                    </div>
                                    <div class="form-group">
                                        <label for="boatType">Sailboat Type :</label>
                                        <select class="form-control" id="boatType">
                                            <option value="Cataline" name="boatType">Cataline</option>
                                            <option value="Hunter" name="boatType">Hunter</option>
                                            <option value="Morgan" name="boatType">Morgan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="boatMotor">Sailboat Motor Type :</label>
                                        <input type="text" class="form-control" name="boatMotor" id="boatMotor" >
                                    </div>

                                    <div class="form-group">
                                        <label for="boatLength">Length :</label>
                                        <input type="text" class="form-control" name="boatLength" id="boatLength">
                                    </div>
                                    <div class="form-group">
                                        <label for="boatBuilt">Built :</label>
                                        <input type="text" class="form-control" name="boatBuilt" id="boatBuilt">
                                    </div>
                                    <div class="form-group">
                                        <label for="boatPayment">Current slip payment :</label>
                                        <select class="form-control" id="boatPayment">
                                            <option value="true" name="boatPayment" selected>Paid</option>
                                            <option value="false" name="boatPayment">Not Paid</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="page">Page :</label>
                                        <select class="form-control" id="page">
                                            <option value="A1" name="page">A1</option>
                                            <option value="A2" name="page">A2</option>
                                            <option value="A3" name="page">A3</option>
                                            <option value="A4" name="page">A4</option>
                                            <option value="A5" name="page">A5</option>
                                            <option value="A6" name="page">A6</option>
                                            <option value="A7" name="page">A7</option>
                                            <option value="A8" name="page">A8</option>
                                            <option value="A9" name="page">A9</option>
                                            <option value="A10" name="page">A10</option>
                                            <option value="A11" name="page">A11</option>
                                            <option value="A12" name="page">A12</option>
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-default" id="updateDetail">Submit</button>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
            <script type="text/javascript" src="js/main.js"></script>   
    </body>
</html>
