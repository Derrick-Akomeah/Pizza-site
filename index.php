<?php 

   //Connect to database
   $conn = mysqli_connect('localhost', 'Derrick', 'admin', 'derrick_pizza' );

   //check connection
   if(!$conn){
      echo 'Connection error: ' . mysqli_connect_error();
   }

   //Queries
   $sql = 'SELECT title, ingredients, id FROM pizza ORDER BY created_at';

   //make queries and get results
   $result = mysqli_query($conn,$sql);

   //Fetch rows as an array
   $pizza = mysqli_fetch_all($result, MYSQLI_ASSOC);

   //Free from memory
   mysqli_free_result($result);

   //close connection
   mysqli_close($conn);

?>



<!DOCTYPE html>
<html lang="en">
   <?php include('templates/header.php') ?>

    <h4 class="center grey-text"> Pizzas! </h4>
    <div class="container">
   <div class="row">
      <?php foreach($pizza as $pizzas){?>

         <div class="col s6 md3">
            <div class="card z-depth">
               <div class="card-content center">
                  <h6><?php echo htmlspecialchars($pizzas['title']) ?></h6>
                  <div><?php echo htmlspecialchars($pizzas['ingredients']) ?></div>
               </div>
                  <div class="card-action right-align">
                     <a href="#" class="brand-text">more info</a>
                  </div>
            </div>
         </div>

      <?php } ?>
   </div>
    </div>

   <?php include('templates/footer.php') ?>

</html>