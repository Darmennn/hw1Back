<?php  include('server.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM hww WHERE id=$id");
		if (count(array($record)) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$surname = $n['surname'];
			$email = $n['email'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Back-end HomeWork 1</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
   <?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
  <?php $results = mysqli_query($db, "SELECT * FROM hww"); ?>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Surname</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['surname']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	<form method="post" action="server.php" >
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="hwww">
			<div>Name
				<input type="text" name="name" value="<?php echo $name; ?>">
			</div>
       		<div>Email
				<input type="text" name="email" value="<?php echo $email; ?>">
			</div>
       		<div>Surname
				<input type="text" name="surname" value="<?php echo $surname; ?>">
			</div>
			
        </div>
		<div class="input-group">
			<?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn" type="submit" name="save" >Save</button>
<?php endif ?>
		</div>
	</form>
</body>
</html>