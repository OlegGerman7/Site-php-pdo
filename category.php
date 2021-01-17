<?php include 'header.php';
    $data_films = get_films_by_category( $_GET['id'] );
?>
    <div class="row">
        <?php if ( $data_films ) : ?>
            <div class="col-md-9">
                <?php foreach( $data_films as $data_film ){ ?>
                    <div class="article">
                        <img src="<?php echo $data_film['image'];?>" >
                        <p>
                            <?php echo $data_film['excerpt']; ?>
                        </p>
                        <a href="single.php?id=<?php echo $data_film['id']; ?>" class="btn btn-success btn-sm">Read more</a>
                        <div class="film-data d-flex justify-content-around">
                            <div class="views">
                                <i class="fa fa-eye" aria-hidden="true"></i> <?php echo $data_film['views']; ?>
                            </div>
                            <div class="category">
                                <i class="fa fa-folder-open-o" aria-hidden="true"></i>: <?php echo get_category( $data_film['id_category'] ); ?>
                            </div>
                            <div class="date">
                                <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $data_film['date']; ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
            <?php } ?>
                
            </div>
        <?php endif; ?>
        <?php include 'sidebar.php'; ?>
    </div>
    <?php include 'footer.php'?>

       