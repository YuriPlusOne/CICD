jQuery(document).ready(function() {

	jQuery('a[href="'+window.location.pathname+'"]').parent('li').addClass('active');

	google.charts.load('current', { 'packages': ['corechart'] });

});