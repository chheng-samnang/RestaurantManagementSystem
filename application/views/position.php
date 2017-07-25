    <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <h1 class="page-header"><i class="fa fa-map-marker"></i> Position</h1>
                <div class="row">
                    <div class="col-lg-6" style="margin: -10px 0px 10px;">
                        <a href="<?= base_url()?>index.php/Position/add_position">
                            <button type="button" class="btn btn-success"><span class="fa fa-plus"></span>
                            Add Position
                            </button>
                        </a>
                    </div>
                </div><!--/. row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">Position Info</div>
                          <div class="panel-body">
                            <table id="mydata" class = "table table-hover">       
                                   <thead>
                                      <tr>
                                         <th>No</th>
                                         <th>Position</th>
                                         <th>Position Kh</th>
                                         <th>User Create</th>
                                         <th>Date Create</th>
                                         <th>Date Update</th>
                                         <th>User Update</th>
                                         <th style="text-align: center;">Action</th>
                                      </tr>
                                   </thead>
                                   <?php
                                    $i = 1;
                                    foreach ($positionlist-> result() as $position) 
                                    {           
                                   ?>
                                      <tr>
                                         <td><?php $i; echo $i++;?></td>
                                         <td><?php echo $position->pos_name;?></td>
                                         <td><?php echo $position->pos_name_kh;?></td>
                                         <td><?php echo $position->user_crea;?></td>
                                         <td><?php echo $position->date_crea;?></td>
                                         <td><?php echo $position->date_updt;?></td>
                                         <td><?php echo $position->user_updt;?></td>
                                         <td style="text-align: center;">
                                            <a  href="<?php echo base_url()?>index.php/Position/update_validation/<?php echo $position->pos_id?>" class="btn btn-primary"><span class="fa fa-pencil"></span> Edit</a>

                                           
                                            <a href="<?php echo base_url('index.php/Position/delete/'.$position->pos_id);?>" class="btn btn-danger btn-large confirModal del" data-confirm-title="Confirm Delete !" data-confirm-message="Are you sure you want to Delete this ?"><i class="fa fa-trash"></i> Delete</button>

                                        </td>
                                      </tr>
                                    <?php
                                     }
                                    ?>
                                </table><!-- table hover -->
                            </div><!-- /. panel-body -->
                        </div><!--/.panel panel-default -->
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
    <script>
        $(document).ready(function(){
            $('#mydata').DataTable();
        });
    </script>

</body>
</html>

     <script> 
         $(document).ready(function(){
             var a=$('.del').confirmModal();             
         });                                    
    </script>
        