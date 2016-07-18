<div id="example" style="padding-left: 10%">
    <div class="demo-section k-content">
        <div id="chart"></div>
    </div>
    <script>
        function createChart() {
            $("#chart").kendoChart({
                title: {
                    text: "{{ $message }} {{ $year }}"
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
                series: [{
                    name: "Total $ Pedidos",
                    data: [   

                    @foreach($repos as $repo)
                      {{ $repo->total }},
                    @endforeach
                        ],
                        color: "#ff0000"
                }],
                valueAxis: {
                    line: {
                        visible: false
                    },
                    axisCrossingValue: -10
                },
                categoryAxis: {
                    categories: [
                        @foreach($repos as $repo)
                            '{{ $repo->nombre }}',
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