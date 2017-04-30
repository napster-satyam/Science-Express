<?php 



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";

$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$name = $_POST["username"];
$dob = $_POST["date"];
$mob = $_POST["MobileNumber"];
$email = $_POST["Email"];
$city = $_POST["City"];
$sex = $_POST["gender"];
$sql = "INSERT into public VALUES ('$name',$dob,$mob,'$email','$city','$sex')";

if($conn->query($sql) === TRUE)
{
	//echo "Registration successful";
	echo "<script>alert('Registration successful');document.location='home.html'</script>";
}
else
{
	echo "Error" . $conn->error;
}
$conn->close();
?>