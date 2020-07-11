<?php
require_once("config.php");
require_once("functions.php");
require_once("head.php");
require_once("header.php");
global $loggedInUser;
$ThisUserId = $loggedInUser->user_id;
if (isUserLoggedIn()) {
    $profiles = fetchprofiles($ThisUserId);
    $profile_name = fetchProfileName($ThisUserId);
?>
    <div class="row edit-block">
        <div class="col-lg-12 col-md-12 col-sm-6 col-sm-12">

            <h3>Edit Profile</h3>
        </div>
        <?php
        foreach ($profile_name as $profile) {
        ?>
            <div class="col-lg-4 col-md-4 col-sm-6 col-sm-12 pbutton">
                <a href="editProfile.php?profileid=<?php print $profile['profile_id'] ?>" class=""><?php print $profile['profilename'] ?>
                    <i class="fas fa-edit" aria-hidden="true"></i>
                </a>

            </div>
    <?php
                                                                                                }
                                                                                            } else {
                                                                                                header("Location: login.php");
                                                                                                die();
                                                                                            }

    ?><div class="col-lg-4 col-md-4 col-sm-6 col-sm-12 pbutton">
        <a href="profile.php" class="">Create New Profile
            <i class="fas fa-edit" aria-hidden="true"></i>
        </a>

    </div>

    </div>

    <?php

                                                                                            require_once("footer.php");
    ?>