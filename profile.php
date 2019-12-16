<?php
require_once("config.php");
require_once("functions.php");

$errors = array("a" => "", "b" => "", "c" => "", "d" => "", "e" => "", "f" => "");
global $loggedInUser;
$ThisUserId = $loggedInUser->user_id;
if (isUserLoggedIn()) {

    // $errors=array("f"=>"");
    if (!empty($_POST)) {
        $errors = array();
        $profile_name = trim($_POST["profile_name"]);

        $age = trim($_POST["age"]);
        $height = trim($_POST["height"]);
        $weight = trim($_POST["weight"]);
        $gender = trim($_POST["gender"]);
        $sport = trim($_POST["sport"]);
        $location = trim($_POST["location"]);
        $howoften = trim($_POST["howoften"]);


        $profile = InsertProfile($profile_name, $age, $height, $weight, $gender, $sport, $location, $howoften, $ThisUserId);
        // echo "user name created";
        // print_r($errors);

        if ($profile == 1) {
            header("Location: profilepic.php");
        }
        // }
        /* if (count($errors) == 0) {
        $successes[] = "registration successful";
        echo count($errors);

    } */
    }
} else {
    header("Location: login.php");
	die();
 }

require_once("head.php");

require_once("header.php");
?>
<div class="row">


    <div class="col-lg-6 col-md-6 col-sm-12 col-sm-12 m-auto profile">
        <fieldset>
            <legend class="profile-tag">
                <h1>Your Profile</h1>
            </legend>
            <form id="profileform" action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
                <div class="profile-data">
                    <table>
                        <tr>
                            <th>Profile Name</th>
                            <td> <input type="text" id="age" name="profile_name" value="" class="form-control mb-0" placeholder="Save Profile Name">
                            </td>
                        </tr>
                        <tr>
                            <th>Age</th>
                            <td> <input type="text" id="age" name="age" value="" class="form-control mb-0" placeholder="Your Age">
                            </td>
                        </tr>
                        <tr>
                            <th>Height</th>
                            <td> <input type="text" id="height" name="height" value="" class="form-control mb-0" placeholder="Your Height">
                            </td>
                        </tr>
                        <tr>
                            <th>Weight</th>
                            <td> <input type="text" id="weight" name="weight" value="" class="form-control mb-0" placeholder="Your Weight">
                            </td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td> <input type="radio" name="gender" value="male" checked> Male
                                <input type="radio" class="ml-5" name="gender" value="female"> Female
                                <input type="radio" class="ml-5" name="gender" value="other"> Other
                            </td>
                        </tr>
                        <tr>
                            <th>What You Play</th>
                            <td> <select name=sport>
                                    <option value="Football">Football</option>
                                    <option value="Basketball">Basket Ball</option>
                                    <option value="Soccer">Soccer</option>
                                    <option value="Rugby">Rugby</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <td> <input type="text" id="location" name="location" value="" class="form-control mb-0" placeholder="Where are you located">
                            </td>
                        </tr>
                        <tr>
                            <th>How often you play</th>
                            <td> <input type="text" id="howoften" name="howoften" value="" class="form-control mb-0" placeholder="How often you play">
                            </td>
                        </tr>
                        <!-- <tr>
                            <th>Locate</th>
                            <td> <input type="text" id="email" name="email" value="" class="form-control mb-0" placeholder="Email">
                            </td>
                        </tr>
                        <tr>
                            <th>What You Play</th>
                            <td> <input type="text" id="email" name="email" value="" class="form-control mb-0" placeholder="Email">
                            </td>
                        </tr> -->

                    </table>

                    <div class="button">
                        <button type="submit" id="submit" class="btn-width" name="submit">Submit
                            <i class="fas fa-server" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </form>
        </fieldset>
    </div>

</div>
<?php
require_once("footer.php");

?>