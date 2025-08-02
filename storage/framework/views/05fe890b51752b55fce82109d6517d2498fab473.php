

<?php $__env->startSection('content'); ?>
<div class="auth-form-wrapper">
    <h1>Search Books</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

            <button type="button" class="close-btn" onclick="this.parentElement.style.display='none';">&times;</button>
        </div>
    <?php endif; ?>

    <div class="search-card">
        <form action="<?php echo e(route('books.search')); ?>" method="GET" class="search-form">
            <div class="form-group">
                <input type="text" name="query" placeholder="Search for a book..." value="<?php echo e(old('query', $query ?? '')); ?>" class="search-input">
                <button type="submit" class="search-btn">Search</button>
            </div>
        </form>

        <?php if(isset($books) && $books->count()): ?>
            <div class="search-results">
                <h3>Search Results</h3>
                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="book-card">
                        <div class="book-info">
                            <h4><?php echo e($book->title); ?></h4>
                            <p><strong>Author:</strong> <?php echo e($book->author_name); ?></p>
                            <p><strong>Publisher:</strong> <?php echo e($book->publisher); ?></p>
                            <p><strong>Year:</strong> <?php echo e($book->year_published); ?></p>
                            <p><strong>Stock:</strong> <?php echo e($book->stock); ?></p>
                        </div>
                        
                        <?php if(auth()->guard()->check()): ?>
                            <?php if($book->stock > 0): ?>
                                <div class="book-actions">
                                    <form action="<?php echo e(route('books.rent', $book->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="submit-btn">Rent Book</button>
                                    </form>
                                </div>
                            <?php else: ?>
                                <div class="book-actions">
                                    <span class="out-of-stock">Out of Stock</span>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php elseif(request()->has('query')): ?>
            <div class="no-results">
                <p>No books found matching your search criteria.</p>
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

    .search-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        padding: 20px;
        margin-bottom: 20px;
    }

    .search-form {
        margin-bottom: 20px;
    }

    .form-group {
        display: flex;
        margin-bottom: 15px;
    }

    .search-input {
        flex: 1;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
    }

    .search-btn {
        padding: 10px 15px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        margin-left: 10px;
    }

    .search-btn:hover {
        background-color: #45a049;
    }

    .search-results h3 {
        margin-top: 0;
        margin-bottom: 15px;
        font-size: 20px;
        color: #333;
    }

    .book-card {
        background: #f9f9f9;
        padding: 15px;
        border-radius: 6px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        margin-bottom: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .book-info {
        flex: 1;
    }

    .book-info h4 {
        margin-top: 0;
        margin-bottom: 10px;
        font-size: 18px;
        color: #333;
    }

    .book-info p {
        margin: 5px 0;
        font-size: 14px;
        color: #555;
    }

    .book-actions {
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

    .out-of-stock {
        padding: 8px 15px;
        background-color: #f44336;
        color: white;
        border-radius: 4px;
        font-size: 14px;
    }

    .no-results {
        text-align: center;
        color: #666;
        font-style: italic;
        margin-top: 20px;
        padding: 20px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SONG\Desktop\LibraryRegistrationSystem\resources\views/books/search.blade.php ENDPATH**/ ?>