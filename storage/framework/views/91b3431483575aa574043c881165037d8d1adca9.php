

<?php $__env->startSection('content'); ?>
<div class="auth-form-wrapper">
    <h1>My Profile</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

            <button type="button" class="close-btn" onclick="this.parentElement.style.display='none';">&times;</button>
        </div>
    <?php endif; ?>

    <div class="profile-card">
        <div class="profile-header">
            <h2><?php echo e(Auth::user()->name); ?></h2>
            <p class="account-type"><?php echo e(Auth::user()->is_admin ? 'Administrator' : 'Library Member'); ?></p>
        </div>

        <div class="profile-info">
            <div class="info-group">
                <label>Username</label>
                <p><?php echo e(Auth::user()->username); ?></p>
            </div>

            <div class="info-group">
                <label>Email</label>
                <p><?php echo e(Auth::user()->email); ?></p>
            </div>

            <div class="info-group">
                <label>Member Since</label>
                <p><?php echo e(Auth::user()->created_at->format('M d, Y')); ?></p>
            </div>
        </div>

        <div class="profile-stats">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-book-reader"></i>
                </div>
                <div class="stat-info">
                    <h3>Active Loans</h3>
                    <p><?php echo e(Auth::user()->getLoans()->where('status', 'borrowed')->count()); ?></p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-history"></i>
                </div>
                <div class="stat-info">
                    <h3>Total Loans</h3>
                    <p><?php echo e(Auth::user()->getLoans()->count()); ?></p>
                </div>
            </div>
        </div>

        <div class="profile-actions">
            <a href="<?php echo e(route('home')); ?>" class="action-btn">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>
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

    .profile-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        padding: 30px;
        margin-bottom: 20px;
    }

    .profile-header {
        text-align: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }

    .profile-header h2 {
        margin: 0;
        color: #333;
        font-size: 24px;
    }

    .account-type {
        margin: 10px 0 0;
        color: #666;
        font-size: 16px;
    }

    .profile-info {
        margin-bottom: 30px;
    }

    .info-group {
        margin-bottom: 20px;
    }

    .info-group label {
        display: block;
        font-size: 14px;
        color: #666;
        margin-bottom: 5px;
    }

    .info-group p {
        margin: 0;
        font-size: 16px;
        color: #333;
    }

    .profile-stats {
        display: flex;
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        flex: 1;
        background: #f9f9f9;
        padding: 20px;
        border-radius: 6px;
        display: flex;
        align-items: center;
    }

    .stat-icon {
        width: 40px;
        height: 40px;
        background-color: #4CAF50;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
    }

    .stat-icon i {
        font-size: 20px;
        color: white;
    }

    .stat-info h3 {
        margin: 0 0 5px 0;
        font-size: 14px;
        color: #666;
    }

    .stat-info p {
        margin: 0;
        font-size: 24px;
        color: #333;
        font-weight: bold;
    }

    .profile-actions {
        text-align: center;
    }

    .action-btn {
        display: inline-flex;
        align-items: center;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 16px;
        transition: background-color 0.3s;
    }

    .action-btn i {
        margin-right: 8px;
    }

    .action-btn:hover {
        background-color: #45a049;
    }
</style>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SONG\Desktop\LibraryRegistrationSystem\resources\views/users/profile.blade.php ENDPATH**/ ?>