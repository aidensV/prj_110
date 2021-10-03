$(document).ready(function () {
  window._token = $('meta[name="csrf-token"]').attr('content')

  ClassicEditor.create(document.querySelector('.ckeditor'))

  moment.updateLocale('en', {
    week: {dow: 1} // Monday is the first day of the week
  })

  $('.date').datetimepicker({
    format: 'YYYY-MM-DD',
    locale: 'en'
  })

  $('.datetime').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss',
    locale: 'en',
    sideBySide: true
  })

  $('.timepicker').datetimepicker({
    format: 'HH:mm:ss'
  })

  $('.select-all').click(function () {
    let $select2 = $(this).parent().siblings('.select2')
    $select2.find('option').prop('selected', 'selected')
    $select2.trigger('change')
  })
  $('.deselect-all').click(function () {
    let $select2 = $(this).parent().siblings('.select2')
    $select2.find('option').prop('selected', '')
    $select2.trigger('change')
  })

  $('.select2').select2()

  $('.treeview').each(function () {
    var shouldExpand = false
    $(this).find('li').each(function () {
      if ($(this).hasClass('active')) {
        shouldExpand = true
      }
    })
    if (shouldExpand) {
      $(this).addClass('active')
    }
  })

  $(".add_elemen_led").click(function(){
    var html = '';
    html += '<div class="row">'
    html += '<div class="col-6">'
    html += '<div class="form-group {{ $errors->has("bobot") ? "has-error" : "" }}">'    
    html += '<label for="bobot">Skor<span class="text-danger">*</span></label>'
    html += '<input type="text" id="bobot" name="bobot[]" class="form-control">'
    html += '<p class="helper-block">'
    html += ''
    html += '</p>'
    html += '</div>'
    html += '</div>'
    html += '<div class="col-5">'
    html += '<div class="form-group {{ $errors->has("deskripsi") ? "has-error" : "" }}">'    
    html += '<label for="deskripsi">Deskripsi<span class="text-danger">*</span></label>'
    html += '<input type="text" id="deskripsi" name="deskripsi[]" class="form-control">'
    html += '<p class="helper-block">'
    html += ''
    html += '</p>'
    html += '</div>'
    html += '</div>'
    html += '<div class="col-1">'
    html += '<div class="form-group {{ $errors->has("mata_kuliah") ? "has-error" : "" }}">'    
    html += '<label for="mata_kuliah">Hapus</span></label>'
    html += '<button id="remove" type="button" class="form-control btn btn-sm btn-danger">Hapus</buttoon>'
    html += '<p class="helper-block">'
    html += ''
    html += '</p>'
    html += '</div>'
    html += '</div>'
    html += '</div>'

    $('#div_5').append(html);
   });
   $(document).on('click', '#remove', function () {
    $(this).closest('.row').remove();
});
})
