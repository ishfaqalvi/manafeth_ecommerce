$(document).ready(function () {
  $('.shop-categories-slider').slick({
    infinite: false,
    arrows: true,
    speed: 300,
    slidesToShow: 8,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 6
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 3
        }
      }
    ]
  });

  $('.banner-img-slider').slick({
    infinite: false,
    arrows:true,
    dots:true,
    slidesToShow: 1,
    slidesToScroll: 1
  });

  $('.maintenance-card-slider-wrapper,.maintenance-request-details-slider').slick({
    infinite: false,
    arrows:true,
    dots:false,
    slidesToShow: 1,
    slidesToScroll: 1
  });
  
  $('.maintenance-request-details-slider').slick({
    infinite: false,
    arrows:true,
    dots:false,
    slidesToShow: 1,
    slidesToScroll: 1
  });

  // Quantity Selector Js 

  var buttonPlus = $(".qty-btn-plus");
  var buttonMinus = $(".qty-btn-minus");

  var incrementPlus = buttonPlus.click(function () {
    var $n = $(this)
      .parent(".qty-container")
      .find(".input-qty");
    $n.val(Number($n.val()) + 1);
  });

  var incrementMinus = buttonMinus.click(function () {
    var $n = $(this)
      .parent(".qty-container")
      .find(".input-qty");
    var amount = Number($n.val());
    if (amount > 0) {
      $n.val(amount - 1);
    }
  });

});

// List View Js
const listBtn = document.getElementById('list-btn');
const gridBtn = document.getElementById('grid-btn');
const productsContainer = document.querySelector('.products');

listBtn.addEventListener('click', function () {
  productsContainer.classList.remove('grid-view');
  productsContainer.classList.add('list-view');
  listBtn.classList.add('active');
  gridBtn.classList.remove('active');
});

gridBtn.addEventListener('click', function () {
  productsContainer.classList.remove('list-view');
  productsContainer.classList.add('grid-view');
  gridBtn.classList.add('active');
  listBtn.classList.remove('active');
});

$('.header-navbar-toggle-button').click(function () {
    $('.animated-icon2').toggleClass('open');
});


 // Initialize International Telephone Input
 var input = document.querySelector("#phone");
 var iti = window.intlTelInput(input, {
   utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   initialCountry: "us", // Set default country to United States
   separateDialCode: true,
   preferredCountries: ["us", "gb"]
 });
 
 // Update flag icon when the country is changed
 input.addEventListener("countrychange", function() {
   var countryCode = iti.getSelectedCountryData().iso2.toUpperCase();
   document.getElementById("flag-icon").className = "flag-icon flag-icon-" + countryCode;
 });