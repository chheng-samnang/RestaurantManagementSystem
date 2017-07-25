</nav>
	<div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                
                <div class="container-fluid">
                    <div class="row" style="margin-top:20px;">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h4><i class="fa fa-edit"></i> Close shift Management</h4></div>
                                    <div class="panel-body">                                                                               
                                        <div class="row" style="margin-top:1%">
                                            <div class="col-lg-12"><!--table-->                        
                                                <div class="panel panel-default"><!--panel-->
                                                    <div class="panel-heading">Close shift Information</div>
                                                    <div class="panel-body table-responsive">
                                                        <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Items</th>
                                                                <th>Dolla</th>
                                                                <th>Reil</th>                                     
                                                                                                                                                                                                                                                                                                                                                                                    
                                                            </tr>
                                                        </thead>
                                                        <tbody>                                                                                                                                                                                                                                
                                                            <tr>                                                                
                                                                <td>Income</td>
                                                                <td><?php if(($income->usd)!="")echo $income->usd."$";else echo "00$";?></td>
                                                                <td><?php if(($income->riel)!="") echo $income->riel."R";else echo "000R";?></td>                                                                
                                                            </tr>
                                                             <tr>                                                                
                                                                <td>Cash Income</td>
                                                                <td><?php if(($income->cash_usd)!="")echo $income->cash_usd."$";else echo "00$";?></td>
                                                                <td><?php if(($income->cash_riel)!="") echo $income->cash_riel."R";else echo "000R";?></td>                                                               
                                                            </tr>

                                                            <tr>                                                                
                                                                <td>Balance</td>
                                                                <td><?php if(($balance->bal_usd)!="")echo $balance->bal_usd."$";else echo "00$";?></td>
                                                                <td><?php if(($balance->bal_riel)!="")echo $balance->bal_riel."R";else echo "000R";?></td>                                                                
                                                            </tr>
                                                            <tr>                                                                
                                                                <td>Extra Expense</td>
                                                                <td><?php if(($expense->expense_usd)!="")echo $expense->expense_usd."$";else echo "00$"?></td>
                                                                <td><?php if(($expense->expense_riel)!="")echo $expense->expense_riel."R";else echo "000R";?></td>                                                                
                                                            </tr>
                                                            <tr class="bg-info">                                                                
                                                                <th>Total</th>
                                                                <th><?php echo ($income->cash_usd-$balance->bal_usd)-$expense->expense_usd."$";?></th>
                                                                <th><?php echo ($income->cash_riel-$balance->bal_riel)-$expense->expense_riel."R";?></th>                                                                
                                                            </tr>                                                                                                                                                                                        
                                                        </tbody>  
                                                        </table>                                                        
                                                    </div>
                                                </div><!--end panel-->    
                                            </div><!--end table -->
                                        </div>
                                        <div class="pull-right">
                                            <?php echo form_open('closeShift_C/closeShift_prints');?>
                                                <input type="hidden" name="txtCashUsd" value="<?php echo ($income->cash_usd-$balance->bal_usd)-$expense->expense_usd;?>">
                                                <input type="hidden" name="txtCashRiel" value="<?php echo ($income->cash_riel-$balance->bal_riel)-$expense->expense_riel;?>">

                                                <input type="hidden" name="txtOpen_bal_usd" value="<?php echo $balance->bal_usd;?>">
                                                <input type="hidden" name="txtOpen_bal_riel" value="<?php echo $balance->bal_riel;?>">

                                                <input type="hidden" name="txtEnding_bal_usd" value="<?php echo ($income->usd-$balance->bal_usd)-$expense->expense_usd;?>">
                                                <input type="hidden" name="txtEnding_bal_riel" value="<?php echo ($income->riel-$balance->bal_riel)-$expense->expense_riel;?>">

                                                <input type="hidden" name="txtExchange_usd" value="<?php echo $income->exchange_usd;?>">
                                                <input type="hidden" name="txtExchange_riel" value="<?php echo $income->exchange_riel;?>">

                                                <button type="submit" class="btn btn-primary"><i class=" fa fa-print"></i> Print</button>
                                                <a href="<?php echo site_url('POS_C/index');?>" class="btn btn-default"><i class=" fa fa-arrow-left"></i> Back</a>
                                            <?php echo form_close();?>                                            
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