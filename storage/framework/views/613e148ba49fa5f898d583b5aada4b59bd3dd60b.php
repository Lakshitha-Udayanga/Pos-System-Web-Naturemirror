<div class="pos-tab-content">
	<div class="row">
	<?php if(!empty($modules)): ?>
		<?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="checkbox">
                      <label>
                        <?php echo Form::checkbox('enabled_modules[]', $k,  in_array($k, $enabled_modules) , 
                        ['class' => 'input-icheck']);; ?> <?php echo e($v['name'], false); ?>

                      </label>
                      <?php if(!empty($v['tooltip'])): ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . $v['tooltip'] . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
	</div>
</div><?php /**PATH D:\Laravel Project\Clicky Pos 4.7.8\POS-V4.7.8\resources\views/super_admin/partials/settings_modules.blade.php ENDPATH**/ ?>