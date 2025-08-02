<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Users Management</h2>
            <div class="header-actions">
                <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New User
                </a>
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </div>
        <div class="card-body">
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->username); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td>
                                    <span class="badge <?php echo e($user->is_admin ? 'bg-primary' : 'bg-secondary'); ?>">
                                        <?php echo e($user->is_admin ? 'Admin' : 'User'); ?>

                                    </span>
                                </td>
                                <td>
                                    <form action="<?php echo e(route('admin.users.destroy', $user->id)); ?>" 
                                          method="POST" 
                                          onsubmit="return confirm('Are you sure you want to delete this user?');"
                                          style="display: inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
.container {
    padding: 20px;
}

.card {
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    border: none;
    border-radius: 10px;
}

.card-header {
    background-color: #fff;
    border-bottom: 1px solid #eee;
    padding: 1.5rem;
}

.card-header h2 {
    margin: 0;
    color: #333;
}

.card-body {
    padding: 1.5rem;
}

.header-actions {
    display: flex;
    gap: 10px;
    align-items: center;
}

.table {
    margin-bottom: 0;
}

.table th {
    border-top: none;
    background-color: #f8f9fa;
    color: #555;
}

.table td {
    vertical-align: middle;
}

.badge {
    padding: 0.5em 0.75em;
    font-weight: 500;
}

.btn {
    padding: 0.375rem 0.75rem;
    border-radius: 5px;
    transition: all 0.2s;
}

.btn-primary {
    background-color: #4a90e2;
    border-color: #4a90e2;
}

.btn-primary:hover {
    background-color: #357abd;
    border-color: #357abd;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
    color: white;
}

.btn-secondary:hover {
    background-color: #5a6268;
    border-color: #545b62;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
}

.btn-danger:hover {
    background-color: #c82333;
    border-color: #bd2130;
}

.alert {
    border-radius: 5px;
    margin-bottom: 1rem;
}

.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
}
</style>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SONG\Desktop\LibraryRegistrationSystem\resources\views/admin/users/index.blade.php ENDPATH**/ ?>