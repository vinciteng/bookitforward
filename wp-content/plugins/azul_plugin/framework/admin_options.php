<?php

/* -------------------- 
 * INFORMATION PLUGIN
 * -------------------- */

$azul_options['info_page'] = array(
    array(
        'oid' => 'item_info',
        'oname' => 'Product Info',
        'otype' => 'heading',
        'oinfo' => '',
        'osuffix' => 'px',
        'ovalue' => '',
        'odefault' => 'Product Information',
    ),
    array(
        'oid' => 'item_type',
        'oname' => 'Product Type',
        'otype' => 'info',
        'oinfo' => '',
        'osuffix' => 'px',
        'ovalue' => '',
        'odefault' => 'WordPress ' . azul_product_info('item_type'),
    ),
    array(
        'oid' => 'item_name',
        'oname' => 'Product Name',
        'otype' => 'info',
        'oinfo' => '',
        'osuffix' => 'px',
        'ovalue' => '',
        'odefault' => azul_product_info('item_name'),
    ), 
    array(
        'oid' => 'item_version',
        'oname' => 'Product Version',
        'otype' => 'info',
        'oinfo' => '',
        'osuffix' => 'px',
        'ovalue' => '',
        'odefault' => azul_product_info('item_version'),
    ),    
    array(
        'oid' => 'help_and_support',
        'oname' => 'Help &amp; Support',
        'otype' => 'info',
        'oinfo' => '',
        'osuffix' => 'px',
        'ovalue' => '',
        'odefault' => '<a  target="_blank" href="mailto:admin@creabox.es" title="">Contact Us</a>',
    ),
);




/* -------------------- 
 * CONFIGURATION
 * -------------------- */

require_once('google_fonts.php');
$azul_options['configuration'] = array(
    array(
        'oid' => 'configuration_heading',
        'oname' => 'Information',
        'otype' => 'heading',
        'oinfo' => '',
        'osuffix' => 'px',
        'ovalue' => '',
        'odefault' => 'Configuration',
    ),
    array(
        'oid' => 'plugin_status',
        'oname' => 'Coming Soon Page',
        'otype' => 'radio',
        'oinfo' => 'Enable or Disable Azul Coming Soon Template.',
        'osuffix' => '',
        'ovalue' => array('enable' => 'Enable', 'disable' => 'Disable'),
        'odefault' => 'enable',
    ),
    array(
        'oid' => 'site_access',
        'oname' => 'Access the site front-end',
        'otype' => 'radio',
        'oinfo' => 'Select if the users (while they are making changes in the web) can access the site front-end when the the coming soon page is enabled.',
        'osuffix' => '',
        'ovalue' => array('enable' => 'Enable', 'disable' => 'Disable'),
        'odefault' => 'disable',
    ),
    array(
        'oid' => 'plugin_sections_heading',
        'oname' => 'Sections',
        'otype' => 'sub-heading',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => 'Sections',
    ),
    array(
        'oid' => 'about_section',
        'oname' => 'About',
        'otype' => 'radio',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => array('enable' => 'Enable', 'disable' => 'Disable'),
        'odefault' => 'enable',
    ),
    array(
        'oid' => 'newsletter_section',
        'oname' => 'Newsletter',
        'otype' => 'radio',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => array('enable' => 'Enable', 'disable' => 'Disable'),
        'odefault' => 'enable',
    ),
    array(
        'oid' => 'contact_section',
        'oname' => 'Contact',
        'otype' => 'radio',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => array('enable' => 'Enable', 'disable' => 'Disable'),
        'odefault' => 'enable',
    ),
);




/* -------------------- 
 * MAIN OPTIONS
 * -------------------- */

$azul_options['main_options'] = array(
    array(
        'oid' => 'metas_heading',
        'oname' => 'Metas',
        'otype' => 'sub-heading',
        'oinfo' => 'text effects',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => 'Metas',
    ),
     array(
        'oid' => 'meta_title',
        'oname' => 'Meta title',
        'otype' => 'textbox',
        'oinfo' => 'Type the text to the meta title',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'meta_keywords',
        'oname' => 'Meta keywords',
        'otype' => 'textbox',
        'oinfo' => 'Type the text to the meta keywords',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'meta_description',
        'oname' => 'Meta description',
        'otype' => 'textbox',
        'oinfo' => 'Type the text to the meta description',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'language_heading',
        'oname' => 'Language',
        'otype' => 'sub-heading',
        'oinfo' => 'text effects',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => 'Language',
    ),
    array(
        'oid' => 'language',
        'oname' => 'Language',
        'otype' => 'dropdown',
        'oinfo' => 'Choose the language. Default: English',
        'osuffix' => '',
        'ovalue' => array('english' => 'English', 'spanish' => 'Spanish', 'french' => 'French', 'german' => 'German', 'italian' => 'Italian', 'portuguese' => 'Portuguese', 'russian' => 'Russian'),
        'odefault' => 'english',
    ),
    array(
        'oid' => 'typo_heading',
        'oname' => 'Typography',
        'otype' => 'sub-heading',
        'oinfo' => 'Typography',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => 'Typography',
    ),
    array(
        'oid' => 'typo_1',
        'oname' => 'Main Typography',
        'otype' => 'dropdown',
        'oinfo' => 'Choose the main typography from Google Fonts',
        'osuffix' => '',
        'ovalue' => google_fonts_list(),
        'odefault' => 'Lato',
    ),
    array(
        'oid' => 'typo_2',
        'oname' => 'Secondary Typography',
        'otype' => 'dropdown',
        'oinfo' => 'Choose the secondary typography from Google Fonts',
        'osuffix' => '',
        'ovalue' => google_fonts_list(),
        'odefault' => 'Bevan',
    ),
    array(
        'oid' => 'main_color_heading',
        'oname' => 'Main color',
        'otype' => 'sub-heading',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => 'Main color',
    ),
    array(
        'oid' => 'main_color',
        'oname' => 'Main Color',
        'otype' => 'color',
        'oinfo' => 'Choose the main color',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => 'FFFFFF',
    ),
    array(
        'oid' => 'custom_color_scheme_heading',
        'oname' => 'Link Color',
        'otype' => 'sub-heading',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => 'Link Color',
    ),
    array(
        'oid' => 'custom_link_color',
        'oname' => 'Link Color',
        'otype' => 'color',
        'oinfo' => 'Choose the link color',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '00a8ff',
    ),
    array(
        'oid' => 'favicon_heading',
        'oname' => 'Branding',
        'otype' => 'sub-heading',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => 'Favicon',
    ),
     array(
        'oid' => 'favicon_image',
        'oname' => 'Favicon Image',
        'otype' => 'file',
        'oinfo' => 'Upload the favicon image (size 16x16 px)',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'back_heading',
        'oname' => 'Background',
        'otype' => 'sub-heading',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => 'Background',
    ),
    array(
        'oid' => 'back_type',
        'oname' => 'Background Type',
        'otype' => 'radio',
        'oinfo' => 'Choose the background. In the option \'Images\', the images are chosen in each section',
        'osuffix' => '',
        'ovalue' => array('images' => 'Images', 'video' => 'Video (own)', 'video_youtube' => 'Video Youtube', 'none' => 'None'),
        'odefault' => 'none',
    ),
    array(
        'oid' => 'image_replacement',
        'oname' => 'Image Replacement',
        'otype' => 'file',
        'oinfo' => '<strong>Video version:</strong> In mobile and tablets devices the video is replaced by an image',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'back_heading_video',
        'oname' => 'Video (own)',
        'otype' => 'sub-heading-2',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => 'Video (own)',
    ),
    array(
        'oid' => 'video_internal',
        'oname' => 'Video (own)',
        'otype' => 'file',
        'oinfo' => 'Upload the video file',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'video_sound',
        'oname' => 'Video Sound',
        'otype' => 'radio',
        'oinfo' => 'Enable the sound or not',
        'omenu' => 'modules',
        'osuffix' => '',
        'ovalue' => array('enable' => 'Enable', 'disable' => 'Disable'),
        'odefault' => 'enable',
    ),
    array(
        'oid' => 'back_heading_video_youtube',
        'oname' => 'Video Youtube',
        'otype' => 'sub-heading-2',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => 'Video Youtube',
    ),
    array(
        'oid' => 'video_internal_youtube',
        'oname' => 'Video Youtube',
        'otype' => 'textbox',
        'oinfo' => 'Copy the ID video from Youtube',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'video_sound_youtube',
        'oname' => 'Video Sound',
        'otype' => 'radio',
        'oinfo' => 'Enable the sound or not',
        'omenu' => 'modules',
        'osuffix' => '',
        'ovalue' => array('enable' => 'Enable', 'disable' => 'Disable'),
        'odefault' => 'enable',
    ),
    array(
        'oid' => 'back_heading_color',
        'oname' => 'Background color (none)',
        'otype' => 'sub-heading-2',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => 'Background color (none)',
    ),
    array(
        'oid' => 'back_color',
        'oname' => 'Background color',
        'otype' => 'color',
        'oinfo' => 'Choose the color for the background when you choose the option \'none\'',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '5d5d5d',
    ),
    array(
        'oid' => 'gradient_heading',
        'oname' => 'Gradient color',
        'otype' => 'heading',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => 'Gradient color',
    ),
    array(
        'oid' => 'gradient',
        'oname' => 'Gradient',
        'otype' => 'radio',
        'oinfo' => 'Enable the gradient or not',
        'omenu' => 'modules',
        'osuffix' => '',
        'ovalue' => array('enable' => 'Enable', 'disable' => 'Disable'),
        'odefault' => 'enable',
    ),
    array(
        'oid' => 'color_gradient_1',
        'oname' => 'First color gradient',
        'otype' => 'color',
        'oinfo' => 'Choose the first color of the gradient',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '00a8ff',
    ),
    array(
        'oid' => 'color_gradient_2',
        'oname' => 'Second color gradient',
        'otype' => 'color',
        'oinfo' => 'Choose the second color of the gradient',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '000000',
    ),
    array(
        'oid' => 'analytics_heading',
        'oname' => 'Google Analytics Code',
        'otype' => 'heading',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => 'Google Analytics Code',
    ),
    array(
        'oid' => 'analytics',
        'oname' => 'Copy the Google Analytics code',
        'otype' => 'textarea',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => "",
    ),
);




/* -------------------- 
 * HOME
 * -------------------- */

$azul_options['home'] = array(
    array(
        'oid' => 'home_image_heading',
        'oname' => 'Image Home',
        'otype' => 'heading',
        'oinfo' => '',
        'osuffix' => 'px',
        'ovalue' => '',
        'odefault' => 'Image Home',
    ),
    array(
        'oid' => 'image_home',
        'oname' => 'Image Home',
        'otype' => 'file',
        'oinfo' => 'Upload the image home background',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'countdown_heading',
        'oname' => 'Countdown Timer',
        'otype' => 'heading',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => "Countdown Timer",
    ),
    array(
        'oid' => 'countdown_activation',
        'oname' => 'Countdown',
        'otype' => 'radio',
        'oinfo' => 'Choose if the countdown appears, a text or nothing',
        'omenu' => 'modules',
        'osuffix' => '',
        'ovalue' => array('countdown' => 'Countdow', 'text' => 'Text', 'none' => 'None'),
        'odefault' => 'countdown',
    ),
    array(
        'oid' => 'date_text',
        'oname' => 'Text Countdown',
        'otype' => 'textbox',
        'oinfo' => 'Type the text that replaces the countdown',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'launch_date',
        'oname' => 'Launch Date',
        'otype' => 'date',
        'oinfo' => 'Specify the date for the site to be launched',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => "31 Dec, 2014",
    ),
    array(
        'oid' => 'date_ended',
        'oname' => 'Countdown ended',
        'otype' => 'radio',
        'oinfo' => 'Choose what happens when the countdown is ended',
        'osuffix' => '',
        'ovalue' => array('hide' => 'Hide', 'text' => 'Show a text'),
        'odefault' => 'hide',
    ),
    array(
        'oid' => 'date_text_ended',
        'oname' => 'Text Countdown Ended',
        'otype' => 'textbox',
        'oinfo' => 'Type the text when the countdown is ended',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'text_home_heading',
        'oname' => 'Text Home',
        'otype' => 'heading',
        'oinfo' => '',
        'osuffix' => 'px',
        'ovalue' => '',
        'odefault' => 'Text Home',
    ),
    array(
        'oid' => 'text_home',
        'oname' => 'Text Home',
        'otype' => 'wysiwyg',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'menu_position_heading',
        'oname' => 'Menu Position',
        'otype' => 'heading',
        'oinfo' => '',
        'osuffix' => 'px',
        'ovalue' => '',
        'odefault' => 'Menu Position',
    ),
    array(
        'oid' => 'menu_position',
        'oname' => 'Menu Position',
        'otype' => 'radio',
        'oinfo' => 'Choose the menu position',
        'osuffix' => '',
        'ovalue' => array('top' => 'Top', 'center' => 'Center'),
        'odefault' => 'center',
    ),
    array(
        'oid' => 'twitter_feed_heading',
        'oname' => 'Twitter Feed',
        'otype' => 'heading',
        'oinfo' => '',
        'osuffix' => 'px',
        'ovalue' => '',
        'odefault' => 'Twitter Feed',
    ),
    array(
        'oid' => 'twitter_feed',
        'oname' => 'Twitter Feed',
        'otype' => 'radio',
        'oinfo' => 'Enable the twitter feed or not',
        'omenu' => 'modules',
        'osuffix' => '',
        'ovalue' => array('enable' => 'Enable', 'disable' => 'Disable'),
        'odefault' => 'enable',
    ),
    array(
        'oid' => 'twitter_name',
        'oname' => 'Twitter Name',
        'otype' => 'textbox',
        'oinfo' => 'Type your twitter name',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'twitter_user',
        'oname' => 'Twitter User',
        'otype' => 'textbox',
        'oinfo' => 'Type your twitter user',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'twitter_no',
        'oname' => 'Number of tweets',
        'otype' => 'textbox',
        'oinfo' => 'Type the number of tweets to load',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '10',
    ),
    array(
        'oid' => 'twitter_consumerkey',
        'oname' => 'Consumerkey',
        'otype' => 'textbox',
        'oinfo' => 'Type your consumerkey',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'twitter_consumersecret',
        'oname' => 'Consumersecret',
        'otype' => 'textbox',
        'oinfo' => 'Type your consumersecret',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'twitter_accesstoken',
        'oname' => 'Accesstoken',
        'otype' => 'textbox',
        'oinfo' => 'Type your accesstoken',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'twitter_accesstokensecret',
        'oname' => 'Accesstokensecret',
        'otype' => 'textbox',
        'oinfo' => 'Type your accesstokensecret',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'logo_image_heading',
        'oname' => 'Image Logo',
        'otype' => 'heading',
        'oinfo' => '',
        'osuffix' => 'px',
        'ovalue' => '',
        'odefault' => 'Image Logo',
    ),
    array(
        'oid' => 'image_logo',
        'oname' => 'Image Logo',
        'otype' => 'file',
        'oinfo' => 'Upload the image logo',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'social_heading',
        'oname' => 'Social Profiles',
        'otype' => 'sub-heading',
        'oinfo' => 'social',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => 'Social Profiles',
    ),
    array(
        'oid' => 'facebook_profile',
        'oname' => '<span class="symbol">&#xe227;</span> Facebook',
        'otype' => 'textbox',
        'oinfo' => 'Type your facebook profile url. Ex: http://www.facebook.com/username',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'twitter_profile',
        'oname' => '<span class="symbol">&#xe286;</span> Twitter',
        'otype' => 'textbox',
        'oinfo' => 'Type your twitter profile url. Ex: http://twitter.com/username',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'behance_profile',
        'oname' => '<span class="symbol">&#xe209;</span> Behance',
        'otype' => 'textbox',
        'oinfo' => 'Type your behance profile url. Ex: http://www.behance.net/username',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'blogger_profile',
        'oname' => '<span class="symbol">&#xe212</span> Blogger',
        'otype' => 'textbox',
        'oinfo' => 'Type your blogger profile url. Ex: http://www.blogger.com/profile/username',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'deviantart_profile',
        'oname' => '<span class="symbol">&#xe218;</span> Deviantart',
        'otype' => 'textbox',
        'oinfo' => 'Type your deviantart profile url. Ex: http://http://username.deviantart.com/',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'digg_profile',
        'oname' => '<span class="symbol">&#xe219;</span> Digg',
        'otype' => 'textbox',
        'oinfo' => 'Type your digg profile url. Ex: http://digg.com/username',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'dribbble_profile',
        'oname' => '<span class="symbol">&#xe221;</span> Dribbble',
        'otype' => 'textbox',
        'oinfo' => 'Type your dribbble profile url. Ex: http://dribbble.com/username',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'flickr_profile',
        'oname' => '<span class="symbol">&#xe229;</span> Flickr',
        'otype' => 'textbox',
        'oinfo' => 'Type your flickr profile url. Ex: http://www.flickr.com/photos/username',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'github_profile',
        'oname' => '<span class="symbol">&#xe236;</span> Github',
        'otype' => 'textbox',
        'oinfo' => 'Type your github profile url. Ex: http://github.com/username',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'googleplus_profile',
        'oname' => '<span class="symbol">&#xe239;</span> Google Plus',
        'otype' => 'textbox',
        'oinfo' => 'Type your google plus profile url. Ex: http://plus.google.com/username/posts',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
     array(
        'oid' => 'instagram_profile',
        'oname' => '<span class="symbol">&#xe300;</span> Instagram',
        'otype' => 'textbox',
        'oinfo' => 'Type your instagram profile url. Ex: instagram.com/username',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'lastfm_profile',
        'oname' => '<span class="symbol">&#xe251;</span> Lastfm',
        'otype' => 'textbox',
        'oinfo' => 'Type your lastfm profile url. Ex: http://www.lastfm.es/user/username',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'linkedin_profile',
        'oname' => '<span class="symbol">&#xe252;</span> Linkedin',
        'otype' => 'textbox',
        'oinfo' => 'Type your linkedin profile url. Ex: http://www.linkedin.com/profile/view?id=username',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'pinterest_profile',
        'oname' => '<span class="symbol">&#xe264;</span> Pinterest',
        'otype' => 'textbox',
        'oinfo' => 'Type your pinterest profile url. Ex: http://www.pinterest.com/username',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'rss_profile',
        'oname' => '<span class="symbol">&#xe271;</span> Rss',
        'otype' => 'textbox',
        'oinfo' => 'Type your rss profile url',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'skype_profile',
        'oname' => '<span class="symbol">&#xe274;</span> Skype',
        'otype' => 'textbox',
        'oinfo' => 'Type your skype profile url. Ex: http://skype:username?call',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'stumbleupon_profile',
        'oname' => '<span class="symbol">&#xe283;</span> Stumbleupon',
        'otype' => 'textbox',
        'oinfo' => 'Type your stumbleupon profile url. Ex: http://www.stumbleupon.com/stumbler/username',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'tumblr_profile',
        'oname' => '<span class="symbol">&#xe285;</span> Tumblr',
        'otype' => 'textbox',
        'oinfo' => 'Type your tumblr profile url. Ex: http://username.tumblr.com/',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'vimeo_profile',
        'oname' => '<span class="symbol">&#xe289;</span> Vimeo',
        'otype' => 'textbox',
        'oinfo' => 'Type your vimeo profile url. Ex: http://vimeo.com/username',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'wordpress_profile',
        'oname' => '<span class="symbol">&#xe294;</span> Wordpress',
        'otype' => 'textbox',
        'oinfo' => 'Type your wordpress profile url. Ex: http://website_name.wordpress.com/',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'youtube_profile',
        'oname' => '<span class="symbol">&#xe299;</span> Youtube',
        'otype' => 'textbox',
        'oinfo' => 'Type your youtube profile url. Ex: http://www.youtube.com/user/username',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
);




/* -------------------- 
 * ABOUT 
 * -------------------- */

$azul_options['about'] = array(
    array(
        'oid' => 'about_heading',
        'oname' => 'About',
        'otype' => 'heading',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => 'About',
    ),
    array(
        'oid' => 'about_title',
        'oname' => 'About Title',
        'otype' => 'textbox',
        'oinfo' => 'Type the about title',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => 'About',
    ),
    array(
        'oid' => 'image_about',
        'oname' => 'Image About',
        'otype' => 'file',
        'oinfo' => 'Upload the image about background',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'about_text',
        'oname' => 'About Text',
        'otype' => 'wysiwyg',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
);




/* -------------------- 
 * NEWSLETTER
 * -------------------- */

$azul_options['newsletter'] = array(
    array(
        'oid' => 'newsletter_heading',
        'oname' => 'Newsletter',
        'otype' => 'heading',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => 'Newsletter',
    ),
    array(
        'oid' => 'newsletter_title',
        'oname' => 'Newsletter Title',
        'otype' => 'textbox',
        'oinfo' => 'Type the newsletter title',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => 'Newsletter',
    ),
    array(
        'oid' => 'image_newsletter',
        'oname' => 'Image Newsletter',
        'otype' => 'file',
        'oinfo' => 'Upload the image newsletter background',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'newsletter_text',
        'oname' => 'Newsletter Text',
        'otype' => 'textbox',
        'oinfo' => 'Type the newsletter text',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'email_subscription_heading',
        'oname' => 'Email Subscriptions',
        'otype' => 'sub-heading',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => "Email Subscriptions",
    ),
    array(
        'oid' => 'email_subscription_type',
        'oname' => 'Email Subscriptions Type',
        'otype' => 'radio',
        'oinfo' => 'Choose where you want to saved the subscribed emails',
        'osuffix' => '',
        'ovalue' => array('wp_database' => 'Wordpress database', 'mailchimp' => 'Mailchimp form'),
        'odefault' => 'wp_database',
    ),
    array(
        'oid' => 'mailchimp_url',
        'oname' => 'Mailchimp url form',
        'otype' => 'textbox',
        'oinfo' => 'Enter your Mailchimp url form. You have to follow <a href="http://kb.mailchimp.com/article/can-i-host-my-own-sign-up-forms/" target="_blank">this tutorial</a> to get it.',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => "",
    ),
    array(
        'oid' => 'mailchimp_u',
        'oname' => 'Mailchimp: value u',
        'otype' => 'textbox',
        'oinfo' => 'Enter your Mailchimp value u. You have to follow <a href="http://kb.mailchimp.com/article/can-i-host-my-own-sign-up-forms/" target="_blank">this tutorial</a> to get it.',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => "",
    ),
    array(
        'oid' => 'mailchimp_id',
        'oname' => 'Mailchimp: value id',
        'otype' => 'textbox',
        'oinfo' => 'Enter your Mailchimp value id. You have to follow <a href="http://kb.mailchimp.com/article/can-i-host-my-own-sign-up-forms/" target="_blank">this tutorial</a> to get it.',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => "",
    ),
);




/* -------------------- 
 * CONTACT
 * -------------------- */

$azul_options['contact'] = array(
	array(
        'oid' => 'contact_heading',
        'oname' => 'Contact',
        'otype' => 'heading',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => 'Contact',
    ),
    array(
        'oid' => 'contact_title',
        'oname' => 'Contact Title',
        'otype' => 'textbox',
        'oinfo' => 'Type the contact title',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => 'Contact',
    ),
    array(
        'oid' => 'choose_back_contact',
        'oname' => 'Contact Background',
        'otype' => 'radio',
        'oinfo' => 'Choose the map background, an image or none',
        'omenu' => 'modules',
        'osuffix' => '',
        'ovalue' => array('map' => 'Map', 'image' => 'Image', 'none' => 'None'),
        'odefault' => 'map',
    ),
    array(
        'oid' => 'image_contact',
        'oname' => 'Image Contact',
        'otype' => 'file',
        'oinfo' => 'Upload the image contact background',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
    array(
        'oid' => 'contact_text',
        'oname' => 'Contact Adress',
        'otype' => 'wysiwyg',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => '',
    ),
	 array(
        'oid' => 'map_heading',
        'oname' => 'Map',
        'otype' => 'heading',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => "Map",
    ),
    array(
        'oid' => 'map_coordinates',
        'oname' => 'Map coordinates',
        'otype' => 'textbox',
        'oinfo' => 'Enter your the map coordinates for Google Maps. Ex: 40.740208, -73.983386',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => "40.740208, -73.983386",
    ),
    array(
        'oid' => 'contact_form_heading',
        'oname' => 'Contact',
        'otype' => 'heading',
        'oinfo' => '',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => "Contact Form",
    ),
    array(
        'oid' => 'contact_email',
        'oname' => 'Email Address',
        'otype' => 'textbox',
        'oinfo' => 'Enter your email address to be used for the contact form',
        'osuffix' => '',
        'ovalue' => '',
        'odefault' => get_option('admin_email'),
    ),
);


