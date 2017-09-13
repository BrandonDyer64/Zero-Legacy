
var timer;

$( "#button" ).click(function() {
	$("#button").addClass('btn-success').removeClass('btn-danger shake-horizontal');
	window.clearTimeout(timer);
	timer = window.setTimeout(function(){$("#button").addClass('btn-danger shake-horizontal').removeClass('btn-success');},5000)
});




















