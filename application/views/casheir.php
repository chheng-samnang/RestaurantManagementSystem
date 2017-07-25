<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <!-- Page Content -->
        <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 col-md-offset-1">
                        <div class="panel panel-default">
                          <div class="panel-heading"><span class="glyphicon glyphicon-cutlery"></span> Order</div>
                          <div class="panel-body">
                              <table id="mydata" class = "table table-hover">       
                                  <thead>
                                      <tr>
                                         <th>No</th>
                                         <th>Food Name</th>
                                         <th>Quantity</th>
                                         <th>Prices ($)</th>
                                         <th>Discount (%)</th>
                                         <th>Total ($)</th>
                                         <th style="text-align: center;">Action <input type="checkbox"></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                   <?php $i = 1 ;?>
                                   <?php foreach ($record as $value) {?>
                                      <tr>
                                        <td><?php echo $i; $i++;?></td>
                                        <td><?php echo $value['m_name'];?></td>
                                        <td><?php echo $value['qty'];?></td>
                                        <td>10 $</td>
                                        <td><?php echo $value['discount'].' %';?></td>
                                        <td>1000 $</td>
                                        <td><input type="checkbox" style="margin-left: 146px !important;"></td>
                                      </tr>
                                   <?php } ?>
                                  </tbody>
                                </table><!-- table hover -->
                                <div class="col-lg-4">
                                  <button type="button" class="btn btn-success" onClick="window.print()"><span class="glyphicon glyphicon-print"></span> Print</button>
                                  <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancell</button>
                                </div>
                            </div><!-- /. panel-body -->
                        </div><!--/.panel panel-default -->
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        <script>
        $(document).ready(function(){
            $('#mydata').DataTable();
        });
    </script>
</body>
</html>
        