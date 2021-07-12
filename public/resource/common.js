function MobileSideBarBtn_init(){
    $('.mobile-top-bar__side-menu-open-btn').click(function(){
        $('.mobile-side-menu').addClass('active');
    });
    $('.mobile-side-menu__close-btn').click(function(){
        $('.mobile-side-menu').removeClass('active');
    });
}

function MobileSideBar_init(){
    $('.mobile-side-menu__link-box > li').click(function(){
        $(this).addClass('active');
    });
    $('.mobile-side-menu__board-box > li').click(function(){
        $(this).addClass('active');
    })
}

$(function() {
    MobileSideBarBtn_init(); 
    MobileSideBar_init();
});