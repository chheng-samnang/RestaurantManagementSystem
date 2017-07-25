<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<form method="post">
    <!-- Page Content -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">
              <span class="glyphicon glyphicon-cutlery"></span> Order List <a href="<?= base_url()?>index.php/POS_C" style="margin-left: 728px; margin-top: -22px; margin-bottom: -4px;" class="btn btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back to POS</a>
            </div>
              <div class="panel-body">
                <div class="col-lg-12" style="border-top: solid 1px #ededed; border-left: solid 1px #ededed; border-right: solid 1px #ededed; padding: 27px;">
                  <?php foreach ($invoiec_header as $value){ ?>
                      <div class="col-lg-4">
                        <b>Table Name: </b><?php echo $value->tab_name?>
                        <input type="hidden" name="txtTabID" value="<?php echo $value->tab_id?>">
                      </div>
                      <div class="col-lg-4"><b>Staff Name:</b> <?php echo $value->user_crea?></div>
                      <div class="col-lg-4"><b>Date:</b> <?php echo $value->ord_date?></div>
                  <?php }?>
                </div>
                  <?php $exchanges =""?>
                  <?php foreach ($exchange->result() as $ex) {?>
                    <p><?php  $exchanges = $ex->key_data?></p>
                  <?php  }?>
                     <table id="mydata" class = "table table-bordered table-condensed table-hover table-striped">       
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Food Name</th>
                            <th>Quantity</th>
                            <th>Prices ($)</th>
                            <th>Discount (%)</th>
                            <th>Total ($)</th>
                            <th>Total (R)</th>
                            <th style="text-align: center;">Action 
                            <input type="checkbox" name="chkAll" id="chkAll" style="margin-left: 45px;"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1; ?>
                          <?php foreach ($invoice->result() as $value){?>
                            <tr>
                              <td><?php $i; echo $i++;?></td>
                              <td><?php echo $value->m_name?></td>
                              <td><?php echo $value->qty;?></td>
                              <td><?php echo $value->cost. '$';?></td>
                              <td><?php echo $value->discount.'%';?></td>
                              <td><?php $total= $value->qty * $value->cost; echo $total.'$';?></td>
                              <td><?php $r = $total * $exchanges; echo $r. 'R';?></td>
                              <td>
                                <input type="checkbox" id="chk" name="chk" value="<?php echo $value->ord_det_id;?>" style="margin-left: 146px !important;" />
                              </td>
                            </tr>     
                          <?php  }?>
                        </tbody>
                      </table><!-- table hover -->
                      <div class="row">
                        <div class="col-lg-9"></div>
                            <div class="col-lg-3">

                              <button type="submit" style="margin-left: -56px;" name="btn_print" id="btn_print" class="btn btn-success"><span class="glyphicon glyphicon-print"></span> Print Invoice</button>
                              <button type="button" class="btn btn-danger" id="close"><span class="glyphicon glyphicon-remove"></span> Cancell</button>
                            </div>
                            
                          </div>
                    </div><!-- /. panel-body -->
                </div><!--/.panel panel-default -->
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</form>
<script type="text/javascript">
  $('#chkAll').click(function(event)
  {
    if(this.checked)
    {
      $(':checkbox').each(function()
      {
        this.checked = true;
      });
    }else
    {
      $(':checkbox').each(function()
      {
        this.checked = false;
      });
    }
  });
</script>