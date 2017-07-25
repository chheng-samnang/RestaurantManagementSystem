</nav>
<div class="container-fluid" style="margin-top:85px;" ng-app="myApp" ng-controller="myCtrl">
<?php echo form_open('index.php/order_C/index/'.$this->uri->segment(3));?>
	<div class="row">
		<div class="col-lg-12">
			<div class="row" >
			    		<div class="col-lg-2">
			    			<div class="row">
			    				<div class="col-lg-12">
			    					<div class="list-group" style="box-shadow: 2px 5px 5px #888888;">
										  <a href="#" class="list-group-item active" >
											<b>Categories</b>
										  </a>
										  <a href="#" class="list-group-item" ng-click="loadMenu('')">
											All
										  </a>
										  <a href="#" class="list-group-item" ng-click="loadMenu(x.Id)" ng-repeat="x in categories">
											{{x.Name}}
										  </a>
									</div>
			    				</div>
			    			</div> <!-- row -->
			    			<div class="row">
			    				<div class="col-lg-12">
					    			<div class="panel panel-primary">
									  <div class="panel-heading">
									    <h3 class="panel-title">Num Pad</h3>
									  </div>
									  <div class="panel-body">
									  <div class="row">
									  	<div class="col-lg-6">
									  		<div class="form-group">
									  			<input type="text" id="txtQty" name="txtQty" ng-model="Qty" ng-click="focusTxt('q')" placeholder="Quantity" class="form-control">
									  		</div>
									  	</div>
									  	<div class="col-lg-6">
									  		<div class="form-group">
									  			<input type="text" ng-model="Dis" name="txtDis" placeholder="Discount" ng-click="focusTxt('d')" class="form-control">
									  		</div>
									  	</div>
									  </div>
									    <div class="row">
									    	<div class="col-lg-4"><button class="btn btn-default btn-lg" ng-click="addText(1,Qty,Dis)" type="button">1</button></div>
									    	<div class="col-lg-4"><button class="btn btn-default btn-lg" ng-click="addText(2,Qty,Dis)" type="button">2</button></div>
									    	<div class="col-lg-4"><button class="btn btn-default btn-lg" ng-click="addText(3,Qty,Dis)" type="button">3</button></div>
									    </div>
									    <div class="row" style="margin-top:20px;">
									    	<div class="col-lg-4"><button class="btn btn-default btn-lg" ng-click="addText(4,Qty,Dis)" type="button">4</button></div>
									    	<div class="col-lg-4"><button class="btn btn-default btn-lg" ng-click="addText(5,Qty,Dis)" type="button">5</button></div>
									    	<div class="col-lg-4"><button class="btn btn-default btn-lg" ng-click="addText(6,Qty,Dis)" type="button">6</button></div>
									    </div>
									    <div class="row" style="margin-top:20px;">
									    	<div class="col-lg-4"><button class="btn btn-default btn-lg" ng-click="addText(7,Qty,Dis)" type="button">7</button></div>
									    	<div class="col-lg-4"><button class="btn btn-default btn-lg" ng-click="addText(8,Qty,Dis)" type="button">8</button></div>
									    	<div class="col-lg-4"><button class="btn btn-default btn-lg" ng-click="addText(9,Qty,Dis)" type="button">9</button></div>
									    </div>
									    <div class="row" style="margin-top:20px;">
									    	<div class="col-lg-4"><button class="btn btn-default btn-lg" ng-click="addText('.',Qty,Dis)" type="button">.</button></div>
									    	<div class="col-lg-4"><button class="btn btn-default btn-lg" ng-click="addText(0,Qty,Dis)" type="button">0</button></div>
									    	<div class="col-lg-4"><button class="btn btn-default btn-lg" ng-click="clearTxt()" type="button"><i class="fa fa-remove"></i></button></div>
									    </div>
									  </div> <!-- panel panel-body -->
									</div> <!-- panel panel-primary -->
					    		</div> <!-- col-lg-12 -->
			    			</div>	<!-- row -->						
			    		</div> <!-- col-lg-2 -->

			    		<div class="col-lg-10">
			    			<div class="panel panel-primary">
							  <div class="panel-heading">
							    <h3 class="panel-title">Table Information</h3>
							  </div>
							  <div class="panel-body" style="">
							  	<div class="row">
							  		<div class="col-lg-3">
							  			<label name="lblOrder">Order No.</label> <?php echo date('YmdHis');?>
							  			<input type="hidden" name="txtOrder" value="<?php echo date('YmdHis');?>">
							  		</div>
							  		<div class="col-lg-3">
							  			<label>Table:</label> <?php echo  $this->uri->segment(3)?>
							  		</div>
							  		<div class="col-lg-3">
							  			<label>Staff:</label> <?php echo  $this->session->userLogin?>
							  		</div>

							  		<div class="col-lg-3">
							  		<label>Customer Type</label>
							  			<select ng-model="cus_id" ng-change="setDiscount(cus_id)" name="ddlCustomer">
											<option ng-repeat="x in customer" value="{{x.Discount}}">{{x.Name}}</option>
										</select>
							  		</div>
							  	</div>
							  </div> <!-- panel panel-body -->
							</div> <!-- panel panel-primary -->

			    			<div class="panel panel-primary">
							  <div class="panel-heading">
							    <h3 class="panel-title">Menu Listing</h3>
							  </div>
							  <div class="panel-body">
							    <div class="row">
							    	<div class="col-lg-2" ng-repeat="x in menus" >
							    		<img style="height:160px;" class="img-responsive img-thumbnail" src="<?php echo base_url()?>assets/uploads/{{x.Img}}" ng-click="addMenu(x.Id,x.Name,x.Price)">
							    		<h5>{{x.Name}}</h5>
							    	</div>
							    </div>
							  </div>
							</div>

							<div class="row">
					    		<div class="col-lg-12">
					    			<div class="panel panel-primary">
									  <div class="panel-heading">
									    <h3 class="panel-title">Order Listing</h3>
									  </div>
									  <div class="panel-body">
									    <div class="row">
									    	<div class="col-lg-12">
									    		<div>

												  <!-- Nav tabs -->
												  <ul class="nav nav-tabs" role="tablist">
												    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Order</a></li>
												    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Ordered</a></li>
										
												  </ul>

												  <!-- Tab panes -->
												  <div class="tab-content">
												    <div role="tabpanel" class="tab-pane active" id="home">
												    	<table class="table table-striped">
											    			<thead>
											    				<tr>
											    					<th>No.</th>
											    					<th>Menu Name</th>
											    					<th>Quantity</th>
											    					<th>Unit Price</th>
											    					<th>Discount</th>
											    					<th>Total</th>
											    					<th>Action</th>
											    				</tr>
											    			</thead>
											    			<tbody>
											    				<tr ng-repeat="x in menuDetail track by $index">
											    					<td>{{$index+1}}</td>
											    					<td>{{x[1]}}</td>
											    					<td>{{x[3]}}</td>
											    					<td>{{x[2] |currency}}</td>
											    					<td>{{x[4] | currency}} </td>
											    					<td>{{(x[2]*x[3])-x[4] | currency}}</td>
											    					<td><a ng-click="removeItem($index,(x[2]*x[3])-x[4],'remove')" style="cursor:pointer;">Remove</a> | <a style="cursor:pointer;" data-toggle="modal" data-target="#myModal" ng-click="getRowIndex($index)">Comment</a></td>							    	
											    				</tr>
											    				<tr>
											    					<td></td>
											    					<td></td>
											    					<td></td>
											    					<td></td>
											    					<td><strong>Grand Total</strong></td>
											    					<td><strong>{{Total | currency}}</strong></td>
											    					<td></td>
											    				</tr>											    				
											    			</tbody>
											    		</table>
												    </div>
												    <div role="tabpanel" class="tab-pane" id="profile">
												    	<table class="table table-striped">
											    			<thead>
											    				<tr>
											    					<th>No.</th>
											    					<th>Menu Name</th>
											    					<th>Quantity</th>
											    					<th>Unit Price</th>
											    					<th>Discount</th>
											    					<th>Total</th>
											    					<th>Action</th>
											    				</tr>
											    			</thead>
											    			<tbody>
											    				<tr ng-repeat="x in ordered track by $index">
											    					<td>{{$index+1}}</td>
											    					<td>{{x.Name}}</td>
											    					<td>{{x.Quantity}}</td>
											    					<td>{{x.Price | currency}}</td>
											    					<td>{{x.Discount | currency}}</td>
											    					<td>{{(x.Quantity*x.Price)-x.Discount | currency}}</td>
											    					<td><a style="cursor:pointer;" data-toggle="modal" data-target="#myModal2" ng-click="viewComment(x.Comment)">View Comment</a> | <a style="cursor:pointer;" ng-click="removeItem($index,x.ID,'cancel')">Cancel</a></td>							    	
											    				</tr>											    				
											    			</tbody>
											    		</table>
												    </div>												    
												  </div>
												</div>

											    				<!-- Modal -->
																		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
																		  <div class="modal-dialog" role="document">
																		    <div class="modal-content">
																		      <div class="modal-header">
																		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																		        <h4 class="modal-title" id="myModalLabel">Add Comment</h4>
																		      </div>
																		      <div class="modal-body">
																		        <textarea class="form-control" ng-model="Comment" name="txtComment" placeholder="Type your comment here...">
																		        	
																		        </textarea>
																		      </div>
																		      <div class="modal-footer">
																		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																		        <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="addComment(row,Comment)">Add</button>
																		      </div>
																		    </div>
																		  </div>
																		</div>

																		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
																		  <div class="modal-dialog" role="document">
																		    <div class="modal-content">
																		      <div class="modal-header">
																		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																		        <h4 class="modal-title" id="myModalLabel">Your Comment</h4>
																		      </div>
																		      <div class="modal-body">
																		        <textarea class="form-control" ng-model="selectedComment" name="txtComment">
																		        	{{selectedComment}}
																		        </textarea>
																		      </div>
																		      <div class="modal-footer">
																		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											
																		      </div>
																		    </div>
																		  </div>
																		</div>
									    		<div class="pull-right">
									    			<input type="hidden" id="str" name="str" value="">
									    			<a href="<?php echo base_url()?>index.php/pos_C" class="btn btn-default btn-lg"><i class="fa fa-close"></i> Cancel</a>
									    			<button class="btn btn-success btn-lg " type="submit" id="btnPrint" name="btnPrint"><i class="fa fa-print"></i> Print Order</button>									    			
									    		</div>
									    		
									    	</div> <!-- col-lg-12 -->
									    </div>
									  </div> <!-- panel-body -->
									</div> <!-- panel panel-primary -->
					    		</div> <!-- col-lg-10 col-lg-offset-2 -->

					    		<? echo form_close()?>
					    	</div> <!-- row -->

			    		</div> <!-- col-lg-10 -->
			    	</div> <!-- row -->

			    	
		</div> <!-- col-lg-12 -->
	</div> <!-- row -->
</div> <!-- container-fluid -->
<script type="text/javascript" src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>

<script type="text/javascript">
	var app = angular.module('myApp',[]);
	app.controller('myCtrl',function($scope,$http){

		$http.get("../../../ng/get_category.php")
    .then(function (response) {$scope.categories = response.data.records;});

    	$http.get("../../../ng/get_customer.php")
    .then(function (response) {$scope.customer = response.data.records;});

    	var arr = [];
	    var i=0,j=0,total = 0,discountRate = 0;
	    var txt = "";

	    $scope.loadMenu = function(value)
	    {
	    	$http.get("../../../ng/loadMenu.php?cid="+value)
    .then(function (response) {$scope.menus = response.data.records;});	
	    }

	    $scope.addComment = function(rowIndex,comment)
	    {
	    	arr[rowIndex][5] = comment;
	    	$scope.Comment = "";
	    }

	    $scope.addMenu = function(m_id,name,price)
	    {
	    	arr[i] = [];

	    	if($scope.Qty===undefined)
	    	{
	    		$scope.Qty = 1;
	    	}
	    	if($scope.Dis===undefined)
	    	{
	    		$scope.Dis = 0;
	    	}
	    
	    	arr[i][0] = m_id;
	    	arr[i][1] = name;
	    	arr[i][2] = price;
	    	arr[i][3] = $scope.Qty;
	    	
	    	if(discountRate!=0)
	    	{
	    		arr[i][4] = (discountRate*price)/100;
	    	}else
	    	{
	    		arr[i][4] = (($scope.Dis*price)/100);
	    	}
	    	arr[i][5] = "";
	    	

	    	total = total + ((price*$scope.Qty)-arr[i][4]);	

	    	$scope.Total = total;	

	    	i = i+1;
	    	
	    	$scope.Qty=undefined;
	    	$scope.Dis=undefined;
	    	
	    	$scope.menuDetail = arr;
	    }

	    $scope.removeItem = function(index,val,type)
	    {
	    	if(index!==undefined)
	    	{
	    		if(type=="remove")
	    		{
	    			$scope.menuDetail.splice(index,1);
	    			i = i-1;
	    			total = total - val;
	    			$scope.Total = total;
	    		}else
	    		{
	    			var xmlhttp = new XMLHttpRequest();
			        xmlhttp.open("GET", "../../../ng/cancelOrdered.php?id=" + val, true);
			        xmlhttp.send();
	    			$scope.ordered.splice(index,1);	
	    		}
	    	}
	    }

	    $scope.viewComment = function(comment)
	    {
	    	$scope.selectedComment = comment;
	    }

	    $scope.addText = function(num,oldValQ,oldValD)
	    {
	    	if(txt=='q')
	    	{
	    		if(oldValQ===undefined)
		    	{
		    		$scope.Qty = num;
		    	}else
		    	{
		    		$scope.Qty = oldValQ.toString() + num.toString();
		    	}
	    	}else
	    	{

	    		if(oldValD===undefined)
		    	{
		    		$scope.Dis = num;
		    	}else
		    	{
		    		$scope.Dis = oldValD.toString() + num.toString();
		    	}
	    	}
	    }

	    $scope.focusTxt = function(val)
	    {
	    	txt = val;
	    }

	    $scope.clearTxt = function()
	    {
	    	if(txt=='q')
	    	{
	    		$scope.Qty = undefined;	
	    	}else
	    	{
	    		$scope.Dis = undefined;
	    	}
	    }

	    $scope.setDiscount = function(disRate)
	    {
	    	if(disRate!==undefined)
	    	{
	    		discountRate = disRate;
	    	}
	    }

	    $('#btnPrint').click(function()
	    	{
	    		$('#str').val(JSON.stringify(arr));
	    	});

	    $(document).ready(function()
	    	{
	    		$http.get("../../../ng/get_ordered_menu.php?tab_id=<?php echo $this->uri->segment(3)?>")
    .then(function (response) {$scope.ordered = response.data.records;});

    			$http.get("../../../ng/loadMenu.php?cid=")
    .then(function (response) {$scope.menus = response.data.records;});

	    	});

	    $scope.getRowIndex = function(rowIndex)
	    {
	    	$scope.row = rowIndex;	
	    }

	});
</script>