
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div id="chart_div" style="width: 900px; height: 500px;"></div>

<script>
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawStacked);

    function drawStacked() {
        var data = google.visualization.arrayToDataTable([
            ['Results', 'Category', { role: 'style' }],
            ['Communication', 5, '#bbebee'],            // RGB value
            ['Coordination', 10, '#c8eeab'],            // English color name
            ['Joint activity', 20, '#e9cbee']
        ]);

        var options = {
            title: 'Questionnaire results',
            chartArea: {width: '50%'},
            isStacked: true,
            hAxis: {
                title: 'Results',
                ticks: [0, 5, 10, 15, 20, 25]
            },
            vAxis: {
                title: 'Category'
            }
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
