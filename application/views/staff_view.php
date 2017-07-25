<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

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
                	<div class="col-md-12"><!--table-->
	                    <div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title">View Staff Information</h3>
						  </div>
						  <div class="panel-body">
						    <div class="row">
						    	<div class="col-lg-12">
						    		<ul>
						    			<li><strong>English Name:</strong> <?php echo $row->staff_name?></li>
						    			<li><strong>Khmer Name:</strong> <?php echo $row->staff_name_kh?></li>
						    			<li><strong>Sex:</strong> <?php echo $row->sex=="m"?"Male":"Female"?></li>
						    			<li><strong>Date of Birth:</strong> <?php echo $row->dob?></li>
						    			<li><strong>Place of Birth:</strong> <?php echo $row->pob?></li>
						    			<li><strong>Position:</strong> <?php echo $row->pos_name?></li>
						    			<li><strong>Address:</strong> <?php echo $row->addr?></li>
						    			<li><strong>Phone:</strong> <?php echo $row->phone?></li>
						    			<li><strong>Email:</strong> <?php echo $row->email?></li>
						    			<li><strong>Facebook:</strong> <?php echo $row->fb?></li>
						    			<li><strong>Status:</strong> <?php echo $row->status=="1"?"Enable":"Disable"?></li>
						    			
						    		</ul>
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
    