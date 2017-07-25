<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<?php echo form_open_multipart('index.php/staff/addStaff');?>
		
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-user"></i> Staff Information</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
	                <div class="col-lg-6">
	                	<?php if(null!=validation_errors()){?>
							<div class="alert alert-danger alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong>Warning!</strong> <?php echo validation_errors();?>
							</div>
						<?php }?>	
	                </div>                	
                </div>
                
                <div class="row">
                	<div class="col-md-12"><!--table-->
	                    <div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title">Add Staff Info</h3>
						  </div>
						  <div class="panel-body">
						    <div class="row">
						    	<div class="col-lg-3">
						    		<div class="form-group">
						    			<label>Staff Name</label>
						    			<input type="text" class="form-control" name="txtStaffName" placeholder="Enter staff name here...">
						    		</div>
						    	</div>
						    	<div class="col-lg-3">
						    		<div class="form-group">
						    			<label>Staff Name Kh</label>
						    			<input type="text" class="form-control" name="txtStaffNameKh" placeholder="Enter staff name here...">
						    		</div>
						    	</div>
						    </div>

						    <div class="row">
						    	<div class="col-lg-3">
						    		<div class="form-group">
						    			<label>Sex</label>
						    			<?php echo form_dropdown("ddlSex",$option,"","class='form-control'")?>
						    		</div>
						    	</div>
						    	<div class="col-lg-3">						    	
						    		<div class="form-group">
						    			<label>Date of Birth</label>
						    			
										    <div class="row">
										        <div class='col-lg-12'>
										            <div class="form-group">
										                <div class='input-group date' id='datetimepicker1'>
										                    <input type='text' class="form-control" placeholder="Click here to pick date" name="txtDOB"/>
										                    <span class="input-group-addon">
										                        <span class="glyphicon glyphicon-calendar"></span>
										                    </span>
										                </div>
										            </div>
										        </div>
										        <script type="text/javascript">
										            $(function () {
										                $('#datetimepicker1').datetimepicker({
														    format: 'YYYY-MM-DD'
														 });
										            });
										        </script>
										    </div>
										
						    		</div>
						    	</div>
						    </div>

						    <div class="row">
						    	<div class="col-lg-6">
						    		<div class="form-group">
						    			<label>Place of Birth</label>
						    			<input type="text" class="form-control" name="txtPOB" placeholder="Enter your place of birth here....">
						    		</div>
						    	</div>						    	
						    </div>

						    <div class="row">
						    	<div class="col-lg-3">
						    		<div class="form-group">
						    			<label>Position</label>
						    			<select class="form-control" name="ddlPos">
						    				<option value="0">Choose One</option>
											<?php 												
												$i = 0;
												while($i < count($pos)){
												  $val= $pos[$i]['pos_id'];
												  $des = $pos[$i]['pos_name'];
												  echo "<option value='$val'>$des</option>";
												  $i=$i+1;
											}?>
										</select>
						    		</div>
						    	</div>
						    	<div class="col-lg-3">
						    		<div class="form-group">
						    			<label>Phone Number</label>
						    			<input type="text" class="form-control" name="txtPhone" placeholder="Enter phone number here...">
						    		</div>
						    	</div>
						    </div>
						    <div class="row">
						    	<div class="col-lg-3">
						    		<div class="form-group">
						    			<label>Email</label>
						    			<input type="text" name="txtEmail" class="form-control" placeholder="Enter your email here...">
						    		</div>
						    	</div>
						    	<div class="col-lg-3">
						    		<div class="form-group">
						    			<label>Facebook</label>
						    			<input type="text" name="txtfb" class="form-control" placeholder="Enter your Facebook name here...">
						    		</div>
						    	</div>
						    </div>
						    <div class="row">
						    	<div class="col-lg-6">
						    		<div class="form-group">
						    			<label>Address</label>
						    			
						    			<textarea name="txtAddr" class="form-control" placeholder="Enter your address here..."></textarea>
						    		</div>
						    	</div>
						    </div>
						    <div class="row">
						    	<div class="col-lg-3">
						    		<div class="form-group">
						    			<label>Status</label>
						    			<?php echo form_dropdown("ddlStatus",$status,"","class='form-control'")?>
						    		</div>
						    	</div>
						    	<div class="col-lg-3">
						    		<div class="form-group">
						    			<label>Upload Image</label>
						    			<input type="file" name="btnUpload" class="btn btn-default">
						    		</div>
						    	</div>
						    </div>
						    <div class="row">
						    	<div class="col-lg-3">
						    		<div class="form-group">
						    			<label>User Code</label>
						    			<select class="form-control" name="ddlUser">
						    				<option value="0">Choose One</option>
											<?php 												
												$i = 0;
												
												while($i < count($user)){
												  $val= $user[$i]->userCode;
												  $des = $user[$i]->userName;
												  echo "<option value='$val'>$des</option>";
												  $i=$i+1;
												}
											?>
										</select>
						    		</div>
						    	</div>
						    </div>
						    <div class="row">
						    	<div class="col-lg-5">
						    		<div class="form-group">
						    			<?php 
						    				$data = array(
										        'name' => 'btnSave',
										        'type' => 'submit',
										        'class' => 'btn btn-success',
										        'content' => '<i class="fa fa-save"></i> Save'
										    );

										    echo form_button($data);
						    			?>
						    			<a href="<?php echo base_url('index.php/staff');?>" class="btn btn-default"><i class="fa fa-close"></i> Cancel</a>
						    		</div>
						    	</div>
						    </div>
						  </div>
						</div>
	                </div>	
                </div>
                

                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    </form>
    

