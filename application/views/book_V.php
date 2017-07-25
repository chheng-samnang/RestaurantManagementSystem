
</nav>
    <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                
                <div class="container-fluid">
                    <div class="row" style="margin-top:20px;">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h4><i class="fa fa-book"></i> Book Management</h4></div>
                                    <div class="panel-body">                                       
                                        <div class="row">
                                            <div class="col-lg-12">                                                                                              
                                                <a href="<?php echo site_url('bookController/add/'.$table_id)?>" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>                                               
                                                <a href="<?php echo site_url('POS_C');?>" class="btn btn-default pull-right" style="margin-left:1%"><i class="fa fa-arrow-left"></i> Back</a>
                                            </div>                                                                        
                                        </div>
                                        <div class="row" style="margin-top:1%">
                                            <div class="col-lg-12"><!--table-->                        
                                                <div class="panel panel-default"><!--panel-->
                                                    <div class="panel-heading">Book Information</div>
                                                    <div class="panel-body table-responsive">
                                                        <table class="table table-hover" id="mydata">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>                                                               
                                                                <th>Customer Name</th>
                                                                <th>Table name</th>
                                                                <th>Phone</th>
                                                                <th>People Amount</th>
                                                                <th>Time</th>                                                               
                                                                <th>Description</th>                                                                
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
                                                                        <td><?php echo $value->customer_name;?></td>
                                                                        <td><?php echo $value->tab_name;?></td>
                                                                        <td><?php echo $value->phone;?></td>
                                                                        <td><?php echo $value->people;?></td>                                                                        
                                                                        <td><?php echo date("h:i:s A",strtotime($value->time_book));?></td>                                                                        
                                                                        <td><?php echo $value->des;?></td>
                                                                        <td><?php echo $value->user_crea==""? NULL : $value->user_crea;?></td>                                           
                                                                        <td><?php echo date("d/m/Y",strtotime($value->date_crea));?></td>
                                                                        <td><?php echo $value->user_updt==""? NULL : $value->user_updt; ?></td>                                           
                                                                        <td><?php echo $value->date_updt=="0000-00-00"?"":date("d/m/Y",strtotime($value->date_updt))?></td>
                                                                        <td>
                                                                            <a href="<?php echo base_url('index.php/bookController/edit/'.$value->book_id);?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>                                  
                                                                            <a href="<?php echo base_url('index.php/bookController/delete/'.$value->book_id);?>" class="btn btn-danger btn-large confirModal del" data-confirm-title="Confirm Delete !" data-confirm-message="Are you sure you want to Delete this ?"><i class="fa fa-trash"></i> Delete</a> 
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
