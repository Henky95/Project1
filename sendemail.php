<?php include 'Shared/header.php';?>

<?php
    $msg = "";
	use PHPMailer\PHPMailer\PHPMailer;
	include_once "PHPMailer/PHPMailer.php";
	include_once "PHPMailer/Exception.php";
	include_once "PHPMailer/SMTP.php";

	if (isset($_POST['submit'])) {
		$subject = $_POST['subject'];
		$email = $_POST['email'];
		$message = $_POST['message'];

		$mail = new PHPMailer();

		//if we want to send via SMTP
		$mail->Host = "smtp.gmail.com";
		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->Username = "no.reply.studenthulp@gmail.com";
		$mail->Password = "zender project kwartaal 1";
		$mail->SMTPSecure = "ssl"; //TLS
		$mail->Port = 465; //587

		$mail->addAddress('StudentHulp.contact@gmail.com');
		$mail->setFrom($email);
		$mail->Subject = $subject;
		$mail->isHTML(true);
		$mail->Body = $email ."<br>". $message;

		if ($mail->send())
		    $msg = "Your email has been sent, thank you!";
		else
		    //$msg = "Please try again!";
			echo $mail->ErrorInfo;
	}
?>

	<div class="centered"
<br>
                <?php if ($msg != "") echo "$msg<br><br>"; ?>

				<form method="post" action="sendemail.php" enctype="multipart/form-data">
					<input class="nice" name="subject" placeholder="Subject..."><br><br>
					<input class="nice" name="email" type="email" placeholder="Email..."><br><br>
					<textarea placeholder="Message..." class="form-control" name="message"></textarea><br><br>
					<input class="centered" name="submit" type="submit" value="Send Email">
				</form>
	</div>

<?php include 'Shared/Footer.html';?>






