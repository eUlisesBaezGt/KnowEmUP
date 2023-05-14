google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    fetch('http://localhost/knowemup/test_front/index.php')
        .then(response => response.json())
        .then(data => {
            var data_table = new google.visualization.DataTable();
            data_table.addColumn('string', 'Semester');
            data_table.addColumn('number', 'Quantity');

            data.forEach(item => {
                data_table.addRow([item.semester, Number(item.count)]);
            });

            var piechart_options = {title: '¿De qué semestre son nuestros usuarios?', width: 400, height: 300};
            var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
            piechart.draw(data_table, piechart_options);
        })
        .catch(error => {
            console.log('An error occurred while fetching the JSON data.', error);
        });
}
