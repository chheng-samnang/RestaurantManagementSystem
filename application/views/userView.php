
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-user"></i> <?php echo $this->lang->line('user')?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row"><!--add and search-->
                    <div class="col-lg-2">
                         <a href="<?php echo base_url()?>/index.php/userController/user_create" class="btn btn-success" style="margin-bottom:9px"><i class="fa fa-plus"></i> <?php echo $this->lang->line('add')?></a>
                    </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="panel panel-default">
                       <div class="panel-heading"><?php echo $this->lang->line('user')?></div>
                          <div class="panel-body">
                            
                             <table class=" table table-hover" id="mydata"> 
                                <thead>
                                    <tr>
                                            <td >User Code</td>
                                            <td>User Name</td>
                                            <td>Status</td>
                                            <td>User Create</td>
                                            <td>Date Create</td>
                                            
                                            <td>Action</td>
                                   </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  if(!empty($get_user)){
                                  foreach($get_user as $row)
                                  {
                                  ?>
                                  <tr>
                                            <td><?php echo $row->userCode; ?></td>
                                            <td><?php echo $row->userName; ?></td>
                                            <?php ;
                                            if($row->status==1){
                                            echo"<td>Enable</td>";
                                            }else{echo"<td>Disable</td>";}
                                            ?>
                                            <td><?php echo $row->user_crea; ?></td>
                                            <td><?php echo $row->date_crea; ?></td>
                                            
                                            <td>
                                            <a class="btn btn-primary" href="<?php echo base_url()?>index.php/userController/get_user_edit/<?php echo $row->user_id ?>"><i class="fa fa-pencil"></i> <?php echo $this->lang->line('edit')?></a>
                                            <a class="btn btn-warning" href="<?php echo base_url()?>index.php/userController/change_password/<?php echo $row->user_id ?>" class="glyphicon glyphicon-refresh"><i class="fa fa-lock"></i> <?php echo $this->lang->line('change_password')?></a>
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
                  </div>
                	
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        <script>
        $(document).ready(function(){
        $('#mydata').DataTable();
        });
        </script>
    <!--/#jvavscript-->
    </div>
    <!-- /#wrapper -->
  </div>
 