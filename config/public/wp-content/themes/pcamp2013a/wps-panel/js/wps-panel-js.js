jQuery(document).ready(function($){

    var templateDir = php_data_td.blog_title;

    // Set pixelRatio to 1 if the browser doesn't offer it up.
    var pixelRatio = !!window.devicePixelRatio ? window.devicePixelRatio : 1;
     
    // Rather than waiting for document ready, where the images
    // have already loaded, we'll jump in as soon as possible.
    $(window).on("load", function() {
        if (pixelRatio > 1) {
            $('img.retina').each(function() {
     
                // Very naive replacement that assumes no dots in file names.
                $(this).attr('src', $(this).attr('src').replace(".png","@2x.png"));
            });

            var logo = php_data_td.logo2x;
            var favicon = php_data_td.favicon2x;

            $('#logo a img').attr('src', logo);
            $('link[rel="icon"]').attr('href', favicon);

            $('.all_services').each(function(){
                var data = $(this).find('img').attr('data');
                if(data != ""){$(this).find('img').attr('src', data);}                
            });
            $('.news .icon').each(function(){
                var data = $(this).find('img').attr('data');
                if(data != ""){$(this).find('img').attr('src', data);}                
            });
        }
    });
     
    /* Assign .wps-panel-active class to the first section link and the first section content */
    $('#wps-panel-sidebar a:first').addClass('wps-panel-active');
    $('#wps-panel-content .wps-panel-section:first').addClass('wps-panel-active');
     
    /* Handle the section change when a section link is clicked */
    $('#wps-panel-sidebar a').click(activeSidebar);

    function activeSidebar(e){
         
        /* Prevent default behaviour */
        e.preventDefault();
         
        /* Get the section id */
        var section_id = $(this).attr('href');
         
        /* Remove .wps-panel-active class from the previous section link and add it to the new one */
        $('#wps-panel-sidebar .wps-panel-active').removeClass('wps-panel-active');
        $(this).addClass('wps-panel-active');
         
        /* Add .wps-panel-active class to the new section content and remove it from the previous one */
        $('#wps-panel-content .wps-panel-section' + section_id).addClass('wps-panel-active').siblings('.wps-panel-active').removeClass('wps-panel-active');
         
    }

    function notifIncr() {
        var div = $('.notif_change');
        div.css('display','block');
        var count = parseInt(div.text()) + 1;
        div.html('<p>' + count +'</p>');
    };

    $(".wps-panel-field input, .wps-panel-field textarea, .wps-panel-field select").change(notifIncr);
    $('#wps-panel-content').on('mouseup', '.ui-slider-handle', notifIncr);

    function save(e) {
        e.preventDefault();
        var url = 'themes.php?page=wps-panel.php';
        $.ajax({ 
          type: "POST",
          url: url,
          data: $("#tosave").serialize()
        });  
        var div = $('.notif_change');
        var bg = $('#wps-panel-actions .button-primary');
        div.html('<p>0</p>');
        div.css('display','none');
        bg.css({'background-color': '#9bd483', 'color': '#fff', 'background-image': 'url("' + templateDir + '/wps-panel/images/save-click.png")'});
        setTimeout(function(){
          bg.css({'background-color': '#51555e', 'color': '#86888d', 'background-image': 'url("' + templateDir + '/wps-panel/images/save.png")'});
        },2000);
    }

    function expending1() {
        $(this).parent().next('.wps-panel-sub-section').slideToggle('slow').toggleClass('sub_selected');
        $(this).parent().toggleClass('sub_selected');
        $(this).toggleClass('down');
    }

    function expending2() {
        $(this).parent().next('.wps-panel-sub-section').slideToggle('slow').toggleClass('sub_selected');
        $(this).parent().toggleClass('sub_selected');
        $(this).parent().find('.arrow-expend').toggleClass('down');
    }

    $('#tosave.button-primary').click(save);
    $('#wps-panel').on("click", '.wps-panel-field.open-sub .arrow-expend', expending1);
    $('#wps-panel').on("click", '.wps-panel-field.open-sub .expend', expending2); 

    $('#wps_number_slides_photo').parent().css('margin-top', '30px');
    $('#wps_number_slides_sentences').parent().css('margin-top', '30px');

    $('li.pos-null1').addClass('ui-state-disabled');
    $('li.pos-null2').addClass('ui-state-disabled');

    function initLayout(){
        var active_timeline_page = $('input.checkbox_show_cat[name="wps_active_timeline_page"]');
        var active_thumbnail_page = $('input.checkbox_show_cat[name="wps_active_thumbnail_page"]');
        var active_slider_photos = $('input.checkbox_show_cat[name="wps_active_slider_photos"]');
        var active_carousel_page = $('input.checkbox_show_cat[name="wps_active_carousel_page"]');
        var active_gallery_page = $('input.checkbox_show_cat[name="wps_active_gallery_page"]');
        var active_slider_sentences = $('input.checkbox_show_cat[name="wps_active_slider_sentences"]');
        var active_text_page = $('input.checkbox_show_cat[name="wps_active_text_page"]');
        var active_showcase_page = $('input.checkbox_show_cat[name="wps_active_showcase_page"]');
        var active_blog_page = $('input.checkbox_show_cat[name="wps_active_blog_page"]');
        var nbTextPage = php_data_td.nbTextPage;

        if(!active_timeline_page.is(':checked')){
            var theClass = $('input[value="Timeline page"]').attr('class');
            $('li.' + theClass).addClass('ui-state-disabled');
        } else { var theClass = $('input[value="Timeline page"]').attr('class'); $('li.' + theClass).removeClass('ui-state-disabled'); }
        if(!active_thumbnail_page.is(':checked')){
            var theClass = $('input[value="Thumbnail page"]').attr('class');
            $('li.' + theClass).addClass('ui-state-disabled');
        } else { var theClass = $('input[value="Thumbnail page"]').attr('class'); $('li.' + theClass).removeClass('ui-state-disabled'); }
        if(!active_slider_photos.is(':checked')){
            var theClass = $('input[value="Slider photos"]').attr('class');
            $('li.' + theClass).addClass('ui-state-disabled');
        } else { var theClass = $('input[value="Slider photos"]').attr('class'); $('li.' + theClass).removeClass('ui-state-disabled'); }
        if(!active_carousel_page.is(':checked')){
            var theClass = $('input[value="Carousel page"]').attr('class');
            $('li.' + theClass).addClass('ui-state-disabled');
        } else { var theClass = $('input[value="Carousel page"]').attr('class'); $('li.' + theClass).removeClass('ui-state-disabled'); }
        if(!active_gallery_page.is(':checked')){
            var theClass = $('input[value="Gallery page"]').attr('class');
            $('li.' + theClass).addClass('ui-state-disabled');
        } else { var theClass = $('input[value="Gallery page"]').attr('class'); $('li.' + theClass).removeClass('ui-state-disabled'); }
        if(!active_slider_sentences.is(':checked')){
            var theClass = $('input[value="Slider sentences"]').attr('class');
            $('li.' + theClass).addClass('ui-state-disabled');
        } else { var theClass = $('input[value="Slider sentences"]').attr('class'); $('li.' + theClass).removeClass('ui-state-disabled'); }
        if(!active_text_page.is(':checked')){
            var theClass = $('input[value="Text page"]').attr('class');
            $('li.' + theClass).addClass('ui-state-disabled');
            for(var i = 2; i <= nbTextPage; ++i){
                var theClass = $('input[value="Text page ' + i + '"]').attr('class');
                $('li.' + theClass).addClass('ui-state-disabled');
            }
        } else { var theClass = $('input[value="Text page"]').attr('class'); $('li.' + theClass).removeClass('ui-state-disabled'); }
        if(!active_showcase_page.is(':checked')){
            var theClass = $('input[value="Showcase page"]').attr('class');
            $('li.' + theClass).addClass('ui-state-disabled');
        } else { var theClass = $('input[value="Showcase page"]').attr('class'); $('li.' + theClass).removeClass('ui-state-disabled'); }
        if(!active_blog_page.is(':checked')){
            var theClass = $('input[value="Blog page"]').attr('class');
            $('li.' + theClass).addClass('ui-state-disabled');
        } else { var theClass = $('input[value="Blog page"]').attr('class'); $('li.' + theClass).removeClass('ui-state-disabled'); }

        $(".sortable").sortable({
          items: "li:not(.ui-state-disabled)"
        });
    }

    initLayout();
    $('#wps-panel').on('click', '#wps-panel-layout', initLayout);

    $( ".sortable" ).draggable({ axis: 'y' });

    $('.sortable').sortable().bind('sortupdate', function(e, ui) {
        var current = parseInt(ui.item.index()) - 1;
        var id = ui.item.attr('class');
        var curid = id.split('-');
        var before = curid[1];
        var now1 = parseInt(before) + 1;
        var now2 = parseInt(before) - 1;
        $('input.pos-' + before).attr('name', 'pos-temp');
        $('.pos-' + before).addClass('pos-temp').removeClass('pos-' + before);
        if(before < current){
            for(var i=now1 ; i<=current; ++i){
                var j = parseInt(i) - 1;
                $('input.pos-' + i).attr('name', 'pos-' + j);
                $('.pos-' + i).addClass('pos-' + j).removeClass('pos-' + i);
            }
        }
        else if(before > current){
            for(var i=now2 ; i>=current; --i){
                console.log(i);
                var j = parseInt(i) + 1;
                $('input.pos-' + i).attr('name', 'pos-' + j);
                $('.pos-' + i).addClass('pos-' + j).removeClass('pos-' + i);
            }
        }
        $('input.pos-temp').attr('name', 'pos-' + current );
        $('.pos-temp').addClass('pos-' + current ).removeClass('pos-temp');

        notifIncr();

    });

    function notifCat(){
        var name = $(this).attr('name');
        var block = name.split('_');
        var tochange = '#' + block[2] + '_' + block[3];
        var notif = '#' + name + '_notif';
        var disable = templateDir + '/wps-panel/images/disable.png';
        var active = templateDir + '/wps-panel/images/active.png';
        var watch = templateDir + '/wps-panel/images/Watch.png';
        var nowatch = templateDir + '/wps-panel/images/no-watch.png';


        if($(this).is(':checked')){
            $(notif).addClass('green_notif');
            $(tochange).css('display','block');
            $(this).parent().parent().find('.no-watch').attr('src', nowatch);
            $(this).parent().parent().find('.watch').attr('src', watch);
        } else {
            $(notif).removeClass('green_notif');
            $(tochange).css('display','none');
            $(this).parent().parent().find('.no-watch').attr('src', disable);
            $(this).parent().parent().find('.watch').attr('src', active);
        }
    }

    $('input.checkbox_show_cat').each(notifCat);

    $('#wps-panel-content').on("click", ".checkbox_show_cat", notifCat);

    $('input.radio_products').each(function(){
        if($(this).is(':checked')){
            $(this).next('img').css('opacity','1');
            $(this).parent().css('color','#51555e');
        }
    });

    $('input.radio_text').each(function(){
        if($(this).is(':checked')){
            $(this).next('img').css('opacity','1');
            $(this).parent().css('color','#51555e');
        }
    });

    $('input.radio').click(function(){
        $('input.radio').css('background-image', 'none');
        if($(this).is(':checked')){
            $(this).css('background-image', 'url(' + templateDir + '/images/checked.png)');
        }
        notifIncr();
    });

    $('#wps-panel').on("click", "input.radio_products", function(){
        $('.input_products img').css('opacity','0.2');
        $('.input_products').css('color','#8a9596');
        $(this).next('img').css('opacity','1');
        $(this).parent().css('color','#51555e');
        notifIncr();
    });

    $('#wps-panel').on("click", "input.radio_text", function(){
        $('.input_text img').css('opacity','0.2');
        $('.input_text').css('color','#8a9596');
        $(this).next('img').css('opacity','1');
        $(this).parent().css('color','#51555e');
        notifIncr();
    });

    function addmedia(e) {
        var $el = $(this).parent();
        e.preventDefault();
        var uploader = wp.media({
            title  :  'Upload a picture',
            button :  {
                text  :  'Choose a picture'
            },
            multiple  :  false
        })
        .on('select', function(){
            var selection = uploader.state().get('selection');
            var attachment = selection.first().toJSON();
            $('input', $el).val(attachment.url);
            $('.uploaded', $el).attr('src', attachment.url);
        })
        .open();
        notifIncr();
    }
    $('#wps-panel').on("click", '.addmedia', addmedia);

    function addheaderslide(e) {
        e.preventDefault();
        var valeur = $('#wps_number_slides').val() ;
        var incr = parseInt(valeur) + 1;
        $('#wps_number_slides').val(incr);
        var div = $('.notif_change');
        div.css('display','block');
        var count = parseInt(div.text()) + 1;
        div.html('<p>' + count +'</p>');
        $('#wps-panel-home').append('<div class="wps-panel-field open-sub picture_header_slide_' + incr + '"><span class="arrow-expend"></span><h3 id="h3_header_slide' + incr + '">' + incr + '. Picture ' + incr + '</h3><span id="delete_header_slide_' + incr + '" class="delete_header_slide delete">Delete</span><img class="expend" src="' + templateDir + '/wps-panel/images/expend.png"><hr></div><div class="wps-panel-sub-section picture_header_slide_' + incr + '"><div class="wps-panel-field "><label for="wps_title_header_slide' + incr + '">Title</label><input type="text" name="wps_title_header_slide' + incr + '" id="wps_title_header_slide' + incr + '" value="HELLO WORLD." /></div><div class="wps-panel-field"><label for="wps_description_header_slide' + incr + '">Description</label><textarea name="wps_description_header_slide' + incr + '" id="wps_description_header_slide' + incr + '"></textarea></div><div class="wps-panel-field "><label for="wps_header_slide_' + incr + '">Photo</label><input type="text" name="wps_header_slide_' + incr + '" id="wps_header_slide_' + incr + '" value="" class="upload-input"/><a href="#" class="upload_button addmedia"><img src="http://localhost/wp-K/wp-content/themes/k-theme/wps-panel/images/upload.png"></a><img class="uploaded" src=""></div></div>');
        var url = 'themes.php?page=wps-panel.php';
        $.ajax({ 
          type: "POST",
          url: url,
          data: $("#tosave").serialize()
        });
    }

    $('#wps_add_header_slide').click(addheaderslide);

    function deleteheaderslide() {
        var id = $(this).attr('id');
        var currentid = id.split('_');
        var now = currentid[3];
        var next = parseInt(now) + 1;
        var valeur = $('#wps_number_slides').val();
        $('.picture_header_slide_' + now + '').fadeOut(500, function(){ $(this).remove();});
        for( var i=next; i<=valeur; ++i){
            var open = $('.picture_header_slide_' + i + '');
            open.addClass('picture_header_slide_' + now + '').removeClass('picture_header_slide_' + i + '');
            var h3 = $('#h3_header_slide' + i + '');
            h3.attr('id', 'h3_header_slide' + now + '');
            h3.html('' + now + '. Picture ' + now + '');
            var deleter = $('#delete_header_slide_' + i + '');
            deleter.attr('id', 'delete_header_slide_' + now + '');
            var title = $('#wps_title_header_slide' + i + '');
            title.attr('id', 'wps_title_header_slide' + now + '');
            title.attr('name', 'wps_title_header_slide' + now + '');
            var labeltitle = title.prev('label');
            labeltitle.attr('for', 'wps_title_header_slide' + now + '');

            var descr = $('#wps_description_header_slide' + i + '');
            descr.attr('id', 'wps_description_header_slide' + now + '');
            descr.attr('name', 'wps_description_header_slide' + now + '');
            var labeldescr = descr.prev('label');
            labeldescr.attr('for', 'wps_description_header_slide' + now + '');

            var photo = $('#wps_header_slide_' + i + '');
            photo.attr('id', 'wps_header_slide_' + now + '');
            photo.attr('name', 'wps_header_slide_' + now + '');
            var labelphoto = photo.prev('label');
            labelphoto.attr('for', 'wps_header_slide_' + now + '');

            now++;
        }
        var decr = parseInt(valeur) - 1;
        $('#wps_number_slides').val(decr);
        var url = 'themes.php?page=wps-panel.php';
        $.ajax({ 
          type: "POST",
          url: url,
          data: $("#tosave").serialize()
        });
    }

    $('#wps-panel-content').on("click", ".delete_header_slide", deleteheaderslide);


    function addevent(e) {
        e.preventDefault();
        var valeur = $('#wps_number_events').val() ;
        var incr = parseInt(valeur) + 1;
        $('#wps_number_events').val(incr);
        var div = $('.notif_change');
        div.css('display','block');
        var count = parseInt(div.text()) + 1;
        div.html('<p>' + count +'</p>');
        $('#wps-panel-timeline').append('<div class="wps-panel-field open-sub event_' + incr + '"><span class="arrow-expend"></span><h3 id="h3_event' + incr + '">' + incr + '. Event ' + incr + '</h3><span id="delete_event_' + incr + '" class="delete_event delete">Delete</span><img class="expend" src="' + templateDir + '/wps-panel/images/expend.png"><hr></div><div class="wps-panel-sub-section event_' + incr + '"><div class="wps-panel-field "><label for="wps_event_' + incr + '_title">Title</label><input type="text" name="wps_event_' + incr + '_title" id="wps_event_' + incr + '_title" value="" /></div><div class="wps-panel-field"><label for="wps_event_' + incr + '_description">Descritpion</label><textarea name="wps_event_' + incr + '_description" id="wps_event_' + incr + '_description"></textarea></div><div class="wps-panel-field "><label for="wps_event_' + incr + '_month">Month</label><input type="text" name="wps_event_' + incr + '_month" id="wps_event_' + incr + '_month" value="" /></div><div class="wps-panel-field "><label for="wps_event_' + incr + '_year">Year</label><input type="text" name="wps_event_' + incr + '_year" id="wps_event_' + incr + '_year" value="" /></div></div>');
        var url = 'themes.php?page=wps-panel.php';
        $.ajax({ 
          type: "POST",
          url: url,
          data: $("#tosave").serialize()
        });
    }

    $('#wps_add_event').click(addevent);

    function deleteevent() {
        var id = $(this).attr('id');
        var currentid = id.split('_');
        var now = currentid[2];
        var next = parseInt(now) + 1;
        var valeur = $('#wps_number_events').val();
        $('.event_' + now + '').fadeOut(500, function(){ $(this).remove();});
        for( var i=next; i<=valeur; ++i){
            var open = $('.event_' + i + '');
            open.addClass('event_' + now + '').removeClass('event_' + i + '');
            var h3 = $('#h3_event' + i + '');
            h3.attr('id', 'h3_event' + now + '');
            h3.html('' + now + '. Event ' + now + '');
            var deleter = $('#delete_event_' + i + '');
            deleter.attr('id', 'delete_event_' + now + '');
            var title = $('#wps_event_' + i + '_title');
            title.attr('id', 'wps_event_' + now + '_title');
            title.attr('name', 'wps_event_' + now + '_title');
            var labeltitle = title.prev('label');
            labeltitle.attr('for', 'wps_event_' + now + '_title');

            var descr = $('#wps_event_' + i + '_description');
            descr.attr('id', 'wps_event_' + now + '_description');
            descr.attr('name', 'wps_event_' + now + '_description');
            var labeldescr = descr.prev('label');
            labeldescr.attr('for', 'wps_event_' + now + '_description');

            var month = $('#wps_event_' + i + '_month');
            month.attr('id', 'wps_event_' + now + '_month');
            month.attr('name', 'wps_event_' + now + '_month');
            var labelmonth = month.prev('label');
            labelmonth.attr('for', 'wps_event_' + now + '_month');

            var year = $('#wps_event_' + i + '_year');
            year.attr('id', 'wps_event_' + now + '_year');
            year.attr('name', 'wps_event_' + now + '_year');
            var labelyear = year.prev('label');
            labelyear.attr('for', 'wps_event_' + now + '_year');

            now++;
        }
        var decr = parseInt(valeur) - 1;
        $('#wps_number_events').val(decr);
        var url = 'themes.php?page=wps-panel.php';
        $.ajax({ 
          type: "POST",
          url: url,
          data: $("#tosave").serialize()
        });
    }

    $('#wps-panel-content').on("click", ".delete_event", deleteevent);

    function addtabteam(e) {
        e.preventDefault();
        var valeur = $('#wps_number_tabs_team').val() ;
        var incr = parseInt(valeur) + 1;
        $('#wps_number_tabs_team').val(incr);
        var div = $('.notif_change');
        div.css('display','block');
        var count = parseInt(div.text()) + 1;
        div.html('<p>' + count +'</p>');
        $('#wps-panel-thumbnail').append('<div class="wps-panel-field open-sub tab_team_' + incr + '"><span class="arrow-expend"></span><h3 id="h3_tab_team' + incr + '">' + incr + '. Tab ' + incr + '</h3><span id="delete_tab_team_' + incr + '" class="delete_tab_team delete">Delete</span><img class="expend" src="' + templateDir + '/wps-panel/images/expend.png"><hr></div><div id="sub_tab_team_' + incr + '" class="wps-panel-sub-section tab_team_' + incr + '"><div class="wps-panel-field "><label for="wps_tab_' + incr + '_team">Title</label><input type="text" name="wps_tab_' + incr + '_team" id="wps_tab_' + incr + '_team" value="" /></div><div class="wps-panel-sub-sub-section"><div class="wps-panel-field wps_count"><label for="wps_number_members_tab_' + incr + '_team"><h3>Members</h3></label><input type="text" name="wps_number_members_tab_' + incr + '_team" id="wps_number_members_tab_' + incr + '_team" value="0" /></div><div class="wps-panel-field add_slide"><a id="wps_add_member_tab_' + incr + '_team" class="addbutton wps_add_member_tab_team" href="#"><img src="' + templateDir + '/wps-panel/images/addpictures.png">Add</a></div></div></div>');
        var url = 'themes.php?page=wps-panel.php';
        $.ajax({ 
          type: "POST",
          url: url,
          data: $("#tosave").serialize()
        });
    }

    $('#wps_add_tab_team').click(addtabteam);

    function addmembertabteam(e) {
        e.preventDefault();
        var getid = $(this).attr('id');
        var getnbid = getid.split('_');
        var id = getnbid[4];
        var valeur = $('#wps_number_members_tab_' + id + '_team').val() ;
        console.log(valeur);
        var incr = parseInt(valeur) + 1;
        $('#wps_number_members_tab_' + id + '_team').val(incr);
        var div = $('.notif_change');
        div.css('display','block');
        var count = parseInt(div.text()) + 1;
        div.html('<p>' + count +'</p>');
        $('#sub_tab_team_' + id + ' .wps-panel-sub-sub-section').append('<div class="wps-panel-field open-sub member_' + incr + '_tab_' + id + '_team"><span class="arrow-expend"></span><h3 id="h3_member_' + incr + '_tab_' + id + '_team">' + incr + '. Member ' + incr + '</h3><span id="delete_member_' + incr + '_tab_' + id + '_team" class="delete_member_tab_team delete">Delete</span><img class="expend" src="' + templateDir + '/wps-panel/images/expend.png"><hr></div><div class="wps-panel-sub-section member_' + incr + '_tab_' + id + '_team"><div class="wps-panel-field "><label for="wps_tab_' + id + '_member_' + incr + '_picture">Photo</label><input type="text" name="wps_tab_' + id + '_member_' + incr + '_picture" id="wps_tab_' + id + '_member_' + incr + '_picture" value="" /><a href="#" class="upload_button addmedia"><img src="' + templateDir + '/wps-panel/images/upload.png"></a></div><div class="wps-panel-field "><label for="wps_tab_1_name_member_' + incr + '">Name</label><input type="text" name="wps_tab_' + id + '_name_member_' + incr + '" id="wps_tab_' + id + '_name_member_' + incr + '" value="" /></div><div class="wps-panel-field "><label for="wps_tab_' + id + '_job_member_' + incr + '">Job</label><input type="text" name="wps_tab_' + id + '_job_member_' + incr + '" id="wps_tab_' + id + '_job_member_' + incr + '" value="" /></div><div class="wps-panel-field"><label for="wps_tab_' + id + '_description_member_' + incr + '">Description</label><textarea name="wps_tab_' + id + '_description_member_' + incr + '" id="wps_tab_' + id + '_description_member_' + incr + '"></textarea></div><div class="wps-panel-field "><label for="wps_tab_' + id + '_mail_member_' + incr + '">Mail</label><input type="text" name="wps_tab_' + id + '_mail_member_' + incr + '" id="wps_tab_' + id + '_mail_member_' + incr + '" value="" placeholder=""/></div></div>');
        var url = 'themes.php?page=wps-panel.php';
        $.ajax({ 
          type: "POST",
          url: url,
          data: $("#tosave").serialize()
        });
    }

    $('#wps-panel-content').on("click", 'a.addbutton.wps_add_member_tab_team', addmembertabteam);

    function deletetabteam() {
        var id = $(this).attr('id');
        var currentid = id.split('_');
        var now = currentid[3];
        var next = parseInt(now) + 1;
        var valeur = $('#wps_number_tabs_team').val();
        $('.tab_team_' + now + '').fadeOut(500, function(){ $(this).remove();});
        for( var i=next; i<=valeur; ++i){
            var open = $('.tab_team_' + i + '');
            open.addClass('tab_team_' + now + '').removeClass('tab_team_' + i + '');
            var sub = $('#sub_tab_team_' + i + '');
            sub.attr('id', 'sub_tab_team_' + now + '');
            var h3 = $('#h3_tab_team' + i + '');
            h3.attr('id', 'h3_tab_team' + now + '');
            h3.html('' + now + '. Tab ' + now + '');
            var deleter = $('#delete_tab_team_' + i + '');
            deleter.attr('id', 'delete_tab_team_' + now + '');
            var title = $('#wps_tab_' + i + '_team');
            title.attr('id', 'wps_tab_' + now + '_team');
            title.attr('name', 'wps_tab_' + now + '_team');
            var labeltitle = title.prev('label');
            labeltitle.attr('for', 'wps_tab_' + now + '_team');
            var nbmb = $('#wps_number_members_tab_' + i + '_team');
            nbmb.attr('id', 'wps_number_members_tab_' + now + '_team');
            nbmb.attr('name', 'wps_number_members_tab_' + now + '_team');
            var labelnbmb = nbmb.prev('label');
            labelnbmb.attr('for', 'wps_number_members_tab_' + now + '_team');
            var addmb = $('#wps_add_member_tab_' + i + '_team');
            addmb.attr('id', 'wps_add_member_tab_' + now + '_team');

            var valeur2 = nbmb.val();
            for (var j=1; j<=valeur2; ++j){
                var mb = $('.member_' + j + '_tab_' + i + '_team');
                mb.addClass('member_' + j + '_tab_' + now + '_team').removeClass('member_' + j + '_tab_' + i + '_team');
                var h3mb = $('#h3_member_' + j + '_tab_' + i + '_team');
                h3mb.attr('id', 'h3_member_' + j + '_tab_' + now + '_team');
                var deletemb = $('#delete_member_' + j + '_tab_' + i + '_team');
                deletemb.attr('id', 'delete_member_' + j + '_tab_' + now + '_team');
                var photomb = $('#wps_tab_' + i + '_member_' + j + '_picture');
                photomb.attr('id', 'wps_tab_' + now + '_member_' + j + '_picture');
                photomb.attr('name', 'wps_tab_' + now + '_member_' + j + '_picture');
                var labelphotomb = photomb.prev('label');
                labelphotomb.attr('for', 'wps_tab_' + now + '_member_' + j + '_picture');
                var namemb = $('#wps_tab_' + i + '_name_member_' + j + '');
                namemb.attr('id', 'wps_tab_' + now + '_name_member_' + j + '');
                namemb.attr('name', 'wps_tab_' + now + '_name_member_' + j + '');
                var labelnamemb = namemb.prev('label');
                labelnamemb.attr('for', 'wps_tab_' + now + '_name_member_' + j + '');
                var jobmb = $('#wps_tab_' + i + '_job_member_' + j + '');
                jobmb.attr('id', 'wps_tab_' + now + '_job_member_' + j + '');
                jobmb.attr('name', 'wps_tab_' + now + '_job_member_' + j + '');
                var labeljobmb = jobmb.prev('label');
                labeljobmb.attr('for', 'wps_tab_' + now + '_job_member_' + j + '');
                var descrmb = $('#wps_tab_' + i + '_description_member_' + j + '');
                descrmb.attr('id', 'wps_tab_' + now + '_description_member_' + j + '');
                descrmb.attr('name', 'wps_tab_' + now + '_description_member_' + j + '');
                var labeldescrmb = descrmb.prev('label');
                labeldescrmb.attr('for', 'wps_tab_' + now + '_description_member_' + j + '');
                var mailmb = $('#wps_tab_' + i + '_mail_member_' + j + '');
                mailmb.attr('id', 'wps_tab_' + now + '_mail_member_' + j + '');
                mailmb.attr('name', 'wps_tab_' + now + '_mail_member_' + j + '');
                var labelmailmb = mailmb.prev('label');
                labelmailmb.attr('for', 'wps_tab_' + now + '_mail_member_' + j + '');
            }

            now++;
        }
        var decr = parseInt(valeur) - 1;
        $('#wps_number_tabs_team').val(decr);
        var url = 'themes.php?page=wps-panel.php';
        $.ajax({ 
          type: "POST",
          url: url,
          data: $("#tosave").serialize()
        });
    }

    $('#wps-panel-content').on("click", ".delete_tab_team", deletetabteam);

    function deletemembertabteam() {
        var id = $(this).attr('id');
        var currentid = id.split('_');
        var now = currentid[2];
        var next = parseInt(now) + 1;
        var tab = currentid[4];
        var valeur = $('#wps_number_members_tab_' + tab + '_team').val();
        $('.member_' + now + '_tab_' + tab + '_team').fadeOut(500, function(){ $(this).remove();});
        for( var i=next; i<=valeur; ++i){
            var open = $('.member_' + i + '_tab_' + tab + '_team');
            open.addClass('member_' + now + '_tab_' + tab + '_team').removeClass('member_' + i + '_tab_' + tab + '_team');
            var h3 = $('#h3_member_' + i + '_tab_' + tab + '_team');
            h3.attr('id', 'h3_member_' + now + '_tab_' + tab + '_team');
            h3.html('' + now + '. Member ' + now + '');
            var deleter = $('#delete_member_' + i + '_tab_' + tab + '_team');
            deleter.attr('id', 'delete_member_' + now + '_tab_' + tab + '_team');
            var photomb = $('#wps_tab_' + tab + '_member_' + i + '_picture');
            photomb.attr('id', 'wps_tab_' + tab + '_member_' + now + '_picture');
            photomb.attr('name', 'wps_tab_' + tab + '_member_' + now + '_picture');
            var labelphotomb = photomb.prev('label');
            labelphotomb.attr('for', 'wps_tab_' + tab + '_member_' + now + '_picture');
            var namemb = $('#wps_tab_' + tab + '_name_member_' + i + '');
            namemb.attr('id', 'wps_tab_' + tab + '_name_member_' + now + '');
            namemb.attr('name', 'wps_tab_' + tab + '_name_member_' + now + '');
            var labelnamemb = namemb.prev('label');
            labelnamemb.attr('for', 'wps_tab_' + tab + '_name_member_' + now + '');
            var jobmb = $('#wps_tab_' + tab + '_job_member_' + i + '');
            jobmb.attr('id', 'wps_tab_' + tab + '_job_member_' + now + '');
            jobmb.attr('name', 'wps_tab_' + tab + '_job_member_' + now + '');
            var labeljobmb = jobmb.prev('label');
            labeljobmb.attr('for', 'wps_tab_' + tab + '_job_member_' + now + '');
            var descrmb = $('#wps_tab_' + tab + '_description_member_' + i + '');
            descrmb.attr('id', 'wps_tab_' + tab + '_description_member_' + now + '');
            descrmb.attr('name', 'wps_tab_' + tab + '_description_member_' + now + '');
            var labeldescrmb = descrmb.prev('label');
            labeldescrmb.attr('for', 'wps_tab_' + tab + '_description_member_' + now + '');

            var mailmb = $('#wps_tab_' + tab + '_mail_member_' + i + '');
            mailmb.attr('id', 'wps_tab_' + tab + '_mail_member_' + now + '');
            mailmb.attr('name', 'wps_tab_' + tab + '_mail_member_' + now + '');
            var labelmailmb = mailmb.prev('label');
            labelmailmb.attr('for', 'wps_tab_' + tab + '_mail_member_' + now + '');

            now++;
        }
        var decr = parseInt(valeur) - 1;
        $('#wps_number_members_tab_' + tab + '_team').val(decr);
        var url = 'themes.php?page=wps-panel.php';
        $.ajax({ 
          type: "POST",
          url: url,
          data: $("#tosave").serialize()
        });
    }

    $('#wps-panel-content').on("click", ".delete_member_tab_team", deletemembertabteam);

    function addtabproduct(e) {
        e.preventDefault();
        var valeur = $('#wps_number_tabs_products').val() ;
        var incr = parseInt(valeur) + 1;
        $('#wps_number_tabs_products').val(incr);
        var div = $('.notif_change');
        div.css('display','block');
        var count = parseInt(div.text()) + 1;
        div.html('<p>' + count +'</p>');
        $('#wps-panel-carousel').append('<div class="wps-panel-field open-sub tab_product_' + incr + '"><span class="arrow-expend"></span><h3 id="h3_tab_product_' + incr + '">' + incr + '. Tab ' + incr + '</h3><span id="delete_tab_product_' + incr + '" class="delete_tab_product delete">Delete</span><img class="expend" src="' + templateDir + '/wps-panel/images/expend.png"><hr></div><div id="sub_tab_product_' + incr + '" class="wps-panel-sub-section tab_product_' + incr + '"><div class="wps-panel-field"><label for="wps_presentation_product_' + incr + '">Product</label><span class="input_products"><input class="radio_products radios_' + incr + '" type="radio" name="wps_presentation_product_' + incr + '" value="iphone5" ><img class="products_choice" src="' + templateDir + '/wps-panel/images/iPhone.png">iPhone</span><span class="input_products"><input class="radio_products radios_' + incr + '" type="radio" name="wps_presentation_product_' + incr + '" value="ipad" ><img class="products_choice" src="' + templateDir + '/wps-panel/images/Tablet.png">Tablet</span><span class="input_products"><input class="radio_products radios_' + incr + '" type="radio" name="wps_presentation_product_' + incr + '" value="imac" ><img class="products_choice" src="' + templateDir + '/wps-panel/images/iMac.png">iMac</span><span class="input_products"><input class="radio_products radios_' + incr + '" type="radio" name="wps_presentation_product_' + incr + '" value="null" checked><img class="products_choice" src="' + templateDir + '/wps-panel/images/Classic.png">Classic</span></div><div class="wps-panel-field "><label for="wps_tab_' + incr + '_products">Name</label><input type="text" name="wps_tab_' + incr + '_products" id="wps_tab_' + incr + '_products" value="" /></div><div class="wps-panel-field "><label for="wps_tab_products_' + incr + '_title">Title</label><input type="text" name="wps_tab_products_' + incr + '_title" id="wps_tab_products_' + incr + '_title" value="" /></div><div class="wps-panel-field"><label for="wps_tab_products_' + incr + '_description">Description</label><textarea name="wps_tab_products_' + incr + '_description" id="wps_tab_products_' + incr + '_description"></textarea></div><div class="wps-panel-field "><label for="wps_tab_products_' + incr + '_link">Link</label><input type="text" name="wps_tab_products_' + incr + '_link" id="wps_tab_products_' + incr + '_link" value="#" /></div><div class="wps-panel-sub-sub-section"><div class="wps-panel-field wps_count"><label for="wps_number_screenshots_tab_' + incr + '_products"><h3>Number of screenshots</h3></label><input type="text" name="wps_number_screenshots_tab_' + incr + '_products" id="wps_number_screenshots_tab_' + incr + '_products" value="0" /></div><div class="wps-panel-field add_slide"><a id="wps_add_screen_tab_' + incr + '_product" class="addbutton wps_add_screen_tab_product" href="#"><img src="' + templateDir + '/wps-panel/images/addpictures.png">Add</a></div></div>');
        var url = 'themes.php?page=wps-panel.php';
        $.ajax({ 
          type: "POST",
          url: url,
          data: $("#tosave").serialize()
        });
    }

    $('#wps_add_tab_product').click(addtabproduct);

    function addscreentabproduct(e) {
        e.preventDefault();
        var getid = $(this).attr('id');
        var getnbid = getid.split('_');
        var id = getnbid[4];
        var valeur = $('#wps_number_screenshots_tab_' + id + '_products').val() ;
        console.log(valeur);
        var incr = parseInt(valeur) + 1;
        $('#wps_number_screenshots_tab_' + id + '_products').val(incr);
        var div = $('.notif_change');
        div.css('display','block');
        var count = parseInt(div.text()) + 1;
        div.html('<p>' + count +'</p>');
        $('#sub_tab_product_' + id + ' .wps-panel-sub-sub-section').append('<div class="wps-panel-field open-sub screen_' + incr + '_tab_' + id + '_product"><span class="arrow-expend"></span><h3 id="h3_screen_' + incr + '_tab_' + id + '_product">' + incr + '. Screenshot ' + incr + '</h3><span id="delete_screen_' + incr + '_tab_' + id + '_product" class="delete_screen_tab_product delete">Delete</span><img class="expend" src="' + templateDir + '/wps-panel/images/expend.png"><hr></div><div class="wps-panel-sub-section screen_' + incr + '_tab_' + id + '_product"><div class="wps-panel-field "><label for="wps_screenshot_' + incr + '_tab_' + id + '_product">Screenshot ' + incr + '</label><input type="text" name="wps_screenshot_' + incr + '_tab_' + id + '_product" id="wps_screenshot_' + incr + '_tab_' + id + '_product" value="" class="upload-input"/><a href="#" class="upload_button addmedia"><img src="' + templateDir + '/wps-panel/images/upload.png"></a><img class="uploaded" src=""></div><!-- .wps-panel-field --></div>');
        var url = 'themes.php?page=wps-panel.php';
        $.ajax({ 
          type: "POST",
          url: url,
          data: $("#tosave").serialize()
        });
    }

    $('#wps-panel-content').on("click", 'a.addbutton.wps_add_screen_tab_product', addscreentabproduct);

    function deletetabproduct() {
        var id = $(this).attr('id');
        var currentid = id.split('_');
        var now = currentid[3];
        var next = parseInt(now) + 1;
        var valeur = $('#wps_number_tabs_products').val();
        $('.tab_product_' + now + '').fadeOut(500, function(){ $(this).remove();});
        for( var i=next; i<=valeur; ++i){
            var open = $('.tab_product_' + i + '');
            open.addClass('tab_product_' + now + '').removeClass('tab_product_' + i + '');
            var sub = $('#sub_tab_product_' + i + '');
            sub.attr('id', 'sub_tab_product_' + now + '');
            var h3 = $('#h3_tab_product_' + i + '');
            h3.attr('id', 'h3_tab_product_' + now + '');
            h3.html('' + now + '. Tab ' + now + '');
            var deleter = $('#delete_tab_product_' + i + '');
            deleter.attr('id', 'delete_tab_product_' + now + '');
            var title = $('#wps_tab_' + i + '_team');
            var radios = $('.radios_' + i + '');
            radios.addClass('radios_' + now + '').removeClass('radios_' + i + '');
            radios.attr('name', 'wps_presentation_product_' + now + '');
            var name = $('#wps_tab_' + i + '_products');
            name.attr('id', 'wps_tab_' + now + '_products');
            name.attr('name', 'wps_tab_' + now + '_products');
            var labelname = name.prev('label');
            labelname.attr('for', 'wps_tab_' + now + '_products');
            var title = $('#wps_tab_products_' + i + '_title');
            title.attr('id', 'wps_tab_products_' + now + '_title');
            title.attr('name', 'wps_tab_products_' + now + '_title');
            var labeltitle = title.prev('label');
            labeltitle.attr('for', 'wps_tab_products_' + now + '_title');
            var descr = $('#wps_tab_products_' + i + '_description');
            descr.attr('id', 'wps_tab_products_' + now + '_description');
            descr.attr('name', 'wps_tab_products_' + now + '_description');
            var labeldescr = descr.prev('label');
            labeldescr.attr('for', 'wps_tab_products_' + now + '_description');
            var link = $('#wps_tab_products_' + i + '_link');
            link.attr('id', 'wps_tab_products_' + now + '_link');
            link.attr('name', 'wps_tab_products_' + now + '_link');
            var labellink = link.prev('label');
            labellink.attr('for', 'wps_tab_products_' + now + '_link');
            var nbscreen = $('#wps_number_screenshots_tab_' + i + '_products');
            nbscreen.attr('id', 'wps_number_screenshots_tab_' + now + '_products');
            nbscreen.attr('name', 'wps_number_screenshots_tab_' + now + '_products');
            var labelnbscreen = nbscreen.prev('label');
            labelnbscreen.attr('for', 'wps_number_screenshots_tab_' + now + '_products');
            var addscreen = $('#wps_add_screen_tab_' + i + '_product');
            addscreen.attr('id', 'wps_add_screen_tab_' + now + '_product');

            var valeur2 = nbscreen.val();
            for (var j=1; j<=valeur2; ++j){
                var ss = $('.screen_' + j + '_tab_' + i + '_product');
                ss.addClass('screen_' + j + '_tab_' + now + '_product').removeClass('screen_' + j + '_tab_' + i + '_product');
                var h3ss = $('#h3_screen_' + j + '_tab_' + i + '_product');
                h3ss.attr('id', 'h3_screen_' + j + '_tab_' + now + '_product');
                var deletess = $('#delete_screen_' + j + '_tab_' + i + '_product');
                deletess.attr('id', 'delete_screen_' + j + '_tab_' + now + '_product');
                var photoss = $('#wps_screenshot_' + j + '_tab_' + i + '_product');
                photoss.attr('id', 'wps_screenshot_' + j + '_tab_' + now + '_product');
                photoss.attr('name', 'wps_screenshot_' + j + '_tab_' + now + '_product');
                var labelphotoss = photoss.prev('label');
                labelphotoss.attr('for', 'wps_screenshot_' + j + '_tab_' + now + '_product');
            }

            now++;
        }
        var decr = parseInt(valeur) - 1;
        $('#wps_number_tabs_products').val(decr);
        var url = 'themes.php?page=wps-panel.php';
        $.ajax({ 
          type: "POST",
          url: url,
          data: $("#tosave").serialize()
        });
    }

    $('#wps-panel-content').on("click", ".delete_tab_product", deletetabproduct);

    function deletescreentabproduct() {
        var id = $(this).attr('id');
        var currentid = id.split('_');
        var now = currentid[2];
        var next = parseInt(now) + 1;
        var tab = currentid[4];
        var valeur = $('#wps_number_screenshots_tab_' + tab + '_products').val();
        $('.screen_' + now + '_tab_' + tab + '_product').fadeOut(500, function(){ $(this).remove();});
        for( var i=next; i<=valeur; ++i){
            var open = $('.screen_' + i + '_tab_' + tab + '_product');
            open.addClass('screen_' + now + '_tab_' + tab + '_product').removeClass('screen_' + i + '_tab_' + tab + '_product');
            var h3 = $('#h3_screen_' + i + '_tab_' + tab + '_product');
            h3.attr('id', 'h3_screen_' + now + '_tab_' + tab + '_product');
            h3.html('' + now + '. Screenshot ' + now + '');
            var deleter = $('#delete_screen_' + i + '_tab_' + tab + '_product');
            deleter.attr('id', 'delete_screen_' + now + '_tab_' + tab + '_product');
            var photomb = $('#wps_screenshot_' + i + '_tab_' + tab + '_product');
            photomb.attr('id', 'wps_screenshot_' + now + '_tab_' + tab + '_product');
            photomb.attr('name', 'wps_screenshot_' + now + '_tab_' + tab + '_product');
            var labelphotomb = photomb.prev('label');
            labelphotomb.attr('for', 'wps_screenshot_' + now + '_tab_' + tab + '_product');

            now++;
        }
        var decr = parseInt(valeur) - 1;
        $('#wps_number_screenshots_tab_' + tab + '_products').val(decr);
        var url = 'themes.php?page=wps-panel.php';
        $.ajax({ 
          type: "POST",
          url: url,
          data: $("#tosave").serialize()
        });
    }

    $('#wps-panel-content').on("click", ".delete_screen_tab_product", deletescreentabproduct);

    function addservice(e) {
        e.preventDefault();
        var valeur = $('#wps_number_services').val() ;
        var incr = parseInt(valeur) + 1;
        $('#wps_number_services').val(incr);
        var div = $('.notif_change');
        div.css('display','block');
        var count = parseInt(div.text()) + 1;
        div.html('<p>' + count +'</p>');
        $('#wps-panel-gallery').append('<div class="wps-panel-field open-sub service_' + incr + '"><span class="arrow-expend"></span><h3 id="h3_service_' + incr + '">' + incr + '. Picture ' + incr + '</h3><span id="delete_service_' + incr + '" class="delete_service delete">Delete</span><img class="expend" src="' + templateDir + '/wps-panel/images/expend.png"><hr></div><div class="wps-panel-sub-section service_' + incr + '"><div class="wps-panel-field "><label for="wps_service_' + incr + '_title">Title</label><input type="text" name="wps_service_' + incr + '_title" id="wps_service_' + incr + '_title" value="" /></div><div class="wps-panel-field"><label for="wps_service_' + incr + '_description">Descritpion</label><textarea name="wps_service_' + incr + '_description" id="wps_service_' + incr + '_description"></textarea></div><div class="wps-panel-field "><label for="wps_service_' + incr + '_icon">Icon</label><input type="text" name="wps_service_' + incr + '_icon" id="wps_service_' + incr + '_icon" value="" class="upload-input"/><a href="#" class="upload_button addmedia"><img src="' + templateDir + '/wps-panel/images/upload.png"></a><img class="uploaded" src=""></div><div class="wps-panel-field retinaupload"><img class="retina retina_icon" src="' + templateDir + '/wps-panel/images/retina.png" alt="retina" title="retina"> retina <input type="text" name="wps_service_' + incr + '_icon_2x" id="wps_service_' + incr + '_icon_2x" value="" class="upload-input"/><a href="#" class="upload_button addmedia"><img class="retina" src="' + templateDir + '/wps-panel/images/upload.png"></a><img class="uploaded" src=""></div></div>');
        var url = 'themes.php?page=wps-panel.php';
        $.ajax({ 
          type: "POST",
          url: url,
          data: $("#tosave").serialize()
        });
    }

    $('#wps_add_service').click(addservice);

    function deleteservice() {
        var id = $(this).attr('id');
        var currentid = id.split('_');
        var now = currentid[2];
        var next = parseInt(now) + 1;
        var valeur = $('#wps_number_services').val();
        $('.service_' + now + '').fadeOut(500, function(){ $(this).remove();});
        for( var i=next; i<=valeur; ++i){
            var open = $('.service_' + i + '');
            open.addClass('service_' + now + '').removeClass('service_' + i + '');
            var h3 = $('#h3_service_' + i + '');
            h3.attr('id', 'h3_service_' + now + '');
            h3.html('' + now + '. Picture ' + now + '');
            var deleter = $('#delete_service_' + i + '');
            deleter.attr('id', 'delete_service_' + now + '');
            var title = $('#wps_service_' + i + '_title');
            title.attr('id', 'wps_service_' + now + '_title');
            title.attr('name', 'wps_service_' + now + '_title');
            var labeltitle = title.prev('label');
            labeltitle.attr('for', 'wps_service_' + now + '_title');

            var descr = $('#wps_service_' + i + '_description');
            descr.attr('id', 'wps_service_' + now + '_description');
            descr.attr('name', 'wps_service_' + now + '_description');
            var labeldescr = descr.prev('label');
            labeldescr.attr('for', 'wps_service_' + now + '_description');

            var icon = $('#wps_service_' + i + '_icon');
            icon.attr('id', 'wps_service_' + now + '_icon');
            icon.attr('name', 'wps_service_' + now + '_icon');
            var labelicon = icon.prev('label');
            labelicon.attr('for', 'wps_service_' + now + '_icon');

            var icon = $('#wps_service_' + i + '_icon_2x');
            icon.attr('id', 'wps_service_' + now + '_icon_2x');
            icon.attr('name', 'wps_service_' + now + '_icon_2x');

            now++;
        }
        var decr = parseInt(valeur) - 1;
        $('#wps_number_services').val(decr);
        var url = 'themes.php?page=wps-panel.php';
        $.ajax({ 
          type: "POST",
          url: url,
          data: $("#tosave").serialize()
        });
    }

    $('#wps-panel-content').on("click", ".delete_service", deleteservice);

    function addtextpage(e) {
        e.preventDefault();

        var nbPages = php_data_td.nbPages;
        var optionPages = '';
        var allPages = php_data_td.pages;
        var Pages = allPages.split('=');
        for(var i = 0;i<nbPages;++i){
            var page = Pages[i].split('_');
            optionPages += '<option value="' + page[0] + '">' + page[1] + '</option>';
        }

        var valeur = $('#wps_number_text_page').val() ;
        var incr = parseInt(valeur) + 1;
        $('#wps_number_text_page').val(incr);
        var div = $('.notif_change');
        div.css('display','block');
        var count = parseInt(div.text()) + 1;
        div.html('<p>' + count +'</p>');
        $('#text_page').append('<div class="wps-panel-field open-sub text_page_' + incr + '"><span class="arrow-expend"></span><h3 id="h3_text_page_' + incr + '">' + incr + '. Text Page ' + incr + '</h3><span id="delete_text_page_' + incr + '" class="delete_text_page delete">Delete</span><img class="expend retina" src="' + templateDir + '/wps-panel/images/expend.png" width="14"><hr></div><div class="wps-panel-sub-section text_page_' + incr + '"><div class="wps-panel-field "><label for="wps_title_text_page_' + incr + '">Name menu</label><input type="text" name="wps_title_text_page_' + incr + '" id="wps_title_text_page_' + incr + '" value="the Theme" placeholder=""/></div><div class="wps-panel-field "><label for="wps_title_intro_text_' + incr + '">Title</label><input type="text" name="wps_title_intro_text_' + incr + '" id="wps_title_intro_text_' + incr + '" value="" placeholder=""/></div><div class="wps-panel-field "><label for="wps_title_content_text_' + incr + '">Title content</label><input type="text" name="wps_title_content_text_' + incr + '" id="wps_title_content_text_' + incr + '" value="" placeholder=""/></div><div class="wps-panel-field "><label for="wps_subtitle_content_text_' + incr + '">Subtitle content</label><input type="text" name="wps_subtitle_content_text_' + incr + '" id="wps_subtitle_content_text_' + incr + '" value="" placeholder=""/></div><div class="wps-panel-field"><label>Columns</label><span class="container_inline"><span class="input_text"><input class="radio_text" type="radio" name="wps_number_cols_text_' + incr + '" value="cols1" ><img class="cols_text_choice retina" src="' + templateDir + '/wps-panel/images/1 column.png">1 column</span><span class="input_text"><input class="radio_text" type="radio" name="wps_number_cols_text_' + incr + '" value="cols2" checked><img class="cols_text_choice retina" src="' + templateDir + '/wps-panel/images/2 columns.png">2 columns</span><span class="input_text"><input class="radio_text" type="radio" name="wps_number_cols_text_' + incr + '" value="cols3" ><img class="cols_text_choice retina" src="' + templateDir + '/wps-panel/images/3 columns.png">3 columns</span><span class="input_text"><input class="radio_text" type="radio" name="wps_number_cols_text_' + incr + '" value="cols4" ><img class="cols_text_choice retina" src="' + templateDir + '/wps-panel/images/4 columns.png">4 columns</span></span></div><div class="wps-panel-field "><label for="wps_link_text_content_text_' + incr + '">Text of link</label><input type="text" name="wps_link_text_content_text_' + incr + '" id="wps_link_text_content_text_' + incr + '" value="" placeholder=""/></div><div class="wps-panel-field "><label for="wps_link_content_text_' + incr + '">Link</label><input type="text" name="wps_link_content_text_' + incr + '" id="wps_link_content_text_' + incr + '" value="" placeholder=""/></div><div class="wps-panel-field "><label for="wps_text_part_' + incr + '_bg_color">Background Color</label><input class="my-color-field" type="text" name="wps_text_part_' + incr + '_bg_color" id="wps_text_part_' + incr + '_bg_color" value="#fff" /></div><div class="wps-panel-field"><label for="wps_text_part_' + incr + '_name_page">Page content</label><div class=""><select name="wps_text_part_' + incr + '_name_page" id="wps_text_part_' + incr + '_name_page">' + optionPages + '</select></div></div></div></div>');

        var idLastLi = ($('.sortable li.pos-null2').prev('li').attr('class').split('-'))[1];
        var idNow = parseInt(idLastLi) + 1;
        $('.sortable li.pos-null2').before('<li class="pos-' + idNow + '"><input type="hidden" name="pos-' + idNow + '" class="pos-' + idNow + '" value="Text page ' + incr + '"><span class="layout_cat"><img class="retina" src="http://localhost/wp-K/wp-content/themes/k-theme/wps-panel/images/text_page.png" width="17"></span><p>Text page ' + incr + '</p><span class="cat_title">the Theme' + incr + '</span><img class="retina layout_drag" src="http://localhost/wp-K/wp-content/themes/k-theme/wps-panel/images/drag&amp;drop.png" width="17"></li>');

        var url = 'themes.php?page=wps-panel.php';
        $.ajax({ 
          type: "POST",
          url: url,
          data: $("#tosave").serialize()
        });
    }

    $('#wps_add_text_page').click(addtextpage);

    function deletetextpage() {
        var id = $(this).attr('id');
        var currentid = id.split('_');
        var now = currentid[3];
        var next = parseInt(now) + 1;
        var valeur = $('#wps_number_text_page').val();

        var sortValue = 'Text page ' + now;
        var sortClasse = $('.sortable input[value="' + sortValue + '"]').attr('class');
        $('.sortable li.' + sortClasse).remove();
        for(var k = next; k<=valeur; ++k){
            var k2 = parseInt(k) - 1;
            $('.sortable input[value="Text page ' + k + '"]').val('Text page ' + k2);
            $('.sortable input[value="Text page ' + k2 + '"]').parent().find('p').html('Text page ' + k2);
        }
        var sortId = parseInt(sortClasse.split('-')[1]) + 1;
        var sortMax = parseInt(valeur) + 7;
        for(var j = sortId; j <= sortMax; ++j ){
            var k = parseInt(j) - 1;
            $('input.pos-' + j).attr('name', 'pos-' + k);
            $('.pos-' + j).addClass('pos-' + k).removeClass('pos-' + j);
        }


        $('.text_page_' + now + '').fadeOut(500, function(){ $(this).remove();});
        for( var i=next; i<=valeur; ++i){
            var open = $('.text_page_' + i + '');
            open.addClass('text_page_' + now + '').removeClass('text_page_' + i + '');
            var h3 = $('#h3_text_page_' + i + '');
            h3.attr('id', 'h3_text_page_' + now + '');
            h3.html('' + now + '. Text Page ' + now + '');
            var deleter = $('#delete_text_page_' + i + '');
            deleter.attr('id', 'delete_text_page_' + now + '');
            var title = $('#wps_title_text_page_' + i);
            title.attr('id', 'wps_title_text_page_' + now);
            title.attr('name', 'wps_title_text_page_' + now);
            var labeltitle = title.prev('label');
            labeltitle.attr('for', 'wps_title_text_page_' + now);

            var titleIntro = $('#wps_title_intro_text_' + i);
            titleIntro.attr('id', 'wps_title_intro_text_' + now);
            titleIntro.attr('name', 'wps_title_intro_text_' + now);
            var labeltitleIntro = titleIntro.prev('label');
            labeltitleIntro.attr('for', 'wps_title_intro_text_' + now);

            var titleContent = $('#wps_title_content_text_' + i);
            titleContent.attr('id', 'wps_title_content_text_' + now);
            titleContent.attr('name', 'wps_title_content_text_' + now);
            var labeltitleContent = titleContent.prev('label');
            labeltitleContent.attr('for', 'wps_title_content_text_' + now);

            var subtitleContent = $('#wps_subtitle_content_text_' + i);
            subtitleContent.attr('id', 'wps_subtitle_content_text_' + now);
            subtitleContent.attr('name', 'wps_subtitle_content_text_' + now);
            var labelsubtitleContent = subtitleContent.prev('label');
            labelsubtitleContent.attr('for', 'wps_subtitle_content_text_' + now);

            $('input[name="wps_number_cols_text_' + i + '"]').attr('name', 'wps_number_cols_text_' + now);

            var linktext = $('#wps_link_text_content_text_' + i);
            linktext.attr('id', 'wps_link_text_content_text_' + now);
            linktext.attr('name', 'wps_link_text_content_text_' + now);
            var labellinktext = linktext.prev('label');
            labellinktext.attr('for', 'wps_link_text_content_text_' + now);

            var link = $('#wps_link_content_text_' + i);
            link.attr('id', 'wps_link_content_text_' + now);
            link.attr('name', 'wps_link_content_text_' + now);
            var labellink = link.prev('label');
            labellink.attr('for', 'wps_link_content_text_' + now);

            var bgColor = $('#wps_text_part_' + i + '_bg_color');
            bgColor.attr('id', 'wps_text_part_' + now + '_bg_color');
            bgColor.attr('name', 'wps_text_part_' + now + '_bg_color');
            var labelbgColor = bgColor.parent().parent().prev('label');
            labelbgColor.attr('for', 'wps_text_part_' + now + '_bg_color');

            var namePage = $('#wps_text_part_' + i + '_name_page');
            namePage.attr('id', 'wps_text_part_' + now + '_name_page');
            namePage.attr('name', 'wps_text_part_' + now + '_name_page');
            var labelnamePage = namePage.prev('label');
            labelnamePage.attr('for', 'wps_text_part_' + now + '_name_page');

            now++;
        }
        var decr = parseInt(valeur) - 1;
        $('#wps_number_text_page').val(decr);
        var url = 'themes.php?page=wps-panel.php';
        $.ajax({ 
          type: "POST",
          url: url,
          data: $("#tosave").serialize()
        });
    }

    $('#wps-panel-content').on("click", ".delete_text_page", deletetextpage);

    function addwork(e) {
        e.preventDefault();
        var valeur = $('#wps_number_works').val() ;
        var incr = parseInt(valeur) + 1;
        $('#wps_number_works').val(incr);
        var div = $('.notif_change');
        div.css('display','block');
        var count = parseInt(div.text()) + 1;
        div.html('<p>' + count +'</p>');
        var effect = php_data_td.effect_work;
        if(effect == "expanding"){
            var toadd = '<div class="wps-panel-field "><label for="wps_work_' + incr + '_thumb_directory">Thumb</label><input type="text" name="wps_work_' + incr + '_thumb_directory" id="wps_work_' + incr + '_thumb_directory" value="" /><a href="#" class="upload_button addmedia"><img src="' + templateDir + '/wps-panel/images/upload.png"></a></div><div class="wps-panel-field "><label for="wps_work_' + incr + '_directory">Photo</label><input type="text" name="wps_work_' + incr + '_directory" id="wps_work_' + incr + '_directory" value="" /><a href="#" class="upload_button addmedia"><img src="' + templateDir + '/wps-panel/images/upload.png"></a></div></div>';
        } else if(effect == "overlay"){
            var toadd = '<div class="wps-panel-field "><label for="wps_work_' + incr + '_directory">Photo</label><input type="text" name="wps_work_' + incr + '_directory" id="wps_work_' + incr + '_directory" value="" /><a href="#" class="upload_button addmedia"><img src="' + templateDir + '/wps-panel/images/upload.png"></a></div></div>';
        }
        $('#wps-panel-showcase').append('<div class="wps-panel-field open-sub work_' + incr + '"><span class="arrow-expend"></span><h3 id="h3_work_' + incr + '">' + incr + '. Work ' + incr + '</h3><span id="delete_work_' + incr + '" class="delete_work delete">Delete</span><img class="expend" src="' + templateDir + '/wps-panel/images/expend.png"><hr></div><div class="wps-panel-sub-section work_' + incr + '"><div class="wps-panel-field "><label for="wps_work_' + incr + '_title">Title</label><input type="text" name="wps_work_' + incr + '_title" id="wps_work_' + incr + '_title" value="" /></div><div class="wps-panel-field"><label for="wps_work_' + incr + '_description">Descritpion</label><textarea name="wps_work_' + incr + '_description" id="wps_work_' + incr + '_description"></textarea></div>' + toadd + '');
        
        var url = 'themes.php?page=wps-panel.php';
        $.ajax({ 
          type: "POST",
          url: url,
          data: $("#tosave").serialize()
        });
    }

    $('#wps_add_work_expanding').click(addwork);
    $('#wps_add_work_overlay').click(addwork);

    function deletework() {
        var id = $(this).attr('id');
        var currentid = id.split('_');
        var now = currentid[2];
        var next = parseInt(now) + 1;
        var valeur = $('#wps_number_works').val();
        $('.work_' + now + '').fadeOut(500, function(){ $(this).remove();});
        for( var i=next; i<=valeur; ++i){
            var open = $('.work_' + i + '');
            open.addClass('work_' + now + '').removeClass('work_' + i + '');
            var h3 = $('#h3_work_' + i + '');
            h3.attr('id', 'h3_work_' + now + '');
            h3.html('' + now + '. Work ' + now + '');
            var deleter = $('#delete_work_' + i + '');
            deleter.attr('id', 'delete_work_' + now + '');
            var title = $('#wps_work_' + i + '_title');
            title.attr('id', 'wps_work_' + now + '_title');
            title.attr('name', 'wps_work_' + now + '_title');
            var labeltitle = title.prev('label');
            labeltitle.attr('for', 'wps_work_' + now + '_title');

            var descr = $('#wps_work_' + i + '_description');
            descr.attr('id', 'wps_work_' + now + '_description');
            descr.attr('name', 'wps_work_' + now + '_description');
            var labeldescr = descr.prev('label');
            labeldescr.attr('for', 'wps_work_' + now + '_description');

            var photo = $('#wps_work_' + i + '_directory');
            photo.attr('id', 'wps_work_' + now + '_directory');
            photo.attr('name', 'wps_work_' + now + '_directory');
            var labelphoto = photo.prev('label');
            labelphoto.attr('for', 'wps_work_' + now + '_directory');

            var effect = php_data_td.effect_work;

            if(effect == "expanding"){
                var thumb = $('#wps_work_' + i + '_thumb_directory');
                thumb.attr('id', 'wps_work_' + now + '_thumb_directory');
                thumb.attr('name', 'wps_work_' + now + '_thumb_directory');
                var labelthumb = thumb.prev('label');
                labelthumb.attr('for', 'wps_work_' + now + '_thumb_directory');
            }

            now++;
        }
        var decr = parseInt(valeur) - 1;
        $('#wps_number_works').val(decr);
        var url = 'themes.php?page=wps-panel.php';
        $.ajax({ 
          type: "POST",
          url: url,
          data: $("#tosave").serialize()
        });
    }

    $('#wps-panel-content').on("click", ".delete_work", deletework);

    function addphotoslide(e) {
        e.preventDefault();
        var valeur = $('#wps_number_slides_photo').val() ;
        var incr = parseInt(valeur) + 1;
        $('#wps_number_slides_photo').val(incr);
        var div = $('.notif_change');
        div.css('display','block');
        var count = parseInt(div.text()) + 1;
        div.html('<p>' + count +'</p>');
        $('#slider_photos').append('<div class="wps-panel-field open-sub photo_slide_' + incr + '"><span class="arrow-expend"></span><h3 id="h3_photo_slide_' + incr + '">' + incr + '. Slide ' + incr + '</h3><span id="delete_photo_slide_' + incr + '" class="delete_photo_slide delete">Delete</span><img class="expend" src="' + templateDir + '/wps-panel/images/expend.png"><hr></div><div class="wps-panel-sub-section photo_slide_' + incr + '"><div class="wps-panel-field "><label for="wps_photo_slide_' + incr + '">Photo</label><input type="text" name="wps_photo_slide_' + incr + '" id="wps_photo_slide_' + incr + '" value="" class="upload-input"/><a href="#" class="upload_button addmedia"><img src="' + templateDir + '/wps-panel/images/upload.png"></a><img class="uploaded" src=""></div><div class="wps-panel-field "><label for="wps_title_photo_slide' + incr + '">Title</label><input type="text" name="wps_title_photo_slide' + incr + '" id="wps_title_photo_slide' + incr + '" value="" /></div></div>');
        var url = 'themes.php?page=wps-panel.php';
        $.ajax({ 
          type: "POST",
          url: url,
          data: $("#tosave").serialize()
        });
    }

    $('#wps_add_photo_slide').click(addphotoslide);

    function deletephotoslide() {
        var id = $(this).attr('id');
        var currentid = id.split('_');
        var now = currentid[3];
        var next = parseInt(now) + 1;
        var valeur = $('#wps_number_slides_photo').val();
        $('.photo_slide_' + now + '').fadeOut(500, function(){ $(this).remove();});
        for( var i=next; i<=valeur; ++i){
            var open = $('.photo_slide_' + i + '');
            open.addClass('photo_slide_' + now + '').removeClass('photo_slide_' + i + '');
            var h3 = $('#h3_photo_slide_' + i + '');
            h3.attr('id', 'h3_photo_slide_' + now + '');
            h3.html('' + now + '. Slide ' + now + '');
            var deleter = $('#delete_photo_slide_' + i + '');
            deleter.attr('id', 'delete_photo_slide_' + now + '');
            var photo = $('#wps_photo_slide_' + i + '');
            photo.attr('id', 'wps_photo_slide_' + now + '');
            photo.attr('name', 'wps_photo_slide_' + now + '');
            var labelphoto = photo.prev('label');
            labelphoto.attr('for', 'wps_photo_slide_' + now + '');
            var title = $('#wps_title_photo_slide' + i + '');
            title.attr('id', 'wps_title_photo_slide' + now + '');
            title.attr('name', 'wps_title_photo_slide' + now + '');
            var labeltitle = title.prev('label');
            labeltitle.attr('for', 'wps_title_photo_slide' + now + '');

            now++;
        }
        var decr = parseInt(valeur) - 1;
        $('#wps_number_slides_photo').val(decr);
        var url = 'themes.php?page=wps-panel.php';
        $.ajax({ 
          type: "POST",
          url: url,
          data: $("#tosave").serialize()
        });
    }

    $('#wps-panel-content').on("click", ".delete_photo_slide", deletephotoslide);

    function addsentenceslide(e) {
        e.preventDefault();
        var valeur = $('#wps_number_slides_sentences').val() ;
        var incr = parseInt(valeur) + 1;
        $('#wps_number_slides_sentences').val(incr);
        var div = $('.notif_change');
        div.css('display','block');
        var count = parseInt(div.text()) + 1;
        div.html('<p>' + count +'</p>');
        $('#slider_sentences').append('<div class="wps-panel-field open-sub sentence_slide_' + incr + '"><span class="arrow-expend"></span><h3 id="h3_sentence_slide_' + incr + '">' + incr + '. Slide ' + incr + '</h3><span id="delete_sentence_slide_' + incr + '" class="delete_sentence_slide delete">Delete</span><img class="expend" src="' + templateDir + '/wps-panel/images/expend.png"><hr></div><div class="wps-panel-sub-section sentence_slide_' + incr + '"><div class="wps-panel-field "><label for="wps_quote_slide_' + incr + '">Quote</label><input type="text" name="wps_quote_slide_' + incr + '" id="wps_quote_slide_' + incr + '" value="" /></div><div class="wps-panel-field "><label for="wps_author_slide_' + incr + '">Author</label><input type="text" name="wps_author_slide_' + incr + '" id="wps_author_slide_' + incr + '" value="" /></div><div class="wps-panel-field "><label for="wps_sentence_slide_' + incr + '_bg_color">Background Color</label><input class="my-color-field" type="text" name="wps_sentence_slide_' + incr + '_bg_color" id="wps_sentence_slide_' + incr + '_bg_color" value="#42c0fb" /></div><div class="wps-panel-field "><label for="wps_sentence_slide_' + incr + '_bg_image">Background Image</label><input type="text" name="wps_sentence_slide_' + incr + '_bg_image" id="wps_sentence_slide_' + incr + '_bg_image" value="" class="upload-input"/><a href="#" class="upload_button addmedia"><img class="retina" src="' + templateDir + '/wps-panel/images/upload.png"></a><img class="uploaded" src=""></div></div>');
        var url = 'themes.php?page=wps-panel.php';
        $.ajax({ 
          type: "POST",
          url: url,
          data: $("#tosave").serialize()
        });
    }

    $('#wps_add_sentence_slide').click(addsentenceslide);

    function deletesentenceslide() {
        var id = $(this).attr('id');
        var currentid = id.split('_');
        var now = currentid[3];
        var next = parseInt(now) + 1;
        var valeur = $('#wps_number_slides_sentences').val();
        $('.sentence_slide_' + now + '').fadeOut(500, function(){ $(this).remove();});
        for( var i=next; i<=valeur; ++i){
            var open = $('.sentence_slide_' + i + '');
            open.addClass('sentence_slide_' + now + '').removeClass('sentence_slide_' + i + '');
            var h3 = $('#h3_sentence_slide_' + i + '');
            h3.attr('id', 'h3_sentence_slide_' + now + '');
            h3.html('' + now + '. Slide ' + now + '');
            var deleter = $('#delete_sentence_slide_' + i + '');
            deleter.attr('id', 'delete_sentence_slide_' + now + '');
            var quote = $('#wps_quote_slide_' + i + '');
            quote.attr('id', 'wps_quote_slide_' + now + '');
            quote.attr('name', 'wps_quote_slide_' + now + '');
            var labelquote = quote.prev('label');
            labelquote.attr('for', 'wps_quote_slide_' + now + '');
            var author = $('#wps_author_slide_' + i + '');
            author.attr('id', 'wps_author_slide_' + now + '');
            author.attr('name', 'wps_author_slide_' + now + '');
            var labelauthor = author.prev('label');
            labelauthor.attr('for', 'wps_author_slide_' + now + '');
            var bgColor = $('#wps_sentence_slide_' + i + '_bg_color');
            bgColor.attr('id', 'wps_sentence_slide_' + now + '_bg_color');
            bgColor.attr('name', 'wps_sentence_slide_' + now + '_bg_color');
            var labelbgColor = bgColor.prev('label');
            labelbgColor.attr('for', 'wps_sentence_slide_' + now + '_bg_color');
            var bgImage = $('#wps_sentence_slide_' + i + '_bg_image');
            bgImage.attr('id', 'wps_sentence_slide_' + now + '_bg_image');
            bgImage.attr('name', 'wps_sentence_slide_' + now + '_bg_image');
            var labelbgImage = bgImage.prev('label');
            labelbgImage.attr('for', 'wps_sentence_slide_' + now + '_bg_image');

            now++;
        }
        var decr = parseInt(valeur) - 1;
        $('#wps_number_slides_sentences').val(decr);
        var url = 'themes.php?page=wps-panel.php';
        $.ajax({ 
          type: "POST",
          url: url,
          data: $("#tosave").serialize()
        });
    }

    $('#wps-panel-content').on("click", ".delete_sentence_slide", deletesentenceslide);

    function mapchoice() {
        if($(this).val() == 'gmap'){
            $('#wps_contact_map_address').parent().css('display','block');
            $('#wps_contact_map_photo').parent().css('display','none');
        } else if($(this).val() == 'photo'){
            $('#wps_contact_map_address').parent().css('display','none');
            $('#wps_contact_map_photo').parent().css('display','block');
        }
    }

    var mapinput = $('.radio_map');
    mapinput.click(mapchoice);

    var mapchoice = php_data_td.mapchoice;

    function mapinit() {
        if(mapchoice == "gmap"){
            $('#wps_contact_map_address').parent().css('display','block');
            $('#wps_contact_map_photo').parent().css('display','none');
        } else if(mapchoice == "photo"){
            $('#wps_contact_map_address').parent().css('display','none');
            $('#wps_contact_map_photo').parent().css('display','block');
        }
    }
    mapinit();
     
});