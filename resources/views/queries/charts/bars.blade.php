
    <div id="example">
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
                    position: "top"
                },
                seriesDefaults: {
                    type: "column"
                },
                chartArea: {
                    width: 900,
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
                    minorGridLines: {
                        visible: true
                    }
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
                    template: "#= series.name #: #= value #"
                }
            });
        }

        $(document).ready(createChart);
        $(document).bind("kendo:skinChange", createChart);
    </script>
</div>
