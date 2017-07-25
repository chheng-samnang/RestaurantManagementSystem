            
<?php $datestring = '%d/%m/%Y';?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-users"></i> Customer</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row"><!--add and search-->
                    <div class="col-lg-2">
                        <a href="<?php echo base_url('index.php/customer_C/add');?>" class="btn btn-success" style="margin-bottom:5px;"><i class="fa fa-plus"></i> Add Customer</a>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-lg-12"><!--table-->                        
                        <div class="panel panel-default"><!--panel-->
                            <div class="panel-heading">Customer Information</div>
                            <div class="panel-body table-responsive">
                                <table class="table table-hover" id="mydata">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Customer name</th>
                                        <th>Description</th>
                                        <th>Discount</th>
                                        <th>Count</th>
                                        <th>User Create</th>
                                        <th>Date Create</th>
                                        <th>User Update</th>                                    
                                        <th>Date Update</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;?>                                    
                                    <?php foreach($customer as $value) {?>                                                                           
                                        <tr>
                                            <td><?=$i;$i++;?></td>
                                            <td><?php echo $value->cus_name?></td>
                                            <td><?php echo $value->desc?></td>
                                            <td><?php echo $value->discount."%"?></td>
                                            <td><?php echo $value->count?></td>
                                            <td><?php echo $value->user_crea?></td>
                                            <td><?php echo date("d/m/Y",strtotime($value->date_crea));?></td>
                                            <td><?php echo $value->user_updt==0? NULL : $value->user_updt; ?></td>                                           
                                            <td><?php echo $value->date_updt=="0000-00-00"?"":date("d/m/Y",strtotime($value->date_updt))?></td>
                                            <td>                                           
                                                <a href="<?php echo base_url('index.php/customer_C/edit_validation/'.$value->cus_id);?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>                                  
                                                <a href="<?php echo base_url('index.php/customer_C/delete/'.$value->cus_id);?>" class="btn btn-danger btn-large confirModal del" data-confirm-title="Confirm Delete !" data-confirm-message="Are you sure you want to Delete this ?"><i class="fa fa-trash"></i> Delete</a> 
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



    