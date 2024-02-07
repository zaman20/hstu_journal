<div class="header-area">
    <div class="left-part">
        <h2> HSTU in Journal and Research</h2>
    </div>
    <div class="right-part">
        <?php if(session()->has('user')): ?>
        <a href=""><?php echo e(session('user')); ?></a>
        <?php endif; ?>
        <a href="<?php echo e(url('/logout')); ?>">Log Out</a>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\hstu_journal\resources\views/template/header.blade.php ENDPATH**/ ?>