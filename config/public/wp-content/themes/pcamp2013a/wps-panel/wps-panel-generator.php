<?php
/* ---------------------------------------------------------------------------------------------------
  
    File: wps-panel-generator.php
  
--------------------------------------------------------------------------------------------------- */
  
foreach($options as $option){
  
    /* Get the value of the field (nothing for types open and close). */
    if($option['type'] != 'open' && $option['type'] != 'close'){
  
        /* Variable that will hold the value of this option */
        $real_value = '';
  
        /* Get default value */
        if(isset($option['std'])){
            $default_value = $option['std'];
        }else{$default_value = '';}
        /* Get the value if user has set it */
        if(isset($option['id'])){
            $user_defined_value = get_option($option['id']);
        }else{$user_defined_value = '';}
  
        /* Set the $real_value */
        if($user_defined_value == '') { $real_value = $default_value; }else{ $real_value = $user_defined_value; }
  
    }/* end if */
  
    /* Populate $sidebar_html and $content_html according to the option type */
    switch ($option['type']) {
  
        /* open: Opens a new section */
        case 'open':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            $tab_id = str_replace(' ', '-', strtolower($option['title']));
  
            /* Add the new link in the sidebar for this section */
            $sidebar_html .= '<li><a id="wps-panel-'.$tab_id.'" href="#wps-panel-'.$tab_id.'"><div class="sidebar-pict">'.$option['image'].'</div><div class="sidebar-title">'.$option['title'].'</div></a></li>';
  
            /* Open the new section */
            $fields_html .= '<div class="wps-panel-section" id="wps-panel-'.$tab_id.'">';
  
        break;

        /* open: Opens a new section */
        case 'open_check':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            $tab_id = str_replace(' ', '-', strtolower($option['title']));
  
            /* Add the new link in the sidebar for this section */
            $sidebar_html .= '<li><a href="#wps-panel-'.$tab_id.'"><div id="'.$option['id'].'" class="notif_show_cat"></div><div class="sidebar-pict">'.$option['image'].'</div><div class="sidebar-title">'.$option['title'].'</div></a></li>';
  
            /* Open the new section */
            $fields_html .= '<div class="wps-panel-section" id="wps-panel-'.$tab_id.'">';
  
        break;

        case 'open_sub_sub':

            $fields_html .= '<div class="wps-panel-sub-sub-section">';

        break;

        /* open: Opens a new section */
        case 'open_sub_header':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            $tab_id = str_replace(' ', '-', strtolower($option['title']));

            $id = $option['id'];
            $currentid = explode("_", $id);
            $now = $currentid[3];
  
            /* Add the new link in the sidebar for this section */
            $fields_html .= '<div class="wps-panel-field open-sub '.$option['id'].'"><span class="arrow-expend"></span><h3 id="h3_header_slide'.$now.'">'.$option['title'].'</h3><span id="delete_header_slide_'.$now.'" class="delete_header_slide delete">Delete</span><img class="expend retina" src="'.get_bloginfo('template_directory').'/wps-panel/images/expend.png" width="14"><hr></div>';
  
            /* Open the new section */
            $fields_html .= '<div class="wps-panel-sub-section '.$option['id'].'">';
  
        break;

        /* open: Opens a new section */
        case 'open_slider_header':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            if(isset($option['title'])){
                $tab_id = str_replace(' ', '-', strtolower($option['title']));
            }
  
            /* Open the new section */
            $fields_html .= '<div id="slider_header">';
  
        break;

        /* open: Opens a new section */
        case 'open_sub_event':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            $tab_id = str_replace(' ', '-', strtolower($option['title']));

            $id = $option['id'];
            $currentid = explode("_", $id);
            $now = $currentid[1];
  
            /* Add the new link in the sidebar for this section */
            $fields_html .= '<div class="wps-panel-field open-sub '.$option['id'].'"><span class="arrow-expend"></span><h3 id="h3_event'.$now.'">'.$option['title'].'</h3><span id="delete_event_'.$now.'" class="delete_event delete">Delete</span><img class="expend retina" src="'.get_bloginfo('template_directory').'/wps-panel/images/expend.png" width="14"><hr></div>';
  
            /* Open the new section */
            $fields_html .= '<div class="wps-panel-sub-section '.$option['id'].'">';
  
        break;

        /* open: Opens a new section */
        case 'open_timeline_page':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            if(isset($option['title'])){
                $tab_id = str_replace(' ', '-', strtolower($option['title']));
            }
  
            /* Open the new section */
            $fields_html .= '<div id="timeline_page">';
  
        break;

        /* open: Opens a new section */
        case 'open_sub_tab_team':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            $tab_id = str_replace(' ', '-', strtolower($option['title']));

            $id = $option['id'];
            $currentid = explode("_", $id);
            $now = $currentid[2];
  
            /* Add the new link in the sidebar for this section */
            $fields_html .= '<div class="wps-panel-field open-sub '.$option['id'].'"><span class="arrow-expend"></span><h3 id="h3_tab_team'.$now.'">'.$option['title'].'</h3><span id="delete_tab_team_'.$now.'" class="delete_tab_team delete">Delete</span><img class="expend retina" src="'.get_bloginfo('template_directory').'/wps-panel/images/expend.png"  width="14"><hr></div>';
  
            /* Open the new section */
            $fields_html .= '<div id="sub_'.$option['id'].'" class="wps-panel-sub-section '.$option['id'].'">';
  
        break;

        /* open: Opens a new section */
        case 'open_sub_member_tab_team':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            $tab_id = str_replace(' ', '-', strtolower($option['title']));

            $id = $option['id'];
            $currentid = explode("_", $id);
            $now1 = $currentid[1];
            $now2 = $currentid[3];
  
            /* Add the new link in the sidebar for this section */
            $fields_html .= '<div class="wps-panel-field open-sub '.$option['id'].'"><span class="arrow-expend"></span><h3 id="h3_member_'.$now1.'_tab_'.$now2.'_team">'.$option['title'].'</h3><span id="delete_member_'.$now1.'_tab_'.$now2.'_team" class="delete_member_tab_team delete">Delete</span><img class="expend retina" src="'.get_bloginfo('template_directory').'/wps-panel/images/expend.png"  width="14"><hr></div>';
  
            /* Open the new section */
            $fields_html .= '<div class="wps-panel-sub-section '.$option['id'].'">';
  
        break;

        /* open: Opens a new section */
        case 'open_thumbnail_page':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            if(isset($option['title'])){
                $tab_id = str_replace(' ', '-', strtolower($option['title']));
            }
  
            /* Open the new section */
            $fields_html .= '<div id="thumbnail_page">';
  
        break;

        /* open: Opens a new section */
        case 'open_sub_tab_product':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            $tab_id = str_replace(' ', '-', strtolower($option['title']));

            $id = $option['id'];
            $currentid = explode("_", $id);
            $now = $currentid[2];
  
            /* Add the new link in the sidebar for this section */
            $fields_html .= '<div class="wps-panel-field open-sub '.$option['id'].'"><span class="arrow-expend"></span><h3 id="h3_tab_product_'.$now.'">'.$option['title'].'</h3><span id="delete_tab_product_'.$now.'" class="delete_tab_product delete">Delete</span><img class="expend retina" src="'.get_bloginfo('template_directory').'/wps-panel/images/expend.png"  width="14"><hr></div>';
  
            /* Open the new section */
            $fields_html .= '<div id="sub_'.$option['id'].'" class="wps-panel-sub-section '.$option['id'].'">';
  
        break;

        /* open: Opens a new section */
        case 'open_sub_screen_product':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            $tab_id = str_replace(' ', '-', strtolower($option['title']));

            $id = $option['id'];
            $currentid = explode("_", $id);
            $now1 = $currentid[1];
            $now2 = $currentid[3];
  
            /* Add the new link in the sidebar for this section */
            $fields_html .= '<div class="wps-panel-field open-sub '.$option['id'].'"><span class="arrow-expend"></span><h3 id="h3_screen_'.$now1.'_tab_'.$now2.'_product">'.$option['title'].'</h3><span id="delete_screen_'.$now1.'_tab_'.$now2.'_product" class="delete_screen_tab_product delete">Delete</span><img class="expend retina" src="'.get_bloginfo('template_directory').'/wps-panel/images/expend.png"  width="14"><hr></div>';
  
            /* Open the new section */
            $fields_html .= '<div class="wps-panel-sub-section '.$option['id'].'">';
  
        break;

        /* open: Opens a new section */
        case 'open_carousel_page':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            if(isset($option['title'])){
                $tab_id = str_replace(' ', '-', strtolower($option['title']));
            }
  
            /* Open the new section */
            $fields_html .= '<div id="carousel_page">';
  
        break;

        /* open: Opens a new section */
        case 'open_sub_service':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            $tab_id = str_replace(' ', '-', strtolower($option['title']));

            $id = $option['id'];
            $currentid = explode("_", $id);
            $now = $currentid[1];
  
            /* Add the new link in the sidebar for this section */
            $fields_html .= '<div class="wps-panel-field open-sub '.$option['id'].'"><span class="arrow-expend"></span><h3 id="h3_service_'.$now.'">'.$option['title'].'</h3><span id="delete_service_'.$now.'" class="delete_service delete">Delete</span><img class="expend retina" src="'.get_bloginfo('template_directory').'/wps-panel/images/expend.png" width="14"><hr></div>';
  
            /* Open the new section */
            $fields_html .= '<div class="wps-panel-sub-section '.$option['id'].'">';
  
        break;

        /* open: Opens a new section */
        case 'open_gallery_page':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            if(isset($option['title'])){
                $tab_id = str_replace(' ', '-', strtolower($option['title']));
            }
  
            /* Open the new section */
            $fields_html .= '<div id="gallery_page">';
  
        break;

        /* open: Opens a new section */
        case 'open_text_page':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            if(isset($option['title'])){
                $tab_id = str_replace(' ', '-', strtolower($option['title']));
            }
  
            /* Open the new section */
            $fields_html .= '<div id="text_page">';
  
        break;

        /* open: Opens a new section */
        case 'open_sub_text_page':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            $tab_id = str_replace(' ', '-', strtolower($option['title']));

            $id = $option['id'];
            $currentid = explode("_", $id);
            $now = $currentid[2];
  
            /* Add the new link in the sidebar for this section */
            $fields_html .= '<div class="wps-panel-field open-sub '.$option['id'].'"><span class="arrow-expend"></span><h3 id="h3_text_page_'.$now.'">'.$option['title'].'</h3><span id="delete_text_page_'.$now.'" class="delete_text_page delete">Delete</span><img class="expend retina" src="'.get_bloginfo('template_directory').'/wps-panel/images/expend.png" width="14"><hr></div>';
  
            /* Open the new section */
            $fields_html .= '<div class="wps-panel-sub-section '.$option['id'].'">';
  
        break;

        /* open: Opens a new section */
        case 'open_sub_work':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            $tab_id = str_replace(' ', '-', strtolower($option['title']));

            $id = $option['id'];
            $currentid = explode("_", $id);
            $now = $currentid[1];
  
            /* Add the new link in the sidebar for this section */
            $fields_html .= '<div class="wps-panel-field open-sub '.$option['id'].'"><span class="arrow-expend"></span><h3 id="h3_work_'.$now.'">'.$option['title'].'</h3><span id="delete_work_'.$now.'" class="delete_work delete">Delete</span><img class="expend retina" src="'.get_bloginfo('template_directory').'/wps-panel/images/expend.png" width="14"><hr></div>';
  
            /* Open the new section */
            $fields_html .= '<div class="wps-panel-sub-section '.$option['id'].'">';
  
        break;

        /* open: Opens a new section */
        case 'open_showcase_page':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            if(isset($option['title'])){
                $tab_id = str_replace(' ', '-', strtolower($option['title']));
            }
  
            /* Open the new section */
            $fields_html .= '<div id="showcase_page">';
  
        break;

        /* open: Opens a new section */
        case 'open_sub_photo_slide':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            $tab_id = str_replace(' ', '-', strtolower($option['title']));

            $id = $option['id'];
            $currentid = explode("_", $id);
            $now = $currentid[2];
  
            /* Add the new link in the sidebar for this section */
            $fields_html .= '<div class="wps-panel-field open-sub '.$option['id'].'"><span class="arrow-expend"></span><h3 id="h3_photo_slide_'.$now.'">'.$option['title'].'</h3><span id="delete_photo_slide_'.$now.'" class="delete_photo_slide delete">Delete</span><img class="expend retina" src="'.get_bloginfo('template_directory').'/wps-panel/images/expend.png" width="14"><hr></div>';
  
            /* Open the new section */
            $fields_html .= '<div class="wps-panel-sub-section '.$option['id'].'">';
  
        break;

        /* open: Opens a new section */
        case 'open_photo_slide':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            if(isset($option['title'])){
                $tab_id = str_replace(' ', '-', strtolower($option['title']));
            }
  
            /* Open the new section */
            $fields_html .= '<div id="slider_photos">';
  
        break;

        /* open: Opens a new section */
        case 'open_sub_sentence_slide':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            $tab_id = str_replace(' ', '-', strtolower($option['title']));

            $id = $option['id'];
            $currentid = explode("_", $id);
            $now = $currentid[2];
  
            /* Add the new link in the sidebar for this section */
            $fields_html .= '<div class="wps-panel-field open-sub '.$option['id'].'"><span class="arrow-expend"></span><h3 id="h3_sentence_slide_'.$now.'">'.$option['title'].'</h3><span id="delete_sentence_slide_'.$now.'" class="delete_sentence_slide delete">Delete</span><img class="expend retina" src="'.get_bloginfo('template_directory').'/wps-panel/images/expend.png" width="14"><hr></div>';
  
            /* Open the new section */
            $fields_html .= '<div class="wps-panel-sub-section '.$option['id'].'">';
  
        break;

        /* open: Opens a new section */
        case 'open_sentence_slide':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            if(isset($option['title'])){
                $tab_id = str_replace(' ', '-', strtolower($option['title']));
            }
  
            /* Open the new section */
            $fields_html .= '<div id="slider_sentences">';
  
        break;

        /* open: Opens a new section */
        case 'open_blog_page':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            if(isset($option['title'])){
                $tab_id = str_replace(' ', '-', strtolower($option['title']));
            }
  
            /* Open the new section */
            $fields_html .= '<div id="blog_page">';
  
        break;

        /* open: Opens a new section */
        case 'open_contact_page':
  
            /* Generate the id which will be used as the id of the section (for the tabs system purposes) */
            if(isset($option['title'])){
                $tab_id = str_replace(' ', '-', strtolower($option['title']));
            }
  
            /* Open the new section */
            $fields_html .= '<div id="contact_page">';
  
        break;
  
        /* close: Closes the current section */
        case 'close':
  
            /* Close the current section */
            $fields_html .= '</div><!-- .wps-panel-section -->';
  
        break;

        /* close: Closes the current section */
        case 'close_sub':
  
            /* Close the current section */
            $fields_html .= '</div><!-- .wps-panel-sub-section -->';
  
        break;


        /* text: Simple textual input field */
        case 'title_text':
  
            /* Field container open */
            if(isset($option['class'])){$class=$option['class'];}else{$class='';}
            $fields_html .= '<div class="wps-panel-field '.$class.'">';
  
                /* Label */
                $fields_html .= '<div class="content-pict">'.$option['image'].'</div><label for="'.$option['id'].'">'.$option['title'].'</label>';
  
                /* Description */
                if(isset($option['desc'])){
                    $fields_html .= '<div class="wps-panel-description">';
                        $fields_html .= $option['desc'];
                    $fields_html .= '</div><!-- .jw-field-description -->';
                }       
  
                /* The Field */
                $fields_html .= '<input type="text" name="'.$option['id'].'" id="'.$option['id'].'" value="'.$real_value.'" readonly/>';
  
            /* Field container close */
            $fields_html .= '</div><!-- .wps-panel-field -->';
  
        break;

        /* text: Simple textual input field */
        case 'title_img':
  
            /* Field container open */
            if(isset($option['class'])){$class=$option['class'];}else{$class='';}
            $fields_html .= '<div class="wps-panel-field '.$class.'">';
  
                /* Label */
                $fields_html .= '<div class="content-pict">'.$option['image'].'</div>'.$option['title'].'';
  
            /* Field container close */
            $fields_html .= '</div><!-- .wps-panel-field -->';
  
        break;

        /* text: Simple textual input field */
        case 'title':
  
            /* Field container open */
            if(isset($option['class'])){$class=$option['class'];}else{$class='';}
            $fields_html .= '<div class="wps-panel-field '.$class.'">';
  
                /* Label */
                $fields_html .= $option['title'];
  
            /* Field container close */
            $fields_html .= '</div><!-- .wps-panel-field -->';
  
        break;
  
        /* text: Simple textual input field */
        case 'sub_title':
  
            /* Field container open */
            if(isset($option['class'])){$class=$option['class'];}else{$class='';}
            $fields_html .= '<div class="wps-panel-field '.$class.'">';
  
                /* Label */
                $fields_html .= '<div class="title3">'.$option['title'].'</div>';
  
            /* Field container close */
            $fields_html .= '</div><!-- .wps-panel-field -->';
  
        break;

        /* text: Simple textual input field */
        case 'text':
  
            /* Field container open */
            if(isset($option['class'])){$class=$option['class'];}else{$class='';}
            $fields_html .= '<div class="wps-panel-field '.$class.'">';
  
                /* Label */
                $fields_html .= '<label for="'.$option['id'].'">'.$option['title'].'</label>';
  
                /* Description */
                if(isset($option['desc'])){
                    $fields_html .= '<div class="wps-panel-description">';
                        $fields_html .= $option['desc'];
                    $fields_html .= '</div><!-- .jw-field-description -->';
                }       
  
                /* The Field */
                if(isset($option['plh'])){$plh=$option['plh'];}else{$plh='';}
                $fields_html .= '<input type="text" name="'.$option['id'].'" id="'.$option['id'].'" value="'.$real_value.'" placeholder="'.$plh.'"/>';
  
            /* Field container close */
            $fields_html .= '</div><!-- .wps-panel-field -->';
  
        break;

        /* text: Simple textual input field */
        case 'color_choice':
  
            /* Field container open */
            if(isset($option['class'])){$class=$option['class'];}else{$class='';}
            $fields_html .= '<div class="wps-panel-field '.$class.'">';
  
                /* Label */
                $fields_html .= '<label for="'.$option['id'].'">'.$option['title'].'</label>';
  
                /* Description */
                if(isset($option['desc'])){
                    $fields_html .= '<div class="wps-panel-description">';
                        $fields_html .= $option['desc'];
                    $fields_html .= '</div><!-- .jw-field-description -->';
                }       
  
                /* The Field */
                $fields_html .= '<input class="my-color-field" type="text" name="'.$option['id'].'" id="'.$option['id'].'" value="'.$real_value.'" />';
  
            /* Field container close */
            $fields_html .= '</div><!-- .wps-panel-field -->';
  
        break;


        /* text: Simple textual input field */
        case 'upload_text':
  
            /* Field container open */
            if(isset($option['class'])){$class=$option['class'];}else{$class='';}
            $fields_html .= '<div class="wps-panel-field '.$class.'">';
  
                /* Label */
                $fields_html .= '<label for="'.$option['id'].'">'.$option['title'].'</label>';
  
                /* The Field */
                $fields_html .= '<input type="text" name="'.$option['id'].'" id="'.$option['id'].'" value="'.$real_value.'" /><a href="#" class="upload_button addmedia"><img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/upload.png"></a>';
  
            /* Field container close */
            $fields_html .= '</div><!-- .wps-panel-field -->';
  
        break;

        /* text: Simple textual input field */
        case 'upload_text_img':
  
            /* Field container open */
            if(isset($option['class'])){$class=$option['class'];}else{$class='';}
            $fields_html .= '<div class="wps-panel-field '.$class.'">';
  
                /* Label */
                $fields_html .= '<label for="'.$option['id'].'">'.$option['title'].'</label>';
  
                /* The Field */
                $fields_html .= '<input type="text" name="'.$option['id'].'" id="'.$option['id'].'" value="'.$real_value.'" class="upload-input"/><a href="#" class="upload_button addmedia"><img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/upload.png"></a><img class="uploaded" src="'.$real_value.'">';
  
            /* Field container close */
            $fields_html .= '</div><!-- .wps-panel-field -->';
  
        break;

        /* text: Simple textual input field */
        case 'sub_upload_text_img':
  
            /* Field container open */
            $fields_html .= '<div class="wps-panel-field '.$option['class'].'">';
  
                /* The Field */
                $fields_html .= '<img class="retina retina_icon" src="'.get_bloginfo("template_directory").'/wps-panel/images/retina.png" alt="retina" title="retina"> retina <input type="text" name="'.$option['id'].'" id="'.$option['id'].'" value="'.$real_value.'" class="upload-input"/><a href="#" class="upload_button addmedia"><img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/upload.png"></a><img class="uploaded" src="'.$real_value.'">';
  
            /* Field container close */
            $fields_html .= '</div><!-- .wps-panel-field -->';
  
        break;
  
        /* textarea: Text area field */
        case 'textarea':
  
            /* Field container open */
            $fields_html .= '<div class="wps-panel-field">';
  
                /* Label */
                $fields_html .= '<label for="'.$option['id'].'">'.$option['title'].'</label>';
  
                /* Description */
                if(isset($option['desc'])){
                    $fields_html .= '<div class="wps-panel-description">';
                        $fields_html .= $option['desc'];
                    $fields_html .= '</div><!-- .jw-field-description -->';
                }       
  
                /* The Field */
                $fields_html .= '<textarea name="'.$option['id'].'" id="'.$option['id'].'">'.$real_value.'</textarea>';
  
            /* Field container close */
            $fields_html .= '</div><!-- .wps-panel-field -->';
  
        break;
  
        /* select: Select field */
        case 'select':
  
            /* Field container open */
            $fields_html .= '<div class="wps-panel-field">';
  
                /* Label */
                $fields_html .= '<label for="'.$option['id'].'">'.$option['title'].'</label>';
  
                /* Description */
                if(isset($option['desc'])){
                    $fields_html .= '<div class="wps-panel-description">';
                        $fields_html .= $option['desc'];
                    $fields_html .= '</div><!-- .jw-field-description -->';
                }       
  
                /* The Field */
                $fields_html .= '<select name="'.$option['id'].'" id="'.$option['id'].'">';
  
                    /* Loop options */
                    foreach($option['opts'] as $key => $value){
  
                        /* Which options should be selected */
                        if($value == $real_value){
                            $active_attr = 'selected';
                        }else{
                            $active_attr = '';
                        }
  
                        /* Option */
                        $fields_html .= '<option value="'.$value.'" '.$active_attr.'>'.$key.'</option>';
  
                    }
  
                $fields_html .= '</select>';
  
            /* Field container close */
            $fields_html .= '</div><!-- .wps-panel-field -->';
  
        break;/* select: Select field */

        case 'select_text_page':
  
            /* Field container open */
            $fields_html .= '<div class="wps-panel-field">';
  
                /* Label */
                $fields_html .= '<label for="'.$option['id'].'">'.$option['title'].'</label>';
  
                /* Description */
                if(isset($option['desc'])){
                    $fields_html .= '<div class="wps-panel-description">';
                        $fields_html .= $option['desc'];
                    $fields_html .= '</div><!-- .jw-field-description -->';
                }       
  
                /* The Field */
                $fields_html .= '<select name="'.$option['id'].'" id="'.$option['id'].'">';
  
                    /* Loop options */
                    foreach((get_pages()) as $pages) { 
                    $pagetitle = $pages->post_title;
                    $pageid = $pages->ID;
  
                        /* Which options should be selected */
                        if($pageid == $real_value){
                            $active_attr = 'selected';
                        }else{
                            $active_attr = '';
                        }
  
                        /* Option */
                        $fields_html .= '<option value="'.$pageid.'" '.$active_attr.'>'.$pagetitle.'</option>';
  
                    }
  
                $fields_html .= '</select>';
  
            /* Field container close */
            $fields_html .= '</div><!-- .wps-panel-field -->';
  
        break;

        /* select: Select field */
        case 'select_font':
  
            /* Field container open */
            $fields_html .= '<div class="wps-panel-field">';
  
                /* Label */
                $fields_html .= '<label for="'.$option['id'].'">'.$option['title'].'</label>';
  
                /* Description */
                if(isset($option['desc'])){
                    $fields_html .= '<div class="wps-panel-description">';
                        $fields_html .= $option['desc'];
                    $fields_html .= '</div><!-- .jw-field-description -->';
                }       
  
                /* The Field */
                $fields_html .= '<select name="'.$option['id'].'" id="'.$option['id'].'">';
  
                    /* Loop options */
                    foreach($option['opts'] as $key => $value){
  
                        /* Which options should be selected */
                        if($value == $real_value){
                            $active_attr = 'selected';
                        }else{
                            $active_attr = '';
                        }
  
                        /* Option */
                        $fields_html .= '<option value="'.$key.'" '.$active_attr.'>'.$value.'</option>';
  
                    }
  
                $fields_html .= '</select>';
  
            /* Field container close */
            $fields_html .= '</div><!-- .wps-panel-field -->';
  
        break;
  
        /* radio: radio field */
        case 'radio_product':
  
            /* Field container open */
            $fields_html .= '<div class="wps-panel-field">';
  
                /* Label */
                $fields_html .= '<label>'.$option['title'].'</label><span class="container_radio_products">';

                $id = $option['id'];
                $currentid = explode("_", $id);
                $now = $currentid[3]; 
  
                /* Description */
                if(isset($option['desc'])){
                    $fields_html .= '<div class="wps-panel-description">';
                        $fields_html .= $option['desc'];
                    $fields_html .= '</div><!-- .jw-field-description -->';
                }       
  
                /* The Field */
                foreach($option['opts'] as $key => $value){
  
                    /* Which options should be selected */
                    if($value == $real_value){
                        $active_attr = 'checked';
                    }else{
                        $active_attr = '';
                    }
  
                    /* Field */
                    $fields_html .= '<span class="input_products"><input class="radio_products radios_'.$now.'" type="radio" name="'.$option['id'].'" value="'.$value.'" '.$active_attr.'><img class="retina products_choice" src="'.get_bloginfo('template_directory').'/wps-panel/images/'.$key.'.png">'.$key.'</span>';
  
                }
  
            /* Field container close */
            $fields_html .= '</span></div><!-- .wps-panel-field -->';
  
        break;/* radio: radio field */

        case 'radio_text':
  
            /* Field container open */
            $fields_html .= '<div class="wps-panel-field">';
  
                /* Label */
                $fields_html .= '<label>'.$option['title'].'</label><span class="container_inline">';
  
                /* The Field */
                foreach($option['opts'] as $key => $value){
  
                    /* Which options should be selected */
                    if($value == $real_value){
                        $active_attr = 'checked';
                    }else{
                        $active_attr = '';
                    }
  
                    /* Field */
                    $fields_html .= '<span class="input_text"><input class="radio_text" type="radio" name="'.$option['id'].'" value="'.$value.'" '.$active_attr.'><img class="cols_text_choice retina" src="'.get_bloginfo('template_directory').'/wps-panel/images/'.$key.'.png">'.$key.'</span>';
  
                }
  
            /* Field container close */
            $fields_html .= '</span></div><!-- .wps-panel-field -->';
  
        break;

        case 'radio':
  
            /* Field container open */
            $fields_html .= '<div class="wps-panel-field">';
  
                /* Label */
                $fields_html .= '<label>'.$option['title'].'</label><span class="container_inline">';
  
                /* The Field */
                foreach($option['opts'] as $key => $value){
  
                    /* Which options should be selected */
                    if($value == $real_value){
                        $active_attr = 'checked';
                    }else{
                        $active_attr = '';
                    }
  
                    /* Field */
                    $fields_html .= '<span class="input_text"><input class="radio" type="radio" name="'.$option['id'].'" value="'.$value.'" '.$active_attr.'>'.$key.'</span>';
  
                }
  
            /* Field container close */
            $fields_html .= '</span></div><!-- .wps-panel-field -->';
  
        break;

        case 'radio_map':
  
            /* Field container open */
            $fields_html .= '<div class="wps-panel-field">';
  
                /* Label */
                $fields_html .= '<label>'.$option['title'].'</label><span class="container_inline">';
  
                /* The Field */
                foreach($option['opts'] as $key => $value){
  
                    /* Which options should be selected */
                    if($value == $real_value){
                        $active_attr = 'checked';
                    }else{
                        $active_attr = '';
                    }
  
                    /* Field */
                    $fields_html .= '<span class="input_text"><input id="radio_'.$value.'" class="radio radio_map" type="radio" name="'.$option['id'].'" value="'.$value.'" '.$active_attr.'>'.$key.'</span>';
  
                }
  
            /* Field container close */
            $fields_html .= '</span></div><!-- .wps-panel-field -->';
  
        break;

        /* checkbox: checkbox field */
        case 'checkbox':
  
            /* Field container open */
            $fields_html .= '<div class="wps-panel-field checkbox_contain">';

                /* Title */
                $fields_html .= '<div class="label">'.$option['title'].'</div>';
  
                /* The Field */
                if($value == $real_value){
                    $active_attr = 'checked';
                }else{
                    $active_attr = '';
                }
  
                /* Field */
                $fields_html .= '<div class="styled_checkbox"><input type="checkbox" name="'.$option['id'].'" value="'.$value.'" '.$active_attr.'>';

                /* Label */
                $fields_html .= '<label for="'.$option['id'].'"><img class="retina" src="'.get_bloginfo("template_directory").'/images/checked.png" width="14"></label></div>';
  
            /* Field container close */
            $fields_html .= '</div><!-- .wps-panel-field -->';
  
        break;

        /* checkbox: checkbox field */
        case 'checkbox_show_cat':
  
            /* Field container open */
            $fields_html .= '<div class="wps-panel-field">';

                /* Title */
                $fields_html .= $option['title'];

                foreach($option['opts'] as $key => $value){
  
                /* The Field */
                if($value == $real_value){
                    $active_attr = 'checked';
                }else{
                    $active_attr = '';
                }

                $id = $option['id'];
                $currentid = explode("_", $id);
                $img = $currentid[2].'_'.$currentid[3]; 

                if($img != "slider_header" && $img != "blog_page" && $img != "contact_page"){
                    $fields_html .= '<div class="example"><a href="'.get_bloginfo("template_directory").'/wps-panel/images/example/'.$img.'.jpg" target="blank">view an example</a></div>';
                }
  
                /* Field */
                if(isset($option['desc'])){$desc=$option['desc'];}else{$desc='';}
                $fields_html .= '<img class="no-watch retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/no-watch.png" width="17"><div class="switch"><input class="checkbox_show_cat" type="checkbox" name="'.$option['id'].'" value="'.$value.'" '.$active_attr.'>'.$desc.'';

                /* Label */
                $fields_html .= '<label for="'.$option['id'].'"><i></i></label></div><img class="watch retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/Watch.png" width="18">';

                }
  
            /* Field container close */
            $fields_html .= '</div><hr><!-- .wps-panel-field -->';
  
        break;

        /* checkbox: checkbox field */
        case 'add_slide':
  
            /* Field container open */
            $fields_html .= '<div class="wps-panel-field add_slide">';

                /* Field */
                if(isset($option['class'])){$class=$option['class'];}else{$class='';}
                $fields_html .= '<a id="'.$option['id'].'" class="addbutton '.$class.'" href="#"><img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/addpictures.png" width="18">'.$option['title'].'</a>';

  
            /* Field container close */
            $fields_html .= '</div><!-- .wps-panel-field -->';
  
        break;

        /* checkbox: checkbox field */
        case 'add_product':
  
            /* Field container open */
            $fields_html .= '<div class="wps-panel-field add_slide">';

                /* Field */
                $fields_html .= '<a id="'.$option['id'].'" class="addbutton" href="#"><img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/addtab.png" width="21">'.$option['title'].'</a>';

  
            /* Field container close */
            $fields_html .= '</div><!-- .wps-panel-field -->';
  
        break;

        /* checkbox: checkbox field */
        case 'dragdrop-open':
  
            /* Field container open */
            $fields_html .= '<div class="wps-panel-field"><ul class="sortable list">';
  
        break;
        /* checkbox: checkbox field */
        case 'dragdrop-li':

            $tab_std = str_replace(' ', '_', strtolower($real_value));

            if($tab_std == "slider_photos"){ $title = "Pictures and Text"; }
            else if($tab_std == "slider_sentences"){ $title = "Background and Text"; }
            else { $title = get_option('wps_title_'.$tab_std); }

            $nbTextpage = get_option('wps_number_text_page');
            for($j=1;$j<=$nbTextpage;++$j){
                if($tab_std == "text_page_".$j){
                    $tab_std = "text_page";
                }
            }
            
            $fields_html .= '<li class="'.$option['id'].'"><input type="hidden" name="'.$option['id'].'" class="'.$option['id'].'" value="'.$real_value.'" /><span class="layout_cat"><img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/'.$tab_std.'.png" width="17"></span><p>'.$real_value.'</p><span class="cat_title">'.$title.'</span><img class="retina layout_drag" src="'.get_bloginfo("template_directory").'/wps-panel/images/drag&drop.png" width="17"></li>';
  
        break;

        /* checkbox: checkbox field */
        case 'dragdrop-close':
  
            /* Field container close */
            $fields_html .= '</ul></div><!-- .wps-panel-field -->';
  
        break;

        /* checkbox: checkbox field */
        case 'reset_layout':
  
            /* Field container close */
            $fields_html .= '<div class="wps-panel-field"><a href="themes.php?page=wps-panel.php&toDo=resetLayout" id="reset_layout">RESET LAYOUT</a></div>';
  
        break;
  
    }/* end switch */
  
}/* end foreach */