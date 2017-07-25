</nav>

<div id="page-wrapper" ng-app="myApp" ng-controller="myCtrl">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <h1 class="page-header"><i class="glyphicon glyphicon-th-list"></i> <?php echo $this->lang->line("orderMenu") ?></h1>
        <button type="button" name="btnReload" id="btnReload" class="btn btn-primary">​ <i class="glyphicon glyphicon-repeat"></i> ​<?php echo $this->lang->line("reload") ?></button>
        <div class="panel panel-default" style="margin-top:20px;">
          <div class="panel-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th><?php echo $this->lang->line("order") ?></th>
                  <th><?php echo $this->lang->line("name") ?></th>
                  <th><?php echo $this->lang->line("img") ?></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($menu as $key => $value): ?>
                  <tr>
                    <td><input style="width:63px;" ng-model="order<?php echo $key?>" ng-init="order<?php echo $key?>=<?php echo $value->order?>" ng-change="cal(order<?php echo $key?>,<?php echo $value->m_id?>)" type="text" name="txtOrder" value="" class="form-control"></td>
                    <td><?php echo $value->m_name_kh ?></td>
                    <td><img class="img-thumbnail" src="<?php echo base_url()?>assets/uploads/<?php echo $value->img?>" style="width:90px;" alt=""></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var app = angular.module("myApp",[]);
  app.controller("myCtrl",function($scope,$http){
    $scope.cal = function(val,m_id)
    {
      $http.get("<?php echo base_url()?>ng/reorder_menu.php?id="+m_id+"&val="+val)
   .then(function (response) {});
    }
  });
</script>

<script type="text/javascript">
  $("#btnReload").click(function(){
    window.location.assign("<?php echo base_url()?>Menu_C/orderMenu");
  });
</script>
