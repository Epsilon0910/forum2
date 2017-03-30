<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Sign Up</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
        <!--        bootstrap files-->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        <!--header-->
        <div class="container-fluid text-center header">
            <h1>Company</h1>
        </div>
        <!--form-->
        <div class="container text-center signupform">
            <div class="container-fluid" id="signupwithfb">
                <button  type="button" class="btn btn-default col-xs-12" id="signupwithfb-btn"><a href="#">SIGN UP WITH FACEBOOK</a></button>
                <p style="margin-top: 10px">OR</p>
            </div>
            <h4>Sign up with your email address</h4>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="form-group ">
                    <input type="text" class="form-control" id="fname" placeholder="Enter First Name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="lname" placeholder="Enter Last Name">
                    <span class="error">* <?php echo $nameErr;?></span>
                </div>
                <div class="row">
                    <div class="form-group col-xs-5">
                        <select class="form-control" id="semester">
                            <option>Select Semester</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                        </select>
                    </div>
                    <div class="form-group col-xs-7">
                        <select class="form-control" id="branch">
                            <option>Select Your Branch</option>
                            <option>CS</option>
                            <option>IT</option>
                            <option>EC</option>
                            <option>ME</option>
                            <option>CE</option>
                            <option>EX</option>
                            <option>AU</option>
                            <option>PC</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="enroll" placeholder="Enter Enroll Number">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" placeholder="Enter Email Address">
                </div>
                <div class="form-group" id="password">
                    <input type="password" class="form-control" id="pwd" placeholder="Choose Password">
                </div>
                <div class="form-group" id="confirmpassword">
                    <input type="password" class="form-control" id="pwd" placeholder="Confirm Password">
                </div>
                <div class="checkbox" id="shareinfo">
                    <label>
                        <input type="checkbox" value="">Share my registration data with Company's content providers for marketing purposes.
                    </label>
                </div>
                <div class="container-fluid" id="termscondition">
                    <p>By clicking on Sign up, you agree to Company's <a href="#">terms & conditions</a> and <a href="#">privacy policy</a></p>
                </div>
                <button type="submit" class="btn btn-default col-xs-12" id="signup-btn">SIGN UP</button>
                <div class="container-fluid" id="accountexist">
                    <p>Already have an account? <a href="#">Log in</a></p>
                </div>
            </form>
        </div>
    </body>
</html>
