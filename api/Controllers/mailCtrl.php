<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
class Mail {
    public $response;
    private $to = 'nmarias38@misena.edu.co';
    function __construct($action) {
        header('Allow-Methods: POST');
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == 'POST') {
            $this->sendMail($action);        
        } else $this->displayError('Los mails solo se permiten por método post');
    }
    private function sendMail($action) {
        if(isset($_POST['from']) && isset($_POST['phone']) && isset($_POST['name']) && isset($_POST['document'])) {
            $subject = null;
            $from = $_POST['from'];
            $phone = $_POST['phone'];
            $name = $_POST['name'];
            $document = $_POST['document'];
            switch($action) {
                case 'reconection': 
                    $subject = "Solicito una reconneción.";
                break;
            }
            $mail = new PHPMailer(true);
            try {
                $mail->IsSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = "ssl";
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 465;
                $mail->CharSet = 'utf-8';
                $mail->Username = "nicolasarias870@gmail.com";
                $mail->Password = "nico3103407674";
                $mail->From = $from;
                $mail->FromName = $name;
                $mail->Subject = $subject;
                $mail->AltBody = "Solicitud de  reconeccion.";
                $mail->MsgHTML("Mis datos son: <br> <b>Nombre:</b> $name. <br>
                <b>Teléfono:</b> $phone. <br>
                <b>Documento:</b> $document. <br>");
                $mail->AddAddress($this->to, 'Publiservicios');
                $mail->IsHTML(true);
                if(!$mail->Send()) {
                    $this->response = "Error: " . $mail->ErrorInfo;
                } else {
                    $this->response = "Mensaje enviado correctamente";
                }
            } catch (Exception $e) {
                $this->response = 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
            }
        } else {
            $this->displayError('Falta algun dato');
        }
    }
    private function displayError($message) {
        $this->response = array(
            'status' => 400,
            'message' => $message
        );
    }
}