
<?php $datestring = '%d/%m/%Y';?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-cutlery"></i> <?php echo $this->lang->line('menu')?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row"><!--add and search-->
                    <div class="col-lg-5">
                        <a href="<?php echo base_url('index.php/menu_C/add');?>" class="btn btn-success" style="margin-bottom:5px;"><i class="fa fa-plus"></i> <?php echo $this->lang->line('add')?></a>
                        <button id="btnOrder" type="button" name="btnOrderMenu" class="btn btn-warning"><i class="glyphicon glyphicon-th-list"></i> <?php echo $this->lang->line("orderMenu"); ?></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12"><!--table-->
                        <div class="panel panel-default"><!--panel-->
                            <div class="panel-heading"><?php echo $this->lang->line('menu')?></div>
                            <div class="panel-body table-responsive">
                                <table class="table table-hover" id="mydata">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Menu name</th>
                                        <th>Menu khmer</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>User Create</th>
                                        <th>Date Create</th>
                                       
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;?>
                                    <?php foreach($menu as $value) {?>

                                        <tr>
                                            <td><?=$i;$i++;?></td>
                                            <td><a href="<?php echo base_url('index.php/menu_C/menu_detail/'.$value->m_id);?>" title="Menu detail"><?php echo $value->m_name?></a></td>
                                            <td><?php echo $value->m_name_kh?></td>
                                            <td><?php echo $value->price. "$"?></td>
                                            <td>
                                              <img class="img-responsive img-thumbnail" style="width:60px;" src="<?php echo base_url('assets/uploads/'.$value->img);?>"/>
                                            </td>
                                            <td><?php echo $value->user_crea;?></td>
                                            <td><?php echo date("d/m/Y",strtotime($value->date_crea));?></td>
                                            
                                            <td>
                                                <a href="<?php echo base_url('index.php/menu_C/get_to_edit/'.$value->m_id);?>" class="btn btn-primary"><i class="fa fa-pencil"></i> <?php echo $this->lang->line('edit')?></a>
                                                <a href="<?php echo base_url('index.php/menu_C/delete/'.$value->m_id);?>" class="btn btn-danger btn-large confirModal del" data-confirm-title="Confirm Delete !" data-confirm-message="Are you sure you want to Delete this ?"><i class="fa fa-trash"></i> <?php echo $this->lang->line('delete')?></button>
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
    <!-- /#wrapper -->
    <!--Java script-->
    <script>
        $(document).ready(function(){
            $('#mydata').DataTable();
        });
        $("#btnOrder").click(function(){
          window.location.assign("<?php echo base_url()?>Menu_C/orderMenu");
        });
    </script>
   <script>
         $(document).ready(function(){
             var a=$('.del').confirmModal();
         });
    </script>
