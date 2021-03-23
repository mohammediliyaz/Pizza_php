<?php 

	include('config/db_connect.php');


	$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';


	$result = mysqli_query($conn, $sql);

	$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_free_result($result);

	
	mysqli_close($conn);


?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<h4 class="center grey-text">Pizzas!</h4>

	<div class="container">
		<div class="row">

			<?php foreach($pizzas as $pizza): ?>

				<div class="col s6 m4">
					<div class="card z-depth-0">
						<img src="./image/pizza.svg"class="pizza">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
							<ul class="grey-text">
								<?php foreach(explode(',', $pizza['ingredients']) as $ing): ?>
									<li><?php echo htmlspecialchars($ing); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href="details.php?id=<?php echo $pizza['id'] ?>">more info</a>
						</div>
					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>