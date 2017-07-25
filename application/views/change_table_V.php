</nav>
<!--left-->
    <?php echo form_open('index.php/change_table_C/update');?><!--form-->
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                
                <div class="container-fluid">
                    <div class="row" style="margin-top:20px;">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h4><i class="fa fa-edit"></i> Order Menu Management</h4></div>
                                    <div class="panel-body">                                       
                                        <div class="row">
                                            <div class="col-lg-12">                                                
                                                <button type="submit" name="btnSaveChange" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Save Change</button>                                        
                                                <a href="<?php echo site_url('index.php/POS_C');?>" class="btn btn-default btn-lg" style="margin-left:1%"><i class="fa fa-close"></i> Cancel</a>                                                                               
                                            </div>                                                                        
                                        </div>                               
                                    </div>
                                </div>            
                            </div><!--end col-->                    
                        </div><!--end row-->                              
                                        
                    <!--error-->
                    <div class="row">
                        <div class="col-lg-12">                            
                            <?php if(form_error('new_tab_id')){?>
                                <div class="alert alert-warning alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <strong>Warning!</strong> <?php echo form_error('new_tab_id');?>
                                </div>
                            <?php }?>                            
                        </div>
                    </div>
                    <!--end error-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-list-alt"></i> <b>Table lists</b></div>
                                <div class="panel-body" style="overflow: scroll;overflow-x: hidden;height: 380px;">
                                    <div class="row">                                                                                                
                                        <?php foreach($record as $value){ ?>
                                          <div class="col-lg-2 tables">
                                            <a href="#" style="text-decoration: none">
                                               <div class=" border panel panel-<?php if(($value->sta)=='Waiting'){echo 'warning';} else if(($value->sta)=='Busy'){echo 'danger';}else echo 'info';?>">
                                                  <div class="panel-heading">
                                                        <span style="float:left">Table</span>
                                                        <input type="hidden" name="old_tab_id" value="<?php echo $table_id;?>">                                                                                                               
                                                        <input type="radio" name="new_tab_id" style="float:right" value="<?php echo $value->tab_id;?>" class="chk" id="<?php echo $value->tab_id?>">                                                                                                            
                                                        <h1 class="text-center" style="clear:both"><?php echo $value->tab_name;?></h1>
                                                        <h6 class="text-right"><i><?php echo $value->sta;?></i></h6>
                                                    </div>                                                                                                                                  
                                               </div>
                                            </a>
                                           </div> 
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row2-->             

                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div><!--end col-->
        </div><!--end row-->
    <?php echo form_close();?>
        

    </div>
    <!-- /#wrapper -->    

    <script>        
          $(".border").click(function()
            {  
                          
                var value=($(".chk",this).val());
                document.getElementById(value).checked = true;  
                // var app = angular.module("Myapp", []);
                // app.controller("MyCtrl", function($scope) {
                //     alert($("input:radio[name=option]:checked").val());
                // });                                                          
            }); 

    </script>    
    
       











