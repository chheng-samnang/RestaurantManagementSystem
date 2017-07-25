<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row" >
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-male"></i> Staff Management</h1>
                    </div>

                   	<div class="col-lg-6">
                    	<a href="<?php echo base_url()?>index.php/staff/addStaff" class="btn btn-success"><i class="fa fa-plus"></i> Add Staff</a>
                    </div>

                    
                </div>
                <?php if(isset($msg)){?>
                <div class="row">
                	<div class="col-lg-12">
                		<div class="alert alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong>Congratulation!</strong> This staff has been saved successfully!
						</div>
                	</div>
                </div>
                <?php }?>
                <div class="row" style="margin-top:10px;">
                	<div class="col-lg-12"><!--table-->
	                     <div class="panel panel-default">
							  <div class="panel-heading">
							    <h3 class="panel-title">Staff Info</h3>
							  </div>
							  <div class="panel-body">
							    <table class="table table-hover" id="myData">
							    	<thead>
							    		<tr>
							    			<th>No.</th>
							    			<th>Staff Name</th>
							    			<th>Sex</th>
							    			<th>Position</th>
							    			<th>Phone</th>
							    			
							    			<th>Status</th>
							    			<th>Photo</th>
							    			<th>User Create</th>
							    			<th>Date Create</th>							    			
							    			<th>Action</th>
							    		</tr>
							    	</thead>
							    	<tbody>
							    	<?php 
							    		$i = 0;							    		
							    		foreach($query->result() as $row)
							    		{							    			
							    	?>
							    		<tr>
							    			<td><?php echo $i+1?></td>
							    			<td><a href="<?php echo base_url()?>index.php/staff/viewStaff/<?php echo $row->staff_id?>"><?php echo $row->staff_name?></a></td>
							    			<td><?php echo $row->sex=="m"?"Male":"Female"?></td>
							    			<td><?php echo $row->pos_name?></td>
							    			<td><?php echo $row->phone?></td>
							    			
							    			<td><?php echo $row->status=="1"?"Enable":"Disable"?></td>
							    			<td><img width="50" src="<?php echo base_url()?>assets/uploads/<?php echo $row->img?>"/></td>
							    			<td><?php echo $row->user_crea?></td>
							    			<td><?php echo $row->date_crea?></td>
							    			<td><a class="btn btn-primary" href="<?php echo base_url()?>index.php/staff/editStaff/<?php echo $row->staff_id?>"><i class="fa fa-pencil"></i> Edit</a> 
							    				<a href="<?php echo base_url('index.php/Staff/deleteStaff/'.$row->staff_id);?>" class="btn btn-danger btn-large confirModal del" data-confirm-title="Confirm Delete !" data-confirm-message="Are you sure you want to Delete this ?"><i class="fa fa-trash"></i> Delete</button>
							    			</td>
							    		</tr>
							    		<?php
											$i=$i+1;
										}
							    		?>
							    	</tbody>
							    </table>
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
    <script>
        $(document).ready(function(){
            $('#myData').DataTable();
        });
    </script>
    <script>
    	function confirmDel()
    	{
    		var x = confirm("Are you sure you want to delete this staff?");
    		if(x==true)
    		{
    			return true;
    		}else
    		{
    			return false;
    		}
    	}
    </script>
    <script> 
         $(document).ready(function(){
             var a=$('.del').confirmModal();             
         });                                    
    </script>
