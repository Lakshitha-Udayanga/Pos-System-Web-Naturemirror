<table class='table table-condensed table-striped'>
	<tr>
	    <th><?php echo app('translator')->getFromJson('business.operations'); ?></th>
	    <th><?php echo app('translator')->getFromJson('business.keyboard_shortcut'); ?></th>
	</tr>
	<tr>
	    <td><?php echo app('translator')->getFromJson('lang_v1.recent_product_quantity'); ?>:</td>
	    <td>
	    	<?php if(!empty($shortcuts["pos"]["recent_product_quantity"])): ?>
		    	<?php echo e($shortcuts["pos"]["recent_product_quantity"], false); ?>

		    <?php endif; ?>
	    </td>
	</tr>

	<tr>
	    <td><?php echo app('translator')->getFromJson('lang_v1.add_new_product'); ?>:</td>
	    <td>
	    	<?php if(!empty($shortcuts["pos"]["add_new_product"])): ?>
		    	<?php echo e($shortcuts["pos"]["add_new_product"], false); ?>

		    <?php endif; ?>
	    </td>
	</tr>
	
</table><?php /**PATH E:\Clicky\Web POS\GitHub\POS-V4.7.8 -developer\resources\views/purchase/partials/keyboard_shortcuts_details.blade.php ENDPATH**/ ?>