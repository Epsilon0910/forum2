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
        <?php
        // define variable and set to empty values
        $errors = array();
        $fnameErr = $lnameErr = $semErr = $branchErr = $enrollErr = $passwordErr = $cpasswordErr = "";
        $fname = $lname = $sem = $branch = $enroll = $password = $cpassword = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //validations for first name
            if (empty($_POST["fname"])){
                $fnameErr = "Please enter your first name.";
                $errors['fname'] = "Please enter your first name.";
            }else{
                $fname = test_input($_POST["fname"]);
                //check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
                    $fnameErr = "Only letters and white space allowed";
                    $errors['fname'] = "Only letters and white space allowed";
                }
            }

            //validations for last name
            if (empty($_POST["lname"])){
                $lnameErr = "Please enter your last name.";
                $errors['lname'] = "Please enter your last name.";
            }else{
                $lname = test_input($_POST["lname"]);
                //check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
                    $lnameErr = "Only letters and white space allowed";
                    $errors['lname'] = "Only letters and white space allowed";
                }
            }

            //validations for semester
            if (empty($_POST["sem"])){
                $semErr = "Please choose your semester.";
                $errors['sem'] = "Please choose your semester.";
            }else{
                $sem = test_input($_POST["sem"]);
            }

            //validations for branch
            if (empty($_POST["branch"])){
                $branchErr = "Please choose your branch.";
                $errors['branch'] = "Please choose your branch.";
            }else{
                $branch = test_input($_POST["branch"]);
            }

            //validations for Enroll number
            if (empty($_POST["enroll"])){
                $enrollErr = "Please enter your enroll number";
                $errors['enroll'] = "Please enter your enroll number";
            }else{
                $enroll = test_input($_POST["enroll"]);
            }

            //validations for email address
            if (empty($_POST["email"])){
                $emailErr = "Please enter your email.";
                $errors['email'] = "Please enter your email.";
            }else{
                $email = test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                    $errors['email'] = "Invalid email format";
                }
            }

            //validates for passwprd and confirm password
            if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["cpassword"])) {
                $password = test_input($_POST["password"]);
                $cpassword = test_input($_POST["cpassword"]);
                if (strlen($_POST["password"]) <= '8') {
                    $passwordErr = "Your Password Must Contain At Least 8 Characters!";
                    $errors['password'] = "Your Password Must Contain At Least 8 Characters!";
                }
                elseif(!preg_match("#[0-9]+#",$password)) {
                    $passwordErr = "Your Password Must Contain At Least 1 Number!";
                    $errors['password'] = "Your Password Must Contain At Least 1 Number!";
                }
                elseif(!preg_match("#[A-Z]+#",$password)) {
                    $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
                    $errors['password'] = "Your Password Must Contain At Least 1 Capital Letter!";
                }
                elseif(!preg_match("#[a-z]+#",$password)) {
                    $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
                    $errors['password'] = "Your Password Must Contain At Least 1 Lowercase Letter!";
                }
            }
            elseif(!empty($_POST["password"])) {
                $cpasswordErr = "Please Check You've Entered Or Confirmed Your Password!";
                $errors['cpassword'] = "Please Check You've Entered Or Confirmed Your Password!";
            }
        }

        if(!$errors){
            $servername = "localhost";
            $username = "root";
            $password = "123123";
            $dbname = "myDB";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO MyGuests (fname, lname, semester, branch, enroll, email, password)
                VALUES ()";
                // use exec() because no results are returned
                $conn->exec($sql);
                echo "New record created successfully";
                }
            catch(PDOException $e)
                {
                echo $sql . "<br>" . $e->getMessage();
                }

            $conn = null;
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            }
         ?>
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
                    <input required="required" type="text" class="form-control" id="fname" value="<?php echo $fname;?>" placeholder="Enter First Name">
                     <span class="error"><?php echo $fnameErr;?></span>
                </div>
                <div class="form-group">
                    <input required="required" type="text" class="form-control" id="lname" value= "<?php echo $lname;?>" placeholder="Enter Last Name">
                    <span class="error"><?php echo $lnameErr;?></span>
                </div>
                <div class="row">
                    <div class="form-group col-xs-5">
                        <select class="form-control" required="required" id="semester">
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
                        <select class="form-control" required="required" id="branch">
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
                    <input required="required" type="text" class="form-control" id="enroll" value="<?php echo $enroll;?>" placeholder="Enter Enroll Number">
                    <span class="error" id="err"><?php echo $enrollErr;?></span>
                </div>
                <div class="form-group">
                    <input type="email" required="required" class="form-control" id="email" value="<?php echo $email;?>" placeholder="Enter Email Address">
                    <span class="error"><?php echo $emailErr;?></span>
                </div>
                <div class="form-group" id="password">
                    <input type="password" required="required" class="form-control" id="pwd" value="<?php echo $password;?>" placeholder="Choose Password">
                    <span class="error"><?php echo $passwordErr;?></span>
                </div>
                <div class="form-group" id="confirmpassword">
                    <input type="password" required="required" class="form-control" id="pwd"  placeholder="Confirm Password">
                    <span class="error"><?php echo $cpasswordErr;?></span>
                </div>
                <!-- <div class="checkbox" id="shareinfo">
                    <label>
                        <input type="checkbox" value="">Share my registration data with Company's content providers for marketing purposes.
                    </label>
                </div> -->
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
