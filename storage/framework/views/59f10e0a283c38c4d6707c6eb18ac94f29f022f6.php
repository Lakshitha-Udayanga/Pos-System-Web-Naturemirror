<table class="table table-condensed">
	<?php $__empty_1 = true; $__currentLoopData = $medias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
		<tr>
			<td>
				<?php if(isFileImage($media->display_url)): ?>
					<?php echo $media->thumbnail(); ?>

					<br>
				<?php endif; ?>
				<?php echo e($media->display_name, false); ?>

			</td>
			<td>
				<small>
					<?php echo app('translator')->getFromJson('lang_v1.uploaded_by'); ?>:
					<?php echo e($media->uploaded_by_user->user_full_name, false); ?>

				</small>
			</td>
			<td>
				<a href="<?php echo e($media->display_url, false); ?>" download="<?php echo e($media->display_name, false); ?>" class="btn btn-success btn-xs no-print"><i class="fas fa-download"></i> <?php echo app('translator')->getFromJson('lang_v1.download'); ?></a>
				<?php if(!empty($delete)): ?>
					<button type="button" data-href="<?php echo e(action('ProductController@deleteMedia', [$media->id]), false); ?>" class="btn btn-danger btn-xs delete-media no-print"><i class="fas fa-trash"></i> <?php echo app('translator')->getFromJson('messages.delete'); ?></a>
				<?php endif; ?>
			</td>
		</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
		<tr>
			<td colspan="3" class="text-center"><?php echo app('translator')->getFromJson('lang_v1.no_attachment_found'); ?></td>
		</tr>
	<?php endif; ?>
</table><?php /**PATH E:\Clicky\Web POS\GitHub\POS-V4.7.8 -developer\resources\views/sell/partials/media_table.blade.php ENDPATH**/ ?>