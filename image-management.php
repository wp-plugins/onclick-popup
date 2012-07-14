<?php
/**
 *     Onclick Popup
 *     Copyright (C) 2012  www.gopipulse.com
 * 
 *     This program is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU General Public License as published by
 *     the Free Software Foundation, either version 3 of the License, or
 *     (at your option) any later version.
 * 
 *     This program is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU General Public License for more details.
 * 
 *     You should have received a copy of the GNU General Public License
 *     along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */	
?>

<div class="wrap">
  <?php
  	global $wpdb;
    @$mainurl = get_option('siteurl')."/wp-admin/admin.php?page=onclickpopup_admin_content";
    @$DID=@$_GET["DID"];
    @$AC=@$_GET["AC"];
    @$submittext = "Insert Message";
	if(@$AC <> "DEL" and trim(@$_POST['onclickpopup_title']) <>"")
    {
			if(@$_POST['onclickpopup_id'] == "" )
			{
					$sql = "insert into ".WP_ONCLICK_PLUGIN.""
					. " set `onclickpopup_group` = '" . trim(@$_POST['onclickpopup_group'])
					. "', `onclickpopup_title` = '" . trim(@$_POST['onclickpopup_title'])
					. "', `onclickpopup_content` = '" . trim(@$_POST['onclickpopup_content'])
					. "'";	
			}
			else
			{
					$sql = "update ".WP_ONCLICK_PLUGIN.""
					. " set `onclickpopup_group` = '" . trim(@$_POST['onclickpopup_group'])
					. "', `onclickpopup_title` = '" . trim(@$_POST['onclickpopup_title'])
					. "', `onclickpopup_content` = '" . trim(@$_POST['onclickpopup_content'])
					. "' where `onclickpopup_id` = '" . $_POST['onclickpopup_id'] 
					. "'";	
			}
			$wpdb->get_results($sql);
    }
    
    if($AC=="DEL" && $DID > 0)
    {
        $wpdb->get_results("delete from ".WP_ONCLICK_PLUGIN." where onclickpopup_id=".$DID);
    }
    
    if($DID<>"" and $AC <> "DEL")
    {
        $data = $wpdb->get_results("select * from ".WP_ONCLICK_PLUGIN." where onclickpopup_id=$DID limit 1");
        if ( empty($data) ) 
        {
           echo "<div id='message' class='error'><p>No data available! use below form to create!</p></div>";
           return;
        }
        $data = $data[0];
        if ( !empty($data) ) $onclickpopup_id_x = htmlspecialchars($data->onclickpopup_id); 
		if ( !empty($data) ) $onclickpopup_group_x = htmlspecialchars($data->onclickpopup_group); 
        if ( !empty($data) ) $onclickpopup_title_x = htmlspecialchars($data->onclickpopup_title);
		if ( !empty($data) ) $onclickpopup_content_x = htmlspecialchars($data->onclickpopup_content);
        $submittext = "Update Message";
    }
    ?>
  <h2>OnClick Popup Content Management</h2>
  <script language="JavaScript" src="<?php echo get_option('siteurl'); ?>/wp-content/plugins/onclick-popup/setting.js"></script>
  <form name="onclickpopup_form" method="post" action="<?php echo $mainurl; ?>" onsubmit="return onclickpopup_submit()"  >
    <table width="100%">
      <tr>
        <td width="28%" align="left" valign="middle">Select Group Name:</td>
      </tr>
      <tr>
        <td align="left" valign="middle"><select name="onclickpopup_group" id="onclickpopup_group">
            <option value='GROUP1' <?php if(@$onclickpopup_group_x=='GROUP1') { echo 'selected' ; } ?>>GROUP1</option>
            <option value='GROUP2' <?php if(@$onclickpopup_group_x=='GROUP2') { echo 'selected' ; } ?>>GROUP2</option>
            <option value='GROUP3' <?php if(@$onclickpopup_group_x=='GROUP3') { echo 'selected' ; } ?>>GROUP3</option>
            <option value='GROUP4' <?php if(@$onclickpopup_group_x=='GROUP4') { echo 'selected' ; } ?>>GROUP4</option>
            <option value='GROUP5' <?php if(@$onclickpopup_group_x=='GROUP5') { echo 'selected' ; } ?>>GROUP5</option>
            <option value='GROUP6' <?php if(@$onclickpopup_group_x=='GROUP6') { echo 'selected' ; } ?>>GROUP6</option>
            <option value='GROUP7' <?php if(@$onclickpopup_group_x=='GROUP7') { echo 'selected' ; } ?>>GROUP7</option>
            <option value='GROUP8' <?php if(@$onclickpopup_group_x=='GROUP8') { echo 'selected' ; } ?>>GROUP8</option>
            <option value='GROUP9' <?php if(@$onclickpopup_group_x=='GROUP9') { echo 'selected' ; } ?>>GROUP9</option>
        </select>        </tr>
      <tr>
        <td align="left" valign="middle">Enter Popup Title</td>
      </tr>
      <tr>
        <td align="left" valign="middle"><input name="onclickpopup_title" type="text" id="onclickpopup_title" value="<?php echo @$onclickpopup_title_x; ?>" size="120" maxlength="1000" /></td>
      </tr>
      <tr>
        <td align="left" valign="middle">Enter Popup Content (Can add HTML content also)</td>
      </tr>
      <tr>
        <td align="left" valign="middle"><textarea name="onclickpopup_content" cols="120" rows="12" id="onclickpopup_content"><?php echo @$onclickpopup_content_x; ?></textarea></td>
      </tr>
      <tr>
        <td height="35" colspan="2" align="left" valign="bottom">
        <input name="publish" lang="publish" class="button-primary" value="<?php echo @$submittext?>" type="submit" />
        <input name="publish" lang="publish" class="button-primary" onClick="onclickpopup_redirect()" value="Cancel" type="button" />
        </td>
      </tr>
      <input name="onclickpopup_id" id="onclickpopup_id" type="hidden" value="<?php echo @$onclickpopup_id_x; ?>">
    </table>
  </form>
  <br />
  <div class="tool-box">
    <?php
	$data = $wpdb->get_results("select * from ".WP_ONCLICK_PLUGIN." order by onclickpopup_group,onclickpopup_id");
	if ( empty($data) ) 
	{ 
		echo "<div id='message' class='error'>No data available! use below form to create!</div>";
		return;
	}
	?>
    <form name="frm_onclickpopup_display" method="post">
      <table width="100%" class="widefat" id="straymanage">
        <thead>
          <tr>
            <th width="8%" align="left" scope="col">Group</td>
            <th scope="col">Popup Title</td>
            <th width="8%" align="left" scope="col">Action</td>
          </tr>
        </thead>
        <?php 
        $i = 0;
        foreach ( $data as $data ) { 
        ?>
        <tbody>
          <tr class="<?php if ($i&1) { echo'alternate'; } else { echo ''; }?>">
            <td align="left" valign="middle"><?php echo(stripslashes($data->onclickpopup_group)); ?></td>
            <td align="left" valign="middle"><?php echo(stripslashes($data->onclickpopup_title)); ?></td>
            <td align="left" valign="middle"><a href="admin.php?page=onclickpopup_admin_content&DID=<?php echo($data->onclickpopup_id); ?>">Edit</a> &nbsp; <a onClick="javascript:onclickpopup_delete('<?php echo($data->onclickpopup_id); ?>')" href="javascript:void(0);">Delete</a></td>
          </tr>
        </tbody>
        <?php $i = $i+1; } ?>
      </table>
      <br />
      Note: Check official website <a href="http://www.gopipulse.com/work/2011/11/13/wordpress-plugin-onclick-popup/" target="_blank">gopipulse.com</a> for live demo and more help.
    </form>
  </div>
</div>
