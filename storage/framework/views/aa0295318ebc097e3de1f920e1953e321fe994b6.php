

<?php $__env->startSection('content'); ?>
<div class="auth-form-wrapper">
    <div class="card">
        <div class="card-header">
            <h1>User List</h1>
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="back-button">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>

        <div class="card-body">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td><?php echo e($user->username); ?></td>
                        <td>
                            <!-- Delete button -->
                            <form action="<?php echo e(route('admin.users.destroy', $user->id)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

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
    .delete-btn {
        padding: 6px 12px;
        background-color: red;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s;
    }

    .delete-btn:hover {
        background-color: darkred;
    }

    /* Header Styling */
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
    }

    .card-header h1 {
        margin: 0;
        font-size: 24px;
        color: #333;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .back-button:hover {
        background-color: #45a049;
    }

    .back-button i {
        margin-right: 8px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SONG\Desktop\LibraryRegistrationSystem\resources\views/users/index.blade.php ENDPATH**/ ?>