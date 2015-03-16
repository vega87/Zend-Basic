$(document).ready(function () {
    $('.footable').footable();
});

$('#tab-1').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
})
$('#tab-2').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
})
$('#tab-3').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
})

