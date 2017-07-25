            
<?php $datestring = '%d/%m/%Y';?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-refresh"></i> Close shift</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>                
                <div class="row">
                    <div class="col-lg-12"><!--table-->                        
                        <div class="panel panel-default"><!--panel-->
                            <div class="panel-heading">Close shift Information</div>
                            <div class="panel-body table-responsive">
                                <form class="form-horizontal" action="<?php echo site_url('closeShift_report_C/search')?>" method="POST">
                                    <div class="row"><!--date time picker-->
                                        <div class="col-lg-1"></div>                                                                                                                                              
                                            <div class="form-group">
                                                <label class="col-lg-1 control-label">From:</label>
                                                <div class="col-lg-2">
                                                    <div class='input-group dat datetimepicker1'>
                                                        <input type='text' class="form-control" id="txtFrom" name="txtFrom"/>
                                                        <span class="input-group-addon" id="from">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>

                                                <label class="col-lg-1 control-label">To:</label>
                                                <div class="col-lg-2">
                                                    <div class='input-group dat datetimepicker1'>
                                                        <input type='text' class="form-control" id="to" disabled="disabled" name="txtTo" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1"><button type="submit" class="btn btn-success">Search</button></div>                                           
                                            </div>                                                                                                                              
                                        
                                        <div class="col-lg-3"></div>
                                    </div>    
                                </form>
                                
                                <table class="table table-hover" id="mydata">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Staff name</th>
                                        <th>Open Balance Dolla</th>
                                        <th>Open Balance Riel</th>
                                        <th>Exchange Dolla</th>
                                        <th>Exchange Riel</th>
                                        <th>Ending Balance Dolla</th>
                                        <th>Ending Balance Riel</th>
                                        <th>Cash Dolla</th>
                                        <th>Cash Riel</th>                                                                                                                                                        
                                        <th>Closeshift Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;?>
                                    <?php foreach($record as $value){ ?>
                                    <tr>
                                        <td><?=$i;$i++;?></td>
                                        <td><?php echo $value->staff_name;?></td>
                                        <td><?php if($value->open_bal_usd!="")echo $value->open_bal_usd."$";else echo "00$";?></td>
                                        <td><?php if($value->open_bal_riel!="")echo $value->open_bal_riel."R";else echo "000R";?></td>                                                                                
                                        <td><?php if($value->exchange_usd!="")echo $value->exchange_usd."$";else echo "00$";?></td>
                                        <td><?php if($value->exchange_riel!="")echo $value->exchange_riel."R";else echo "000R";?></td>                                        
                                        <td><?php if($value->ending_bal_usd!="")echo $value->ending_bal_usd."$";else echo "00$";?></td>
                                        <td><?php if($value->ending_bal_riel!="")echo $value->ending_bal_riel."R";else echo "000R";?></td>
                                        <td><?php if($value->cash_usd!="")echo $value->cash_usd."$";else echo "00$";?></td>
                                        <td><?php if($value->cash_riel!="")echo $value->cash_riel."R";else echo "000R";?></td>                                        
                                        <td><?php echo date("d/m/Y h:i:sa",strtotime($value->clsft_date));?></td>
                                        <td>
                                            <a href="<?php echo base_url('index.php/closeShift_report_C/delete/'.$value->clsft_id);?>" class="btn btn-danger btn-large confirModal del" data-confirm-title="Confirm Delete !" data-confirm-message="Are you sure you want to Delete this ?"><i class="fa fa-trash"></i> Delete</a>   
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
     <script>
        $(function () {
            $('.datetimepicker1').datetimepicker();
        });
    </script>
    <script>      
       $(function(){
            $("#from").click(function(){
                $("#to").removeAttr("disabled");
            });
        });   
    </script>



    