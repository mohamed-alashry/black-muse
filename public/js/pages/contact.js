 $(document).ready(function () {
    $('#contactForm').on('submit', function (e) {
      e.preventDefault();

      var formData = $(this).serialize();

      $.ajax({
        url: "/contact",
        type: "POST",
        data: formData,
        headers: {
          'X-CSRF-TOKEN': $('input[name="_token"]').val()
        },
        beforeSend: function () {
          $('#submitBtn').prop('disabled', true).html(`
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Sending...
          `);
          $('#formMsg').html(""); 
        },
        complete: function () {
          $('#submitBtn').prop('disabled', false).html(`
            <i class="fa-solid fa-arrow-right-to-bracket"></i> Send Now
          `);
        },
        success: function (response) {
          $('#formMsg').html(`<span class="text-success">Message sent successfully!</span>`);
          $('#contactForm')[0].reset(); // clear the form
        },
        error: function (xhr) {
          let errors = xhr.responseJSON.errors;
          let errorHtml = `<ul class="text-danger">`;
          $.each(errors, function (key, value) {
            errorHtml += `<li>${value}</li>`;
          });
          errorHtml += `</ul>`;
          $('#formMsg').html(errorHtml);
        }
      });
    });
  });