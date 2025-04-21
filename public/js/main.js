var mydir = $("html").attr("dir");
if (mydir === "rtl") {
  var rtlVal = true;
} else {
  var rtlVal = false;
}
$(document).ready(function () {
  $(".services-carousel").owlCarousel({
    rtl: rtlVal,
    margin: 20,
    loop: true,
    nav: true,
    responsiveClass: true,
    touchdrag: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 3,
      },
    },
  });
  $(".portfolio-carousel").owlCarousel({
    rtl: rtlVal,
    margin: 10,
    loop: true,
    dots: false,
    responsiveClass: true,
    touchdrag: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 3.5,
      },
    },
  });
});
document.addEventListener('DOMContentLoaded', function () {
  const calendarEl = document.getElementById('calendar');
  const calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    headerToolbar: {
      left: 'title',
      center: '',
      right: 'prev,next'
    },
    editable: true,
    selectable: true,
    select:((info=>{console.log(info.startStr);
    })),
    validRange:{
      start:  new Date(new Date().setDate(new Date().getDate() + 1))
    },
    events:false
    
  });

  calendar.render();
});
