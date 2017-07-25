
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>permission</title>
<link href="">
</head>

<body>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                      <div class="col-lg-12">
                           <h1 class="page-header"><i class="fa fa-user"></i> Permission</h1>
                      </div>
                      <div class="col-lg-6">
                           <a href="<?php echo base_url()?>index.php/permissionController/permissionCreate" class="btn btn-success"><i class="fa fa-plus"></i>Add Permission</a>
                      </div>
                </div>
<<<<<<< HEAD
                <div class="row" style="margin-top:10px;">
                	<div class="panel panel-default">
                       <div class="panel-heading">All User Permission</div>
=======
                <div class="row">
                  <div class="col-lg-12">
                    <?php if(isset($msg)){ ?>
                              <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Warning!</strong> <?php echo $msg?>
                                  </div>
                    <?php }?> 
                  </div>
                </div>
                <div class="row" style="margin-top:10px;">
                  <div class="col-lg-12">
                    <div class="panel panel-default">
                       <div class="panel-heading">User Permission Info</div>
>>>>>>> 5e4ae1a167cd92bcd96fb364f9da377e6b621b4f
                          <div class="panel-body">
                             <table class=" table table-hover" id="mydata" >	
                                <thead>
                                    <tr>
                                        <td >User ID</td>
                                        <td>Form</td>
                                        <td>Add</td>
                                        <td>Edit</td>
                                        <td>Delete</td>
                                        <td>User Create</td>
                                        <td>Date Create</td>
                                        <td>User Update</td>
                                        <td>Date Update</td>
                                        <td>Action</td>
                                   </tr>
                                </thead>
                                <tbody>
            										  <?php
                                  if(!empty($get_permission)){
                                  foreach($get_permission as $row)
                                  {
                                  ?>
                							    <tr>
                                        <td><?php echo $row->user; ?></td>
                                        <td><?php echo $row->form; ?></td>
                                        <?php 
                                          if($row->add==1){
                                             echo"<td>Yes</td>";
                                          }else
                                          {  echo"<td>No</td>";}
                                          if($row->edit==1){
                                             echo"<td>Yes</td>";
                                          }else
                                          {  echo"<td>No</td>";}
                                          if($row->delete==1){
                                             echo"<td>Yes</td>";
                                          }else
                                          {  echo"<td>No</td>";}
                                        ?>
                                        <td><?php echo $row->user_crea; ?></td>
                                        <td><?php echo $row->date_crea; ?></td>
                                        <td><?php echo $row->user_updt; ?></td>
                                        <td><?php echo $row->date_updt; ?></td>
                                        <td>
                                        <a href="<?php echo base_url()?>index.php/permissionController/getPermission/<?php echo $row->perm_id?>"class=" glyphicon glyphicon-edit">Edit</a>
                                         <a  href="<?php echo base_url()?>index.php/permissionController/permissionDelete/<?php echo $row->perm_id ?>" onclick="return confirmDel()"><i class="fa fa-trash-o"></i> Delete</a>
                                        </td>
                                   </tr>
                                  <?php 
                                     }
                                   } 
                                  ?>
                            </tbody>
                       </table>
                  </div>
           </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script>
        $(document).ready(function(){
        $('#mydata').DataTable();
        });
        </script>
    <script>
      function confirmDel()
      {
        var x = confirm("Are you sure you want to delete this user permission?");
        if(x==true)
        {
          return true;
        }else
        {
          return false;
        }
      }
    </script>
  </div>
 </div>
</body>
</html>