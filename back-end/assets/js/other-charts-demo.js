/*global $ */
//Sparklines Charts
$('#linechart').sparkline([[1, 3], [2, 6], [3, 5], [4, 10], [5, 8], [6, 7], [7, 9], [8, 11], [9, 12], [10, 8], [11, 5], [12, 7], [13, 4]], {
    width: '100%',
    height: '200px'
});

$('.inline-sparkline').each(function () {
    "use strict";
    $(this).sparkline('html', $(this).data());
});
//End Sparklines Chart

//Knob Charts
$(function () {
    "use strict";
    $(".dial").knob();
});
//End Knob Charts