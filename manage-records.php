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
									<th style="text-align: center">Location</th>
									<th style="text-align: center">Purchase Year</th>
									<th style="text-align: center">Purchase Value</th>
									<th style="text-align: center">No. of Items</th>
									<th style="text-align: center">Depreciation rate</th>
									<th style="text-align: center">Condition</th>
									<th style="text-align: center">Action</th>
								</tr>

								<?php

								$query = "SELECT * FROM items_info NATURAL JOIN availability NATURAL JOIN location";
								$result = mysqli_query($connection, $query);
								while ($row = mysqli_fetch_assoc($result)) { ?>

									<tr>
										<td><?php echo $row['item_name'] ?></td>
										<td><?php echo $row['description'] ?></td>
										<td><?php echo $row['location_name'] ?></td>
										<td><?php echo $row['purchase_year'] ?></td>
										<td><?php echo $row['purchase_value'] ?></td>
										<td><?php echo $row['no_of_items'] ?></td>
										<td><?php echo $row['depreciation_rate'] ?></td>
										<td><?php echo $row['curr_condition'] ?></td>
										<td>

											<button title="Edit Record" style="border-radius:60px;" data-toggle="modal"
												data-target="#editRecord" data-id="<?php echo $row['item_id']; ?>"
												id="editRecordButton" class="btn btn-info"><i
													class="fa-solid fa-pen-to-square"></i>
											</button>

											<a href="action.php?delete-record=<?php echo $row['item_id']; ?>"
												class="btn btn-danger" style="border-radius:60px;"
												onclick="return confirm('Are you Sure?')"><i
													class="fa-solid fa-trash-can"></i></i></a>
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
									<label for="item-name">Item Name: </label>
									<input id="item-name" type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="item-description">Item Description: </label>
									<input name="item-description" type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="purchase-year">Purchase Year: </label>
									<input name="purchase-year" type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="purchase-value">Purchase Value: </label>
									<input name="purchase-value" type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="depr-rate">Depreciation Rate: </label>
									<input name="depr-rate" type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="no-of-items">No. of Items: </label>
									<input name="no-of-items" type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="location">Location: </label>
									<input name="location" type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="condition">Condition: </label>
									<select name="condition" id="condition">
										<option value="New">New</option>
										<option value="Old">Damaged</option>
										<option value="Not Working">Not Working</option>
									</select>
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
								<label>Item Name: </label>
								<input id="edit-item-name" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label>Item Description: </label>
								<input id="edit-item-description" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label>Purchase Year: </label>
								<input id="edit-purchase-year" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label>Purchase Value: </label>
								<input id="edit-purchase-value" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label>Depreciation Rate: </label>
								<input id="edit-depr-rate" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label>No. of Items: </label>
								<input id="edit-no-of-items" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label>Location: </label>
								<input id="edit-location" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label>Condition: </label>
								<select id="edit-condition">
									<option value="New">New</option>
									<option value="Old">Damaged</option>
									<option value="Not Working">Not Working</option>
								</select>
							</div>
							<br>
							<button class="btn btn-success pull-right">Save</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="bp">
	<div class="select_lab">
		<p class="name">Please select the floor below to view the stocks</p>
		<li class="nope">
			<a href="blueprint0.php" class="lab">
				GROUND FLOOR
			</a>
		</li>
		<li>
			<a href="blueprint1.php" class="lab">
				FRIST FLOOR
			</a>
		</li>
		<li>
			<a href="blueprint2.php" class="lab">
				SECOND FLOOR
			</a>
		</li>
		<li>
			<a href="blueprint3.php" class="lab">
				THIRD FLOOR
			</a>
		</li>
	</div>
</div>