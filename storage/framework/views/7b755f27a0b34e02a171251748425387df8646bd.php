<h1> Create Book </h1>
<form action="<?php echo e(route('admin.books.store')); ?>" method="POST" class="create-book-form">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="title">Book Title:</label>
        <input type="text" name="title" value="<?php echo e(old('title')); ?>" placeholder="Book Title" required>
    </div>
    
    <div class="form-group">
        <label for="author_name">Author Name:</label>
        <input type="text" name="author_name" value="<?php echo e(old('author_name')); ?>" placeholder="Author Name" required>
    </div>
    
    <div class="form-group">
        <label for="publisher">Publisher:</label>
        <input type="text" name="publisher" value="<?php echo e(old('publisher')); ?>" placeholder="Publisher" required>
    </div>
    
    <div class="form-group">
        <label for="year_published">Year Published:</label>
        <input type="number" name="year_published" value="<?php echo e(old('year_published')); ?>" placeholder="Year Published" required>
    </div>
    
    <div class="form-group">
        <label for="stock">Stock:</label>
        <input type="number" name="stock" value="<?php echo e(old('stock')); ?>" placeholder="Stock" required>
    </div>

    <button type="submit" class="submit-btn">Add Book</button>
</form>

<style>
    .create-book-form {
        width: 50%;
        margin: 20px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .create-book-form .form-group {
        margin-bottom: 15px;
    }

    .create-book-form label {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    .create-book-form input {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .create-book-form input:focus {
        border-color: #4CAF50;
        outline: none;
    }

    .submit-btn {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
        margin-top: 10px;
    }

    .submit-btn:hover {
        background-color: #45a049;
    }

    h1 {
        text-align: center;
        font-size: 32px;
        margin-bottom: 20px;
        color: #333;
    }
</style>
<?php /**PATH C:\Users\rejec\Desktop\LibraryRegistrationSystem\resources\views/books/create.blade.php ENDPATH**/ ?>