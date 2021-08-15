<?php

include "config/db_connect.php";

//delete form handling
if (isset($_POST['delete'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    //create sql
    $sql = "DELETE FROM pizza WHERE id = $id_to_delete";

    if(mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        echo mysqli_error($conn);
    }
}

//check GET request id parameter
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    //make sql
    $sql = "SELECT * FROM pizza WHERE id = $id";

    // get query result
    $result = mysqli_query($conn, $sql);

    //fetch results in an array
    $pizza = mysqli_fetch_assoc($result);

    //free result
    mysqli_free_result($result);

    //close connection
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include "templets/header.php"; ?>

<div class="container center white" style="min-height: 830px; padding: 15px auto; box-sizing: border-box;">
    <?php if ($pizza) : ?>
        <h5><?php echo $pizza['title'] ?></h5>
        <p>This pizza was created by: <?php echo $pizza['email'] ?></p>
        <p>It was created on: <?php echo date($pizza['created_at']) ?></p>
        <h5><u>The Ingredients</u></h5>
        <p><?php echo $pizza['ingredients'] ?></p>

        <!-- delete form -->
        <form action="" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
            <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
        </form>

    <?php else : ?>
        <h5><?php echo "This Pizza is yet to be created"; ?></h5>
    <?php endif ?>
</div>

<?php include "templets/footer.php"; ?>

</html>