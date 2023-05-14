fetch('http://localhost/knowemup/test_front/index.php')
    .then(response => {
        if (!response.ok) {
            throw new Error("HTTP error " + response.status);
        }
        return response.json();
    })
    .then(data => {
        console.log(data);
        // Now you can use the data in your chart
        var dataTable = new google.visualization.DataTable();
        dataTable.addColumn('string', 'Semester');
        dataTable.addColumn('number', 'Quantity');

        data.forEach(row => {
            dataTable.addRow([row.semester, row.quantity]);
        });

        var piechart_options = {title: '¿De qué semestre son nuestros usuarios?', width: 400, height: 300};
        var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
        piechart.draw(dataTable, piechart_options);
    })
    .catch(function () {
        this.dataError = true;
    });
