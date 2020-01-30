				</div>
				<div id="footer" class="row">
					<div id="footnote" class="col-12">
						<?php
							if(!isset($_SESSION['gebruiker'])){
								echo'<p><a class="sneakylink" href="login.php">&copy;</a>Groep B periode 2</p>';
							}else{
								echo'<p><a class="btn mark-btn submit" id="mrg0" href="logout.php">Log uit</a> &copy;Groep B periode 2</p>';
							}
						?>

						
					</div>
				</div>
			</div>
		</div>
	</body>
	<!--gemaakt door Twan en Storm-->
</html>