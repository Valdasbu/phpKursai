<?php
  require_once "function.php";

  if(count($_GET) > 0) {
    $db = connect();
    $isDeleted = deleteMessage($db, $_GET['id']);
    header('Location: ../uzklausos.php?delete='.$isDeleted.'&id='.$_GET['id']);
    exit;
  }
?>
