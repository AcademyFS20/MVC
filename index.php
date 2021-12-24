<?php
require('./vendor/autoload.php');
require('./core/init.php');
use \Chat\UserController;
use \Chat\MessageController;
// debug(dirname(__DIR__));
$user = new UserController;
$message = new MessageController;
try{

    if(empty($_GET['page'])){
        throw new Exception('Page not found');
    }
    else{
        $uri =filter_var($_GET['page'], FILTER_SANITIZE_URL);
        $url = explode('/',$uri);
        if(empty($url[0]) ){
            throw new Exception('URL not found');
        } else{
            // switch ($url[0]){
            //     case 'admin': 
                    switch($url[0]){
                    case 'login':
                        // $user->index();
                        // $user->indexemail();
                        // $user->indexfirstname();
                        $user->login();
                    break;
                case 'signup': 
                    $user->signup();
                break;
                case 'logout': echo "this is a logout";
                break;
                case 'chatbox':$message->index();
                break;
                default:
                throw new Exception ('Route not found');
                }
                // break;
                // case 'user': echo "this is user page"; break;
                // default:
                // throw new Exception ('404');
                
            }
        }
    }

 catch(Exception $e){

    $message = $e->getMessage();

    printf("An internal error has occured in the server: %s\n", $message);
    die();

}







 