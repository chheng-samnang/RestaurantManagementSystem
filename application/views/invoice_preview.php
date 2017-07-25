<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

 <div class="container fluid" style="width:400px;box-shadow: 1px 1px 5px #888888;">
      	<div class="row">
      		<div class="col-lg-12">
      			<h3 class="text-center">Invoice</h3>
      		</div>
      	</div>
      	<hr />
      	<div class="row">
      		<div class="col-lg-8">
      			<h4>Invoice No.</h4>
      			<?php //echo $hdr->ord_id?>
      		</div>
      		<div class="col-lg-4">
      			<h4>Table No.</h4>
      			<?php //echo $hdr->tab_id?>
      		</div>
      	</div>
      	<div class="row">
      		<div class="col-lg-8"><h4>Order By:</h4> <?php //echo $hdr->staff_id?></div>
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
      						<th>Price</th>
                  <th>Discount</th>
                  <th>Total</th>
      					</tr>
      				</thead>
      				<tbody>
                                    <?php

                                    $grandTtl = 0.00;
                                    $discount = 0.00;
                                          foreach ($invoice as $key=>$value) {

                                    ?>

                                          <tr>
                                                <td><?php echo $key+1?></td>
                                                <td><?php echo $value->m_name?></td>
                                                <td><?php echo $value->qty?></td>
                                                <td><?php echo "$".$value->cost?></td>
                                                <td><?php echo $value->discount?></td>
                                                <td><?php echo "$".$value->total?></td>
                                          </tr>
                                    <?php
                                      $grandTtl = $grandTtl + $value->total;
                                      $discount = $discount + $value->discount;
                                          }
                                      $result = $grandTtl - $discount;
                                    ?>
                                          <tr>
                                            <td colspan="5" style="text-align:right;"><strong>Grand Total</strong></td>
                                            <td><strong><?php echo "$".$result;?></strong></td>
                                          </tr>

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
