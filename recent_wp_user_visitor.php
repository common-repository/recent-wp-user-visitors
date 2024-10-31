<?php
/**
 * Plugin Name: Recent WP User Visitors
 * Plugin URI: https://profiles.wordpress.org/php-developer-1
 * Description: Its display recent visited user for your each post or page with image and email.
 * Version: 1.0.0
 * Author: php-developer  
 * Author URI: https://profiles.wordpress.org/php-developer-1
 * Contributors: php-developer 
 * License: GPLv2 or later
 * Tags :  Tags: recent visited user,recent visited user image ,visitors image, user image,recent visitors photo, visitors  avatar, visitors , visitors image, user avatar, user image, user photo, widget
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
**/
?>
<?php
// create custom plugin settings menu
add_action('admin_menu', 'rwuv_admin_menu');

function rwuv_admin_menu() {

    //create new top-level menu
    add_menu_page('Recent WP User Visitors Plugin Settings', 'Recent WP User Visitors Settings', 'administrator', __FILE__, 'rwuv_recent_wp_user_visitor_page',plugins_url('/images/icon.png', __FILE__));

    //call register settings function
    add_action( 'admin_init', 'register_rwuv_mysettings' );
}


function register_rwuv_mysettings() {
    //register our settings
    register_setting( 'recent_wp_user_visitor-settings-group', 'rwuv_usercount_data' );
    register_setting( 'recent_wp_user_visitor-settings-group', 'rwuv_usercount' );
    register_setting( 'recent_wp_user_visitor-settings-group', 'rwuv_linkuser' );
    register_setting( 'recent_wp_user_visitor-settings-group', 'rwuv_caption' );
    register_setting( 'recent_wp_user_visitor-settings-group', 'rwuv_thum_size' );
    register_setting( 'recent_wp_user_visitor-settings-group', 'rwuv_is_post' );
    register_setting( 'recent_wp_user_visitor-settings-group', 'rwuv_is_page' );
    register_setting( 'recent_wp_user_visitor-settings-group', 'rwuv_is_all' );
 
}

///////////////// function for display admin side settings
function rwuv_recent_wp_user_visitor_page() {
    
?>
<div class="wrap">
<h2><?php  _e('Recent WP User Visitors') ?> </h2>
<?php ///////////// admin side form start ?>
<form method="post" action="options.php">
    <?php settings_fields( 'recent_wp_user_visitor-settings-group' ); ?>
    <table class="form-table">

         <tr valign="top">
        <th scope="row"><?php  _e('Number Of Users to store in data base per post ? :') ?> </th>
        <td><input size="2" maxlength="2" type="text" name="rwuv_usercount_data" value="<?php echo get_option('rwuv_usercount_data'); ?>" /></td>
        </tr>
    
    
        <tr valign="top">
        <th scope="row"><?php  _e('Number Of Users for Each Row :') ?> </th>
        <td><input size="2" maxlength="2" type="text" name="rwuv_usercount" value="<?php echo get_option('rwuv_usercount'); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row"><?php  _e('Link On Image For Email :') ?></th>
        <td>
        <?php $select_value = get_option('rwuv_linkuser'); 
        if($select_value=='no')
        {
            $sel0 ='selected';
        }else{
           $sel1 ='selected'; 
        }
        ?>
        <select name="rwuv_linkuser">
        <option <?php echo $sel0 ?> value="no"><?php  _e('No') ?></option>
        <option <?php echo $sel1 ?> value="yes"><?php  _e('Yes') ?></option>
        </select>
       
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row"><?php  _e('Username On Image :') ?></th>
        <td>
        <?php $select_value_caption = get_option('rwuv_caption'); 
        if($select_value_caption=='no')
        {
            $sel0_caption ='selected';
        }else{
           $sel1_caption ='selected'; 
        }
        ?>
        <select name="rwuv_caption">
        <option <?php echo $sel0_caption ?> value="no"><?php  _e('No') ?></option>
        <option <?php echo $sel1_caption ?> value="yes"><?php  _e('Yes') ?></option>
        </select>
       
        </td>
        </tr>

        <tr valign="top">
        <th scope="row"><?php  _e('Image Size (In px) :') ?></th>
        <td>   
       <input size="2" maxlength="3" type="text" name="rwuv_thum_size" value="<?php echo get_option('rwuv_thum_size') ?>" />px
        </td>
        </tr>
        
         <tr valign="top">
        <th scope="row"><?php  _e('Want To Display All User Image Below Post Type ? :') ?></th>
        <td>
        <?php $select_value_is_all = get_option('rwuv_is_all'); 
        if($select_value_is_all=='no')
        {
            $sel0_is_all ='selected';
        }else{
           $sel1_is_all ='selected'; 
        }
        ?>
        <select name="rwuv_is_all">
        <option <?php echo $sel0_is_all ?> value="no"><?php  _e('No') ?></option>
        <option <?php echo $sel1_is_all ?> value="yes"><?php  _e('Yes') ?></option>
        </select>
       
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row"><?php  _e('Want To Display Only Below Each Post ? :') ?></th>
        <td>
        <?php $select_value_rwuv_is_post = get_option('rwuv_is_post'); 
        if($select_value_rwuv_is_post=='no')
        {
            $sel0_rwuv_is_post ='selected';
        }else{
           $sel1_rwuv_is_post ='selected'; 
        }
        ?>
        <select name="rwuv_is_post">
        <option <?php echo $sel0_rwuv_is_post ?> value="no"><?php  _e('No') ?></option>
        <option <?php echo $sel1_rwuv_is_post ?> value="yes"><?php  _e('Yes') ?></option>
        </select>
       
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row"><?php  _e('Want To Display Only Below Each Page ? :') ?></th>
        <td>
        <?php $select_value_is_page = get_option('rwuv_is_page'); 
        if($select_value_is_page=='no')
        {
            $sel0_is_page ='selected';
        }else{
           $sel1_is_page ='selected'; 
        }
        ?>
        <select name="rwuv_is_page">
        <option <?php echo $sel0_is_page ?> value="no"><?php  _e('No') ?></option>
        <option <?php echo $sel1_is_page ?> value="yes"><?php  _e('Yes') ?></option>
        </select>
       
        </td>
        </tr>
        
   
        
        
        </table>

        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="rwuv_usercount_data,rwuv_usercount,rwuv_linkuser,rwuv_caption,rwuv_thum_size,rwuv_is_post,rwuv_is_page,rwuv_is_all" />

        <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        </p>      

</form>
<?php ///////////// admin side form end  ?>
<?php /////// reset all data of each post  ?>
<form method="post" action="" onsubmit="return confirm('Are you sure you want to reset all data ?');">

<?php
if(isset($_REQUEST['reset']))
{
    delete_post_meta_by_key( 'user_of_this_post' );    /////// reset all data of each post 
}
 ?>
<input type="submit" class="button-primary" name="reset" value="<?php _e('Reset All Data') ?>" />
</form>
</div>
<?php }
//////////////////////////  adding userid in postmeta
add_action('wp_head','rwuv_add_current_user_ids');
function rwuv_add_current_user_ids()
{
   global $post;
   $post_ID = get_the_ID();
   $post_type =  get_post_type( get_the_ID() );
   $user_id = get_current_user_id();  
  
  if ( is_user_logged_in() && !is_admin() ) {            // add only login user and not a admin
   $meta_values = get_post_meta( $post_ID,"user_of_this_post");
   
   //exit;
   $limit_of_rwuv =  get_option('rwuv_usercount_data');
  
   if(!empty($meta_values))
   {
      
       $array_value = explode('#',$meta_values[0]);
             
       if(in_array($user_id,$array_value))
       {
           return true;
            // user is allready in db
       }else{
       
               $new_Ids = $meta_values[0];     
               if( count($array_value) < $limit_of_rwuv )
               {
                $new_Ids .= '#'.$user_id;
                update_post_meta($post_ID,'user_of_this_post',$new_Ids);    
               }else{
                $data = $new_Ids;    
                $whatIWant = substr($data, strpos($data, "#") + 1);    
                $whatIWant .= '#'.$user_id;
                update_post_meta($post_ID,'user_of_this_post',$whatIWant);
               }
       }
       
   }else{
       add_post_meta($post_ID,'user_of_this_post',$user_id);    
   }
  }
}
//////////////////////////  adding userid in postmeta
function get_rwuv_post_views_user_ids($no_of_col,$link,$caption,$size,$is_echo="yes")
{
   global $post;
   $post_ID = get_the_ID();
   $meta_values = get_post_meta( $post_ID,"user_of_this_post");
   $array_value = explode('#',$meta_values[0]); 
  if(!isset($no_of_col) && $no_of_col=='')
  {
      $no_of_col = get_option('rwuv_usercount');
  }
  if(!isset($link) && $link=='')
  {
      $link = get_option('rwuv_linkuser');
  }
   if(!isset($caption) && $caption=='')
  {
      $caption = get_option('rwuv_caption');
  }
   if(!isset($size) && $size=='')
  {
      $size = get_option('rwuv_thum_size');
  }  
   
   //$array_value = array('1','2','3','4','5','6');
   $Ids = $array_value;
    foreach($Ids as $k => $v){
       $user_info =  get_userdata( $v );
       $user_username =  $user_info->user_nicename;
       $user_emails =  $user_info->user_email;
       $user_images =  get_avatar( $v, $size );
       $recent_wp_user_visitor[$v] = array( 'avtar_url'=>urlencode($user_images),
                                            'avtar_email' => urlencode($user_emails),
                                            'avtar_name' => $user_username
                                           );
       
    }
    if($is_echo=='no')
    {
      return $recent_wp_user_visitor;    
    }else{ 
        ?>
        <?php  ?>
            <div class="gallery galleryid-<?php echo $no_of_col  ?> gallery-columns-<?php echo $no_of_col ?> gallery-size-thumbnail">
            <?php
            $count = 0;
             foreach($recent_wp_user_visitor as $k1 => $v2) {
              
            ?>
              <?php if($no_of_col==$count) {
                $count = 0;
                ?>
                 <br style="clear: both">
                 <?php } ?>
            <dl class="gallery-item">
            <dt class="gallery-icon landscape">
                <?php if(isset($link) && $link=='yes') {?>
                <a href="mailto:<?php echo urldecode($v2['avtar_email'])  ?> "><?php echo urldecode($v2['avtar_url']); ?></a>
                <?php }else{ ?>
                <?php echo urldecode($v2['avtar_url']); ?>
                <?php } ?>
            </dt>
            <?php if(isset($caption) && $caption!='') { ?>
            <dd class="wp-caption-text gallery-caption"><?php echo urldecode($v2['avtar_name']); ?></dd>
            <?php } ?>
            </dl>          
            <?php
              $count++;
             } ?>
    <br style="clear: both">
            </div> 
        <?php  ?>
       
    <?php  }
    

}

// adding short code for images
function rwuv_recent_wp_user_visitor_func( $atts ) 
{
      $atts = shortcode_atts( array(
           'no_of_col' =>  get_option('rwuv_usercount'),
           'link' => get_option('rwuv_linkuser'),
           'caption' => get_option('rwuv_caption'),   
           'size' =>  get_option('rwuv_thum_size')        
      ), $atts );
      
      $no_of_col = $atts['no_of_col'];
      $link = $atts['link'];
      $caption = $atts['caption'];
      $size = $atts['size'];
      
      global $post;
      $post_ID = get_the_ID();
      $meta_values = get_post_meta( $post_ID,"user_of_this_post");
      $array_value = explode('#',$meta_values[0]);
       //$array_value = array('1','2','3','4','5','6');
      $Ids = $array_value;
      
      foreach($Ids as $k => $v){
               $user_info =  get_userdata( $v );
               $user_username =  $user_info->user_nicename;
               $user_emails =  $user_info->user_email;
               $user_images =  get_avatar( $v, $size );
               $recent_wp_user_visitor[$v] = array( 'avtar_url'=>urlencode($user_images),
                                                    'avtar_email' => urlencode($user_emails),
                                                    'avtar_name' => $user_username
                                                   );
             
      }      
      
      $htmls = '';
      if($no_of_col > 0) {
      $htmls .= '<div class="gallery galleryid-'.$no_of_col.' gallery-columns-'.$no_of_col.' gallery-size-thumbnail">';
             $count = 0;
             foreach($recent_wp_user_visitor as $k1 => $v2) {
                 if($no_of_col==$count) {
                    $count = 0;
                   $htmls .=  '<br style="clear: both">'; 
                 }
                   $htmls .= '<dl class="gallery-item"><dt class="gallery-icon landscape">';
                   if(isset($link) && $link=='yes') {
                   $htmls .=  '<a href="mailto:'.urldecode($v2['avtar_email']).'">'.urldecode($v2['avtar_url']).'</a>';
                   }else{
                   $htmls .=  urldecode($v2['avtar_url']);   
                   }
                   $htmls .= '</dt>';
                   if(isset($caption) && $caption=='yes') {
                   $htmls .= '<dd class="wp-caption-text gallery-caption">'.urldecode($v2['avtar_name']).'</dd>';
                   }
                   $htmls .= '</dl>';
                   $count++;
             }
             $htmls .= '<br style="clear: both"></div>';
      }
      return $htmls;
}
add_shortcode( 'rwuv_recent_wp_user_visitor', 'rwuv_recent_wp_user_visitor_func' );
// add fillter for for each post/page
function rwuv_add_after_post_content($content) {
    if(!is_feed() && !is_home() && is_singular() && is_main_query()) {
          global $post;
          $post_ID = get_the_ID();
          $post_type =  get_post_type( get_the_ID() );
          
         if( 'yes' == get_option('rwuv_is_all') ){
          $content .= rwuv_recent_wp_user_visitor_func($atts); 
         }else{    
          
         if( 'yes' == get_option('rwuv_is_page') && $post_type=='page' ){
        $content .= rwuv_recent_wp_user_visitor_func($atts);
         }
         if( 'yes' == get_option('rwuv_is_post') && $post_type=='post' ){
          $content .= rwuv_recent_wp_user_visitor_func($atts); 
         }    
         }
    }
    return $content;
}
add_filter('the_content', 'rwuv_add_after_post_content');
// remove all details when plugin uninstalled
register_uninstall_hook(__FILE__,'rwuv_uninstall_data');
function rwuv_uninstall_data()
{       
    delete_post_meta_by_key( 'user_of_this_post' ); 
    delete_option( 'rwuv_usercount_data' );
    delete_option( 'rwuv_usercount' );
    delete_option( 'rwuv_linkuser' );
    delete_option( 'rwuv_caption' );
    delete_option( 'rwuv_thum_size' );
    delete_option( 'rwuv_is_post' );
    delete_option( 'rwuv_is_page' );
    delete_option( 'rwuv_is_all' );   
}
?>