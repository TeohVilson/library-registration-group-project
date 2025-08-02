<h1>Book List</h1>

<div class="button-container">
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="back-btn">Back to Dashboard</a>
    <a href="<?php echo e(route('admin.books.create')); ?>" class="create-btn">Create New Book</a>
</div>

<table class="styled-table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Year Published</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($book->title); ?></td>
            <td><?php echo e($book->author_name); ?></td>
            <td><?php echo e($book->publisher); ?></td>
            <td><?php echo e($book->year_published); ?></td>
            <td><?php echo e($book->stock); ?></td>
            <td>
                <!-- Edit button -->
                <a href="<?php echo e(route('admin.books.edit', $book->id)); ?>" class="edit-btn">Edit</a>

                <!-- Delete button -->
                <form action="<?php echo e(route('admin.books.destroy', $book->id)); ?>" method="POST" style="display:inline;">
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
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
    }

    .styled-table th, .styled-table td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    .styled-table th {
        background-color: #4CAF50;
        color: white;
        text-transform: uppercase;
    }

    .styled-table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .styled-table tbody tr:hover {
        background-color: #ddd;
    }

    /* Button Styling */
    .edit-btn {
        padding: 6px 12px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        font-size: 14px;
    }

    .edit-btn:hover {
        background-color: #45a049;
    }

    .delete-btn {
        padding: 6px 12px;
        background-color: red;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }

    .delete-btn:hover {
        background-color: darkred;
    }

    h1 {
        text-align: center;
        font-size: 32px;
        margin-bottom: 20px;
        color: #333;
    }

    /* Button Container */
    .button-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
        padding: 0 20px;
    }

    /* Create Button Styling */
    .create-btn {
        padding: 10px 20px;
        background-color: #45a049;
        color: white;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
    }

    .create-btn:hover {
        background-color: #3d8b40;
    }

    /* Back Button Styling */
    .back-btn {
        padding: 10px 20px;
        background-color: #6c757d;
        color: white;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
    }

    .back-btn:hover {
        background-color: #5a6268;
    }
</style>
<?php /**PATH C:\Users\SONG\Desktop\LibraryRegistrationSystem\resources\views/books/index.blade.php ENDPATH**/ ?>