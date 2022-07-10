
  const toggleForm = () => {
    const container = document.querySelector('.container');
    container.classList.toggle('active');
  };




(function($) { // Begin jQuery
    $(function() { // DOM ready
      // If a link has a dropdown, add sub menu toggle.
      $('nav ul li a:not(:only-child)').click(function(e) {
        $(this).siblings('.dropdown-menu').toggle();
        // Close one dropdown when selecting another
        $('.dropdown-menu').not($(this).siblings()).hide();
        e.stopPropagation();
      });
      // Clicking away from dropdown will remove the dropdown class
      $('html').click(function() {
        $('.dropdown-menu').hide();
      });
      // Toggle open and close nav styles on click
      $('#nav-toggle').click(function() {
        $('nav ul').slideToggle();
      });
      // Hamburger to X toggle
      $('#nav-toggle').on('click', function() {
        this.classList.toggle('active');
      });
    }); // end DOM ready
  })(jQuery); // end jQuery

  function showDetail(username, email, phone, dob, isavtive) {
    $("#modal-detail-user .modal-body #username-modal").val(username);
    $("#modal-detail-user .modal-body #email-modal").val(email);
    $("#modal-detail-user .modal-body #phone-modal").val(phone);
    $("#modal-detail-user .modal-body #dob-modal").val(dob);
    if (isavtive == 1) {
        $("#modal-detail-user .modal-body #status-modal").val("Actived");
    } else if (isavtive == 0){
      $("#modal-detail-user .modal-body #status-modal").val("Waiting for active");
    }
}