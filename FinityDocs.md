# Finity Library Documentation

The library is tended to manage all database request for the Inventory Management System (Finity Inventory). 

###  Classes and thier Public Methods

##### Authenticate

To access the class you will use the namesapce path and the file name as shown below; 

```php
<?php
    $Oauth = new \Finity\Authenticate\Oauth();
?>
```
- Oauth 

This class will authenticate and update user information in the database. below are the exposed methods with there accepting arguments and structure and returning data type and structure
<!-- language: php -->
```php
<?php
    
    login(User); // return bool
    logout(User); // return bool
?>
```
- User

This class will capture and store all user information so that we will be able to interact with the user object to get the relivant information for a given user. 

```php
<?php  
    
    //The user object has an optional constructor array param, see all keys and datatype from eg. below

    array(
        "username"=>"Mary",
        "password"=>"Brown",
        "userID"=>"453",
        "logoutTime"=>"1234564565424",
        "loginTime"=>"1234544343224"
    );

    //Below are the Getters of the class
    get_username();
    get_password();
    get_userID();
    get_logoutTime();
    get_loginTime();
    get_all();

    //Below are the Setters of the class
    set_username($name);
    set_password($secret);
    set_userID($id);
    set_logoutTime($time);
    set_loginTime($time);
    set_all($array); // array with all data available as seen above

    
?>
```