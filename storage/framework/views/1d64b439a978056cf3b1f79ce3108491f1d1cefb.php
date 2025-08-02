<h1> Update Book </h1>
<form action="<?php echo e(route('admin.books.update', $book->id)); ?>" method="POST" class="update-book-form">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?> <!-- This tells Laravel to treat the request as a PUT request -->

    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo e(old('title', $book->title)); ?>" required>
    </div>
    
    <div class="form-group">
        <label for="author_name">Author Name:</label>
        <input type="text" name="author_name" value="<?php echo e(old('author_name', $book->author_name)); ?>" required>
    </div>
    
    <div class="form-group">
        <label for="publisher">Publisher:</label>
        <input type="text" name="publisher" value="<?php echo e(old('publisher', $book->publisher)); ?>" required>
    </div>
    
    <div class="form-group">
        <label for="year_published">Year Published:</label>
        <input type="number" name="year_published" value="<?php echo e(old('year_published', $book->year_published)); ?>" required>
    </div>
    
    <div class="form-group">
        <label for="stock">Stock:</label>
        <input type="number" name="stock" value="<?php echo e(old('stock', $book->stock)); ?>" required>
    </div>

    <button type="submit" class="submit-btn">Update Book</button>
</form>

<style>
    .update-book-form {
        width: 50%;
        margin: 20px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .update-book-form .form-group {
        margin-bottom: 15px;
    }

    .update-book-form label {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    .update-book-form input {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .update-book-form input:focus {
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
<?php /**PATH C:\Users\SONG\Desktop\LibraryRegistrationSystem\resources\views/books/edit.blade.php ENDPATH**/ ?>