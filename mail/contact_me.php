<?php

// Check for empty fields
if(empty($_POST['vards']) ||
   empty($_POST['uzvards']) ||
   empty($_POST['dzimums']) ||
   empty($_POST['dzd']) ||
   empty($_POST['profesija']) ||
   empty($_POST['specialitate']) ||
   empty($_POST['darbavieta']) ||
   empty($_POST['darbaadrese']) ||
   empty($_POST['majasadrese']) ||
   empty($_POST['kliniskasintereses']) ||
   empty($_POST['lllprogramma']) ||
   empty($_POST['epasts']) ||
   empty($_POST['telefons']) ||
   !filter_var($_POST['epasts'],FILTER_VALIDATE_EMAIL)) {
	    echo "Kļūda! Netika aizpildīti obligātie lauki!";
	    return false;
}

$vards = strip_tags(htmlspecialchars($_POST['vards']));
$uzvards = strip_tags(htmlspecialchars($_POST['uzvards']));
$dzimums = strip_tags(htmlspecialchars($_POST['dzimums']));
$dzd = strip_tags(htmlspecialchars($_POST['dzd']));
$profesija = strip_tags(htmlspecialchars($_POST['profesija']));
$specialitate = strip_tags(htmlspecialchars($_POST['specialitate']));
$darbavieta = strip_tags(htmlspecialchars($_POST['darbavieta']));
$darbaadrese = strip_tags(htmlspecialchars($_POST['darbaadrese']));
$majasadrese = strip_tags(htmlspecialchars($_POST['majasadrese']));
$kliniskasintereses = strip_tags(htmlspecialchars($_POST['kliniskasintereses']));
$lllprogramma = strip_tags(htmlspecialchars($_POST['lllprogramma']));
$epasts = strip_tags(htmlspecialchars($_POST['epasts']));
$telefons = strip_tags(htmlspecialchars($_POST['telefons']));

// Create the email and send the message
$to = '<add-email-account-address-here>'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Biedra reģistrācija (" . $vards . " " . $uzvards . ")";
$email_body = "Jums ir iesniegta jauna biedra reģistrācijas anketa.\n\n" .
              "Reģistrācijas dati:\n
              Vārds: $vards\n
              Uzvārds: $uzvards\n
              Dzimums: $dzimums\n
              Dzimšanas datums: $dzd\n
              Profesija: $profesija\n
              Specialitāte: $specialitate\n
              Darba vieta: $darbavieta\n
              Darba adrese: $darbaadrese\n
              Korespondences adrese: $majasadrese\n
              Klīniskās intereses: $kliniskasintereses\n
              Vai reģistrējies LLL programmā: $lllprogramma\n
              E-pasta adrese: $epasts\n
              Telefona numurs: $telefons\n";

$headers = "From: $epasts\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $epasts\n";
$headers .= "Content-length: 400";

$sent = mail($to,$email_subject,$email_body,$headers);

?>
