<?php $__env->startSection('content'); ?>
<div class="auth-form-wrapper">
    <h1>Library Dashboard – Welcome, <?php echo e(Auth::user()->name); ?></h1>

    
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
        <div class="role-badge admin-badge">
            You have <strong>Admin</strong> Access
        </div>
    <?php else: ?>
        <div class="role-badge user-badge">
            You have <strong>User</strong> Access
        </div>
    <?php endif; ?>

    
    <h4 class="mt-4">Available Books:</h4>

    <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="book-card">
            <h5><?php echo e($book->title); ?></h5>
            <p><strong>Author:</strong> <?php echo e($book->author); ?></p>
            <p><strong>Category:</strong> <?php echo e($book->category); ?></p>
            <small class="text-muted">ISBN: <?php echo e($book->isbn); ?></small>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('borrow', $book)): ?>
                <div class="mt-3">
                    <form action="<?php echo e(route('loans.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="book_id" value="<?php echo e($book->id); ?>">
                        <button class="submit-btn" style="width: auto;">Borrow this Book</button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p>No books available at the moment.</p>
    <?php endif; ?>
</div>

<style>
    .auth-form-wrapper {
        width: 80%;
        margin: 20px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    h1 {
        text-align: center;
        font-size: 32px;
        margin-bottom: 20px;
        color: #333;
    }

    .role-badge {
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
        text-align: center;
        font-weight: bold;
    }

    .admin-badge {
        background-color: #d4edda;
        color: #155724;
    }

    .user-badge {
        background-color: #d1ecf1;
        color: #0c5460;
    }

    .book-card {
        background: #fff;
        padding: 15px;
        border-radius: 6px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        margin-bottom: 20px;
    }

    .book-card h5 {
        margin-top: 0;
        font-size: 20px;
        color: #333;
    }

    .book-card p {
        margin: 5px 0;
        font-size: 14px;
        color: #555;
    }

    .text-muted {
        font-size: 12px;
        color: #888;
    }

    .submit-btn {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }

    .submit-btn:hover {
        background-color: #45a049;
    }
</style>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rejec\Desktop\LibraryRegistrationSystem\resources\views/home.blade.php ENDPATH**/ ?>