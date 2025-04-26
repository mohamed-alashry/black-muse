$(document).ready(function () {


    let currentLocale = document.documentElement.lang || 'en';

    function loadPackageDetails(packageId) {
        var package = packagesData.find(pkg => pkg.id == packageId);
        if (!package) {
            console.error('Package not found!');
            return;
        }

        let packageName = package.name[currentLocale] || package.name['en'];
        let featuresHtml = ` <div class="item">
                <h6>${packageName}</h6>
                <input hidden name="package-base-price" id="package-base-price" data-base-price="${package.base_price}" value="${package.base_price}"/>
                <h3 class="text-gold total-price">
                  ${package.base_price}<span class="fs-6 fw-lighter">SAR</span>
                </h3>
              </div>`;
        package.features.forEach(function (feature) {
            let featureName = feature.name[currentLocale] || feature.name['en'];
            featuresHtml += `
                <div class="item">
                <div class="d-flex gap-2">
                  <input
                    type="checkbox"
                    class="feature-checkbox"
                    data-price="${feature.price}"
                    ${feature.pivot.is_default ? 'checked disabled' : ''}
                    name="features[]"
                    value="${feature.id}"
                    id="feature_${feature.id}">
                <label for="feature_${feature.id}">${featureName}</label>
                </div>
                <div>
                  <h6 class="text-gold">
                    ${feature.price}<span class="fw-lighter">SAR</span>
                  </h6>
                </div>
              </div>
            `;
        });
        $('.features-list').html(featuresHtml);

    }


    $('.btn-choose-package').click(function () {
        var packageId = $(this).data('package-id');

        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $('#selectedPackageId').val('');
            $('#nextBtn').hide();
            $('.features-list').html('');
        } else {
            $('.btn-choose-package').removeClass('active');
            $(this).addClass('active');
            $('#selectedPackageId').val(packageId);
            $('#nextBtn').show();

            loadPackageDetails(packageId);
        }
    });


    $(document).on('change', '.feature-checkbox', function () {

        let basePrice = parseFloat($('#package-base-price').data('base-price')) || 0;
        calculateTotal(basePrice);

    });

    function calculateTotal(basePrice) {
        let total = parseFloat(basePrice) || 0;

        $('.feature-checkbox:checked:not(:disabled)').each(function () {
            const featurePrice = parseFloat($(this).data('price')) || 0;
            total += featurePrice;
        });

        $('.total-price').text(total.toFixed(2) + ' SAR');
    }


    function validateField(element) {
        let inputType = element.attr('type');
        let isValidInput = true;

        if (inputType === 'checkbox' || inputType === 'radio') {
            if (!$('[name="' + element.attr('name') + '"]:checked').length) {
                isValidInput = false;
            }
        } else if (inputType === 'file') {
            if (!element.get(0).files.length) {
                isValidInput = false;
            }
        } else {
            if (!element.val()) {
                isValidInput = false;
            }
        }

        if (isValidInput) {
            element.removeClass('is-invalid').addClass('is-valid');
        } else {
            element.removeClass('is-valid').addClass('is-invalid');
        }

        return isValidInput;
    }

    $('#nextBtn').click(function (e) {
        if (currentTab === $(".tab").length - 1) {
            e.preventDefault();

            let selectedPackage = $('#selectedPackageId').val();
            let isValid = true;

            if (!selectedPackage) {
                toastr.error('Please select a package first!');
                isValid = false;
            }

            $('.form-packages-section [required]').each(function () {
                if (!validateField($(this))) {
                    isValid = false;
                }
            });

            if (!isValid) {
                $('#nextBtn').prop('disabled', true);
                toastr.error('Please fill all required questions.');
                return;
            } else {
                $('#nextBtn').prop('disabled', false);

            }
        } else {
            $('#nextBtn').prop('disabled', false);
        }
    });

    $('.form-packages-section [required]').on('input change', function () {
        validateField($(this));
    });


});
