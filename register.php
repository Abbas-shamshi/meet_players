<?php
require_once("config.php");
require_once("functions.php");

$errors = array("a" => "", "b" => "", "c" => "", "d" => "", "e" => "", "f" => "");
// $errors=array("f"=>"");
if (!empty($_POST)) {
    $errors = array();

    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);
    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $password = trim($_POST["password"]);
    $confirm_pass = trim($_POST["c_password"]);

    if ($username == "") {
        $errors["a"] = "*Enter valid User Name";
    } else {
        $errors["a"] = "";
    }

    if ($firstname == "") {
        $errors["b"] = "*Enter valid first name";
    } else {
        $errors["b"] = "";
    }

    if ($lastname == "") {
        $errors["c"] = "*Enter valid last name";
    } else {
        $errors["c"] = "";
    }
    if ($email == "") {
        $errors["d"] = "*Enter valid Email address";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // print_r($_POST["email"]);die;            
        $errors["d"] = "*Invalid email format";
    } else {
        $errors["d"] = "";
    }



    if ($password == "" && $confirm_pass == "") {
        $errors["e"] = "*Enter password";
        $errors["f"] = "";
    } else if ($password != $confirm_pass) {
        $errors["e"] = "";
        $errors["f"] = "*Passwords do not match";
    } else {
        $errors["f"] = "";
        $errors["e"] = "";
    }
    // echo count($errors);
    //End data validation
    if ($errors["a"] == "" and $errors["b"] == "" and $errors["c"] == "" and $errors["d"] == "" and $errors["e"] == "" and $errors["f"] == "") {
        $user = createUser($username, $firstname, $lastname, $email, $password);
        // echo "user name created";
        // print_r($errors);
        if ($user <> 1) {
            $errors[] = "registration error";
        }
    }
    // if (count($errors) == 0) {
    //     $successes[] = "registration successful";
    //     echo count($errors);

    // }
}

require_once("head.php");

require_once("header.php");
?>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-sm-12">
        <div class="block1">

            <h1>Register</h1>
            <h4>Create your Profile</h4>
            <div>
                <form id="contactform" action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
                    <input type="text" id="u_name" name="username" value="" class="form-control" placeholder="User Name">
                    <span class="error" id="u_name_err">
                        <?php echo $errors["a"]; ?>
                    </span>
                    <input type="text" id="f_name" name="firstname" value="" class="form-control" placeholder="First Name">
                    <span class="error" id="f_name_err">
                        <?php echo $errors["b"]; ?>
                    </span>
                    <input type="text" id="l_name" name="lastname" value="" class="form-control" placeholder="Last Name">
                    <span class="error" id="l_name_err">
                        <?php echo $errors["c"]; ?>
                    </span>
                    <input type="text" id="email" name="email" value="" class="form-control" placeholder="Email">
                    <span class="error" id="email_err">
                        <?php echo $errors["d"]; ?>

                    </span>
                    <input type="text" name="password" value="" class="form-control" placeholder="Password">
                    <span class="error" id="password_err">
                        <?php echo $errors["e"]; ?>

                    </span>
                    <input type="password" name="c_password" value="" class="form-control" placeholder="Confirm Password">
                    <span class="error" id="c_password_err">
                        <?php echo $errors["f"]; ?>

                    </span>
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12 col-sm-12">
                            <button type="submit" id="submit" name="submit">Register
                                <i class="fas fa-user-plus" aria-hidden="true"></i>
                            </button>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-sm-4 m-auto">
                            <div class="or">OR</div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-sm-12 m-auto login">
                            <a href="login.php" class="">Log In
                                <i class="fas fa-user" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-sm-12 m-auto">
        <div class="meet-tag">
            <h1>MeetPlayers</h1>
            <h4>Connect with Players around you.</h4>
        </div>
    </div>

</div>
<?php
require_once("footer.php");

?>