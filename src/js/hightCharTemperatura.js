chartCPU = new Highcharts.StockChart({
	chart: {
		renderTo: 'graficaTemp'
	},
	rangeSelector: {
		enable: false
	},
	title: {
		text: 'Temperaturas'
	},
	yAxis: {
		title: {
			text: 'Temperatura',
			margin: 10
		}
	},
	xAxis: {
		minPadding: 0.2,
   		maxPadding: 0.2,
  		title: {
          	text: 'Hora',
          	margin: 10
    	}
	},
	series: [{
		name: 'Temperatura',
		data: (function() {
			var data = [];
					
			<?php
				for($i = 0; $i < count($arrayTemperaturas); $i++){
			?>

			data.push([<?php echo $arrayTiempo[$i] ?>,<?php echo $arrayTemperaturas[$i] ?>]);

			<?php } ?>

			return data;
		})()
	}],
	credits: false
});
