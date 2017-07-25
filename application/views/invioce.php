<div class="container-fluid">
        <div class="col-lg-4 col-lg-offset-4" style="box-shadow: 1px 1px 5px #888888;">
            <div class="row" style="padding: 10px;">
                <div class="col-lg-7">Logo</div>             
                <div class="col-lg-4">Company Name</div>
            </div>
            <hr style="border-bottom: solid #f3f2f2 1px;">
            <div class="row" style="line-height: 2; margin-bottom: 12px;">
            <?php $i= 1 ?>
             <?php foreach ($invoiceheader as $value) {?>
                <div class="col-lg-7">
                    <table>
                        <tr><th></th></tr>
                        <tr>
                            <th>Invioce No:<?php $i; echo $i++;?></th>
                        </tr>
                        <tr>
                            <th>Staff Name:<?php echo $value->staff_id?></th>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-4">
                    <table>
                        <tr>
                            <th>Date:<?php echo $value->inv_date?></th>
                        </tr>
                        <tr>
                            <th>Table Name:<?php echo $value->tab_name?></th>
                        </tr>
                    </table>
                </div>
             <?php }?>
            </div>
            <table class="table">
                <thead style="background: #dedddd;">
                    <tr>
                        <th>No</th>
                        <th>Menu</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1?>
                <?php foreach ($invoicedetail as $row) {?>
                    <tr>
                        <td><?php $i; echo $i++;?></td>
                        <td><?php echo $row->m_name?></td>
                        <td><?php echo $row->qty;?></td>
                        <td><?php echo $row->cost.'$';?></td>
                        <td><?php echo $row->discount.'%'?></td>
                        <td><?php echo $row->total.'$'?></td>
                    </tr>
                   
                <?php }?>
                </tbody>
            </table>
        </div><!-- /.col-lg-12 -->
</div><!-- /.container-fluid -->