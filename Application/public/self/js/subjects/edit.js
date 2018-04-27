$(document).ready(function(){
$('.add-fields').each(function (index, el) {
    var warp = $(this);
    var target = $(this).data('af_target') || '.content';
    var index = $(target).children('div, tr').length;
    var baseEl = $($(this).data('af_base')) || $(target).find('.form-field-base');
    var base = baseEl.html();
    baseEl.remove();
    //alert(base);
    //warp.find(target).append(base.replace(/%index%/g, index));
    //index++;

    warp.on('click', '.add-form-field', function (e) {
        e.preventDefault();
        warp.find(target).append(base.replace(/%index%/g, index));
        index++;
    });

    warp.on('click', '.remove-form-field', function (e) {
        e.preventDefault();
        if (index > 1) {
            $(this).parents($(this).data('target') || '.form-group').remove();
            index--;
        }
    });

});
});