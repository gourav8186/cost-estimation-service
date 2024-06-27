$(document).ready(function () {
  $('.dropify').dropify();
});

$(document).on('click', '#menu', function () {
  $('.menuBar').toggleClass('showMenu');
});
$(document).on('click', '#notify', function () {
  $('.notifyBar').toggleClass('showNotify');
});

$(function () {
  $("#notify").on('click', function () {
    $(".notifyBar").addClass("showNotify");
  })
  $("#notify, body").on('click', function () {
    $(".notifyBar").removeClass("showNotify");
  })
  $(".notifyBar").on('click', function (e) {
    e.stopPropagation();
  })
});

$(document).on('click', '.tab-links', function () {
  $(this).find('.megaNav').slideToggle('medium');
  $(this).siblings().find('.megaNav').slideUp('medium');
  $(this).find('.fa-angle-right').toggleClass('downArrow');
  $(this).siblings().find('.fa-angle-right').removeClass('downArrow');
});

$(document).on('click', '#sideHAm', function () {
  $('.sidePanel').toggleClass('showSidepanel');
  $('.sideHam').toggleClass('openMenu');
});

// Add mobile Company popup 
$(function () {
  $(".popBox").on('click', function () {
    $(".addonBox").addClass("showPBox");
  })
  $(".hideLogin,.addonBox").on('click', function () {
    $(".addonBox").removeClass("showPBox");
  })
  $(".pBox").on('click', function (e) {
    e.stopPropagation();
  })
});

// Side bar Toggle 
$(function () {
  $("#hamBurger").click(function () {
      $('.sideHam').toggleClass('openMenu');
      $('.sidePanel').toggleClass('showSidepanel');
  })
  $("#bgParent").click(function () {
      $('.sideHam').removeClass('openMenu');
      $('.menu').removeClass('sideShow');
  })
  $(".menu").click(function (e) {
      e.stopPropagation();
  })
});

// Add mobile Company popup 
$(function () {
  $(".register").on('click', function () {
    $(".bgDarkside").addClass("bgShow");
  })
  $(".bgDarkside,.close").on('click', function () {
    $(".bgDarkside").removeClass("bgShow");
    $('#registerForm').trigger('reset');
  })
  $(".mainBox").on('click', function (e) {
    e.stopPropagation();
  })
});