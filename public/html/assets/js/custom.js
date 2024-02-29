$(document).ready(function () {
  $('.shop-categories-slider').slick({
    centerMode: false,
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
