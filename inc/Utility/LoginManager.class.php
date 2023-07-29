<?php

    //TODO reformat and comment
    class LoginManager {

        static function verifyLogin()   {
            // check for a session
            if(session_id() == '' && !isset($_SESSION)){
                // start the session
                session_start();
            }
    
            // is anyone login?
            if(isset($_SESSION['loggedin'])){
                return true;
            }
            else{
                // destroy the session
                session_destroy();
                return false;
    
            }
            
        }
        
    }

?>