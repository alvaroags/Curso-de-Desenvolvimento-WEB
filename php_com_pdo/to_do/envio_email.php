<?php

    require "./vendor/phpmailer/phpmailer/src/Exception.php";
    require "./vendor/phpmailer/phpmailer/src/SMTP.php";
    require "./vendor/phpmailer/phpmailer/src/OAuth.php";
    require "./vendor/phpmailer/phpmailer/src/PHPMailer.php";
    require "./vendor/phpmailer/phpmailer/src/POP3.php";
    require "./validador.login.php";
    use \PHPMailer\PHPMailer\PHPMailer;
    use \PHPMailer\PHPMailer\Exception;
    use \PHPMailer\PHPMailer\SMTP;
    use function CommonMark\Render\HTML;

    class Mensagem{
        private $para = null;
        private $assunto = null;
        private $mensagem = null;
        public $status = array('codigo_status' => null, 'descricao_status' => '');
        public function __get($name)
        {
            return $this->$name;
        }
        public function __set($name, $value)
        {
            $this->$name = $value;
        }
        public function mensagemValida(){
            if(!filter_var($this->para, FILTER_VALIDATE_EMAIL) || empty($this->assunto) || empty($this->mensagem)){
                return false;
            } else{
                return true;
            }
        }
    
    }

    $mensagem = new Mensagem();
    $mensagem->__set('para', $_SESSION['email']);
    $mensagem->__set('assunto', 'Nova tarefa adicionada');
    $texto = "A tarefa {$_POST['tarefa']} foi adicionada com sucesso!";
    $mensagem->__set('mensagem', $texto);
    
    // if ($mensagem->mensagemValida()) {
    //     header('Location: index.php?insercao=false');
    //     die();
    // }

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = false;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'alvarogsilva.neto@gmail.com';                 // SMTP username
        $mail->Password = 'lwkhlgbumdhvcrap';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom($mail->Username);
        $mail->addAddress($mensagem->__get('para'));     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
    
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $mensagem->__get('assunto');
        $mail->Body    = $mensagem->__get('mensagem');
        $mail->AltBody = 'É necessario utilizar um chat com suporte a exibição em html';
    
        $mail->send();
        $mensagem->status['codigo_status'] = 1;
        $mensagem->status['descricao_status'] = 'Email enviado com sucesso';
        header('Location: index.php?insercao=true');
    } catch (Exception $e) {
        $mensagem->status['codigo_status'] = 2;
        $mensagem->status['descricao_status'] = 'Não foi possivel enviar este email. Por favor tente mais tarde<br>Mailer Error: ' . $mail->ErrorInfo;
        echo $mensagem->status['descricao_status'];
        header('Location: index.php?insercao=false');
    }
?>