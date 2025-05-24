<!-- Calendar Modal -->
<form id="bookingDateForm" method="get">
  <div class="modal fade" id="calendarModalToggle" tabindex="-1" aria-labelledby="calendarModalLabelToggle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="calendarModalLabelToggle">
            {{ __('services.choose_service_date') }}
          </h5>
        </div>
        <div class="modal-body">
          <div class="p-2 d-flex flex-column gap-2 align-items-center">
            <input type="date" id="event_date" class="datepicker" name="event_date" required />
            <button type="submit" class="btn bg-white mb-1 fw-bold text-black rounded-3" id="available_packages_btn" disabled>
              <i class="far fa-calendar-plus"></i>
              {{ __('services.confirm_this_date') }}
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>



  <script>

       // get service id when click btn
        const calendarModal = document.getElementById('calendarModalToggle');
        const bookingDateForm = document.getElementById('bookingDateForm');

        calendarModal.addEventListener('show.bs.modal', function (event) {
          const button = event.relatedTarget;
          const serviceId = button.getAttribute('data-service-id');

          if (serviceId) {
            bookingDateForm.action = `/service-packages/${serviceId}`;
          }
        });

        // event_date validte
        const dateInput = document.getElementById("event_date");
        const submitBtn = document.getElementById("available_packages_btn");

        dateInput.addEventListener("input", function () {
          if (dateInput.value) {
            submitBtn.disabled = false;
          } else {
            submitBtn.disabled = true;
          }
        });
  </script>
