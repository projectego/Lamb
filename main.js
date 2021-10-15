/* --------------------------------------------------------------
Remove hashtag # from address bar after page load
-------------------------------------------------------------- */

//history.replaceState(null, null, ' ');

/* --------------------------------------------------------------
Toogle show/hide of main menu and account menu
-------------------------------------------------------------- */

jQuery(document).ready(function(){

    /* toggle main menu  */
    jQuery(".hamburger-button--activate").click(function() {

        // Hide the original button and show the counter button
        jQuery(this).hide();
        jQuery(".hamburger-button--deactivate").show();

        // 
        jQuery("#main-menu").slideDown();

        // Add styling to the #page-head or remove it
        jQuery("#page-head").addClass("box-shadow page-head--background-colour");

        // Return the other menu settings to default status
        jQuery(".search-button--activate").show();
        jQuery(".search-button--deactivate").hide();
        jQuery("#search-menu").hide();

    });

    /* toggle main menu  */
    jQuery(".hamburger-button--deactivate").click(function() {

        // Hide the original button and show the counter button
        jQuery(this).hide();
        jQuery(".hamburger-button--activate").show();

        //
        jQuery("#main-menu").slideUp();

        // Add styling to the #page-head or remove it
        jQuery("#page-head").removeClass("box-shadow page-head--background-colour");

        // Return the other menu settings to default status
        jQuery(".search-button--activate").show();
        jQuery(".search-button--deactivate").hide();
        jQuery("#search-menu").hide();

    });

    /* toggle search bar  */
    jQuery(".search-button--activate").click(function() {

        // Hide the original button and show the counter button
        jQuery(this).hide();
        jQuery(".search-button--deactivate").show();

        //
        jQuery("#search-menu").slideDown();

        // Add styling to the #page-head or remove it
        jQuery("#page-head").addClass("box-shadow page-head--background-colour");

        // Return the other menu settings to default status
        jQuery(".hamburger-button--activate").show();
        jQuery(".hamburger-button--deactivate").hide();
        jQuery("#main-menu").hide();

    });

    /* toggle search bar  */
    jQuery(".search-button--deactivate").click(function() {

        // Hide the original button and show the counter button
        jQuery(this).hide();
        jQuery(".search-button--activate").show();

        //
        jQuery("#search-menu").slideUp();

        // Add styling to the #page-head or remove it
        jQuery("#page-head").removeClass("box-shadow page-head--background-colour");

        // Return the other menu settings to default status
        jQuery(".hamburger-button--activate").show();
        jQuery(".hamburger-button--deactivate").hide();
        jQuery("#main-menu").hide();

    });

});

/* --------------------------------------------------------------
Smooth Scroll to ID with jQuery
-------------------------------------------------------------- */

jQuery('a[href*="#"]').on('click', function (e) {
  e.preventDefault()

  jQuery('html, body').animate(
    {
      scrollTop: jQuery(jQuery(this).attr('href')).offset().top - 50,
    },
    500,
    'linear'
  )
})