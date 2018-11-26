$(document).ready(function(){
	$("#tablaTemperatura").hide();

	$("#mostrarTabla").click(function(){
		$("#TablaShow").toggle();
		$("#tablaTemperatura").toggle("slow");
	});

	/*$("#ocultarTabla").click(function(){
		$("#tablaTemperatura").hide();
	});*/

	$("#tablaTemperatura").table_scroll({
    	fixedColumnsLeft: 3,
    	fixedColumnsRight: 1,
    	columnsInScrollableArea: 3,
    	scrollX: 5,
    	scrollY: 10
	});

});