<style>
	.adj {
		height: 100px;
		width: 600px;
		margin: 0px 0px 2px 90%;
	}

	.main {
		margin: 0px 30px 0px 50px;
	}

	.newbtn {
		margin: 5px 2px 0px 54%;
	}

	.tit {
		text-align: center;
		font-family: serif;
		font-weight: bolder;
		font-size: x-large;
	}

	.select_lab {
		margin: 100px 40% 0px;
		height: 300px;
		width: 350px;
	}

	.lab {
		text-decoration: none;
		font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
		color: blue;
	}

	.name {
		font-family: sans-serif;
	}
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="tit">Manage Records</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="adj">
						<button class="btn btn-secondary justify-content-md-end" style="border-radius:0%"
							data-toggle="modal" data-target="#addRecord">Add Record</button>
					</div>
					<div class="panel-body">

						<table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%"
							id="rooms">

							<thead>
								<tr>
									<th style="text-align: center">Item Name</th>
									<th style="text-align: center">Item Description</th>
									<th style="text-align: center">Purchase Year</th>
									<th style="text-align: center">Purchase Price</th>
									<th style="text-align: center">Working Items</th>
									<th style="text-align: center">Defective Items</th>
									<th style="text-align: center">Total</th>
									<th style="text-align: center">Depreciation rate</th>
									<th style="text-align: center">Action</th>
								</tr>

								<?php

								$query = "SELECT *, calculateTotalCount(item_id) AS count_total, calculateTotalWorkingCount(item_id) AS count_working, calculateTotalDefectCount(item_id) AS count_defect FROM items;";
								$result = mysqli_query($connection, $query);
								while ($row = mysqli_fetch_assoc($result)) { ?>
									<tr>
										<td><?php echo $row['item_name'] ?></td>
										<td><?php echo $row['item_description'] ?></td>
										<td><?php echo $row['item_purchase_year'] ?></td>
										<td><?php echo $row['item_purchase_price'] ?></td>
										<td><?php echo $row['count_working'] ?></td>
										<td><?php echo $row['count_defect'] ?></td>
										<td><?php echo $row['count_total'] ?></td>
										<td><?php echo $row['item_depreciation_rate'] ?></td>
										<td>
											<button title="Edit Record" style="border-radius:60px;" data-toggle="modal"
												data-target="#editRecord" data-id="<?php echo $row['item_id']; ?>"
												id="editRecordButton" class="btn btn-info"><i
													class="fa-solid fa-pen-to-square"></i>
											</button>
											<button title="Delete Record" style="border-radius:60px;" data-toggle="modal"
												data-target="#deleteRecord" data-id="<?php echo $row['item_id']; ?>"
												id="deleteRecordButton" class="btn btn-danger"><i
													class="fa-solid fa-trash-can"></i>
											</button>
										</td>
									</tr>
								<?php } ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="addRecord" class="modal fade">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Add New Record</h4>

					<button type="button" class="close newbtn" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12">
							<form id="addRecordForm" data-toggle="validator" role="form" action="action.php"
								method="POST">
								<div class="response"></div>
								<div class="form-group">
									<label>Location: </label>
									<select class="form-control" name="location-id" id="location_id" required
										data-error="Select Room Type">
										<option selected disabled>Select Location</option>
										<?php
										$query = "SELECT * FROM locations ORDER BY location_name";
										$result = mysqli_query($connection, $query);
										while ($row = mysqli_fetch_assoc($result)) {
											echo "<option value='" . $row['location_id'] . "'>" . $row['location_name'] . "</option>";
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label>Item Name: </label>
									<select name="item-id" id="item-id">
										<option selected disabled>Select Item Name</option>
										<?php
										$query = "SELECT item_id, item_name FROM items ORDER BY item_name";
										$result = mysqli_query($connection, $query);
										while ($row = mysqli_fetch_assoc($result)) {
											echo "<option value='" . $row['item_id'] . "'>" . $row['item_name'] . "</option>";
										}
										?>
										<option value="-1">New</option>
									</select>
								</div>
								<div id="new-item-content">

								</div>
								<div class="form-group">
									<label>Count of Working: </label>
									<input name="count-working" type="text" class="form-control"
										data-error="Enter Count of Working" placeholder="Count of Working" required>
								</div>
								<div class="form-group">
									<label>Count of Defect: </label>
									<input name="count-defect" type="text" class="form-control"
										data-error="Enter Count of Defect" placeholder="Count of Defect" required>
								</div>
								<br>
								<button name="add-record" type="Submit" class="btn btn-success pull-right">Add
									Record</button>
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>
</div>

<!--Edit Room Modal -->
<div id="editRecord" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Record</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<form id="editRecordForm" data-toggle="validator" role="form" action="action.php" method="POST">
							<div class="edit_response"></div>
							<div class="response"></div>

							<div class="form-group">
								<label id="display-edit-item-name"></label>
								<input id="edit-item-id" name="edit-item-id" type="hidden" class="form-control">
							</div>
							<div class="form-group">
								<label>Item Description: </label>
								<input id="edit-item-description" name="edit-item-description" type="text"
									class="form-control">
							</div>
							<div class="form-group">
								<label>Purchase Year: </label>
								<input id="edit-purchase-year" name="edit-purchase-year" type="text"
									class="form-control">
							</div>
							<div class="form-group">
								<label>Purchase Value: </label>
								<input id="edit-purchase-value" name="edit-purchase-value" type="text"
									class="form-control">
							</div>
							<div class="form-group">
								<label>Depreciation Rate: </label>
								<input id="edit-depr-rate" name="edit-depr-rate" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label>Location: </label>
								<select name="edit-location-name" id="edit-location-name">

								</select>
							</div>
							<div class="form-group">
								<label>Count of Working: </label>
								<input id="edit-count-working" name="edit-count-working" type="text"
									class="form-control">
							</div>
							<div class="form-group">
								<label>Count of Defect: </label>
								<input id="edit-count-defect" name="edit-count-defect" type="text" class="form-control">
							</div>
							<br>
							<button name="edit-record" class="btn btn-success pull-right" type="Submit">Save</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="deleteRecord" class="modal fade">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Delete Record</h4>
				<button type="button" class="close newbtn" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<form id="deleteRecordForm" data-toggle="validator" role="form" action="action.php"
							method="POST">
							<div class="delete-response"></div>
							<div class="form-group">
								<label id="display-delete-item-name"></label>
								<input id="delete-item-id" name="delete-item-id" type="hidden" class="form-control">
							</div>
							<div class="form-group">
								<label for="delete-location-name">Select Location: </label>
								<select name="delete-location-name" id="delete-location-name">
								</select>
							</div>

							<button name="delete-record" type="Submit" class="btn btn-success pull-right">Delete
								Record</button>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
</div>
