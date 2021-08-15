<?php

require_once "config/db_connect.php";

$email = $title = $ingredients = '';
$errors = ['email' => '', 'title' => '', 'ingredients'  => ''];

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $title = $_POST['title'];
    $ingredients = $_POST['ingredients'];

    if (empty($email)) {
        $errors['email'] = "An email is required";
    } else {
        $email;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email must be valid";
        }
    }

    if (empty($title)) {
        $errors['title'] = "A title is required";
    } else {
        $title;
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['title'] = "Title must contain numbers and letters only";
        }
    }

    if (empty($ingredients)) {
        $errors['ingredients'] = "Enter some ingredients";
    } else {
        $ingredients;
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            $errors['ingredients'] = "Ingredients must be comma separated";
        }
    }

    if (array_filter($errors)) {
        //returns user to thesame page
    } else {
        $sql = "INSERT INTO pizza (title, ingredients, email) VALUES ('$title', '$ingredients', '$email')";
        if(mysqli_query($conn, $sql)) {
            header('Location: index.php');
        } else {
            echo mysqli_error($conn);
        }
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include "templets/header.php"; ?>

<section class="container grey-text">
    <h4 class="center">Add New Pizza</h4>

    <form action="" method="POST" class="white">
        <div>
            <label for="email">Fill in your email address</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="red-text">
            <?php echo $errors['email']; ?>
        </div>

        <div>
            <label for="pizza">Fill in a pizza type</label>
            <input type="text" name="title" value="<?php echo $title; ?>">
        </div>
        <div class="red-text">
            <?php echo $errors['title']; ?>
        </div>

        <div>
            <label for="pizza">Fill in pizza ingredients(comma separated)</label>
            <input type="text" name="ingredients" value="<?php echo $ingredients; ?>">
        </div>
        <div class="red-text">
            <?php echo $errors['ingredients']; ?>
        </div>

        <div class="center">
            <input type="submit" name="submit" value="add pizza" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<?php include "templets/footer.php"; ?>

</html>