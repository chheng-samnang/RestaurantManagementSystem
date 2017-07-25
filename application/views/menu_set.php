<div id="page-wrapper" ng-app="myApp" ng-controller="myCtrl">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Menu Set</h1>
        <div class="row">
          <div class="col-lg-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Menu Listing</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <?php foreach ($menu as $key => $value) {?>
                    <div class="col-lg-3" style="text-align:center;">
                      <img ng-click="addMenu('<?php echo $value->m_id?>','<?php echo $value->m_name?>','<?php echo $value->img?>','1')" style="cursor:pointer;" src="<?php echo base_url()?>assets/uploads/<?php echo $value->img?>" class="img-thumbnail" alt="">
                      <label><?php echo $value->m_name ?></label>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Selected Menu in Set</h3>
              </div>
              <div class="panel-body">
                <div class="row">

                    <div class="col-lg-12" ng-cloak>
                      <?php echo form_open(base_url()."index.php/menu_C/add_set") ?>
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr ng-repeat="x in menus">
                            <td>{{$index+1}}</td>
                            <td>{{x[1]}}</td>
                            <td><img style="width:80px;cursor:pointer;" src="<?php echo base_url()?>assets/uploads/{{x[2]}}" class="img-thumbnail" alt=""></td>
                            <td><button type="button" name="btnRemove" id="btnRemove" class="btn btn-danger" ng-click="removeMenu($index)">Remove</button></td>
                          </tr>
                        </tbody>
                      </table>
                      <input type="hidden" name="str" id="str" value="">
                      <hr>
                      <button type="submit" name="btnSave" id="btnSave" class="btn btn-success" disabled>Save Menu Set</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var menu = [];
  var menu_id = [];
  var i = 0;
  var app = angular.module("myApp",[]);
  app.controller("myCtrl",function($scope,$http){

    
    $scope.addMenu = function(id,name,img,qty)
    {
      var found = menu_id.indexOf(id);
      if(found==-1)
      {
        menu_id[i] = id;
        menu[i] = [id,name,img,qty];
        $scope.menus = menu;
        i = i+1;
        $("#btnSave").removeAttr("disabled");
      }
      else {
        alert("Cannot add the same menu.");
      }
    }
    $scope.removeMenu = function(index)
    {
      menu.splice(index,1);
      menu_id.splice(index,1);
      i = i-1;

      if(menu.length==0)
      {
        $("#btnSave").attr("disabled","");
      }
    }
  });

  $('#btnSave').click(function()
    {
      $('#str').val(JSON.stringify(menu));
    });
</script>
