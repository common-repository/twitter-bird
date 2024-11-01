<?php

/*
Plugin Name: Twitter Bird
Version: 1.0
Plugin URI: http://www.fastdesigning.com/Goodies/twitterbird/
Author Name: Rashid Rupani
Author URI: http://www.fastdesiging.com
Description: Twitter Bird will display how many people follows you on your Twitter account when someone move mouse on the bird image. This plugin is developed by <a href="http://www.twitter.com/ImtheKiller">Rashid Rupani</a> from <a href="http://www.fastdesigning.com">Fast Designing</a>
License: A "Slug" license name e.g. GPL2
*/

/* 
Follow me on Twitter
http://www.twitter.com/ImtheKiller
http://www.twitter.com/fastdesigning
*/


/*  Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : PLUGIN AUTHOR EMAIL)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/




// create custom plugin settings menu
add_action('admin_menu', 'twitterbird_create_menu');



function twitterbird_create_menu() {

	//create new top-level menu
	add_menu_page('Twitter Bird Plugin Settings', 'Twitter Bird', 'administrator', __FILE__, 'twitterbird_settings_page',plugins_url('/images/icon.png', __FILE__));

	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}


function register_mysettings() {
	//register our settings
	register_setting( 'twitterbird-settings-group', 'twitteraccount' );
}


function twitterbird_settings_page() {

?>

<div class="wrap">
<h2>Twitter Bird from <a href="http://www.fastdesigning.com">Fast Designing</a></h2>

<form name="twitterbird_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
    <?php settings_fields( 'twitterbird-settings-group' ); ?>
	<input type="hidden" name="twitterbird_hidden" value="Y">
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Your Twitter Account</th>
        <td><input type="text" name="twitteraccount" value="<?php echo get_option('twitteraccount'); ?>" /></td>
        </tr>
    </table>
    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
</form>

<b>Installation Instruction</b>:<br>
Step 1: Goto Appearance > Editor<br>
Step 2: If you want to paste this code in to your sidebar then Click sidebar(sidebar.php) or whatever page you like<br>
Step 3: Paste this code wherever you want to display <a href="http://www.fastdesigning.com"><b>Twitter Bird</b></a><br>
	<blockquote>&lt;?php echo gotwitterbird(get_option('twitteraccount')); ?&gt;</blockquote>
Please remember this code will not work in widgets unless you have installed php plugin for widgets 
<br><br>
<b>How to UnInstall Twitter Bird</b><br>
Step 1: Remove Twitter Bird code wherever you pasted<br>
Step 2: Deactivate Plugin<br>
<br>
<div style="border:1px solid #000; background-color:#ffffed;padding:5px;">Follow me on Twitter <a href="http://www.twitter.com/ImtheKiller/" target="_blank">ImtheKiller</a> - 
<a href="http://www.twitter.com/fastdesigning/" target="_blank">Fast Designing</a></div>
</div>
<br>
<Script Language='Javascript'>
<!--
document.write(unescape('%3C%64%69%76%3E%3C%62%3E%49%66%20%79%6F%75%20%6C%69%6B%65%20%74%68%69%73%20%70%6C%75%67%69%6E%2C%20%43%6F%6E%74%72%69%62%75%74%65%20%69%74%2C%20%73%6F%20%69%20%63%61%6E%20%77%72%69%74%65%20%6D%6F%72%65%20%73%74%75%66%66%2E%3C%2F%62%3E%3C%2F%64%69%76%3E%0A%09%3C%66%6F%72%6D%20%20%61%63%74%69%6F%6E%3D%22%68%74%74%70%73%3A%2F%2F%77%77%77%2E%70%61%79%70%61%6C%2E%63%6F%6D%2F%63%67%69%2D%62%69%6E%2F%77%65%62%73%63%72%22%20%6D%65%74%68%6F%64%3D%22%70%6F%73%74%22%20%74%61%72%67%65%74%3D%22%5F%62%6C%61%6E%6B%22%3E%20%0A%09%09%3C%69%6E%70%75%74%20%6E%61%6D%65%3D%22%62%75%73%69%6E%65%73%73%22%20%76%61%6C%75%65%3D%22%72%75%70%61%6E%69%72%61%68%65%65%6C%40%79%61%68%6F%6F%2E%63%6F%6D%22%20%74%79%70%65%3D%22%68%69%64%64%65%6E%22%3E%20%0A%09%09%3C%69%6E%70%75%74%20%6E%61%6D%65%3D%22%63%6D%64%22%20%76%61%6C%75%65%3D%22%5F%78%63%6C%69%63%6B%22%20%74%79%70%65%3D%22%68%69%64%64%65%6E%22%3E%20%0A%09%09%3C%69%6E%70%75%74%20%6E%61%6D%65%3D%22%69%74%65%6D%5F%6E%61%6D%65%22%20%76%61%6C%75%65%3D%22%54%77%69%74%74%65%72%20%42%69%72%64%20%57%6F%72%64%70%72%65%73%73%20%50%6C%75%67%69%6E%22%20%74%79%70%65%3D%22%68%69%64%64%65%6E%22%3E%20%0A%09%09%3C%6C%61%62%65%6C%3E%43%6F%6E%74%72%69%62%75%74%69%6F%6E%20%61%6D%6F%75%6E%74%3A%3C%2F%6C%61%62%65%6C%3E%20%3C%69%6E%70%75%74%20%6E%61%6D%65%3D%22%61%6D%6F%75%6E%74%22%20%76%61%6C%75%65%3D%22%33%22%20%74%79%70%65%3D%22%74%65%78%74%22%3E%20%0A%09%09%3C%69%6E%70%75%74%20%6E%61%6D%65%3D%22%63%75%72%72%65%6E%63%79%5F%63%6F%64%65%22%20%76%61%6C%75%65%3D%22%55%53%44%22%20%74%79%70%65%3D%22%68%69%64%64%65%6E%22%3E%20%0A%09%09%3C%69%6E%70%75%74%20%6E%61%6D%65%3D%22%75%6E%64%65%66%69%6E%65%64%5F%71%75%61%6E%74%69%74%79%22%20%76%61%6C%75%65%3D%22%31%22%20%74%79%70%65%3D%22%68%69%64%64%65%6E%22%3E%20%0A%09%09%3C%69%6E%70%75%74%20%61%6C%69%67%6E%3D%22%6D%69%64%64%6C%65%22%20%6E%61%6D%65%3D%22%42%75%79%20%4E%6F%77%22%20%73%72%63%3D%22%68%74%74%70%73%3A%2F%2F%77%77%77%2E%70%61%79%70%61%6C%2E%63%6F%6D%2F%65%6E%5F%55%53%2F%69%2F%62%74%6E%2F%62%74%6E%5F%64%6F%6E%61%74%65%43%43%5F%4C%47%2E%67%69%66%22%20%61%6C%74%3D%22%50%61%79%50%61%6C%20%2D%20%54%68%65%20%73%61%66%65%72%2C%20%65%61%73%69%65%72%20%77%61%79%20%74%6F%20%70%61%79%20%6F%6E%6C%69%6E%65%22%20%62%6F%72%64%65%72%3D%22%30%22%20%74%79%70%65%3D%22%69%6D%61%67%65%22%3E%3C%69%6D%67%20%61%6C%74%3D%22%22%20%62%6F%72%64%65%72%3D%22%30%22%20%77%69%64%74%68%3D%22%31%22%20%68%65%69%67%68%74%3D%22%31%22%20%73%72%63%3D%22%68%74%74%70%73%3A%2F%2F%77%77%77%2E%70%61%79%70%61%6C%2E%63%6F%6D%2F%65%6E%5F%55%53%2F%69%2F%73%63%72%2F%70%69%78%65%6C%2E%67%69%66%22%20%3E%20%0A%09%3C%2F%66%6F%72%6D%3E%20%0A'));
//-->
</Script>

<?php } 




if($_POST['twitterbird_hidden'] == 'Y') {  

	$twitacc = $_POST['twitteraccount'];  
	update_option('twitteraccount', $twitacc); 

?>	<div class='updated'><p><strong><?php _e('Yout Twitter Account Updated' ); ?></strong></p></div>
<?php } 
else {
		$twitacc = get_option('twitteraccount');
}



function gotwitterbird($mytwitaccount) {
	$twitacc = $_POST['twitteraccount'];  

$birdpath = get_bloginfo(wpurl) .'/wp-content/plugins/twitter-bird/';

?>

<!-- Twitter Bird Wordpress Plugin (http://www.fastdesigning.com) -->
<link rel='stylesheet' href='<?php echo $birdpath; ?>twitterbird.css'>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'></script>
<script>$(function(){ $.ajax({ url: 'http://api.twitter.com/1/users/show.json', data: {screen_name: '<?php echo $mytwitaccount; ?>'}, dataType: 'jsonp', success: function(data) { $('#followers').html(data.followers_count); }});});</script><div class="twitterbird" onmouseover="this.className='twitterbirdfc'"onmouseout="this.className='twitterbird'"><span class="twitbirdfollwrs"><a rel="nofollow" href="http://twitter.com/<?php echo $mytwitaccount; ?>" title="Follow <?php echo $mytwitaccount; ?> on Twitter"><strong><span id="followers"></span> followers</strong></a></span></div><div class="twitbird"><a href="http://www.fastdesigning.com" target="_blank">Twitter Bird</a></div>
<!-- Twitter Bird Wordpress Plugin -->

<?php 
}
?>