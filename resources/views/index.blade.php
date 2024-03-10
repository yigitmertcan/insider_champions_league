<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Insider Champions League</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/css/lineicons.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="/assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="/assets/css/main.css" />
  </head>
  <body>
    <!-- ======== Preloader =========== -->
    <div id="preloader">
      <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- ========== header start ========== -->

      <!-- ========== section start ========== -->
      <section class="section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="title">
                  <h2>Insider Champions League</h2>
                </div>
              </div>
            </div>
            <!-- end row -->
          </div>


          <!-- End Row -->
          <div class="row">

            <!-- End Col -->
            <div class="col-lg-5">
              <div class="card-style mb-30">
                <div class="title d-flex flex-wrap justify-content-between align-items-center">
                  <div class="left">
                    <h6 class="text-medium mb-30">League Table</h6>
                  </div>
                  <div class="right">

                  </div>
                </div>
                <!-- End Title -->
                <div class="table-responsive">
                  <table id="playalltable" class="table top-selling-table">
                    <thead>
                      <tr>
                        <th>
                          <h6 class="text-sm text-small">Teams</h6>
                        </th>
                          <th>
                          <h6 class="text-sm text-small">Pts</h6>
                        </th>
                          <th>
                          <h6 class="text-sm text-small">W</h6>
                        </th>
                          <th>
                          <h6 class="text-sm text-small">D</h6>
                        </th>
                          <th>
                          <h6 class="text-sm text-small">L</h6>
                        </th>
                          <th>
                              <h6 class="text-sm text-small">P</h6>
                          </th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($clubs as $i)
                        <tr>
                            <td>
                                <div class="product">
                                    <p class="text-sm">{{$i}}</p>
                                </div>
                            </td>
                            <td>
                                <p class="text-sm">0</p>
                            </td>
                            <td>
                                <p class="text-sm">0</p>
                            </td>
                            <td>
                                <p class="text-sm">0</p>
                            </td>
                            <td>
                                <p class="text-sm">0</p>
                            </td>
                            <td>
                                <p class="text-sm">0</p>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                  </table>
                  <!-- End Table -->
                </div>
                  <div class="title d-flex flex-wrap justify-content-between align-items-center">
                      <div class="left">
                          <button id="playall" class="btn btn-primary" type="submit">Play All</button>
                      </div>
                      <div class="right">
                          <button id="nextweek" class="btn btn-success" type="submit" disabled>Next Week</button>
                      </div>
                  </div>
              </div>
            </div>

              <div class="col-lg-4">
                  <div class="card-style mb-30">
                      <div class="title d-flex flex-wrap justify-content-between align-items-center">
                          <div class="left">
                              <h6 class="text-medium mb-30">Match Results</h6>
                          </div>
                          <div class="right">

                          </div>
                      </div>
                      <div class="title d-flex flex-wrap justify-content-between align-items-center">
                          <div class="text-center">
                              <h6 class="text-medium">1th Week Match Results</h6>
                          </div>
                      </div>
                      <!-- End Title -->
                      <div class="table-responsive">
                          <table id="nextweektable" class="table top-selling-table">
                              <thead>
                              <tr>
                                  <th  class="min-width">
                                  </th>
                                  <th>
                                  </th>
                                  <th  class="min-width">
                                  </th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($weekCheck as $w)
                                  <tr>
                                      <td>
                                          <p class="text-sm">{{$w['ev_sahibi']}}</p>
                                      </td>
                                      <td>
                                          <p class="text-sm"> - </p>
                                      </td>
                                      <td>
                                          <p class="text-sm">{{$w['misafir']}}</p>
                                      </td>
                                  </tr>
                              @endforeach

                              </tbody>
                          </table>
                          <!-- End Table -->
                      </div>

                  </div>
              </div>

            <div class="col-lg-3">
                      <div class="card-style mb-30">
                          <div class="title d-flex flex-wrap align-items-center justify-content-between">
                              <div class="left">
                                  <h6 class="text-medium mb-30">Predictions</h6>
                              </div>
                              <div class="right">
                              </div>
                          </div>
                          <!-- End Title -->
                          <div class="chart">
                              <canvas id="Chart2" style="width: 100%; height: 400px; margin-left: -45px;"></canvas>
                          </div>
                          <!-- End Chart -->
                      </div>
                  </div>

            <!-- End Col -->
          </div>


        </div>

        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->


    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/Chart.min.js"></script>
    <script src="/assets/js/dynamic-pie-chart.js"></script>
    <script src="/assets/js/moment.min.js"></script>
    <script src="/assets/js/fullcalendar.js"></script>
    <script src="/assets/js/jvectormap.min.js"></script>
    <script src="/assets/js/world-merc.js"></script>
    <script src="/assets/js/polyfill.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        let match_week = 1;

        $("#playall").click(function(){
            console.log("denedme");
            $("#nextweek").prop('disabled', false);
            $("#playall").prop('disabled', true);
            $.getJSON("/api/play-all/"+match_week, function(result){
                $("#playalltable").empty();
                $("#nextweektable").empty();


                $("#playalltable").append(`
                             <tr>
                        <th>
                          <h6 class="text-sm text-small">Teams</h6>
                        </th>
                          <th>
                          <h6 class="text-sm text-small">Pts</h6>
                        </th>
                          <th>
                          <h6 class="text-sm text-small">W</h6>
                        </th>
                          <th>
                          <h6 class="text-sm text-small">D</h6>
                        </th>
                          <th>
                          <h6 class="text-sm text-small">L</h6>
                        </th>
                        <th>
                          <h6 class="text-sm text-small">P</h6>
                        </th>
                      </tr>
                        `);

                $.each(result.fixturePoints, function(i, field){
                    console.log(field);

                     $("#playalltable").append(`
                             <tr>
                                    <td>
                                        <div class="product">
                                            <p class="text-sm">`+i+`</p>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm">`+field.pts+`</p>
                                    </td>
                                    <td>
                                        <p class="text-sm">`+field.win+`</p>
                                    </td>
                                    <td>
                                        <p class="text-sm">`+field.draw+`</p>
                                    </td>
                                    <td>
                                        <p class="text-sm">`+field.lose+`</p>
                                    </td>
                                    <td>
                                        <p class="text-sm">`+field.played+`</p>
                                    </td>
                                </tr>
                        `);
                });

                $.each(result.match, function(i, field){
                    console.log(field);
                    $("#nextweektable").append(`
                    <tr>
                        <td>
                              <p class="text-sm">`+field.ev_sahibi+`</p>
                          </td>
                          <td>
                              <p class="text-sm">`+field.ev_sahibi_score+` - `+field.misafir_score+`</p>
                          </td>
                          <td>
                              <p class="text-sm">`+field.misafir+`</p>
                       </td>
                     </tr>
                     `);
                });
            });
            match_week++;
        });

        $("#nextweek").click(function(){
            console.log("denedmedfsd");
            $("#nextweek").prop('disabled', true);
            $("#playall").prop('disabled', false);
             $.getJSON("/api/next-week/"+match_week, function(result){
                 $("#nextweektable").empty();
                 $.each(result, function(i, field){
                     $("#nextweektable").append(`
                    <tr>
                        <td>
                              <p class="text-sm">`+field.ev_sahibi+`</p>
                          </td>
                          <td>
                              <p class="text-sm"> - </p>
                          </td>
                          <td>
                              <p class="text-sm">`+field.misafir+`</p>
                       </td>
                     </tr>
                     `);
                 });



             });
        });



        const ctx2 = document.getElementById("Chart2").getContext("2d");
        const chart2 = new Chart(ctx2, {
            type: "bar",
            data: {
                labels: [
                    "Real Madrid",
                    "Barcelona",
                    "Atletico Madrid",
                    "Real Sociedad"
                ],
                datasets: [
                    {
                        label: "",
                        backgroundColor: "#365CF5",
                        borderRadius: 30,
                        barThickness: 6,
                        maxBarThickness: 8,
                        data: [
                            20, 70, 60, 70,
                        ],
                    },
                ],
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            titleColor: function (context) {
                                return "#8F92A1";
                            },
                            label: function (context) {
                                let label = context.dataset.label || "";

                                if (label) {
                                    label += ": ";
                                }
                                label += context.parsed.y;
                                return label;
                            },
                        },
                        backgroundColor: "#F3F6F8",
                        titleAlign: "center",
                        bodyAlign: "center",
                        titleFont: {
                            size: 12,
                            weight: "bold",
                            color: "#8F92A1",
                        },
                        bodyFont: {
                            size: 16,
                            weight: "bold",
                            color: "#171717",
                        },
                        displayColors: false,
                        padding: {
                            x: 30,
                            y: 10,
                        },
                    },
                },
                legend: {
                    display: false,
                },
                legend: {
                    display: false,
                },
                layout: {
                    padding: {
                        top: 15,
                        right: 15,
                        bottom: 15,
                        left: 15,
                    },
                },
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        grid: {
                            display: false,
                            drawTicks: false,
                            drawBorder: false,
                        },
                        ticks: {
                            padding: 35,
                            max: 1200,
                            min: 0,
                        },
                    },
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false,
                            color: "rgba(143, 146, 161, .1)",
                            drawTicks: false,
                            zeroLineColor: "rgba(143, 146, 161, .1)",
                        },
                        ticks: {
                            padding: 20,
                        },
                    },
                },
                plugins: {
                    legend: {
                        display: false,
                    },
                    title: {
                        display: false,
                    },
                },
            },
        });
        // =========== chart two end
    </script>
  </body>
</html>
