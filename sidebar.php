<?php $categories = get_categories_name(); ?>
<div class="col-md-3">
    <aside>
        <?php foreach( $categories as $category ) : ?>
            <h4><a href="category.php?id=<?php echo $category['id']; ?>"><?php echo $category['category']; ?></a></h4>
        <?php endforeach; ?>
        <hr>
        <?php include 'searchform.php'; ?>
        <?php if ( ! empty( $_SESSION['user_name'] ) ) : ?>
            <hr>
            <h4>Current user: <?php echo $_SESSION['user_name']; ?> </h4>
        <?php endif; ?>
    </aside>
</div>