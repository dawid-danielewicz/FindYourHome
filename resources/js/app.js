$(function(){
    $(".autocomplete").autocomplete({
        source: base_url + "/searchAdverts",
        minLength: 2,
        select: function (event, ui) {

        }
    });
});
