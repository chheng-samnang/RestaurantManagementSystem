<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>

</nav>
<?php echo form_open('index.php/invoice2Controller/index/'.$this->uri->segment(3))?>
<div class="container" style="margin-top:80px;">
	<div class="row">
		<div class="col-lg-11">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Invoice Header</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-3">
							<label>Invoice No.: <?php echo $invNo?></label>
							<input type="hidden" name="txtInvNo" value="<?php echo $invNo?>">
						</div>
						<div class="col-lg-3">
							<label>Date: <?php echo $invHdr->ord_date?></label>
						</div>
						<div class="col-lg-3">
							<label>Table: <?php echo $invHdr->tab_name?></label>
							<input type="hidden" name="txtTabID" value="<?php echo $invHdr->tab_id?>">
						</div>
						<div class="col-lg-3">
							<label>Staff: <?php echo $invHdr->staff_id?></label>
							<input type="hidden" name="txtStaffID">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-11">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Invoice Listing</h3>
				</div>
				<div class="panel-body">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>No.</th>
								<th>Menu Name</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Discount</th>
								<th><input type="checkbox" id="chkAll" name="chkAll"> Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$i = 0;

							foreach ($invDet->result() as $row) {
						?>
							<tr>
								<td><?php echo $i +1?></td>
								<td><?php echo $row->m_name?></td>
								<td><?php echo $row->qty?></td>
								<td><?php echo $row->cost?></td>
								<td><?php echo $row->discount?></td>
								<td><input type="checkbox" name="chk[]" value="<?php echo $row->ord_det_id?>"></td>
							</tr>
						<?php
							}
						?>
						</tbody>
					</table>
					<hr />
					<div class="pull-right">
						<a href="<?php echo base_url()?>index.php/pos_C" class="btn btn-default btn-lg"><i class="fa fa-close"></i> Cancel</a>
						<button type="submit" class="btn btn-success btn-lg" name="btnPrint"><i class="fa fa-print"></i> Print Invoice</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#chkAll').click(function(event)
	{
		if(this.checked)
		{
			$(':checkbox').each(function()
			{
				this.checked = true;
			});
		}else
		{
			$(':checkbox').each(function()
			{
				this.checked = false;
			});
		}
	});
</script>
