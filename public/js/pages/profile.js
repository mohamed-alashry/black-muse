$(document).ready(function () {

  $('#info-tab-pane').on('submit', function(e) {
    e.preventDefault();
    let form = $(this);

    $.ajax({
      url: '/profile/update-info',
      method: 'POST',
      data: form.serialize(),
      headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                'X-localization': $('html').attr('lang') || 'en'
      },
      beforeSend: function () {
            $('#infoSubmit').prop('disabled', true).html(`
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Sending...
            `);
            $('#InfoMsgs').html(""); 
     },
     complete: function () {
            $('#infoSubmit').prop('disabled', false).html(`
              <i class="fa-solid fa-arrow-right-to-bracket"></i> Edit & Save
            `);
     },
     success: function(response) {
             if (response.status === 'success') {
               toastr.success(response.message);
             }else{
                 $('#InfoMsgs').html(`<p style="padding:15px" class="text-danger">`+response.message+ `</p>`); 
             }

    },
    error: function (xhr) {
            let errors = xhr.responseJSON.errors;
            let errorHtml = `<ul style="padding:15px" class="text-danger">`;
            $.each(errors, function (key, value) {
              errorHtml += `<li>${value}</li>`;
            });
            errorHtml += `</ul>`;
            $('#InfoMsgs').html(errorHtml);
     }
    });
  });


    $('#password-tab-pane').on('submit', function(e) {
    e.preventDefault();
    let form = $(this);

    $.ajax({
      url: '/profile/update-password',
      method: 'POST',
      data: form.serialize(),
      headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                'X-localization': $('html').attr('lang') || 'en'
      },
      beforeSend: function () {
            $('#changePasswordSubmit').prop('disabled', true).html(`
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Sending...
            `);
            $('#changePasswordMsgs').html(""); 
     },
     complete: function () {
            $('#changePasswordSubmit').prop('disabled', false).html(`
              <i class="fa-solid fa-arrow-right-to-bracket"></i> Edit & Save
            `);
     },
     success: function(response) {
             if (response.status === 'success') {
               window.location.href = '/?do=login'; 
             }else{
                 $('#changePasswordMsgs').html(`<p style="padding:15px" class="text-danger">`+response.message+ `</p>`); 
             }

    },
    error: function (xhr) {
            let errors = xhr.responseJSON.errors;
            let errorHtml = `<ul style="padding:15px" class="text-danger">`;
            $.each(errors, function (key, value) {
              errorHtml += `<li>${value}</li>`;
            });
            errorHtml += `</ul>`;
            $('#changePasswordMsgs').html(errorHtml);
     }
    });
  });



});
