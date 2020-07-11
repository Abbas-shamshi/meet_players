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
    
	$newpassword = generateHash($password);


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
    $stmt->bind_param("sssss", $username, $firstname, $lastname, $email, $newpassword);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}
//This will fetch user details of the user during login 
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
//This will create user profile of the particulat user
function InsertProfile($profile_name, $age, $height, $weight, $gender, $sport, $location, $howoften, $team, $position, $college, $experience, $play_status, $ThisUserId, $achivement_1, $achivement_2, $achivement_3, $achivement_4, $achivement_5)
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
        team,
        position,
        college,
		age,
        height,
		weight,
		gender,
		sport,
        howoften,
		location,
        experience,
        status,
        profile_status,
		profile_date
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
        ?,
        ?,
        ?,
        ?,
        ?,
        1,
		'" . time() . "'
		)"
    );
    $stmt->bind_param("ssssssssssssss", $profile_id, $profile_name, $team, $position, $college, $age, $height, $weight, $gender, $sport,  $howoften, $location, $experience, $play_status);
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

    $stmt = $mysqli->prepare(
        "INSERT INTO profile_achivements (

            
            profile_id,
            achivement_1,
            achivement_2,
            achivement_3,
            achivement_4,
            achivement_5

		)
		VALUES (
       
        ?,
		?,
        ?,
        ?,
        ?,
        ?
		)"
    );
    $stmt->bind_param("ssssss", $profile_id, $achivement_1, $achivement_2, $achivement_3, $achivement_4, $achivement_5);
    $stmt->execute();
    $stmt->close();
    return $result;
    echo $achivement_1;
}

// This will fetch all user's profile on index page
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


// This will fetch all the profiles of the user
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
    WHERE profiles.userid=? AND profiledetails.profile_status=1
    ");
    $stmt->bind_param("s", $ThisUserId);

    $stmt->execute();
    $stmt->bind_result($profile_name, $profile_id);
    while ($stmt->fetch()) {
        $row[] = array(
            'profilename' => $profile_name,
            'profile_id' => $profile_id
        );
    }
    $stmt->close();
    return ($row);
}




// This will fetch full profile of the user
function fetchprofile($profile_id)
{
    global $mysqli;
    $stmt = $mysqli->prepare(
        "SELECT
        pd.profile_id,
        pd.profile_name,
        pd.team,
        pd.position,
        pd.college,
		pd.age,
        pd.height,
		pd.weight,
		pd.gender,
		pd.sport,
        pd.howoften,
		pd.location,
        pd.experience,
        pd.status,
        pa.achivement_1,
        pa.achivement_2,
        pa.achivement_3,
        pa.achivement_4,
        pa.achivement_5

        FROM profiledetails pd
        INNER JOIN profile_achivements pa ON pa.profile_id=pd.profile_id 
        WHERE
        pd.profile_id = ?
        LIMIT 1
        "
    );
    $stmt->bind_param("s", $profile_id);

    $stmt->execute();
    $stmt->bind_result($profileid, $profile_name, $team, $position, $college, $age, $height, $weight, $gender, $sport, $howoften, $location, $experience, $play_status,$achivement_1,$achivement_2,$achivement_3,$achivement_4,$achivement_5);
    while ($stmt->fetch()) {
        $row[] = array(
            'profileid' => $profileid,
            'profilename' => $profile_name,
            'team' => $team,
            'position' => $position,
            'college' => $college,

            'age' => $age,
            'height' => $height,
            'weight' => $weight,
            'gender' => $gender,
            'sport' => $sport,
            'howoften' => $howoften,
            'location' => $location,
            'experience' => $experience,

            'play_status' => $play_status,
            'achivement_1' => $achivement_1,
            'achivement_2' => $achivement_2,
            'achivement_3' => $achivement_3,
            'achivement_4' => $achivement_4,
            'achivement_5' => $achivement_5,

        );
    }
    $stmt->close();
    return ($row);
}

// This will update
function EditProfile($profile_name, $age, $height, $weight, $gender, $sport, $location, $howoften, $team, $position, $college, $experience, $play_status, $profile_id,$achivement_1,$achivement_2,$achivement_3,$achivement_4,$achivement_5)
{
    global $mysqli;
    $stmt = $mysqli->prepare(
        "UPDATE profiledetails
        SET
        profile_name=?,
        team=?,
        position=?,
        college=?,
        age=?,
        height=?,
        weight=?,
        gender=?,
        sport=?,
        howoften=?,
        location=?,
        experience=?,
        status=?

        WHERE profile_id=?
        "
    );
    $stmt->bind_param("ssssssssssssss", $profile_name, $team, $position, $college, $age, $height, $weight, $gender, $sport,  $howoften, $location, $experience, $play_status, $profile_id);
    $result = $stmt->execute();
    $stmt->close();

    $stmt = $mysqli->prepare(
        "UPDATE profile_achivements
        SET
            achivement_1=?,
            achivement_2=?,
            achivement_3=?,
            achivement_4=?,
            achivement_5=?

        WHERE profile_id=?
        "
    );
    $stmt->bind_param("ssssss",$achivement_1,$achivement_2,$achivement_3,$achivement_4,$achivement_5, $profile_id);
    $result = $stmt->execute();
    $stmt->close();


    return $result;
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

    if ($loggedInUser == NULL) {
        return false;
    } else {
        if ($num_returns > 0) {
            return true;
        } else {
            destroySession("ThisUser");
            return false;
        }
    }
}

function destroySession($name)
{
    if (isset($_SESSION[$name])) {
        $_SESSION[$name] = NULL;
        unset($_SESSION[$name]);
    }
}
function deleterProfile($pro_id)
{
    global $mysqli;
    $stmt = $mysqli->prepare(
        "UPDATE profiledetails
        SET
        
        profile_status=0

        WHERE profile_id=?
        "
    );
    $stmt->bind_param("s", $pro_id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}
function fetchShortProfiles()
{
    global $mysqli;
    $stmt = $mysqli->prepare(
        "SELECT users.firstname,
         users.lastname,
         profiledetails.profile_id,
         profiledetails.team,
         profiledetails.position,
         profiledetails.college,
         profiledetails.age,
         profiledetails.height,
         profiledetails.weight,
         profiledetails.gender,
         profiledetails.sport,
         profiledetails.howoften,
         profiledetails.location,
         profiledetails.experience,
         profiledetails.status,
         users.image
          FROM
          (users INNER JOIN profiles 
          ON profiles.userid= users.userid)
          INNER JOIN profiledetails 
          
          ON profiles.profile_id=profiledetails.profile_id 
          ORDER BY RAND()
        "
    );
    $stmt->execute();
    $stmt->bind_result($firstname, $lastname, $id, $team, $position, $college, $age, $height, $weight, $gender, $sport, $howoften, $location, $experience, $play_status,$image);
    while ($stmt->fetch()) {
        $row[] = array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'id' => $id,

            'team' => $team,
            'position' => $position,
            'college' => $college,

            'age' => $age,
            'height' => $height,
            'weight' => $weight,
            'gender' => $gender,
            'sport' => $sport,
            'howoften' => $howoften,
            'location' => $location,
            'experience' => $experience,

            'play_status' => $play_status,
            'image' => $image

        );
    }
    $stmt->close();
    return ($row);
}

function fetchFullProfile($profile_id)
{
    global $mysqli;
    $stmt = $mysqli->prepare(
        "SELECT users.firstname, 
        users.lastname,
        profiledetails.team,
        profiledetails.position,
        profiledetails.college,
        profiledetails.age,
        profiledetails.height,
        profiledetails.weight,
        profiledetails.gender,
        profiledetails.sport,
        profiledetails.howoften,
        profiledetails.location,
        profiledetails.experience,
        profiledetails.status,
        profile_achivements.achivement_1,
        profile_achivements.achivement_2,
        profile_achivements.achivement_3,
        profile_achivements.achivement_4,
        profile_achivements.achivement_5,
        users.image
        
        FROM 
        (users INNER JOIN profiles ON profiles.userid= users.userid)
        INNER JOIN profiledetails ON profiles.profile_id=profiledetails.profile_id 
        INNER JOIN profile_achivements ON 
        profiledetails.profile_id=profile_achivements.profile_id 
        WHERE profiledetails.profile_id=?
        LIMIT 1
        "
    );
    $stmt->bind_param("s", $profile_id);
    $stmt->execute();
    $stmt->bind_result($firstname, $lastname, $team, $position, $college, $age, $height, $weight, $gender, $sport, $howoften, $location, $experience, $play_status, $achv_1, $achv_2, $achv_3, $achv_4, $achv_5,$image);
    while ($stmt->fetch()) {
        $row[] = array(
            'firstname' => $firstname,
            'lastname' => $lastname,

            'team' => $team,
            'position' => $position,
            'college' => $college,

            'age' => $age,
            'height' => $height,
            'weight' => $weight,
            'gender' => $gender,
            'sport' => $sport,
            'howoften' => $howoften,
            'location' => $location,
            'experience' => $experience,

            'play_status' => $play_status,
            'achv_1' => $achv_1,
            'achv_2' => $achv_2,
            'achv_3' => $achv_3,
            'achv_4' => $achv_4,
            'achv_5' => $achv_5,
            'image' => $image


        );
    }
    $stmt->close();
    return ($row);
}
function generateHash($pass, $salt = NULL)
{
	if($salt === NULL) {
		$salt = substr(md5(uniqid(rand(), TRUE)), 0, 25);
	} else {
		$salt = substr($salt, 0, 25);
	}
	return $salt . sha1($salt . $pass);
}
function fetchSearcProfiles($fname,$lname,$location,$sport){
    global $mysqli;
    $stmt = $mysqli->prepare(
        "SELECT users.firstname,
         users.lastname,
         profiledetails.profile_id,
         profiledetails.team,
         profiledetails.position,
         profiledetails.college,
         profiledetails.age,
         profiledetails.height,
         profiledetails.weight,
         profiledetails.gender,
         profiledetails.sport,
         profiledetails.howoften,
         profiledetails.location,
         profiledetails.experience,
         profiledetails.status,
         users.image
          FROM
          (users INNER JOIN profiles 
          ON profiles.userid= users.userid)
          INNER JOIN profiledetails 
          
          ON profiles.profile_id=profiledetails.profile_id 
          WHERE users.firstname LIKE ? 
          AND users.lastname LIKE ? 
          AND profiledetails.location LIKE ? 
          AND profiledetails.sport Like ?
          ORDER BY RAND()
        "
    );
    $stmt->bind_param('ssss',$fname,$lname,$location,$sport);
    $stmt->execute();
    $stmt->bind_result($firstname, $lastname, $id, $team, $position, $college, $age, $height, $weight, $gender, $sport, $howoften, $location, $experience, $play_status,$image);
    while ($stmt->fetch()) {
        $row[] = array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'id' => $id,

            'team' => $team,
            'position' => $position,
            'college' => $college,

            'age' => $age,
            'height' => $height,
            'weight' => $weight,
            'gender' => $gender,
            'sport' => $sport,
            'howoften' => $howoften,
            'location' => $location,
            'experience' => $experience,

            'play_status' => $play_status,
            'image' => $image
        );
    }
    $stmt->close();
    return ($row);

}

