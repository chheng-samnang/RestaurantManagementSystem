</nav>
<style media="screen">
  th{text-align:center;}
</style>
<div id="page-wrapper">
<div class="container-fluid">
<div class="row">
  <div class="col-lg-12">
    <div class="row">
      <h1 class="page-header"><?php echo $this->lang->line('sale_report')?></h1>
      <div class="panel panel-default">
        <div class="panel-heading">

            <h3 class="panel-title">Filter</h3>

            <button onclick="printReport('report')" style="float: right; margin-top: -25px;" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> <?php echo $this->lang->line('print')?></button>

        </div>
        <div class="panel-body">
          <form method="post" action="<?php echo base_url('index.php/report_c/sale_report_daily')?>" class="form-inline">
              <div class="form-group">
                <label for="exampleInputEmail2"><?php echo $this->lang->line("dateF") ?></label>
                  <div class='input-group date' id='datetimepicker1'>
                      <input type='text' class="form-control" placeholder="Click here to pick date" name="txtDateF" onKeyup="checkform()"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

              <script type="text/javascript">
                                $(function () {
                                    $('#datetimepicker1').datetimepicker({
                                format: 'YYYY-MM-DD'
                             });
                                     $('#datetimepicker2').datetimepicker({
                                format: 'YYYY-MM-DD'
                             });
                                });
                            </script>
              <div class="form-group">
                <label for="exampleInputEmail2"><?php echo $this->lang->line("dateT") ?></label>
                  <div class='input-group date' id='datetimepicker2'>
                      <input type='text' class="form-control" placeholder="Click here to pick date" name="txtDateT" onKeyup="checkform()" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail2"><?php echo $this->lang->line("SearchKeyWord") ?></label>
                        <input type='text' class="form-control" placeholder="Enter keyword here..." name="txtSearch" />
                  </div>
              <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i> <?php echo $this->lang->line('search')?></button>
            </form>
            <hr>
            <div id="report">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th><?php echo $this->lang->line("no") ?></th>
                  <th><?php echo $this->lang->line("receiptNo"); ?></th>
                  <th><?php echo $this->lang->line("date"); ?></th>
                  <th><?php echo $this->lang->line("soldBy"); ?></th>
                  <th><?php echo $this->lang->line("ttlUsd"); ?> </th>
                  <th><?php echo $this->lang->line("ttlRiel"); ?></th>
                  <th><?php echo $this->lang->line("cashInUsd"); ?></th>
                  <th><?php echo $this->lang->line("cashInRiel"); ?></th>
                  <!-- <th><?php echo $this->lang->line("exUsd"); ?></th>
                  <th><?php echo $this->lang->line("exRiel"); ?></th> -->
                </tr>
              </thead>
              <tbody>
                <?php $g_total=0;$total_r=0;$c_usd=0;$c_khr=0; foreach ($receipt as $key => $value) {?>
                  <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><?php echo $value->rec_no ?></td>
                    <td><?php echo $value->rec_date ?></td>
                    <td><?php echo $value->invUserCrea ?></td>
                    <td style="text-align:right;"><?php echo "$".$value->ttl_usd ?></td>
                    <td style="text-align:right;"><?php echo number_format($value->ttl_riel)?></td>
                    <td style="text-align:right;"><?php echo $value->cash_usd ?></td>
                    <td style="text-align:right;"><?php echo number_format($value->cash_riel) ?></td>
                    <!-- <td style="text-align:right;"><?php echo $value->exchange_usd ?></td>
                    <td style="text-align:right;"><?php echo number_format($value->exchange_riel) ?></td> -->
                  </tr>
                  <?php $g_total = $g_total + $value->ttl_usd;
                        $total_r = $g_total * $exchange->key_data;
                        $c_usd = $c_usd+ $value->cash_usd;
                        $c_khr = $c_khr+ $value->cash_riel;
                } ?>
                  <tr>
                    <td colspan="4" style="text-align:center;">
                      <strong><?php echo $this->lang->line("grandTtl") ?></strong>
                    </td>
                    <td style="text-align:right;"><strong><?php echo "$".$g_total; ?></strong></td>
                    <td style="text-align:right;"><strong><?php echo number_format($total_r)." ៛"?></strong></td>
                    <td style="text-align:right;"><strong><?php echo "$".number_format($c_usd,2)?></strong></td>
                    <td style="text-align:right;"><strong><?php echo number_format($c_khr)." ៛"?></strong></td>

                  </tr>


              </tbody>
            </table>

            </div>



        </div>
      </div>

    </div>
  </div>
</div>
</div>
</div>
<script>
        $(document).ready(function(){
            $('#mydata').DataTable();
        });
</script>

<script>
  function printReport(el)
    {

        var restorepage = document.body.innerHTML;
        var printReport = document.getElementById(el).innerHTML;
        document.body.innerHTML = printReport;
        window.print();
        document.body.innerHTML = restorepage;

    }

</script>
