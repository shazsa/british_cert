$(document).ready(function () {
    //Ajax form submit
    $("#doAction").submit(function(e){
        e.preventDefault();
        $.ajax({            
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            dataType: "json",
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            success:function(resp){
                //console.log(resp);
                //return;
                if( resp.status == 'failed')
                {
                    $('p.text-danger').text('');
                    $.each(resp.result, function(name, item){
                        item = item.replace(/<.*?>/gm, '');
                        $('#'+name+'_err').text(item);      
                    });                                          
                }
                else if(resp.status == 'passed')
                {                    
                    $('#result_box').html('');
                    $('p.text-danger').text('');
                    $('#result_box').append('<h4 class="text-success">'+resp.result+'</h4>').fadeOut(3000,function(){
                        window.location.replace(resp.redirect);
                    });
                }
            }
        });
    }); //form submit & validation ends

    $('.modal #showSignIn').on('click',function(){
        $('#signUpFrm').fadeOut(2000, function(){
            $('#signInFrm').fadeIn(2200);
        });
    });
    // show login form, hide forgot form    
    $('.modal #showSignUp').on('click',function(){
       $('#signInFrm').fadeOut(2000, function(){
            $('#signUpFrm').fadeIn(2200);
        });
    })
    $('.modal #showForgot').on('click',function(){
       $('#signInFrm').fadeOut(2000, function(){
            $('#forgotFrm').fadeIn(2200);
        });
    })

    $("#userSignUp, #userSignIn,#forgotPassFrm").submit(function(e){
        e.preventDefault();
        var formId = $(this).attr('id');
        $.ajax({            
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            dataType: "json",           
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success:function(resp) {      
                if( resp.status == 'failed')
                {
                    $('#'+formId).find("p.text-danger").empty();
                    $.each(resp.result, function(name, item){
                        item = item.replace(/<.*?>/gm, '');
                        $('#'+formId).find('#'+name+'_err').append(item);
                    });                                                                  
                }
                else if(resp.status == 'passed')
                {
                    $('#'+formId).find("p.text-danger").empty();
                    $('#'+formId).find('#result_box').empty();
                    $('#'+formId).find('#result_box').append('<p class="text-success">'+resp.result+'</p>');
                    //$('#'+formId).find('#result_box p').fadeOut(8000);
                    setTimeout(function(){
                        $('#signupModel').modal('hide');
                        window.location.replace(resp.redirect);
                    }, 4000);
                    /*function(){
                        window.location.href = resp.redirect;
                    });*/                   
                }
            }
        });
    });

    //check user uploaded file type
    $("#userDoc").change(function(){
        var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'application/pdf', 'application/msword', 'application/vnd.ms-office', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        var file = this.files[0];
        var fileType = file.type;
        if(!allowedTypes.includes(fileType)) {
            $("#userDoc_err").html('<span class="text-danger">Please choose a valid file (JPEG/JPG/PNG/GIF/PDF/DOC/DOCX)</span>');
            $("#userDoc").val('');
            return false;
        }
        else if(file.size > 1100000)
        {
            $("#userDoc_err").html('<span class="text-danger">File size should not be more than 1 MB.</span>');
            $("#userDoc").val('');
            return false;
        }
        $("#userDoc_err").html('');
    });
    $("#userDocFrm").submit(function(e){
        e.preventDefault();
        var formId = $(this).attr('id');
        $('#'+formId).find(".btn").prop('disabled',true);
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            dataType: "json",
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            beforeSend: function(){
                $(".sk-spinner").fadeIn();
            },
            success: function(resp){
                $('.sk-spinner').fadeOut();
                $('#'+formId).find(".btn").prop('disabled',false);
                if( resp.status == 'failed')
                {
                    $('p.text-danger').text('');
                    $.each(resp.result, function(name, item){
                        item = item.replace(/<.*?>/gm, '');
                        $('#'+name+'_err').text(item);      
                    });                                          
                }
                else if(resp.status == 'passed')
                {                    
                    $('#result_box').html('');
                    $('p.text-danger').text('');
                    $('#result_box').append('<h5 class="text-success">'+resp.result+'</h5>').fadeOut(3000,function(){
                        window.location.replace(resp.redirect);
                    });
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
              console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });

    //show/hide reason row on status change
    $('#docSts').change(function(){
        var thisVal = $(this).find("option:selected").val();
        var thisFrm = $(this).parents('form');
        if(thisVal=='Rejected')
        {
            thisFrm.find('#reasonRow').html('<label class="col-lg-4 col-form-label">Reject reason</label><div class="col-lg-8"><input type="text" name="rejRsn" id="rejRsn" class="form-control"><p class="text-danger" id="rejRsn_err"></p></div>');
        }
        else
        {
            thisFrm.find('#reasonRow').empty('');
        }
    });


    // Fast fix bor position issue with Propper.js
    // Will be fixed in Bootstrap 4.1 - https://github.com/twbs/bootstrap/pull/24092
    Popper.Defaults.modifiers.computeStyle.gpuAcceleration = false;


    // Add body-small class if window less than 768px
    if ($(window).width() < 769) {
        $('body').addClass('body-small')
    } else {
        $('body').removeClass('body-small')
    }

    // MetisMenu
    var sideMenu = $('#side-menu').metisMenu();

    sideMenu.on('shown.metisMenu', function (e) {
        fix_height();
    });

    // Collapse ibox function
    $('.collapse-link').on('click', function (e) {
        e.preventDefault();
        var ibox = $(this).closest('div.ibox');
        var button = $(this).find('i');
        var content = ibox.children('.ibox-content');
        content.slideToggle(200);
        button.toggleClass('fa-chevron-up').toggleClass('fa-chevron-down');
        ibox.toggleClass('').toggleClass('border-bottom');
        setTimeout(function () {
            ibox.resize();
            ibox.find('[id^=map-]').resize();
        }, 50);
    });

    // Close ibox function
    $('.close-link').on('click', function (e) {
        e.preventDefault();
        var content = $(this).closest('div.ibox');
        content.remove();
    });

    // Fullscreen ibox function
    $('.fullscreen-link').on('click', function (e) {
        e.preventDefault();
        var ibox = $(this).closest('div.ibox');
        var button = $(this).find('i');
        $('body').toggleClass('fullscreen-ibox-mode');
        button.toggleClass('fa-expand').toggleClass('fa-compress');
        ibox.toggleClass('fullscreen');
        setTimeout(function () {
            $(window).trigger('resize');
        }, 100);
    });

    // Close menu in canvas mode
    $('.close-canvas-menu').on('click', function (e) {
        e.preventDefault();
        $("body").toggleClass("mini-navbar");
        SmoothlyMenu();
    });

    // Run menu of canvas
    $('body.canvas-menu .sidebar-collapse').slimScroll({
        height: '100%',
        railOpacity: 0.9
    });

    // Open close right sidebar
    $('.right-sidebar-toggle').on('click', function (e) {
        e.preventDefault();
        $('#right-sidebar').toggleClass('sidebar-open');
    });

    // Initialize slimscroll for right sidebar
    $('.sidebar-container').slimScroll({
        height: '100%',
        railOpacity: 0.4,
        wheelStep: 10
    });

    // Open close small chat
    $('.open-small-chat').on('click', function (e) {
        e.preventDefault();
        $(this).children().toggleClass('fa-comments').toggleClass('fa-times');
        $('.small-chat-box').toggleClass('active');
    });

    // Initialize slimscroll for small chat
    $('.small-chat-box .content').slimScroll({
        height: '234px',
        railOpacity: 0.4
    });

    // Small todo handler
    $('.check-link').on('click', function () {
        var button = $(this).find('i');
        var label = $(this).next('span');
        button.toggleClass('fa-check-square').toggleClass('fa-square-o');
        label.toggleClass('todo-completed');
        return false;
    });

    // Append config box / Only for demo purpose
    // Uncomment on server mode to enable XHR calls
    //$.get("skin-config.html", function (data) {
    //    if (!$('body').hasClass('no-skin-config'))
    //        $('body').append(data);
    //});

    // Minimalize menu
    $('.navbar-minimalize').on('click', function (event) {
        event.preventDefault();
        $("body").toggleClass("mini-navbar");
        SmoothlyMenu();

    });

    // Tooltips demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    });


    // Move right sidebar top after scroll
    $(window).scroll(function () {
        if ($(window).scrollTop() > 0 && !$('body').hasClass('fixed-nav')) {
            $('#right-sidebar').addClass('sidebar-top');
        } else {
            $('#right-sidebar').removeClass('sidebar-top');
        }
    });

    $("[data-toggle=popover]")
        .popover();

    // Add slimscroll to element
    $('.full-height-scroll').slimscroll({
        height: '100%'
    })
});



// Fixed Sidebar
$(window).bind("load", function () {
    if ($("body").hasClass('fixed-sidebar')) {
        $('.sidebar-collapse').slimScroll({
            height: '100%',
            railOpacity: 0.9
        });
    }
});

function fix_height() {
    var heightWithoutNavbar = $("body > #wrapper").height() - 62;
    $(".sidebar-panel").css("min-height", heightWithoutNavbar + "px");

    var navbarheight = $('nav.navbar-default').height();
    var wrapperHeight = $('#page-wrapper').height();

    if (navbarheight > wrapperHeight) {
        $('#page-wrapper').css("min-height", navbarheight + "px");
    }

    if (navbarheight < wrapperHeight) {
        $('#page-wrapper').css("min-height", $(window).height() + "px");
    }

    if ($('body').hasClass('fixed-nav')) {
        if (navbarheight > wrapperHeight) {
            $('#page-wrapper').css("min-height", navbarheight + "px");
        } else {
            $('#page-wrapper').css("min-height", $(window).height() - 60 + "px");
        }
    }

}

$(window).bind("load resize scroll", function () {

    // Full height of sidebar
    setTimeout(function(){
        if (!$("body").hasClass('body-small')) {
            fix_height();
        }
    })

});

// Minimalize menu when screen is less than 768px
$(window).bind("resize", function () {
    if ($(this).width() < 769) {
        $('body').addClass('body-small')
    } else {
        $('body').removeClass('body-small')
    }
});

// Local Storage functions
// Set proper body class and plugins based on user configuration
$(document).ready(function () {
    if (localStorageSupport()) {

        var collapse = localStorage.getItem("collapse_menu");
        var fixedsidebar = localStorage.getItem("fixedsidebar");
        var fixednavbar = localStorage.getItem("fixednavbar");
        var boxedlayout = localStorage.getItem("boxedlayout");
        var fixedfooter = localStorage.getItem("fixedfooter");

        var body = $('body');

        if (fixedsidebar == 'on') {
            body.addClass('fixed-sidebar');
            $('.sidebar-collapse').slimScroll({
                height: '100%',
                railOpacity: 0.9
            });
        }

        if (collapse == 'on') {
            if (body.hasClass('fixed-sidebar')) {
                if (!body.hasClass('body-small')) {
                    body.addClass('mini-navbar');
                }
            } else {
                if (!body.hasClass('body-small')) {
                    body.addClass('mini-navbar');
                }

            }
        }

        if (fixednavbar == 'on') {
            $(".navbar-static-top").removeClass('navbar-static-top').addClass('navbar-fixed-top');
            body.addClass('fixed-nav');
        }

        if (boxedlayout == 'on') {
            body.addClass('boxed-layout');
        }

        if (fixedfooter == 'on') {
            $(".footer").addClass('fixed');
        }
    }
});

// check if browser support HTML5 local storage
function localStorageSupport() {
    return (('localStorage' in window) && window['localStorage'] !== null)
}

// For demo purpose - animation css script
function animationHover(element, animation) {
    element = $(element);
    element.hover(
        function () {
            element.addClass('animated ' + animation);
        },
        function () {
            //wait for animation to finish before removing classes
            window.setTimeout(function () {
                element.removeClass('animated ' + animation);
            }, 2000);
        });
}

function SmoothlyMenu() {
    if (!$('body').hasClass('mini-navbar') || $('body').hasClass('body-small')) {
        // Hide menu in order to smoothly turn on when maximize menu
        $('#side-menu').hide();
        // For smoothly turn on menu
        setTimeout(
            function () {
                $('#side-menu').fadeIn(400);
            }, 200);
    } else if ($('body').hasClass('fixed-sidebar')) {
        $('#side-menu').hide();
        setTimeout(
            function () {
                $('#side-menu').fadeIn(400);
            }, 100);
    } else {
        // Remove all inline style from jquery fadeIn function to reset menu state
        $('#side-menu').removeAttr('style');
    }
}

// Dragable panels
function WinMove() {
    var element = "[class*=col]";
    var handle = ".ibox-title";
    var connect = "[class*=col]";
    $(element).sortable(
        {
            handle: handle,
            connectWith: connect,
            tolerance: 'pointer',
            forcePlaceholderSize: true,
            opacity: 0.8
        })
        .disableSelection();
}


