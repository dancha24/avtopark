$(function() {

  $("#contactForm input,#contactForm textarea").jqBootstrapValidation({
    preventSubmit: true,
    submitError: function($form, event, errors) {
      // additional error messages or events
    },
    submitSuccess: function($form, event) {
      event.preventDefault(); // prevent default submit behaviour
      // get values from FORM
      var name = $("input#name").val();
      var phone = $("input#phone").val();
      var vu = $("input#vu").val();
      var vu_data = $("input#vu_data").val();
      var vu_data_ok = $("input#vu_data_ok").val();
      var perevozka = $("input#perevozka").val();
      var avto_marka = $("input#avto_marka").val();
      var avto_model = $("input#avto_model").val();
      var avto_vipusk = $("input#avto_vipusk").val();
      var avto_color = $("input#avto_color").val();	  
      var avto_nomer = $("input#avto_nomer").val();		  
      var firstName = name; // For Success/Failure Message
      // Check for white space in name for Success/Fail message
      if (firstName.indexOf(' ') >= 0) {
        firstName = name.split(' ').slice(0, -1).join(' ');
      }
      $this = $("#sendMessageButton");
      $this.prop("disabled", true); // Disable submit button until AJAX call is complete to prevent duplicate messages
      $.ajax({
        url: "././mail/contact_me.php",
        type: "POST",
        data: {
          name: name,
          phone: phone,
		  vu: vu,
		  vu_data: vu_data,
		  vu_data_ok: vu_data_ok,
		  perevozka: perevozka,
		  avto_marka: avto_marka,
		  avto_model: avto_model,
		  avto_vipusk: avto_vipusk,
		  avto_color: avto_color,
		  avto_nomer: avto_nomer
        },
        cache: false,
        success: function() {
          // Success message
          $('#success').html("<div class='alert alert-success'>");
          $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
            .append("</button>");
          $('#success > .alert-success')
            .append("<strong>Ваше сообщение было отправлено.</strong>");
          $('#success > .alert-success')
            .append('</div>');
          //clear all fields
          $('#contactForm').trigger("reset");
        },
        error: function() {
          // Fail message
          $('#success').html("<div class='alert alert-danger'>");
          $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
            .append("</button>");
          $('#success > .alert-danger').append($("<strong>").text("Извините! " + firstName + ", кажется, что наш почтовый сервер не отвечает. Пожалуйста, повторите попытку позже или позвоните нам на телефон ! "));
          $('#success > .alert-danger').append('</div>');
          //clear all fields
          $('#contactForm').trigger("reset");
        },
        complete: function() {
          setTimeout(function() {
            $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
          }, 1000);
        }
      });
    },
    filter: function() {
      return $(this).is(":visible");
    },
  });

  $("a[data-toggle=\"tab\"]").click(function(e) {
    e.preventDefault();
    $(this).tab("show");
  });
});

/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
  $('#success').html('');
});
