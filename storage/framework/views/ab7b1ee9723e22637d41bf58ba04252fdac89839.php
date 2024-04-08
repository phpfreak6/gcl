<?php $__currentLoopData = session('flash_notification', collect())->toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(!$message['overlay']): ?>
        <?php $__env->startSection('scripts'); ?>
        <?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
            <script>
                var level = <?php echo json_encode($message['level']); ?>;
                var message = <?php echo json_encode($message['message']); ?>;
                if(level == 'danger')
                    level = "error";

                $(document).ready(function() {
                    toast.fire({
                        type: level,
                        title: message
                    });
                });
        </script>
        <?php $__env->stopSection(); ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php echo e(session()->forget('flash_notification')); ?>

<?php /**PATH D:\xampp\htdocs\gcl\resources\views/vendor/flash/message.blade.php ENDPATH**/ ?>