<?php
require_once('dbConnect.php');
require_once('addresses.php');
require_once('mail.php');

function getUsers($userId = FALSE, $backOffice = FALSE, $confirmAccount = FALSE)
{
    $db = dbConnect();

    $queryString = 'SELECT u.*, a.address, a.zip_code, a.city, a.country, a.location';
    $queryString .= ' FROM users u INNER JOIN addresses a
        ON u.address_id = a.id';

    if ($userId && ($backOffice || $confirmAccount)){
        $queryString .= ' WHERE u.id = :id';
    }

    $query = $db->prepare($queryString);

    if (!$userId){
        $query->execute();
        return $query->fetchAll();
    }
    else{
        $query->execute(['id' => $userId]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}

function addUsers($address, $zipCode, $city, $country, $lastName, $firstName, $mail, $dob, $homeNum, $mobileNum, $isAdmin)
{
    $db = dbConnect();

    $lastInsert = addAddress($address, $zipCode, $city, $country);

    $pwd = randPassword(6);

    $resultMail = mailTo($mail, $pwd, TRUE);

    $queryString = 'INSERT INTO users (last_name, first_name, email, password, dob, home_number, mobile_number, is_admin, address_id ';
    $queryValues = 'VALUES (:lastName, :firstName, :mail, :pwd, :dob, :homeNum, :mobileNum, :isAdmin, :addressId';
    $queryParameters = [
        'lastName' => htmlspecialchars($lastName),
        'firstName' => htmlspecialchars(ucfirst($firstName)),
        'mail' => htmlspecialchars($mail),
        'pwd' => htmlspecialchars(md5($pwd)),
        'dob' => htmlspecialchars($dob),
        'homeNum' => htmlspecialchars($homeNum),
        'mobileNum' => htmlspecialchars($mobileNum),
        'isAdmin' => htmlspecialchars($isAdmin),
        'addressId' => htmlspecialchars($lastInsert)
    ];

    $queryString .= ') ';
    $queryValues .= ')';

    $queryString .= $queryValues;

    $query = $db->prepare($queryString);
    return $query->execute($queryParameters);
}

function updateUsers($address, $zipCode, $city, $country, $lastName, $firstName, $mail, $dob, $homeNum, $mobileNum, $isAdmin, $addressId, $userId)
{
    $db = dbConnect();

    updateAddress($address, $zipCode, $city, $country, FALSE, $addressId);

    $queryString = 'UPDATE users SET last_name = :lastName, first_name = :firstName, email = :mail, home_number = :homeNum, mobile_number = :mobileNum, is_admin = :isAdmin ';
    $queryParameters = [
        'lastName' => htmlspecialchars($lastName),
        'firstName' => htmlspecialchars(ucfirst($firstName)),
        'mail' => htmlspecialchars($mail),
        'dob' => htmlspecialchars($dob),
        'homeNum' => htmlspecialchars($homeNum),
        'mobileNum' => htmlspecialchars($mobileNum),
        'isAdmin' => htmlspecialchars($isAdmin),
        'id' => htmlspecialchars($userId)
    ];

    $queryString .= 'WHERE id = :id';

    $query = $db->prepare($queryString);
    return $query->execute($queryParameters);
}

function deleteUsers($id)
{
    $db = dbConnect();

    $query = $db->prepare('SELECT address_id FROM users WHERE id = :id ');
    $query->execute(['id' => $id]);
    $addressId = $query->fetch();

    deleteAddresses($addressId['address_id']);

    $queryString = 'DELETE FROM users';
    $queryString .= ' WHERE id = :id';

    $query = $db->prepare($queryString);

    $query->bindParam(':id', $id, PDO::PARAM_INT);

    return $query->execute();
}

function updatePwd($mail)
{
    $db = dbConnect();

    $pwd = randPassword(6);

    $resultMail = mailTo($mail, $pwd, FALSE, TRUE);

    $queryString = 'UPDATE users SET password = :pwd ';
    $queryParameters = [
        'pwd' => htmlspecialchars(md5($pwd)),
        'email' => htmlspecialchars($mail)
    ];

    $queryString .= 'WHERE email = :email';

    $query = $db->prepare($queryString);
    return $query->execute($queryParameters);
}

function confirmAccount($userId, $confirmAccount){
    $db = dbConnect();

    $queryString = 'UPDATE users SET account_confirmed = :accountConfirmed ';
    $queryParameters = [
        'accountConfirmed' => htmlspecialchars($confirmAccount),
        'id' => htmlspecialchars($userId)
    ];

    $queryString .= 'WHERE id = :id';

    $query = $db->prepare($queryString);
    return $query->execute($queryParameters);
}

function randPassword($size)
{
    $password = NULL;
    $characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");

    for($i=0;$i<$size;$i++)
    {
        $password .= ($i%2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
    }

    return $password;
}
