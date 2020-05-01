<?php
session_start();

$con = mysqli_connect('localhost', 'root', '', 'contractors');

if(!$con) die('Could not connect to database');

if(isset($_POST['contractorLogin'])){
	contractorLogin();
} else if(isset($_POST['registerUser'])){
	registerUser($_POST);
} else if(isset($_POST['updateContractor'])){
	updateContractor($_POST);
}

function contractorLogin(){
	global $con;
	extract($_POST);
	if(isset($_POST['email']) && isset($_POST['password'])){
		$stmt=$con->prepare('SELECT fname, lname, email, identity_no FROM contractors WHERE email = ? and password = ?');
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

function registerUser(){
	global $con;
	extract($_POST);
	echo json_encode($_POST);
	if ($isContractor == "yes") {
		$stmt=$con->prepare('SELECT email FROM contractors WHERE email = ?');
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
			$stmt=$con->prepare("INSERT INTO `contractors` (`fname`, `lname`, `email`, `password`, `reg_date`) VALUES (?,?,?,?,now())");
			$stmt->bind_param('ssss', $fname, $lname, $email, $password);
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
	} else {
		$stmt=$con->prepare('SELECT email FROM clients WHERE email = ?');
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
			$stmt=$con->prepare("INSERT INTO `clients`(`fname`, `lname`, `email`, `password`, `reg_date`) VALUES (?,?,?,?,now())");
			$stmt->bind_param("ssss", $fname, $lname, $email, $password);
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
	closeSTMT($stmt);
}

function updateContractor($post){
	global $con;
	extract($post);
	$email = $_SESSION['email'];
	$stmt = $con->prepare("UPDATE contractors SET service = ?, location = ?, identity_no = ?, phonenumber = ?, brief_info = ? WHERE email = ?");
	$stmt->bind_param("ssssss", $service, $location, $identity_no, $phonenumber, $brief_info, $email);
	$stmt->execute();
	$stmt->store_result();

	if($stmt->affected_rows > 0){
		__redirect("update-profile.php", 1, "Profile updated successfully");
	} else {
		$data = json_encode($post);
		__redirect("update-profile.php", 0, "Failed to update profile. " .$stmt->error." data: ". $data);
	}
}

// Stand-alone functions

function getServices(){
	global $con;
	$stmt = $con->prepare("SELECT * FROM services ORDER BY name ASC");
	$stmt->execute();
	$services = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

	foreach ($services as $service):
		?>
		<option value="<?php echo $service['name']; ?>"><?php echo $service['name']; ?></option>
	<?php endforeach;

	closeSTMT($stmt);
}

function getLocations(){
	global $con;
	$stmt = $con->prepare("SELECT * FROM muranga ORDER BY constituency ASC");
	$stmt->execute();
	$locations = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

	foreach ($locations as $location):
		?>
		<optgroup label="<?php echo $location['constituency'];  ?>">
			<?php
				$wards = explode(",", $location['wards']);
				for ($i = 0; $i < sizeof($wards); $i++):
					?>
					<option value="<?php echo $wards[$i]; ?>"><?php echo $wards[$i]; ?></option>
					<?php
				endfor;
				?>
		</optgroup>
	<?php endforeach;

	closeSTMT($stmt);
}

function __redirect($location, $type, $message){
	header('location:'.$location.'?success='.$type.'&message='.$message);
}

function closeSTMT($stmt){
	$stmt->close();
}

?>
