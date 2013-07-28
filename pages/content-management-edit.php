<div class="wrap">
<?php
$did = isset($_GET['did']) ? $_GET['did'] : '0';

// First check if ID exist with requested ID
$sSql = $wpdb->prepare(
	"SELECT COUNT(*) AS `count` FROM ".WP_ONCLICK_PLUGIN."
	WHERE `onclickpopup_id` = %d",
	array($did)
);
$result = '0';
$result = $wpdb->get_var($sSql);

if ($result != '1')
{
	?><div class="error fade"><p><strong>Oops, selected details doesn't exist.</strong></p></div><?php
}
else
{
	$onclickpopup_errors = array();
	$onclickpopup_success = '';
	$onclickpopup_error_found = FALSE;
	
	$sSql = $wpdb->prepare("
		SELECT *
		FROM `".WP_ONCLICK_PLUGIN."`
		WHERE `onclickpopup_id` = %d
		LIMIT 1
		",
		array($did)
	);
	$data = array();
	$data = $wpdb->get_row($sSql, ARRAY_A);
	
	// Preset the form fields
	$form = array(
		'onclickpopup_id' => $data['onclickpopup_id'],
		'onclickpopup_group' => $data['onclickpopup_group'],
		'onclickpopup_title' => $data['onclickpopup_title'],
		'onclickpopup_content' => $data['onclickpopup_content']
	);
}
// Form submitted, check the data
if (isset($_POST['onclickpopup_form_submit']) && $_POST['onclickpopup_form_submit'] == 'yes')
{
	//	Just security thingy that wordpress offers us
	check_admin_referer('onclickpopup_form_edit');
	
	$form['onclickpopup_group'] = isset($_POST['onclickpopup_group']) ? $_POST['onclickpopup_group'] : '';
	if ($form['onclickpopup_group'] == '')
	{
		$onclickpopup_errors[] = __('Please select popup group.', WP_onclickpopup_UNIQUE_NAME);
		$onclickpopup_error_found = TRUE;
	}

	$form['onclickpopup_title'] = isset($_POST['onclickpopup_title']) ? $_POST['onclickpopup_title'] : '';
	if ($form['onclickpopup_title'] == '')
	{
		$onclickpopup_errors[] = __('Please enter the popup title.', WP_onclickpopup_UNIQUE_NAME);
		$onclickpopup_error_found = TRUE;
	}

	$form['onclickpopup_content'] = isset($_POST['onclickpopup_content']) ? $_POST['onclickpopup_content'] : '';
	if ($form['onclickpopup_content'] == '')
	{
		$onclickpopup_errors[] = __('Please enter the popup content.', WP_onclickpopup_UNIQUE_NAME);
		$onclickpopup_error_found = TRUE;
	}

	//	No errors found, we can add this Group to the table
	if ($onclickpopup_error_found == FALSE)
	{	
		$sSql = $wpdb->prepare(
				"UPDATE `".WP_ONCLICK_PLUGIN."`
				SET `onclickpopup_group` = %s,
				`onclickpopup_title` = %s,
				`onclickpopup_content` = %s
				WHERE onclickpopup_id = %d
				LIMIT 1",
				array($form['onclickpopup_group'], $form['onclickpopup_title'], $form['onclickpopup_content'], $did)
			);
		$wpdb->query($sSql);
		
		$onclickpopup_success = 'Image details was successfully updated.';
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
		<p><strong><?php echo $onclickpopup_success; ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/admin.php?page=onclick-popup-content">Click here</a> to view the details</strong></p>
	</div>
	<?php
}
?>
<script language="JavaScript" src="<?php echo get_option('siteurl'); ?>/wp-content/plugins/onclick-popup/pages/setting.js"></script>
<div class="form-wrap">
	<div id="icon-edit" class="icon32 icon32-posts-post"><br></div>
	<h2><?php echo WP_PHOTO_50_TITLE; ?></h2>
	<form name="onclickpopup_form" method="post" action="#" onsubmit="return onclickpopup_submit()"  >
      <h3>Update details</h3>
      
	  	<label for="tag-title">Select popup group (This is to group the content)</label>
		<select name="onclickpopup_group" id="onclickpopup_group">
		<option value=''>Select</option>
		<?php
		$sSql = "SELECT distinct(onclickpopup_group) as onclickpopup_group FROM `".WP_ONCLICK_PLUGIN."` order by onclickpopup_group";
		$myDistinctData = array();
		$arrDistinctDatas = array();
		$thisselected = "";
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
			if(strtoupper($form['onclickpopup_group']) == strtoupper($arrDistinct["onclickpopup_group"])) 
			{ 
				$thisselected = "selected='selected'" ; 
			}
			?><option value='<?php echo strtoupper($arrDistinct["onclickpopup_group"]); ?>' <?php echo $thisselected; ?>><?php echo strtoupper($arrDistinct["onclickpopup_group"]); ?></option><?php
			$thisselected = "";
		}
		?>
		</select>
		<p>This is to group the content. Please select your group.</p>
		
		<label for="tag-title">Popup title</label>
		<input name="onclickpopup_title" type="text" id="onclickpopup_title" value="<?php echo esc_html(stripslashes($form['onclickpopup_title'])); ?>" size="120" maxlength="1000" />
		<p>Please enter your popup title.</p>
			
		<label for="tag-title">Popup content</label>
		<textarea name="onclickpopup_content" cols="120" rows="12" id="onclickpopup_content"><?php echo esc_html(stripslashes($form['onclickpopup_content'])); ?></textarea>
		<p>Please enter your popup content. You can add HTML text.</p>
	  
      <input name="onclickpopup_id" id="onclickpopup_id" type="hidden" value="<?php echo $form['onclickpopup_id']; ?>">
      <input type="hidden" name="onclickpopup_form_submit" value="yes"/>
      <p class="submit">
        <input name="publish" lang="publish" class="button add-new-h2" value="Update Details" type="submit" />
        <input name="publish" lang="publish" class="button add-new-h2" onclick="onclickpopup_redirect()" value="Cancel" type="button" />
        <input name="Help" lang="publish" class="button add-new-h2" onclick="onclickpopup_help()" value="Help" type="button" />
      </p>
	  <?php wp_nonce_field('onclickpopup_form_edit'); ?>
    </form>
</div>
<p class="description"><?php echo WP_onclickpopup_LINK; ?></p>
</div>