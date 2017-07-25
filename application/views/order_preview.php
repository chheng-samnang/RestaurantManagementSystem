<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

 <div class="container fluid" style="width:400px;box-shadow: 1px 1px 5px #888888;">
      	<div class="row">
      		<div class="col-lg-12">
      			<h3 class="text-center">Order</h3>
      		</div>
      	</div>
      	<hr />
      	<div class="row">
      		<div class="col-lg-8">
      			<h4>Order No.</h4>
      			<?php echo $hdr->ord_id?>
      		</div>
      		<div class="col-lg-4">
      			<h4>Table No.</h4>
      			<?php echo $hdr->tab_id?>
      		</div>
      	</div>
      	<div class="row">
      		<div class="col-lg-8"><h4>Order By:</h4> <?php echo $hdr->staff_id?></div>
      		<div class="col-lg-4"><h4>Time In:</h4> N/A</div>
      	</div>
      	<div class="row">
      		<div class="table-responsive">
      			<table class="table">
      				<thead style="background:black;color:white;">
      					<tr>
      						<th>No.</th>
      						<th>Menu Name</th>
      						<th>Quantity</th>
      						<th>Comment</th>
      					</tr>
      				</thead>
      				<tbody>
                                    <?php
                                    $i = 0;
                                    $grandTtl = 0.0;
                                          foreach ($det->result() as $row) {
                                          $grandTtl = $grandTtl + ($row->price*$row->qty);
                                    ?>

                                          <tr>
                                                <td><?php echo $i+1?></td>
                                                <td><?php echo $row->m_name?></td>
                                                <td><?php echo $row->qty?></td>
                                                <td><?php echo $row->comment?></td>
                                          </tr> 
                                    <?php
                                          $i=$i+1;
                                          }
                                    ?>
      					     					
      					
      				</tbody>
      			</table>
      		</div>
      	</div>
      	<hr />
      	<div class="row">
      		<div class="col-lg-12">
      			<h5 class="text-center">Powered by <strong>WebTech Solution</strong></h5>
      		</div>
      	</div>
    </div><!-- /.container -->
