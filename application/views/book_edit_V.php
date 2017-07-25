</nav>
	<div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                
                <div class="container-fluid">
                    <div class="row" style="margin-top:20px;">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h4><i class="fa fa-book"></i> Book Management</h4></div>
                                    <div class="panel-body">
                                    <?php echo form_open('index.php/bookController/edit_validation/'.$record->book_id);?>
                                      <div class="row"><!--edit form and table -->
                                        <div class="col-lg-4"><!--form-->

                                          <div class="row">
                                            <div class="col-lg-12">
                                            <!--error-->
                                                <?php if(validation_errors()){?>
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                      <strong>Warning!</strong> <?php echo validation_errors();?>
                                                    </div>
                                                <?php }?>
                                            <!--end error-->
                                            </div>
                                          </div>
                                          <div class="row">
                                           <div class="col-lg-12">
                                               <label class="control-label">Customer name</label>
                                               <input type="text" name="txtCustomerName" class="form-control" value="<?php if(isset($record->customer_name)) echo $record->customer_name;?>" placeholder="Customer name">
                                           </div>                                           
                                          </div><!--end row-->
                                          <div class="row">                                           
                                           <div class="col-lg-12">
                                               <label class="control-label">Phone</label>
                                               <input type="text" name="txtPhone" class="form-control" placeholder="Phone" value="<?php if(isset($record->phone)) echo $record->phone;?>">
                                           </div>                                           
                                          </div><!--end row-->                                       
                                         <div class="row">                                           
                                             <div class="col-lg-12">
                                                 <label class="control-label">People Amount</label>
                                                 <input type="number" name="txtPeople" class="form-control" placeholder="People Amount" value="<?php if(isset($record->people)) echo $record->people;?>">
                                             </div>                                           
                                         </div><!--end row--> 
                                       <div class="row">                                           
                                           <div class="col-lg-12">
                                               <label class="control-label">Time book</label>
                                               <input type="time" name="txtTime" class="form-control" value="<?php if(isset($record->time_book)) echo $record->time_book;?>">
                                           </div>                                           
                                       </div><!--end row-->
                                       <div class="row">
                                          <div class="col-lg-12">
                                              <div class="form-group">
                                                  <label class="control-label">Description</label>
                                                  <textarea class="form-control" name="tarearDesc"><?php if(isset($record->des)) echo $record->des;?></textarea>
                                              </div>
                                          </div>
                                      </div>
                                      <input type="hidden" name="txtTabID" value="<?php if(isset($record->tab_id)) echo $record->tab_id;?>">                                      
                                       <div class="row" style="margin-top:1%">
                                           <div class="col-lg-12">
                                                <button type="submit" class="btn btn-primary" name="btnSave"><i class="fa fa-save"></i> Change</button>                                                
                                                <a href="<?php echo base_url('index.php/POS_C/index');?>" class="btn btn-default"><i class="fa fa-close"></i> Close</a>
                                           </div>
                                       </div>                                        

                                        </div><!--end form -->
                                        <div class="col-lg-8"><!--table-->                                                                                                                                            
                                          <?php foreach($record1 as $value1){ ?>
                                            <div class="col-lg-3 tables">
                                              <a href="#" style="text-decoration: none">
                                                 <div class=" border panel panel-<?php if(($value1->sta)=='Waiting'){echo 'warning';} else if(($value1->sta)=='Busy'){echo 'danger';}else echo 'info';?>">
                                                    <div class="panel-heading">
                                                          <span style="float:left">Table</span>                                                                                                                                                                        
                                                          <input type="radio" name="rad" style="float:right" value="<?php echo $value1->tab_id;?>" class="chk" id="<?php echo $value1->tab_id?>">                                                                                                            
                                                          <h1 class="text-center" style="clear:both"><?php echo $value1->tab_name;?></h1>
                                                          <h6 class="text-right"><i><?php echo $value1->sta;?></i></h6>
                                                      </div>                                                                                                                                  
                                                 </div>
                                              </a>
                                             </div> 
                                          <?php }?>                                              
                                        </div><!--end table-->
                                      </div><!--end edit form and table -->                                                                                                                                                                                                 
                                       
                                       <?php form_close()?>                                
                                    </div><!--panel-body -->
                                </div>            
                            </div><!--end col-->                    
                        </div><!--end row-->                              
                                        
                    <!--error-->
                    <div class="row">
                        
                        
                    </div><!--end row2-->             

                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div><!--end col-->
        </div><!--end row-->
</div>
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