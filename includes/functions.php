<?php
session_start();

$con = mysqli_connect('localhost', 'root', '', 'contractors');

if(!$con) die('Could not connect to database');

if(isset($_POST['contractorLogin'])){
	contractorLogin();
} else if(isset($_POST['registerContractor'])){
	contractorRegister();
}

function contractorLogin(){
	global $con;
	extract($_POST);
	if(isset($_POST['email']) && isset($_POST['password'])){
		$stmt=$con->prepare('SELECT fname, lname, email, identity_no FROM t_contractors WHERE email = ? and password = ?');
		$stmt->bind_param('ss', $email, $password);
		$stmt->execute();
		$stmt->bind_result($fname, $lname, $email, $identity_no);
		if($stmt->fetch()){
			?>
				<script type="text/javascript">
					alert('Login successful');
				</script>
			<?php
			$_SESSION['email'] = $email;
			$_SESSION['fname'] = $fname;
			$_SESSION['lname'] = $lname;
			$_SESSION['identity_no'] = $identity_no;
			header("Location: index.php?login=success");
		} else {
			?>
				<script type="text/javascript">
					alert('Failed to login, please check email or password');
				</script>
			<?php
		}
	}
}

function contractorRegister(){
	global $con;
	extract($_POST);
	if(isset($_POST['email'])){
		$stmt=$con->prepare('SELECT email FROM t_contractors WHERE email = ?');
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
		$stmt->close();
		if (sizeof($result) > 0) {
			?>
				<script type="text/javascript">
					alert('User already exists');
				</script>
			<?php
			//exit;
		} else {
			$stmt=$con->prepare("INSERT INTO `t_contractors` (`cat`, `location`, `fname`, `lname`, `identity_no`, `phonenumber`, `brief_info`, `email`, `password`, `reg_date`) VALUES (?,?,?,?,?,?,?,?,?,now())");
			$stmt->bind_param('sssssssss', $category, $location, $fname, $lname, $identity_no, $phonenumber, $brief_info, $email, $password);
			$stmt->execute();
			if($stmt->affected_rows>0){
				?>
				<script type="text/javascript">
					alert('Registration successful');
				</script>
			<?php
			header("Location: login.php");
			} else {
				?>
				<script type="text/javascript">
					alert('Failed to register '.$stmt->error);
				</script>
			<?php
			}
		}
	
	}
}

?>