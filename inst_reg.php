<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";

echo "hi";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$name = $_POST["name"];
$doe = $_POST["date"];
$mob = $_POST["phone"];
$email = $_POST["email"];
$city = $_POST["city"];





if(isset($_FILES['file'])){
	$file = $_FILES['file'];

	//file properties
	$file_name = $file['name'];
	$file_tmp = $file['tmp_name'];
	$file_size = $file['size'];
	$file_error = $file['error'];


	$file = $_FILES['file']['name'];
	$sql = "INSERT into institute VALUES ('$name',$doe,$mob,'$email','$city','$file')";
	

	//work out file exten
	$file_ext = explode('.',$file_name);
	$file_ext = strtolower(end($file_ext));

	$allowed = array('pdf');

	if(in_array($file_ext, $allowed)){
		if($file_error === 0){
			if($file_size <= 30000000000){
				$file_name_new = uniqid('',true). '.'. $file_ext;
				$file_destination = '/opt/lampp/htdocs/Hackathon/science_express/file' . $file_name_new;

				if(move_uploaded_file($file_tmp, $file_destination)){
					echo $file_destination;
				}
			}
		}
	}
}
//mysqli_query($conn, $sql);



if($conn->query($sql) === TRUE)
{
	echo "<script>alert('Registration successful');document.location='home.html'</script>";
}
else
{
	echo "Error aa gyi" . $conn->error;
}
$conn->close();
?>