<?php
ob_start();
#############################################################################
#############################################################################
# PRODUCT INFO
#############################################################################
#############################################################################

function azul_product_info($var) {
    global $wpdb;

    $product_info = array(
#######################################################################
        'item_type' => 'Plugin',
        // ITEM INFO
        'item_id' => '1',
        'item_name' => 'Azul Coming Soon Plugin',
        'item_version' => '1.2',
        'item_url' => 'http://themeforest.net/user/CreaboxThemes',
        // WORDPRESS VARIABLES
        'options_table_name' => $wpdb->prefix . 'azul_plugin', // UPDATE
        'settings_page_slug' => 'azul_plugin_info',
#######################################################################
        // General Links
        'contact_url' => 'admin@creabox.es',
    );

    if ($product_info['item_type'] == 'Plugin') {
        
        $extend_url = WP_CONTENT_URL . '/plugins/' . plugin_basename(dirname(__FILE__));
        $extend_url = str_replace('/framework', '', $extend_url);

        $assets_url = $extend_url.'/assets';
        $modules_url = $extend_url.'/modules';
        
        $product_dir = WP_PLUGIN_DIR . '/' . plugin_basename(dirname(__FILE__));
        $product_dir = str_replace('/framework', '', $product_dir);
        
        $deactivate_url = site_url('wp-admin/plugins.php');
    } elseif ($product_info['item_type'] == 'Theme') {
        $extend_url = get_template_directory_uri();
        $assets_url = get_template_directory_uri() . '/extend/assets';
        $modules_url = get_template_directory_uri() . '/extend/modules';
        $product_dir = get_template_directory();
        $deactivate_url = site_url('wp-admin/themes.php');
        
    }
    $assets_url = array(
        'product_url' => $extend_url,
        'extend_url' => $extend_url,
        'assets_url' => $assets_url,
        'deactivate_url' => $deactivate_url,
        'modules_url' => $modules_url,
        'product_dir' => $product_dir,
        
    );

    $return = array_merge($product_info, $assets_url);

    return $return[$var];
}

#############################################################################
#############################################################################
#############################################################################
#############################################################################
# REGISTER ADMIN SCRITPS 
#############################################################################

function azul_admin_scripts() {

    global $azul_admin_menus;

    foreach ($azul_admin_menus as $key => $value) {
        $azul_admin_pages[] = $value['page_slug'];
    }
	$page = $_SERVER['REQUEST_URI'];
	$plugin_page = strpos($page, 'azul');
    if (is_admin() && ($plugin_page != false)) {
        wp_register_script('jquery', 'http://code.jquery.com/jquery-1.10.2.min.js');
        wp_enqueue_script('jquery');
        wp_register_script('jqueryui', 'http://code.jquery.com/ui/1.10.3/jquery-ui.min.js');
        wp_enqueue_script('jqueryui');
        
        // COLOR PICKER
        wp_register_script('color', azul_product_info('assets_url') . '/colorpicker/js/colorpicker.js');
        wp_enqueue_script('color');

        // date PICKER 
        wp_register_script('time-picker', azul_product_info('assets_url') . '/jquery-ui-timepicker-addon.js');
        wp_enqueue_script('time-picker');
        wp_register_script('sliderAccess', azul_product_info('assets_url') . '/jquery-ui-sliderAccess.js');
        wp_enqueue_script('sliderAccess');
        
        // CLEDITOR - WYSIWYG
        wp_register_script('azul-wysiwyg', azul_product_info('assets_url') . '/cleditor/jquery.cleditor.min.js');
        wp_enqueue_script('azul-wysiwyg');
        
        // FILE UPLOAD
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_register_script('azul-admin-js', azul_product_info('assets_url') . '/admin.js');
        wp_enqueue_script('azul-admin-js');

    }
}

#############################################################################
# REGISTER ADMIN STYLES 
#############################################################################

function azul_admin_styles() {
	$page = $_SERVER['REQUEST_URI'];
	$plugin_page = strpos($page, 'azul');
    if (is_admin() && ($plugin_page != false)) {
	    wp_enqueue_style('thinkbox');
	    wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
	    echo '<link rel="stylesheet" media="screen" href="' . azul_product_info('assets_url') . '/colorpicker/css/colorpicker.css" type="text/css" />'."\n";
	    echo '<link rel="stylesheet" media="screen" href="' . azul_product_info('assets_url') . '/cleditor/jquery.cleditor.css" type="text/css" />'."\n";
	    echo '<link rel="stylesheet" media="screen" href="' . azul_product_info('assets_url') . '/jquery-ui-timepicker-addon.css" type="text/css" />'."\n";
	
	    echo '<link rel="stylesheet" media="screen" href="' . azul_product_info('assets_url') . '/admin.css" type="text/css" />'."\n";
	    echo '<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300" rel="stylesheet" type="text/css">'."\n";
    }
}

#############################################################################
# GET SAVED OPTION
#############################################################################

function azul_top($var) {
    global $wpdb; 
    $azul_uninstall_opt = '_site_' . sha1(azul_product_info('item_name'));
    if (get_option($azul_uninstall_opt) != 1) {
	    $table = azul_product_info('options_table_name');
	    $query = $wpdb->get_row("SELECT * FROM $table WHERE option_name = '{$var}'");
	
	    $data = @unserialize($query->option_value);
	    if ($data === false) {
	        return $query->option_value;
	    } else {
	        return unserialize($query->option_value);
	    }
    }
}

#############################################################################
# DATABASE SETUP 
#############################################################################

function azul_install_db() {

    global $wpdb, $azul_options;

    // Options Table Setup
    $options_table = azul_product_info('options_table_name');

    $sql[] = "
        CREATE TABLE IF NOT EXISTS `{$options_table}` (
            `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            `option_name` varchar(64) NOT NULL DEFAULT '',
            `option_value` longtext NOT NULL,
            PRIMARY KEY (`option_id`),
            UNIQUE KEY `option_name` (`option_name`)
        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;
        ";
    foreach ($sql as $query) {
        if ($wpdb->query($query)) {
            $return[] = 1;
        } else {
            echo mysql_error();
        }
    }
    
    $emails_subscrited = $wpdb->prefix . 'azul_emails';
    
	$sql2[] = "
        CREATE TABLE IF NOT EXISTS `{$emails_subscrited}` (
            `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            `option_email` varchar(64) NOT NULL DEFAULT '',
            PRIMARY KEY (`option_id`),
            UNIQUE KEY `option_email` (`option_email`)
        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;
        ";
    foreach ($sql2 as $query) {
        if ($wpdb->query($query)) {
            $return[] = 1;
        } else {
            echo mysql_error();
        }
    }


    # Update Options Table
    //-- Get Options Count
    $option_count = 0;
    foreach ($azul_options as $options) {
        foreach ($options as $option) {
            $option_count += 1;
        }
    }

    //- Get DB Count

    $query = $wpdb->get_row("SELECT COUNT(option_id) AS db_count FROM $options_table");

    $db_count = $query->db_count;

    if ($db_count == 0) {

        foreach ($azul_options as $options) {
            foreach ($options as $option) {
                
                
                if (is_array($option['odefault'])) {
                    $update_value = serialize($option['odefault']);
                } else {
                    $update_value = $option['odefault'];
                }
                $options_data = array(
                    'option_name' => $option['oid'],
                    'option_value' => $update_value,
                );
                azul_insert($options_table, $options_data);
            }
        }
        
    } elseif ($option_count != $db_count) {

        $temp_options_table = $options_table . '_temp';

        $wpdb->query("CREATE TABLE $temp_options_table SELECT * FROM $options_table");
        $wpdb->query("TRUNCATE TABLE $options_table");

        foreach ($azul_options as $options) {
            foreach ($options as $option) {
                
                
                if (is_array($option['odefault'])) {
                    $update_value = serialize($option['odefault']);
                } else {
                    $update_value = $option['odefault'];
                }
                $options_data = array(
                    'option_name' => $option['oid'],
                    'option_value' => $update_value,
                );
                azul_insert($options_table, $options_data);
            }
        }
        
        $temp_values = $wpdb->get_results("SELECT option_name, option_value FROM $temp_options_table");
        
        foreach($temp_values as $saved_value){
            $wpdb->query("UPDATE $options_table SET option_value = '{$saved_value->option_value}' WHERE option_name = '{$saved_value->option_name}'");
        }
        
        $wpdb->query("DROP TABLE $temp_options_table");
    }
}

################################################################################
# TRIM TEXT
################################################################################

function azul_trim_text($text, $cut) {
    if ($cut < strlen($text)) {
        return substr($text, '0', $cut) . '... ';
    } else {
        return substr($text, '0', $cut);
    }
}

################################################################################
# EMAIL VALIDATION
################################################################################

function azul_is_valid_email($email) {
    $result = preg_match('/[.+a-zA-Z0-9_-]+@[a-zA-Z0-9-]+.[a-zA-Z]+/', $email);
    if ($result == true) {
        return true;
    } else {
        return false;
    }
}

################################################################################
# Insert Function
################################################################################

function azul_insert($table, $data) {	
	global $wpdb;
    foreach ($data as $field => $value) {
        $fields[] = '`' . $field . '`';
        $values[] = "'" .  esc_sql($value) . "'";
    }
    $field_list = join(',', $fields);
    $value_list = join(', ', $values);
    $query = "INSERT INTO `" . $table . "` (" . $field_list . ") VALUES (" . $value_list . ")";
    $wpdb->query($query);
    return mysql_insert_id();
}

################################################################################
# UPDATE FUNCTION
################################################################################

function azul_update($table, $data, $id_field, $id_value) {
	global $wpdb;
    foreach ($data as $field => $value) {
    	$fields[] = sprintf("`%s` = '%s'", $field,  esc_sql($value));
    }
    $field_list = join(',', $fields);
    $query = sprintf("UPDATE `%s` SET %s WHERE `%s` = %s", $table, $field_list, $id_field, intval($id_value));
    $wpdb->query($query);
}

################################################################################
# EXPORT EMAILS SUBSCRIBED
################################################################################

if (isset($_POST["button_export"])) {
	include('export_emails.php');
   }


################################################################################
# Get String based on permalink
################################################################################

function azul_string($url) {
    if (strpos($url, '?') > 0) {
        $string = $url . '&';
    } else {
        $string = $url . '?';
    }
    return $string;
}

################################################################################
# GET FULL URL
################################################################################

function azul_current_url() {
    $pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

################################################################################
# SEND EMAIL
################################################################################

function azul_mail($emaildata, $attachments = null) {

    $to = $emaildata['to'];
    $from_name = $emaildata['from_name'];
    $from = $emaildata['from'];
    $subject = $emaildata['subject'];
    $content = $emaildata['message'];

    $headers = "From: {$from_name} <{$from}>" . "\r\n\\";
    $headers .= "Reply-To: {$from}\r\n";
    $headers .= "Return-Path: {$from}\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $msg = $content;
    $message = "<html><body>";
    $message .= $msg;
    $message .= "</body></html>";


    $attachments = $emaildata['attachments'];


    if (wp_mail($to, $subject, $message, $headers, $attachments)) {
        return true;
    } else {
        return false;
    }
}

################################################################################
# Get Real IP Address
################################################################################

function azul_get_ip() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

#############################################################################
# LOAD MODULES
#############################################################################

function azul_load_modules($module_array) {
    if (!empty($module_array)) {
        foreach ($module_array as $file) {
            if (azul_product_info('item_type') == 'Plugin') {
                require_once(str_replace('/framework', '', WP_PLUGIN_DIR . '/' . plugin_basename(dirname(__FILE__))) . '/modules/' . $file . '.php');
            } elseif (azul_product_info('item_type') == 'Theme') {
                require_once(get_template_directory() . '/extend' . '/modules/' . $file . '.php');
            }
        }
    }
}

#############################################################################
# DISPLAY ADMIN OPTIONS
#############################################################################

function azul_display_options($options, $submit_button = null, $export_submit = null) {
    global $wpdb, $azul_msg;
    ?>

    <div id="nc-wrap" class="clearfix">
        <form action="" method="post">
            
    <?php
    if ((!empty($_POST)) && (!isset($_POST["button_export"]))) {

        $options_table = azul_product_info('options_table_name');

        foreach ($_POST as $key => $value) {

            if (is_array($value)) {
                $update_value = serialize($value);
            } else {
                $update_value = $value;
            }

            $wpdb->query("UPDATE {$options_table} SET option_value = '{$update_value}' WHERE option_name = '{$key}'");
        }

        $fw_message = _e('<span class="fw-message-success fade">Settings Updated Successfully!</span>','azul-plugin');

        echo $fw_message;
    }

    // MESSAGES WITHOUT POST
    echo $azul_msg;
    ?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">

<?php 
foreach ($options as $option): 
?>


<?php if ($option['otype'] == 'heading'): ?>
<tr id="<?php echo $option['oid']; ?>" class="fw-heading"><td colspan="2"><?php echo _e($option['odefault'],'azul-plugin'); ?></td></tr>
<?php endif; ?>


<?php if ($option['otype'] == 'sub-heading'): ?>
<tr id="<?php echo $option['oid']; ?>" class="fw-heading"><td colspan="2"><?php echo _e($option['odefault'],'azul-plugin'); ?></td></tr>
<?php endif; ?>


<?php if ($option['otype'] == 'sub-heading-2'): ?>
<tr id="<?php echo $option['oid']; ?>" class="fw-heading-2"><td colspan="2"><?php echo _e($option['odefault'],'azul-plugin'); ?></td></tr>
<?php endif; ?>


<?php if ($option['otype'] == 'info'): ?>
<tr class="fw-info-white">
<td class="label">
<span><?php echo _e($option['oname'],'azul-plugin'); ?></span>
</td>
<td>
<span class="fw-info-panel"><?php echo _e($option['odefault'],'azul-plugin'); ?></span>
</td>
</tr>
<?php endif; ?>


<?php if ($option['otype'] == 'text' || $option['otype'] == 'textbox'): ?>
<tr>
<td class="label">
<span><?php echo _e($option['oname'],'azul-plugin'); ?></span>
</td>
<td>
<input type="text" name="<?php echo $option['oid']; ?>" value="<?php echo azul_top($option['oid']); ?>" /> 
<span class="fw-suffix"><?php echo $option['osuffix'] ?></span>
<span class="fw-desc"><?php echo _e($option['oinfo'],'azul-plugin'); ?></span>
</td>
</tr>
<?php endif; ?>


<?php if ($option['otype'] == 'textarea'): ?>
<tr>
<td class="label">
<span><?php echo _e($option['oname'],'azul-plugin'); ?></span>
</td>
<td>
<textarea rows="6" name="<?php echo $option['oid']; ?>"><?php echo azul_top($option['oid']); ?></textarea> 
<span class="fw-suffix"><?php echo $option['osuffix'] ?></span>
<span class="fw-desc"><?php echo _e($option['oinfo'],'azul-plugin'); ?></span>
</td>
</tr>
<?php endif; ?>


<?php if ($option['otype'] == 'wysiwyg'): ?>
<tr>
<td class="label">
<span><?php echo _e($option['oname'],'azul-plugin'); ?></span>
</td>
<td>
<textarea class="wysiwyg" rows="5" cols="40" name="<?php echo $option['oid']; ?>"><?php echo azul_top($option['oid']); ?></textarea>
<span class="fw-desc"><?php echo _e($option['oinfo'],'azul-plugin'); ?></span>
</td>
</tr>
<?php endif; ?>


<?php if ($option['otype'] == 'dropdown'): ?>
<tr>
<td class="label">
<span><?php echo _e($option['oname'],'azul-plugin'); ?></span>
</td>
<td>
<select name="<?php echo $option['oid'] ?>">
<option value=""><?php _e('Please Select', 'azul-plugin'); ?></option>
<?php
foreach ($option['ovalue'] as $key => $opt):
if ($key == azul_top($option['oid'])) {
echo '<option selected value="' . $key . '">' . $opt . '</option>' . "\n";
} else {
echo '<option value="' . $key . '">' . $opt. '</option>' . "\n";
}
endforeach;
?>
</select>
<span class="fw-desc"><?php echo _e($option['oinfo'],'azul-plugin'); ?></span>
</td>
</tr>
<?php endif; ?>


<?php if ($option['otype'] == 'radio'): ?>
<tr>
<td class="label">
<span><?php echo _e($option['oname'],'azul-plugin'); ?></span>
</td>
<td class="fw-checkboxes">
<span class="fw-info-panel">
<?php
foreach ($option['ovalue'] as $key => $opt):
if ($key == azul_top($option['oid'])) {
echo '<label><input checked name="' . $option['oid'] . '" type="radio" value="' . $key . '" /> ' . _e($opt,'azul-plugin') . ' </label>';
} else {
echo '<label><input name="' . $option['oid'] . '" type="radio" value="' . $key . '" /> ' . _e($opt,'azul-plugin') . ' </label>';
}
endforeach;
?>
</span>
<span class="fw-desc"><?php echo _e($option['oinfo'],'azul-plugin'); ?></span>
</td>
</tr>
<?php endif; ?>


<?php if ($option['otype'] == 'date'): ?>
<tr>
<td class="label">
<span><?php echo _e($option['oname'],'azul-plugin'); ?></span>
</td>
<td class="fw-relative">
<input type="text" name="<?php echo $option['oid']; ?>" class="date-picker" value="<?php echo azul_top($option['oid']) ?>" />
<span class="fw-desc"><?php echo _e($option['oinfo'],'azul-plugin'); ?></span>
</td>
</tr>
<?php endif; ?>


<?php if ($option['otype'] == 'upload' || $option['otype'] == 'file'): ?>
<tr>
<td class="label">
<span><?php echo _e($option['oname'],'azul-plugin'); ?></span>
</td>
<td class="fw-relative">
<input id="<?php echo 'img-' . rand(4, 9999); ?>" class="upload_image" type="text" name="<?php echo $option['oid']; ?>" value="<?php echo azul_top($option['oid']) ?>" />
<input class="upload_image_button button-secondary" type="button" value="<?php _e('Upload Image', 'azul-plugin'); ?>" />
<span class="fw-desc"><?php echo _e($option['oinfo'],'azul-plugin'); ?></span>
</td>
</tr>
<?php endif; ?>


<?php if ($option['otype'] == 'color'): ?>
<tr>
<td class="label">
<span><?php echo _e($option['oname'],'azul-plugin'); ?></span>
</td>
<td>

<input id="<?php echo $option['oid']; ?>_color" name="<?php echo $option['oid']; ?>" class="fw-colorpicker-input" type="text" value="<?php echo azul_top($option['oid']) ?>" />
<span id="<?php echo $option['oid']; ?>_preview_color" class="fw_preview_color" style="background-color:#<?php echo azul_top($option['oid']); ?>">&nbsp;</span>
<span class="fw-desc"><?php echo _e($option['oinfo'],'azul-plugin'); ?></span>

<script type="text/javascript">
jQuery('#<?php echo $option['oid']; ?>_color').ColorPicker({
color: '#0000ff',
onShow: function (colpkr) {
jQuery(colpkr).fadeIn(500);
return false;
},
onHide: function (colpkr) {
jQuery(colpkr).fadeOut(500);
return false;
},
onChange: function (hsb, hex, rgb) {
jQuery('#<?php echo $option['oid']; ?>_color').val(hex);
jQuery('#<?php echo $option['oid']; ?>_preview_color').css({"background-color":"#"+hex});
}
});
</script>




</td>
</tr>

<?php endif; ?>

<?php endforeach; ?>

    <?php
    if ($submit_button == null):
        ?>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input name="save_settings" type="submit" class="button-primary" value="<?php _e('Save Settings', 'azul-plugin'); ?>" />  
    <?php endif; ?>
    
    
    
	</td>
	</tr>
	</table>
    </form>  
      
     <?php if ($export_submit != null): ?>
    <form name="form1" class="export-emails" method="post" action="#">
    	<p><?php echo _e('Export a csv file with the subscribed email:','azul-plugin') ?> </p>
		<input class="button-secondary" type="submit" name="button_export" value="<?php _e('Export emails', 'azul-plugin'); ?>">
    </form>
    <?php endif; ?>  
    </div><!-- /nc-wrap -->

    <?php
}

################################################################################
# Uninstall
################################################################################

function azul_display_uninstall() {
    global $wpdb;
    ?>

    <div id="nc-wrap" class="clearfix">
        <form action="" method="post">


    <?php
    $uninstall_opt = '_site_' . sha1(azul_product_info('item_name'));

    if (isset($_POST['uninstall_db'])) {
        $options_table = azul_product_info('options_table_name');
        $wpdb->query("DROP TABLE $options_table");
        update_option($uninstall_opt, 1);

        $fw_message = _e('<span class="fw-message-success">Uninstall complete, You can de-activate this product now.</span>', 'azul-plugin') ;
        echo $fw_message;
    }

    if (isset($_POST['reinstall_db'])) {
        delete_option($uninstall_opt);
        $location = site_url('wp-admin/admin.php?page=' . azul_product_info('settings_page_slug'));
        wp_redirect($location);
    }
    ?>

            <?php
            if (get_option($uninstall_opt) == 1):
                ?>

                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr class="fw-heading"><td colspan="2">
                <?php
                _e("Re-Install", 'azul');
                echo ' &raquo; ' . azul_product_info('item_name');
                ?>
                        </td></tr>
                    <tr class="fw-info-white">
                        <td>
                            <?php
                            printf(_e('Click Re-Install to activate', 'azul-plugin'));
                            ?>
                        </td>
                    </tr>
                    <tr class="fw-info-white red">
                        <td>
                            <input type="submit" name="reinstall_db" value="<?php _e('Re-Install', 'azul-plugin') ?>" class="button-secondary" /> &nbsp; 
                            <a href="<?php echo site_url('wp-admin'); ?>" title=""><?php _e('Cancel', 'azul-plugin') ?></a>
                        </td>
                    </tr>
                </table>

        <?php
    else:
        ?>

                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr class="fw-heading"><td colspan="2">
                <?php
                _e("Uninstall", 'azul');
                echo ' &raquo; ' . azul_product_info('item_name');
                ?>
                        </th></tr>
                    <tr class="fw-info-white red">
                        <td>
                            <?php _e('Are you sure? This will remove all saved settings.', 'azul-plugin') ?>
                        </td>
                    </tr>
                    <tr class="fw-info-white red">
                        <td>
                            <input type="submit" name="uninstall_db" value="<?php _e('Uninstall', 'azul-plugin') ?>" class="button-secondary fw-delete" /> &nbsp; 
                            <a href="#" title=""><?php _e('Cancel', 'azul-plugin') ?></a>
                        </td>
                    </tr>
                </table>

    <?php
    endif;
    ?>

        </form>

    </div>

            <?php
        }