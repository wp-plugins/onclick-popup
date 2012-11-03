<?php
	echo "<div class='wrap'>";
	echo "<h2>Onclick popup setting</h2>"; 
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
	
	if (@$_POST['onclickpopup_submit']) 
	{
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
	}
	
	echo '<form name="onclickpopup_form" method="post" action="">';

	echo '<p>Title:<br><input  style="width: 450px;" maxlength="200" type="text" value="';
	echo $onclickpopup_title . '" name="onclickpopup_title" id="onclickpopup_title" /> Widget title.</p><br>';

	echo '<p>Popup CSS Setting 1 :<br><input  style="width: 750px;" type="text" value="';
	echo $onclickpopup_setting1 . '" name="onclickpopup_setting1" id="onclickpopup_setting1" /><br>';
	echo 'Example = width: 320px; background: #FFF; text-align: center; font-family: Arial,sans-serif; padding: 10px; border: 2px solid #666;</p>';

	echo '<p>Popup Position Setting 1 :<br>';
	echo 'Left : <input  style="width: 150px;" type="text" value="';
	echo $onclickpopup_setting1_left . '" name="onclickpopup_setting1_left" id="onclickpopup_setting1_left" />		';
	echo 'Top : <input  style="width: 150px;" type="text" value="';
	echo $onclickpopup_setting1_top . '" name="onclickpopup_setting1_top" id="onclickpopup_setting1_top" /> (Only Number)<br><br>';

	echo '<p>Popup CSS Setting 2 :<br><input  style="width: 750px;" type="text" value="';
	echo $onclickpopup_setting2 . '" name="onclickpopup_setting2" id="onclickpopup_setting2" /><br>';
	echo 'Example = width: 320px; background: #FFF; text-align: center; font-family: Arial,sans-serif; padding: 10px; border: 2px solid #666;</p>';

	echo '<p>Popup Position Setting 2 :<br>';
	echo 'Left : <input  style="width: 150px;" type="text" value="';
	echo $onclickpopup_setting2_left . '" name="onclickpopup_setting2_left" id="onclickpopup_setting2_left" />		';
	echo 'Top : <input  style="width: 150px;" type="text" value="';
	echo $onclickpopup_setting2_top . '" name="onclickpopup_setting2_top" id="onclickpopup_setting2_top" /> (Only Number)<br><br>';

	echo '<p>Popup CSS Setting 3 :<br><input  style="width: 750px;" type="text" value="';
	echo $onclickpopup_setting3 . '" name="onclickpopup_setting3" id="onclickpopup_setting3" /><br>';
	echo 'Example = width: 320px; background: #FFF; text-align: center; font-family: Arial,sans-serif; padding: 10px; border: 2px solid #666;</p>';
	
	echo '<p>Popup Position Setting 3 :<br>';
	echo 'Left : <input  style="width: 150px;" type="text" value="';
	echo $onclickpopup_setting3_left . '" name="onclickpopup_setting3_left" id="onclickpopup_setting3_left" />		';
	echo 'Top : <input  style="width: 150px;" type="text" value="';
	echo $onclickpopup_setting3_top . '" name="onclickpopup_setting3_top" id="onclickpopup_setting3_top" /> (Only Number)<br><br>';


	echo '<p>Popup CSS Setting 4 :<br><input  style="width: 750px;" type="text" value="';
	echo $onclickpopup_setting4 . '" name="onclickpopup_setting4" id="onclickpopup_setting4" /><br>';
	echo 'Example = width: 320px; background: #FFF; text-align: center; font-family: Arial,sans-serif; padding: 10px; border: 2px solid #666;</p>';
	
	echo '<p>Popup Position Setting 4 :<br>';
	echo 'Left : <input  style="width: 150px;" type="text" value="';
	echo $onclickpopup_setting4_left . '" name="onclickpopup_setting4_left" id="onclickpopup_setting4_left" />		';
	echo 'Top : <input  style="width: 150px;" type="text" value="';
	echo $onclickpopup_setting4_top . '" name="onclickpopup_setting4_top" id="onclickpopup_setting4_top" /> (Only Number)<br><br>';


	echo '<p>Popup CSS Setting 5 :<br><input  style="width: 750px;" type="text" value="';
	echo $onclickpopup_setting5 . '" name="onclickpopup_setting5" id="onclickpopup_setting5" /><br>';
	echo 'Example = width: 320px; background: #FFF; text-align: center; font-family: Arial,sans-serif; padding: 10px; border: 2px solid #666;</p>';
	
	echo '<p>Popup Position Setting 5 :<br>';
	echo 'Left : <input  style="width: 150px;" type="text" value="';
	echo $onclickpopup_setting5_left . '" name="onclickpopup_setting5_left" id="onclickpopup_setting5_left" />		';
	echo 'Top : <input  style="width: 150px;" type="text" value="';
	echo $onclickpopup_setting5_top . '" name="onclickpopup_setting5_top" id="onclickpopup_setting5_top" /> (Only Number)<br><br>';


	echo '<input name="onclickpopup_submit" id="onclickpopup_submit" class="button-primary" value="Submit" type="submit" />';

	echo '</form>';
	
	echo '</div>';


?>