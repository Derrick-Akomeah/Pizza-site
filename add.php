<?php 
    $title = $email = $ingredients = '';
    $errors = array('email'=>'', 'title'=>'', 'ingredients'=>'');

    if(isset($_POST['submit'])){
        //check email
        if(empty($_POST['email'])){
            $errors['email'] =  'An email is required <br />';
        } else{
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Email must be a valid email address';
            }
        }

        //check title
        if(empty($_POST['title'])){
			$errors['title'] ='A title is required <br />';
		} else{
			$title = $_POST['title'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
				$errors['title'] = 'Title must be letters and spaces only';
			}
		}

        //check ingredients
        if(empty($_POST['ingredients'])){
            $errors['ingredients'] = 'An ingredient is required <br />';
        } else{
			$ingredients = $_POST['ingredients'];
			if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
				$errors['ingredients'] = 'Ingredients must be a comma separated list';
			}
		}

        //End of POST check

        if(!array_filter($errors)){

            header('Location: index.php'); //If info is valid redirect to index.php
        } 
    }

?>



<!DOCTYPE html>
<html lang="en">
   <?php include('templates/header.php') ?>

    <section class="container grey-text">
        <h4 class="center"> Add a Pizza</h4>
        <form class="white" action="add.php" method="POST">
            <label for="">Your Email:</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
            <div class="red-text"> <?php echo $errors['email']; ?> </div><br>
            <label for="">Pizza Title:</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
            <div class="red-text"> <?php echo $errors['title']; ?> </div><br>
            <label for="">Ingredients (comma separated):</label>
            <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
            <div class="red-text"> <?php echo $errors['ingredients']; ?> </div><br>
            <div class="center">
                <input type="submit" name="submit" value="submit" class=" btn z-depth brand">
            </div>
        </form>
    </section>

   <?php include('templates/footer.php') ?>

</html>