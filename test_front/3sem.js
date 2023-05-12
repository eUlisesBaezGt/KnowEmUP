fetch('http://localhost/knowemup/test_front/ggraphs.php')
    .then(response => response.json())
    .then(data => {
        // Now you can use the data in your chart
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Semester');
        data.addColumn('number', 'Quantity');
        data.addRows(data);

        var piechart_options = {title: '¿De qué semestre son nuestros usuarios?', width: 400, height: 300};
        var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
        piechart.draw(data, piechart_options);

        /*var barchart_options = {title:'Barchart: How Much Pizza I Ate Last Night', width:400, height:300, legend: 'none'};
        var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
        barchart.draw(data, barchart_options);*/
    });
