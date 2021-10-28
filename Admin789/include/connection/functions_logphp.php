<?php
if(!function_exists('hash_equals'))
{
    function hash_equals($str1, $str2)
    {
        if(strlen($str1) != strlen($str2))
        {
            return false;
        }
        else
        {
            $res = $str1 ^ $str2;
            $ret = 0;
            for($i = strlen($res) - 1; $i >= 0; $i--)
            {
                $ret |= ord($res[$i]);
            }
            return !$ret;
        }
    }
}
$salt ='photos1234567890';
function simple_encrypt1($text)
{
    global $salt;
    return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
}
function login($user_nme, $password) {
    include_once 'log-config.php';   // As functions.php is not included
    $mysqli = new mysqli(HSTTITANLOG, USETITANLOG, PASTITANLOG, DTA_TITANICLIOLOG);
   $table_name = 'log_admin';

    // Using prepared statements means that SQL injection is not possible. 
    if ($stmt = $mysqli->prepare("SELECT user_id, pass_d FROM $table_name WHERE usr_nme = '$user_nme' LIMIT 1")) 
    {   
        $status=1;
       // $stmt->bind_param('is', $status, $user_nme);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
        // get variables from result.
        $stmt->bind_result($user_id, $db_password);
        $stmt->fetch();
        
        // Check if the password in the database matches
        // the password the user submitted. We are using
        // the password_verify function to avoid timing attacks.
        if (!isset($db_password))
        {   
            return false;   
        }
        else
        {
            if (password_verify_custom($password, $db_password)) 
            {
                // Password is correct!
                // Get the user-agent string of the user.
                $user_browser = $_SERVER['HTTP_USER_AGENT'];
                // XSS protection as we might print this value
                $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                $_SESSION['userclient_id'] = $user_id;
                $_SESSION['usrclient_nme'] = $user_nme;
                $privateKey = simple_encrypt1($password.session_id());
                $_SESSION['photography_login_stringclient'] = $hashed_password = crypt($user_nme.$user_browser,$privateKey);
                // Login successful.
                return true;
            } 
            else 
            {
                return false;
            }
        }
        
    }
    else
    {
        return false; 
    }
}

function password_verify_custom($password, $db_password)
{

    if(hash_equals($password,$db_password))
        {
            return true;
        }
    else
        {
            return false;

        }
}


function login_check() 
{ 
    include_once '../../../config/log-config.php';   // As functions.php is not included
    $mysqli = new mysqli(HSTTITANLOG, USETITANLOG, PASTITANLOG, DTA_TITANICLIOLOG);
    // Check if all session variables are set 
    if (isset($_SESSION['userclient_id'], $_SESSION['photography_login_stringclient'])) 
        {
        $user_id =  $_SESSION['userclient_id'];
        //$user_type = $_SESSION['type'];
        $login_string = $_SESSION['photography_login_stringclient'];
       $table_name = 'log_admin';
        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
       // echo "SELECT usr_nme FROM $table_name WHERE user_id = '$user_id' LIMIT 1";die();
        if ($stmt = $mysqli->prepare("SELECT usr_nme,pass_d FROM $table_name WHERE user_id = '$user_id' LIMIT 1")) {
            // Bind "$user_id" to parameter.
            //$stmt->bind_param('s',$user_id);
            $stmt->execute();   // Execute the prepared query.
            $stmt->store_result();
            if ($stmt->num_rows == 1) {
                // If the user exists get variables from result.
                $stmt->bind_result($user_nme,$password);
                $stmt->fetch();
                $privateKey = simple_encrypt1($password.session_id());
               $login_check = crypt($user_nme.$user_browser,$privateKey);
                if (hash_equals($login_check, $login_string) )
                {
                    // Logged In!!!! 
                   
                    return true;
                }
                else
                {
                    // Not logged in 

                    return false;
                }
            } else {
                // Not logged in 

                return false;
            }
        } else {

            // Not logged in 
            return false;
        }
    } else {
        // Not logged in 
        return false;
    }
}
?>