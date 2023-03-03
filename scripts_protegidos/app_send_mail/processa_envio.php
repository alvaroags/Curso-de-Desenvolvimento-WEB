<?php
    require "./phpmailer/SMTP.php";
	require "./phpmailer/Exception.php";
	require "./phpmailer/OAuth.php";
	require "./phpmailer/PHPMailer.php";
	require "./phpmailer/POP3.php";

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
foreach ($_POST as $id => $msg){
    $mensagem->__set($id, $msg);
}
// print_r($mensagem);
if (!$mensagem->mensagemValida()) {
    header('Location: index.php?valida=erro');
    die();
}
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = false;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '';                 // SMTP username
    $mail->Password = '';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 1;                                    // TCP port to connect to

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
} catch (Exception $e) {
    $mensagem->status['codigo_status'] = 2;
    $mensagem->status['descricao_status'] = 'Não foi possivel enviar este email. Por favor tente mais tarde<br>Mailer Error: ' . $mail->ErrorInfo;
}

?>

<html>
    <head>
        <meta charset="utf-8" />
    	<title>App Mail Send</title>

    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
				<h2>Send Mail</h2>
				<p class="lead">Seu app de envio de e-mails particular!</p>
			</div>
            <div class="row">
                <div class="col-md-12">
                    <?php if($mensagem->status['codigo_status'] == 1){
                    ?>
                       <div class="container">
                            <h1 class="display-4 text-success">Sucesso</h1>
                            <p><?= $mensagem->status['descricao_status']?></p>
                            <a href="index.php" class="btn btn-success btn-lg mt-5 text-white">Voltar</a>
                       </div> 
                    <?php } ?>
                    <?php if($mensagem->status['codigo_status'] == 2){
                    ?>
                       <div class="container">
                            <h1 class="display-4 text-danger">Ops!</h1>
                            <p><?= $mensagem->status['descricao_status']?></p>
                            <a href="index.php" class="btn btn-success btn-lg mt-5 text-white">Voltar</a>
                       </div> 
                    <?php } ?>
                </div>
            </div>
        </div>
    </body>
</html>