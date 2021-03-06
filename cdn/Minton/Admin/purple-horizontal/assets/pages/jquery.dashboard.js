/**
 * Theme: Minton Admin Template
 * Author: Coderthemes
 * Component: Dashboard
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


    };


    DrawSparkline();

    var resizeChart;

    $(window).resize(function(e) {
        clearTimeout(resizeChart);
        resizeChart = setTimeout(function() {
            DrawSparkline();
        }, 300);
    });
});