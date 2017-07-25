

            
<?php $datestring = '%d/%m/%Y';?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-cutlery"></i> Menu Detail</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>                
                <div class="row">
                    <div class="col-lg-12"><!--table-->                        
                        <div class="panel panel-default"><!--panel-->
                            <div class="panel-heading">Menu Detail Information</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <img class="img-responsive img-thumbnail" src="<?php echo base_url('assets/uploads/'.$record->img);?>"/>
                                    </div>
                                    <div class="col-lg-6">
                                        <div><b>Menu name: </b><?php echo $record->m_name;?></div>
                                        <div><b>Menu khmer: </b><?php echo $record->m_name_kh;?></div>
                                        <div><b>Category: </b><?php echo $record->cat_name==""? "Null" : $record->cat_name;?></div>
                                        <div><b>Price: </b><?php echo $record->price.'$';?></div>                                        
                                        <div><b>Measure: </b><?php echo $record->measure;?></div>                                        
                                        <div><b>Description: </b><div class="thumbnail"><?php echo $record->desc;?></div></div>
                                        <div><b>Description khmer: </b><div class="thumbnail"><?php echo $record->desc_kh;?></div></div>
                                        <a href="<?php echo site_url('menu_C/index');?>" class="btn btn-default fa fa-close"> Close</a>
                                    </div>
                                </div>
                              
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
    </script>
    <script>
        function m_delete(id)
        {
            var x = confirm('Are you sure you want to delete this!');
            if(x==true)
            {
                window.location="<?php echo base_url()?>index.php/menu_C/delete/"+id;
            }
            else
            {
                return NULL;
            }
        }
    </script>



    