<?php 

   include('config/db_connect.php');

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

   //explode(',', $pizza[0]['ingredients']);

?>



<!DOCTYPE html>
<html lang="en">
   <?php include('templates/header.php') ?>

      <h4 class="center grey-text"> Pizzas! </h4>
      <div class="container">
   <div class="row">
      <?php foreach($pizza as $pizzas):?>

         <div class="col s6 md3">
            <div class="card z-depth">
               <img src="img/pizza.svg" class="pizza" alt="">
               <div class="card-content center">

                  <h6><?php echo htmlspecialchars($pizzas['title']) ?></h6>
                  <ul>
                     <?php foreach(explode(',', $pizzas['ingredients']) as $ing): ?>
                        <li> <?php echo htmlspecialchars($ing) ?> </li>
                     <?php endforeach; ?>   
                  </ul>

               </div>
                  <div class="card-action right-align">
                     <a href="details.php?id=<?php echo $pizzas['id'] ?>" class="brand-text">more info</a>
                  </div>
            </div>
         </div>

      <?php endforeach; ?>
   </div>
   </div>

   <?php include('templates/footer.php') ?>

</html>