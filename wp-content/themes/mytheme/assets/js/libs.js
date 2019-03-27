$('.checkbox').click(function () {
    if ($(this).is(':checked')) {
        $('.c-form__btn').removeAttr('disabled');
    } else {
        $('.c-form__btn').attr('disabled', 'disabled');
    }
  });