import './bootstrap';

import '../sass/app.scss';
import { conformsTo, templateSettings } from 'lodash';

// function for loading
$( window ).on( "load", function() {
    $('.load').fadeOut("slow");
    $('.page_content').fadeIn("slow");
});

$(document).on('click', '.toggle .close', function(e){
    console.log('success')
    $('.admin_nav_open').removeClass('d-none')
    $('.admin_nav_open').addClass('d-block')
    $('.admin_side').addClass('d-none')
});

$(document).on('click', '.admin_nav_open', function(e){
    $('.admin_side').removeClass('d-none')
    $('.admin_nav_open').removeClass('d-block')
    $('.admin_nav_open').addClass('d-none')
});