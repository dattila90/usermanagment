<?php $attributes = array('class' => 'form-signin', 'id' => 'bundleOrderInfo');
echo form_open("index/login_validation", $attributes); ?>
<div id="login_errors">
	<?= validation_errors(); ?>
</div>
<label for="email" class="sr-only">Email:</label>
<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="" />
<label for="password" class="sr-only">Password:</label>
<input type="password" class="form-control" id="password" name="password" placeholder="Password" value="" />
<input type="submit" class="btn btn-lg btn-primary btn-block" id="signin" value="Sign in" />
<?php echo form_close(); ?>