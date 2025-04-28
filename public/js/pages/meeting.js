$(document).ready(function () {
    $('#confirm_date_meeting').click(function () {
        const button = $(this);
        const selectedDate = document.getElementById('meeting_date').value;

        if (!selectedDate) {
            toastr.error('Please select a date first.');
            button.html('<i class="far fa-calendar-plus"></i> Confirm This Date Now');
            return;
        }

        button.html('<i class="fas fa-spinner fa-spin"></i> Loading...')
              .prop('disabled', true);

        fetchAvailableTimes(selectedDate, button);

        $('.meeting_time').show();
        $('#date_selected_text').text(formatDate(selectedDate));
        $('html, body').animate({ scrollTop: $('.meeting_time').offset().top }, 'slow');
    });

    function fetchAvailableTimes(date, button) {
        $.ajax({
            url: '/booking/meeting/available-times',  
            type: 'POST',
            data: {
                date: date,
            },
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            success: function (response) {
                renderTimeSlots(response.times);
                button.html('<i class="fa-solid fa-arrow-right-to-bracket"></i> Choose Another Date').prop('disabled',false);
            },
            error: function () {
                toastr.error('حدث خطأ أثناء تحميل الأوقات المتاحة.');
                button.html('<i class="far fa-calendar-plus"></i> Confirm This Date Now');
            }
        });
    }

    function renderTimeSlots(times) {
        const container = $('#timeSlots');
        container.empty();
        if (!times.length) {
            container.append('<p class="text-white">No available times for this date.</p>');
            return;
        }
        times.forEach(function (time) {
           const button = $('<button class="btn timebtn"></button>')
            .text(time.from + ' - ' + time.to)
            .attr('data-from', time.from)
            .attr('data-to', time.to);
            button.click(function () {
                $('.timebtn').removeClass('selected'); 
                $(this).addClass('selected'); 
             });
            container.append(button);
        });
    }

    
    $('#confirm_time_meeting').click(function () {
    const selectedButton = $('.timebtn.selected');

    if (selectedButton.length === 0) {
        toastr.error('Please select a time first.');
        return;
    }

    const meetingDate = $('#meeting_date').val(); 
    const fromTime = selectedButton.data('from');  
    const toTime = selectedButton.data('to');      

    $.ajax({
        url: '/booking/meeting/save',
        type: 'POST',
        data: {
            booking_id : $('#booking_id').val(),
            date: meetingDate,
            from: fromTime,
            to: toTime
        },
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        },
        beforeSend: function () {
            $('#confirm_time_meeting').html('<i class="fas fa-spinner fa-spin"></i> Saving...').prop('disabled', true);
        },
        success: function (response) {
            toastr.success('Meeting saved successfully!');
            window.location.href = '/service/booking?id='+$('#booking_id').val();
        },
        error: function () {
            toastr.error('An error occurred while saving the meeting.');
        },
        complete: function () {
            $('#confirm_time_meeting').html('<i class="far fa-calendar-plus"></i> Confirm This Date Now').prop('disabled', false);
        }
    });
});



     $('#change_date').click(function () {
       $('html, body').animate({ scrollTop: $('.meeting_date').offset().top - 5 }, 'slow');
     });

    function formatDate(dateString) {
        const options = { day: '2-digit', month: 'short', year: 'numeric' };
        const date = new Date(dateString);
        return date.toLocaleDateString('en-GB', options);
    }
});
