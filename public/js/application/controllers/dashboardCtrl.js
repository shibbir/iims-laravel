"use strict";

(function(app) {
    app.controller("dashboardCtrl", ["$scope", "apiService", "notifierService", function($scope, apiService, notifierService) {
        var highChartsPie = function (target, plotData) {
            Highcharts.getOptions().colors = $.map(Highcharts.getOptions().colors, function(color) {
                return {
                    radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
                    stops: [
                        [0, color],
                        [1, Highcharts.Color(color).brighten(-0.3).get('rgb')]
                    ]
                };
            });

            var chart = new Highcharts.Chart({
                chart: {
                    renderTo: target,
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: ''
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage}%</b>',
                    percentageDecimals: 1
                },
                credits: {
                    enabled: false
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: '#000000',
                            formatter: function() {
                                return '<b>'+ this.point.name +'</b>: '+ this.y +' pics';
                            }
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Total Item',
                    data: plotData
                }]
            });
        };
        var highchartsInvoiceByYear = function (year, data, target) {
            var chart;
            $(function() {
                chart = new Highcharts.Chart({
                    chart: {
                        renderTo: target,
                        type: 'column',
                        margin: [ 50, 50, 100, 80]
                    },
                    title: {
                        text: 'Total invoice made in ' + year
                    },
                    xAxis: {
                        categories: [
                            'January', 'February', 'March', 'April', 'May', 'June',
                            'July', 'August', 'September', 'October', 'november', 'December'
                        ],
                        labels: {
                            rotation: -45,
                            align: 'right',
                            style: {
                                fontSize: '13px',
                                fontFamily: 'Verdana, sans-serif'
                            }
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Number of Invoices'
                        }
                    },
                    credits: {
                        enabled: false
                    },
                    legend: {
                        enabled: false
                    },
                    tooltip: {
                        formatter: function() {
                            return '<b>' + this.x  + '</b><br />' + 'Total invoice(s) made: ' + this.y;
                        }
                    },
                    series: [{
                        name: 'Population',
                        data: [
                            data.january, data.february, data.march, data.april, data.may, data.june,
                            data.july, data.august, data.september, data.october, data.november, data.december
                        ],
                        dataLabels: {
                            enabled: true,
                            rotation: -90,
                            color: '#FFFFFF',
                            align: 'right',
                            x: -3,
                            y: 10,
                            formatter: function() {
                                return this.y;
                            },
                            style: {
                                fontSize: '13px',
                                fontFamily: 'Verdana, sans-serif'
                            }
                        }
                    }]
                });
            });
        };
        $scope.getOrganization = function() {
            apiService.get("/organizations/1").then(function(result) {
                $scope.organization = result.data;
            });
        }();
        $scope.getInventoryChartData = function() {
            var data = [
                ["Miscellaneous", 19],
                ["Processor", 27],
                ["Motherboard", 7],
                ["Monitor", 2],
                ["Memory (RAM)", 9],
                ["Speaker", 5]
            ];
            highChartsPie("inventory-chart", data);
        }();
        $scope.renderInvoiceByYear = function () {
            var data = {
                "january": 0,
                "february": 0,
                "march": 3,
                "april": 0,
                "may": 0,
                "june": 2,
                "july": 0,
                "august": 0,
                "september": 0,
                "october": 0,
                "november": 0,
                "december":0
            };
            highchartsInvoiceByYear(2013, data, "invoice-chart");
        }();
        $scope.updateOrganization = function() {
            apiService.patch("/organizations/" + $scope.organization.id, $("form[name=OrganizationEditForm]").serialize()).success(function() {
                notifierService.notifySuccess("Record updated successfully.");
            }).error(function() {
                notifierService.notifyError("Something happened");
            });
        };
    }]);
})(_app);