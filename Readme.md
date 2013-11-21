

<img align="right" src="https://raw.github.com/hueniverse/iron/master/images/logo.png" /> **PHP-Rest** is a web server writted in PHP with a MVC arquitecture to call REST methods in an easy way, without suffering and headaches.
Current version: **1.0**

[![Build Status](https://secure.travis-ci.org/hueniverse/iron.png)](#)


# Table of Content

- [**Introduction**](#introduction)
<p></p>
- [Usage](#usage)
  - [Options](#options)
<p></p>
- [**Frequently Asked Questions**](#frequently-asked-questions)

# Introduction

**PHP-Rest** pending to add a description. 

# Usage

you can specify a name for your service in the config file "config/routes.php", just adding this one to the routes array, 
and adding into the calling function a conditional to the params parser and the logic to call the controllers

```php
$routes = array("service_greet" => 0);

if($id==0){ 
    $params = json_decode(stripslashes($json));
    $user = $params->{'user'};
    $surn = $params->{'surname'};
    return user_controller::greet( $user, $surn );
}
```
after this one, you can specify the actions in your controllers same way as an MVC architecture

```php

class user_controller {
    function greet( $name, $surn ) {
        $full_name = $name." ".$surn;
        return "Hello ".$name;
    }
}
```
and call the service: 
yourdomain.com/services.php?q=service_greet&params={"user":"Nick","surname":"Goz"}

You can notice that the server is not printing the answers like JSON files, you can change that just turning out the returned result to a Json file

```php
$routes = array("json_response" => 1);

if($id==1){
    $ans = array('response' => "everything runs smoothly", 'http_code' => 200);
    return json_encode($ans);
}
```

KK, but what about the models and the DB connections?, you can create a user model and add a DAO for this one:

```php

class User {
    var $name, $surname;
    
    function __contruct($name, $surn){
      $this->name = $name;
      $this->surname = $surn;
    }
}
```

```php

include 'db/DAO/DAO_user.php';

class user_controller {
    function suscribe( $name, $surn ) {
        $full_name = $name." ".$surn;
        $success = DAO_user::record_username( $full_name );
        
        if( $success == true )
            return "Name saved";
        else
            return "an error ocurred!!"
    }
}
```

### Options


# Frequently Asked Questions


### Is it done?

No, is just a basic contruction of an MVC arquitecture for the people which is not familiar or dont want to use a big framework,
this is just an scaffold and the objetive is to construct an easy way to work with PHP and REST in a cleaning way.


### where should I write the tests?

There is a folder named spec, actually there are no mocks or something like default unitary tests, but you can install a phpunit and create some TDD/BDD here.... okey I know that is not the best way but we are working on that.
