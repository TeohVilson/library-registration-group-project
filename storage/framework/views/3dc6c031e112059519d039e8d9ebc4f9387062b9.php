<!-- resources/views/loans/index.blade.php -->

<h1>Loan List</h1>

<table class="styled-table">
    <thead>
        <tr>
            <th>User</th>
            <th>Book</th>
            <th>Loan Date</th>
            <th>Due Date</th>
            <th>Return Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loan->user->name); ?></td>
                <td><?php echo e($loan->book->title); ?></td>
                <td><?php echo e($loan->loan_date->format('Y-m-d')); ?></td>
                <td><?php echo e($loan->due_date->format('Y-m-d')); ?></td>
                <td>
                    <?php if($loan->return_date): ?>
                        <?php echo e($loan->return_date->format('Y-m-d')); ?>

                    <?php else: ?>
                        Not Returned
                    <?php endif; ?>
                </td>
                <td><?php echo e(ucfirst($loan->status)); ?></td>
                <td>
                    <form action="<?php echo e(route('loans.update', $loan->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <select name="status" class="form-control">
                            <option value="borrowed" <?php echo e($loan->status == 'borrowed' ? 'selected' : ''); ?>>Borrowed</option>
                            <option value="returned" <?php echo e($loan->status == 'returned' ? 'selected' : ''); ?>>Returned</option>
                            <option value="overdue" <?php echo e($loan->status == 'overdue' ? 'selected' : ''); ?>>Overdue</option>
                        </select>
                        <button type="submit" class="update-btn">Update</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<style>
    /* Table Styling */
    .styled-table {
        width: 100%;
        border-collapse: collapse;
        margin: 25px 0;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        font-family: 'Arial', sans-serif;
    }

    .styled-table th, .styled-table td {
        padding: 15px;
        text-align: left;
        border: 1px solid #ddd;
    }

    .styled-table th {
        background-color: #4CAF50;
        color: white;
        text-transform: uppercase;
        font-size: 14px;
    }

    .styled-table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .styled-table tbody tr:hover {
        background-color: #f1f1f1;
        cursor: pointer;
    }

    .styled-table td {
        font-size: 14px;
    }

    /* Button Styling */
    .update-btn {
        padding: 6px 12px;
        background-color: #17a2b8;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s;
    }

    .update-btn:hover {
        background-color: #138496;
    }

    .status-select {
        padding: 6px 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
        margin-right: 10px;
    }

    .status-select:focus {
        outline: none;
        border-color: #4CAF50;
    }

    /* Header Styling */
    h1 {
        text-align: center;
        font-size: 36px;
        margin-bottom: 30px;
        color: #333;
    }
</style>
<?php /**PATH C:\Users\rejec\Desktop\LibraryRegistrationSystem\resources\views/loans/index.blade.php ENDPATH**/ ?>