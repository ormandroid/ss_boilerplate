;(function($) {
    $(document).ready(function(){

        /*---------------------------------------------*\
            Gallery
        \*---------------------------------------------*/

        var modal = '#galleryModal',
            modalDialog = '.modal-dialog',
            imgTarget = '#galleryImage';

        $('.gallery-modal').on('click', function(e){
            e.preventDefault();
            var img = $(this).data('img'),
                width = $(this).data('width');
            $(imgTarget).attr('src', img);
            $(modalDialog, modal).css({'max-width': width});
            $(modal).modal('show');
            return false;
        });

    });
})(jQuery);