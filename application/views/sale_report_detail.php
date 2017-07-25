</nav>
<style media="screen">
  th{text-align:center;}
</style>
<div id="page-wrapper" ng-app="myApp" ng-controller="myCtrl" ng-cloak>
<div class="container-fluid">
<div class="row">
  <div class="col-lg-12">
    <div class="row">
      <h1 class="page-header"><?php echo $this->lang->line('sale_report')?></h1>
      <div class="panel panel-default">
        <div class="panel-heading">

            <h3 class="panel-title">Filter</h3>

            <button onclick="printReport('report')" style="float: right; margin-top: -25px;" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> <?php echo $this->lang->line('print')?></button>

        </div>
        <div class="panel-body">
          <form method="post" action="<?php echo base_url('index.php/report_c/sale_report_detail')?>" class="form-inline">
                <div class="form-group">
                  <label for="exampleInputEmail2"><?php echo $this->lang->line("InvoiceNum") ?></label>
                        <?php echo form_dropdown("ddlInv",$invoice,"","class='form-control' ng-model='ddlInv'") ?>
                  </div>
              <button type="button" ng-click="search()" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i> <?php echo $this->lang->line('search')?></button>
            </form>
            <hr>

            <div id="report">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th><?php echo $this->lang->line("no") ?></th>
                  <th><?php echo $this->lang->line("name") ?></th>
                  <th><?php echo $this->lang->line("qty") ?></th>
                  <th><?php echo $this->lang->line("price") ?></th>
                  <th><?php echo $this->lang->line("grandTtl") ?></th>
                </tr>
              </thead>
              <tbody>

                <tr ng-repeat="x in inv">
                  <td style="text-align:center;">{{$index+1}}</td>
                  <td style="text-align:left;">{{x.NameKh}}</td>
                  <td style="text-align:center;">{{x.Qty}}</td>
                  <td style="text-align:right;">{{x.Price}}</td>
                  <td style="text-align:right;">{{x.Total}}</td>
                </tr>
                <!-- <tr>
                  <td colspan="3" style="text-align:right;"><strong><?php echo $this->lang->line("grandTtl") ?></strong></td>
                  <td></td>
                  <td></td>
                </tr> -->

              </tbody>
            </table>

            </div>



        </div>
      </div>

    </div>
  </div>
</div>
</div>
</div>
<script>
        $(document).ready(function(){
            $('#mydata').DataTable();
        });
</script>

<script>
  function printReport(el)
    {

        var restorepage = document.body.innerHTML;
        var printReport = document.getElementById(el).innerHTML;
        document.body.innerHTML = printReport;
        window.print();
        document.body.innerHTML = restorepage;

    }

</script>

<script type="text/javascript">
  var app = angular.module("myApp",[]);
  app.controller("myCtrl",function($scope,$http){
    $scope.search = function(){
      $http.get("<?php echo base_url()?>ng/load_invoice_det.php?invID="+$scope.ddlInv)
       .then(function(response) {
           $scope.inv = response.data.records;
       });
    }
  });

</script>
