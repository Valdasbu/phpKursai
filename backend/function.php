<?php
// $fullnamelArray =[];
function isValidName( $fullname)  {
  $regex = '/^[^0-9]+$/iD';
  return (preg_match(   $regex,
                $fullname)) ;
}

function isValidEmail( $email) {
  $regex = '/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD';
  preg_match(   $regex,
                $email,
                $emailArray,
                PREG_OFFSET_CAPTURE,
                0);

  return (count($emailArray) === 0) ? false : true;
}

function connect(): PDO {
  $user = 'root';
  $pass = '';
  $db = new PDO('mysql:host=localhost;dbname=raudonas_projektas',
                $user,
                $pass,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
  return $db;
}

function getAllMessages(PDO $db): array  {

  $query = $db->prepare('SELECT * FROM contact
                         ORDER BY date DESC');
  $query->execute();
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

function deleteMessage(PDO $db, int $id): int {
  $query = $db->prepare("DELETE FROM contact WHERE id = ?");
  $query->execute([$id]);
  return ($query->rowCount() > 0) ? 1 : 0;
}

?>
