	<div id="body">

		<?php 
		$attributes = array('class' => 'form-horizontal', 'id' => 'bundleOrderInfo');
		if(!empty($user)) {
			echo form_open('welcome/updateUser','id="bundleOrderInfo" name="bundleOrderInfo"', $attributes); 
		?>
			<input style="display:none;" type="text" name="id" placeholder="id" value="<?php if(!empty($user[0]->id)) echo $user[0]->id; ?>"><br>
		<?php
		} else {
			echo form_open('index/insertUser', $attributes,'id="bundleOrderInfo" name="bundleOrderInfo"');
		}
		?>
		<!-- <form actiom="http://localhost/cimanagment/index.php/welcome/insertUser" method="POST"> -->
		
			<div class="form-group">
				<label for="username" class="col-sm-2 control-label">Username</label>
    			<div class="col-sm-10">
					<input class="form-control" id="username" type="text" name="username" placeholder="username" value="<?php if(!empty($user[0]->username)) echo $user[0]->username; ?>"><br>
				</div>
			</div>
			<div class="form-group">
				<label for="username" class="col-sm-2 control-label">First name</label>
    			<div class="col-sm-10">
					<input class="form-control" id="firstname" type="text" name="firstname" placeholder="firstname" value="<?php if(!empty($user[0]->firstname)) echo $user[0]->firstname; ?>"><br>
				</div>
			</div>
			<div class="form-group">
				<label for="lastname" class="col-sm-2 control-label">Last name</label>
    			<div class="col-sm-10">
					<input class="form-control" id="lastname" type="text" name="lastname" placeholder="lastname" value="<?php if(!empty($user[0]->lastname)) echo $user[0]->lastname; ?>"><br>
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-10">
					<input class="form-control" id="password" type="password" name="password" placeholder="password"><br>
				</div>
			</div>
			<div class="form-group">
				<label for="email", class="col-sm-2 control-label">E-mail</label>
				<div class="col-sm-10">
					<input class="form-control" id="email" type="email" name="email" placeholder="email" value="<?php if(!empty($user[0]->email)) echo $user[0]->email; ?>"><br>
				</div>
			</div>
			<div class="form-group">
				<label for="phone", class="col-sm-2 control-label">Phone</label>
				<div class="col-sm-10">
					<input class="form-control" id="phone" type="text" name="phone" placeholder="phone" value="<?php if(!empty($user[0]->phone)) echo $user[0]->phone; ?>"><br>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<input class="btn btn-default" type="submit" value="Submit">
				</div>
			</div>
		<!-- </form> -->
		<?php echo form_close();/*?>

		<?= $this->form_builder->open_form(array('action' => 'welcome/updateUser')); ?>
		<?php
		echo $this->form_builder->build_form_horizontal(
			array(
				array(
					'id' => 'id',
					'type' => 'hidden',
					'value' => $user[0]->id
				),
				array(
					'id' => 'username',
					'type' => 'text',
					'placeholder' => 'Username',
					'value' => $user[0]->username
				),
				array(
			        'id' => 'submit',
			        'type' => 'submit'
			    )
			), $user);
		?>
		<?= $this->form_builder->close_form(); */ ?>

	</div>
