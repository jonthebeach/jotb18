/* On load events */
$(window).on("load", function () {
  if ($('.wysiwyg').length > 0) {
    $('.wysiwyg').each(function (i, e) {
      CKEDITOR.replace($(e).attr('id')).config.allowedContent = true;
    })
  }

  // Make the items of a list sortable
  if ($('#sortable').length > 0) {
    var sortList = function (event, ui) {
      var order = '';
      $('#sortable li').each(function (index, element) {
        order += (order == '' ? '' : '|') + $(element).data('id');
      });
      $("#order").val(order);
      // I add the changed class to the item to make it visible with CSS
      if (ui) {
        $(ui.item).addClass('changed');
      }
    };

    $("#sortable").sortable({
      create: sortList,
      update: sortList
    }).disableSelection();
  }

  // Time picker
  if ($('.timepicker').length > 0) {
    $('.timepicker').each(function (i, e) {
      $(e).timepicker({
        showMeridian: false,
        minuteStep: 5
      });
    })
  }
});