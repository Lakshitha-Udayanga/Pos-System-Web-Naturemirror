<div class="modal-dialog modal-xl" role="document">
  <div class="modal-content">
    <?php echo $__env->make('purchase.partials.show_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('purchase.partials.pop_invoice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary no-print" aria-label="Print" 
      onclick="$(this).closest('div.modal-content').printThis();"><i class="fa fa-print"></i> <?php echo app('translator')->getFromJson( 'messages.print' ); ?>
      </button>
      <button type="button" class="btn btn-default no-print" data-dismiss="modal"><?php echo app('translator')->getFromJson( 'messages.close' ); ?></button>
    </div>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var element = $('div.modal-xl');
		__currency_convert_recursively(element);
	});
</script><?php /**PATH F:\My Project\Thand\free-isses-item\New folder\resources\views/purchase/show.blade.php ENDPATH**/ ?>