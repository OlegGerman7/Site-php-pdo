<?php include 'header.php'; ?>

    <div class="row">
        <?php $data_film = get_film_data( $_GET['id'] ); ?>
        <?php include 'count-views.php'; ?>
        <div class="col-md-9">
            <div class="article">
                <h2><?php echo $data_film['title'];?></h2>
                <img src="<?php echo $data_film['image']; ?>">
                <p>
                    <?php echo $data_film['text']; ?>
                </p>

                <div class="film-data d-flex justify-content-around">
                    <div class="views">
                        <i class="fa fa-eye" aria-hidden="true"></i> <?php echo $data_film['views'] + 1; ?>
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
        </div>
        <?php include 'sidebar.php'; ?>
    </div>
<?php include 'footer.php'; ?>

       