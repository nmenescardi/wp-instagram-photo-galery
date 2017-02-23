<?php

// Create Options Menu Link
function wpipg_options_menu_link(){
	add_options_page(
		'WP Instagram Photo Galery Options',
		'WP Instagram Photo Galery',
		'manage_options',
		'wpipg-options',
		'wpipg_options_content'
	);
}
add_action('admin_menu', 'wpipg_options_menu_link');


//Create Content
function wpipg_options_content(){
	// Init global options
	global $wpipg_options;
	
	$redirect_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	
	?>
	<div class="wrap">
		<h2>WP Instagram Photo Galery Settings</h2>
		<p>Settings fot the WPIPG Plugin</p>
		<form method="post" action="options.php">
			<?php settings_fields('wpipg_settings_group'); ?>
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label for="wpipg_settings[redirect_url]"><?php _e('Redirect URL', 'wpipg-domain'); ?></label></th>
						<td><input name="wpipg_settings[redirect_url]" type="text" id="wpipg_settings[redirect_url]" value="<?php echo $redirect_url; ?>" class="regular-text" disabled>
							<p class="description" id="wpipg_settings[redirect_url]"><?php _e('Add this URL into your Instagram client redirect URL field', 'wpipg-domain'); ?></p>
						</td>
					</tr>
					
					<tr>
						<th scope="row"><label for="wpipg_settings[client_id]"><?php _e('Client ID', 'wpipg-domain'); ?></label></th>
						<td><input name="wpipg_settings[client_id]" type="text" id="wpipg_settings[client_id]" value="<?php echo $wpipg_options['client_id']; ?>" class="regular-text">
							<p class="description" id="wpipg_settings[client_id]"><?php _e('Get the client ID From your Instagram Application and put in here', 'wpipg-domain'); ?></p>
						</td>
					</tr>
									
					<tr>
						<th scope="row"><label for="authenticate"><?php _e('Authenticate', 'wpipg-domain'); ?></label></th>
						<td><a class="button btn" href="https://api.instagram.com/oauth/authorize/?client_id=<?php echo $wpipg_options['client_id']; ?>&redirect_uri=<?php echo $redirect_url; ?>&response_type=token&scope=public_content">Authenticate</a>
							<p class="description" id="wpipg_settings[client_id]"><?php _e('IMPORTANT: Click this after you add the redirect URL & Client ID', 'wpipg-domain'); ?></p>
						</td>
					</tr>
											
					<tr>
						<th scope="row"><label for="wpipg_settings[access_token]"><?php _e('Access Token', 'wpipg-domain'); ?></label></th>
						<td><input name="wpipg_settings[access_token]" type="text" id="wpipg_settings[access_token]" value="<?php echo $wpipg_options['access_token']; ?>" class="regular-text" >
							<p class="description" id="wpipg_settings[access_token]"><?php _e('Get this from URL after you authenticate', 'wpipg-domain'); ?></p>
						</td>
					</tr>						
										
					<tr>
						<th scope="row"><label for="wpipg_settings[linked]"><?php _e('Link Photos to Instagram', 'wpipg-domain'); ?></label></th>
						<td><input name="wpipg_settings[linked]" type="checkbox" id="wpipg_settings[linked]" value="1" <?php echo checked('1', $wpipg_options['linked']); ?> >
						</td>
					</tr>		

					<tr>
						<th scope="row"><label for="wpipg_settings[page_caption]"><?php _e('Page Caption', 'wpipg-domain'); ?></label></th>
						<td><input name="wpipg_settings[page_caption]" type="text" id="wpipg_settings[page_caption]" value="<?php echo $wpipg_options['page_caption']; ?>" class="regular-text">
							<p class="description" id="wpipg_settings[page_caption]"><?php _e('Add some text to the top of th page', 'wpipg-domain'); ?></p>
						</td>
					</tr>					
						
				</tbody>
			</table>
			<p class="submit"><input type="submit" name="submit" id="submit" class="button" value="<?php _e('Save Changes','wpipg-domain');?>"></p>
		</form>	
	</div>	
	<?php
}



//Register Settings
function wpipg_register_settings(){
	register_setting('wpipg_settings_group', 'wpipg_settings');
}
add_action('admin_init','wpipg_register_settings');