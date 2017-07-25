<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Permission</title>

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

                        <div class="panel-heading">Permission Create</div>
                        <div class="panel-body">
                               <form action="<?php echo base_url()?>/index.php/permissionController/permissionCreated" method="post" autocomplete="off">
                                       <div class="row">
                                             <div class="col-xs-12 col-sm-6 col-md-6">
                                                   <label>User ID</label>
                                                    <select name="txtuser" class="form-control">
                                                        <div  style="overflow:scroll; width:10%;height:70px">
                                                            <?php
                                                            foreach($get_user as $row)
                                                            {
                                                            ?>
                                                                <option value="<?php echo $row->user_id;?>">
                                                                   <?php echo $row->userName; ?>
                                                                </option> 
                                                            <?php 
                                                            } 
                                                            ?>
                                                        </div>
                                                    </select>
                                             </div>

                                      </div>
                                      <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <label>Form</label>
                                                    <input type="text" name="txtform" class="form-control" placeholder="form" required>
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
                                        </div>
                                        <div class="row">
                                             <div class="col-xs-12 col-sm-6 col-md-3" style="margin-top:25px">
                                                  <button name="btnSave" class="btn btn-success glyphicon glyphicon-floppy-saved">Save</button>
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