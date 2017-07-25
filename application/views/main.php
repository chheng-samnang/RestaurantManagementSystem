<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url('assets/canvas/canvas.min.js')?>"></script>
        <?php
        $dataPoints = $query;
    ?>   
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row" style="margin-bottom:20px;">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-bar-chart-o"></i> <?php echo $this->lang->line('menu1')?></h1>
                    </div>
                </div>
                
                <div class="row" style="margin-top:10px;">
                    <div class="col-lg-6">
                    
                    <div class="panel panel-default" style="height:470px;">
                        <div class="panel-heading">
                            <h3 class="panel-title">Summary of Sale Quantity By Category</h3>
                        </div>
                        <div class="panel-body">
                            <div id="chartContainer"></div>                       
                        </div>
                    </div>     
        
        <script type="text/javascript">
            $(function () {
                var chart = new CanvasJS.Chart("chartContainer",
                {
                    theme: "theme2",
                    title:{
                        text: ""
                    },
                    exportFileName: "New Year Resolutions",
                    exportEnabled: true,
                    animationEnabled: true,     
                    data: [
                    {       
                        type: "pie",
                        showInLegend: true,
                        toolTipContent: "{name}: <strong>{y}%</strong>",
                        indexLabel: "{name} {y}%",
                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                chart.render();
            });
        </script>
                    </div><!-- col-lg-6 -->

                    <div class="col-lg-6">
                        <div class="panel panel-default" style="">
                            <div class="panel-heading">
                                <h3 class="panel-title">Summary of Menu Sales</h3>
                            </div>
                            <div class="panel-body"></div>
                        </div>
                    </div>
                </div> <!-- row -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default" style="">
                            <div class="panel-heading">
                                <h3 class="panel-title">Summary of Daily Sales</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Amount</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Opening Balance</td>
                                            <td><?php echo "$".number_format((float)$openingBalance, 2, '.', '');?></td>
                                        </tr>
                                        <tr>
                                            <td>Ending Balance</td>
                                            <td><?php echo '$'.number_format((float)($endingBalance+$openingBalance), 2, '.', '')?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Sales</td>
                                            <td><?php echo '$'.number_format((float)$endingBalance, 2, '.', '');?></td>
                                        </tr>
                                        <tr>
                                            <td>Other Expense</td>
                                            <td><?php echo '$'.number_format((float)$expense->expense, 2, '.', '')?></td>
                                        </tr>
                                        
                                        
                                        <tr>
                                            <td>Net Balance</td>
                                            <td><?php echo "$".number_format((float)(($endingBalance+$openingBalance) - $expense->expense), 2, '.', '')?></td>
                                        </tr>
                                        <tr>
                                            <td>Profit</td>
                                            <td><?php echo "$".number_format((float)($endingBalance-$expense->expense), 2, '.', '');?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default" style="">
                            <div class="panel-heading">
                                <h3 class="panel-title">Cash Collection</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>USD</th>
                                            <th>KHR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Balance</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Cash In</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Exchange</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Expense</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Cash On Hand</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->    
