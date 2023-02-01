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

// Filter by user roles
const user_type = document.querySelectorAll('.admin_type')
var role = 'all'
$('.role .dropdown-item').on('click', function(){
    role = this.text.toLowerCase()

    // Hide and show table elements
    Object.values(user_type).forEach(element => {
        if(element.classList[2] == status || status == 'All'){
            if(role == 'all'){
                element.parentElement.style.display = 'table-row';
            }
            else if(element.classList[1] != 'admin_' + role){
                element.parentElement.style.display = 'none';
            }else {
                element.parentElement.style.display = 'table-row';
            }
        }
    });
})

// Filter by user status
const user_status = document.querySelectorAll('.admin_status')
var status = 'All'
$('.status .dropdown-item').on('click', function(){
    status = this.text

    // Hide and show table elements
    Object.values(user_status).forEach(element => {
        if(element.classList[1] == role || role == 'all'){
            if(status == 'All'){
                element.parentElement.parentElement.style.display = 'table-row';
            }
            else if(element.innerText != status){
                element.parentElement.parentElement.style.display = 'none';
            }else {
                element.parentElement.parentElement.style.display = 'table-row';
            } 
        }
    });
})

// Change modal user-id
$('.changeStatus').on('click', function(){
    let user_id = $(this).attr('data-id')

    $('#user-id').val(user_id)
})

//Ajax for search
$('#UserSearch').on('click', function(){
    searchInput($('input[name="user"]').val(), 'user')
})

$('#UserIssueSearch').on('click', function(){
    searchInput($('input[name="user_issue"]').val(), 'user_issue')
})

$('#ProjSearch').on('click', function(){
    searchInput($('input[name="project"]').val(), 'proj')
})

$('#ProjIssueSearch').on('click', function(){
    searchInput($('input[name="proj_issue"]').val(), 'proj_issue')
})

$('input[name="user"], input[name="user_issue"], input[name="proj"], input[name="proj_issue"]').keyup(function(e){
    if(e.keyCode == 13){searchInput(e.target.value, e.target.name)}
});

function searchInput(inp, tar){
    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    $.ajax({
        url: "/admin/search",
        type:'post',
        data: {
            input : inp,
            for: tar,
        },
        success: function(result){
            let data = JSON.parse(result);
            $('#'+data.for+'_table').html(data.item)
        }

    });
}
// Change modal user-id
$('.informUser').on('click', function(){
    let user_id = $(this).attr('data-id')
    
    $('#dev-id').val(user_id)
})

// Change modal issue id
$('.resolveUserIssue').on('click', function(){
    let id = $(this).attr('data-id')
    let resolved = parseInt($(this).attr('data-status'))
    
    let message = "Is the issue resolved?"
    if (resolved){
        message = "Do you want to reopen this issue?"
    }
    
    $('#resolve-id').val(id)
    $('#ResolvedModalHeader').text(message)
})

// Change modal issue id
$('.deleteUserIssue').on('click', function(){
    let id = $(this).attr('data-id')

    $('#delete-id').val(id)
})

function updateModalInfo(modalTypeArg, link){
    document.getElementById(modalTypeArg+"ModalProjectTitle").innerHTML = link.data("title");
    document.getElementById(modalTypeArg+"ModalProjectCreator").innerHTML = "by: " + link.data("user");
    document.getElementById(modalTypeArg+"ModalSubmitButton").dataset.id = link.data("id");
}


/**
 * Confirm Modal on Show Function
 * 
 * Sets the Title, Creator, and Project ID
 */
$('#ApproveProjectModal').on('show.bs.modal', function(e) {
    updateModalInfo("Approve", $(e.relatedTarget));
});

/**
 * Ajax for Confirming Pending Projects
 */
$("#ApproveModalSubmitButton").click(function(e){
    var id = $(e.target).attr('data-id');
  
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
        url: "/project/update-status/approve",
        type:'post',
        data: {
          ProjectId : id,
        },
        success: function(result){
            let data = JSON.parse(result);
            
            if(data.response == "success") {
                document.getElementById("PendingProject"+id).remove();
                document.getElementById("Project"+id+"Status").innerHTML = "In Progress";
                document.getElementById("Project"+id+"Status").className = "admin_project project_inProgress text-nowrap";

                alert("Project Approved");
            }
            $('#ApproveProjectModal').modal('hide');
        }
    });
});


/**
 * Deny a Project
 */
$('#DenyProjectModal').on('show.bs.modal', function(e) {
    updateModalInfo("Deny", $(e.relatedTarget));
});


/**
 * Ajax for Denying Projects
 * ***** Need to improve to have a reusable ajax function ****
 */
$("#DenyModalSubmitButton").click(function(e){
    var id = $(e.target).attr('data-id');
  
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
        url: "/project/update-status/deny",
        type:'post',
        data: {
          ProjectId : id,
        },
        success: function(result){
            let data = JSON.parse(result);
            
            if(data.response == "success") {
                document.getElementById("PendingProject"+id).remove();
                document.getElementById("Project"+id+"Status").innerHTML = "Denied";
                document.getElementById("Project"+id+"Status").className = "admin_project project_denied text-nowrap";

                alert("Project Denied");
            }
            $('#DenyProjectModal').modal('hide');
        }
    });
});
