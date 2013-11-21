<?php
  include 'app/models/user.php';
  include 'db/DAO/DAO_user.php';

  class user_controller {
      function greet( $name, $surn ) {
          $full_name = $name." ".$surn;
          return "Hello ".$name;
      }
  }
?>