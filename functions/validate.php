<?php ob_start();
    //include Finity library 
    include '../lib/Finity/Autoloader.php';
    
    //variables expecting from $_POST 
    //login
    define('LOGINVAR', serialize(array("email"=>"","pwd"=>"")));

    //Signup
    define('SIGNUPVAR', serialize(array("fname"=>"","lname"=>"","bday"=>"","email"=>"","pwd"=>"","Rpwd"=>"")));

    //get the requestor page
    $requestor = (isset($_GET['t'])?$_GET['t']:'');

    if(empty($requestor))
        header('Location: ../index.php');

    switch($requestor){
        case 'login':
        checkAndLoginUser();
        break;

        case 'signup':
        $_SESSION['userInput'] = $_POST;
        checkAndSignupUser();
        break;

        default:
        header('Location: ../index.php');
    }



    /**
     * Signup funactionality
     */
    function checkAndSignupUser(){

        $cleanData = cleanPostDataFromUser(unserialize(SIGNUPVAR));

        $isDataGood = checkCleanDataFromUser($cleanData);
print_ra($isDataGood);
        if($isDataGood['?']){
            //setup array to create a user
            $usrd = array(
                'username'      =>$cleanData['email'],
                'password'      =>$cleanData['pwd'],
                'user_type_id'  =>675,
                'firstname'     =>$cleanData['fname'],
                'lastname'      =>$cleanData['lname'],
                'dob'           =>$cleanData['bday'],
                'status'        =>0
            );
            
            //create user to have acces to all the data in both user and person fro user
            $user = new \Finity\Profile\User($usrd);
            
            //create profile manager to handle the setup
            $pm = new \Finity\Profile\ProfileManager();

            //create profile and return user class with new data
            $user  = $pm->createProfile($user);

            if($user->get_person_id())
                echo "<div class='content'><h1>Your profile was created successfull.</h1><p> go to <a href='index.php'>login</a></p> </di>" ;
            else{
                unset($_SESSION['errors']);
                echo $_SESSION['errors']['create'] = "There was a problem creating your profile try again later.";
               // header('Location: ../index.php?v=signup');
            }   
            
        }else{
            $_SESSION['errors'] = $isDataGood['errors'];
            header('Location: ../index.php?v=signup');
        }
    }





















    /**
     * Check the user input and handle the errors if any or login user and 
     * redirect to approriate view
     */
    function checkAndLoginUser(){
        //Step 1: clean data
        $cleanData = cleanPostDataFromUser(unserialize(LOGINVAR));

        //Step 2: check data
        $isDataGood = checkCleanDataFromUser($cleanData); 
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
                $_SESSION['user'] = $user->get_username();
                $_SESSION['fname'] = $user->get_firstname();
                $_SESSION['lname'] = $user->get_lastname();
                $_SESSION['userType'] = $user->get_user_type_id();
                $_SESSION['status'] = $user->get_status();
                
                
                //now we send the user to thier rightful view
                //Normal view
                if($user->get_user_type_id()==675 && $user->get_status()==1)
                    header('Location: ../product.php');
                
                if($user->get_user_type_id()==675 && $user->get_status()==0){
                    unset($_SESSION['errors']);
                    $_SESSION['errors']='You do not have permission, contact your Admin';
                    header('Location: ../index.php');
                }
                    
                
                if($user->get_user_type_id()==222)
                    header('Location: ../admin.php');

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