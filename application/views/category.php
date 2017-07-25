
    <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <h1 class="page-header"><i class="glyphicon glyphicon-duplicate"></i> <?php echo $this->lang->line('category')?></h1>
                <div class="row">
                    <div class="col-lg-6" style="margin: -10px 0px 10px;">
                        <a href="<?= base_url()?>Category/add_category"><button type="button" class="btn btn-success"><span class="fa fa-plus"></span> <?php echo $this->lang->line('add')?></button></a>
                    </div>
                </div><!--/. row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                          <div class="panel-heading"><?php echo $this->lang->line('category')?></div>
                          <div class="panel-body">
                            <table id="mydata" class ="table table-hover">       
                                   <thead>
                                      <tr>
                                      ​​   <th>No.</th>
                                         <th>Category</th>
                                         <th>Category Kh</th>
                                         <th>User Create</th>
                                         <th>Date Create</th>
                                         <th>Date Update</th>
                                         <th>User Update</th>
                                         <th style="text-align: center;">Action</th>
                                      </tr>
                                   </thead>
                                   <tbody>                                  
                                   <?php
                                    $i = 1;
                                    foreach ($categorylist-> result() as $category) {
                                   ?>
                                      <tr>
                                         <td><?php $i; echo $i++;?></td>
                                         <td><?php echo $category->cat_name;?></td>
                                         <td><?php echo $category->cat_name_kh;?></td>
                                         <td><?php echo $category->user_crea;?></td>
                                         <td><?php echo $category->date_crea;?></td>
                                         <td><?php echo $category->date_updt;?></td>
                                         <td><?php echo $category->user_updt;?></td>
                                         <td style="text-align: center;">

                                            <a href="<?php echo base_url()?>index.php/Category/update_category/<?php echo $category->cat_id?>" class="btn btn-primary"><i class="fa fa-pencil"></i> <?php echo $this->lang->line('edit')?></a>

                                            

                                            <a href="<?php echo base_url('index.php/Category/delete/'.$category->cat_id);?>" class="btn btn-danger btn-large confirModal del" data-confirm-title="Confirm Delete !" data-confirm-message="Are you sure you want to Delete this ?"><i class="fa fa-trash"></i> <?php echo $this->lang->line('delete')?></button>

                                        </td>
                                      </tr>
                                      <?php
                                        }
                                      ?>
                                   </tbody>
                                </table><!-- table hover -->
                            </div><!-- /. panel-body -->
                        </div><!--/.panel panel-default -->
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
    <script>
        $(document).ready(function(){
            $('#mydata').DataTable();
        });
    </script>
<<<<<<< HEAD
=======
    <script> 
         $(document).ready(function(){
             var a=$('.del').confirmModal();             
         });                                    
    </script>

>>>>>>> 5e4ae1a167cd92bcd96fb364f9da377e6b621b4f
