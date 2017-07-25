     <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

              <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="<?php echo base_url();?>main"><i class="fa fa-bar-chart-o"></i> <?php echo $this->lang->line('menu1')?></a>
                        </li>
                        <li>
                             <a href="<?php echo base_url();?>exrateController"><i class="fa fa-line-chart"></i> <?php echo $this->lang->line('menu2')?></a>
                        </li>
                        <li>
                             <a href="<?php echo base_url();?>userController"><i class="fa fa-user"></i> <?php echo $this->lang->line('menu3')?></a>
                        </li>
                        <!-- <li>
                            <a href="<?php echo base_url('index.php/customer_C/index');?>"><i class="fa fa-users"></i> Customer</a>
                        </li> -->
                        <li>
                            <a href="<?php echo base_url('Menu_C');?>"><i class="fa fa-cutlery"></i> <?php echo $this->lang->line('menu4')?></a>
                        </li>
        <!--                 <li>
                            <a href="<?php echo base_url('index.php/table_C/index');?>"><i class="fa fa-th"></i> Table</a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>index.php/Position"><i class="fa fa-map-marker"></i> Position </a>
                        </li>-->
                        <li>
                            <a href="<?= base_url()?>Category"><i class="glyphicon glyphicon-duplicate"></i> <?php echo $this->lang->line('menu5')?></a>
                        </li>
                    <!--     <li>
                            <a href="<?= base_url()?>index.php/Balance"><i class="fa fa-money"></i> Balance </a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>index.php/Staff"><i class="fa fa-male"></i> Staff </a>
                        </li> -->
                        <li>
                            <a href="<?= base_url()?>invoice_pos"><i class="fa fa-male"></i> <?php echo $this->lang->line('menu6')?> </a>
                        </li>
                        <!-- <li>
                            <a href="<?= base_url()?>index.php/closeShift_report_C"><i class="fa fa-refresh"></i> Closeshift Lists</a>
                        </li> -->
                        <li>
                            <a href="<?= base_url()?>Order_pos_c"><i class="fa fa-reorder"></i>​​ <?php echo $this->lang->line('menu7')?> </a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>report_c/sale_report_daily"><i class="fa fa-reorder"></i> <?php echo $this->lang->line('menu8')?> </a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>report_c/sale_report_detail"><i class="fa fa-reorder"></i> <?php echo $this->lang->line('menu9')?> </a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
   </nav>
