$(document).ready(function() {
    const header = $("header");
  
    // Add a scroll event listener using jQuery
    $(window).scroll(function() {
        // Toggle the "sticky" class on the header when scrolling
        header.toggleClass("sticky", $(window).scrollTop() > 0);
    });
  
    let menu = $("#menu-icon");
    let navbar = $(".navbar");
  
    // Add a click event handler to the menu icon
    menu.click(function() {
        // Toggle the "bx-x" class on the menu icon
        menu.toggleClass('bx-x');
        // Toggle the "open" class on the navbar
        navbar.toggleClass('open');
    });
  
    // Add a scroll event handler to the window
    $(window).scroll(function() {
        // Remove the "bx-x" class from the menu icon
        menu.removeClass('bx-x');
        // Remove the "open" class from the navbar
        navbar.removeClass('open');
    });
  
    // Create a ScrollReveal instance
    const sr = ScrollReveal({
        distance: '30px',
        duration: 2500,
        reset: true
    });
  
    // Reveal elements with specified animations and delays
    sr.reveal('.home-text', { delay: 200, origin: 'left' });
    sr.reveal('.about_us_cover', { delay: 200, origin: 'top' });
    sr.reveal('.Restaurant_Info, .about, .menu, .footer, .meet_our_team', { delay: 200, origin: 'bottom' });
  
    
      $('body').on('click', '.menuitem-image', function () {
          var menuitemId = $(this).data("menuitemid");
          var menuitemUrl = 'menuitem.php?menuitemid=' + menuitemId;
          window.location.href = menuitemUrl;
      });
  });