import './bootstrap';

import '../sass/app.scss';
import { conformsTo, remove, templateSettings } from 'lodash';
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

// Request table frontend 
jQuery(document.body).on('click', '#request_table .content', function(e){
    if($(e.target).hasClass('truncate')){
        $(e.target).removeClass('truncate')
    }else{
        $(e.target).addClass('truncate')
    }
});

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


/**
 * Changes the info showed on a certain modal
 * 
 * @param {string} modalTypeArg     - Type of modal that will be accessed ([Approve, Halt, Deny] modals)
 * @param {object} link             - The button object containing the data- attributes
 */
function updateModalInfo(modalTypeArg, link){
    document.getElementById(modalTypeArg+"ModalProjectTitle").innerHTML = link.data("title");
    document.getElementById(modalTypeArg+"ModalProjectCreator").innerHTML = "by: " + link.data("user");
    document.getElementById(modalTypeArg+"ModalSubmitButton").dataset.id = link.data("id");
}


/**
 * Unified Function to setup the ajax for updating the status of a project
 * 
 * @param {object} eArg                 - Button object
 * @param {string} urlArg               - URL to call the function to update the project's status. e.g.  "/project/update-status/denied"
 * @param {string} statusArg            - The NEW status of the project
 * @param {string} attributeArg         - Attribute (for CSS) of a row entry in the Project Table 
 * @param {boolean} removePendingArg    - Remove a row in the Pending Projects Table
 */
function updatePendingProjectAjax(eArg, urlArg, statusArg, attributeArg, removePendingArg = false){
    var id = $(eArg.target).attr('data-id');
  
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
        url: urlArg,
        type:'post',
        data: {
          ProjectId : id,
        },
        success: function(result){
            let data = JSON.parse(result);
            
            if(data.response == "success") {
                if(removePendingArg)
                    document.getElementById("PendingProject"+id).remove();
                
                document.getElementById("Project"+id+"Status").innerHTML = statusArg;
                document.getElementById("Project"+id+"Status").className = "admin_project text-nowrap "+attributeArg;
            }
        }
    });
}


// Confirm Modal on Show Function
$('#ApproveProjectModal').on('show.bs.modal', function(e) {
    updateModalInfo("Approve", $(e.relatedTarget));
});


// Ajax for Confirming Pending Projects
$("#ApproveModalSubmitButton").click(function(e){
    updatePendingProjectAjax(e, "/project/update-status/approve", "In Progress", "project_inProgress", true);

    alert("Project Approved");
    $('#ApproveProjectModal').modal('hide');
});


// Deny a Project
$('#DenyProjectModal').on('show.bs.modal', function(e) {
    updateModalInfo("Deny", $(e.relatedTarget));
});


// Ajax for Denying Projects
$("#DenyModalSubmitButton").click(function(e){
    updatePendingProjectAjax(e, "/project/update-status/denied", "Denied", "project_denied", true);

    alert("Project Denied");
    $('#DenyProjectModal').modal('hide');
});


// Halt a Project
$('#HaltProjectModal').on('show.bs.modal', function(e) {
    updateModalInfo("Halt", $(e.relatedTarget));
});


// Ajax for Halting Projects
$("#HaltModalSubmitButton").click(function(e){
    updatePendingProjectAjax(e, "/project/update-status/halt", "Halt", "project_halt");

    alert("Project Halted");
    $('#HaltProjectModal').modal('hide');
});


// Flag a Project
$('#ProjectFlagModal').on('show.bs.modal', function(e) {
    // document.getElementById("FlagModalSubmitButton").dataset.id = $(e.relatedTarget).data("id");
    updateModalInfo("Flag", $(e.relatedTarget));
});


// Changes the text of the button in the ProjectFlagModal
$('#ProjectModalFlagDropDown li').on('click', function(){
    $('#ProjectFlagModalInput').val($(this).text());
    document.getElementById("ProjectFlagModalButton").innerText = $(this).text();
});


// Ajax for Flaggin the Project Status
$("#FlagModalSubmitButton").click(function(e){
    var methodVar = document.getElementById("ProjectFlagModalButton").innerText;
    var urlMethodVar = methodVar.toLowerCase().replace(/\s/g, "")

    updatePendingProjectAjax(e, "/project/update-status/" + urlMethodVar, methodVar, "project_"+urlMethodVar);
    document.getElementById("ProjectFlagModalButton").innerText = "Set Status"

    alert("Project Status Updated");
    $('#ProjectFlagModal').modal('hide');
});
