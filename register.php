<?php
require_once("head.php");

require_once("header.php");
?>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-sm-12">
        <div class="block1">

            <h1>Register</h1>
            <h4>Create your Profile</h4>
            <div class="info">
                <form id="contactform" action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
                    <input type="text" id="u_name" name="u_name" value="" class="form-control" placeholder="User Name">
                    <span class="error" id="u_name_err"></span>
                    <input type="text" id="f_name" name="f_name" value="" class="form-control" placeholder="First Name">
                    <span class="error" id="f_name_err"></span>
                    <input type="text" id="l_name" name="l_name" value="" class="form-control" placeholder="Last Name">
                    <span class="error" id="l_name_err"></span>
                    <input type="text" id="email" name="email" value="" class="form-control" placeholder="Email">
                    <span class="error" id="email_err"></span>
                    <input type="text" name="password" value="" class="form-control" placeholder="Password">
                    <span class="error" id="password_err"></span>
                    <input type="password" name="c_password" value="" class="form-control" placeholder="Confirm Password">
                    <span class="error" id="c_password_err"></span>
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
                            <a href="" class="">Log In
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