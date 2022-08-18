<?php

/*************helper functions***************/

function clean($string) {

    return htmlentities($string);
}

function redirect($location) {

    return header("Location: {$location}");
}

function set_message($message) {

    if(!empty($message)) {

        $_SESSION['message'] = $message;

        }else {

            $message = "";
        }
}



function display_message() {

    if(isset($_SESSION['message'])) {

        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function token_generator() {

    $token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));

    return $token; 
}

function otp() {

    $otp = $_SESSION['otp'] = mt_rand(0, 9999);

    return $otp; 
}

function validation_errors($error_message) {

    $error_message = <<<DELIMITER

    <div class="col-md-12 alert alert-danger alert-mg-b alert-success-style6 alert-st-bg3 alert-st-bg14">
        <button type="button" class="col-md-12 close sucess-op" data-dismiss="alert" aria-label="Close">
            <span class="icon-sc-cl" aria-hidden="true">&times;</span>
        </button>
        <p><strong>$error_message </strong></p>
    </div>

    DELIMITER;

    return $error_message;     

}


function validator($error_message) {

    $error_message = <<<DELIMITER
    <div style="background: #FFE9E6; color: #ff0000;" class="col-md-12 alert alert-danger alert-mg-b alert-success-style6 alert-st-bg3 alert-st-bg14">
        <button type="button" style="color: white;" class="col-md-12 close sucess-op" data-dismiss="modal" aria-label="Close">
            <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                                        </button>
                    <p><strong>$error_message </strong></p>
                                </div>
    DELIMITER;

    return $error_message;     

}


/****** Helper Functions********/

function email_exist($email) {

    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = query($sql);

    if(row_count($result) == 1) {

        return true;

    } else {

        return false;
    } 
}



function usname_exist($usname) {

    $sql = "SELECT * FROM `users` WHERE `usname` = '$usname'";
    $result = query($sql);

    if(row_count($result) == 1) {

        return true;

    }else {

        return false;
    } 
}



/** VALIDATE USER REGISTRATION **/
if(isset($_POST['fname']) && isset($_POST['usname']) && isset($_POST['catgy']) && isset($_POST['email']) && isset($_POST['pword']) && isset($_POST['cpword']) && isset($_POST['ref']) && isset($_POST['inst']) && isset($_POST['abt'])) {

    $fname          = clean(escape($_POST['fname']));
    $usname         = clean(escape($_POST['usname']));
    $caty           = clean(escape($_POST['catgy']));
    $email          = clean(escape($_POST['email']));
    $pword          = clean(escape($_POST['pword']));
    $cpword         = clean(escape($_POST['cpword']));
    $ref            = clean(escape($_POST['ref']));
    $inst           = clean(escape($_POST['inst']));
    $abt            = clean(escape($_POST['abt']));

   
        if(email_exist($email)) {

            echo "This email address is already registered. <br/> Please sign in with your registered email details or enter a new email address.";
        }else {

            if (usname_exist($usname)) {

                echo "Someone has already chosen that username.";
    
            } else {


                register($fname, $usname, $email, $pword, $ref, $caty, $inst, $abt);
                
            }

        }  

}

    

/** REGISTER USER **/
function register($fname, $usname, $email, $pword, $ref, $caty, $inst, $abt) {

    $fnam = escape($fname);
    $usname = escape($usname);
    $emai = escape($email);
    $pwor = md5($pword);
    $ref  = escape($ref);
    $abtt = trim($abt);

    $datereg = date("Y-m-d h:i:s");

    $_SESSION['usermail'] = $emai;
        
    $activator = otp();
    
    $sql = "INSERT INTO users(`idd`, `fullname`, `usname`, `email`, `password`, `role`, `date_reg`, `status`, `active`, `lastseen`, `ref`, `wallet`, `bio`, `inst`)";
    $sql.= " VALUES('1', '$fnam', '$usname', '$emai', '$pwor', '$caty', '$datereg', '$activator', '0', '$datereg', '$ref', '0', '$abtt', '$inst')";
    $result = query($sql);

    //redirect to verify function
    $subj = "Activate Your Account";
    
    $msg = <<<DELIMITER

    <tr>
    <p style="color: black; font-weight: bold; margin-top: 24px !important;">👋 Welcome to Unistudent Match. </p>
    </tr>
    <tr>
    <p style="color: black; margin-top: 8px !important;">✨ You are one-click towards activating your account and becoming part of the tribe</p>
    </tr>
    <tr>
    <p style="color: black; margin-top: 8px !important;">⬇️ Kindly use the code below to activate your account for FREE!</p>
    </tr>
    <tr>
    <p style="color: black; margin-top: 8px !important;">🔒 Do not share this code outside our website or Mobile App</p>
    </tr>
    <tr>
    <div style="text-align: center !important; margin-top: 24px !important; margin-bottom: 8px !important; justify-content: center !important;">
    <button style="background-color: #696cff; color: #fff; font-size: x-large; border: none; padding: 0.4375rem 1.25rem; border-radius: 0.4rem;">$activator</button>
    </div>
    </tr>  
    <tr>
    <p style="color: black; margin-bottom: 32px !important;">💃 That's it! We can't wait to see you 🤭</p>
    </tr>
    
    DELIMITER;
    
    mail_mailer($email, $activator, $subj, $msg);

    //open otp page
    echo 'Loading... Please Wait!';
    echo'<script>otpVerify(); signupClose();</script>';
}



/* MAIL VERIFICATIONS */
function mail_mailer($email, $activator, $subj, $msg) {

    $to = $email;
    $from = "info@unistudentsmatch.com";

    $headers = "From: Unistudent Match ". $from . "\r\n";
    $headers .= "Reply-To: ". $from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "X-Priority: 1 (Highest)\n";
    $headers .= "Priority: urgent\n";
    $headers .= "X-MSMail-Priority: High\n";
    $headers .= "Importance: High\n";

    $subject = $subj;

    $body = <<<DELIMITER

            <html>
                <meta charset="utf-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

                <body style="background-color: #eaebed;  font-family: sans-serif;  font-size: 14px; line-height: 1.4; margin-bottom: 2rem !important; padding: 0;">


                <div style="text-align: center !important; justify-content: center !important;">
                <img style="max-width: 100%; height: auto; vertical-align: middle; box-sizing: border-box; width: 120px; margin-top: 24px !important;" src="https://unistudentsmatch.com/img/logo.png">
                </div>

                <div style="margin-right: 5%; margin-left: 5%;">

                    <div style="padding-right: 1.105rem; padding-left: 1.105rem; margin-top: 24px !important; background-color: #fff; position: relative; display: flex; flex-direction: column; height: auto; word-wrap: break-word; background-clip: border-box; border: 0 solid #d9dee3; border-radius: 8px;">

                   $msg


                   </div>



                </div>


                <div style="text-align: center !important; margin-top: 19px !important; justify-content: center !important;">
                <p style="color: grey">&copy; Unistudent Match Team </p>

    
                </div>

               <tr></tr> 


              </body>
            </html>
            
    DELIMITER;
    
    $send = mail($to, $subject, $body, $headers, '-finfo@unistudentsmatch.com');
}


//notify users mail
function notify_user($username, $email, $msg, $subj) {

    $to = $email;
    $from = "info@unistudentsmatch.com";

    $headers = "From: Unistudent Match ". $from . "\r\n";
    $headers .= "Reply-To: ". $from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "X-Priority: 1 (Highest)\n";
    $headers .= "Priority: urgent\n";
    $headers .= "X-MSMail-Priority: High\n";
    $headers .= "Importance: High\n";

    $subject = $subj;

    $body = <<<DELIMITER


            <html>
                <meta charset="utf-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

                <body style="background-color: #eaebed;  font-family: sans-serif;  font-size: 14px; line-height: 1.4; margin-bottom: 2rem !important; padding: 0;">


                <div style="text-align: center !important; justify-content: center !important;">
                <img style="max-width: 100%; height: auto; vertical-align: middle; box-sizing: border-box; width: 120px; margin-top: 24px !important;" src="https://unistudentsmatch.com/img/logo.png">
                </div>

                <div style="margin-right: 5%; margin-left: 5%;">

                    <div style="padding-right: 1.105rem; padding-left: 1.105rem; margin-top: 24px !important; background-color: #fff; position: relative; display: flex; flex-direction: column; height: auto; word-wrap: break-word; background-clip: border-box; border: 0 solid #d9dee3; border-radius: 8px;">

                   $msg


                   </div>



                </div>


                <div style="text-align: center !important; margin-top: 19px !important; justify-content: center !important;">
                <p style="color: grey">&copy; Team Unistudent Match</p>

                </div>

               <tr></tr> 


              </body>
            </html>
    
    DELIMITER;
    
    $send = mail($to, $subject, $body, $headers, '-finfo@unistudentsmatch.com');
    
}


/** RESEND OTP */
if(isset($_POST['otpp'])) {

    $otpp = clean(escape($_POST['otpp']));
    
    $email = $_SESSION['usermail'];
    
    $activator = otp(); 

    $sql = "UPDATE users SET `status` = '$activator', `verified` = 'No' WHERE `email` = '$email'";
    $res = query($sql);

    $subj = "NEW OTP REQUEST";
    
    $msg = <<<DELIMITER

                <tr>
                <p style="color: black; font-weight: bold; margin-top: 24px !important;">🔏 You requested for a new OTP Code </p>
                </tr>
                <tr>
                <p style="color: black; margin-top: 8px !important;">⬇️ Kindly use the code below to continue into your account</p>
                </tr>
                <tr>
                <p style="color: black; margin-top: 8px !important;">🔒  Do not share this code outside Books In Vogue website or Mobile App</p>
                </tr>
                

                    <tr>
                <div style="text-align: center !important; margin-top: 24px !important; margin-bottom: 8px !important; justify-content: center !important;">
                <button style="background-color: #696cff; color: #fff; font-size: x-large; border: none; padding: 0.4375rem 1.25rem; border-radius: 0.4rem;">$activator</button>
                </div>

                </tr>  

                <tr>
                <p style="color: black; margin-bottom: 32px !important;">⚡ If you didn't request for this mail, kindly ignore it.</p>
                </tr>

    DELIMITER;
    
    mail_mailer($email, $activator, $subj, $msg);
    echo "New OTP Code sent to your email";
}


/**Activate OTP ACCOUNT */
if(isset($_POST['votp'])) {

    $email = $_SESSION['usermail'];
    $veotp = clean(escape($_POST['votp']));


    //select the otp stored in the user database
    $ssl = "SELECT * from users WHERE `email` = '$email'";
    $res = query($ssl);

    if(row_count($res) == null) {
        
        echo "There was an error validating your OTP. <br/> Please try again later.";

    } else {

        $row = mysqli_fetch_array($res);

        $votp = $row['status'];

        if($veotp != $votp) {

            echo "Invalid OTP Code!";
            
        } else {

            //update database and auto-login
            $sql = "UPDATE users SET `status` = '2', `verified` = 'Yes' WHERE `email` = '$email'";
            $rsl = query($sql);

            $user = $row['usname'];

            //forgot password recovery page
            if(!isset($_SESSION['vnext'])) {

                $username = $user;
                
                $role = $row['role'];

                $subj = "You are Welcome";

                $msg = <<<DELIMITER

                            <tr>
                            <p style="color: black; font-weight: bold; margin-top: 24px !important;">🥳 Welcome to Unistudent Match </p>
                            </tr>
                            <tr>
                            <p style="color: black; margin-top: 8px !important;">Hi there,</p>
                            </tr>
                            <tr>
                            <p style="color: black; margin-top: 8px !important;">We are super excited to have you on Unistudent Match</p>
                            </tr>
                            <tr>
                            <p style="color: black; margin-top: 8px !important;">Unistudent Match is a platform designed to help you connect with the right person in a halal way.</p>
                            </tr>
                            <tr>
                            <p style="color: black; margin-top: 8px !important;">We will continue to enhance the experience of our interfaces to ensure that you enjoy a seamless reading feel.</p>
                            </tr>
                            <tr>
                            <p style="color: black; margin-top: 8px !important;">Got any issues, complaint or request? Kindly chat with us on our <a target="_blank" href="https://unistudentsmatch.com/contact">live chat support panel</a></p>
                            </tr>
                            <tr>
                            <p style="color: black; margin-top: 8px !important;">Do have a wonderful book experience</a></p>
                            </tr>
                            <tr>
                            <p style="color: black; margin-bottom: 32px !important;">⚡ Best Regards</p>
                            </tr>

                DELIMITER;

                //notify user that passowrd has been changed
                notify_user($username, $email, $msg, $subj);

                //redirect to user dashboard according to user category
                echo 'Loading... Please Wait!';
                $_SESSION['login'] = $user;
                
                echo '<script>window.location.href ="dashboard/./"</script>';

                } else {
                    
                    $data = $_SESSION['vnext'];
                    echo '<script>'.$data.'</script>';
                }
        }
    }
}


    

/** SIGN IN USER **/
if(isset($_POST['username']) && isset($_POST['password'])) {

        $username        = clean(escape($_POST['username']));
        $password        = md5($_POST['password']);

        $sql = "SELECT * FROM `users` WHERE `usname` = '$username' OR `email` = '$username' AND `password` = '$password'";
        $result = query($sql);
        
        if(row_count($result) == 1) {

            $row        = mysqli_fetch_array($result);

            $user       = $row['usname'];
            $email      = $row['email'];
            $activate   = $row['verified'];
            $role       = $row['role'];
            

            if ($activate == 'No') {

                $activator = otp();

                $_SESSION['usermail'] = $email;

                //update activation link
                $ups = "UPDATE users SET `status` = '$activator', `verified` = 'No' WHERE `usname` = '$username'";
                $ues = query($ups);

                //redirect to verify function
                $subj = "Activate Your Account";
    
                $msg = <<<DELIMITER

                            <tr>
                            <p style="color: black; font-weight: bold; margin-top: 24px !important;">👋 Welcome to Unistudent Match. </p>
                            </tr>
                            <tr>
                            <p style="color: black; margin-top: 8px !important;">✨ You are one-click towards activating your account and becoming part of the tribe</p>
                            </tr>
                            <tr>
                            <p style="color: black; margin-top: 8px !important;">⬇️ Kindly use the code below to activate your account for FREE!</p>
                            </tr>
                            <tr>
                            <p style="color: black; margin-top: 8px !important;">🔒 Do not share this code outside our website or Mobile App</p>
                            </tr>
                            
                            <tr>
                            <div style="text-align: center !important; margin-top: 24px !important; margin-bottom: 8px !important; justify-content: center !important;">
                            <button style="background-color: #696cff; color: #fff; font-size: x-large; border: none; padding: 0.4375rem 1.25rem; border-radius: 0.4rem;">$activator</button>
                            </div>

                            </tr> 
                                
                            <tr>
                            <p style="color: black; margin-bottom: 32px !important;">💃 That's it! We can't wait to see you 🤭</p>
                            </tr>
                
                DELIMITER;

                mail_mailer($email, $activator, $subj, $msg);

                //open otp page
                echo 'Loading... Please Wait!';
                echo '<script>otpVerify(); signupClose();</script>';

                
            }  else {

                echo 'Loading... Please Wait!';
                $_SESSION['login'] = $user;
                echo '<script>window.location.href ="dashboard/./"</script>';
        } 

    }  else {
        
        echo 'Wrong username or password.';
    }
}


/** FORGOT PASSWORD **/
if(isset($_POST['fgeml'])) {
    
    $email  = clean(escape($_POST['fgeml']));

    $_SESSION['usermail'] = $email;

    if(!email_exist($email)) {

        echo "Sorry! This email doesn't have an account";
        
    } else {

    $activator = otp();

    $ssl = "UPDATE users SET `status` = '$activator', `verified` = 'No' WHERE `email` = '$email'";
    $rsl = query($ssl);

    //redirect to verify function
    $subj = "RESET YOUR PASSWORD";
    $msg = <<<DELIMITER

            <tr>
            <p style="color: black; font-weight: bold; margin-top: 24px !important;">😎 Let's get you back into your account </p>
            </tr>
            <tr>
            <p style="color: black; margin-top: 8px !important;">⬇️ Kindly use the code below to continue into your account</p>
            </tr>
            <tr>
            <p style="color: black; margin-top: 8px !important;">🔒  Do not share this code outside our website or Mobile App</p>
            </tr>
           
            
            <tr>
            <div style="text-align: center !important; margin-top: 24px !important; margin-bottom: 8px !important; justify-content: center !important;">
            <button style="background-color: #696cff; color: #fff; font-size: x-large; border: none; padding: 0.4375rem 1.25rem; border-radius: 0.4rem;">$activator</button>
           </div>

            </tr> 

            <tr>
            <p style="color: black; margin-bottom: 32px !important;">⚡ If you didn't request for this mail, kindly ignore it.</p>
            </tr>

    DELIMITER;

    mail_mailer($email, $activator, $subj, $msg);

    //open otp page
    echo 'Loading... Please Wait!';
    $_SESSION['vnext'] = "updatePword();";
    echo '<script>otpVerify(); signupClose();</script>';

    }
}



/** RESET PASSWORD **/
if(isset($_POST['fgpword']) && isset($_POST['fgcpword'])) {

    $fgpword = md5($_POST['fgpword']);
    $eml = $_SESSION['usermail'];

    $sql = "UPDATE users SET `password` = '$fgpword', `status` = '1', `verified` = 'Yes' WHERE `email` = '$eml'";
    $rsl = query($sql);
    
    //get username and redirect to dashboard
    $ssl = "SELECT * FROM users WHERE `email` =  '$eml'";
    $rsl = query($ssl);
    
    if(row_count($rsl) == '') {
        
        echo 'Loading... Please Wait';
        echo '<script>window.location.href ="./signin"</script>';
        
    } else {

        $row  = mysqli_fetch_array($rsl);
        $username = $row['usname']; 
        $role = $row['role'];
        $email = $eml;
        $subj = "Your password was changed";

        $msg = <<<DELIMITER

                    <tr>
                    <p style="color: black; font-weight: bold; margin-top: 24px !important;">🔏 Your password has been updated </p>
                    </tr>
                    <tr>
                    <p style="color: black; margin-top: 8px !important;">Hi there,</p>
                    </tr>
                    <tr>
                    <p style="color: black; margin-top: 8px !important;">Your account password was just changed and has been updated.</p>
                    </tr>
                    <tr>
                    <p style="color: black; margin-top: 8px !important;">Ensure you use strong passwords and avoid sharing your details with any person, website or app aside Books In Vogue websites and mobile app</p>
                    </tr>
                    <tr>
                    <p style="color: black; margin-top: 8px !important;">If you didn't perform this action, kindly reply to this mail so we can help get back your account.</p>
                    </tr>
                    <tr>
                    <p style="color: black; margin-top: 8px !important;">Got any issues, complaint or request? Kindly chat with us on our <a target="_blank" href="https://unistudentsmatch.com/contact">live chat support panel</a></p>
                    </tr>
                    <tr>
                    <p style="color: black; margin-bottom: 32px !important;">⚡ Best Regards</p>
                    </tr>
    
        DELIMITER;
    
        //notify user that passowrd has been changed
        notify_user($username, $email, $msg, $subj);

        //redirect to user dashboard according to user category
        echo 'Loading... Please Wait!';
        $_SESSION['login'] = $username;
        echo '<script>window.location.href ="dashboard/./"</script>';
        
    }
}




// DASHBOARD FUNCTIONS FOR USER
function user_details() {

    if(!isset($_SESSION['login'])) {

        redirect("./logout");

    } else {

        $data = $_SESSION['login'];

        //users details
        $sql = "SELECT * FROM users WHERE `usname` = '$data' OR `email` = '$data'";
        $rsl = query($sql);

        $GLOBALS['t_users'] = mysqli_fetch_array($rsl);

        //set passport for empty passport
        if($GLOBALS['t_users']['passport'] == null && $GLOBALS['t_users']['passport'] == '') {
            
            $GLOBALS['passport'] = 'img/user.png';

        } else {

                $GLOBALS['passport'] = 'img/'.$GLOBALS['t_users']['passport'];
            }

        }
}


//send message
if(isset($_POST['msgbtn'])) {

    $a = clean(escape($_POST['message']));
    $b = date("Y-m-d h:i:s");
    $c = clean(escape($_POST['recmessage']));

    user_details();

    $d = $t_users['usname'];

   $sql = "INSERT INTO chat(`name`, `message`, `recipient`, `created_on`)";
   $sql.="VALUES('$d', '$a', '$c', '$b')";

   $res = query($sql);

   redirect("./message?user=$c");
}