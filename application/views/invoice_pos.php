</nav>

<div id="page-wrapper" ng-app="myApp" ng-controller="myCtrl">

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?php echo $this->lang->line('invoice_receipt')?></h1>
				<button type="button" id="btnRefresh" name="btnRefresh" class="btn btn-success"><?php echo $this->lang->line("btnRefresh") ?></button>

				<button type="button" id="btnEditInvoice" name="btnEditInvoice" class="btn btn-warning"><?php echo $this->lang->line("btnEditInvoice") ?></button>
				<button type="button" id="btnReprint" name="btnEditInvoice" class="btn btn-primary"><?php echo $this->lang->line("btnReprint") ?></button>

				<div style="margin-top:10px;">
					<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#invoice" aria-controls="invoice" role="tab" data-toggle="tab"><?php echo $this->lang->line('invoice')?></a></li>
								<li role="presentation"><a href="#receipt" aria-controls="receipt" role="tab" data-toggle="tab"><?php echo $this->lang->line('receipt')?></a></li>
							</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="invoice">
							<div class="row" style="margin-top:20px;">
							<?php foreach ($invoice as $key1 => $value): ?>
								<div class="col-sm-4 col-md-6">
									<div class="thumbnail">

											<div style="height:240px;overflow:scroll;">

												<div id="invoice<?php echo $key1?>">
													<h3 style="text-align:center;">ស៊ុបគោពេញចិត្ត</h3>
													<p style="text-align:center;">#429អាបេសេ សង្កាត់បឹងព្រលឹត,</p>
													<p style="text-align:center;">ផ្លូវ 93 ខណ្ឌ 7 មករា</p>
													<h3 style="text-align:center;color:red;border-bottom:2px solid black;">វិក័យបត្រ<?php echo $this->lang->line("table") ?> <?php echo $value->tab_id ?></h3>
													<div class="pull-left" >
															<h6 style="color:red;font-weight:bold;">ល.រ: <?php echo $value->inv_id ?></h6>
															<h6 style="float:left;">បេឡា: <?php echo $value->user_crea ?></h6>

													</div>
													<div class="pull-right">
														<h6 style="margin-right:10px;"><?php echo $value->inv_date; ?></h6>
														<h6><?php echo date("H:i:s"); ?></h6>
													</div>

													<table class="table table-striped">
														<thead>
															<tr style="border-top:2px solid black;font-size:13px;">

																<th>មុខម្ហូប</th>
																<th>ចំនួន</th>
																<th>តម្លៃ(៛)</th>
																<th>សរុប(៛)</th>
															</tr>
														</thead>
														<tbody>
														  <?php
														  $total = 0;
														  foreach ($menu[$key1] as $key => $value): ?>

															<tr>

																<td><?php echo $value->m_name_kh ?></td>
																<td><?php echo $value->qty ?></td>
																<td style="text-align:right;"><?php echo number_format($value->price) ?></td>
																<td style="text-align:right;"><?php echo number_format($value->total) ?></td>
															</tr>
														  <?php
														  $total = ($total + $value->total);
														 endforeach; ?>
														 	<tr style="border-top:2px solid black;">
														 		<td colspan="5" style="text-align: right;"><strong>ទឹកប្រាក់សរុបជារៀល: <?php echo number_format($total) ?></strong></td>
														 	</tr>
														 	<tr>
														 		<td colspan="5" style="text-align: right;"><strong>ទឹកប្រាក់សរុបជាដុល្លារ: <?php echo number_format(($total / $exchange->key_data)	,2)?></strong></td>
														 	</tr>
														</tbody>
													</table>

												</div>
											</div>
										<hr>
										<!-- <h4><strong>Grand Total: <?php echo "$".$total ?></h4></strong> -->
										<a onclick="printInvoice('invoice<?php echo $key1?>')" href="<?php echo base_url()?>index.php/invoice_pos/index/<?php echo $value->inv_id?>" class="btn btn-primary btn-lg"><?php echo $this->lang->line("print_invoice") ?></a>
									</div>
								</div>
							<?php endforeach; ?>
							</div>  <!--======= div class="row" =========-->
						</div>
						<div role="tabpanel" class="tab-pane" id="receipt">
							<div class="row" style="margin-top:20px;">

							<?php foreach ($receipt as $key1 => $value): ?>
								<div class="col-sm-4 col-md-6">
									<div class="thumbnail">
									<div style="display:none;">
											<div id="receipt<?php echo $key1?>">
												<table class="table table-striped">
													<tr>
														<td colspan="4" style="text-align: center; border-top: none;">
															<!-- <img style="width: 30%;" src="<?php echo base_url('assets/uploads/leaf-restaurant-logo-illustration-art-isolated-background-32209216.jpg')?>"> -->
															<h3 style="text-align:center;">ស៊ុបគោពេញចិត្ត</h3>
															<p>#429អាបេសេ សង្កាត់បឹងព្រលឹត,</p>
															<p>ផ្លូវ 93 ខណ្ឌ 7 មករា</p>
															<h3 style="text-align:center;">វិក័យបត្រទូទាត់<?php echo $this->lang->line("table") ?> <?php echo $value->tab_id ?></h3>
														</td>
													</tr>

													<tr style="border-top:2px solid black;">
														<td colspan="4"><?php
															echo "<h6 style='color:red;text-align:left;float:left;'>ល.រ: ".$invID."</h6>";
														?>
															<h6 style="text-align:right;"><?php echo date("Y-m-d") ?></h6>
															<?php
																echo "<h6 style='float:left;'>បេឡា: ".$value->user_crea."</h6>";
																echo "<h6 style='float:right;'>".date("H:i:s")."</h6>";
															 ?>
														 </td>

													</tr>

												</table>
												<table class="table table-striped">
													<thead>
														<tr style="border-top:2px solid black;">

															<th>មុខម្ហូប</th>
															<th>ចំនួន</th>
															<th>តម្លៃ(៛)</th>
															<th>សរុប(៛)</th>

														</tr>
													</thead>
													<tbody>
													  <?php
													  $total = 0;

													  foreach ($menu_rec[$key1] as $key => $value1): ?>

														<tr>

															<td><?php echo $value1->m_name_kh ?></td>
															<td><?php echo $value1->qty ?></td>
															<td style="text-align:right;"><?php echo number_format($value1->price) ?></td>
															<td style="text-align:right;"><?php echo number_format($value1->total) ?></td>

														</tr>
													  <?php

													  $total = $total + $value1->total;
													 endforeach; ?>

													 <tr style="border-top:2px solid black;">

														 <td colspan="3" style="text-align: right;"><?php echo $this->lang->line("grand_ttl_riel") ?>: </td>
														 <td style="text-align: right;"><?php echo number_format($total)?></td>

													 </tr>
														<tr style="border-bottom:2px double black;">
															<td colspan="3" style="text-align: right;"><?php echo $this->lang->line("grand_ttl_usd") ?>: </td>

															<td style="text-align: right;"><?php echo number_format($total/$exchange->key_data,2)?></td>
														</tr>

														<tr>
															<td colspan="3" style="text-align: right;"><?php echo $this->lang->line("cash_in_riel") ?>: </td>

															<td style="text-align: right;">{{cash_in_riel|number}}</td>
														</tr>
														<tr>
															<td colspan="3" style="text-align: right;"><?php echo $this->lang->line("cash_in_usd") ?>: </td>

															<td style="text-align: right;">{{cash_in_usd|currency}}</td>
														</tr>
														<tr>
															<td colspan="3" style="text-align: right;"><?php echo $this->lang->line("exRiel") ?>: </td>

															<td style="text-align: right;">{{excRiel|number}}​</td>
														</tr>
														<tr>
															<td colspan="3" style="text-align: right;"><?php echo $this->lang->line("exUsd") ?>: </td>

															<td style="text-align: right;">{{exUsd|currency}}</td>
														</tr>

													</tbody>
												</table>
												<h5 style="text-align:center"><i>សូមអរគុណ។​ សូមអញ្ជើញមកម្តងទៀត។</i></h5>

											</div>
										</div>

										<form method="post" id="form<?php echo $key1?>" action="<?php echo base_url('index.php/invoice_pos/printReceipt/'.$value->inv_id)?>">
											<input type="hidden" name="txtinv_id" value="<?php echo $value->inv_id?>">
											<input type="hidden" readonly class="form-control" name="txtExRate" ng-model="exchange" ng-init="exchange=<?php echo $exchange->key_data?>">
											<div class="form-group">

											</div>
											<div class="form-group">
												<label for=""><?php echo $this->lang->line("grand_ttl_usd") ?></label>
												<!-- <input type="text" name="txtGrandTtlUsd" class="form-control" value="<?php echo number_format($total,2)?>"> -->
												<label for="" class="pull-right" style="color:red;font-size:30px;"><?php echo $this->lang->line("table") ?> <?php echo $value->tab_id?></label>
												 <input type="text" readonly="" name="txtGrandTtlUsd" class="form-control" value="<?php echo number_format($total/$exchange->key_data,2)?>" >

											</div>
											<div class="form-group">
												<label for=""><?php echo $this->lang->line("grand_ttl_riel") ?></label>
												<input type="text" readonly=""  class="form-control " value="<?php echo $total?>" >
												<input type="hidden" readonly="" id="grandTtlRiel<?php echo $key1?>" name="txtGrandTtlRiel" class="form-control " value="<?php echo ($total)?>" >
											</div>
											<div class="form-group">
												<label for=""><?php echo $this->lang->line("cash_in_usd") ?></label>
												<input type="text" style="background:rgba(240, 173, 78, 0.36);" class="form-control"  ng-change="calExUsd(cashInUsd<?php echo $key1?>,<?php echo number_format($total/$exchange->key_data,2)?>,<?php echo $key1?>)" name="txtCashInUsd" value="{{cashInUsd<?php echo $key1?>}}" ng-model="cashInUsd<?php echo $key1?>" id="cashInUsd<?php echo $key1?>">
											</div>
											<div class="form-group">
												<label for=""><?php echo $this->lang->line("cash_in_riel") ?></label>
												<input type="text" style="background:rgba(240, 173, 78, 0.36);" class="form-control"  ng-change="calExRiel(cashInRiel<?php echo $key1?>,<?php echo ($total)?>,<?php echo $key1?>)" name="txtCashInRiel" value="{{cashInRiel<?php echo $key1?>}}" ng-model="cashInRiel<?php echo $key1?>" id="cashInRiel<?php echo $key1?>">
											</div>
											<div class="form-group">
												<label for=""><?php echo $this->lang->line("exUsd") ?></label>
												<input type="text" id="exUsd<?php echo $key1?>" name="txtExUSD" readonly  class="form-control " value="<?php echo number_format(($total/$exchange->key_data)*(-1),2)?>">
											</div>
											<div class="form-group">
												<label for=""><?php echo $this->lang->line("exRiel") ?></label>
												<input type="text" id="exRiel<?php echo $key1?>" name="txtExRiel" readonly class="form-control " value="<?php echo $total*(-1)?>">
											</div>

											<div id="blockPrint" style="display:block;">
												<!-- <button  type="submit" name="print" id="print">Print</button> -->
												<!-- <a onclick="printReceipt('receipt<?php echo $key1?>','<?php echo $key1?>')" href="#" class="btn btn-primary">Print</a> -->
												<button type="button" id="btnPrint<?php echo $key1?>" disabled name="button" onclick="printReceipt('receipt<?php echo $key1?>','<?php echo $key1?>')" class="btn btn-primary btn-lg"><?php echo $this->lang->line("print") ?></button>
											</div>
										</form>
									</div>
								</div>
							<?php endforeach; ?>
							</div>  <!--======= div class="row" =========-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#btnRefresh").click(function(){
		window.location.assign("<?php echo base_url()?>invoice_pos");
	});

	$("#btnEditInvoice").click(function(){
		window.location.assign("<?php echo base_url()?>invoice_pos/editInvoice");
	});

	$("#btnReprint").click(function(){
		window.location.assign("<?php echo base_url()?>invoice_pos/reprintInvoice");
	});
</script>
<script type="text/javascript">
  var app = angular.module("myApp",[]);
  app.controller("myCtrl",function($scope)
  {
    $scope.receiptNo = Date.now();

    $scope.cashInUsd = 0;
    $scope.cashInRiel = 0;
    $scope.exUsd = 0;
    //$scope.exRiel = 0;
		var exRate = "<?php echo $exchange->key_data?>";
		var cashExUsd2Riel = 0;
    $scope.calExUsd = function(val,grandTtl,key1)
    {
      var tmp = (val - grandTtl).toFixed(2);
			var ttlRiel = parseFloat($("#grandTtlRiel"+key1).val());
			var exUsd = Math.floor(tmp);
			var exRiel = ttlRiel-(val*exRate);
			$("#btnPrint"+key1).attr("disabled","disabled");
			if(tmp>0)
			{
				$("#exUsd"+key1).val(tmp);
				$("#exRiel"+key1).val(tmp*exRate);
				$scope.cash_in_usd = $("#cashInUsd"+key1).val();
				$scope.cash_in_riel = $("#cashInRiel"+key1).val();
				$scope.exUsd = $("#exUsd"+key1).val();
				$scope.excRiel = $("#exRiel"+key1).val();
				$("#btnPrint"+key1).removeAttr("disabled");
			}else {
				// if(tmp>0)
				// {
				// 	$("#exUsd"+key1).val(0);
				// 	$("#exRiel"+key1).val(tmp*exRate);
				// }else
				if(tmp==0) {
					$("#exUsd"+key1).val(0);
					$("#exRiel"+key1).val(0);
					$scope.cash_in_usd = $("#cashInUsd"+key1).val();
					$scope.cash_in_riel = $("#cashInRiel"+key1).val();
					$scope.exUsd = $("#exUsd"+key1).val();
					$scope.excRiel = $("#exRiel"+key1).val();
					$("#btnPrint"+key1).removeAttr("disabled");
				}else {
					$("#exUsd"+key1).val(tmp);
					$("#exRiel"+key1).val(tmp*exRate);
					$scope.cash_in_usd = $("#cashInUsd"+key1).val();
					$scope.cash_in_riel = $("#cashInRiel"+key1).val();
					$scope.exUsd = $("#exUsd"+key1).val();
					$scope.excRiel = $("#exRiel"+key1).val();
					$("#btnPrint"+key1).attr("disabled","disabled");
				}

			}
    }

		$scope.calExRiel = function(val,grandTtl,key1){
			var tmp = val - grandTtl;
			var cashUsd = $("#cashInUsd"+key1).val();
			var total =0;
			$("#btnPrint"+key1).attr("disabled","disabled");
			if(cashUsd=="")
			{

					if(tmp==0)
					{
						$("#exUsd"+key1).val(0);
						$("#exRiel"+key1).val(0);
						$scope.cash_in_usd = $("#cashInUsd"+key1).val();
						$scope.cash_in_riel = $("#cashInRiel"+key1).val();
						$scope.exUsd = $("#exUsd"+key1).val();
						$scope.excRiel = $("#exRiel"+key1).val();
						$("#btnPrint"+key1).removeAttr("disabled");
					}
					else if(tmp>0)
					{
						$("#exUsd"+key1).val(0);
						$("#exRiel"+key1).val(tmp);
						$scope.cash_in_usd = $("#cashInUsd"+key1).val();
						$scope.cash_in_riel = $("#cashInRiel"+key1).val();
						$scope.exUsd = $("#exUsd"+key1).val();
						$scope.excRiel = $("#exRiel"+key1).val();
						$("#btnPrint"+key1).removeAttr("disabled");
					}
					else {
						$("#btnPrint"+key1).attr("disabled","disabled");
					}
					// $("#btnPrint"+key1).removeAttr("disabled");
			}
			else {
					if(val=="")
					{
						val=0;
					}
						cashExUsd2Riel = cashUsd * exRate;
						total = parseInt(cashExUsd2Riel) + parseInt(val);
						tmp = total - grandTtl;
						$("#exRiel"+key1).val(tmp);
						if(tmp>=0)
						{
							$("#exUsd"+key1).val(0);
							$scope.cash_in_usd = $("#cashInUsd"+key1).val();
							$scope.cash_in_riel = $("#cashInRiel"+key1).val();
							$scope.exUsd = $("#exUsd"+key1).val();
							$scope.excRiel = $("#exRiel"+key1).val();
							$("#btnPrint"+key1).removeAttr("disabled");
						}
			}

		}
  });
  function printInvoice(el)
    {

        var restorepage = document.body.innerHTML;
        var printinvoice = document.getElementById(el).innerHTML;
        document.body.innerHTML = printinvoice;
        window.print();
        document.body.innerHTML = restorepage;

    }//PrintInvoice

    function printReceipt(el,form_id)
    {
        var restorepage = document.body.innerHTML;
        var printreceipt = document.getElementById(el).innerHTML;
        document.body.innerHTML = printreceipt;
        window.print();
        document.body.innerHTML = restorepage;
        $("#form"+form_id).submit();

    }// PrintReceipt
</script>
