

	<div id="body">
		

		<?php // print_r($results); ?>

		<table class="table">
			<tr>
			    <th>Username</th>
			    <th>First name</th>
			    <th>Last name</th>
			    <th>Email</th>
			    <th>Phone</th>
			</tr>
			<?php foreach ($results as $key => $value) { ?>
			<tr id="row-<?= $value->id; ?>">
			 	<td class="table-row" user-id="<?= $value->id; ?>" data-toggle="modal" data-target="#user_form">
					<?= $value->username; ?>
				</td>
			 	<td class="table-row" user-id="<?= $value->id; ?>" data-toggle="modal" data-target="#user_form">
					<?= $value->firstname; ?>
				</td>
			 	<td class="table-row" user-id="<?= $value->id; ?>" data-toggle="modal" data-target="#user_form">
					<?= $value->lastname; ?>
				</td>
			 	<td class="table-row" user-id="<?= $value->id; ?>" data-toggle="modal" data-target="#user_form">
					<?= $value->email; ?>
				</td>
			 	<td class="table-row" user-id="<?= $value->id; ?>" data-toggle="modal" data-target="#user_form">
					<?= $value->phone; ?>
				</td>
				<?php /* ?>
			 	<td>
					<a class="btn-sm btn-primary" href="<?php echo base_url(); ?>/index.php/index/update?id=<?= $value->id; ?>">Edit</a>
				</td>
				<?php */ ?>
			 	<td>
					<a class="btn-sm btn-primary delete_btn" user-id="<?= $value->id; ?>" href="#">Delete</a>
				</td>
			</tr>
			<?php } ?>
			
		</table>

	</div>

	<div class="modal fade" id="user_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<?php 
				$attributes = array('class' => 'form-horizontal', 'id' => 'user_form');
				echo form_open('index/User', $attributes);
				?>
			  	<div class="modal-header">
				    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				    <h4 class="modal-title" id="myModalLabel">Add New User</h4>
			  	</div>
			  	<div class="modal-body">
			    
				<!-- <form actiom="http://localhost/cimanagment/index.php/welcome/insertUser" method="POST"> -->
					

					<div class="form-group" id="usr">
						<label for="username" class="col-sm-3 control-label">Username</label>
		    			<div class="col-sm-9">
							<input class="form-control validate[required]" id="username" type="text" name="username" placeholder="username" value="<?php if(!empty($user[0]->username)) echo $user[0]->username; ?>" aria-describedby="inputError2Status"><br>
							<span class="hidden glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
							<span id="inputError2Status" class="sr-only">(error)</span>
						</div>
					</div>
					<div class="form-group">
						<label for="username" class="col-sm-3 control-label">First name</label>
		    			<div class="col-sm-9">
							<input class="form-control validate[required,custom[onlyLetterSp]]" id="firstname" type="text" name="firstname" placeholder="firstname" value="<?php if(!empty($user[0]->firstname)) echo $user[0]->firstname; ?>"><br>
						</div>
					</div>
					<div class="form-group">
						<label for="lastname" class="col-sm-3 control-label">Last name</label>
		    			<div class="col-sm-9">
							<input class="form-control validate[required,custom[onlyLetterSp]]" id="lastname" type="text" name="lastname" placeholder="lastname" value="<?php if(!empty($user[0]->lastname)) echo $user[0]->lastname; ?>"><br>
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-sm-3 control-label">Password</label>
						<div class="col-sm-9">
							<input class="form-control validate[required]" id="password" type="password" name="password" placeholder="password"><br>
						</div>
					</div>
					<div class="form-group">
						<label for="email", class="col-sm-3 control-label">E-mail</label>
						<div class="col-sm-9">
							<input class="form-control validate[required,custom[email]]" id="email" type="email" name="email" placeholder="email" value="<?php if(!empty($user[0]->email)) echo $user[0]->email; ?>"><br>
						</div>
					</div>
					<div class="form-group">
						<label for="phone", class="col-sm-3 control-label">Phone</label>
						<div class="col-sm-9">
							<input class="form-control validate[required,custom[phone]]" id="phone" type="text" name="phone" placeholder="phone" value="<?php if(!empty($user[0]->phone)) echo $user[0]->phone; ?>"><br>
						</div>
					</div>
					<div class="form-group">
						<label for="user_type", class="col-sm-3 control-label">User type</label>
						<div class="col-sm-9">
							<select class="form-control validate[required]" name="user_type">
								<option id="user">user</option>
  								<option id="admin">admin</option>
							</select>
						</div>
					</div>
					<input class="hidden" id="id" type="text" name="id" placeholder="id" value=""><br>
					<!-- <div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
							<input class="btn btn-default" type="submit" value="Submit">
						</div>
					</div> -->
				<!-- </form> -->
			  	</div>
			  	<div class="modal-footer">
				    <!-- <button type="button" class="btn btn-primary" type="submit" id="user_form_submit">Save</button> -->
				    <input class="btn btn-default" type="submit" value="Save">
				    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  	</div>			  	
				<?php echo form_close();?>
			</div>
		</div>
	</div>

	<script type="text/javascript">
	$(document).ready(function(){
		
        //$("#user_form").validationEngine('attach');
	});
	// var users_array = [<?php echo json_encode($results);?>];
	// var users_array = [<?php foreach($results as $result) {echo "'id:" . $result->id . "','" . $result->username . "','" . $result->firstname . "','" . $result->lastname . "','" . $result->email . "',";}?>];

	// ['id', 'username', 'firstname', 'lastname', 'email', 'phone'];
	</script>