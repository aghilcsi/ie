(function ($) {
    "use strict";

    // //Team chart
    // var ctx = document.getElementById("team-chart");
    // ctx.height = 150;
    // var myChart = new Chart(ctx, {
    //     type: 'line',
    //     data: {
    //         labels: ["2010", "2011", "2012", "2013", "2014", "2015", "2016"],
    //         type: 'line',
    //         defaultFontFamily: 'Montserrat',
    //         datasets: [{
    //             data: [0, 7, 3, 5, 2, 10, 7],
    //             label: "Expense",
    //             backgroundColor: 'rgba(0,103,255,.15)',
    //             borderColor: 'rgba(0,103,255,0.5)',
    //             borderWidth: 3.5,
    //             pointStyle: 'circle',
    //             pointRadius: 5,
    //             pointBorderColor: 'transparent',
    //             pointBackgroundColor: 'rgba(0,103,255,0.5)',
    //         },]
    //     },
    //     options: {
    //         responsive: true,
    //         tooltips: {
    //             mode: 'index',
    //             titleFontSize: 12,
    //             titleFontColor: '#000',
    //             bodyFontColor: '#000',
    //             backgroundColor: '#fff',
    //             titleFontFamily: 'Montserrat',
    //             bodyFontFamily: 'Montserrat',
    //             cornerRadius: 3,
    //             intersect: false,
    //         },
    //         legend: {
    //             display: false,
    //             position: 'top',
    //             labels: {
    //                 usePointStyle: true,
    //                 fontFamily: 'Montserrat',
    //             },
    //
    //
    //         },
    //         scales: {
    //             xAxes: [{
    //                 display: true,
    //                 gridLines: {
    //                     display: false,
    //                     drawBorder: false
    //                 },
    //                 scaleLabel: {
    //                     display: false,
    //                     labelString: 'Month'
    //                 }
    //             }],
    //             yAxes: [{
    //                 display: true,
    //                 gridLines: {
    //                     display: false,
    //                     drawBorder: false
    //                 },
    //                 scaleLabel: {
    //                     display: true,
    //                     labelString: 'Value'
    //                 }
    //             }]
    //         },
    //         title: {
    //             display: false,
    //         }
    //     }
    // });


    //Sales chart
    var ctx = document.getElementById("sales-chart");
    let val = document.getElementById("registered_users").innerHTML;
    val = val.split(',');
    ctx.height = 150;
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['-31','30-','29-','28-','27-','26-','25-','24-','23-','22-','21-','20-','19-','18-','17-','16-','15-','14-','13-','12-','11-','10-','9-','8-','7-','6-','5-','4-','3-','2-','دیروز', 'امروز'],
            type: 'line',
            defaultFontFamily: 'Montserrat',
            datasets: [{
                label: "نفرات",
                data: [val[30],val[29],val[28],val[31],val[27],val[26],val[25],val[24],val[23],val[22],val[21],val[20],val[19],val[18],val[17],val[16],val[15],val[14],val[13],val[12],val[11],val[10],val[9],val[8],val[7],val[6],val[5],val[4],val[3],val[2],val[1],val[0]],
                backgroundColor: 'transparent',
                borderColor: 'rgba(40,167,69,0.75)',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 3,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(40,167,69,0.75)',
            }]
        },
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                titleFontSize: 8,
                titleFontColor: '#000',
                bodyFontColor: '#000',
                backgroundColor: '#fff',
                titleFontFamily: 'Montserrat',
                bodyFontFamily: 'Montserrat',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: false,
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Montserrat',
                },
            },
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: true,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'نفرات'
                    }
                }]
            },
            title: {
                display: false,
                text: 'Normal Legend'
            }
        }
    });

    var ctx = document.getElementById("sales-chart1");
    let val1 = document.getElementById("com_rate").innerHTML;
    val1 = val1.split(',');
    ctx.height = 150;
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['-31','30-','29-','28-','27-','26-','25-','24-','23-','22-','21-','20-','19-','18-','17-','16-','15-','14-','13-','12-','11-','10-','9-','8-','7-','6-','5-','4-','3-','2-','دیروز', 'امروز'],
            type: 'line',
            defaultFontFamily: 'Montserrat',
            datasets: [{
                label: "تعداد",
                data: [val1[30],val1[29],val1[28],val1[31],val1[27],val1[26],val1[25],val1[24],val1[23],val1[22],val1[21],val1[20],val1[19],val1[18],val1[17],val1[16],val1[15],val1[14],val1[13],val1[12],val1[11],val1[10],val1[9],val1[8],val1[7],val1[6],val1[5],val1[4],val1[3],val1[2],val1[1],val1[0]],
                backgroundColor: 'transparent',
                borderColor: 'rgba(139,71,167,0.75)',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 3,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(139,71,167,0.75)',
            }]
        },
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                titleFontSize: 8,
                titleFontColor: '#000',
                bodyFontColor: '#000',
                backgroundColor: '#fff',
                titleFontFamily: 'Montserrat',
                bodyFontFamily: 'Montserrat',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: false,
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Montserrat',
                },
            },
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: true,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'تعداد'
                    }
                }]
            },
            title: {
                display: false,
                text: 'Normal Legend'
            }
        }
    });

    // //line chart
    // var ctx = document.getElementById("lineChart");
    // ctx.height = 150;
    // var myChart = new Chart(ctx, {
    //     type: 'line',
    //     data: {
    //         labels: ["January", "February", "March", "April", "May", "June", "July"],
    //         datasets: [
    //             {
    //                 label: "My First dataset",
    //                 borderColor: "rgba(0,0,0,.09)",
    //                 borderWidth: "1",
    //                 backgroundColor: "rgba(0,0,0,.07)",
    //                 data: [22, 44, 67, 43, 76, 45, 12]
    //             },
    //             {
    //                 label: "My Second dataset",
    //                 borderColor: "rgba(0, 123, 255, 0.9)",
    //                 borderWidth: "1",
    //                 backgroundColor: "rgba(0, 123, 255, 0.5)",
    //                 pointHighlightStroke: "rgba(26,179,148,1)",
    //                 data: [16, 32, 18, 26, 42, 33, 44]
    //             }
    //         ]
    //     },
    //     options: {
    //         responsive: true,
    //         tooltips: {
    //             mode: 'index',
    //             intersect: false
    //         },
    //         hover: {
    //             mode: 'nearest',
    //             intersect: true
    //         }
    //
    //     }
    // });
    //
    //
    // //bar chart
    // var ctx = document.getElementById("barChart");
    // //    ctx.height = 200;
    // var myChart = new Chart(ctx, {
    //     type: 'bar',
    //     data: {
    //         labels: ["January", "February", "March", "April", "May", "June", "July"],
    //         datasets: [
    //             {
    //                 label: "My First dataset",
    //                 data: [65, 59, 80, 81, 56, 55, 40],
    //                 borderColor: "rgba(0, 123, 255, 0.9)",
    //                 borderWidth: "0",
    //                 backgroundColor: "rgba(0, 123, 255, 0.5)"
    //             },
    //             {
    //                 label: "My Second dataset",
    //                 data: [28, 48, 40, 19, 86, 27, 90],
    //                 borderColor: "rgba(0,0,0,0.09)",
    //                 borderWidth: "0",
    //                 backgroundColor: "rgba(0,0,0,0.07)"
    //             }
    //         ]
    //     },
    //     options: {
    //         scales: {
    //             yAxes: [{
    //                 ticks: {
    //                     beginAtZero: true
    //                 }
    //             }]
    //         }
    //     }
    // });
    //
    // //radar chart
    // var ctx = document.getElementById("radarChart");
    // ctx.height = 160;
    // var myChart = new Chart(ctx, {
    //     type: 'radar',
    //     data: {
    //         labels: [["Eating", "Dinner"], ["Drinking", "Water"], "Sleeping", ["Designing", "Graphics"], "Coding", "Cycling", "Running"],
    //         datasets: [
    //             {
    //                 label: "My First dataset",
    //                 data: [65, 59, 66, 45, 56, 55, 40],
    //                 borderColor: "rgba(0, 123, 255, 0.6)",
    //                 borderWidth: "1",
    //                 backgroundColor: "rgba(0, 123, 255, 0.4)"
    //             },
    //             {
    //                 label: "My Second dataset",
    //                 data: [28, 12, 40, 19, 63, 27, 87],
    //                 borderColor: "rgba(0, 123, 255, 0.7",
    //                 borderWidth: "1",
    //                 backgroundColor: "rgba(0, 123, 255, 0.5)"
    //             }
    //         ]
    //     },
    //     options: {
    //         legend: {
    //             position: 'top'
    //         },
    //         scale: {
    //             ticks: {
    //                 beginAtZero: true
    //             }
    //         }
    //     }
    // });
    //
    //
    // //pie chart
    // var ctx = document.getElementById("pieChart");
    // ctx.height = 300;
    // var myChart = new Chart(ctx, {
    //     type: 'pie',
    //     data: {
    //         datasets: [{
    //             data: [45, 25, 20, 10],
    //             backgroundColor: [
    //                 "rgba(0, 123, 255,0.9)",
    //                 "rgba(0, 123, 255,0.7)",
    //                 "rgba(0, 123, 255,0.5)",
    //                 "rgba(0,0,0,0.07)"
    //             ],
    //             hoverBackgroundColor: [
    //                 "rgba(0, 123, 255,0.9)",
    //                 "rgba(0, 123, 255,0.7)",
    //                 "rgba(0, 123, 255,0.5)",
    //                 "rgba(0,0,0,0.07)"
    //             ]
    //
    //         }],
    //         labels: [
    //             "green",
    //             "green",
    //             "green"
    //         ]
    //     },
    //     options: {
    //         responsive: true
    //     }
    // });
    //
    // //doughut chart
    // var ctx = document.getElementById("doughutChart");
    // ctx.height = 150;
    // var myChart = new Chart(ctx, {
    //     type: 'doughnut',
    //     data: {
    //         datasets: [{
    //             data: [45, 25, 20, 10],
    //             backgroundColor: [
    //                 "rgba(0, 123, 255,0.9)",
    //                 "rgba(0, 123, 255,0.7)",
    //                 "rgba(0, 123, 255,0.5)",
    //                 "rgba(0,0,0,0.07)"
    //             ],
    //             hoverBackgroundColor: [
    //                 "rgba(0, 123, 255,0.9)",
    //                 "rgba(0, 123, 255,0.7)",
    //                 "rgba(0, 123, 255,0.5)",
    //                 "rgba(0,0,0,0.07)"
    //             ]
    //
    //         }],
    //         labels: [
    //             "green",
    //             "green",
    //             "green",
    //             "green"
    //         ]
    //     },
    //     options: {
    //         responsive: true
    //     }
    // });
    //
    // //polar chart
    // var ctx = document.getElementById("polarChart");
    // ctx.height = 150;
    // var myChart = new Chart(ctx, {
    //     type: 'polarArea',
    //     data: {
    //         datasets: [{
    //             data: [15, 18, 9, 6, 19],
    //             backgroundColor: [
    //                 "rgba(0, 123, 255,0.9)",
    //                 "rgba(0, 123, 255,0.8)",
    //                 "rgba(0, 123, 255,0.7)",
    //                 "rgba(0,0,0,0.2)",
    //                 "rgba(0, 123, 255,0.5)"
    //             ]
    //
    //         }],
    //         labels: [
    //             "green",
    //             "green",
    //             "green",
    //             "green"
    //         ]
    //     },
    //     options: {
    //         responsive: true
    //     }
    // });
    //
    // // single bar chart
    // var ctx = document.getElementById("singelBarChart");
    // ctx.height = 150;
    // var myChart = new Chart(ctx, {
    //     type: 'bar',
    //     data: {
    //         labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
    //         datasets: [
    //             {
    //                 label: "My First dataset",
    //                 data: [40, 55, 75, 81, 56, 55, 40],
    //                 borderColor: "rgba(0, 123, 255, 0.9)",
    //                 borderWidth: "0",
    //                 backgroundColor: "rgba(0, 123, 255, 0.5)"
    //             }
    //         ]
    //     },
    //     options: {
    //         scales: {
    //             yAxes: [{
    //                 ticks: {
    //                     beginAtZero: true
    //                 }
    //             }]
    //         }
    //     }
    // });


})(jQuery);