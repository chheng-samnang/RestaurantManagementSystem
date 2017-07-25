</nav>

<div id="page-wrapper" ng-app="myApp" ng-controller="myCtrl">
  <?php echo form_open(base_url()."invoice_pos/editInvoice") ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"><?php echo $this->lang->line("btnEditInvoice") ?></h1>
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-inline">
              <div class="col-lg-6">
                <div class="form-group">
                  <div class="col-lg-6">
                    <label for="exampleInputName2"><?php echo $this->lang->line("InvoiceNum") ?></label>

                      <?php echo form_dropdown("ddlInvoice",$invoice,"","class='form-control' ng-model='ddlInvoice'") ?>
                  </div>
                    <button type="button" class="btn btn-default" style="margin-top:25px;" id="btnSearch"><i class="fa fa-search"></i> <?php echo $this->lang->line("search"); ?></button>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <div class="col-lg-6">
                    <label for="exampleInputName2"><?php echo $this->lang->line("name") ?></label>

                    <?php echo form_dropdown("ddlmenu",$menu,"","class='form-control' ng-model='ddlmenu'") ?>

                  </div>
                   <button type="button" class="btn btn-default" style="margin-top:25px;" id="btnAddmenu"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo $this->lang->line("addmenu"); ?></button>
                </div>
              </div>
            </form>

            <hr>
            <table class="table table-striped" ng-cloak>
              <thead>
                <tr>
                  <th><?php echo $this->lang->line("no") ?></th>
                  <th><?php echo $this->lang->line("name") ?></th>
                  <th><?php echo $this->lang->line("qty") ?></th>
                  <th><?php echo $this->lang->line("price") ?></th>
                  <th><?php echo $this->lang->line("total") ?></th>
                  <th><?php echo $this->lang->line("action") ?></th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="x in invoices">
                  <td>{{$index+1}}</td>
                  <td>{{x.NameKh}} <input type="hidden" name="txtMID{{$index}}" value="{{x.MID}}" ng-model="mid" ng-init="mid=x.MID" id="mid{{$index}}"></td>
                  <td><input type="text" name="txtQty{{$index}}" value="" class="form-control" ng-model="qty" id="qty{{$index}}" ng-init="qty=x.Qty" ng-change="cal($index,qty,x.Price)"></td>
                  <td><input type="text" readonly name="txtPrice{{$index}}" value="" class="form-control" id="price{{$index}}" ng-model="price" ng-init="price=x.Price"></td>
                  <td><input type="text" readonly name="txtTotal{{$index}}" value="" class="form-control" id="total{{$index}}" ng-model="total" ng-init="total=x.Total"></td>
                  <td><button type="button" ng-click="remove(x.Id,$index)" name="btnRemove" class="btn btn-danger"><i class="fa fa-trash"></i> <?php echo $this->lang->line("remove") ?></button></td>
                </tr>

              </tbody>
            </table>
            <hr>
            <button type="submit" name="btnSubmit" class="btn btn-success pull-right"><i class="fa fa-floppy-o"></i> <?php echo $this->lang->line("saveChange") ?></button>
          </div>
        </div>

      </div>
    </div>
  </div>
  <?php echo form_close() ?>
</div>

<script type="text/javascript">
    var app = angular.module("myApp",[]);
    app.controller("myCtrl",function($scope,$http){
      $("#btnSearch").click(function(){
        var invID = $scope.ddlInvoice;
        $http.get("<?php echo base_url()?>ng/load_invoice_det.php?invID="+invID)
    .then(function (response) {$scope.invoices = response.data.records;
 });

      });
      $("#btnAddmenu").click(function(){
        var id = $scope.ddlmenu;
        var invID = $scope.ddlInvoice;



        $http.get("<?php echo base_url()?>ng/Get_menu.php?id="+id+"&i_id="+invID+"")
        .then(function (response)
          {
            var value=response.data.records;
            $scope.invoices[$scope.invoices.length]={Name:value[0]["Name"],NameKh:value[0]["NameKh"],Qty:value[0]["Qty"],Price:value[0]["Price"],Total:value[0]["Total"],MID:value[0]["MID"]};

      });

      });

      $scope.cal = function(index,qty,price)
      {
        var total = qty*price;
        $("#total"+index).val(total);
      }

      $scope.remove = function(id,index){
        $http.get("<?php echo base_url()?>ng/remove_invoice_det.php?id="+id)
    .then(function (response) {
      $scope.invoices.splice(index,1);
    });
      }

    });
</script>
