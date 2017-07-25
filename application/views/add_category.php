<!DOCTYPE html>
<html>
<head>
    <title>Add Possition </title>
</head>
<body>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <h1 class="page-header"><i class="glyphicon glyphicon-duplicate"></i> <?php echo $this->lang->line('add')?> <?php echo $this->lang->line('category')?></h1>
            <form action="insert" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                          <div class="panel-heading"> <?php echo $this->lang->line('category')?></div>
                          	<div class="panel-body">
                            
                              <?php if(form_error('category_name')){?>
                                  <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Warning!</strong> <?php echo form_error('category_name');?>
                                  </div>
                              <?php }?>

                          		<div class="col-lg-4">
                          			<label> Category Name</label>
                          			<input type="text" name="category_name" class="form-control">
                          		</div><!-- /. col-lg-4 -->
                          		<div class="col-lg-4">
                          			<label> Category Name Kh</label>
                          			<input type="text" name="category_kh" class="form-control">
                          		</div><!-- /. col-lg-4 -->
                          		<div class="col-lg-8">
                          			<label> Desciption</label>
                          			<textarea class="form-control" name="desciption"></textarea>
                          		</div><!-- /. col-lg-4 -->
                              <div class="col-lg-8" style="margin-top: 10px;">
                                <button type="submit" name="btn_addposition" class="btn btn-primary">
                                    <i class="fa fa-floppy-o"></i>  <?php echo $this->lang->line('save')?></button>
                                 <button type="submit" name="btn_addposition" class="btn btn-default">
                                    <i class="fa fa-times"></i>  <?php echo $this->lang->line('cancel')?></button>
                              </div><!-- /. col-lg-4 -->
                          	</div><!-- /. panel-body -->
                        </div><!--/.panel panel-default -->
                    </div><!-- /.col-lg-12 -->
                  <div class="col-lg-6" style="margin: -10px 0px 10px;">
                     
                  </div>
              </div><!--/. row -->
              

            </form><!-- form control -->
        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
</body>
</html>
        