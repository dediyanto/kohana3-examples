<?php echo Form::open()?>
	<fieldset>
		
		<legend>Profile</legend>

		<?php if ($errors) {?>
			<p>Errors:</p>
			<ul class="errors">
			<?php foreach($errors as $field => $error){?>
				<li><?php echo $error ?></li>
			<?php }?>
			</ul>
		<?php }?>

		<div class="field">
			<?php echo 
				Form::label('username', 'Username'),
				Form::input('username', @$_POST['username'] ? $_POST['username'] : $user->username, array('id' => 'username')), "\n"
			?>
		</div>
		<div class="field">
			<?php echo 
				Form::label('email', 'Email'),
				Form::input('email', @$_POST['email'] ? $_POST['email'] : $user->email, array('id' => 'email'))
			?>
		</div>
		<div class="field">
			<?php echo 
				Form::label('password', 'Password'),
				Form::password('password', NULL, array('id' => 'password'))
			?>
		</div>
		<div clas="field">
			<?php echo 
				Form::label('password_confirm', 'Confirm password'),
				Form::password('password_confirm', NULL, array('id' => 'password_confirm'))
			?>
		</div>

		<?php echo Form::submit('update', 'Update')?>
	</fieldset>
<?php echo Form::close()?>
