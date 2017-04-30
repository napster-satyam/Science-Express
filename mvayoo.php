<?php
	if(isset($_POST["submit"]))
	{
			echo "SUBMITTED\n";
			$mno = $_POST["mno"];
			$message = $_POST["message"];
			echo $message;
			if(preg_match('/^[A-Z0-9]{10}$/',$mno) && !empty($message))
			{
				$ch = curl_init();
				$user="rishabh25barman@gmail.com:Rishabh123,";
				$receipientno="$mno"; 
				$senderID="TEST SMS"; 
				$msgtxt=$message; 
				curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
				$buffer = curl_exec($ch);
				echo $buffer;
				if(empty ($buffer))
					{ echo " buffer is empty "; }
				else
					{ echo $buffer; 
					  echo "MESSAGE SEND";
					} 
				curl_close($ch);
			}
				else {
						echo "Not Valid Info.";
					}
	}
?>


<html>
	<head>
		<title></title>
	</head>
	<body align = "centre">
		<h3>SMS sending using php and Mvayoo API</h3>
			<form action="" method="post">
				Enter mobile no<br>
				<input type="text" name="mno"><br>
				Message<br>
				<textarea type="text" name="message"></textarea><br>
				<br>
				<input type="submit" name="submit" value="Send"/>
			</form>
	</body>
	</html>
