<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // Load Charts and the corechart and barchart packages.
        google.charts.load('current', {'packages': ['corechart']});

        // Draw the pie chart and bar chart when Charts is loaded.
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Semester');
            data.addColumn('number', 'Quantity');
            data.addRows([
                ['1st', 1],
                ['2nd', 2],
                ['3rd', 1],
                ['4th', 4],
                ['5th', 2],
                ['6th', 4],
                ['7th', 1],
                ['8th', 1]
            ]);

            var piechart_options = {
                title: 'Â¿De quÃ© semestre son nuestros usuarios?',
                width: 400,
                height: 300
            };
            var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
            piechart.draw(data, piechart_options);

            var barchart_options = {
                title: 'Barchart: How Much Pizza I Ate Last Night',
                width: 400,
                height: 300,
                legend: 'none'
            };
            var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
            barchart.draw(data, barchart_options);
        }
    </script>
</head>
<body>
<!--Table and divs that hold the pie charts-->
<table class="columns">
    <tr>
        <td>
            <div id="piechart_div" style="border: 1px solid #ccc"></div>
        </td>
        <td>
            <div id="barchart_div" style="border: 1px solid #ccc"></div>
        </td>
    </tr>
</table>
</body>
</html>
<script>
    (function () {
        var ws = new WebSocket('ws://' + window.location.host +
            '/jb-server-page?reloadMode=RELOAD_ON_SAVE&' +
            'referrer=' + encodeURIComponent(window.location.pathname));
        ws.onmessage = function (msg) {
            if (msg.data === 'reload') {
                window.location.reload();
            }
            if (msg.data.startsWith('update-css ')) {
                var messageId = msg.data.substring(11);
                var links = document.getElementsByTagName('link');
                for (var i = 0; i < links.length; i++) {
                    var link = links[i];
                    if (link.rel !== 'stylesheet') continue;
                    var clonedLink = link.cloneNode(true);
                    var newHref = link.href.replace(/(&|\?)jbUpdateLinksId=\d+/, "$1jbUpdateLinksId=" + messageId);
                    if (newHref !== link.href) {
                        clonedLink.href = newHref;
                    } else {
                        var indexOfQuest = newHref.indexOf('?');
                        if (indexOfQuest >= 0) {
                            // to support ?foo#hash
                            clonedLink.href = newHref.substring(0, indexOfQuest + 1) + 'jbUpdateLinksId=' + messageId + '&' +
                                newHref.substring(indexOfQuest + 1);
                        } else {
                            clonedLink.href += '?' + 'jbUpdateLinksId=' + messageId;
                        }
                    }
                    link.replaceWith(clonedLink);
                }
            }
        };
    })();
</script>