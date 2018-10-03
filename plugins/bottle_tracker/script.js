
function dateTimeNow() {
	//return dateFormat(new Date(), 'yyyy-mm-dd HH:MM:ss')
	var d = new Date()
	function f(i) {
		if (i < 10)
			return '0' + i
		return i
	}
	return d.getFullYear() + '-' + f(d.getMonth()) + '-' + f(d.getDate()) + ' ' + f(d.getHours()) + ':' + f(d.getMinutes()) + ':' + f(d.getSeconds())
}

function dateNow() {
	//return dateFormat(new Date(), 'yyyy-mm-dd HH:MM:ss')
	var d = new Date()
	function f(i) {
		if (i < 10)
			return '0' + i
		return i
	}
	return d.getFullYear() + '-' + f(d.getMonth()) + '-' + f(d.getDate())
}

$(function() {
	var timer
	var start_time = new Date().getTime() / 60000; // In minutes
	var last_time = start_time
	var hour = 1
	var tenMI = 0 // Ten Minute Interval (5 minutes)
	var tenMITotal = 0
	$( "#button" ).click(function() {
		// Make the button green
		$("#button").addClass('btn-success').removeClass('btn-danger shake-horizontal');
		element = $('#button')
	    copyToClipboard(element.text())
	    var copy = $("<span style='color: white;font-size:0.5em;' class='glyphicon glyphicon-ok'>&nbsp;&nbsp;&nbsp;&nbsp;</span>")
	    element.append(copy)
	    copy.animate({"color": "transparent","width":"0px"},3000,'swing',
    		function () {
    			copy.remove()
    		}
    	);
		// Set timer
		window.clearTimeout(timer);
		var delay = parseInt($('#delay').val())
		timer = window.setTimeout(function(){$("#button").addClass('btn-danger shake-horizontal').removeClass('btn-success')}, delay * 1000)
		// Calculate Total Bottles
		var bottles_per = parseInt($('#bottles_per').val())
		var total = (parseInt($('#total').text()) + bottles_per)
		tenMITotal += bottles_per
		// Calculate Bottles per Minute
		var current_time = new Date().getTime() / 60000; // In minutes
		var time_from_start = current_time - start_time
		var bpm = Math.round((total / time_from_start) * 10) / 10
		var benchmark = Math.round(bottles_per * (60 / delay))
		// Set the feedback readouts
		$('#bpm_bench').text(benchmark)
		$('#total').text(total)
		var bpm_style
		if (bpm > bottles_per * 1.5) {
			bpm_style = 'success'
		} else if (bpm < bottles_per * 0.5) {
			bpm_style = 'danger shake-horizontal'
		} else if (bpm < bottles_per * 1) {
			bpm_style = 'danger'
		} else {
			bpm_style = 'warning'
		}
		if (total < bottles_per * 4) {
			bpm = '?'
			bpm_style = 'default'
		}
		$('#bpm').html('<span class="label label-' + bpm_style + '">' + bpm + '</span>')
		// Add bars at bottom
		var delta_time = current_time - last_time
		var dist = Math.floor((delta_time * 120) / delay)
		var hour_style = ''
		if (time_from_start / 60 > hour) {
			hour++
			hour_style = 'border-color: white; border-width: 2px;'
			alert('Fill out bottling sheet')
		}
		if (bottling_record_id == 0) {
			$.post('?p=add&t=bottling_record&api',{
				'-submit': true,
				'bottling_date': dateNow()
			}, function(data){
				console.log(data)
				data = JSON.parse(data)
				bottling_record_id = data[0].id
			})
		}
		if (time_from_start / 5 > tenMI) {
			tenMI++
			$.post('?p=add&t=bottling_snapshot',{
				'-submit': true,
				'snap_time': dateTimeNow(),
				'bottling_record': bottling_record_id,
				'bottles': tenMITotal
			})
			tenMITotal = 0
			hour_style = 'border-color: lightgreen;'
		}
		$('#progress_bar').append('<div style="width: ' + dist + 'px;' + hour_style + '"></div>')
		// Set time
		last_time = current_time
	})
})


















