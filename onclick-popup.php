<?php

/*
Plugin Name: Onclick Popup
Plugin URI: http://www.gopiplus.com/work/2011/11/13/wordpress-plugin-onclick-popup/
Description: One easy way to send your visitors a welcome message, notice, or advertisement is to add this popup plugin to your site. WordPress on-click Popup plugin will create a popup message to your website. The popup will appear on text click so it is named on-click popup.
Author: Gopi.R
Version: 2.0
Author URI: http://www.gopiplus.com/work/
Donate link: http://www.gopiplus.com/work/2011/11/13/wordpress-plugin-onclick-popup/
Tags: popup, onclick, plugin, widget
*/

/**
 *     Onclick Popup
 *     Copyright (C) 2012  www.gopiplus.com
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

global $wpdb, $wp_version;
define("WP_ONCLICK_PLUGIN", $wpdb->prefix . "onclick_popup_plugin");

function OnClickPopUp() 
{
	global $wpdb;
	$setting = get_option('onclickpopup_setting1');
	$setting_left = get_option('onclickpopup_setting1_left');
	$setting_top = get_option('onclickpopup_setting1_top');
	?>
    <style type="text/css">
	#PopUpFad1, #PopUpFad2, #PopUpFad3, #PopUpFad4, #PopUpFad5, #PopUpFad6 
	{
		top: <?php echo $setting_top; ?>px;
		<?php echo $setting; ?>
		position: absolute;
		margin: 0 auto;
		display: none;
		opacity: 0;
		KHTMLOpacity: 0;
		filter: alpha(opacity=0); 
		-moz-opacity: 0;
		z-index: 1000;	
	}
	</style>
    <link rel="stylesheet" type="text/css" href="<?php echo get_option('siteurl'); ?>/wp-content/plugins/onclick-popup/onclick-popup.css" />
	<?php
	$sSql = "select * from ".WP_ONCLICK_PLUGIN." where 1=1 and onclickpopup_group='GROUP1' order by rand() limit 0,6;";
	$data = $wpdb->get_results($sSql);
	if ( ! empty($data) ) 
	{
		@$counter = 1;
		foreach ( $data as $data ) 
		{
			@$onclickpopup_group = $data->onclickpopup_group;
			@$onclickpopup_title = htmlspecialchars($data->onclickpopup_title);
			@$onclickpopup_content = htmlspecialchars($data->onclickpopup_content);
			@$div = "'PopUpFad".@$counter."'";
			@$li = @$li . '<li><a href="#" onclick="PopUpFadOpen('.@$div.', '.@$setting_left.')">'.$onclickpopup_title.'</a></li>';
			?>
			<div id="PopUpFad<?php echo @$counter; ?>">
      		<div class="PopUpFadClose"><a href="#" onClick="PopUpFadCloseX('PopUpFad<?php echo @$counter; ?>')">
            <img src="<?php echo get_option('siteurl'); ?>/wp-content/plugins/onclick-popup/close.jpg" /></a></div>
      		<div><?php echo @$onclickpopup_content; ?></div>
    		</div>
    		<?php
			@$counter = $counter + 1;
		}
	}
	?><ul><?php echo @$li; ?></ul><?php
}

function onclickpopup_install() 
{
	global $wpdb;
	if($wpdb->get_var("show tables like '". WP_ONCLICK_PLUGIN . "'") != WP_ONCLICK_PLUGIN) 
	{
		$sSql = "CREATE TABLE IF NOT EXISTS `". WP_ONCLICK_PLUGIN . "` (";
		$sSql = $sSql . "`onclickpopup_id` INT NOT NULL AUTO_INCREMENT ,";
		$sSql = $sSql . "`onclickpopup_group` VARCHAR( 10 ) NOT NULL ,";
		$sSql = $sSql . "`onclickpopup_title` VARCHAR( 1024 ) NOT NULL ,";
		$sSql = $sSql . "`onclickpopup_content` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL ,";
		$sSql = $sSql . "`onclickpopup_Random` VARCHAR( 4 ) NOT NULL ,";
		$sSql = $sSql . "`onclickpopup_Extra1` VARCHAR( 100 ) NOT NULL ,";
		$sSql = $sSql . "`onclickpopup_Extra2` VARCHAR( 100 ) NOT NULL ,";
		$sSql = $sSql . "`onclickpopup_Extra3` VARCHAR( 100 ) NOT NULL ,";
		$sSql = $sSql . "`onclickpopup_date` datetime NOT NULL default '0000-00-00 00:00:00' ,";
		$sSql = $sSql . "PRIMARY KEY ( `onclickpopup_id` )";
		$sSql = $sSql . ")";
		$wpdb->query($sSql);
		
		$IsSql = "INSERT INTO `". WP_ONCLICK_PLUGIN . "` (`onclickpopup_group`, `onclickpopup_title`, `onclickpopup_content`, `onclickpopup_date`)"; 
		$dummy = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.";
		$dummy = $dummy . "Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet, nisi orci ullamcorper massa";
		for($i=1;$i<=5;$i++)
		{
			$sSql = $IsSql . " VALUES ('GROUP1', 'Sample Title $i', '$dummy', '0000-00-00 00:00:00');";
			$wpdb->query($sSql);
		}
	}

	add_option('onclickpopup_title', "onclickpopup_title");
	add_option('onclickpopup_setting1', "width: 320px; background: #FFF; text-align: center; font-family: Arial,sans-serif; padding: 10px; border: 2px solid #666;");
	add_option('onclickpopup_setting1_left', '400');
	add_option('onclickpopup_setting1_top', '50');
	add_option('onclickpopup_setting2', "width: 320px; background: #FFF; text-align: center; font-family: Arial,sans-serif; padding: 10px; border: 2px solid #666;");
	add_option('onclickpopup_setting2_left', '400');
	add_option('onclickpopup_setting2_top', '50');
	add_option('onclickpopup_setting3', "width: 320px; background: #FFF; text-align: center; font-family: Arial,sans-serif; padding: 10px; border: 2px solid #666;");
	add_option('onclickpopup_setting3_left', '400');
	add_option('onclickpopup_setting3_top', '50');
	add_option('onclickpopup_setting4', "width: 320px; background: #FFF; text-align: center; font-family: Arial,sans-serif; padding: 10px; border: 2px solid #666;");
	add_option('onclickpopup_setting4_left', '400');
	add_option('onclickpopup_setting4_top', '50');
	add_option('onclickpopup_setting5', "width: 320px; background: #FFF; text-align: center; font-family: Arial,sans-serif; padding: 10px; border: 2px solid #666;");
	add_option('onclickpopup_setting5_left', '400');
	add_option('onclickpopup_setting5_top', '50');
}

function onclickpopup_admin_options() 
{
	include_once("setting.php");
}

function onclickpopup_admin_content() 
{
	include_once("image-management.php");
}

function onclickpopup_show_filter($content)
{
	return 	preg_replace_callback('/\[ONCLICK-POPUP:(.*?)\]/sim','onclickpopup_show_filter_callback',$content);
}

function onclickpopup_show_filter_callback($matches) 
{
	global $wpdb;
	$scode = $matches[1];

	//[ONCLICK-POPUP:SETTING=1:GROUP=GROUP1]

	list($setting_main, $group_main) = split("[:.-]", $scode);
	
	list($setting_cap, $setting) = split('[=.-]', $setting_main);
	list($group_cap, $group) = split('[=.-]', $group_main);
	if($setting == "1")
	{
		$setting = get_option('onclickpopup_setting1');
		$setting_left = get_option('onclickpopup_setting1_left');
		$setting_top = get_option('onclickpopup_setting1_top');
	}
	elseif($setting == "2")
	{
		$setting = get_option('onclickpopup_setting2');
		$setting_left = get_option('onclickpopup_setting2_left');
		$setting_top = get_option('onclickpopup_setting2_top');
	}
	elseif($setting == "3")
	{
		$setting = get_option('onclickpopup_setting3');
		$setting_left = get_option('onclickpopup_setting3_left');
		$setting_top = get_option('onclickpopup_setting3_top');
	}
	elseif($setting == "4")
	{
		$setting = get_option('onclickpopup_setting4');
		$setting_left = get_option('onclickpopup_setting4_left');
		$setting_top = get_option('onclickpopup_setting4_top');
	}
	elseif($setting == "5")
	{
		$setting = get_option('onclickpopup_setting5');
		$setting_left = get_option('onclickpopup_setting5_left');
		$setting_top = get_option('onclickpopup_setting5_top');
	}
	
	@$OnClickPopup = @$OnClickPopup . '<style type="text/css">';
	@$OnClickPopup = @$OnClickPopup . '#PopUpFad1, #PopUpFad2, #PopUpFad3, #PopUpFad4, #PopUpFad5, #PopUpFad6 ';
	@$OnClickPopup = @$OnClickPopup . '{';
		@$OnClickPopup = @$OnClickPopup . 'top: '. $setting_top. 'px; ';
		@$OnClickPopup = @$OnClickPopup . $setting;
		@$OnClickPopup = @$OnClickPopup . 'position: absolute;';
		@$OnClickPopup = @$OnClickPopup . 'margin: 0 auto;';
		@$OnClickPopup = @$OnClickPopup . 'display: none;';
		@$OnClickPopup = @$OnClickPopup . 'opacity: 0;';
		@$OnClickPopup = @$OnClickPopup . 'KHTMLOpacity: 0;';
		@$OnClickPopup = @$OnClickPopup . 'filter: alpha(opacity=0); ';
		@$OnClickPopup = @$OnClickPopup . '-moz-opacity: 0;';
		@$OnClickPopup = @$OnClickPopup . 'z-index: 1000;	';
	@$OnClickPopup = @$OnClickPopup . '}';
	@$OnClickPopup = @$OnClickPopup . '</style>';
    @$OnClickPopup = @$OnClickPopup . '<link rel="stylesheet" type="text/css" href="'.get_option('siteurl').'/wp-content/plugins/onclick-popup/onclick-popup.css" />';
    
	$sSql = "select * from ".WP_ONCLICK_PLUGIN." where 1=1 and onclickpopup_group='".$group."' order by rand() limit 0,6;";
	$data = $wpdb->get_results($sSql);
	if ( ! empty($data) ) 
	{
		@$counter = 1;
		foreach ( $data as $data ) 
		{
			$onclickpopup_group = $data->onclickpopup_group;
			$onclickpopup_title = $data->onclickpopup_title;
			$onclickpopup_content = $data->onclickpopup_content;
			@$div = "'PopUpFad".@$counter."'";
			@$li = @$li . '<div><a href="#" onclick="PopUpFadOpen('.@$div.', '.@$setting_left.')">'.$onclickpopup_title.'</a></div>';
			
			@$OnClickPopup = @$OnClickPopup . '<div id='.@$div.'>';
      		@$OnClickPopup = @$OnClickPopup . '<div class="PopUpFadClose"><a href="#" onClick="PopUpFadCloseX('.$div.')">';
            @$OnClickPopup = @$OnClickPopup . '<img src="'.get_option('siteurl').'/wp-content/plugins/onclick-popup/close.jpg" /></a></div>';
      		@$OnClickPopup = @$OnClickPopup . '<div>'.@$onclickpopup_content.'</div>';
    		@$OnClickPopup = @$OnClickPopup . '</div>';
    		
			@$counter = $counter + 1;
		}
		@$OnClickPopup = @$OnClickPopup .@$li;
	}
	return $OnClickPopup;
}

function onclickpopup_deactivation() 
{

}

function onclickpopup_add_javascript_files() 
{	
	wp_enqueue_script( 'onclick-popup', get_option('siteurl').'/wp-content/plugins/onclick-popup/onclick-popup.js');
}

function onclickpopup_add_to_menu() 
{
	add_menu_page( __( 'OnClick Popup', 'onclickpopup' ), __( 'OnClick Popup', 'onclickpopup' ), 'administrator', 'onclickpopup', 'onclickpopup_admin_options' );
	add_submenu_page( 'onclickpopup', __( 'Popup Setting', 'onclickpopup' ), __( 'Popup Setting', 'onclickpopup' ),'administrator', 'onclickpopup', 'onclickpopup_admin_options' );
	add_submenu_page( 'onclickpopup', __( 'Content Management', 'onclickpopup' ), __( 'Content Management', 'onclickpopup' ),'administrator', 'onclickpopup_admin_content', 'onclickpopup_admin_content' );
}

function onclickpopup_widget($args) 
{
	extract($args);
	echo $before_widget . $before_title;
	echo get_option('onclickpopup_Title');
	echo $after_title;
	OnClickPopUp();
	echo $after_widget;
}

function onclickpopup_control() 
{
	echo 'Onclick Popup';
}

function onclickpopup_init()
{
	if(function_exists('register_sidebar_widget')) 
	{
		wp_register_sidebar_widget('onclick-popup', 'Onclick Popup', 'onclickpopup_widget');
	}
	
	if(function_exists('register_widget_control')) 
	{
		wp_register_sidebar_widget('onclick-popup', array('Onclick Popup', 'widgets'), 'onclickpopup_control');
	} 
}

if (!is_admin())
{
	add_action('init', 'onclickpopup_add_javascript_files');
}
else
{
	add_action('admin_menu', 'onclickpopup_add_to_menu');
}
add_filter('the_content','onclickpopup_show_filter');
add_action("plugins_loaded", "onclickpopup_init");
register_activation_hook(__FILE__, 'onclickpopup_install');
register_deactivation_hook(__FILE__, 'onclickpopup_deactivation');
?>
