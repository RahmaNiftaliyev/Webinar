<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$smtpHost = "mail.mail@mail.com";
$smtpPort = 26;

$smtpUsername = 'mail@mail.com';
$smtpPassword = 'password';

$emailFrom = $smtpUsername;
$emailFromName = 'AITONIX Webinar';

if(!empty($_POST['inputFname']) && !empty($_POST['inputLname']) && !empty($_POST['inputEmail']) && !empty($_POST['inputJtitle']) && !empty($_POST['inputCompany'])){
    $fname = $_POST['inputFname'];
    $lname = $_POST['inputLname'];
    $mailFrom = $_POST['inputEmail'];
    $jtitle = $_POST['inputJtitle'];
    $company = $_POST['inputCompany'];
    $pNumber = $_POST['inputPhone'];

    include_once($_SERVER['DOCUMENT_ROOT']."/_DatabaseConnection.php");
    $sql = "
        select email 
        from applicants as a 
        where a.email = ? 
        limit 1 
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $mailFrom);
    $stmt->execute();
    $result = $stmt->get_result();
    $outp = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    
    if ($result->num_rows > 0){
        echo 'Веќе постои регистриран корисник со внесената емаил адреса';
    }
    else{
        $sql = "
            insert into applicants(firstName, lastName, email, jobTitle, company,phoneNumber, appliedDateTime)
            values (?, ?, ?, ?, ?, ?, now())
        ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $fname, $lname, $mailFrom, $jtitle, $company,$pNumber);
        $stmt->execute();
        $stmt->close();
        echo 'Ќе праќаме мејл';
        
        $userEmailTo = $mailFrom;
        $userEmailToName =  $fname.' '.$lname;
                
        $mailToUser = new PHPMailer;
        $mailToUser->isSMTP(); 
        $mailToUser->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
        $mailToUser->Host = $smtpHost; 
        $mailToUser->Port = $smtpPort; 
        $mailToUser->SMTPSecure = 'tls';
        $mailToUser->SMTPAuth = true;
        $mailToUser->Username = $smtpUsername;
        $mailToUser->Password = $smtpPassword;
        $mailToUser->setFrom($emailFrom, $emailFromName);
        $mailToUser->addAddress($userEmailTo, $userEmailToName);
        $mailToUser->Subject = 'Registration';
        // $mailToUser->msgHTML('<body style="background-color: black; color: white;">Dear '.$fname.' '.$lname.', <br><br>Your registration is <b style="color:green;">successfull</b> </body>');
      
        $mailToUser->msgHTML('<!DOCTYPE html>
        <html lang="en">
          <head>
            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="stylesheet" href="style.css" />
            <link
              rel="stylesheet"
              href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
              integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
              crossorigin="anonymous"
            />
            <title>Webinar</title>
          </head>
          <body style="background-color: black !important; color: white !important;">
            <div class="container">
              <div class="pt-5 mt-5">
                <div class="logos d-flex justify-content-between">
                  <div class="logo">
                    <img
                      src="logoAitonix.png"
                      alt="logo"
                      width="150px"
                      class="img-fluid"
                    />
                  </div>
        
                  <div class="">
                    <img
                      src="logoDellT.png"
                      alt="logo"
                      width="150px"
                      class="img-fluid"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="container">
              <div class="row pt-5 mt-5">
                <div class="heroImage d-flex justify-content-center">
                  <img
                    src="Artboard 1.png"
                    alt="HeroImage"
                    width="100%"
                    class="img-fluid"
                  />
                </div>
              </div>
            </div>
            <h3>Dear, '.$fname.'  '.$lname.' From  '.$company. '</h3>
            <p>Your registration has been successfull, thank you for registering to the Webinar.<br>Hope you will have a nice time.</p>
            <script
              src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
              integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
              crossorigin="anonymous"
            ></script>
            <script
              src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
              integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
              crossorigin="anonymous"
            ></script>
          </body>
        </html>
        ');
                  
        
        $mailToUser->AltBody = 'Dear '.$fname.' '.$lname.' Your registration is successfull';        

        if(!$mailToUser->send()){
            echo "Mailer Error: " . $mailToUser->ErrorInfo;
        }else{
            echo "Message sent!";
        }

        $companyEmailTo = 'antonio.karapec@outlook.com';
        $companyEmailToName = '';

        $mailToCompany = new PHPMailer;
        $mailToCompany->isSMTP(); 
        $mailToCompany->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
        $mailToCompany->Host = $smtpHost; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
        $mailToCompany->Port = $smtpPort; // TLS only
        $mailToCompany->SMTPSecure = 'tls'; // ssl is depracated
        $mailToCompany->SMTPAuth = true;
        $mailToCompany->Username = $smtpUsername;
        $mailToCompany->Password = $smtpPassword;
        $mailToCompany->setFrom($emailFrom, $emailFromName);
        $mailToCompany->addAddress($companyEmailTo, $companyEmailToName);
        $mailToCompany->Subject = 'Registration';
        $mailToCompany->msgHTML('New user is registered:<br><br>'.$fname.' '.$lname.' from '.$company); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
        $mailToCompany->AltBody = 'New user is registered '.$fname.' '.$lname.' from '.$company;
        // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

        if(!$mailToCompany->send()){
            echo "Mailer Error: " . $mailToCompany->ErrorInfo;
        }else{
            echo "Message sent!";
        }

        header("location: index.php?mailsend");
    }
}
?>