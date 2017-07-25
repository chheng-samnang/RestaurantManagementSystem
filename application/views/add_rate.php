<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

 <!-- Page Content -->
    <?php echo form_open('index.php/exrateController/addRate')?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row" style="margin-bottom:20px;">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-line-chart"></i> <?php echo $this->lang->line('add')?> <?php echo $this->lang->line('menu2')?></h1>                        
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(null!=validation_errors()){?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong>Warning!</strong> <?php echo validation_errors();?>
                            </div>
                        <?php }?>   
                    </div>                  
                </div>

                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo $this->lang->line('menu2')?></h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="group-control">
                                            <label>Exchange Rate</label>
                                            <input type="text" name="txtExRate" class="form-control" placeholder="Enter Exchange Rate here...">
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px;">
                                            <div class="col-lg-3">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $this->lang->line('save')?></button>
                                                <a href="<?php echo base_url('index.php/exrateController')?>" class="btn btn-default"><i class="fa fa-times"></i> <?php echo $this->lang->line('cancel')?></a>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div><!-- col-lg-12 -->
                </div> <!-- row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->    
    <?php echo form_close()?>
    <script> 
         $(document).ready(function(){
             var a=$('.del').confirmModal();             
         });                                    
    </script>
