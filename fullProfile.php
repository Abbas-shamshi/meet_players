<?php
require_once("config.php");
require_once("functions.php");
require_once("head.php");
require_once("header.php");
$profile_id=$_GET['pro_id'];

$profiles = fetchFullProfile($profile_id);
?>
<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12 col-sm-12 margin-top">
        <?php $i = 0;
        foreach ($profiles as $profile) {
            $i++;
        ?>

            <div class=" container card-profile ">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-sm-12 card-img mar-0">

                        <img src="a.jpg" alt="Avatar" style="width:100%">



                    </div>

                    <div class="col-lg-8 col-md-8 col-sm-12 col-sm-12">



                        <div class="fp_container">
                            <h3><b><?php print $profile['firstname'] . " ";
                                    print $profile['lastname'] ?></b></h3>
                            <!-- <div class="flex">
                            <div class="flex_child1">Sport: Football</div>
                            <div class="flex_child2">position: Defender</div>
                        </div>
                        <div class="flex">
                            <div class="flex_child1">College: Pace</div>
                            <div class="flex_child2">team: Setters</div>
                        </div> -->
                            <div class="flex">
                                <div class="flex-fullprofile">
                                    <div>
                                        <p>Sports</p>
                                    </div>
                                    <div>
                                        <p>College</p>
                                    </div>
                                    <div>
                                        <p>Location</p>
                                    </div>
                                    <div>
                                        <p>Experience</p>
                                    </div>
                                    <div>
                                        <p>Age</p>
                                    </div>
                                    <div>
                                        <p>position</p>
                                    </div>
                                    <div>
                                        <p>Team</p>
                                    </div>
                                    <div>
                                        <p>Gender</p>
                                    </div>
                                    <div>
                                        <p>HowOften you play:</p>
                                    </div>
                                    <div>
                                        <p>Height</p>
                                    </div>


                                </div>
                                <div class="flex-fullprofile margin-auto">
                                    <div>
                                        <p><?php print $profile['sport']?></p>
                                    </div>
                                    <div>
                                        <p><?php print $profile['college']?></p>
                                    </div>
                                    <div>
                                        <p><?php print $profile['location']?></p>
                                    </div>
                                    <div>
                                        <p><?php print $profile['experience']?></p>
                                    </div>
                                    <div>
                                        <p><?php print $profile['age']?></p>
                                    </div>
                                    <div>
                                        <p><?php print $profile['position']?></p>
                                    </div>
                                    <div>
                                        <p><?php print $profile['team']?></p>
                                    </div>
                                    <div>
                                        <p><?php print $profile['gender']?></p>
                                    </div>
                                    <div>
                                        <p><?php print $profile['howoften']?>:</p>
                                    </div>
                                    <div>
                                        <p><?php print $profile['height']?></p>
                                    </div>


                                </div>
                            </div>
                            <div class="achive">
                                <h3>Achivements</h3>
                                <ul>
                                <li><p><?php print $profile['achv_1']?></p></li>
                                <li><p><?php print $profile['achv_2']?></p></li>
                                <li><p><?php print $profile['achv_3']?></p></li>
                                <li><p><?php print $profile['achv_4']?></p></li>
                                <li><p><?php print $profile['achv_5']?></p></li>



                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


    </div>