<div id="example" style="padding-left: 10%">
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
                    @foreach($repo as $rep)
                    {
                        name: "{{ substr ( $rep[0]->fecha ,5, 10 ) }}",
                        data: [
                        @foreach (range(0, 9) as $i)
                          {{ $rep[$i]->total }},
                        @endforeach
                              ]
                    },
                    @endforeach],
                valueAxis: {
                    line: {
                        visible: false
                    },
                    axisCrossingValue: -10
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
                    format: "{0}%",
                    template: "#= series.name #: #= value #"
                }
            });
        }

        $(document).ready(createChart);
        $(document).bind("kendo:skinChange", createChart);
    </script>
</div>