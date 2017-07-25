        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-cutlery"></i> <?php echo $this->lang->line('edit')?> <?php echo $this->lang->line('menu')?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="col-lg-12"><!--table-->                
                    <div class="panel panel-default"><!--panel-->
                        <div class="panel-heading"><?php echo $this->lang->line('menu')?></div>
                        <div class="panel-body">
                            <?php echo form_open_multipart('index.php/menu_C/save_change/'.$record->m_id)?>
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
                                            <input type="text" name="txtMenuName" id="txtMenuName" class="form-control" placeholder="Menu name" value="<?php echo $record->m_name?>">
                                        </div>    
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Menu khmer</label>
                                            <input type="text" name="txtMenuNameKh" id="txtMenuNameKh" class="form-control" placeholder="Menu name khmer" value="<?php echo $record->m_name_kh;?>">
                                        </div>    
                                    </div>                                    
                                    <div class="form-group">                                        
                                        <div class="col-lg-4">
                                        <label class="control-label">Category</label>
                                            <select class="form-control" name="ddlCatId">
                                                <?php foreach($menu as $value):?>                                                    
                                                    <option value="<?php echo $value->cat_id;?>" <?php if($value->cat_id==$record->cat_id) echo "selected"?>><?php echo $value->cat_name;?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>                                        
                                    </div>   
                                    
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label class="control-label">Price</label>
                                       <div class="input-group">
                                            <input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="Price" value="<?php echo $record->price;?>">
                                            <span class="input-group-addon" id="txtPrice">$</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Measure</label>
                                            <input type="text" name="txtMeasure" id="txtMeasure" class="form-control" placeholder="Measure" value="<?php echo $record->measure;?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="control-label">Image</label>
                                            <input type="file" name="file" id="file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <img src="<?= base_url('images/'.$record->img);?>" class="img-thumbnail img-responsive">
                                    </div>                                     
                                </div>                                 
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Description</label>
                                            <textarea name="txtDesc" class="form-control">
                                            <?php echo $record->desc?>                                                
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Description Khmer</label>
                                            <textarea name="txtDescKh" class="form-control">
                                            <?php echo $record->desc_kh;?>                                                
                                            </textarea>
                                        </div>
                                    </div>
                                </div><!--end row1-->
                                <br>
                                <div class="row">
                                    <div class="col-lg-12">
                                         <div class="form-group">                                            
                                            <button type="submit" class="btn btn-primary" name="btnSaveChange"><i class="fa fa-save"></i> <?php echo $this->lang->line('save')?></button>
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
    

    