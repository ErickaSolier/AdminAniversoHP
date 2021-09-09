/*$(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
      $('#sidebar, #content').toggleClass('active');
      $('.collapse.in').toggleClass('in');
      $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      document.getElementById("bodyContent").style.width="100%";
    });
    $('.submenu').click(function(){
      $(this).children('.children').slideToggle();   
  });
});*/
$(document).ready(main);  
    function main(){
      $('#sidebarCollapse').on('click', function() {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        document.getElementById("bodyContent").style.width="100%";
      });
      $('.submenu').click(function(){
        $(this).children('.children').slideToggle();   
    });
    }

