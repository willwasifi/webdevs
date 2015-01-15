

<?php
//30 * * * *
//date_default_timezone_set('Asia/Tokyo');
date_default_timezone_set('America/Los_Angeles');
$date = date('mdHi', time());
echo $date;
echo "fff";

$user = 'root';
$password = 'root';
$db = 'mysql';
$host = 'localhost:3306';
$port = 3306;

$link = mysql_connect(
   $host, 
   $user, 
   $password
);
if(!$link )
{
  die('Could not connect: ' . mysql_error());
}

$sql= "SELECT message FROM message WHERE `tstamp`<='$date'";
mysql_select_db($db);


$ret= mysql_query($sql,$link);
//$retval=mysql_fetch_row($ret);
//echo $retval[0];
//echo $retval['message'];

$fullmessage="<br>";

while($row = mysql_fetch_array($ret)) {
	$fullmessage=$fullmessage.$row['message']."<br>";
//echo $row['message'];
}

echo $fullmessage;

require_once 'swiftmailer/lib/swift_required.php';

// Mail Transport
$transport = Swift_SmtpTransport::newInstance('ssl://smtp.gmail.com', 465)
    ->setUsername('willwasifi@gmail.com') // Your Gmail Username
    ->setPassword('hiddenforlab4'); // Your Gmail Password

// Mailer
$mailer = Swift_Mailer::newInstance($transport);

// Create a message
$message = Swift_Message::newInstance('Cronjob Messages')
    ->setFrom(array('willwasifi@gmail.com' => 'Sender Name')) // can be $_POST['email'] etc...
    ->setTo(array('willwasifi@gmail.com' => 'Receiver Name')) // your email / multiple supported.
    ->setBody($fullmessage, 'text/html');

// Send the message
if ($mailer->send($message)) {
    echo 'Mail sent successfully.';
} else {
    echo 'I am sure, your configuration are not correct. :(';
}



?>
