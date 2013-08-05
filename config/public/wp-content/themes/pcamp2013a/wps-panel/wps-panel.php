<?php
/* ---------------------------------------------------------------------------------------------------
     
    File: wps-panel.php
     
--------------------------------------------------------------------------------------------------- */
 
/* ---------------------------------------------------------------------------------------------------
    CSS
--------------------------------------------------------------------------------------------------- */
add_action('admin_print_styles', 'wps_panel_include_styles');
function wps_panel_include_styles(){
 
    /* Register styles */
    wp_register_style('wps_panel_style', get_template_directory_uri().'/wps-panel/css/wps-panel-style.css');
     
    /* Enqueue styles */
    wp_enqueue_style('wps_panel_style', get_template_directory_uri().'/wps-panel/css/wps-panel-style.css'); 
 
    /* Register styles */
    wp_register_style('wps_panel_style_retina', get_template_directory_uri().'/wps-panel/css/wps-panel-retina.css');
     
    /* Enqueue styles */
    wp_enqueue_style('wps_panel_style_retina', get_template_directory_uri().'/wps-panel/css/wps-panel-retina.css');    
     
 
}/* wps_panel_include_styles() */

add_action( 'admin_enqueue_scripts', 'wps_add_my_stylesheet' );
function wps_add_my_stylesheet() {

$data_td = array(
    'blog_title'        =>  get_template_directory_uri(),
    'effect_work'       =>  get_option('wps_effect_work'),
    'mapchoice'         =>  get_option('wps_map_choice'),
    'timeline_page'     =>  get_option('wps_active_timeline_page'),
    'thumbnail_page'    =>  get_option('wps_active_thumbnail_page'),
    'slider_photos'     =>  get_option('wps_active_slider_photos'),
    'carousel_page'     =>  get_option('wps_active_carousel_page'),
    'gallery_page'      =>  get_option('wps_active_gallery_page'),
    'slider_sentences'  =>  get_option('wps_active_slider_sentences'),
    'text_page'         =>  get_option('wps_active_text_page'),
    'showcase_page'     =>  get_option('wps_active_showcase_page'),
    'blog_page'         =>  get_option('wps_active_blog_page'),
    'logo2x'            =>  get_option('wps_general_logo_@2x'),
    'favicon2x'         =>  get_option('wps_general_favicon_@2x'),
    'nbTextPage'        =>  get_option('wps_number_text_page')
);
$i = 0;
foreach((get_pages()) as $pages) { 
$pagetitle = $pages->post_title;
$pageid = $pages->ID;

$data_td['pages'] .= $pageid.'_'.$pagetitle.'=';

++$i;
$data_td['nbPages'] = $i;

}

wp_enqueue_script('wps-panel-script', get_template_directory_uri().'/wps-panel/js/jquery.sortable.js'); 
wp_enqueue_script('panel-js', get_template_directory_uri().'/wps-panel/js/wps-panel-js.js');

wp_localize_script('panel-js', 'php_data_td', $data_td);

}

add_action( 'admin_enqueue_scripts', 'wps_enqueue_color_picker' );
function wps_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', get_template_directory_uri().'/js/color_picker.js', array( 'wp-color-picker' ), false, true );
}
 
 
/* ---------------------------------------------------------------------------------------------------
    INIT wpsPanel
--------------------------------------------------------------------------------------------------- */
add_action('admin_menu', 'wps_panel_init');
function wps_panel_init(){

    wp_enqueue_media();
     
    /* Include the options */
    $blog_title =  get_template_directory();
    include  $blog_title.'/wps-panel/wps-panel-options.php';
      
    /* Save & Reset */
         
        /* Save */
        if (isset($_REQUEST['action']) && 'save' == $_REQUEST['action']){
             
            /* Loop the options, cross reference the current and the submitted values, and save if they're different */
            foreach ($options as $option){
                 
                if($option['type'] != 'open' && $option['type'] != 'close'){
                 
                    if(!is_array($_REQUEST[$option['id']])){ $the_value = stripslashes($_REQUEST[$option['id']]); }else{ $the_value = serialize($_REQUEST[$option['id']]); }
                     
                    if(isset($_REQUEST[$option['id']])){ update_option($option['id'], $the_value); }else{ delete_option($option['id']); } 
                     
                }
                 
            }
             
            /* Redirect to the theme options page */
            header('Location: themes.php?page=wps-panel.php&saved=true');
             
            die;
          
        /* Reset */
        }else if(isset($_REQUEST['action']) && 'reset' == $_REQUEST['action']) {
             
            /* Loop the options and delete them (setting the default values will happen on next page load) */
            foreach ($options as $option) {
                delete_option($option['id']); 
            }
             
            /* Redirect to the theme options page */
            header("Location: themes.php?page=wps-panel.php&reset=true");
             
            die;
          
        }

        if(isset($_GET['toDo']) && $_GET['toDo'] == 'resetLayout'){
            $nbTextPage = get_option('wps_number_text_page') + 7;
            for($i=0;$i<=$nbTextPage;++$i){
                delete_option('pos-'.$i);
            }

            header("Location: themes.php?page=wps-panel.php");
        }
     
    /* Add the page */
    add_theme_page('K panel', 'K panel', 'edit_themes', basename(__FILE__), 'wps_panel_output');
     
}/* wps_panel_init() */
 
/* ---------------------------------------------------------------------------------------------------
    wpsPanel HTML OUTPUT
--------------------------------------------------------------------------------------------------- */
function wps_panel_output(){
     
    /* Declare some vars */
    $sidebar_html = '';
    $fields_html = '';
    $blog_title =  get_template_directory();
  
    /* Include the options from wps-panel-options.php */
    include $blog_title.'/wps-panel/wps-panel-options.php';
  
    /* Go through all the options to populate the 2 vars we declared above */
    include $blog_title.'/wps-panel/wps-panel-generator.php';
     
    ?>
     
    <!-- Form to reset options to default values -->
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="reset" />
        <p>
            Want to <input type="submit" class="button-secondary" value="reset all options" /> to default values?
        </p>
    </form>
      
    <!-- Form with all the options -->
    <form id="tosave" method="post" enctype="multipart/form-data">
      
        <div id="wps-panel">
      
            <div id="wps-panel-sidebar">
      
                <ul>

                    <li class="name_theme"><p><strong>K.</strong> Template</p><hr></li>
      
                    <?php echo $sidebar_html; ?>
      
                </ul>
      
            </div><!-- #wps-panel-sidebar -->

            <div class="cb"></div>
      
            <div id="wps-panel-content">
      
                <?php echo $fields_html; ?>

                <a href="<?php echo home_url() ?>" target="blank"><div id="wps-panel-preview">
                    <img class="retina" src="<?php echo get_template_directory_uri() ?>/wps-panel/images/preview.png" width="16">preview
                </div></a>
      
                <div id="wps-panel-actions">
                    
                    <div class="notif_change"><p>0</p></div>
      
                    <input type="hidden" name="action" value="save" />
                    <input id="tosave" type="submit" class="button-primary" value="save" />
      
                </div><!-- #wps-panel-actions -->
      
            </div><!-- #wps-panel-content -->
      
        </div><!-- #wps_panel -->
      
    </form>

 
    <?php
  
}/* wps_panel_output() */