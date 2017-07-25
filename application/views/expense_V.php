</nav>
	<div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                
                <div class="container-fluid">
                    <div class="row" style="margin-top:20px;">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h4><i class="fa fa-edit"></i> Order Menu Management</h4></div>
                                    <div class="panel-body">                                       
                                        <div class="row">
                                            <div class="col-lg-12">                                                
                                                <a href="<?php echo site_url('expense_C/add_show')?>" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>                                                
                                                <a href="<?php echo site_url('POS_C');?>" class="btn btn-default pull-right" style="margin-left:1%"><i class="fa fa-arrow-left"></i> Back</a>
                                            </div>                                                                        
                                        </div>
                                        <div class="row" style="margin-top:1%">
                                            <div class="col-lg-12"><!--table-->                        
                                                <div class="panel panel-default"><!--panel-->
                                                    <div class="panel-heading">Extra Expense Information</div>
                                                    <div class="panel-body table-responsive">
                                                        <table class="table table-hover" id="mydata">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Code</th>
                                                                <th>Name</th>
                                                                <th>Quantity</th>
                                                                <th>Dolla</th>
                                                                <th>Reil</th>                                                                
                                                                <th>User Create</th>
                                                                <th>Date Create</th>
                                                                <th>User Update</th>                                    
                                                                <th>Date Update</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $i=1;
                                                                foreach ($record as $value) {                                                                    
                                                            ?>        
                                                                    <tr>
                                                                        <td><?php echo $i;$i++;?></td>
                                                                        <td><?php echo $value->key_code;?></td>
                                                                        <td><?php echo $value->key_data;?></td>
                                                                        <td><?php echo $value->key_data1;?></td>
                                                                        <td><?php if($value->key_data2!=""){echo $value->key_data2."$";}else{ echo "0$";}?></td>
                                                                        <td><?php if($value->key_desc!=""){echo $value->key_desc."R";}else{ echo "0R";}?></td>
                                                                        <td><?php echo $value->user_crea?></td>
                                                                        <td><?php echo date("d/m/Y",strtotime($value->date_crea));?></td>
                                                                        <td><?php echo $value->user_updt==0? NULL : $value->user_updt; ?></td>                                           
                                                                        <td><?php echo $value->date_updt=="0000-00-00"?"":date("d/m/Y",strtotime($value->date_updt))?></td>
                                                                        <td>
                                                                            <a href="<?php echo base_url('index.php/expense_C/edit_show/'.$value->key_id);?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>                                  
                                                                            <a href="<?php echo base_url('index.php/expense_C/delete/'.$value->key_id);?>" class="btn btn-danger btn-large confirModal del" data-confirm-title="Confirm Delete !" data-confirm-message="Are you sure you want to Delete this ?"><i class="fa fa-trash"></i> Delete</a> 
                                                                        </td>
                                                                    </tr>
                                                            <?php                                                            
                                                                }
                                                            ?>
                                                        </tbody> 
                                                        </table>
                                                    </div>
                                                </div><!--end panel-->    
                                            </div><!--end table -->
                                        </div>
                                                                       
                                    </div><!--panel-body -->
                                </div>            
                            </div><!--end col-->                    
                        </div><!--end row-->                              
                                        
                    <!--error-->
                    <div class="row">
                        
                        
                    </div><!--end row2-->             

                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div><!--end col-->
        </div><!--end row-->
</div>
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