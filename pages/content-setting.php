<div class="wrap">
  <div class="form-wrap">
    <div id="icon-edit" class="icon32 icon32-posts-post"><br>
    </div>
    <h2><?php echo WP_onclickpopup_TITLE; ?></h2>
    <?php

	$onclickpopup_title = get_option('onclickpopup_title');
	$onclickpopup_setting1 = get_option('onclickpopup_setting1');
	$onclickpopup_setting1_left = get_option('onclickpopup_setting1_left');
	$onclickpopup_setting1_top = get_option('onclickpopup_setting1_top');
	
	$onclickpopup_setting2 = get_option('onclickpopup_setting2');
	$onclickpopup_setting2_left = get_option('onclickpopup_setting2_left');
	$onclickpopup_setting2_top = get_option('onclickpopup_setting2_top');
	
	$onclickpopup_setting3 = get_option('onclickpopup_setting3');
	$onclickpopup_setting3_left = get_option('onclickpopup_setting3_left');
	$onclickpopup_setting3_top = get_option('onclickpopup_setting3_top');
	
	$onclickpopup_setting4 = get_option('onclickpopup_setting4');
	$onclickpopup_setting4_left = get_option('onclickpopup_setting4_left');
	$onclickpopup_setting4_top = get_option('onclickpopup_setting4_top');
	
	$onclickpopup_setting5 = get_option('onclickpopup_setting5');
	$onclickpopup_setting5_left = get_option('onclickpopup_setting5_left');
	$onclickpopup_setting5_top = get_option('onclickpopup_setting5_top');
	
	if (isset($_POST['onclickpopup_form_submit']) && $_POST['onclickpopup_form_submit'] == 'yes')
	{
		//	Just security thingy that wordpress offers us
		check_admin_referer('onclickpopup_form_setting');
			
		$onclickpopup_title = stripslashes($_POST['onclickpopup_title']);
		$onclickpopup_setting1 = stripslashes($_POST['onclickpopup_setting1']);
		$onclickpopup_setting1_left = stripslashes($_POST['onclickpopup_setting1_left']);
		$onclickpopup_setting1_top = stripslashes($_POST['onclickpopup_setting1_top']);
		
		$onclickpopup_setting2 = stripslashes($_POST['onclickpopup_setting2']);
		$onclickpopup_setting2_left = stripslashes($_POST['onclickpopup_setting2_left']);
		$onclickpopup_setting2_top = stripslashes($_POST['onclickpopup_setting2_top']);
		
		$onclickpopup_setting3 = stripslashes($_POST['onclickpopup_setting3']);
		$onclickpopup_setting3_left = stripslashes($_POST['onclickpopup_setting3_left']);
		$onclickpopup_setting3_top = stripslashes($_POST['onclickpopup_setting3_top']);
		
		$onclickpopup_setting4 = stripslashes($_POST['onclickpopup_setting4']);
		$onclickpopup_setting4_left = stripslashes($_POST['onclickpopup_setting4_left']);
		$onclickpopup_setting4_top = stripslashes($_POST['onclickpopup_setting4_top']);
		
		$onclickpopup_setting5 = stripslashes($_POST['onclickpopup_setting5']);
		$onclickpopup_setting5_left = stripslashes($_POST['onclickpopup_setting5_left']);
		$onclickpopup_setting5_top = stripslashes($_POST['onclickpopup_setting5_top']);

		update_option('onclickpopup_title', $onclickpopup_title );
		update_option('onclickpopup_setting1', $onclickpopup_setting1 );
		update_option('onclickpopup_setting1_left', $onclickpopup_setting1_left );
		update_option('onclickpopup_setting1_top', $onclickpopup_setting1_top );
		
		update_option('onclickpopup_setting2', $onclickpopup_setting2 );
		update_option('onclickpopup_setting2_left', $onclickpopup_setting2_left );
		update_option('onclickpopup_setting2_top', $onclickpopup_setting2_top );
		
		update_option('onclickpopup_setting3', $onclickpopup_setting3 );
		update_option('onclickpopup_setting3_left', $onclickpopup_setting3_left );
		update_option('onclickpopup_setting3_top', $onclickpopup_setting3_top );
		
		update_option('onclickpopup_setting4', $onclickpopup_setting4 );
		update_option('onclickpopup_setting4_left', $onclickpopup_setting4_left );
		update_option('onclickpopup_setting4_top', $onclickpopup_setting4_top );
		
		update_option('onclickpopup_setting5', $onclickpopup_setting5 );
		update_option('onclickpopup_setting5_left', $onclickpopup_setting5_left );
		update_option('onclickpopup_setting5_top', $onclickpopup_setting5_top );
		
		?>
		<div class="updated fade">
			<p><strong>Details successfully updated.</strong></p>
		</div>
		<?php
	}
	?>
	<script language="JavaScript" src="<?php echo get_option('siteurl'); ?>/wp-content/plugins/onclick-popup/pages/setting.js"></script>
	<form name="onclickpopup_form" method="post" action="">
		<h3>Widget setting</h3>
		
		<label for="tag-title">Widget title</label>
		<input name="onclickpopup_title" type="text" id="onclickpopup_title" size="50" value="<?php echo $onclickpopup_title; ?>" />
		<p>Please enter widget title.</p>
		
		<div style="height:10px;"></div>
		<h3>Setting 1</h3>
		<label for="tag-title">CSS setting 1</label>
		<input name="onclickpopup_setting1" type="text" id="onclickpopup_setting1" size="150" value="<?php echo $onclickpopup_setting1; ?>" />
		<p>Example: width: 320px; background: #FFF; text-align: center; font-family: Arial,sans-serif; padding: 10px; border: 2px solid #666;</p>
		<label for="tag-title">Left position</label>
		<input name="onclickpopup_setting1_left" type="text" id="onclickpopup_setting1_left" size="10" maxlength="4" value="<?php echo $onclickpopup_setting1_left; ?>" />
		<p>Please enter your popup window LEFT position for setting 1</p>
		<label for="tag-title">Top position</label>
		<input name="onclickpopup_setting1_top" type="text" id="onclickpopup_setting1_top" size="10" maxlength="4" value="<?php echo $onclickpopup_setting1_top; ?>" />
		<p>Please enter your popup window TOP position for setting 1</p>
		<div style="height:10px;"></div>
		
		<div style="height:10px;"></div>
		<h3>Setting 2</h3>
		<label for="tag-title">CSS setting 2</label>
		<input name="onclickpopup_setting2" type="text" id="onclickpopup_setting2" size="150" value="<?php echo $onclickpopup_setting2; ?>" />
		<p>Example: width: 320px; background: #FFF; text-align: center; font-family: Arial,sans-serif; padding: 10px; border: 2px solid #666;</p>
		<label for="tag-title">Left position</label>
		<input name="onclickpopup_setting2_left" type="text" id="onclickpopup_setting2_left" size="10" maxlength="4" value="<?php echo $onclickpopup_setting2_left; ?>" />
		<p>Please enter your popup window LEFT position for setting 2</p>
		<label for="tag-title">Top position</label>
		<input name="onclickpopup_setting2_top" type="text" id="onclickpopup_setting2_top" size="10" maxlength="4" value="<?php echo $onclickpopup_setting2_top; ?>" />
		<p>Please enter your popup window TOP position for setting 2</p>
		<div style="height:10px;"></div>
		
		<div style="height:10px;"></div>
		<h3>Setting 3</h3>
		<label for="tag-title">CSS setting 3</label>
		<input name="onclickpopup_setting3" type="text" id="onclickpopup_setting3" size="150" value="<?php echo $onclickpopup_setting3; ?>" />
		<p>Example: width: 320px; background: #FFF; text-align: center; font-family: Arial,sans-serif; padding: 10px; border: 2px solid #666;</p>
		<label for="tag-title">Left position</label>
		<input name="onclickpopup_setting3_left" type="text" id="onclickpopup_setting3_left" size="10" maxlength="4" value="<?php echo $onclickpopup_setting3_left; ?>" />
		<p>Please enter your popup window LEFT position for setting 3</p>
		<label for="tag-title">Top position</label>
		<input name="onclickpopup_setting3_top" type="text" id="onclickpopup_setting3_top" size="10" maxlength="4" value="<?php echo $onclickpopup_setting3_top; ?>" />
		<p>Please enter your popup window TOP position for setting 3</p>
		<div style="height:10px;"></div>
		
		<div style="height:10px;"></div>
		<h3>Setting 4</h3>
		<label for="tag-title">CSS setting 4</label>
		<input name="onclickpopup_setting4" type="text" id="onclickpopup_setting4" size="150" value="<?php echo $onclickpopup_setting4; ?>" />
		<p>Example: width: 320px; background: #FFF; text-align: center; font-family: Arial,sans-serif; padding: 10px; border: 2px solid #666;</p>
		<label for="tag-title">Left position</label>
		<input name="onclickpopup_setting4_left" type="text" id="onclickpopup_setting4_left" size="10" maxlength="4" value="<?php echo $onclickpopup_setting4_left; ?>" />
		<p>Please enter your popup window LEFT position for setting 4</p>
		<label for="tag-title">Top position</label>
		<input name="onclickpopup_setting4_top" type="text" id="onclickpopup_setting4_top" size="10" maxlength="4" value="<?php echo $onclickpopup_setting4_top; ?>" />
		<p>Please enter your popup window TOP position for setting 4</p>
		<div style="height:10px;"></div>
		
		<div style="height:10px;"></div>
		<h3>Setting 5</h3>
		<label for="tag-title">CSS setting 5</label>
		<input name="onclickpopup_setting5" type="text" id="onclickpopup_setting5" size="150" value="<?php echo $onclickpopup_setting5; ?>" />
		<p>Example: width: 320px; background: #FFF; text-align: center; font-family: Arial,sans-serif; padding: 10px; border: 2px solid #666;</p>
		<label for="tag-title">Left position</label>
		<input name="onclickpopup_setting5_left" type="text" id="onclickpopup_setting5_left" size="10" maxlength="4" value="<?php echo $onclickpopup_setting5_left; ?>" />
		<p>Please enter your popup window LEFT position for setting 5</p>
		<label for="tag-title">Top position</label>
		<input name="onclickpopup_setting5_top" type="text" id="onclickpopup_setting5_top" size="10" maxlength="4" value="<?php echo $onclickpopup_setting5_top; ?>" />
		<p>Please enter your popup window TOP position for setting 5</p>
		<div style="height:10px;"></div>
		
		<div style="height:10px;"></div>
		<input type="hidden" name="onclickpopup_form_submit" value="yes"/>
		<input name="onclickpopup_submit" id="onclickpopup_submit" class="button add-new-h2" value="Submit" type="submit" />
		<input name="Help" lang="publish" class="button add-new-h2" onclick="onclickpopup_help()" value="Help" type="button" />
		<?php wp_nonce_field('onclickpopup_form_setting'); ?>
	</form>
  </div>
  <br /><p class="description"><?php echo WP_onclickpopup_LINK; ?></p>
</div>
