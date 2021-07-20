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
    $('.open-searchKeyword-input-bar').click(function(){
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $('.mobile-search-box__bg').removeClass('active');
        }
        else{
            $(this).addClass('active');
            $('.mobile-search-box__bg').addClass('active');
        }
    });
    $('.mobile-search-box__bg').click(function(){
        $(this).removeClass('active');
        $('.open-searchKeyword-input-bar').removeClass('active');
    });
}

$(function() {
    MobileSideBarBtn_init(); 
    MobileSideBar_init();
    MobileSearchBox_init();
});