
$(document).ready(function() {
	$('.orangeBox .title').click(function () {
		$(this).parent('div').find('.content').toggle();
	});
});
