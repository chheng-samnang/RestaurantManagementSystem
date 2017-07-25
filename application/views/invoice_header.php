<table>
	
		
    <?php foreach ($invoice_header as $in) {?>
    	<tr>
    		<td>Table Name:<?php echo $in->tab_name;?></td>
    	</tr>
    	<tr>
    		<td>Staff Name:<?php echo $in->staff_name;?></td>
    	</tr>
    	<tr>
    		<td>Invoice Date:<?php echo $in->inv_date;?></td>
    	</tr>
    <?php }?>
	
</table>

