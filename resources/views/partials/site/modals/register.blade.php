<!-- نموذج تسجيل حساب جديد -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4 fw-lighter" id="registerModalLabel">
                    {{ __('auth.create_account') }} <strong class="text-gold"></strong> {{ __('auth.now') }}
                </h1>
                <p class="fw-lighter">{{ __('auth.welcome') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
            </div>
            <div class="modal-body">
                <form id="registerForm" class="contact-us-form row gy-3 bg-main">
                    <div id="registerMsgs" class="text-white mt-3"></div>
                    <div class="col-md-6 col-12">
                        <input type="email" name="email" class="form-control bg-main rounded-4 col-md-6"
                               placeholder="{{ __('auth.email_placeholder') }}">
                    </div>
                    <div class="col-md-6 col-12">
                        <input type="text" name="name" class="form-control bg-main rounded-4 col-md-6"
                               placeholder="{{ __('auth.name_placeholder') }}">
                    </div>
                    <div class="col-md-6 col-12">
                        <input type="password" name="password" class="form-control bg-main rounded-4 col-md-6"
                               placeholder="{{ __('auth.password_placeholder') }}">
                    </div>
                    <div class="col-md-6 col-12">
                        <input type="password" name="password_confirmation" class="form-control bg-main rounded-4 col-md-6"
                               placeholder="{{ __('auth.password_confirmation_placeholder') }}">
                    </div>
                    <div class="col-12">
                        <input type="text" name="phone_number" class="form-control bg-main rounded-4 col-md-6"
                               placeholder="{{ __('auth.phone_placeholder') }}">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn bg-white rounded-4 w-100" id="registerBtn">
                            {{ __('auth.register_button') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        $('#registerForm input').on('input', function () {
            const field = $(this);
            const name = field.attr('name');
            const value = field.val();
            $.ajax({
                url: '{{ route("site.validate-register") }}',
                method: 'POST',
                data: {
                    field: name,
                    value: value,
                    password: $('[name="password"]').val(),
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                beforeSend: function () {
                    $('#registerMsgs').html("");
                },
                success: function (response) {
                    field.removeClass('is-invalid').addClass('is-valid');
                    field.next('.invalid-feedback').remove();
                },
                error: function (xhr) {
                    const res = xhr.responseJSON;
                    field.removeClass('is-valid').addClass('is-invalid');
                    field.next('.invalid-feedback').remove();
                    field.after(`<div class="invalid-feedback">${res.message}</div>`);
                }
            });
        });

        $('#registerForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route("site.save_register") }}',
                method: 'POST',
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                beforeSend: function () {
                    $('#registerBtn').prop('disabled', true).html(`
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        {{ __('auth.sending') }}
                    `);
                    $('#registerMsgs').html("");
                },
                complete: function () {
                    $('#registerBtn').prop('disabled', false).html(`
                        <i class="fa-solid fa-arrow-right-to-bracket"></i> {{ __('auth.register_button') }}
                    `);
                },
                success: function (response) {
                    if (response.status === 'success') {
                        window.location.href = '{{ route("site.home") }}';
                    } else {
                        $('#registerMsgs').html(`<p style="padding:15px" class="text-danger">` + response.message + `</p>`);
                    }
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorHtml = `<ul style="padding:15px" class="text-danger">`;
                    $.each(errors, function (key, value) {
                        errorHtml += `<li>${value}</li>`;
                    });
                    errorHtml += `</ul>`;
                    $('#registerMsgs').html(errorHtml);
                }
            });
        });

    });
</script>
