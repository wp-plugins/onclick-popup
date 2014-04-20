<?php if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); } ?>
<div class="wrap">
<?php
$onclickpopup_errors = array();
$onclickpopup_success = '';
$onclickpopup_error_found = FALSE;

// Preset the form fields
$form = array(
	'onclickpopup_id' => '',
	'onclickpopup_group' => '',
	'onclickpopup_title' => '',
	'onclickpopup_content' => ''
);

// Form submitted, check the data
if (isset($_POST['onclickpopup_form_submit']) && $_POST['onclickpopup_form_submit'] == 'yes')
{
	//	Just security thingy that wordpress offers us
	check_admin_referer('onclickpopup_form_add');
	
	$form['onclickpopup_group'] = isset($_POST['onclickpopup_group']) ? $_POST['onclickpopup_group'] : '';
	if ($form['onclickpopup_group'] == '')
	{
		$onclickpopup_errors[] = __('Please select popup group.', 'onclickpopup');
		$onclickpopup_error_found = TRUE;
	}

	$form['onclickpopup_title'] = isset($_POST['onclickpopup_title']) ? $_POST['onclickpopup_title'] : '';
	if ($form['onclickpopup_title'] == '')
	{
		$onclickpopup_errors[] = __('Please enter the popup title.', 'onclickpopup');
		$onclickpopup_error_found = TRUE;
	}

	$form['onclickpopup_content'] = isset($_POST['onclickpopup_content']) ? $_POST['onclickpopup_content'] : '';
	if ($form['onclickpopup_content'] == '')
	{
		$onclickpopup_errors[] = __('Please enter the popup content.', 'onclickpopup');
		$onclickpopup_error_found = TRUE;
	}

	//	No errors found, we can add this Group to the table
	if ($onclickpopup_error_found == FALSE)
	{
		$sql = $wpdb->prepare(
			"INSERT INTO `".WP_ONCLICK_PLUGIN."`
			(`onclickpopup_group`, `onclickpopup_title`, `onclickpopup_content`)
			VALUES(%s, %s, %s)",
			array($form['onclickpopup_group'], $form['onclickpopup_title'], $form['onclickpopup_content'])
		);
		
		$wpdb->query($sql);
		
		$onclickpopup_success = __('New details was successfully added.', 'onclickpopup');
		
		// Reset the form fields
		$form = array(
			'onclickpopup_id' => '',
			'onclickpopup_group' => '',
			'onclickpopup_title' => '',
			'onclickpopup_content' => ''
		);
	}
}

if ($onclickpopup_error_found == TRUE && isset($onclickpopup_errors[0]) == TRUE)
{
	?>
	<div class="error fade">
		<p><strong><?php echo $onclickpopup_errors[0]; ?></strong></p>
	</div>
	<?php
}
if ($onclickpopup_error_found == FALSE && strlen($onclickpopup_success) > 0)
{
	?>
	<div class="updated fade">
		<p><strong><?php echo $onclickpopup_success; ?> 
		<a href="<?php echo WP_onclickpopup_ADMIN_URL; ?>"><?php _e('Click here to view the details', 'onclickpopup'); ?></a></strong></p>
	</div>
	<?php
}
?>
<script language="JavaScript" src="<?php echo WP_onclickpopup_PLUGIN_URL; ?>/pages/setting.js"></script>
<div class="form-wrap">
	<div id="icon-edit" class="icon32 icon32-posts-post"><br></div>
	<h2><?php _e('Onclick Popup', 'onclickpopup'); ?></h2>
	<form name="onclickpopup_form" method="post" action="#" onsubmit="return onclickpopup_submit()"  >
      <h3><?php _e('Add details', 'onclickpopup'); ?></h3>
      
		<label for="tag-title"><?php _e('Select popup group (This is to group the content)', 'onclickpopup'); ?></label>
		<select name="onclickpopup_group" id="onclickpopup_group">
		<option value=''>Select</option>
		<?php
		$sSql = "SELECT distinct(onclickpopup_group) as onclickpopup_group FROM `".WP_ONCLICK_PLUGIN."` order by onclickpopup_group";
		$myDistinctData = array();
		$arrDistinctDatas = array();
		$myDistinctData = $wpdb->get_results($sSql, ARRAY_A);
		$i = 0;
		foreach ($myDistinctData as $DistinctData)
		{
			$arrDistinctData[$i]["onclickpopup_group"] = strtoupper($DistinctData['onclickpopup_group']);
			$i = $i+1;
		}
		for($j=$i; $j<$i+5; $j++)
		{
			$arrDistinctData[$j]["onclickpopup_group"] = "GROUP" . $j;
		}
		$arrDistinctData[$j+1]["onclickpopup_group"] = "GROUP1";
		$arrDistinctDatas = array_unique($arrDistinctData, SORT_REGULAR);
		foreach ($arrDistinctDatas as $arrDistinct)
		{
			?><option value='<?php echo strtoupper($arrDistinct["onclickpopup_group"]); ?>'><?php echo strtoupper($arrDistinct["onclickpopup_group"]); ?></option><?php
		}
		?>
		</select>
		<p><?php _e('This is to group the content. Please select your group.', 'onclickpopup'); ?></p>
		
		<label for="tag-title"><?php _e('Popup title', 'onclickpopup'); ?></label>
		<input name="onclickpopup_title" type="text" id="onclickpopup_title" value="" size="60" maxlength="1000" />
		<p><?php _e('Please enter your popup title.', 'onclickpopup'); ?></p>
			
		<label for="tag-title"><?php _e('Popup content', 'onclickpopup'); ?></label>
		<textarea name="onclickpopup_content" cols="70" rows="12" id="onclickpopup_content"></textarea>
		<p><?php _e('Please enter your popup content. You can add HTML text.', 'onclickpopup'); ?></p>
					
      <input name="onclickpopup_id" id="onclickpopup_id" type="hidden" value="">
      <input type="hidden" name="onclickpopup_form_submit" value="yes"/>
      <p class="submit">
        <input name="publish" lang="publish" class="button add-new-h2" value="<?php _e('Insert Details', 'onclickpopup'); ?>" type="submit" />&nbsp;
        <input name="publish" lang="publish" class="button add-new-h2" onclick="onclickpopup_redirect()" value="<?php _e('Cancel', 'onclickpopup'); ?>" type="button" />&nbsp;
        <input name="Help" lang="publish" class="button add-new-h2" onclick="onclickpopup_help()" value="<?php _e('Help', 'onclickpopup'); ?>" type="button" />
      </p>
	  <?php wp_nonce_field('onclickpopup_form_add'); ?>
    </form>
</div>
<p class="description">
	<?php _e('Check official website for more information', 'onclickpopup'); ?>
	<a target="_blank" href="<?php echo WP_onclickpopup_FAV; ?>"><?php _e('click here', 'onclickpopup'); ?></a>
</p>
</div>