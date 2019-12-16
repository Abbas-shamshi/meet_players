<?php
require_once("config.php");
require_once("functions.php");

if(isUserLoggedIn()) {
	header("Location: profile.php");
	die();
}
if (!empty($_POST)) {
    $errors = array();

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if ($username == "") {
        $errors["a"] = "*Enter valid User Name";
    } else {
        $errors["a"] = "";
    }



    if ($password == "") {
        $errors["b"] = "*Enter password";
    } else {
        $errors["b"] = "";
    }
    // echo count($errors);
    //End data validation
    if ($errors["a"] == "" and $errors["b"] == "") {
        $user = FetchUserDetails($username, $password);
        if ($user == "") {
            $errors["a"] = "*Invalid User Name";
        } elseif ($password != $user['user_password']) {
            $errors["b"] = "*Invalid Password";
        } else {
            $loggedInUser = new loggedInuser();
            $loggedInUser->email = $user["email"];
            $loggedInUser->user_id = $user["userid"];
            $loggedInUser->hash_pw = $user["user_password"];
            $loggedInUser->first_name = $user["firstname"];
            $loggedInUser->last_name = $user["lastname"];
            $loggedInUser->username = $user["username"];
            $loggedInUser->member_since = $user["member_since"];

            //pass the values of $loggedInUser into the session -
            // you can directly pass the values into the array as well.

            $_SESSION["ThisUser"] = $loggedInUser;
            header("Location: profile.php");
            exit;
        }
        // print_r($errors);


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

    <div class="col-lg-6 col-md-6 col-sm-12 col-sm-12 m-auto">
        <div class="meet-tag2">
            <h1>MeetPlayers</h1>
            <h4>Connect with Players around you.</h4>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-sm-12">
        <div class="block2">

            <h1>Log IN</h1>
            <h4>Sign into your Profile</h4>
            <div>
                <form id="contactform" action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
                    <input type="text" id="u_name" name="username" value="" class="form-control" placeholder="User Name">
                    <span class="error" id="u_name_err">
                        <?php if (!empty($_POST)) {
                            echo $errors["a"];
                        } ?>
                    </span>
                    <input type="password" name="password" value="" class="form-control" placeholder="Password">
                    <span class="error" id="password_err">
                        <?php if (!empty($_POST)) {
                            echo $errors["b"];
                        } ?>
                    </span>

                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12 col-sm-12">
                            <button type="submit" id="submit" name="submit">Log In
                                <i class="fas fa-user" aria-hidden="true"></i>
                            </button>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-sm-4 m-auto">
                            <div class="or">OR</div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-sm-12 m-auto abutton">
                            <a href="register.php" class="float-right">Register
                                <i class="fas fa-user-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<?php
require_once("footer.php");

?>