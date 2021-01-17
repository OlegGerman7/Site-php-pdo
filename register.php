<?php session_start();

if ( isset ( $_SESSION['user'] ) ) :
  if ( $_SESSION['user'] == true ) :
    header('Location: index.php');
  endif;
endif;

include 'header.php';

if ( ! empty( $_POST['name'] ) && ! empty( $_POST['email'] ) ) :
    $stmt = $dbh->query('SELECT name, email FROM users');
    foreach ($stmt as $row) :
        if ( $_POST['name'] == $row['name'] && $_POST['email'] == $row['email'] ) :
            $flag = false;
            $message = 'incorrect data';
            break;
        endif;
    endforeach;

    if ( ! isset( $flag ) ) :
        $stmt = $dbh->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);

        $name = $_POST['name'];
        $email = $_POST['email'];
        $stmt->execute();
        $_SESSION['user'] = true;
        $_SESSION['user_name'] = $_POST['name'];
        $_SESSION['user_email'] = $_POST['email'];

        header('Location: index.php');
    endif;

    unset ( $_POST['name'] );
    unset ( $_POST['email'] );
endif; ?>

<div class="row">
    <div class="col-md-4 offset-md-4">
        <div class="register">
            <h5>Registration: </h5>
            <form name="register" method="post" action="">
                <input name="name" type="text" class="form-control" placeholder="Enter name">
                <br>
                <input name="email" type="email" class="form-control" placeholder="Enter email">
                <button type="submit" class="btn btn-success btn-sm">Submit</button>
                <div class="clearfix"></div>
            </form>
            <?php if ( isset ( $message ) ) : ?>
                <h5 class="error"><?php echo $message; ?></h5>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>