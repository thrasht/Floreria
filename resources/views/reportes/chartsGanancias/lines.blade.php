<div id="example" style="padding-left: 10%">
    <div class="demo-section k-content">
        <div id="chart"></div>
    </div>
    <script>
        function createChart() {
            $("#chart").kendoChart({
                title: {
                    text: "Comparativa anual de ganancias"
                },
                legend: {
                    position: "bottom"
                },
                chartArea: {
                    background: ""
                },
                seriesDefaults: {
                    type: "line",
                    style: "smooth"
                },
                chartArea: {
                    width: 700,
                    height: 400
                },
                series: [
                    @foreach(range(0, 9) as $i)
                    {
                        name: "{{ substr ( $repos[$i][0]->fecha ,0, 4 ) }}",
                        data: [
                        @foreach (range(0, 11) as $j)
                          {{ $repos[$i][$j]->total - $repos2[$i][$j]->total }},
                        @endforeach
                              ]
                    },
                    @endforeach
                    ],
                valueAxis: {
                    line: {
                        visible: false
                    },
                    axisCrossingValue: -10
                },
                categoryAxis: {
                    categories: [
                        @foreach (range(1, 12) as $i)
                            '{{ $i }}',
                        @endforeach
                    ],
                    majorGridLines: {
                        visible: false
                    }
                },
                tooltip: {
                    visible: true,
                    format: "{0}%",
                    template: "#= series.name #: #= value #"
                }
            });
        }

        $(document).ready(createChart);
        $(document).bind("kendo:skinChange", createChart);
    </script>
</div>