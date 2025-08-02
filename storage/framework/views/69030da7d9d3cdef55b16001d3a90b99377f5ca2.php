<!-- resources/views/loans/index.blade.php -->



<?php $__env->startSection('content'); ?>
<div class="auth-form-wrapper">
    <h1>My Loans</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

            <button type="button" class="close-btn" onclick="this.parentElement.style.display='none';">&times;</button>
        </div>
    <?php endif; ?>

    <div class="loans-card">
        <?php if($loans->count() > 0): ?>
            <div class="loans-list">
                <?php $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="loan-card">
                        <div class="loan-info">
                            <h4><?php echo e($loan->book->title); ?></h4>
                            <p><strong>Author:</strong> <?php echo e($loan->book->author_name); ?></p>
                            <p><strong>Loan Date:</strong> <?php echo e($loan->loan_date->format('M d, Y')); ?></p>
                            <p><strong>Due Date:</strong> <?php echo e($loan->due_date->format('M d, Y')); ?></p>
                            <p><strong>Status:</strong> 
                                <?php if($loan->status == 'borrowed'): ?>
                                    <span class="status-badge status-borrowed">Awaiting Return</span>
                                <?php elseif($loan->status == 'returned'): ?>
                                    <span class="status-badge status-returned">Returned on <?php echo e($loan->return_date->format('M d, Y')); ?></span>
                                <?php else: ?>
                                    <span class="status-badge status-overdue">Overdue</span>
                                <?php endif; ?>
                            </p>
                        </div>
                        
                        <div class="loan-actions">
                            <?php if($loan->status == 'borrowed'): ?>
                                <form action="<?php echo e(route('loans.update', $loan->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <input type="hidden" name="status" value="returned">
                                    <button type="submit" class="submit-btn">Return Book</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="no-loans">
                <p>You don't have any loans at the moment.</p>
                <a href="<?php echo e(route('books.search')); ?>" class="browse-btn">Browse Books</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<style>
    .auth-form-wrapper {
        width: 60%;
        margin: 20px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    h1 {
        text-align: center;
        font-size: 32px;
        margin-bottom: 30px;
        color: #333;
    }

    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 4px;
        position: relative;
        animation: fadeIn 0.5s ease-in-out;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .close-btn {
        position: absolute;
        right: 10px;
        top: 10px;
        background: none;
        border: none;
        font-size: 20px;
        cursor: pointer;
        color: #155724;
    }

    @keyframes  fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .loans-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        padding: 20px;
        margin-bottom: 20px;
    }

    .loans-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .loan-card {
        background: #f9f9f9;
        padding: 15px;
        border-radius: 6px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .loan-info {
        flex: 1;
    }

    .loan-info h4 {
        margin-top: 0;
        margin-bottom: 10px;
        font-size: 18px;
        color: #333;
    }

    .loan-info p {
        margin: 5px 0;
        font-size: 14px;
        color: #555;
    }

    .loan-actions {
        margin-left: 15px;
    }

    .submit-btn {
        padding: 8px 15px;
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

    .status-badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: bold;
    }

    .status-borrowed {
        background-color: #cce5ff;
        color: #004085;
    }

    .status-returned {
        background-color: #d4edda;
        color: #155724;
    }

    .status-overdue {
        background-color: #f8d7da;
        color: #721c24;
    }

    .returned-badge, .overdue-badge {
        padding: 8px 15px;
        border-radius: 4px;
        font-size: 14px;
        font-weight: bold;
    }

    .returned-badge {
        background-color: #d4edda;
        color: #155724;
    }

    .overdue-badge {
        background-color: #f8d7da;
        color: #721c24;
    }

    .no-loans {
        text-align: center;
        padding: 30px;
        color: #666;
    }

    .browse-btn {
        display: inline-block;
        margin-top: 15px;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 16px;
    }

    .browse-btn:hover {
        background-color: #45a049;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SONG\Desktop\LibraryRegistrationSystem\resources\views/loans/index.blade.php ENDPATH**/ ?>