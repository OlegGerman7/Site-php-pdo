<?php
include 'header.php';
if ( ! empty( $_POST['search'] ) ) :
    $data_films = get_search_result( $_POST['search'] );
    unset( $_POST['search'] );
else: $data_films = NULL;
endif; ?>

<div class="row">
    <?php if ( $data_films ) : ?>
        <div class="col-md-9">
            <?php foreach( $data_films as $data_film ){ ?>
                <div class="article">
                    <img src="<?php echo $data_film['image'];?>" >
                    <h2><?php echo $data_film['title']; ?></h2>
                    <p>
                        <?php echo $data_film['excerpt']; ?>
                    </p>
                    <a href="single.php?id=<?php echo $data_film['id']; ?>" class="btn btn-success btn-sm">Read more</a>
                    <div class="film-data d-flex justify-content-around">
                        <div class="views">
                            <i class="fa fa-eye" aria-hidden="true"></i> <?php echo $data_film['views']; ?>
                        </div>
                        <div class="category">
                            <i class="fa fa-folder-open-o" aria-hidden="true"></i>:&ensp;<a href="category.php?id=<?php echo $data_film['id_category']; ?>" > <?php echo get_category( $data_film['id_category'] ); ?></a>
                        </div>
                        <div class="date">
                            <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $data_film['date']; ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php } ?>
        </div>
    <?php else: ?>
        <div class="col-md-9">
            <h3>No results found</h3>
        </div>
    <?php endif; ?>
    <?php include 'sidebar.php'; ?>
</div>

<?php include 'footer.php'; ?>