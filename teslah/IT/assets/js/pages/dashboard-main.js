'use strict';
$(document).ready(function() {
    setTimeout(function() {
        floatchart()
    }, 100);
});

function floatchart() {
    // [ support-chart ] start
    $(function() {
        var options1 = {
            chart: {
                type: 'area',
                height: 80,
                sparkline: {
                    enabled: true
                }
            },
            colors: ["#4680ff"],
            stroke: {
                curve: 'smooth',
                width: 2,
            },
            series: [{
                data: [89, 20, 10, 45, 30, 55, 20, 30, 60]
            }],
            tooltip: {
                fixed: {
                    enabled: false
                },
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function(seriesName) {
                            return 'Ticket '
                        }
                    }
                },
                marker: {
                    show: false
                }
            }
        }
        new ApexCharts(document.querySelector("#support-chart"), options1).render();
    });
    // [ support-chart ] end
    // [ support-chart1 ] start
    $(function() {
        var options1 = {
            chart: {
                type: 'area',
                height: 80,
                sparkline: {
                    enabled: true
                }
            },
            colors: ["#9ccc65"],
            stroke: {
                curve: 'smooth',
                width: 2,
            },
            series: [{
                data: [0, 20, 10, 45, 30, 55, 20, 30, 0]
            }],
            tooltip: {
                fixed: {
                    enabled: false
                },
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function(seriesName) {
                            return 'Ticket '
                        }
                    }
                },
                marker: {
                    show: false
                }
            }
        }
        new ApexCharts(document.querySelector("#support-chart1"), options1).render();
    });

    $(function() {
        var options = {
            chart: {
                type: 'line',
                height: 75,
                sparkline: {
                    enabled: true
                }
            },
            dataLabels: {
                enabled: false
            },
            colors: ["#ff5252"],
            stroke: {
                curve: 'smooth',
                width: 3,
            },
            series: [{
                name: 'series1',
                data: [55, 35, 75, 50, 90, 50]
            }],
            yaxis: {
                min: 10,
                max: 100,
            },
            tooltip: {
                theme: 'dark',
                fixed: {
                    enabled: false
                },
                x: {
                    show: false,
                },
                y: {
                    title: {
                        formatter: function(seriesName) {
                            return 'Cases'
                        }
                    }
                },
                marker: {
                    show: false
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#power-card-chart1"), options);
        chart.render();
    });

    $(function() {
        var options = {
            chart: {
                type: 'line',
                height: 75,
                sparkline: {
                    enabled: true
                }
            },
            dataLabels: {
                enabled: false
            },
            colors: ["#ffba57"],
            stroke: {
                curve: 'smooth',
                width: 3,
            },
            series: [{
                name: 'series1',
                data: [55, 35, 75, 50, 90, 50]
            }],
            yaxis: {
                min: 10,
                max: 100,
            },
            tooltip: {
                theme: 'dark',
                fixed: {
                    enabled: false
                },
                x: {
                    show: false,
                },
                y: {
                    title: {
                        formatter: function(seriesName) {
                            return 'Logs'
                        }
                    }
                },
                marker: {
                    show: false
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#power-card-chart3"), options);
        chart.render();
    });

    $(function() {
        var options = {
            chart: {
                type: 'area',
                height: 40,
                sparkline: {
                    enabled: true
                }
            },
            dataLabels: {
                enabled: false
            },
            colors: ["#4680ff"],
            fill: {
                type: 'solid',
                opacity: 0.3,
            },
            markers: {
                size: 2,
                opacity: 0.9,
                colors: "#4680ff",
                strokeColor: "#4680ff",
                strokeWidth: 2,
                hover: {
                    size: 4,
                }
            },
            stroke: {
                curve: 'straight',
                width: 3,
            },
            series: [{
                name: 'series1',
                data: [99, 766, 441, 389, 263, 225, 544, 112, 236, 520, 354, 825, 199]
            }],
            tooltip: {
                fixed: {
                    enabled: false
                },
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function(seriesName) {
                            return 'Visitors :'
                        }
                    }
                },
                marker: {
                    show: false
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#seo-chart1"), options);
        chart.render();
    });
    // [ seo-chart1 ] end
    // [ seo-chart2 ] start
    $(function() {
        var options = {
            chart: {
                type: 'bar',
                height: 40,
                sparkline: {
                    enabled: true
                }
            },
            dataLabels: {
                enabled: false
            },
            colors: ["#9ccc65"],
            plotOptions: {
                bar: {
                    columnWidth: '60%'
                }
            },
            series: [{
                data: [0.01, 0.2, 0.02, 0.5, 0.8, 0.0, 0.7, 0.01, 0.02, 0.1, 0.19, 0.21, 0.32, 0.5, 0.08, 0.0]
            }],
            xaxis: {
                crosshairs: {
                    width: 1
                },
            },
            tooltip: {
                fixed: {
                    enabled: false
                },
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function(seriesName) {
                            return 'Down Rate :'
                        }
                    }
                },
                marker: {
                    show: false
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#seo-chart2"), options);
        chart.render();
    });
    // [ seo-chart2 ] end
    // [ seo-chart3 ] start
    $(function() {
        var options = {
            chart: {
                type: 'area',
                height: 40,
                sparkline: {
                    enabled: true
                }
            },
            dataLabels: {
                enabled: false
            },
            colors: ["#ff5252"],
            fill: {
                type: 'solid',
                opacity: 0,
            },
            markers: {
                size: 2,
                opacity: 0.9,
                colors: "#ff5252",
                strokeColor: "#ff5252",
                strokeWidth: 2,
                hover: {
                    size: 4,
                }
            },
            stroke: {
                curve: 'straight',
                width: 3,
            },
            series: [{
                name: 'series1',
                data: [9, 66, 41, 89, 63, 25, 44, 12, 36, 20, 54, 25, 9]
            }],
            tooltip: {
                fixed: {
                    enabled: false
                },
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function(seriesName) {
                            return 'Cars :'
                        }
                    }
                },
                marker: {
                    show: false
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#seo-chart3"), options);
        chart.render();
    });
    // [ seo-chart3 ] end
}
