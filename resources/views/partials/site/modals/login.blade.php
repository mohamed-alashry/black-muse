<!-- نموذج تسجيل الدخول -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-4 fw-lighter" id="registerModalLabel">
          {{ __('auth.title') }} <strong class="text-gold"></strong>
        </h1>
        <p class="fw-lighter">{{ __('auth.welcome') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
      </div>
      <div class="modal-body">
        <form class="contact-us-form d-flex flex-column gap-3 bg-main" id="loginForm">
          <div id="loginMsgs" class="text-white mt-3"></div>

          <input type="email" name="email" class="form-control bg-main rounded-4 w-100" placeholder="{{ __('auth.email_placeholder') }}">

          <input type="password" name="password" class="form-control bg-main rounded-4 w-100" placeholder="{{ __('auth.password_placeholder') }}">

          <button type="submit" class="btn bg-white rounded-4 w-100" id="loginBtn">
            <i class="fa-solid fa-arrow-right-to-bracket"></i> {{ __('auth.login_button') }}
          </button>

          <a class="border-secondary border-top pt-2 text-center text-secondary">{{ __('auth.no_account') }}</a>

          <button type="button" class="btn bg-white rounded-4 w-100" data-bs-toggle="modal" data-bs-target="#registerModal">
            <i class="fa-solid fa-arrow-right-to-bracket"></i> {{ __('auth.register_button') }}
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('do') === 'login') {
      const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
      loginModal.show();
    }
      
    $('#loginForm').on('submit', function(e) {
      e.preventDefault();

      $.ajax({
        url: '{{ route("site.save_login") }}',
        method: 'POST',
        data: $(this).serialize(),
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        beforeSend: function () {
          $('#loginBtn').prop('disabled', true).html(`
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            {{ __('auth.sending') }}
          `);
          $('#loginMsgs').html(""); 
        },
        complete: function () {
          $('#loginBtn').prop('disabled', false).html(`
            <i class="fa-solid fa-arrow-right-to-bracket"></i> {{ __('auth.login_button') }}
          `);
        },
        success: function(response) {
           if (response.status === 'success') {
              window.location.href = '{{ route("site.home") }}'; 
           } else {
               $('#loginMsgs').html(`<p style="padding:15px" class="text-danger">`+response.message+ `</p>`); 
           }
        },
        error: function (xhr) {
          let errors = xhr.responseJSON.errors;
          let errorHtml = `<ul style="padding:15px" class="text-danger">`;
          $.each(errors, function (key, value) {
            errorHtml += `<li>${value}</li>`;
          });
          errorHtml += `</ul>`;
          $('#loginMsgs').html(errorHtml);
        }
      });
    });
  });
</script>
