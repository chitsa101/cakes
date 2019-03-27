var swiper = new Swiper('.swiper-container', {
  loop: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true
  }
});

$('.e-btn-mobile').click(function() {
  $(".p-header-mobile__nav").toggleClass("u-show");
});

// var navToggle = document.querySelector('.e-btn-mobile');
// var navMain = document.querySelector('.p-header-mobile__nav');

// navToggle.addEventListener('click', function() {
//   if (navMain.classList.contains('p-header-mobile__nav--closed')) {
//     navMain.classList.remove('p-header-mobile__nav--closed');
//     navMain.classList.add('p-header-mobile__nav--open');
//   } else {
//     navMain.classList.remove('p-header-mobile__nav--open');
//     navMain.classList.add('p-header-mobile__nav--closed');
//   }
// });

if($('#hh').length) {
var waypoint = new Waypoint({
  element: document.getElementById('hh'),
  handler: function(direction) {
    $('#hh').addClass('is-animate');
  },
  offset: 400
});
}

$('.checkbox').click(function () {
  $(".c-form__btn").toggleClass("u-opacity");
  if ($(this).is(':checked')) {
      $('.c-form__btn').removeAttr('disabled');
  } else {
      $('.c-form__btn').attr('disabled', 'disabled');
  }
});

$('body').on('click', '.c-cakes-mini__desc', function(e){
  var target = $(this).attr('data-target');
  $(".page").addClass("u-blur");
  $(target).removeClass("u-hidden");
  $("body").css("overflow", "hidden");
});

$('body').on('click', '.p-modal', function(e){
  // console.log(e.target);
  if($(e.target).is('.p-modal')){
    $(".page").removeClass("u-blur");
    $(".p-modal").addClass("u-hidden");
    $("body").css("overflow", "auto");
  }
});

$('.p-sidebar__mobile').click(function() {
  $(".p-sidebar__nav").toggleClass("u-show");
  $('.e-btn-side').toggleClass('e-btn-side--up');
});

// //form
// $('form').on('submit', function(e){
// 	e.preventDefault();
// 	var form = $(this).serializeArray();
// 	// console.log(form);
// 	$.post (
// 		myajax.url,
// 		{
// 			form: form,
// 			action: 'order'
// 		},
// 		function(data) {
// 			console.log(data);
// 			for (var i = 0; i < $('form').length; i++) {
// 				$('form')[i].reset();
// 			}
// 			alert('Ваше сообщение отправлено!');
// 			// $('.modal-layout').removeClass('show');
// 			// $('body').css('overflow','visible');
// 		}
// 	)
// });

 
$('[data-target="feedback"]').on('submit', function(e){ 
  e.preventDefault(); 
  var form = $(this).serializeArray(); 
  $('button').attr('disabled', true);
  $.post( 
    myajax.url, { 
      form: form, 
      action: 'form_otk' 
    }, 
    function(data){ 
      alert(data); 
      $('button').attr('disabled', false);
      $(".page").removeClass("u-blur");
      $(".p-modal").addClass("u-hidden");
      $("body").css("overflow", "auto");
      $('.reset').val('');
    } 
  ) 
});


