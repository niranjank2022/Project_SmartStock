

    <div class="row">

    </div>
    <div id="addRecord" class="modal fade" tabindex="-1" aria-labelledby="addRecordLabel" aria-hidden="true">
        <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add New Room</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12">
							<form id="addRoom" data-toggle="validator" role="form">
								<div class="response"></div>
								<div class="form-group">
									<!-- <label>Room Type</label> -->
									<select class="form-control" id="room_type_id" required
										data-error="Select Room Type">
										<option selected disabled>Select Room Type</option>
										<!-- <?php
										$query = "SELECT * FROM room_type";
										$result = mysqli_query($connection, $query);
										if (mysqli_num_rows($result) > 0) {
											while ($room_type = mysqli_fetch_assoc($result)) {
												echo '<option value="' . $room_type['room_type_id'] . '">' . $room_type['room_type'] . '</option>';
											}
										}
										?> -->
									</select>
									<div class="help-block with-errors"></div>
								</div>

								<div class="form-group">
									<label>Room No</label>
									<input class="form-control" placeholder="Room No" id="room_no"
										data-error="Enter Room No" required>
									<div class="help-block with-errors"></div>
								</div>
								<button class="btn btn-success pull-right">Add Room</button>
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer">

				</div>
			</div>

		</div>
    </div>
