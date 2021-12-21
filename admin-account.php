<?php
$username= filter_input(INPUT_POST, 'username');

$password= filter_input(INPUT_POST, 'password');

if(!empty($username))
{
		if(!empty($password))
		{
			$host="localhost";
			$dbusername = "root";
			$dbpassword = "";
			$dbname = "data1";
			$conn = new mysqli($host,$dbusername,$dbpassword ,$dbname);
			if(mysqli_connect_error())
			{
				die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
			}
			else
			{
				$stmt = $conn->prepare("SELECT * FROM admins where username = ?");
				$stmt->bind_param("s",$username);
				$stmt->execute();
				$stmt_result = $stmt->get_result();
				if($stmt_result->num_rows >0) {
					$data = $stmt_result->fetch_assoc();
					if($data['password']=== $password){
						echo '<a href="Add-product.html">Go To The Purchase Page!</a>';
					}

				}
				else{
					echo"invaled username or pass ";
				}


}
}
}
?>
