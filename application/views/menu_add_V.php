        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-cutlery"></i> <?php echo $this->lang->line('add');?> <?php  echo $this->lang->line('menu')?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="col-lg-12"><!--table-->                
                    <div class="panel panel-default"><!--panel-->
                        <div class="panel-heading"><?php  echo $this->lang->line('menu')?></div>
                        <div class="panel-body">
                            <?php echo form_open_multipart('index.php/menu_C/validation_add')?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!--error-->
                                        <?php if(validation_errors('txtMenuName')){?>
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                              <strong>Warning!</strong> 
                                              <?php 
                                                echo validation_errors();
                                                echo br();                                               
                                                ?>
                                            </div>
                                        <?php }?>
                                        <!--end error-->                                       

                                    </div>
                                </div>                                
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Menu name</label>
                                            <input type="text" name="txtMenuName" id="txtMenuName" class="form-control" placeholder="Menu name" value="<?php echo set_value('txtMenuName');?>">
                                        </div>    
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Menu khmer</label>
                                            <input type="text" name="txtMenuNameKh" id="txtMenuNameKh" class="form-control" placeholder="Menu khmer" value="<?php echo set_value('txtMenuNameKh');?>">
                                        </div>    
                                    </div>                                    
                                    <div class="form-group">                                        
                                        <div class="col-lg-4">
                                            <label class="control-label">Category</label>
                                            <select class="form-control" name="ddlCatId">
                                                <option value="0">Chose One</option>                                                
                                                <?php foreach($menu as $value):?>                                                                                                    
                                                    <option value="<?php echo $value->cat_id;?>"><?php echo $value->cat_name;?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>                                        
                                    </div>   
                                    
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label class="control-label">Price</label>
                                       <div class="input-group">
                                            <input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="Price" value="<?php echo set_value('txtPrice',0);?>">
                                            <span class="input-group-addon" id="txtPrice">$</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Measure</label>
                                            <input type="text" name="txtMeasure" id="txtMeasure" class="form-control" placeholder="Measure" value="<?php echo set_value('txtMeasure');?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Image</label>
                                            <input type="file" name="file" id="file" class="form-control">
                                        </div>
                                    </div>                                     
                                </div>                                 
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Description</label>
                                            <textarea name="txtDesc" class="form-control">
                                            <?php echo set_value('txtDesc')?>
                                                
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Description Khmer</label>
                                            <textarea name="txtDescKh" class="form-control">
                                            <?php echo set_value('txtDescKh');?>
                                                
                                            </textarea>
                                        </div>
                                    </div>
                                </div><!--end row1-->
                                <br>
                                <div class="row">
                                    <div class="col-lg-12">
                                         <div class="form-group">
                                            <button type="submit" class="btn btn-primary" name="btnSave"><i class="fa fa-save"></i> <?php echo $this->lang->line('save')?></button>
                                            <button type="submit" class="btn btn-primary" name="btnSaveNew"><i class="fa fa-star"></i> <?php echo $this->lang->line('save_new')?></button>
                                            <a href="<?php echo base_url('index.php/menu_C');?>" class="btn btn-default"><i class="fa fa-close"></i> <?php echo $this->lang->line('cancel')?></a>
                                        </div>  
                                    </div>
                                </div><!--end row2-->                                                                                                                                 
                            </form>
                        </div>
                    </div><!--end panel-->    
                </div><!--end table -->

                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    

    