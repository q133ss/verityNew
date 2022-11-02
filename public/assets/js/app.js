"use strict";

//| Slider Volunteer Banners

var volunteersSwiper = new Swiper('.volunteersSwiper', {
  effect: 'fade',
  navigation: {
    nextEl: '.banners__slider .swiper-controls .swiper-button-next',
    prevEl: '.banners__slider .swiper-controls .swiper-button-prev'
  }
});

//| Custom select Lang

$(function () {
  $('select.clang_select').each(function () {
    var $this = $(this);
    var html = '<div class="clang_select"><div class="clang_select-placeholder"><p>';
    html += $this.find('option:eq(0)').text();
    html += '</p>';
    html += '<img src="';
    html += $this.find('option:eq(0)').attr('data-icon');
    html += '" alt="icons" />';
    html += '</div><div class="clang_select-block display-n"><div class="clang_select-wrapper">';
    $this.find('option:eq(0)').css('display', 'none');
    $this.find('option').each(function () {
      html += '<button class="clang_select-element" data-val="' + $(this).attr('value') + '" type="button">' + '<p>' + $(this).text() + '</p>' + '<img src="' + $(this).attr('data-icon') + '" alt="icons" />' + '</button>';
    });
    html += '</div></div></div></div>';
    $(html).insertAfter($this.hide());
    $('.clang_select-element:eq(0)').addClass('clang_select-element-active');
    var $next = $this.next();
    $next.find('.clang_select-placeholder').on('click', function (e) {
      e.preventDefault();
      $next.find('.clang_select-block').toggleClass('display-n'), $next.toggleClass('clang_select-item-active');
    }).end().find('.clang_select-element').on('click', function (e) {
      e.preventDefault();
      $('.clang_select-element').removeClass('clang_select-element-active');
      $(this).addClass('clang_select-element-active');
      $next.find('.clang_select-placeholder').html($(this).html());
      $this.val($(this).data('val')).trigger('change');
      $next.find('.clang_select-placeholder').trigger('click');
    });
  });
  if ($('select.clang_select').hasClass('clang_select-white')) {
    $('div.clang_select').addClass('clang_select-white');
  }
});

//| Phone Mask

$(function () {
  $('#phone__mask').mask('+7 (999) 999-99-99');
});

//| Custom Select

$(function () {
  $('select.c_select').each(function () {
    var $this = $(this);
    var html = '<div class="c_select"><div class="c_select-placeholder">';
    html += $this.find('option:eq(0)').text();
    html += '</div><div class="c_select-block display-n"><div class="c_select-wrapper">';
    $this.find('option:eq(0)').css('display', 'none');
    $this.find('option').each(function () {
      html += '<button class="c_select-element" data-val="' + $(this).attr('value') + '" type="button">' + $(this).text() + '</button>';
    });
    html += '</div></div></div></div>';
    $(html).insertAfter($this.hide());
    $('.c_select-element[data-val="undefined"]').remove();
    var $next = $this.next();
    $next.find('.c_select-placeholder').on('click', function (e) {
      e.preventDefault();
      $next.find('.c_select-block').toggleClass('display-n'), $next.toggleClass('c_select-item-active');
    }).end().find('.c_select-element').on('click', function (e) {
      e.preventDefault();
      $('.c_select-element').removeClass('c_select-element-active');
      $(this).addClass('c_select-element-active');
      $next.find('.c_select-placeholder').text($(this).text());
      $this.val($(this).data('val')).trigger('change');
      $next.find('.c_select-placeholder').trigger('click');
    });
  });
});

//| Accordion

$('.accordion__block').on('click', function () {
  if ($(this).hasClass('active')) {
    $(this).removeClass('active');
  } else {
    $(this).addClass('active');
  }
});

//|  Pagination

var items = $('.contributors__list .contributors__item');
var numItems = items.length;
var perPage = 6;

// items.slice(perPage).hide()

// $('#pagination-controls').pagination({
// 	items: numItems,
// 	itemsOnPage: perPage,
// 	prevText: '&laquo;',
// 	nextText: '&raquo;',
// 	onPageClick: function (pageNumber) {
// 		var showFrom = perPage * (pageNumber - 1)
// 		var showTo = showFrom + perPage
// 		items.hide().slice(showFrom, showTo).show()
// 	}
// })

// Returns an array of maxLength (or less) page numbers
// where a 0 in the returned array denotes a gap in the series.
// Parameters:
//   totalPages:     total number of pages
//   page:           current page
//   maxLength:      maximum size of returned array
function getPageList(totalPages, page, maxLength) {
  if (maxLength < 5) throw 'maxLength must be at least 5';
  function range(start, end) {
    return Array.from(Array(end - start + 1), function (_, i) {
      return i + start;
    });
  }
  var sideWidth = maxLength < 9 ? 1 : 2;
  var leftWidth = maxLength - sideWidth * 2 - 3 >> 1;
  var rightWidth = maxLength - sideWidth * 2 - 2 >> 1;
  if (totalPages <= maxLength) {
    // no breaks in list
    return range(1, totalPages);
  }
  if (page <= maxLength - sideWidth - 1 - rightWidth) {
    // no break on left of page
    return range(1, maxLength - sideWidth - 1).concat([0]).concat(range(totalPages - sideWidth + 1, totalPages));
  }
  if (page >= totalPages - sideWidth - 1 - rightWidth) {
    // no break on right of page
    return range(1, sideWidth).concat([0]).concat(range(totalPages - sideWidth - 1 - rightWidth - leftWidth, totalPages));
  }
  // Breaks on both sides
  return range(1, sideWidth).concat([0]).concat(range(page - leftWidth, page + rightWidth)).concat([0]).concat(range(totalPages - sideWidth + 1, totalPages));
}
$(function () {
  // Number of items and limits the number of items per page
  var numberOfItems = $('.contributors__list  .contributors__item').length;
  var limitPerPage = 8;
  // Total pages rounded upwards
  var totalPages = Math.ceil(numberOfItems / limitPerPage);
  // Number of buttons at the top, not counting prev/next,
  // but including the dotted buttons.
  // Must be at least 5:
  var paginationSize = 7;
  var currentPage;
  function showPage(whichPage) {
    if (whichPage < 1 || whichPage > totalPages) return false;
    currentPage = whichPage;
    $('.contributors__list  .contributors__item').hide().slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage).show();
    // Replace the navigation items (not prev/next):
    $('#pagination-controls li').slice(1, -1).remove();
    getPageList(totalPages, currentPage, paginationSize).forEach(function (item) {
      $('<li>').addClass('page-item ' + (item ? 'current-page ' : '') + (item === currentPage ? 'active ' : '')).append($('<a>').addClass('page-link').attr({
        href: 'javascript:void(0)'
      }).text(item || '...')).insertBefore('#next-page');
    });
    return true;
  }

  // Include the prev/next buttons:
  $('#pagination-controls').append($('<li>').addClass('page-item').attr({
    id: 'previous-page'
  }).append($('<a>').addClass('page-link').attr({
    href: 'javascript:void(0)'
  }).text('')), $('<li>').addClass('page-item').attr({
    id: 'next-page'
  }).append($('<a>').addClass('page-link').attr({
    href: 'javascript:void(0)'
  }).text('')));
  // Show the page links
  $('.contributors__list ').show();
  showPage(1);

  // Use event delegation, as these items are recreated later
  $(document).on('click', '#pagination-controls li.current-page:not(.active)', function () {
    return showPage(+$(this).text());
  });
  $('#next-page').on('click', function () {
    return showPage(currentPage + 1);
  });
  $('#previous-page').on('click', function () {
    return showPage(currentPage - 1);
  });
  // $('#pagination-controls').on('click', function () {
  // 	$('html,body').animate({ scrollTop: 0 }, 0)
  // })
});

//| Modal Thx

$('#buttonModalThxOpen').on('click', function (e) {
  $('#modalThx').removeClass('display-n');
  $('body').style('overflow', 'hidden');
});
$('#buttonModalThxClose').on('click', function (e) {
  $('#modalThx').addClass('display-n');
  $('body').style('overflow', 'visible');
});
$('#modalThx').on('mouseup', function (e) {
  var div = $('.modal-thx__wrapper ');
  if (!div.is(e.target) && div.has(e.target).length === 0) {
    $('#modalThx').addClass('display-n');
    $('body').css('overflow', 'visible');
  }
})

// overflow: hidden;
// overflow: visible;
;