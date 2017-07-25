<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>POS</title>
	<link href="<?php echo base_url()?>assets/orderpos/css/bootstrap.min.css" rel="stylesheet">
	 <link href="<?php echo base_url()?>assets/drowdown/jquery-select7.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>assets/orderpos/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/orderpos/css/bootstrap-theme.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/paperRipple/dist/paper-ripple.min.css">
  <link href="<?php echo base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<style type="text/css">
	.nav-tabs.nav-justified{    width: 0%;}
    .nav-tabs{    border-bottom: none;}
    .nav > li > a:hover, .nav > li > a:focus{    background-color: rgba(238, 238, 238, 0);}
    .nav-tabs > li > a:hover{    border-color: rgba(238, 238, 238, 0) rgba(238, 238, 238, 0) rgba(221, 221, 221, 0)}
    .nav .open > a, .nav .open > a:hover, .nav .open > a:focus{    background-color: rgba(238, 238, 238, 0);}
    .nav .open > a, .nav .open > a:hover, .nav .open > a:focus{    border-color: rgba(255, 255, 255, 0);}
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus{     border: 1px solid rgba(221, 221, 221, 0);   background-color: rgba(255, 255, 255, 0);}
    .dropdown-menu > li > a{padding: 8px 13px;}
    .thumbnail, .box{    margin-bottom: 14px;}
    .col-xs-6, .col-sm-4, .col-md-3, .c1{padding-right: 8px; padding-left: 8px}
    .select7__current{
          height: 38px !important;
    }
</style>
<script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/angular.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/angular-route.js"></script>
</head>
	<body style="font-family: Khmer OS Battambang;" ng-app="myApp" ng-controller="myCtrl" ng-cloak>
    <?php echo form_open(base_url()."order_pos_c/index") ?>
<div id="spin"></div>
<div class="container-fluid" style=" padding-left: 0px !important;">

		<nav id="" class="navbar navbar-fixed-top" style="height: 72px;background-image:linear-gradient(to bottom, #337ab7 0%, #2c5273 100%);">
        <div class="container" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
	        <div class="collapse navbar-collapse" id="myNavbar">
	            <ul class="nav navbar-nav">

	                <li class="active"><a href="<?php echo base_url()?>" style="font-size: 44px;font-weight: bold; color: white;    margin-top: 10px;"><?php echo $this->lang->line('menu0')?></a></li>

	            </ul>

                <ul class="nav navbar-nav navbar-right" >
                  <!--  <ul class="nav nav-tabs btn btn-default btn-sm" id="myTab" style="margin-top: 11px">
        					    <li class="dropdown">
        					    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b style="font-size: 16px;">Category</b> <span class="caret"></span></a>
        					        <ul class="dropdown-menu"  style="margin-top: 3px; margin-right: -11px;">
                            <li><a href="#BigMeals" data-toggle="tab" ng-click="loadItem('all')"><h4>All Menus</h4></a></li>
                            <hr>
                            <?php foreach ($category as $key => $value) {?>
        					            <li><a href="#BigMeals" data-toggle="tab" ng-click="loadItem('<?php echo $value->cat_id?>')"><h4><?php echo $value->cat_name ?></h4></a></li>
                              <hr>
                              <?php } ?>
        					        </ul>
        					    </li>
					          </ul> -->

                </ul>



                <ul class="nav navbar-nav navbar-right" >
                <b style="color:#fff;"><?php echo $this->lang->line('changes_language')?></b>
                <select class="select7" style="margin-top: 10px" onchange="javascript:window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/'+this.value;">
                    <option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?> data-icon="<?php echo base_url('assets/uploads/en.png');?>">English</option>
                    <option value="khmer" <?php if($this->session->userdata('site_lang') == 'khmer') echo 'selected="selected"'; ?> data-icon="<?php echo base_url('assets/uploads/Cambodia.png')?>">Khmer</option>
                   <!--  <option disabled="" value="chinese" <?php if($this->session->userdata('site_lang') == 'chinese') echo 'selected="selected"'; ?> data-icon="<?php echo base_url('assets/leng/China.gif')?>">Chinese</option> -->
                </select>

                   <ul class="nav nav-tabs btn btn-default btn-sm" id="myTab" style="margin-top: 11px">
        					    <li class="dropdown">
        					    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b style="font-size: 16px;"><?php echo $this->lang->line('table')?></b> <span class="caret"></span></a>
        					        <ul class="dropdown-menu"  style="margin-top: 3px; margin-right: -11px;overflow: scroll; height: 555px; -webkit-overflow-scrolling: touch; overflow-x: hidden;">
                            <?php for($i=0;$i<=99 ;$i++) {?>
        					            <li style="text-align:center;"><a href="#" ng-click="selectTable('<?php echo ($i+1)?>')"><h3><?php echo $this->lang->line('table_number')."#".($i+1) ?></h3></a></li>
                              <hr>
                              <?php } ?>
        					        </ul>
        					    </li>
					          </ul>
                </ul>
	        </div>
    	</div><!-- /.container-fluid -->
	</nav>

					<div class="col-xs-12 col-sm-6 col-md-7" style=" margin-top: 90px;  overflow: scroll; height: 555px; -webkit-overflow-scrolling: touch; overflow-x: hidden;">
					<div class="tab-content">
						<div class="row">
							<div class="tab-content">

							    <!-- <div class="tab-pane  active" id="BigMeals"> -->

							      <div class="col-xs-6 col-lg-4 col-md-6" ng-repeat="x in menus.records" ng-click="addMenu(x['NameKh'],x['Price'],x['Id'],1)">
									    <a href="#" class="thumbnail">
									      <img id="menuImg" class="img-responsive"  src="<?php echo base_url()?>assets/uploads/{{x['Img']}}" style="height:200px;width:100%;">
									      <p style="margin-top: 5px;">
                        <i>

                               <i style="font-size:20px;">
                          <?php if($this->session->site_lang=="english"){?>
                              {{x.Name}}
                          <?php }elseif( $this->session->site_lang=="khmer"){?>
                               {{x.NameKh}}
                          <?php }?>
                        </i>

                        </i>

                        <i style="color: red; float: right;font-size:30px;">{{x['Price']|number}}</i></p>

									    </a>

								  	</div>

						    <!-- </div> -->
							</div>
					    </div>
					   </div>
					</div><!-- tab content -->
					<!-- <div class="col-xs-12 col-sm-5 col-md-5" style="margin-top: 72px; border-left: 1px solid #ddd; border-right: 1px solid #ddd">
						<div class="col-md-5" style="border-right: 1px solid #ddd"><span class="glyphicon glyphicon-flash" style="font-size: 33px; padding: 16px;"></span> dgfgdsgf</div>
						<div class="col-md-5" style="border-right: 1px solid #ddd"><span class="glyphicon glyphicon-edit" style="font-size: 33px; padding: 16px;"></span> Table 10</div>
						<div class="col-md-2"><span class="glyphicon glyphicon-flash" style="font-size: 33px; padding: 16px;"></span></div>
					</div> -->
					<div class="col-xs-12 col-sm-6 col-md-5" style="    padding-right: 6px; margin-top: 90px; border-left: 1px solid #d6cfcf;">
						<div class="row" style="margin-bottom: -26px;">
							<div class="panel panel-default" style="border-left: none; border-radius: 0px; overflow: scroll; height: 400px; -webkit-overflow-scrolling: touch; overflow-x: hidden;">
  								<div class="row">
  								<div class="panel-body">


								<table class="table table-striped table-hover">
								 	<thead>
								 		<tr>
                        <th><?php echo $this->lang->line("no") ?></th>
									   		<th><?php echo $this->lang->line("name") ?></th>
									   		<th><?php echo $this->lang->line("qty") ?></th>
									   		<th><?php echo $this->lang->line("price") ?></th>
									   		<th><?php echo $this->lang->line("total") ?></th>
									   		<th></th>
								   		</tr>
								 	</thead>
								 	<tbody>
									   <tr ng-repeat="x in list">
                        <td>{{$index+1}}</td>
									   		<td><a href="" style="font-size: 15px; font-weight: bold;" ng-click="removeOne($index,x[2])">{{x[1]}}</a></td>
									   		<td style="width: 17%;"><input type="show" style="border: none;width: 100%; background: rgba(255, 255, 255, 0);" readonly="" name="menu" value="{{x[3]}}"></td>
                        <td>{{x[2]|number}} </td>
									   		<td>{{(x[3]*x[2])|number}}</td>
									   		<td><a ng-click="removeMenu($index,x[3]*x[2])" href="" style="color: red; font-size: 17px;"><span class="glyphicon glyphicon-trash"></span></a></td>
									   </tr>
									</tbody>
								</table>
							</div>
							</div>
               <?php if(form_error('menu')){?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong> <?php echo form_error('menu');?>
                    </div>
                  <?php }elseif(form_error('txtTable')){?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong> <?php echo form_error('txtTable');?>
                    </div>
                  <?php }?>
							</div>
						</div>
						<div class="row">
							<div class="col-sx-2 col-sm-12 col-md-12">
                <div class="col-xs-6 col-sm-6 col-md-8">
									<h3><?php echo $this->lang->line("table_number") ?>:</h3>
								</div>
                <div class="col-xs-4 col-sm-4 col-md-4">
									<h3 style="color: red"># {{tblNo}}</h3>
                  <input type="hidden" name="txtTable" value="{{tblNo}}">
								</div>
								<div class="col-xs-6 col-sm-6 col-md-8">
									<h4><?php echo $this->lang->line("grand_ttl_riel") ?>:</h4>
								</div>
								<div class="col-xs-4 col-sm-4 col-md-4">
									<h4 style="color: red">{{grandTtl|number}}</h4>
								</div>
							</div>
							<div class="col-sx-2 col-sm-12 col-md-12">

								<!-- <div class="col-xs-6 col-sm-6 col-md-8">
									<h4>Grand Total($):</h4>
								</div>
								<div class="col-xs-4 col-sm-4 col-md-4">
									<h4 style="color: red">{{(grandTtl / 4000)|currency}}​​ ៛</h4>
								</div> -->
							</div>
						</div><hr />
						<div class="row">
							<div class="col-sm-5 col-md-6">
								<!-- <button class="btn btn-primary btn-lg" onclick="window.print()">Print</button> -->



				                <button type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-success btn-lg"><?php echo $this->lang->line("checkout") ?></button>
				            </div>
				            <div class="col-sm-7 col-md-6">

				                <button type="button" name="btnBack" id="btnBack" class="btn btn-default btn-lg"><?php echo $this->lang->line("back") ?></button>
							</div>

						</div>

						<!-- <div class="row" style="background-color: #316ea2; //margin-top: 295px;">
							<div class="col-sx-2 col-sm-12 col-md-12">
								<div class="row">
									<div class="col-xs-2 col-sm-2 col-md-3" style="background-color: #FF9800">
										<div class="row" style="text-align: center;font-size: 35px;line-height: 1.8;">
											<a href="" style="color: white;"><span class="glyphicon glyphicon-flash"></span></a>
										</div>
									</div>
									<div class="col-xs-7 col-sm-7 col-md-7">
										<a href=""><h2 style="text-align: center;    color: white;">Check Out</h2></a>
									</div>
									<div class="col-xs-2 col-sm-2 col-md-2" style="border-left: 1px solid white;text-align: center;font-size: 35px;line-height: 1.8;">
										<a href="" style="color: white;"><span class="glyphicon glyphicon-cog"></span></a>
									</div>
								</div>
							</div>
						</div> -->
            <input type="hidden" name="str" id="str" value="">
					</div>
<?php echo form_close() ?>

		 <script src="<?php echo base_url()?>assets/orderpos/js/jquery-1.11.3.js"></script>
		 <script src="<?php echo base_url()?>assets/orderpos/js/bootstrap.min.js"></script>
     <script src="<?php echo base_url()?>assets/drowdown/jquery-select7.js"></script>
     <script src="<?php echo base_url()?>assets/PaperRipple/dist/paperRipple.jquery.js.min.map"></script>
     <script src="<?php echo base_url()?>assets/PaperRipple/dist/paperRipple.jquery.min.js"></script>
     <script src="<?php echo base_url()?>assets/loading/jquery.babypaunch.spinner.js"></script>
     <script>
        $(function(){
          //$("#spin").spinner();

          $("#spin").spinner({
            color: "black"
            , background: "rgba(25, 24, 24, 0.85)"
            , html: "<i class='fa fa-spinner fa-pulse' style='color: #3889d0;'></i>"
            , spin: true
          });

          $("#btnSubmit").click(function(){

            $("#spin").show();

            setTimeout(function(){

              $("#spin").hide();
            }, 5000);
          });
        });
    </script>
     <script>
       $("#menuImg").paperRipple();

     </script>


     <script type="text/javascript">
      var arr=[];
      var arr2=[];
      var arr3=[];
      var i = 0;
      var total=0;
      var qty2=1;
       var app = angular.module("myApp",[]);
       app.controller("myCtrl",function($scope,$http){
         $scope.grandTtl = 0;
         $scope.tblNo = "";
         $http.get("<?php echo base_url()?>ng/loadMenu.php?cid=")
          .then(function(response) {
              $scope.menus = response.data;

          });

         $scope.loadItem = function(val){
           $http.get("<?php echo base_url()?>ng/loadMenu.php?cid="+val)
            .then(function(response) {
                $scope.menus = response.data;
            });
         }
         $scope.addMenu = function(name,price,id,qty){
            var found = arr2.indexOf(name);
            if(found!=-1)
            {
                arr3[found] = arr3[found]+1;
                arr[found][3]=arr3[found];
            }else {
                arr[i] = [id,name,price,qty];
                arr2[i] = name;
                arr3[i] = qty;
                i = i+1;
                qty2=0;
            }

            $scope.list = arr;
            total = total + (price*qty);
            $scope.grandTtl = total;

            }
          $scope.removeMenu = function(id,ttl){
            arr.splice(id,1);
            arr2.splice(id,1);
            i = i-1;
            total = total - ttl;
            $scope.grandTtl = total;
            qty2=0;
          }
          $scope.removeOne = function(index,ttl)
          {
            arr3[index] = arr3[index]-1;
            arr[index][3] = arr3[index];
            total = total - ttl;
            $scope.grandTtl = total;

            if(arr3[index]==0)
            {
              arr.splice(index,1);
              arr2.splice(index,1);
              arr3.splice(index,1);
              i = i-1;
              //arr[index][2]=0;
            }
          }

          $scope.selectTable = function(tblNo){
            $scope.tblNo = tblNo;
          }
       });

       $('#btnSubmit').click(function()
         {
           $('#str').val(JSON.stringify(arr));
         });
      $('#btnBack').click(function(){
        window.location.assign("<?php echo base_url()?>");
      });
     </script>
     <script>
        $(".select7").select7()
     </script>
	</body>
</html>
