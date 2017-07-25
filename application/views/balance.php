
    <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <h1 class="page-header"><i class="fa fa-money"></i> Balance Listing</h1>
                <div class="row">
                    <div class="col-lg-6" style="margin: -10px 0px 10px;">
                        <a href="<?= base_url()?>index.php/Balance/insert_balance"><button type="button" class="btn btn-success"><span class="fa fa-plus"></span> Add Balance</button></a>
                    </div>
                </div><!--/. row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                          <div class="panel-heading"> Balance List</div>
                          <div class="panel-body">
                            <table id="mydata" class = "table table-hover">       
                                   <thead>
                                      <tr>
                                         <th>No.</th>
                                         <th>Staff </th>
                                         <th> Balance (US)</th>
                                         <th> Balance (R)</th>
                                         <th>User Create</th>
                                         <th>Date Create</th>
                                         <th>Date Update</th>
                                         <th>User Update</th>
                                         <th style="text-align: center;">Action</th>
                                      </tr>
                                   </thead>
                                   <?php $i=1 ?>
                                   <?php foreach ($balance->result() as $b) {?>
                                      <tr>
                                         <td><?php $i; echo $i++;?></td>
                                         <td><?php echo $b->staff_name;?></td>
                                         <td><?php echo $b->open_bal_usd.'$'?></td>
                                         <td><?php echo $b->open_bal_riel?></td>
                                         <td><?php echo $b->user_crea?></td>
                                         <td><?php echo $b->date_crea?></td>
                                         <td><?php echo $b->date_updt?></td>
                                         <td><?php echo $b->user_updt?></td>
                                         <td style="text-align: center;">
                                            <a href="<?php echo base_url()."index.php/Balance/update_balance/".$b->bal_id;?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>

                                            <a href="<?php echo base_url('index.php/Balance/delete_balance/'.$b->bal_id);?>" class="btn btn-danger btn-large confirModal del" data-confirm-title="Confirm Delete !" data-confirm-message="Are you sure you want to Delete this ?"><i class="fa fa-trash"></i> Delete</button> 

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
<<<<<<< HEAD
</body>
</html>
=======
    <script> 
         $(document).ready(function(){
             var a=$('.del').confirmModal();             
         });                                    
    </script>

>>>>>>> 5e4ae1a167cd92bcd96fb364f9da377e6b621b4f
        