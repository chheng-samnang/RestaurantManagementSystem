<!DOCTYPE html>
<html>
<head>
    <title>Add Possition </title>
</head>
<body>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <h1 class="page-header"><i class="fa fa-map-marker"></i> Edit Position</h1>
            
             <?php echo form_open('index.php/position/update/'.$record->pos_id)?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                          <div class="panel-heading"><span class="fa fa-pencil-square"></span> Edit Position Info</div>
                          	<div class="panel-body">

                             <?php if(form_error('position_name')){?>
                                  <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Warning!</strong> <?php echo form_error('position_name');?>
                                  </div>
                              <?php }?> 

                          		<div class="col-lg-4">
                          			<label> Position Name</label> 
                          			<input type="text" name="position_name"  class="form-control" value="<?php if(isset($record->pos_name)) echo $record->pos_name;?>">
                          		</div><!-- /. col-lg-4 -->
                          		<div class="col-lg-4">
                          			<label> Position Name Kh</label>
                          			<input type="text" name="position_name_kh" class="form-control" value="<?php if(isset($record->pos_name_kh)) echo $record->pos_name_kh;?>">
                          		</div><!-- /. col-lg-4 -->
                          		<div class="col-lg-8">
                          			<label> Desciption</label>
                          			<textarea class="form-control" name="desciption">
                                  <?php if(isset($record->des)) echo $record->des;?>   
                                </textarea>
                          		</div><!-- /. col-lg-4 -->
<<<<<<< HEAD
                              <div class="col-lg-8">
=======
                              <div class="col-lg-8" style="margin-top: 20px;">
>>>>>>> 5e4ae1a167cd92bcd96fb364f9da377e6b621b4f
                                <button type="submit" name="btn_addposition" class="btn btn-primary">
                                  <i class="fa fa-floppy-o"></i> Save Change</button>
                               <button type="submit" name="btn_addposition" class="btn btn-default">
                                  <i class="fa fa-times"></i> Cancel</button>
                              </div><!-- /. col-lg-4 -->
                          	</div><!-- /. panel-body -->
                        </div><!--/.panel panel-default -->
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
           
        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
</body>
</html>
        