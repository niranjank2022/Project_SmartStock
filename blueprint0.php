<style>
	body {
		font-family: Arial, sans-serif;
	}

	.info-tab {
		display: none;
		transform: translate(120%, -40%);
		position: absolute;
		z-index: 999;
		background-color: #696969;
		color: #fff;
		font-size: larger;
		padding: 10px;
		border-radius: 10px;
		box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
	}

	.h:hover .info-tab {
		display: block;
	}

	.floor-plan {
		cursor: pointer;
		position: relative;
		width: 800px;
		height: 400px;
		/* border: 2px solid #000; */
		margin: 50px auto;
	}

	.lab,
	.box {
		position: absolute;
		border: 2px solid #000;
		background-color: #f0f0f0;
		padding: 10px;
	}

	.lab {
		width: 300px;
		height: 200px;
		top: 0px;
		left: 100px;
		padding: 50px;
	}

	.r {
		width: 100px;
		height: 200px;
		top: 0px;
		padding-top: 50px;
		left: 0px;
	}

	.cpu {
		bottom: 0px;
		left: 0px;
		height: 180px;
		width: 400px;
		padding: 75px;
	}

	.scholars {
		right: 0px;
		top: 0px;
		width: 395px;
		height: 90px;
	}

	.staff1 {
		right: 0px;
		bottom: 105px;
		height: 60px;
		width: 262px;
	}

	.staff2 {
		right: 0px;
		bottom: 170px;
		height: 60px;
		width: 262px;
	}

	.staff3 {
		right: 0px;
		bottom: 240px;
		height: 60px;
		width: 262px;
	}

	.main {
		background: linear-gradient(to right, #4facfe, #00f2fe);
	}

	/* Add other elements and styling as needed */
</style>

<div class="floor-plan">

	<div class="lab h">
		<h3>GROUND FLOOR LAB</h3>
		<div class="info-tab">
			<h3>GROUND FLOOR LAB:</h3>
			<?php
			$query = "SELECT location_id FROM locations WHERE location_name = 'GFL'";
			$result = mysqli_query($connection, $query);
			$row = mysqli_fetch_assoc($result);
			$loc_id = $row['location_id'];

			$query = "SELECT *, count_working + count_defect AS count FROM tracker NATURAL JOIN items NATURAL JOIN locations WHERE location_id = '$loc_id'";
			$result = mysqli_query($connection, $query);
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<p>" . $row['item_name'] . ": " . $row['count'] . "</p>";
			}
			?>
		</div>
		<!-- Add lab content here -->
	</div>

	<div class="box r h">
		<h3>Class room</h3>
		<div class="info-tab">
			<h3>Class room:</h3>
			<?php
			$query = "SELECT location_id FROM locations WHERE location_name = 'GFL'";
			$result = mysqli_query($connection, $query);
			$row = mysqli_fetch_assoc($result);
			$loc_id = $row['location_id'];

			$query = "SELECT *, count_working + count_defect AS count FROM tracker NATURAL JOIN items NATURAL JOIN locations WHERE location_id = '$loc_id'";
			$result = mysqli_query($connection, $query);
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<p>" . $row['item_name'] . ": " . $row['count'] . "</p>";
			}
			?>
		</div>
		<!-- Add staff cabin content here -->
	</div>

	<div class="box cpu h">
		<h3>TURING HALL</h3>
		<div class="info-tab">
			<h3>TURING HALL:</h3>
			<?php
			$query = "SELECT location_id FROM locations WHERE location_name = 'GFL'";
			$result = mysqli_query($connection, $query);
			$row = mysqli_fetch_assoc($result);
			$loc_id = $row['location_id'];

			$query = "SELECT *, count_working + count_defect AS count FROM tracker NATURAL JOIN items NATURAL JOIN locations WHERE location_id = '$loc_id'";
			$result = mysqli_query($connection, $query);
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<p>" . $row['item_name'] . ": " . $row['count'] . "</p>";
			}
			?>
		</div>
		<!-- Add staff cabin content here -->
	</div>
	<div class="box scholars h">
		<h3>UPS ROOM</h3>
		<div class="info-tab">
			<h3>UPS ROOM:</h3>
			<?php
			$query = "SELECT location_id FROM locations WHERE location_name = 'GFL'";
			$result = mysqli_query($connection, $query);
			$row = mysqli_fetch_assoc($result);
			$loc_id = $row['location_id'];

			$query = "SELECT *, count_working + count_defect AS count FROM tracker NATURAL JOIN items NATURAL JOIN locations WHERE location_id = '$loc_id'";
			$result = mysqli_query($connection, $query);
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<p>" . $row['item_name'] . ": " . $row['count'] . "</p>";
			}
			?>
		</div>
		<!-- Add staff cabin content here -->
	</div>
	<div class="box staff1 h">
		<h3>Staff room 1</h3>
		<div class="info-tab">
			<h3>Staff room 1:</h3>
			<?php
			$query = "SELECT location_id FROM locations WHERE location_name = 'GFL'";
			$result = mysqli_query($connection, $query);
			$row = mysqli_fetch_assoc($result);
			$loc_id = $row['location_id'];

			$query = "SELECT *, count_working + count_defect AS count FROM tracker NATURAL JOIN items NATURAL JOIN locations WHERE location_id = '$loc_id'";
			$result = mysqli_query($connection, $query);
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<p>" . $row['item_name'] . ": " . $row['count'] . "</p>";
			}
			?>
		</div>
		<!-- Add staff cabin content here -->
	</div>
	<div class="box staff2 h">
		<h3>Staff room 2</h3>
		<div class="info-tab">
			<h3>Staff room 2:</h3>
			<?php
			$query = "SELECT location_id FROM locations WHERE location_name = 'GFL'";
			$result = mysqli_query($connection, $query);
			$row = mysqli_fetch_assoc($result);
			$loc_id = $row['location_id'];

			$query = "SELECT *, count_working + count_defect AS count FROM tracker NATURAL JOIN items NATURAL JOIN locations WHERE location_id = '$loc_id'";
			$result = mysqli_query($connection, $query);
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<p>" . $row['item_name'] . ": " . $row['count'] . "</p>";
			}
			?>
		</div>
		<!-- Add staff cabin content here -->
	</div>
	<div class="box staff3 h">
		<h3>Staff room 3</h3>
		<div class="info-tab">
			<h3>Staff room 3:</h3>
			<?php
			$query = "SELECT location_id FROM locations WHERE location_name = 'GFL'";
			$result = mysqli_query($connection, $query);
			$row = mysqli_fetch_assoc($result);
			$loc_id = $row['location_id'];

			$query = "SELECT *, count_working + count_defect AS count FROM tracker NATURAL JOIN items NATURAL JOIN locations WHERE location_id = '$loc_id'";
			$result = mysqli_query($connection, $query);
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<p>" . $row['item_name'] . ": " . $row['count'] . "</p>";
			}
			?>
		</div>
		<!-- Add staff cabin content here -->
	</div>
	<!-- Add other elements as needed -->
</div>