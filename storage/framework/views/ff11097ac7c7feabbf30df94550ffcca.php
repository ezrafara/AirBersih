<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if($errors->any()): ?>
    <div style="color:red;">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>

    <form method="POST" action="/login">
        <?php echo csrf_field(); ?>
        <label for="name">Nama:</label><br>
        <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
<?php /**PATH D:\RSI\AksesAirBersih\resources\views/auth/login.blade.php ENDPATH**/ ?>