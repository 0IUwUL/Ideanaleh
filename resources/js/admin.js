import './bootstrap';

import '../sass/app.scss';
import { conformsTo, templateSettings } from 'lodash';
import { hide } from '@popperjs/core';

const header = document.querySelector('[data-menu-icon-btn]')
const sidebar = document.querySelector('[data-side-bar]')
const holder = document.querySelector('[data-side-holder]')
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

header.addEventListener("click", () => {
    sidebar.classList.toggle("open")
    var current = holder.classList[1]

    if (current == 'col-1'){
        holder.classList.remove("col-1")
        holder.classList.toggle("col-2")
    }else{
        holder.classList.remove("col-2")
        holder.classList.toggle("col-1")      
    }
})