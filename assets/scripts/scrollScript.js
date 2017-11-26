(function() {

  window.onload = function() {
    var menu = document.getElementById('menu');

    var init = menu.offsetTop;
    var docked;
    
    window.onscroll = function() {
      if (!docked && (menu.offsetTop - scrollTop() < 0)) {
        menu.style.top = 0;
        menu.style.position = 'fixed';
        menu.className = 'docked';
        docked = true;
      } else if (docked && scrollTop() <= init) {
        menu.style.position = '';
        menu.style.top = init + 'px';
        menu.className = menu.className.replace('docked','');
        docked = false;
      }
    };
    function scrollTop() {
     return document.body.scrollTop || document.documentElement.scrollTop; 
    }





    $('form#contactForm').on('submit',function() {
      $(".text-danger").hide();
      var holderValue = false;
    
      $(this).find('input[type!="hidden"]').each(function() {
        if (!$(this).val()) {
          holderValue = true;
          $(this).parent().find(".text-danger").show();
        }

        if ($('#locVal').text() !== $('#secCheck').val()) {
          $('#secCheck').parent().find(".text-danger").show();
          holderValue = true;
        }
      })
      if (!$("#message").val()){
        holderValue = true;
        $("#message").parent().find(".text-danger").show();
      }

      if (holderValue) {
        return false
      } 
      else {

        $('#successMsg').html('<p>Thank you! Your inquiry has been submitted.</p>');
        // return false
        $("#contactForm").submit(function() {
          $.post($(this).attr("action"), $(this).serialize());

          return false;
        })
      }
      
    })
  };
})();