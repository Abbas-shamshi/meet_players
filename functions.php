<?php 

function createUser($username, $firstname, $lastname, $email, $password)
{
    global $mysqli;
    //Generate A random userid
    $character_array = array_merge(range('A', 'Z'), range(0, 9));
    $rand_string = "";
    for ($i = 0; $i < 8; $i++) {
        $rand_string .= $character_array[rand(
            0, (count($character_array) - 1)
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
    $stmt->bind_param("sssss", $username, $firstname, $lastname,$email, $password);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}
