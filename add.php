<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <title>Home</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/ico/favicon.ico">
    </head><!--/head-->

    <body>
        <div class="container">

            <div class="row">
                <div class="col col-lg-12 col-md-12 col-sm-12">
                    <h2 class="text-center text-primary">ADD RECORD</h2>
                    <div class="container">
                        <div class="row">
                            <div class="col col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12">
                                <a href="index.php" class="btn btn-primary "><h2>HOME</a>
                            </div>
                        </div>

                        <div class="row marT50 marB50">
                            <div class="col col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12">
                                <form novalidate>
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
                                            <option value="Cataline" name="boatType" selected>Cataline</option>
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
                                            <option value="A1" name="page" selected>A1</option>
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
                                    <button type="button" class="btn btn-default" id="submitDetail">Submit</button>
                                </form>
                            </div>
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
