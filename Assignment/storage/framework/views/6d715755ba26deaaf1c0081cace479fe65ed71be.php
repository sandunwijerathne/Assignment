<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/css/my.css">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid ">
    <a class="navbar-brand" href="/home">Swivel Group</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/book">Add New Book</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/logout" tabindex="-1" aria-disabled="true">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="container mt-5">
        <div class="row">
            <div class="mx-auto">
                <form method="POST" action="/postupdate" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?> <!-- <?php echo e(csrf_field()); ?> -->
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="post_title">Book Title</label>
                            <input type="text" required class="form-control" name="post_id" id="post_title" aria-describedby="post_title" hidden value="<?php echo e($getpost[0]->ID); ?>">
                            <input type="text" required class="form-control" name="post_title" id="post_title" aria-describedby="post_title" value="<?php echo e($getpost[0]->post_title); ?>">
                        </div>
                        <div class="col-sm-6">
                            <label for="post_title">Book Image</label>
                            <input type="file" required class="form-control" name="post_image" id="post_image" aria-describedby="post_title" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="post_title">Book Author</label>
                            <input type="text" required class="form-control" name="post_author" id="post_title" aria-describedby="post_title" value="<?php echo e($getpostauthor[0]->meta_value); ?>">
                        </div>

                        <div class="col-sm-6">
                            <label for="post_title">Publisher</label>
                            <input type="text" required class="form-control" name="post_publisher" id="post_title" aria-describedby="post_title" value="<?php echo e($getpostpublisher[0]->meta_value); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="post_title">Book Publication Year</label>
                            <input type="text" required class="form-control" name="post_year_of_publication" id="post_title" aria-describedby="post_title" value="<?php echo e($getpostyear[0]->meta_value); ?>">
                        </div>
                        <div class="col-sm-6">
                            <label for="post_title">Book Category</label>
                            <select name="post_categories" class="form-control" id="post_categories">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($cate->term_id == $getcatgory[0]->term_taxonomy_id): ?>
                                <option value="<?php echo e($cate->term_id); ?>" selected><?php echo e($cate->name); ?></option>
                                <?php else: ?>
                                <option value="<?php echo e($cate->term_id); ?>"><?php echo e($cate->name); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="post_content">Post Content</label>
                            <textarea type="text" required name="post_content" class="form-control" id="post_content" rows="5" cols="500"><?php echo e($getpost[0]->post_content); ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button id="submit_post" type="submit" class="btn btn-primary">Publish Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\Assignment\resources\views/bookupdate.blade.php ENDPATH**/ ?>