<br>
<?php echo app('translator')->getFromJson('lang_v1.allowed_file'); ?>:
	<?php $__currentLoopData = config('constants.document_upload_mimes_types'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php if(!$loop->last): ?>
			<?php echo e($value . ',', false); ?>

		<?php else: ?>
			<?php echo e($value, false); ?>

	    <?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH E:\Clicky\Web POS\GitHub\POS-V4.7.8 -developer\resources\views/components/document_help_text.blade.php ENDPATH**/ ?>