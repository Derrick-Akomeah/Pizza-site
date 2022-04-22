<?php 

    include('config/db_connect.php');

    if(isset($_POST['delete'])){
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

        $sql = "DELETE FROM pizza WHERE id = $id_to_delete";

        if(mysqli_query($conn, $sql)){
            //success
            header('Location: index.php');
        }else{
            // failure
            echo 'query error: ' . mysqli_error($conn);
        }
    }
    
    //Check GET request id parameter
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        //make sql
        $sql = "SELECT * FROM pizza WHERE id = $id";

        //get query results
        $results = mysqli_query($conn, $sql);

        //fetch reults in array format
        $pizza = mysqli_fetch_assoc($results);

        mysqli_free_result($results);
        mysqli_close($conn);
    }

?>


<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php') ?>

    <div class="container center grey-text">
        <?php if($pizza): ?>

            <h4><?php echo htmlspecialchars($pizza['title']);  ?></h4>
            <p>Created by: <?php  echo htmlspecialchars($pizza['email']); ?></p>
            <p><?php echo htmlspecialchars($pizza['created_at']); ?></p>
            <h5>Ingredients</h5>
            <p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>

            <!-- DELETE FORM -->
            <form action="details.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo htmlspecialchars($pizza['id']); ?>">
                <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
            </form>

        <?php else:   ?>
            <h5>No such pizza exists!</h5>
        <?php endif;   ?>    
    </div>

    <?php include('templates/footer.php') ?>


</html>