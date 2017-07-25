</nav>

<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-header"><?php echo $this->lang->line("btnReprint") ?></h1>

        <div class="row" style="margin-top:20px;">
        <?php foreach ($invoice as $key1 => $value): ?>
          <div class="col-sm-4 col-md-6">
            <div class="thumbnail">

                <div style="height:240px;overflow:scroll;">

                  <div id="invoice<?php echo $key1?>">
                    <h3 style="text-align:center;">ស៊ុបគោពេញចិត្ត</h3>
                    <p style="text-align:center;">#429អាបេសេ សង្កាត់បឹងព្រលឹត,</p>
                    <p style="text-align:center;">ផ្លូវ 93 ខណ្ឌ 7 មករា</p>
                    <h3 style="text-align:center;color:red;border-bottom:2px solid black;">វិក័យបត្រ<?php echo $this->lang->line("table") ?> <?php echo $value->tab_id ?></h3>
                    <div class="pull-left" >
                        <h6 style="color:red;font-weight:bold;">ល.រ: <?php echo $value->inv_id ?></h6>
                        <h6 style="float:left;">បេឡា: <?php echo $value->user_crea ?></h6>

                    </div>
                    <div class="pull-right">
                      <h6 style="margin-right:10px;"><?php echo $value->inv_date; ?></h6>
                      <h6><?php echo date("H:i:s"); ?></h6>
                    </div>

                    <table class="table table-striped">
                      <thead>
                        <tr style="border-top:2px solid black;font-size:13px;">

                          <th>មុខម្ហូប</th>
                          <th>ចំនួន</th>
                          <th>តម្លៃ(៛)</th>
                          <th>សរុប(៛)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $total = 0;
                        foreach ($menu[$key1] as $key => $value): ?>

                        <tr>

                          <td><?php echo $value->m_name_kh ?></td>
                          <td><?php echo $value->qty ?></td>
                          <td style="text-align:right;"><?php echo number_format($value->price) ?></td>
                          <td style="text-align:right;"><?php echo number_format($value->total) ?></td>
                        </tr>
                        <?php
                        $total = ($total + $value->total);
                       endforeach; ?>
                        <tr style="border-top:2px solid black;">
                          <td colspan="5" style="text-align: right;"><strong>ទឹកប្រាក់សរុបជារៀល: <?php echo number_format($total) ?></strong></td>
                        </tr>
                        <tr>
                          <td colspan="5" style="text-align: right;"><strong>ទឹកប្រាក់សរុបជាដុល្លារ: <?php echo number_format(($total / $exchange->key_data)	,2)?></strong></td>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                </div>
              <hr>
              <!-- <h4><strong>Grand Total: <?php echo "$".$total ?></h4></strong> -->
              <a onclick="printInvoice('invoice<?php echo $key1?>')" href="<?php echo base_url()?>index.php/invoice_pos/index/<?php echo $value->inv_id?>" class="btn btn-primary btn-lg"><?php echo $this->lang->line("print_invoice") ?></a>
            </div>
          </div>
        <?php endforeach; ?>
        </div>  <!--======= div class="row" =========-->


      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
function printInvoice(el)
  {

      var restorepage = document.body.innerHTML;
      var printinvoice = document.getElementById(el).innerHTML;
      document.body.innerHTML = printinvoice;
      window.print();
      document.body.innerHTML = restorepage;

  }//PrintInvoice
</script>
