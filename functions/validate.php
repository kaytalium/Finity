<?php ob_start();
    //include Finity library 
    include '../lib/Finity/Autoloader.php';
    print_ra($_REQUEST);
    //variables expecting from $_POST 
    //login
    define('LOGINVAR', serialize(array("email"=>"","pwd"=>"")));

    //Signup
    $signupVar = array();

    //get the requestor page
    $requestor = (isset($_GET['t'])?$_GET['t']:'');

    if(empty($requestor))
        header('Location: ../index.php');

    switch($requestor){
        case 'login':
        checkAndLoginUser();
        break;

        case 'signup':
        break;
    }

    /**
     * Check the user input and handle the errors if any or login user and 
     * redirect to approriate view
     */
    function checkAndLoginUser(){
        //Step 1: clean data
        $cleanData = cleanPostDataFromUser();

        //Step 2: check data
        $isDataGood = logincheckCleanDataFromUser($cleanData); 
        if($isDataGood['?']){
            //data come back ok
            //Now we send data to server for db check
            $user = new \Finity\Profile\User(array("username"=>$cleanData['email'],'password'=>$cleanData['pwd']));

            //Authenticate the user 
            $Oauth = new \Finity\Authenticate\Oauth($user);

            //check if user is authenticated
            $isloggedIn = $Oauth->login(); //return boolean 
            
            if($isloggedIn){
                $user = $Oauth->getLoggedInUser(); 
                print_ra($user->get_profile());
            }
            else{
                $_SESSION['errors'] = $Oauth->loginErrors();
                header("Location: ../index.php");
            }
                
        }else{
            $_SESSION['errors'] = $isDataGood['errors'];
            header('Location: ../index.php');
        }
        

    }
ob_flush();