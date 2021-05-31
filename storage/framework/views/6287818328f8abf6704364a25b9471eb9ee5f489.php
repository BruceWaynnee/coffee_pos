<?php $__env->startSection('dashboard_page_title', 'Size Edit'); ?>


<?php $__env->startSection('stylesheet'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/dashboard/modules/size.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('dashboard_breadcrumb'); ?>
    <li class="breadcrumb-item" aria-current="page">
        <a href="<?php echo e(url('/dashboard')); ?>" class="breadcrumb-link">Dashboard / </a>
        <a href="<?php echo e(route('size-list')); ?>" class="breadcrumb-link">Size</a>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="edit-size-content-wrapper">
    <form id="size-form" action="<?php echo e(route('size-update', ['id' => $size->id])); ?>" method="POST" enctype="multipart/form-data">
        <?php echo method_field('patch'); ?>
        <?php echo csrf_field(); ?>
        
        <div class="general-info-wrapper">
            <p class="font-weight-bold">General Information</p>
            <hr>
            <div class="form-row">
                
                <div class="form-group col-md-4">
                    <label for="name">Size Name</label>
                    <input class="form-control" value="<?php echo e($size->name); ?>" type="text" minlength="2" maxlength="20" name="name" id="name" required>
                    <small class="text-warning" data-toggle="tooltip" data-placement="right" title="name accept only alphanumeric and number" > [ Size Name ? ]</small>
                </div>
            </div>
            
            <div class="size-btn-wrapper form-row">
                <input type="submit" class="btn btn-sm btn-outline-success mr-2" value="Update Size">
                <a class="btn btn-sm btn-outline-danger" href="<?php echo e(route('size-list')); ?>">Cancel</a>
            </div>
        </div>
    </form>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/dashboard/modules/size.js')); ?>"></script>
    <script>
        $(document).ready(function(){
            validAddnEditSize();
            
        })
    </script>    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coffee_pos\resources\views/dashboard/modules/size/edit.blade.php ENDPATH**/ ?>