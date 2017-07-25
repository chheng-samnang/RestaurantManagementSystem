</nav>
<div ng-app="myApp" ng-controller="myCtrl">
	<div class="container" style="margin-top:80px;">
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					Receipt Information
				</div>
				<div class="panel-body">
					<form class="form-horizontal" action="<?php echo base_url()?>index.php/receiptController/index/<?php echo $this->uri->segment(3)?>" method="post" name="myForm">
						
							<div class="form-group">
									<label class="col-sm-2 control-label">Receipt No.</label>
									<div class="col-sm-4">
										<input type="text" readonly="" class="form-control" ng-model="receiptNo" name="txtReceiptNo">
									</div>

									<label class="col-sm-2 col-sm-offset-1 control-label">Exchange Rate.</label>
									<div class="col-sm-3">
										<input type="text" readonly class="form-control" name="txtExRate" ng-model="exchange" value="" ng-init="exchange=<?php echo $exchange->key_data?>">
									</div>
							</div>
						
							<div class="form-group">
								<label class="col-sm-2 control-label">Grand Total (USD)</label>
								<div class="col-sm-4">
									<input type="text" readonly class="form-control"  name="txtGrandTtlUsd" ng-model="grandTtlUsd" value="{{grandTtlUsd}}" ng-init="grandTtlUsd=<?php echo $grandTtlUsd?>">
								</div>								
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Grand Total (KHR)</label>
								<div class="col-sm-4">
									<input type="text" readonly class="form-control"  name="txtGrandTtlKhr" ng-model="grandTtlKhr" ng-init="grandTtlKhr=<?php echo $grandTtlKhr?>" value="">
								</div>								
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Cash In (USD)</label>
								<div class="col-sm-4">
									<input type="text" ng-change="calExchange()" class="form-control" ng-model="cashInUsd" value="cashInUsd" name="txtCashInUsd">
								</div>								
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Cash In (KHR)</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" ng-change="calExchangeKhr()" name="txtCashInKhr" ng-model="cashInKhr">
								</div>								
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Exchange (USD)</label>
								<div class="col-sm-4">
									<input type="text" readonly class="form-control" ng-model="exchangeUsd" name="txtExchangeUsd">
								</div>								
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Exchange (KHR)</label>
								<div class="col-sm-4">
									<input type="text" readonly class="form-control" ng-model="exchangeKhr" name="txtExchangeKhr">
								</div>								
							</div>
							<hr />
							<div class="pull-left">
								
							</div>
							<div class="pull-right">
								<a href="<?php echo base_url()?>index.php/POS_C/" class="btn btn-default btn-lg"><i class="fa fa-close"></i> Cancel</a>
								<button type="submit" id="btnPrint" class="btn btn-success btn-lg" readonly><i class="fa fa-print"></i> Print Receipt</button>
							</div>
							
					</form>					
				</div>
			</div>
		</div>
	</div>
</div>		
</div>

<script type="text/javascript">
	var app = angular.module('myApp',[]);
	app.controller('myCtrl',function($scope)
		{
			$scope.receiptNo = Date.now();
			$scope.exchangeUsd =0;
			$scope.exchangeKhr=0;
			$scope.cashInUsd=0;
			$scope.cashInKhr=0;

			$scope.calExchange = function()
			{
				var tmp =  $scope.cashInUsd - $scope.grandTtlUsd;
				/*if(tmp<0)
				{
					tmp = tmp*(-1);
				}*/
				var tmp2,tmp3;
				
				if(tmp>1)
				{
					$scope.exchangeUsd = Math.floor(tmp);
					$scope.exchangeKhr = (tmp - Math.floor(tmp))*4000;
				}
				else
				{
					if(tmp!=0)
					{
						if(tmp>0)
						{
							$scope.exchangeUsd = 0;
							tmp2 = (tmp * $scope.exchange).toString();
							tmp3 = (100-tmp2.substr(tmp2.length-2,2));
							$scope.exchangeKhr = (parseInt(tmp2) + parseInt(tmp3));
						}else
						{
							$scope.exchangeUsd = 0;
							tmp2 = (tmp * $scope.exchange).toString();
							tmp3 = (100-tmp2.substr(tmp2.length-2,2))*(-1);
							$scope.exchangeKhr = (parseInt(tmp2) + parseInt(tmp3));
						}
						
					}else
					{
						$scope.exchangeKhr = 0;	
					}
					
				}
				if($scope.exchangeUsd>=0&&$scope.exchangeKhr>=0)
				{
					document.getElementById("btnPrint").removeAttribute("disabled"); 
				}else
				{
					$('#btnPrint').attr("disabled","disabled");
				}
			}
			
			$scope.calExchangeKhr = function()
			{
					var cashInUsd = parseInt($scope.cashInUsd);
					var exchange = $scope.exchange;
					
					var cashInKhr = parseInt($scope.cashInKhr);
					var grandTtlKhr = parseInt($scope.grandTtlKhr);
					var tmp = (cashInUsd*exchange).toString();
					var tmp2 = (100-tmp.substr(tmp.length-2,2));
						tmp = parseInt(tmp) + parseInt(tmp2);
					$scope.exchangeKhr = (tmp+cashInKhr)-grandTtlKhr;
					if($scope.exchangeUsd>=0&&$scope.exchangeKhr>=0)
					{
						document.getElementById("btnPrint").removeAttribute("disabled"); 
					}else
					{
						$('#btnPrint').attr("disabled","disabled");
					}
			}			
		});
</script>


