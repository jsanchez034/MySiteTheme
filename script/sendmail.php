<?php

$from = $_REQUEST['email'] ;
// subject
$subject = 'Email from My Site';

$fullname = '<p><span style="font-weight:bold;">Name</span>:&nbsp;'. $_REQUEST['name'] .'</p>';
$message = '<p><span style="font-weight:bold;">Message</span>:&nbsp;'. $_REQUEST['message'] .'</p>';

$html = <<<END
<html>
	<body>
		$fullname $message
	</body>
</html>
END;

$html = stripcslashes($html);

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: ' . $from . "\r\n" .
            'Reply-To: ' . $from . "\r\n";
			

mail('jsanc034@gmail.com', $subject, $html, $headers);  //sales@bigeastequipment.com
?>