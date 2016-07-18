<div id="example">
    <div class="demo-section k-content">
        <div id="chart"></div>
    </div>
    <script>
        function createChart() {
            $("#chart").kendoChart({
                title: {
                    position: "bottom",
                    text: "{{ $message }} {{ $year }}" 
                },
                legend: {
                    visible: false
                },
                chartArea: {
                    background: ""
                },
                seriesDefaults: {
                    labels: {
                        visible: true,
                        background: "transparent",
                        template: "#= category #: \n #= value#%"
                    }
                },
                series: [{
                    type: "pie",
                    startAngle: 150,
                    data: [{
                        category: "{{ $repos[0]->nombre }}",
                        value: {{ $repos[0]->total }},
                        color: "#9de219"
                    },{
                        category: "{{ $repos[1]->nombre }}",
                        value: {{ $repos[1]->total }},
                        color: "#90cc38"
                    },{
                        category: "{{ $repos[2]->nombre}} ",
                        value: {{ $repos[2]->total }},
                        color: "#068c35"
                    },{
                        category: "{{ $repos[3]->nombre}} ",
                        value: {{ $repos[3]->total }},
                        color: "#006634"
                    },{
                        category: "{{ $repos[4]->nombre}} ",
                        value: {{ $repos[4]->total }},
                        color: "#004d38"
                    },{
                        category: "{{ $repos[5]->nombre}} ",
                        value: {{ $repos[5]->total }},
                        color: "#033939"
                    },{
                        category: "{{ $repos[6]->nombre}} ",
                        value: {{ $repos[6]->total }},
                        color: "#aa0000"
                    },{
                        category: "{{ $repos[7]->nombre}} ",
                        value: {{ $repos[7]->total }},
                        color: "#bb0000"
                    },{
                        category: "{{ $repos[8]->nombre}} ",
                        value: {{ $repos[8]->total }},
                        color: "#cc3939"
                    },{
                        category: "{{ $repos[9]->nombre}} ",
                        value: {{ $repos[9]->total }},
                        color: "#dd3939"
                    },{
                        category: "{{ $repos[10]->nombre}} ",
                        value: {{ $repos[10]->total }},
                        color: "#ee3939"
                    },{
                        category: "{{ $repos[11]->nombre}} ",
                        value: {{ $repos[11]->total }},
                        color: "#ff3939"
                    }]
                }],
                tooltip: {
                    visible: true,
                    format: "{0}"
                }
            });
        }

        $(document).ready(createChart);
        $(document).bind("kendo:skinChange", createChart);
    </script>
</div>