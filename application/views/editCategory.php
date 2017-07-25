
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <h1 class="page-header"><i class="fa fa-map-marker"></i> <?php echo $this->lang->line('edit')?> <?php echo $this->lang->line('category')?></h1>
            
             <?php echo form_open('index.php/Category/update/'.$record->cat_id)?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                          <div class="panel-heading"> <?php echo $this->lang->line('category')?></div>
                            <div class="panel-body">
                            <input type="hidden" name="txtcat_id"  value="<?php if(isset($record->cat_id))echo $record->cat_id;?>"> 

                            <?php if(form_error('txtcategory_name')){?>
                                  <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Warning!</strong> <?php echo form_error('txtcategory_name');?>
                                  </div>
                              <?php }?>
                              
                              <div class="col-lg-4">
                                <label> Category Name</label> 
                                <input type="text" name="txtcategory_name"  class="form-control" value="<?php if(isset($record->cat_name)) echo $record->cat_name;?>">
                              </div><!-- /. col-lg-4 -->
                              <div class="col-lg-4">
                                <label> Category Kh</label>
                                <input type="text" name="category_name_kh" class="form-control" value="<?php if(isset($record->cat_name_kh)) echo $record->cat_name_kh;?>">
                              </div><!-- /. col-lg-4 -->
                              <div class="col-lg-8">
                                <label> Desciption</label>
                                <textarea class="form-control" name="desciption">
                                  <?php if(isset($record->desc)) echo $record->desc;?>   
                                </textarea>
                              </div><!-- /. col-lg-4 -->
                              <div class="col-lg-8" style="margin-top: 10px;">
                                <button type="submit" name="btn_addposition" class="btn btn-primary">
                                  <i class="fa fa-floppy-o"></i> <?php echo $this->lang->line('save')?></button>
                               <button type="submit" name="btn_addposition" class="btn btn-default">
                                  <i class="fa fa-times"></i> <?php echo $this->lang->line('cancel')?></button>
                              </div><!-- /. col-lg-4 -->
                            </div><!-- /. panel-body -->
                        </div><!--/.panel panel-default -->
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper /-->
        