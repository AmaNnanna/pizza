<?php
require_once "config/db_connect.php";

//write query to database
$sql = 'SELECT title, ingredients, id FROM pizza ORDER BY created_at';

//get query result from database
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<?php include "templets/header.php"; ?>

<h4 class="center z-depth">Pizzas</h4>

<div class="container" style="min-height: 830px; padding: 15px auto; box-sizing: border-box;">
    <div class="row">

        <?php foreach ($pizzas as $pizza) : ?>

            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content">
                        <div class="center">
                            <h6><?php echo ($pizza['title']); ?></h6>
                        </div>
                        <ul>
                            <?php foreach (explode(',', $pizza['ingredients']) as $ingrideint) : ?>
                                <li><?php echo $ingrideint; ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>

                    <div class="card-action">
                        <div class="right-align">
                            <a href="detials.php?id=<?php echo $pizza['id'] ?>" class="brand-text">More Info</a>
                        </div>
                        <div class="left-align" style="margin-top: -20px;">
                            <a href="delete.php" class="brand-text">Delete Pizza</a>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach ?>

    </div>
</div>

<?php include "templets/footer.php"; ?>

</html>