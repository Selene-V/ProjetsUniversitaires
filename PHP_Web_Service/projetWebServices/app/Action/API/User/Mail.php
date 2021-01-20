<?php


namespace App\Action\API\User;

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Entity\User;

class Mail
{

    public static function mail(User $user){
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {

            $mail->CharSet = 'UTF-8';
            //Enable SMTP debugging.
            $mail->SMTPDebug = 3;
            //Set PHPMailer to use SMTP.
            $mail->isSMTP();
            //Set SMTP host name
            $mail->Host = "smtp.gmail.com";
            //Set this to true if SMTP host requires authentication to send email
            $mail->SMTPAuth = true;
            //Provide username and password
            $mail->Username = "developpeurweb.test@gmail.com";
            $mail->Password = "developpeur1?";
            //If SMTP requires TLS encryption then set it
            $mail->SMTPSecure = "tls";
            //Set TCP port to connect to
            $mail->Port = 587;


            //Recipients
            $mail->setFrom('bienvenue@duelquizz.fr', 'DuelQuizz');
            $mail->addAddress($user->getEmail(), $user->getFirstName() . ' ' . $user->getLastName());


            // Content
            $username = $user->getUsername();
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Bienvenue sur DuelQuizz !';
            $mail->Body    = '<header><h1>Bienvenue sur DuelQuizz '.$username.' !</h1></header><p>Vous pouvez des à présent jouer en mode solo ou en mode duel !</p>';
            $mail->AltBody    = 'Bienvenue sur DuelQuizz '.$username.' !Vous pouvez des à présent jouer en mode solo ou en mode duel !';

            $mail->send();
            echo 'Message has been sent';
            // redirection page d'accueil
//            header();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: . $mail->ErrorInfo";
        }
    }
}