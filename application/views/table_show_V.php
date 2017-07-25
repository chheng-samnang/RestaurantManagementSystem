

            
<?php $datestring = '%d/%m/%Y';?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-th"></i> Table</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row"><!--add and search-->
                    <div class="col-lg-2">
                        <a href="<?php echo base_url('index.php/table_C/add');?>" class="btn btn-success" style="margin-bottom:5px;"><i class="fa fa-plus"></i> Add Table</a>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-lg-12"><!--table-->                        
                        <div class="panel panel-default"><!--panel-->
                            <div class="panel-heading">Table Information</div>
                            <div class="panel-body table-responsive">
                                <table class="table table-hover" id="mydata">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Table name</th>
                                        <th>Seats</th>                                    
                                        <th>Price</th>                                        
                                        <th>Status</th>
                                        <th>User Create</th>
                                        <th>Date Create</th>
                                        <th>User Update</th>
                                        <th>Date Create</th>                                                                                                                       
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;?>                                    
                                    <?php foreach($table as $value) {?>                                    
                                        
                                        <tr>
                                            <td><?= $i;$i++;?></td>
                                            <td><?= $value->tab_name?></td>
                                            <td><?= $value->seats?></td>
                                            <td><?= $value->price. "$"?></td>                                            
                                            <td><?php 
                                                if($value->sta=='Free'){ echo "<span style='color:blue' class='fa fa-check'> ".$value->sta."</span>";}
                                                elseif($value->sta=='Waiting'){ echo "<span style='color:#e619da' class='fa fa-exclamation'> ".$value->sta."</span>";}
                                                else echo "<span style='color:red' class='fa fa-close'> ".$value->sta."</span>";
                                                ?>                                                
                                            </td>
                                            <td><?= $value->user_crea?></td>
                                            <td><?= date("d/m/Y",strtotime($value->date_crea));?></td>
                                            <td><?= $value->user_updt==0? NULL : $value->user_updt?></td>                                           
                                            <td><?= $value->date_updt=="0000-00-00"?"":date("d/m/Y",strtotime($value->date_updt))?></td>                                                                                                                                                                                                                                                                                                                                                                                                                                                 
                                            <td>
                                                <a href="<?php echo base_url('index.php/table_C/get_to_edit/'.$value->tab_id);?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                                <a href="<?php echo base_url('index.php/table_C/delete/'.$value->tab_id);?>" class="btn btn-danger btn-large confirModal del" data-confirm-title="Confirm Delete !" data-confirm-message="Are you sure you want to Delete this ?"><i class="fa fa-trash"></i> Delete</button>                                                                                        
                                            </td>
                                        </tr>                                                                    
                                    <?php }?>
                                </tbody> 
                                </table>
                            </div>
                        </div><!--end panel-->    
                    </div><!--end table -->
                </div>
                

                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!--Java script-->
    <script>
        $(document).ready(function(){
            $('#mydata').DataTable();
        });
    </script>
    <script> 
         $(document).ready(function(){
             var a=$('.del').confirmModal();             
         });                                    
    </script>



    