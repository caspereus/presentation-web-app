jQuery(document).ready(function($){
    
    
  
    
    //FILBOX
    $('.thumbnail-img img').fillBox(); 
    
    //MENU-HOVER
	
	// Large devices <large desktops, 992px and up>
	if ($(window).width() > 992) {
		$('.has-dropdown').mouseenter(function(){
			var $this = $(this);

				$this.addClass('is-opened')

		}).mouseleave(function(){

			var $this = $(this);

				$this.removeClass('is-opened')

		});   
	}
	
	// Medium devices <landscape phones, 576px and up>
	/*if ($(window).width() < 1024) {*/
		$(".has-dropdown > a").click(function () { 
			if ($(this).parent().hasClass('is-opened')) {

				$(".has-dropdown.is-opened").removeClass("is-opened");

			} else {

				$(".has-dropdown.is-opened").removeClass("is-opened");

				if ($(this)) {

					$(this).parent().addClass("is-opened");
				}
			}
		});
	
		$(".has-sub-dropdown > a").click(function () { 
			if ($(this).parent().hasClass('is-opened')) {

				$(".has-sub-dropdown.is-opened").removeClass("is-opened");

			} else {

				$(".has-sub-dropdown.is-opened").removeClass("is-opened");

				if ($(this)) {

					$(this).parent().addClass("is-opened");
				}
			}
		}); 
	
		$(".has-subs-dropdown > a").click(function () { 
			if ($(this).parent().hasClass('is-opened')) {

				$(".has-subs-dropdown.is-opened").removeClass("is-opened");

			} else {

				$(".has-subs-dropdown.is-opened").removeClass("is-opened");

				if ($(this)) {

					$(this).parent().addClass("is-opened");
				}
			}
		});
	/*}*/

    
    //BURGER-MENU
    $('.navigation-burger').click(function() {
	  
        navigationToggle();
    });

    function navigationToggle() {
        $('.navigation-burger').toggleClass('is-active');
        $('.menubar-center').toggleClass('bar-is-opened');
        $('body').toggleClass('scroll-lock');
		$(".has-dropdown.is-opened").removeClass("is-opened");
    }

    
      
     //STICKY HEADER
    $(window).bind('scroll', function() {
        var navHeight = $('header').height();
            if ($(window).scrollTop() > navHeight) {
                $('.main-header').addClass('fixed-nav');
            } else {
                $('.main-header').removeClass('fixed-nav');
            }
      });
    
	

    
});