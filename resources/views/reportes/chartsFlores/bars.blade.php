	
<div id="example">
    <div class="demo-section k-content">
        <div id="chart"></div>
    </div>
    <script>
        function createChart() {
            $("#chart").kendoChart({
                title: {
                    text: "Comparativa de ventas"
                },
                legend: {
                    position: "top"
                },
                seriesDefaults: {
                    type: "column"
                },
                chartArea: {
                    width: 900,
                    height: 400
                },
                series: [
                    @foreach($repo as $rep)
                    {
	                    name: "{{ substr ( $rep[0]->fecha ,5, 10 ) }}",
	                    data: [
	                    @foreach (range(0, 9) as $i)
	                      {{ $rep[$i]->total }},
	                    @endforeach
	                      	  ]
                	},
                    @endforeach
                        ],
                valueAxis: {
                    line: {
                        visible: false
                    },
                    minorGridLines: {
                        visible: true
                    }
                },
                categoryAxis: {
                    categories: [
                        @foreach (range(2004, 2013) as $i)
                            '{{ $i }}',
                        @endforeach
                    ],
                    majorGridLines: {
                        visible: false
                    }
                },
                tooltip: {
                    visible: true,
                    template: "#= series.name #: #= value #"
                }
            });
        }

        $(document).ready(createChart);
        $(document).bind("kendo:skinChange", createChart);
    </script>
</div>
