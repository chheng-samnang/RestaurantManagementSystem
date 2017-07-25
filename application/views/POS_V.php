</nav>
<!--left-->
    <?php echo form_open('index.php/POS_C/order');?><!--form-->
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">

                <div class="container-fluid">
                    <div class="row" style="margin-top:20px;">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h4><i class="fa fa-edit"></i> Order Menu Management</h4></div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <button type="submit" name="btnBook" class="btn btn-default btn-lg"><i class="fa fa-book"></i> Book</button>

                                                <button type="submit" name="btnOrder" class="btn btn-default btn-lg"><i class="fa fa-edit"></i> Order</button>
                                                <button type="submit" name="btnInvoice" class="btn btn-default btn-lg" style="margin-left:2%"><i class="fa fa-newspaper-o"></i> Invoice</button>
                                                <button type="submit" name="btnReceipt" class="btn btn-default btn-lg" style="margin-left:2%"><i class="fa fa-file-text"></i> Receipt</button>
                                                <button type="submit" name="btnChangeTable" class="btn btn-default btn-lg" style="margin-left:2%"><i class="fa fa-table"></i> Change table</button>

                                                <!-- <button type="submit" name="btnCloseShift" class="btn btn-default btn-lg" style="margin-left:2%"><i class="fa fa-refresh"></i> Close shift</button>                                                 -->
                                                <a href="<?php echo site_url('expense_C/index')?>" class="btn btn-default btn-lg" style="margin-left:2%"><i class="fa fa-mail-forward"></i> Extra Expense</a>
                                                <a href="<?php echo site_url('Main')?>" class="pull-right btn btn-default btn-lg"><i class="fa fa-arrow-left"></i> Back</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->

                    <!--error-->
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(form_error('order') OR isset($sta_error)){?>
                                <div class="alert alert-warning alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <strong>Warning!</strong>
                                  <?php
                                    if(form_error('order')){echo form_error('order');}
                                    if(isset($sta_error)){echo $sta_error;}
                                   ?>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                    <!--end error-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-list-alt"></i> <b>Table lists</b></div>
                                <div class="panel-body" style="overflow: scroll;overflow-x: hidden;height: 380px;">
                                    <div class="row">
                                        <?php foreach($record as $value){ ?>
                                          <div class="col-lg-2 col-xs-4 tables">
                                            <a href="#" style="text-decoration: none">
                                               <div class=" border panel panel-<?php if(($value->sta)=='Waiting'){echo 'warning';} else if(($value->sta)=='Busy'){echo 'danger';} else if(($value->sta)=='Book'){echo 'success';} else echo 'info';?>">
                                                  <div class="panel-heading">
                                                        <span style="float:left">Table</span>
                                                        <input type="radio" name="order" style="float:right" value="<?php echo $value->tab_id;?>" class="chk" id="<?php echo $value->tab_id?>">
                                                        <input type="radio" name="bookID" style="float:right;display:none;" value="<?php echo $value->book_id;?>" class="bid" id="<?php echo $value->book_id?>">
                                                        <h1 class="text-center"><?php echo $value->tab_name;?></h1>
                                                        <?php if($value->sta=='Book'){?>
                                                        <span style="float:left"><i><?php echo $value->customer_name;?></i></span>
                                                        <?php }?>
                                                        <span style="float:right"><i><?php echo $value->sta;?></i></span><div style="clear:both"></div>
                                                </div>

                                               </div>
                                            </a>
                                           </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row2-->

                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div><!--end col-->
        </div><!--end row-->
    <?php echo form_close();?>


    </div>
    <!-- /#wrapper -->

    <script>
          $(".border").click(function()
            {

                var value=($(".chk",this).val());
                var bookID = ($(".bid",this).val());
                document.getElementById(value).checked = true;
                document.getElementById(bookID).checked = true;
            });

    </script>
    <script type="text/javascript">
        function getBookID($val)
        {
            alert($val);
        }
    </script>
