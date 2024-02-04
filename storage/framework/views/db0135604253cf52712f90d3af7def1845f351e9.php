<?php $__env->startSection('title', 'SUPER ADMIN PANEL'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>SUPER ADMIN LOGIN</h1>
    <br>
    
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php echo Form::open(['url' => action('SuperAdminController@clickySuperadmin'), 'method' => 'post' ]); ?>

            <?php $__env->startComponent('components.widget'); ?>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="form-group">
                  <label for="">Password:*</label>
                  <input type="password" class="form-control" name="super_admin_password" id="super_admin_password" required>
                  <br>
                  <button class="btn btn-primary pull-right">Go</button>
                </div>
              </div>
              <div class="col-md-4"></div>
            <?php echo $__env->renderComponent(); ?>
            <?php echo Form::close(); ?>

        </div>
    </div>
</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Clicky\Web POS\GitHub\POS-V4.7.8 -developer\resources\views/super_admin/index.blade.php ENDPATH**/ ?>