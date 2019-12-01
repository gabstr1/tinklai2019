
<?php
    if (isset($form) && isset($session) && !$session->logged_in) {
?>  

<form action="process.php" method="POST"> 
    <div class="container my-5 py-5">
	<div class="d-flex justify-content-center h-50">
		<div class="card">
			<div class="card-header">
				<h3>Prisijungimas</h3>
			</div>
			<div class="card-body">
				<form>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
                        <!-- <input type="text" class="form-control" placeholder="Vartotojo vardas"> -->
                        <input class ="form-control" placeholder="Vartotojo vardas" name="user" type="text" value="<?php echo $form->value("user"); ?>"/>
						<?php echo $form->error("user"); ?>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
                        <!-- <input type="password" class="form-control" placeholder="Slaptažodis"> -->
                        <input class ="form-control" placeholder="Slaptažodis" name="pass" type="password" value="<?php echo $form->value("pass"); ?>"/><br>
                        <?php echo $form->error("pass"); ?>
					</div>
					<div class="row align-items-center remember">                     
                        <input type="checkbox" name="remember" 
                            <?php
                            if ($form->value("remember") != "") {
                                echo "Pažymėtas";
                            }
                            ?>/>Prisiminti mane                       
					</div>
					<div class="form-group">
                        <input type="submit" value="Prisijungti" class="btn float-right login_btn">
                        </p>
                        <input type="hidden" name="sublogin" value="1"/>
                        <p>
					</div>
				</form>
			</div>
			<div class="card-footer login-footer">
				<div class="d-flex justify-content-center links">
					Neturite paskyros?<a href="register.php" class="login">Registruotis</a>
				</div>
				<div class="d-flex justify-content-center">
                    <a href="forgotpass.php" class="login">Pamiršote slaptažodį?</a>
                </div>
                <div class="d-flex justify-content-center">
                <a href="guest_page.php"  class="login">Svečias</a>
				</div>
			</div>
		</div>
	</div>
</div> 
</form>
<?php } ?>