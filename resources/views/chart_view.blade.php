<!DOCTYPE html>
<html>
<head>
	<script src=//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js charset=utf-8></script>
<script src=//cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js charset=utf-8></script>
<script src=//cdn.jsdelivr.net/npm/fusioncharts@3.12.2/fusioncharts.js charset=utf-8></script>
<script src=//cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
</head>
 <body>
	<script>
		Chart.Scale.prototype.buildYLabels = function () {
		  this.xLabelHeight = 0;
		};
	</script>
  <div>{!! $chart->container() !!}</div>

 {!! $chart->script() !!}
 </body>
</html>