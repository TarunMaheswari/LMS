			<form id="signin_teacher" class="form-signin" method="post">
					<h3 class="form-signin-heading"><i class="icon-lock"></i> Sign up as Teacher</h3>
					<input type="text" class="input-block-level"  name="firstname" placeholder="Firstname" required>
					<input type="text" class="input-block-level"  name="lastname" placeholder="Lastname" required>
					<label>Department</label>
					<select name="department_id" class="input-block-level span12">
						<option></option>
						<?php
						$query = mysqli_query($conn,"select * from department order by department_name ")or die(mysqli_error());
						while($row = mysqli_fetch_array($query)){
						?>
						<option value="<?php echo $row['department_id'] ?>"><?php echo $row['department_name']; ?></option>
						<?php
						}
						?>
					</select>
					<input type="text" class="input-block-level" id="username" name="username" placeholder="Username" required>
					<input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
					<input type="password" class="input-block-level" id="cpassword" name="cpassword" placeholder="Re-type Password" required>
					<button id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-check icon-large"></i> Sign in</button>
			</form>
			<?php
			if(isset($_POST['login'])){
					$username=$_POST['username'];
					$password=$_POST['password'];
					$firstname=$_POST['firstname'];
					$lastname=$_POST['lastname'];
					$department_id=$_POST['department_id'];
				    $cpassword=$_POST['cpassword'];

					$query = mysqli_query($conn,"select * from teacher where username = '$username'  and password = '$password' and firstname = '$firstname' and lastname='$lastname' and department_id='$department_id' ")or die(mysqli_error());
					$count = mysqli_num_rows($query);
					if ($count > 0){ ?>
						<script>
						alert('Data Already Exist');
						</script>
						<?php
						}elseif($password!=$cpassword){?>
						<script>
						alert('Password incurrect...');
						</script>
						<?php
						}
						else{
						?>
						
			<?php
						mysqli_query($conn,"insert into teacher (username,password,firstname,lastname,department_id) values('$username','$password','$firstname','$lastname','$department_id')")or die(mysqli_error());
					?>
					<script>	
						alert('Sign up successfull');
						window.location = "index.php";
					</script>
			<?php
					}
				}
			?>
			<a onclick="window.location='index.php'" id="btn_login" name="login" class="btn" type="submit"><i class="icon-signin icon-large"></i> Click here to Login</a>
			


			
			
				
		
					
		