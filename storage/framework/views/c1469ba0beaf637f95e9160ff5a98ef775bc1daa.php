<h1>User List</h1>

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
                <form action="<?php echo e(route('admin.users.delete', $user->id)); ?>" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="delete-btn">Delete</button>
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
    h1 {
        text-align: center;
        font-size: 36px;
        margin-bottom: 30px;
        color: #333;
    }
</style>
<?php /**PATH C:\Users\rejec\Desktop\LibraryRegistrationSystem\resources\views/users/index.blade.php ENDPATH**/ ?>