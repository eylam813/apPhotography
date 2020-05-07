<?php
/*
Plugin Name: WP Content Copy Protection & No Right Click
Plugin URI: http://wordpress.org/plugins/w-p-content-copy-protector/
Description: This wp plugin protect the posts content from being copied by any other web site author , you dont want your content to spread without your permission!!
Version: 2.3
Author: wp-buy
Text Domain: wp-content-copy-protector
Domain Path: /languages
Author URI: http://www.wp-buy.com/
*/
?>
<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
//define all variables the needed alot
include 'the_globals.php';
include_once('notifications.php');
$wccp_settings = wccp_read_options();
//---------------------------------------------------------------------------------------------
//Load plugin textdomain to load translations
//---------------------------------------------------------------------------------------------
function wccp_free_load_textdomain() {
  load_plugin_textdomain( 'wp-content-copy-protector', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}
add_action( 'init', 'wccp_free_load_textdomain' );
//---------------------------------------------------------<!-- SimpleTabs -->
function wccp_enqueue_scripts() {
	global $pluginsurl;
	$admincore = '';
	if (isset($_GET['page'])) $admincore = sanitize_text_field($_GET['page']);
	if( ( current_user_can('editor') || current_user_can('administrator') ) && $admincore == 'wccpoptionspro') {
	wp_enqueue_script('jquery');
	wp_register_script('simpletabsjs', $pluginsurl.'/js/simpletabs_1.3.js');
	wp_enqueue_script('simpletabsjs');
	
	wp_register_style('simpletabscss', $pluginsurl.'/css/simpletabs.css');
	wp_enqueue_style('simpletabscss');
	}
}
// Hook into the 'wp_enqueue_scripts' action
//add_action( 'admin_head', 'wccp_enqueue_scripts' );
add_action('admin_enqueue_scripts', 'wccp_enqueue_scripts');
//------------------------------------------------------------------------
function wpcp_disable_Right_Click()
{
global $wccp_settings;
?>
	<script id="wpcp_disable_Right_Click" type="text/javascript">
	//<![CDATA[
	document.ondragstart = function() { return false;}
	/* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
	Disable context menu on images by GreenLava Version 1.0
	^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */
	    function nocontext(e) {
	       return false;
	    }
	    document.oncontextmenu = nocontext;
	//]]>
	</script>
<?php
}
//////////////////////////////////////////////////////////////////////////////////////
function wpcp_disable_selection()
{
global $wccp_settings;
?>
<script id="wpcp_disable_selection" type="text/javascript">
//<![CDATA[
var image_save_msg='You Can Not Save images!';
	var no_menu_msg='Context Menu disabled!';
	var smessage = "<?php echo $wccp_settings['smessage'];?>";

function disableEnterKey(e)
{
	var elemtype = e.target.tagName;
	
	elemtype = elemtype.toUpperCase();
	
	if (elemtype == "TEXT" || elemtype == "TEXTAREA" || elemtype == "INPUT" || elemtype == "PASSWORD" || elemtype == "SELECT" || elemtype == "OPTION" || elemtype == "EMBED")
	{
		elemtype = 'TEXT';
	}
	
	if (e.ctrlKey){
     var key;
     if(window.event)
          key = window.event.keyCode;     //IE
     else
          key = e.which;     //firefox (97)
    //if (key != 17) alert(key);
     if (elemtype!= 'TEXT' && (key == 97 || key == 65 || key == 67 || key == 99 || key == 88 || key == 120 || key == 26 || key == 85  || key == 86 || key == 83 || key == 43))
     {
          show_wpcp_message('You are not allowed to copy content or view source');
          return false;
     }else
     	return true;
     }
}

//////////////////////////////////////////////////////////////////////////////////////
function disable_copy(e)
{	
	var elemtype = e.target.tagName;
	
	elemtype = elemtype.toUpperCase();
	
	if (elemtype == "TEXT" || elemtype == "TEXTAREA" || elemtype == "INPUT" || elemtype == "PASSWORD" || elemtype == "SELECT" || elemtype == "OPTION" || elemtype == "EMBED")
	{
		elemtype = 'TEXT';
	}
	var isSafari = /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);
	
	var checker_IMG = '<?php echo $wccp_settings['img'];?>';
	if (elemtype == "IMG" && checker_IMG == 'checked' && e.detail >= 2) {show_wpcp_message(alertMsg_IMG);return false;}
	if (elemtype != "TEXT")
	{
		if (smessage !== "" && e.detail == 2)
			show_wpcp_message(smessage);
		
		if (isSafari)
			return true;
		else
			return false;
	}	
}

//////////////////////////////////////////////////////////////////////////////////////
function disable_copy_ie()
{
	var elemtype = window.event.srcElement.nodeName;
	elemtype = elemtype.toUpperCase();
	if (elemtype == "IMG") {show_wpcp_message(alertMsg_IMG);return false;}
	if (elemtype != "TEXT" && elemtype != "TEXTAREA" && elemtype != "INPUT" && elemtype != "PASSWORD" && elemtype != "SELECT" && elemtype != "OPTION" && elemtype != "EMBED")
	{
		return false;
	}
}	
function reEnable()
{
	return true;
}
document.onkeydown = disableEnterKey;
document.onselectstart = disable_copy_ie;
if(navigator.userAgent.indexOf('MSIE')==-1)
{
	document.onmousedown = disable_copy;
	document.onclick = reEnable;
}
function disableSelection(target)
{
    //For IE This code will work
    if (typeof target.onselectstart!="undefined")
    target.onselectstart = disable_copy_ie;
    
    //For Firefox This code will work
    else if (typeof target.style.MozUserSelect!="undefined")
    {target.style.MozUserSelect="none";}
    
    //All other  (ie: Opera) This code will work
    else
    target.onmousedown=function(){return false}
    target.style.cursor = "default";
}
//Calling the JS function directly just after body load
window.onload = function(){disableSelection(document.body);};
//]]>
</script>
<?php
}
//------------------------------------------------------------------------
function alert_message()
{
	global $wccp_settings;
?>
	<div id="wpcp-error-message" class="msgmsg-box-wpcp warning-wpcp hideme"><span>error: </span><?php echo $wccp_settings['smessage'];?></div>
	<script>
	var timeout_result;
	function show_wpcp_message(smessage)
	{
		if (smessage !== "")
			{
			var smessage_text = '<span>Alert: </span>'+smessage;
			document.getElementById("wpcp-error-message").innerHTML = smessage_text;
			document.getElementById("wpcp-error-message").className = "msgmsg-box-wpcp warning-wpcp showme";
			clearTimeout(timeout_result);
			timeout_result = setTimeout(hide_message, 3000);
			}
	}
	function hide_message()
	{
		document.getElementById("wpcp-error-message").className = "msgmsg-box-wpcp warning-wpcp hideme";
	}
	</script>
	<?php 
	global $wccp_settings;
	if(array_key_exists('prnt_scr_msg', $wccp_settings))
	{
	if($wccp_settings['prnt_scr_msg'] != ''){ ?>
	<style>
	@media print {
	body * {display: none !important;}
		body:after {
		content: "<?php echo $wccp_settings['prnt_scr_msg']; ?>"; }
	}
	</style>
	<?php }} ?>
	<style type="text/css">
	#wpcp-error-message {
	    direction: ltr;
	    text-align: center;
	    transition: opacity 900ms ease 0s;
	    z-index: 99999999;
	}
	.hideme {
    	opacity:0;
    	visibility: hidden;
	}
	.showme {
    	opacity:1;
    	visibility: visible;
	}
	.msgmsg-box-wpcp {
		border-radius: 10px;
		color: #555;
		font-family: Tahoma;
		font-size: 11px;
		margin: 10px;
		padding: 10px 36px;
		position: fixed;
		width: 255px;
		top: 50%;
  		left: 50%;
  		margin-top: -10px;
  		margin-left: -130px;
  		-webkit-box-shadow: 0px 0px 34px 2px rgba(242,191,191,1);
		-moz-box-shadow: 0px 0px 34px 2px rgba(242,191,191,1);
		box-shadow: 0px 0px 34px 2px rgba(242,191,191,1);
	}
	.msgmsg-box-wpcp span {
		font-weight:bold;
		text-transform:uppercase;
	}
	.error-wpcp {<?php global $pluginsurl; ?>
		background:#ffecec url('<?php echo $pluginsurl ?>/images/error.png') no-repeat 10px 50%;
		border:1px solid #f5aca6;
	}
	.success {
		background:#e9ffd9 url('<?php echo $pluginsurl ?>/images/success.png') no-repeat 10px 50%;
		border:1px solid #a6ca8a;
	}
	.warning-wpcp {
		background:#ffecec url('<?php echo $pluginsurl ?>/images/warning.png') no-repeat 10px 50%;
		border:1px solid #f5aca6;
	}
	.notice {
		background:#e3f7fc url('<?php echo $pluginsurl ?>/images/notice.png') no-repeat 10px 50%;
		border:1px solid #8ed9f6;
	}
    </style>
<?php
}
//------------------------------------------------------------------------
function wccp_css_script()
{
?>
<style>
.unselectable
{
-moz-user-select:none;
-webkit-user-select:none;
cursor: default;
}
html
{
-webkit-touch-callout: none;
-webkit-user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
-webkit-tap-highlight-color: rgba(0,0,0,0);
}
</style>
<script id="wpcp_css_disable_selection" type="text/javascript">
var e = document.getElementsByTagName('body')[0];
if(e)
{
	e.setAttribute('unselectable',on);
}
</script>
<?php
}
//------------------------------------------------------------------------
/* sanitize */
function wccp_sanitize($unsafe_val,$type='text')
{
	switch ($type) {
		case 'text': return sanitize_text_field($unsafe_val);
			break;
		case 'int': return intval($unsafe_val);
			break;
		case 'email': return sanitize_email($unsafe_val);
			break;
		case 'filename': return sanitize_file_name($unsafe_val);
			break;
		case 'title': return sanitize_title($unsafe_val);
			break;
		case 'URL': return esc_url($unsafe_val);
			break;
		case 'textbox': return htmlentities(sanitize_text_field($unsafe_val),ENT_QUOTES);
			break;
		default:
			return sanitize_text_field($unsafe_val);
	}
}
//------------------------------------------------------------------------
function wccp_css_settings()
{
	global $wccp_settings;
	if(!current_user_can( 'manage_options' ) || (current_user_can( 'manage_options' ) && $wccp_settings['exclude_admin_from_protection'] == 'No')){
			if (((is_home() || is_front_page() || is_archive() || is_post_type_archive() ||  is_404() || is_attachment() || is_author() || is_category() || is_feed()) && $wccp_settings['home_css_protection'] == 'Enabled'))
			{
				wccp_css_script();
				return;
			}
			if (is_single() && $wccp_settings['posts_css_protection'] == 'Enabled')
			{
				wccp_css_script();
				return;
			}
			if (is_page() && !is_front_page() && $wccp_settings['pages_css_protection'] == 'Enabled')
			{
				wccp_css_script();
				return;
			}
	}
}
//------------------------------------------------------------------------
function wccp_main_settings()
{
	global $wccp_settings;
	if(!current_user_can( 'manage_options' ) || (current_user_can( 'manage_options' ) && $wccp_settings['exclude_admin_from_protection'] == 'No')){
			if (((is_home() || is_front_page() || is_archive() || is_post_type_archive() ||  is_404() || is_attachment() || is_author() || is_category() || is_feed() || is_search()) && $wccp_settings['home_page_protection'] == 'Enabled'))
			{
				wpcp_disable_selection();
				return;
			}
			if (is_single() && $wccp_settings['single_posts_protection'] == 'Enabled')
			{
				wpcp_disable_selection();
				return;
			}
			if (is_page() && !is_front_page() && $wccp_settings['page_protection'] == 'Enabled')
			{
				wpcp_disable_selection();
				return;
			}
	}
}
//------------------------------------------------------------------------
function right_click_premium_settings()
{
	global $wccp_settings;
	if(!current_user_can( 'manage_options' ) || (current_user_can( 'manage_options' ) && $wccp_settings['exclude_admin_from_protection'] == 'No')){
			if (((is_home() || is_front_page() || is_archive() || is_post_type_archive() ||  is_404() || is_attachment() || is_author() || is_category() || is_feed()) && $wccp_settings['right_click_protection_homepage'] == 'checked'))
			{
				wpcp_disable_Right_Click();
				return;
			}
		if (is_single() && $wccp_settings['right_click_protection_posts'] == 'checked')
			{
				wpcp_disable_Right_Click();
				return;
			}
		if (is_page() && !is_front_page() && $wccp_settings['right_click_protection_posts'] == 'checked')
			{
				wpcp_disable_Right_Click();
				return;
			}
	}
}
//------------------------------------------------------------------------
function wccp_find_image_urls( $content ) {
	
	global $wccp_settings;
	
	$remove_img_urls = "Yes";
	
	if($remove_img_urls == "Yes"){

	$regexp = '(href=\"http)(.*)(.jpg|.jpeg|.png)';

	if(preg_match_all("/$regexp/iU", $content, $matches, PREG_SET_ORDER)) {

		if( !empty($matches) ) {

			$srcUrl = get_permalink();

			for ($i=0; $i <= count($matches); $i++)
			{
				if (isset($matches[$i]) && isset($matches[$i][0]))

					$tag = $matches[$i][0];

				else

					$tag = '';

				$tag2 = '';

				$content = str_replace($tag,$tag2,$content);
			}
		}
	}
	}
	return '<div class="protcted_area">'.$content.'</div>';
}
//------------------------------------------------------------------------
// Add specific CSS class by filter
function wccp_class_names($classes) {
global  $wccp_settings;
if(!current_user_can( 'manage_options' ) || (current_user_can( 'manage_options' ) && $wccp_settings['exclude_admin_from_protection'] == 'No'))
	{
			if ($wccp_settings['home_css_protection'] == 'Enabled' || $wccp_settings['posts_css_protection'] == 'Enabled' ||  $wccp_settings['pages_css_protection'] == 'Enabled')
			{
				$classes[] = 'unselectable';
				return $classes;
			}
			else
			{
				$classes[] = 'none';
				return $classes;
			}
	}else
	{
		$classes[] = 'none';
		return $classes;
	}
}
//------------------------------------------------------------------------
add_action('wp_head','wccp_main_settings');
add_action('wp_head','right_click_premium_settings');
add_action('wp_head','wccp_css_settings');
add_action('wp_footer','alert_message');
add_filter('body_class','wccp_class_names');
//add_filter( 'the_content', 'wccp_find_image_urls');
//-------------------------------------------------------Function to read options from the database
function wccp_read_options()
{
	if (get_option('wccp_settings'))
		$wccp_settings = get_option('wccp_settings');
	else
		$wccp_settings = wccp_default_options();

	return $wccp_settings;
}
//-------------------------------------------------------Set default values to the array
function wccp_default_options(){
	$pluginsurl = plugins_url( '', __FILE__ );
	$wccp_settings =
	Array (
			'single_posts_protection' => 'Enabled', // prevent content copy, take 3 parameters, 1.content: to prevent content copy only	2.all 	3.none
			'home_page_protection' => 'Enabled', //
			'page_protection' => 'Enabled', //
			'right_click_protection_posts' => 'checked', //
			'right_click_protection_homepage' => 'checked', //
			'right_click_protection_pages' => 'checked', //
			'home_css_protection' => 'Enabled', // premium option
			'posts_css_protection' => 'Enabled', // premium option
			'pages_css_protection' => 'Enabled', // premium option
			'exclude_admin_from_protection' => 'No',
			'img' => '',
			'a' => '',
			'pb' => '',
			'input' => '',
			'h' => '',
			'textarea' => '',
			'emptyspaces' => '',
			'smessage' => 'Content is protected !!',
			'alert_msg_img' => '',
			'alert_msg_a' => '',
			'alert_msg_pb' => '',
			'alert_msg_input' => '',
			'alert_msg_h' => '',
			'alert_msg_textarea' => '',
			'alert_msg_emptyspaces' => '',
			'prnt_scr_msg' => 'You are not allowed to print preview this page, Thank you'
		);
	return $wccp_settings;
}
//---------------------------------------------Add button to the admin bar
add_action('admin_bar_menu', 'add_items',  40);
function add_items($admin_bar)
{
global $pluginsurl;
$wccpadminurl = get_admin_url();
//The properties of the new item. Read More about the missing 'parent' parameter below
    $args = array(
            'id'    => 'Protection',
            'title' => __('<img src="'.$pluginsurl.'/images/adminbaricon.png" style="vertical-align:middle;margin-right:5px;width: 22px;" alt="Protection" title="Protection" />Protection' ),
            'href'  => $wccpadminurl.'options-general.php?page=wccpoptionspro',
            'meta'  => array('title' => __('WP Content Copy Protection'),)
            );
 
    //This is where the magic works.
    $admin_bar->add_menu( $args);
}
//---------------------------------------- Add plugin settings link to Plugins page
function wccp_plugin_add_settings_link( $links ) {
	$settings_link = '<a href="options-general.php?page=wccpoptionspro">' . __( 'Settings' ) . '</a>';
	array_push( $links, $settings_link );
	return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'wccp_plugin_add_settings_link' );
//------------------------------------------------------------------------
function wccp_options_page_pro() {
     include 'admin-core.php';
}
//------------------------------------------------------------------------
//Make a WordPress function to add to the correct menu.
function wpccp_after_plugin_row( $plugin_file, $plugin_data, $status ) {
	$plugin_name = substr(__FILE__, strlen(ABSPATH . PLUGINDIR . '/'));
	$class_name = '';
	if ($plugin_file != $plugin_name) return;
	$FS_PATH = plugin_basename( __FILE__ );
	if ($FS_PATH)
	{
		$class_name = $plugin_data['slug'];
		$p_url = "http://www.wp-buy.com/product/wp-content-copy-protection-pro/";
		echo '<tr id="' .$class_name. '-plugin-update" class="active">';
		echo '<th class="check-column" scope="row"></th>';
		echo '<td colspan="3" class="plugin-update">';
		echo '<div id="wccp-update-message" style="background:#edf4f7;padding:10px;" >';
		echo __('You are running WP Content Copy Protection & No Right Click (free). To get more features, you can ') . '<a href="' .$p_url. '" target="_blank"><strong>' . __('Upgrade Now') . '</strong></a>,    <a id="HideMe" href="javascript:void(0)"><strong>' . __('Dismiss') . '</strong></a>.';
		echo '</div>';
		echo '</td>';
		echo '</tr>';
	}
	?>
	<script type="text/javascript">
	
	function wccp_hide_upgrade_message()
	{
		jQuery("#wccp-update-message").empty(); 
		jQuery("#wccp-update-message").removeAttr("style"); 
		localStorage.setItem("wccp_upgrade_message", "hide_upgrade_msg");
		if (!jQuery("#<?php echo $class_name;?>-update")[0]){// Do something if class exists
			jQuery('#<?php echo $class_name;?>-plugin-update').closest('tr').prev().removeClass('update');
		}
		jQuery('#<?php echo $class_name;?>-plugin-update').empty();
	}
	jQuery(document).ready(function() {
		
		var row = jQuery('#<?php echo $class_name;?>-plugin-update').closest('tr').prev();
		jQuery(row).addClass('update');
		
		jQuery("#HideMe").click(wccp_hide_upgrade_message);
	  
	  if(localStorage.getItem("wccp_upgrade_message") == "hide_upgrade_msg")
	  {
		 wccp_hide_upgrade_message();
	  }

	});
	</script>
	<?php
}
?>
<?php
$path = plugin_basename( __FILE__ );
add_action("after_plugin_row_{$path}", "wpccp_after_plugin_row", 10, 3 );
//------------------------------------------------------------------------
//Make our function to call the WordPress function to add to the correct menu.
function wccp_add_options() {
	add_options_page(__('WP Content Copy Protection', 'wp-content-copy-protector'), __('WP Content Copy Protection', 'wp-content-copy-protector'), 'manage_options', 'wccpoptionspro', 'wccp_options_page_pro');
}
//First use the add_action to add onto the WordPress menu.
add_action('admin_menu', 'wccp_add_options');
?>