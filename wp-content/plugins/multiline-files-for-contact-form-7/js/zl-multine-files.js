jQuery(document).ready(function($) {
    $('#mfcf7_zl_add_file').on('click tap', function() {
      var zl_filecontainer = '#mfcf7_zl_multifilecontainer';
        var dname = $(zl_filecontainer).append($('#mfcf7_zl_multifilecontainer span.mfcf7-zl-multiline-sample').html());
        $(zl_filecontainer + ' p.wpcf7-form-control-wrap:last').hide();

        $(zl_filecontainer + ' p.wpcf7-form-control-wrap:last input').on('change',function(e) {

            var files = $(this)[0].files;
            for (var i = 0; i < files.length; i++) {
              $(zl_filecontainer + ' p.wpcf7-form-control-wrap:last span.mfcf7-zl-multifile-name').append(files[i].name + "&nbsp;");
            }
            $(zl_filecontainer + ' p.wpcf7-form-control-wrap:last').show();
            $(zl_filecontainer + ' p.wpcf7-form-control-wrap:last input').hide();
            $(zl_filecontainer + ' p.wpcf7-form-control-wrap:last .mfcf7-zl-multifile-name').show();
			$(zl_filecontainer + ' p.wpcf7-form-control-wrap:last a.mfcf7_zl_delete_file').show();
        });
		$(zl_filecontainer + ' p.wpcf7-form-control-wrap:last a.mfcf7_zl_delete_file').hide();
		var fname = $(zl_filecontainer + ' p.wpcf7-form-control-wrap:last').find('input').trigger('click');
        $(zl_filecontainer + ' p.wpcf7-form-control-wrap:last input').hide();
        $('.mfcf7_zl_delete_file').on('click', function() {
            var get_parent = $(this).parent().remove();
        });
        document.addEventListener('wpcf7mailsent', function(event) {
            jQuery(zl_filecontainer + '>p').remove();
        });

        //to avoid bad request error in safari when it has empty file input https://stackoverflow.com/questions/49614091/safari-11-1-ajax-xhr-form-submission-fails-when-inputtype-file-is-empty
        $('.wpcf7-form').submit(function() {
            //your code here
            var inputs = $('.wpcf7-form input[type="file"]:not([disabled])');
            inputs.each(function(_, input) {
              if (input.files.length > 0) return
              $(input).prop('disabled', true);
            })
        });
        document.addEventListener( 'wpcf7submit', function( event ) {
            var inputs = $('.wpcf7-form input[type="file"][disabled]');
            inputs.each(function(_, input) {
              $(input).prop('disabled', false);
            })
        }, false );
    });
});