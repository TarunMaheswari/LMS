			<form id="signin_student" class="form-signin" method="post">
			<h3 class="form-signin-heading"><i class="icon-lock"></i> Sign up as Student</h3>
			<input type="text" class="input-block-level" id="username" name="username" placeholder="ID Number" required>
			<input type="text" class="input-block-level" id="firstname" name="firstname" placeholder="Firstname" required>
			<input type="text" class="input-block-level" id="lastname" name="lastname" placeholder="Lastname" required>
			<label>Class</label>
			<select name="class_id" class="input-block-level span5">
				<option></option>
				<?php
				$query = mysqli_query($conn,"select * from class order by class_name ")or die(mysqli_error());
				while($row = mysqli_fetch_array($query)){
				?>
				<option value="<?php  echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
				<?php
				}
				?>
			</select>
			<input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
			<input type="password" class="input-block-level" id="cpassword" name="cpassword" placeholder="Re-type Password" required>
			<button id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-check icon-large"></i> Sign in</button>
			</form>
			
		
			<?php
			if(isset($_POST['login'])){
					$firstname=$_POST['firstname'];
					$lastname=$_POST['lastname'];
					$class_id=$_POST['class_id'];
				    $username=$_POST['username'];
    				$password=$_POST['password'];
				    $cpassword=$_POST['cpassword'];

					$query = mysqli_query($conn,"select * from student where firstname = '$firstname' and lastname='$lastname' and class_id='$class_id' and username = '$username' and password = '$password' ")or die(mysqli_error());
					$count = mysqli_num_rows($query);
					if ($count > 0){ ?>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.js"></script>
						<script>
						$.jGrowl("Data Already Exist", { header: 'Try Again !!' });
						// alert('');
						</script>
						<?php
						}elseif($password!=$cpassword){?>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.js"></script>
						<script>
						$.jGrowl("Wrong Password", { header: 'Try Again !!' });
						</script>
						<?php
						}
						else{
						?>
						
			<?php
						mysqli_query($conn,"insert into student (firstname,lastname,class_id,username,password) values('$firstname','$lastname','$class_id','$username','$password')")or die(mysqli_error());
					?>
					<script>	
						// $.jGrowl("Sign up successfull", { header: 'Congratulation !!' });
						// alert('');
						window.location = "index.php";
					</script>
			<?php
					}
				}
			?>
			<a onclick="window.location='index.php'" id="btn_login" name="login" class="btn" type="submit"><i class="icon-signin icon-large"></i> Click here to Login</a>
			
			
			
				
		
					