function copyToClipboard(str) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(str).select();
    document.execCommand("copy");
    $temp.remove();
}

function copyElemToClipboard(element) {
	element = $(element)
    copyToClipboard(element.text())
    var copy = $("<span style='color: blue'>&nbsp;Copied</span>")
    element.append(copy)
    copy.animate({"color": "transparent"},1000,'swing',
    		function () {
    			copy.remove()
    		}
    	);
}