/**
 * Theme: Minton Admin Template
 * Author: Coderthemes
 * Component: Sparkline Chart
 *
 */
$( document ).ready(function() {

    var DrawSparkline = function() {
            $('#sparkline1').sparkline([0, 23, 43, 35, 44, 45, 56, 37, 40], {
                type: 'line',
                width:'100%',
                height: '200',
                chartRangeMax: 50,
                lineColor: '#7266ba',
                fillColor: 'rgba(114,102,186, 0.3)',
                highlightLineColor: 'rgba(0,0,0,.1)',
                highlightSpotColor: 'rgba(0,0,0,.2)'
            });

            $('#sparkline1').sparkline([25, 23, 26, 24, 25, 32, 30, 24, 19], {
                type: 'line',
                width:'100%',
                height: '200',
                chartRangeMax: 40,
                lineColor: '#f76397',
                fillColor: 'rgba(247, 99, 151, 0.3)',
                composite: true,
                highlightLineColor: 'rgba(0,0,0,.1)',
                highlightSpotColor: 'rgba(0,0,0,.2)'
            });

            $('#sparkline2').sparkline([3, 6, 7, 8, 6, 4, 7, 10, 12, 7, 4, 9, 12, 13, 11, 12], {
                type: 'bar',
                height: '200',
                barWidth: '10',
                barSpacing: '5',
                barColor: '#7266ba'
            });

            $('#sparkline3').sparkline([20, 40, 30, 10], {
                type: 'pie',
                width: '200',
                height: '200',
                sliceColors: ['#dcdcdc', '#f76397', '#7266ba', '#797979']
            });

            $('#sparkline4').sparkline([0, 23, 43, 35, 44, 45, 56, 37, 40], {
                type: 'line',
                width:'100%',
                height: '165',
                chartRangeMax: 50,
                lineColor: '#3bafda',
                fillColor: 'transparent',
                highlightLineColor: 'rgba(0,0,0,.1)',
                highlightSpotColor: 'rgba(0,0,0,.2)'
            });

            $('#sparkline4').sparkline([25, 23, 26, 24, 25, 32, 30, 24, 19], {
                type: 'line',
                width:'100%',
                height: '165',
                chartRangeMax: 40,
                lineColor: '#5d9cec',
                fillColor: 'transparent',
                composite: true,
                highlightLineColor: 'rgba(0,0,0,1)',
                highlightSpotColor: 'rgba(0,0,0,1)'
            });

            $('#sparkline6').sparkline([3, 6, 7, 8, 6, 4, 7, 10, 12, 7, 4, 9, 12, 13, 11, 12], {
                type: 'bar',
                height: '165',
                barWidth: '10',
                barSpacing: '3',
                barColor: '#f76397'
            });

            $('#sparkline6').sparkline([3, 6, 7, 8, 6, 4, 7, 10, 12, 7, 4, 9, 12, 13, 11, 12], {
                type: 'line',
                width:'100%',
                height: '165',
                lineColor: '#f76397',
                fillColor: 'transparent',
                composite: true,
                highlightLineColor: 'rgba(0,0,0,.1)',
                highlightSpotColor: 'rgba(0,0,0,.2)'
            });


        },
        DrawMouseSpeed = function () {
            var mrefreshinterval = 500; // update display every 500ms
            var lastmousex=-1;
            var lastmousey=-1;
            var lastmousetime;
            var mousetravel = 0;
            var mpoints = [];
            var mpoints_max = 30;
            $('html').mousemove(function(e) {
                var mousex = e.pageX;
                var mousey = e.pageY;
                if (lastmousex > -1) {
                    mousetravel += Math.max( Math.abs(mousex-lastmousex), Math.abs(mousey-lastmousey) );
                }
                lastmousex = mousex;
                lastmousey = mousey;
            });
            var mdraw = function() {
                var md = new Date();
                var timenow = md.getTime();
                if (lastmousetime && lastmousetime!=timenow) {
                    var pps = Math.round(mousetravel / (timenow - lastmousetime) * 1000);
                    mpoints.push(pps);
                    if (mpoints.length > mpoints_max)
                        mpoints.splice(0,1);
                    mousetravel = 0;
                    $('#sparkline5').sparkline(mpoints, {
                        tooltipSuffix: ' pixels per second',
                        type: 'line',
                        width:'100%',
                        height: '165',
                        chartRangeMax: 50,
                        lineColor: '#7266ba',
                        fillColor: 'rgba(114,102,186,0.3)',
                        highlightLineColor: 'rgba(114,102,186,.1)',
                        highlightSpotColor: 'rgba(114,102,186,.2)'
                    });
                }
                lastmousetime = timenow;
                setTimeout(mdraw, mrefreshinterval);
            }
            // We could use setInterval instead, but I prefer to do it this way
            setTimeout(mdraw, mrefreshinterval);
        };

    DrawSparkline();
    DrawMouseSpeed();

    var resizeChart;

    $(window).resize(function(e) {
        clearTimeout(resizeChart);
        resizeChart = setTimeout(function() {
            DrawSparkline();
            DrawMouseSpeed();
        }, 300);
    });
});