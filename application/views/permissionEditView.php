<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Permission </title>

</head>
<body>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Permission</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                     <?php 
                        foreach ($get_permission as $row) {
                            $user_id=$row['user'];
                            $form=$row['form'];
                        }

                        if(isset($msg))
                        {                                        
                        ?>
                            <div class="form-group">
                                <label style="color:red;"><?php echo $msg;?></label>
                            </div>
                        <?php
                            }
                       ?>
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="panel panel-default">

                        <div class="panel-heading">Permission Edit</div>
                        <div class="panel-body">
                          
                               <form action="<?php echo base_url()?>/index.php/permissionController/permissionEdit/<?php echo $user_id; ?>" method="post" autocomplete="off">
                                       <div class="row">                                            
                                                    <input type="hidden" name="txtuser_id" class="form-control" value="<?php echo $user_id ?>" required>
                                              <div class="col-xs-12 col-sm-6 col-md-4">
                                                    <label>Form</label>
                                                    <input type="text" name="txtform" class="form-control" value="<?php echo $form ?>" required>
                                             </div>
                                        </div>
                                        <div class="row">
                                             <div class="col-xs-12 col-sm-6 col-md-1">
                                                   <label>Add</label>
        										   <input type="checkbox" name="cbadd" class="checkbox" value="1">
                                             </div>
                                             <div class="col-xs-12 col-sm-6 col-md-1">
                                                    <label>Delete</label>
                                                    <input type="checkbox" name="cbdelete" class="checkbox" value="1">
                                             </div>
                                             <div class="col-xs-12 col-sm-6 col-md-1">
                                                    <label>Update</label>
                                                    <input type="checkbox" name="cbupdate" class="checkbox" value="1">
                                             </div>
                                             <div class="col-xs-12 col-sm-6 col-md-2" style="margin-top:25px">
                                                  <button name="btnSave" class="btn btn-success glyphicon glyphicon-plus-sign">Save</button>
                                            </div> 
                                            <div class="col-xs-12 col-sm-6 col-md-2" style="margin-top:25px">
                                            </div>   
                                       </div>               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
</body>
</html>