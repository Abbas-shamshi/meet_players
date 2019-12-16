<?php

function createUser($username, $firstname, $lastname, $email, $password)
{
    global $mysqli;
    //Generate A random userid
    $character_array = array_merge(range('A', 'Z'), range(0, 9));
    $rand_string = "";
    for ($i = 0; $i < 8; $i++) {
        $rand_string .= $character_array[rand(
            0,
            (count($character_array) - 1)
        )];
    }
    // echo $rand_string."<br>";
    // echo $username."<br>";
    // echo $firstname."<br>";
    // echo $lastname."<br>";
    // echo $email."<br>";
    // echo $password."<br>";


    $stmt = $mysqli->prepare(
        "INSERT INTO users (
		userid,
        username,
		firstname,
		lastName,
		email,
        user_password,
		member_since,
		active,
        delete_user
		)
		VALUES (
		'" . $rand_string . "',
		?,
		?,
		?,
		?,
        ?,
		'" . time() . "',
		1,
        0
		)"
    );
    $stmt->bind_param("sssss", $username, $firstname, $lastname, $email, $password);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function FetchUserDetails($username, $password)
{
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT
    userid,
    username,
	firstname,
	lastName,
	email,
    user_password,
	member_since,
	active,
    delete_user
    FROM users
    WHERE
    username = ?
    LIMIT 1");
    $stmt->bind_param("s", $username);

    $stmt->execute();
    $stmt->bind_result($UserID, $UserName, $FirstName, $LastName, $Email, $Password, $MemberSince, $Active, $DeleteUser);
    $row = "";
    while ($stmt->fetch()) {
        $row = array(
            'userid' => $UserID,
            'username' => $UserName,
            'firstname' => $FirstName,
            'lastname' => $LastName,
            'email' => $Email,
            'user_password' => $Password,
            'member_since' => $MemberSince,
            'active' => $Active,
            'delete_user' => $DeleteUser,


        );
    }
    $stmt->close();
    return ($row);
}
function InsertProfile($profile_name, $age, $height, $weight, $gender, $sport, $location, $howoften, $ThisUserId)
{
    $character_array = array_merge(range('A', 'Z'), range(0, 9));
    $profile_id = "";
    for ($i = 0; $i < 4; $i++) {
        $profile_id .= $character_array[rand(
            0,
            (count($character_array) - 1)
        )];
    }
    global $mysqli;
    $stmt = $mysqli->prepare(
        "INSERT INTO profiledetails (
            
        profile_id,
        profile_name,
		age,
        height,
		weight,
		gender,
		sport,
        howoften,
		location,
		date
		)
		VALUES (
       
        ?,
        ?,
		?,
		?,
		?,
		?,
        ?,
        ?,
        ?,
		'" . time() . "'
		)"
    );
    $stmt->bind_param("sssssssss", $profile_id, $profile_name, $age, $height, $weight, $gender, $sport, $location, $howoften);
    $result = $stmt->execute();
    $stmt->close();
    //Insert into profiles.... for profile id and user id
    $stmt = $mysqli->prepare(
        "INSERT INTO profiles (
            
            profile_id,
            userid 
		)
		VALUES (
       
        ?,
		?
		)"
    );
    $stmt->bind_param("ss", $profile_id, $ThisUserId);
    $stmt->execute();
    $stmt->close();
    return $result;
}


function fetchprofiles($ThisUserId)
{
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT
    profile_id,
    userid
    FROM profiles
    WHERE
    userid=?
    ");
    $stmt->bind_param("s", $ThisUserId);

    $stmt->execute();
    $stmt->bind_result($profile_id, $UserID);
    while ($stmt->fetch()) {
        $row[] = array(
            'userid' => $UserID,
            'profileid' => $profile_id,
        );
    }
    $stmt->close();

    return ($row);
}



function fetchprofileName($ThisUserId)
{
    global $mysqli;
    // for profile name
    $stmt = $mysqli->prepare("SELECT 
    profiledetails.profile_name,
    profiledetails.profile_id
    FROM profiledetails 
    INNER JOIN profiles 
    ON profiledetails.profile_id=profiles.profile_id
    WHERE profiles.userid=?
    ");
    $stmt->bind_param("s", $ThisUserId);

    $stmt->execute();
    $stmt->bind_result($profile_name,$profile_id);
    while ($stmt->fetch()) {
        $row[] = array(
            'profilename' => $profile_name,
            'profile_id' =>$profile_id
        );
    }
    $stmt->close();
    return ($row);
}





function fetchprofile($profile_id)
{
    global $mysqli;
    $stmt = $mysqli->prepare(
        "SELECT
        profile_id,
        profile_name,
		age,
        height,
		weight,
		gender,
		sport,
        howoften,
		location 
        FROM profiledetails 
        WHERE
        profile_id = ?
        LIMIT 1
        "
    );
    $stmt->bind_param("s", $profile_id);

    $stmt->execute();
    $stmt->bind_result($profileid, $profile_name, $age, $height, $weight, $gender, $sport, $howoften,$location);
    while ($stmt->fetch()) {
        $row[] = array(
            'profileid' => $profileid,
            'profilename' => $profile_name,
            'age' => $age,
            'height' => $height,
            'weight' => $weight,
            'gender' => $gender,
            'sport' => $sport,
            'howoften' => $howoften,
            'location' => $location
        );
    }
    $stmt->close();
    return ($row);
}


function EditProfile($profile_name, $age, $height, $weight, $gender, $sport, $location, $howoften,$profile_id){
    global $mysqli;
    $stmt = $mysqli->prepare(
        "UPDATE profiledetails
        SET
        profile_name=?,
        age=?,
        height=?,
        weight=?,
        gender=?,
        sport=?,
        howoften=?,
        location=?

        WHERE profile_id=?
        "
    );
    $stmt->bind_param("sssssssss", $profile_name, $age, $height, $weight, $gender, $sport,  $howoften,$location, $profile_id);
    $stmt->execute();
    $stmt->close();


}

function isUserLoggedIn()
{
	global $loggedInUser, $mysqli;
	$stmt = $mysqli->prepare("SELECT
		userid,
		user_password
		FROM users
		WHERE
		username = ?
		AND
		user_password = ?
		AND
		active = 1
		LIMIT 1");
	$stmt->bind_param("ss", $loggedInUser->username, $loggedInUser->hash_pw);
	$stmt->execute();
	$stmt->store_result();
	$num_returns = $stmt->num_rows;
	$stmt->close();
	
	if($loggedInUser == NULL) {
		return false;
	} else {
		if($num_returns > 0) {
			return true;
		} else {
			destroySession("ThisUser");
			return false;
		}
	}
}

function destroySession($name)
{
	if(isset($_SESSION[$name])) {
		$_SESSION[$name] = NULL;
		unset($_SESSION[$name]);
	}
}
