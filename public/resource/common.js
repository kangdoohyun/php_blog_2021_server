function MobileSideBarBtn_init(){
    $('.mobile-top-bar__side-menu-open-btn').click(function(){
        $('.mobile-side-menu').addClass('active');
        $('html').addClass('mobile-side-bar-actived');
    });
    $('.mobile-side-menu__close-btn, .mobile-side-menu__bg').click(function(){
        $('.mobile-side-menu').removeClass('active');
        $('html').removeClass('mobile-side-bar-actived');
    });
    $('.mobile-side-menu__content').click(function(){
        return false;
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

function MobileSearchBox_init(){
    $('.mobile-search-box-btn').click(function(){
        $('.mobile-search-box-btn+form').addClass('active');
        $(this).addClass('active');
        $('.write-btn').addClass('active');
    });
}

$(function() {
    MobileSideBarBtn_init(); 
    MobileSideBar_init();
    MobileSearchBox_init();
});