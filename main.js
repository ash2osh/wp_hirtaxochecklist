(function ($) {
    'use strict';
    $(function () {
        var checkslists = HTCVAR.checkslists; //outputs the site url without last /
//thanks goes to https://ryansechrest.com/2013/03/automatically-check-parent-checkbox-if-child-is-selected-in-wordpress/
        $(checkslists).find('input').each(function (index, input) {
            $(input).bind('change', function () {
                var checkbox = $(this);
                var is_checked = $(checkbox).is(':checked');
                if (is_checked) {
                    $(checkbox).parents('li').children('label').children('input').attr('checked', 'checked'); //check parent when child is checked
                    $(checkbox).parent().parent().children().find('input').attr('checked', 'checked');
                    ;//check all childs when paren is checked
                } else {
                    $(checkbox).parentsUntil('ul').find('input').removeAttr('checked');
                }
            });
        });
        
    }); //end  $(function () {


})(jQuery);
