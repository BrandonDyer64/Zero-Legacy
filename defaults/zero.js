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
    var copy = $("<span style='color: blue;width:0px;margin:0px;font-size:1em;height:1.5em;padding:0px;'>&nbsp;Copied</span>")
    element.append(copy)
    copy.animate({"width":"50"},1000,'swing',
        function() {
            copy.animate({"color": "transparent"},1000,'swing',
                function() {
                    copy.animate({"width": "0px"},1000,'swing',
                        function () {
                            copy.remove()
                        }
                    );
                }
            );
        }
    );
}