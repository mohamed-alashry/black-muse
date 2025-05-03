document.addEventListener("DOMContentLoaded", function () {
  const btn = document.getElementById("backToTopBtn");

  if (!btn) {
    console.error("Button not found!");
    return;
  }

  window.addEventListener("scroll", function () {
    if (window.scrollY > 300) {
      btn.style.display = "block";
    } else {
      btn.style.display = "none";
    }
  });

  btn.addEventListener("click", function () {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
});
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


var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab



function showTab(n) {
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";

    var nextBtn = document.getElementById("nextBtn");

    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }

    if (currentTab === $(".tab").length - 1) {
        nextBtn.innerHTML = "Submit";
        nextBtn.classList.add("submit");
        nextBtn.setAttribute("onclick", "submitFormWizard()");
    } else {
        nextBtn.innerHTML = "Next";
        nextBtn.classList.remove("submit");
        nextBtn.setAttribute("onclick", "nextPrev(1)");
    }

    fixStepIndicator(n);
}

function nextPrev(n) {
  var x = document.getElementsByClassName("tab");

  if (currentTab == x.length - 1 && n == 1) {
    return false; 
  }

  x[currentTab].style.display = "none";

  currentTab = currentTab + n;

  showTab(currentTab);
}




function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";

    if (n === 2) {
        $('#nextBtn').prop('disabled', true);
    } else {
        $('#nextBtn').prop('disabled', false);
    }
}


function submitFormWizard() {
  var form = document.getElementById('formWizard');
  var formData = new FormData(form);
  var actionUrl = form.getAttribute('action'); 

  $.ajax({
    url: actionUrl,
    method: 'POST',
    data: formData,
    processData: false,
    contentType: false,
     beforeSend: function () {
      $('.submit').prop('disabled', true).html(`
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending...`);
      $('.Msgs').html(""); 
     },
    complete: function () {
         $('.submit').prop('disabled', false).html(`Submit`);
      },
    success: function(response) {
      if (response.status === 'success') {
         window.location.href = response.redirect_url; 
        }else{
         $('.Msgs').html(`<p style="padding:15px" class="text-danger">`+response.message+ `</p>`); 
       }

      },
      error: function (xhr) {
       let errors = xhr.responseJSON.errors;
       let errorHtml = ``;
        $.each(errors, function (key, value) {
         errorHtml += `<div class="alert alert-danger">${value}</div>`;
       });
        errorHtml += ``;
        $('.Msgs').html(errorHtml);
      }
  });
}
