$('#js-circle-rotate').propeller({
  inertia: 0,
  speed: 300,
  step: 45,
  stepTransitionTime: 200,
  onRotate: function () {
    const degree = this.angle % 360;
    rotate(degree);
    highlightElement(degree);
  }
});

function rotate(degree) {
  $('.selected-reason-area').css({
    '-webkit-transform': 'rotate(' + degree + 'deg)',
    '-moz-transform': 'rotate(' + degree + 'deg)',
    '-ms-transform': 'rotate(' + degree + 'deg)',
    '-o-transform': 'rotate(' + degree + 'deg)',
    'transform': 'rotate(' + degree + 'deg)',
  });
}

function highlightElement( degree ) {
  const $oldSelected = $('.reason.selected');
  const $textSelector = $('#js-wheel-rotate-switch');
  switch (degree) {
    case -0:
    case 0:
      $oldSelected.removeClass('selected');
      $('.reason.deg270').addClass('selected');
      $textSelector.text(getText(1));
      break;
    case -(360 - 45): case 45:
      $oldSelected.removeClass('selected');
      $('.reason.deg315').addClass('selected');
      $textSelector.text(getText(2));
      break;
    case -(360 - 90): case 90:
      $oldSelected.removeClass('selected');
      $('.reason.start').addClass('selected');
      $textSelector.text(getText(3));
      break;
    case -(360 - 135): case 135:
      $oldSelected.removeClass('selected');
      $('.reason.deg45').addClass('selected');
      $textSelector.text(getText(4));
      break;
    case -(360 - 180): case 180:
      $oldSelected.removeClass('selected');
      $('.reason.deg90').addClass('selected');
      $textSelector.text(getText(5));
      break;
    case -(360 - 225): case 225:
      $oldSelected.removeClass('selected');
      $('.reason.deg135').addClass('selected');
      $textSelector.text(getText(6));
      break;
    case -(360 - 270): case 270:
      $oldSelected.removeClass('selected');
      $('.reason.deg180').addClass('selected');
      $textSelector.text(getText(7));
      break;
    case -(360 - 315): case 315:
      $oldSelected.removeClass('selected');
      $('.reason.deg225').addClass('selected');
      $textSelector.text(getText(8));
      break;
  }
}

function getText( number ) {
  switch (number) {
    case 1:
      return 'Random text 1';
    case 2:
      return 'Random text 2';
    case 3:
      return 'Random text 3';
    case 4:
      return 'Random text 4';
    case 5:
      return 'Random text 5';
    case 6:
      return 'Random text 6';
    case 7:
      return 'Random text 7';
    case 8:
      return 'Random text 8';
    default:
      return 'Random DEFAULT text';
  }
}