<?php
require 'connection.php';
require 'phpmailer/PHPMailerAutoload.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $email=$_POST['email'];
    
    $query=$conn->prepare("Select * from customer where email=?");
    $query->bind_param('s',$email);
    $query->execute();
    $result=$query->get_result();
    if($result->num_rows===0){
        echo 'Invalid email address';
        exit;
    }
    $token=bin2hex(random_bytes(16));
    $token_hash=password_hash($token, PASSWORD_BCRYPT);
    $insert_query = $conn->prepare("INSERT INTO tokens (email, token) VALUES (?, ?)");
    $insert_query->bind_param('ss', $email, $token_hash);
    $insert_query->execute();
    echo 'Token Generated';
    $url="http://localhost:8080/Project/reset_password.php?key=".$token;
    $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';

            // h-hotel account
            $mail->Username='alighader230@gmail.com';
            $mail->Password='Alighader16';

            // send by h-hotel email
            $mail->setFrom('alighader230@gmail.com', 'Password Reset');
            
            $mail->addAddress($_POST["email"]);
            

            // HTML body
            $mail->isHTML(true);
            $mail->Subject="Recover your password";
            $mail->Body="<b>Dear User</b>
            <h3>We received a request to reset your password.</h3>
            <p>Kindly click the below link to reset your password</p>
            http://localhost/login-System/Login-System-main/reset_psw.php
            <br><br>
            <p>With regrads,</p>
            <b>Programming with Lam</b>";

            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo " Invalid Email "?>");
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        window.location.replace("notification.html");
                    </script>
                <?php
            }

}








?>