<?php

function get_avgnew($statsdata) {

    if (is_array($statsdata)) {
                    
        $options = array(
        	'chartid' => 'chartavgnew',
          	'title' => 'Новые/возвратившиеся за 5 дней',
          	'title_x' => 'Тип',
          	'title_y' => 'Проценты',
          	'width' => '750px',
          	'height' => '300px'
        );
          
        foreach ($statsdata as $row) {
            $avg[] = $row->statdata;
        }

        $chartdata[0]['title'] = 'Новые';
        $chartdata[0]['value'] = round(array_sum($avg)/count($avg), 1);
        $chartdata[1]['title'] = 'Возвратившиеся';
        $chartdata[1]['value'] = 100 - $chartdata[0]['value']; 

        return get_piechart($chartdata, $options);

    }
    else {

        return '<p>Ошибка: Нет данных или они неправильные.</p>';

    }

}

function get_views($statsdata) {

      if (is_array($statsdata)) {
                    
        $options = array(
          	'chartid' => 'chartviews',
          	'title' => 'Просмотры за 5 дней',
          	'title_x' => 'Дата',
          	'title_y' => 'Просмотры',
          	'width' => '750px',
          	'height' => '300px'
        );

        $i = 0;

        foreach ($statsdata as $row) {
          	$chartdata[$i]['asix_x'] = mdate('%d.%m.%Y', $row->datetime);
         	$chartdata[$i]['asix_y'] = $row->statdata;
         	$i++;
        }

        return get_columnchart($chartdata, $options);

      }
      else {

        return '<p>Ошибка: Нет данных или они неправильные.</p>';

      }

}

function get_visitors($statsdata) {

      if (is_array($statsdata)) {

        $options = array(
          	'chartid' => 'visitorschart',
          	'title' => 'Визиты за 5 дней',
          	'title_x' => 'Дата',
          	'title_y' => 'Визиты',
          	'width' => '750px',
          	'height' => '300px'
        );

        $i = 0;

        foreach ($statsdata as $row) {
          	$chartdata[$i]['asix_x'] = mdate('%d.%m.%Y', $row->datetime);
          	$chartdata[$i]['asix_y'] = $row->statdata;
          	$i++;
        }

        return get_curvechart($chartdata, $options);

      }
      else {

    	return '<p>Ошибка: Нет данных или они неправильные.</p>';

      }

}

function get_piechart($chartdata, $options) {
  
  	$output = "<script type=\"text/javascript\">
    google.charts.setOnLoadCallback(".$options['chartid'].");
      
        function ".$options['chartid']."() {

          var data = google.visualization.arrayToDataTable([
              ['".$options['title_x']."', '".$options['title_y']."'],";

              foreach ($chartdata as $value) {
                $output .= "['".$value['title']."', ".$value['value']."],";
              }

    $output .= "]);";

    $output .= "var options = {
        title: '".$options['title']."',
        titleTextStyle: { color: '#cfd2da', bold: true },
        pieHole: 0.4,
        backgroundColor: '#252830',
        legend: { textStyle: { color: '#cfd2da' } }
        };";

    $output .= "var chart = new google.visualization.PieChart(document.getElementById('".$options['chartid']."'));
          chart.draw(data, options);}";

    $output .= "</script><div id='".$options['chartid']."' style='width: ".$options['width']."; height: ".$options['height'].";'></div>";

    return $output;

}

function get_columnchart($chartdata, $options) {
  
  	$output = "<script type=\"text/javascript\">
    google.charts.setOnLoadCallback(".$options['chartid'].");
      
        function ".$options['chartid']."() {

          var data = google.visualization.arrayToDataTable([
              ['".$options['title_x']."', '".$options['title_y']."', { role: 'style' }],";

              foreach ($chartdata as $value) {
                $output .= "['".$value['asix_x']."', ".$value['asix_y'].", '#1ca8dd'],";
              }

    $output .= "]);";

    $output .= "var options = {
        title: '".$options['title']."',
          titleTextStyle: { color: '#cfd2da', bold: true },
          backgroundColor: '#252830',
        bar: {groupWidth: '50%'},
        legend: { position: 'none' },
        hAxis: {
          textStyle:{ color: '#cfd2da' }
        },
        vAxis: {
          textStyle: { color: '#cfd2da' }
        }
      	};";

    $output .= "var chart = new google.visualization.ColumnChart(document.getElementById('".$options['chartid']."'));
        chart.draw(data, options);}";

    $output .= "</script><div id='".$options['chartid']."' style='width: ".$options['width']."; height: ".$options['height'].";'></div>";

        return $output;

}

function get_curvechart($chartdata, $options) {
  
  	$output = "<script type=\"text/javascript\">
    google.charts.setOnLoadCallback(".$options['chartid'].");
      
        function ".$options['chartid']."() {

          var data = google.visualization.arrayToDataTable([
              ['".$options['title_x']."', '".$options['title_y']."'],";

              foreach ($chartdata as $value) {
                $output .= "['". $value['asix_x']."', ".$value['asix_y']."],";
              }

    $output .= "]);";

    $output .= "var options = {
          title: '".$options['title']."',
          titleTextStyle: { color: '#cfd2da', bold: true },
          backgroundColor: '#252830',
          legend: { position: 'none' },
          hAxis: {
            textStyle:{ color: '#cfd2da' }
          },
          vAxis: {
            textStyle: { color: '#cfd2da' }
          }
        };";

    $output .= "var chart = new google.visualization.LineChart(document.getElementById('".$options['chartid']."'));
          chart.draw(data, options);}";

    $output .= "</script><div id='".$options['chartid']."' style='width: ".$options['width']."; height: ".$options['height'].";'></div>";

        return $output;

}