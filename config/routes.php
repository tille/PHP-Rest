<?php
  include 'app/controllers/user_controller.php';
  include 'db/environment.php';

  $routes = array(
    "service_greet" =>0,
  )

  function calling($id, $json){
      
    if($id==0){ 
        $params = json_decode(stripslashes($json));
        $user = $params->{'user'};
        $surn = $params->{'surname'};
        return user_controller::greet( $user, $surn );
    }
    
    return "";
  }
?>
