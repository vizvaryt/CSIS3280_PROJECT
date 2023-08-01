<?php

    class LoginManager {

        static function verifyLogin()   {
            //Checks for a session
            if(session_id() == '' && !isset($_SESSION)){
                session_start();
            }
    
            //Checks if anyone is logged in
            if(isset($_SESSION['loggedin'])){
                return true;
            }
            else{
                //Close the session
                session_destroy();
                return false;
    
            }
            
        }
        
    }

?>