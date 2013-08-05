<?php
if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])){
	$name = htmlentities($_POST['name']);
	$email = htmlentities($_POST['email']);
	$subject = "Contact ";
	$subject .= $_POST['blog_name'];
	$content = htmlentities($_POST['message']);
	$message = '<html><head><title>Title of E-mail</title></head><body>';
	$message .= '<p>Hello, you received an e-mail from your website.</p>';
	$message .= '<p><strong>Name</strong>: '.$name.'</p>';
	$message .= '<p><strong>E-mail</strong>: '.$email.'</p>';
	$message .= '<p><strong>Message</strong>: '.$content.'</p>';
	$message .= '</body></html>'; // Contenu du message de l'email (en XHTML)

	$headers = 'MIME-Version: 1.0'."\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";

	$to = (string) $_POST['mailTo'];

	mail($to, $subject, $message, $headers);
}
?>