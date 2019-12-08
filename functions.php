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
function InsertProfile($age, $height, $weight, $gender, $sport, $location, $howoften)
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
		'" . time() . "'
		)"
    );
    $stmt->bind_param("ssssssss",$profile_id, $age, $height, $weight, $gender, $sport, $location, $howoften);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}
