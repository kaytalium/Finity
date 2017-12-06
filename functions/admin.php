<?php ob_start();
    //include Finity library 
    include '../lib/Finity/Autoloader.php';
    $pm = new \Finity\Profile\ProfileManager();

    print_ra($_REQUEST);

    $requestor = (isset($_GET['v'])?$_GET['v']:'');

    if($requestor=='suspend'){
        $person_id = (isset($_GET['id'])?$_GET['id']:'');
        $status = (isset($_GET['cs'])?$_GET['cs']:'');
        $pm->suspendUser($person_id, $status);
        header('Location: ../admin.php');
    }

    if($requestor=='delete'){
        $person_id = (isset($_GET['id'])?$_GET['id']:'');
        $pm->deleteUser($person_id);
        header('Location: ../admin.php');
    }


    if($requestor=='edit'){
        $person_id = $person_id = (isset($_GET['id'])?$_GET['id']:'');
        $user = new \Finity\Profile\User($_POST);
        print_ra($user->get_profile());
        $pm->updateUser($user);
        header('Location: ../admin.php?');
    }

    if($requestor==='create'){
        $user = new \Finity\Profile\User($_POST);
        print_ra($user->get_profile());
        $pm->createProfile($user);
        header('Location: ../admin.php');
    }

    if($requestor==='edit_current_user'){
        $user = new \Finity\Profile\User($_POST);
        print_ra($user->get_profile());
        $pm->updateUser($user);
        header('Location: ../admin.php?v=user-profile');
    }
