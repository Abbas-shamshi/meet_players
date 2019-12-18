<?php
require_once("config.php");
require_once("functions.php");
require_once("head.php");
require_once("header.php");
if (!empty($_POST['sport'])) {
    $searchquery = $_POST['sport'];

    $profiles = fetchSearcProfilessport($searchquery);
}
else{
    $searchquery = $_POST['spo'];
    $profiles = fetchSearcProfilessport($searchquery);

}

?>
<div class="row">
    <div class="col-lg-2 col-md-2 col-sm-12 col-sm-12 margin-top">
        <h3>Search</h3>
        <form id="search" action="searchfname.php" method="post">
            <div class="profile-data">
                <p>
                    <label>first name:</label>
                    <input type="text" name="fname" />
                </p>
                <p>
                    <label>&nbsp;</label>
                    <input type="submit" value="search" class="submit" />
                </p>
            </div>
        </form>
        <form id="search" action="searchlname.php" method="post">
            <div class="profile-data">
                <p>
                    <label>Last name:</label>
                    <input type="text" name="lname" />
                </p>
                <p>
                    <label>&nbsp;</label>
                    <input type="submit" value="search" class="submit" />
                </p>
            </div>
        </form>
        <form id="search" action="searchlocation.php ?>" method="post">
            <div class="profile-data">
                <p>
                    <label>Location:</label>
                    <input type="text" name="loc" />
                </p>
                <p>
                    <label>&nbsp;</label>
                    <input type="submit" value="search" class="submit" />
                </p>
            </div>
        </form>
        <form id="search" action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="profile-data">
                <p>
                    <label>Location:</label>
                    <input type="text" name="sport" />
                </p>
                <p>
                    <label>&nbsp;</label>
                    <input type="submit" value="search" class="submit" />
                </p>
            </div>
        </form>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-12 col-sm-12 margin-top">
        <?php $i = 0;
                                    foreach ($profiles as $profile) {
                                        $i++;
        ?>

            <div class=" container card ">
                <a href="fullProfile.php?pro_id=<?php print $profile['id'] ?>">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-sm-12 card-img">

                            <img src="a.jpg" alt="Avatar" style="width:100%">



                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-12 col-sm-12">



                            <div class="p_container">
                                <h4><b><?php print $profile['firstname'] . " ";
                                                print $profile['lastname'] ?></b></h4>
                                <!-- <div class="flex">
                            <div class="flex_child1">Sport: Football</div>
                            <div class="flex_child2">position: Defender</div>
                        </div>
                        <div class="flex">
                            <div class="flex_child1">College: Pace</div>
                            <div class="flex_child2">team: Setters</div>
                        </div> -->
                                <div class="flex">
                                    <div class="">
                                        <p>Sport: <?php print $profile['sport'] ?></p>
                                        <!-- <p>College: <?php print $profile['college'] ?></p> -->
                                        <p>Location: <?php print $profile['location'] ?></p>
                                        <!-- <p>Experience: <?php print $profile['experience'] ?></p> -->
                                        <!-- <p>Age: <?php print $profile['age'] ?></p> -->



                                    </div>
                                    <!-- <div class="flex_child2">
                                <div> </div>
                                <div></div>
                                <p></p>

                            </div> -->
                                    <div class="flex_child2">
                                        <p>position: <?php print $profile['position'] ?></p>
                                        <p>Team: <?php print $profile['team'] ?></p>
                                        <!-- <p>Gender: <?php print $profile['gender'] ?></p> -->
                                        <!-- <p>HowOften you play: <?php print $profile['howoften'] ?></p> -->

                                        <!-- <p>Height: <?php print $profile['height'] ?></p> -->



                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>


    </div>