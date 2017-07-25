<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row" style="margin-bottom:10px;">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-line-chart"></i> <?php echo $this->lang->line('menu2')?></h1>
                    </div>
                    <div class="col-lg-6">
                        <a href="<?php echo base_url()?>index.php/exrateController/addRate" class="btn btn-success"><i class="fa fa-plus"></i> <?php echo $this->lang->line('add')?> </a>
                    </div>
                </div>
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title"><?php echo $this->lang->line('menu2')?></h3>
                          </div>
                          <div class="panel-body">
                            <table class="table table-hover" id="myData">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Rate</th>
                                        <th>User Create</th>
                                        <th>Date Create</th>
                                        <th>User Update</th>
                                        <th>Date Update</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i=0;
                                    foreach ($rate->result() as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $i+1?></td>
                                        <td><?php echo $row->key_data?></td>
                                        <td><?php echo $row->user_crea?></td>
                                        <td><?php echo $row->date_crea?></td>
                                        <td><?php echo $row->user_updt?></td>
                                        <td><?php echo $row->date_updt?></td>
                                        <td>
                                            <a href="<?php echo base_url('index.php/exrateController/removeRate/'.$row->key_code);?>" class="btn btn-danger btn-large confirModal del" data-confirm-title="Confirm Delete !" data-confirm-message="Are you sure you want to Delete this ?"><i class="fa fa-trash"></i> <?php echo $this->lang->line('delete')?></a>
                                        </td>
                                    </tr>
                                    <?php 
                                    $i = $i+1;
                                    }?>
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </div><!-- col-lg-12 -->
                </div> <!-- row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->  
    <script>
        $(document).ready(function(){
            $('#myData').DataTable();
        });
    </script>  

    <script> 
         $(document).ready(function(){
             var a=$('.del').confirmModal();             
         });                                    
    </script>
