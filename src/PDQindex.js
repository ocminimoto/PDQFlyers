
  	var nav = document.getElementById('navbar')

  	  window.onscroll = function () {
  	  	 
  	  	 if (window.pageYOffset > 100) {

  	  	 	nav.style.background = "#007bff";
  	  	 	nav.style.boxShadow = "0px 4px 2px blue";
  	  	  }
  	  	    else
            {
  	  	      nav.style.background = "transparent";	
  	  	      nav.style.boxShadow = "none";
  	  	      nav.style.top =100;
  	  	    }
  	  	 }	


      window.onscroll = function () {
         
         if (window.pageYOffset > 100) {

          nav.style.position = "fixed";
          nav.style.top = 0;

            }else{
              nav.style.position = "absolute";
              nav.style.top =100;
            }
         }

$('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});

       function myFunction_home() {
            location.href = "index.html";
        }  
