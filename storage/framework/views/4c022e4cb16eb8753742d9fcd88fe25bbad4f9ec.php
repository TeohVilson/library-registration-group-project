

<?php $__env->startSection('content'); ?>
<div class="auth-form-wrapper">
    <h1>Library Admin Dashboard – Welcome, <?php echo e(Auth::guard('admin')->user()->name); ?></h1>

    <h5 class="mb-3">You're logged in with <strong>Admin</strong> privileges.</h5>

    
    <div class="admin-buttons">
        <a href="<?php echo e(route('admin.books.create')); ?>" class="btn-custom btn-primary-custom">Add New Book</a>
        <a href="<?php echo e(route('admin.loans.index')); ?>" class="btn-custom btn-secondary-custom">View All Loans</a>
        <a href="<?php echo e(route('admin.users.index')); ?>" class="btn-custom btn-info-custom">Manage Users</a>
    </div>

    
    <h4 class="mt-4">All Books:</h4>

    <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="book-card">
            <h5><?php echo e($book->title); ?></h5>
            <p><strong>Author:</strong> <?php echo e($book->author); ?></p>
            <p><strong>Category:</strong> <?php echo e($book->category); ?></p>
            <p><strong>ISBN:</strong> <?php echo e($book->isbn); ?></p>

            <div class="action-buttons">
                <a href="<?php echo e(route('admin.books.edit', $book->id)); ?>" class="btn-custom btn-warning-custom">Edit</a>

                <form action="<?php echo e(route('admin.books.delete', $book->id)); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn-custom btn-danger-custom" onclick="return confirm('Delete this book?')">Delete</button>
                </form>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p>No books available in the library.</p>
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

    .admin-buttons {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 20px;
        justify-content: center;
    }

    .btn-custom {
        padding: 10px 20px;
        font-size: 14px;
        text-decoration: none;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        color: white;
        display: inline-block;
        text-align: center;
    }

    .btn-primary-custom {
        background-color: #4CAF50;
    }

    .btn-secondary-custom {
        background-color: #6c757d;
    }

    .btn-info-custom {
        background-color: #17a2b8;
    }

    .btn-warning-custom {
        background-color: #ffc107;
        color: #212529;
    }

    .btn-danger-custom {
        background-color: #dc3545;
    }

    .btn-custom:hover {
        opacity: 0.9;
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

    .action-buttons {
        margin-top: 10px;
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    p {
        font-size: 14px;
        color: #666;
    }
</style>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rejec\Desktop\LibraryRegistrationSystem\resources\views/admin.blade.php ENDPATH**/ ?>