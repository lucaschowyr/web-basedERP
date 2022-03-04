<?php

session_start();   

include_once './functions/functions.php';
include_once '../includes/dbconnect.php';

userSession('Sales');

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('dashboard','');
?>

    <!-- Page Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">               
        </div>
      </div>
      
      <div class="row mt-4">
        <div class="col-md-6 col-xl-3">
            <div class="card bg-c-blue">
                <div class="card-block">
                    <h6 class="m-b-20">Orders Received</h6>
                    <h2 class="text-right"><i class="ti ti-shopping-cart f-left"></i><span>486</span></h2>
                    <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total Sales</h6>
                    <h2 class="text-right"><i class="ti ti-tag f-left"></i><span>1641</span></h2>
                    <p class="m-b-0">This Month<span class="f-right">213</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Revenue</h6>
                    <h2 class="text-right"><i class="ti ti-reload f-left"></i><span>$420,562</span></h2>
                    <p class="m-b-0">This Month<span class="f-right">$50,032</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total Profit</h6>
                    <h2 class="text-right"><i class="ti ti-wallet f-left"></i><span>$90,562</span></h2>
                    <p class="m-b-0">This Month<span class="f-right">$5,042</span></p>
                </div>
            </div>
        </div>
      </div>

      <div class="row mt-4">
            <div class="col-xl-8 grid-margin-lg-0 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sales by Country</h4>
                    <div class="table mt-3">
                      <table class="table table-header-bg">
                        <thead>
                          <tr>
                            <th>
                                Country
                            </th>
                            <th>
                                Revenue
                            </th>
                            <th>
                                vs Last Month
                            </th>
                            <th>
                                Goal Reached
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <i class="fi flag-icon flag-icon-sg mr-2" title="us" id="sg"></i>
                              <span class="ml-2">Singapore</span>
                            </td>
                            <td>
                              $911,200
                            </td>
                            <td>
                              <div class="text-success mx-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/></svg><i class="bi bi-arrow-up icon-arrow-up mx-1"></i>+60%</div>
                            </td>
                            <td>
                              <div class="row">
                                <div class="col-sm-8">
                                  <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  25%
                                </div>
                              </div>
                            </td>
                            
                          </tr>
                          <tr>
                            <td>
                              <i class="fi flag-icon flag-icon-cn mr-2" title="us" id="cn"></i> China
                            </td>
                            <td>
                                $821,600
                            </td>
                            <td>
                              <div class="text-danger mx-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/></svg><i class="icon-arrow-down mx-1"></i>-40%</div>
                            </td>
                            <td>
                              <div class="row">
                                <div class="col-sm-8">
                                  <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  50%
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <i class="flag-icon flag-icon-vn mr-2" title="us" id="vn"></i> Vietnam
                            </td>
                            <td>
                                $323,700
                            </td>
                            <td>
                              <div class="text-success mx-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/></svg><i class="bi bi-arrow-up icon-arrow-up mx-1"></i>+40%</div>
                            </td>
                            <td>
                              <div class="row">
                                <div class="col-sm-8">
                                  <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  10%
                                </div>
                              </div>
                            </td>
                          </tr>                                                    
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
            </div>
            
            <div class="col-xl-4 grid-margin-lg-0 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Top Products</h4>
                    <p class="mb-4">Orders in the latest Quarter</p>
                    <div class="row pt-2 pb-2">
                      <div class="col-sm-3 pr-0">
                          <div class="d-flex">
                            <div>
                                <div class="text-dark font-weight-bold mb-2 mr-2">Model X</div>
                            </div>
                          </div>
                      </div>
                      <div class="col-sm-9 pl-2">
                          <div class="row">
                            <div class="col-sm-10">
                              <div class="progress progress-lg mt-1">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 82%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                            <div class="col-sm-2 p-lg-0">
                              82
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-sm-3 pr-0">
                          <div class="d-flex">
                            <div>
                                <div class="text-dark font-weight-bold mb-2 mr-2">Model 3</div>
                            </div>
                          </div>
                      </div>
                      <div class="col-sm-9 pl-2">
                          <div class="row">
                            <div class="col-sm-10">
                              <div class="progress progress-lg mt-1">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 45%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                            <div class="col-sm-2 p-lg-0">
                              45
                            </div>
                          </div>
                      </div>
                    </div>
                    
                    <div class="row mt-2">
                      <div class="col-sm-3 pr-0">
                          <div class="d-flex">
                            <div>
                                <div class="text-dark font-weight-bold mb-2 mr-2">Model S</div>
                            </div>
                          </div>
                      </div>
                      <div class="col-sm-9 pl-2">
                          <div class="row">
                            <div class="col-sm-10">
                              <div class="progress progress-lg mt-1">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 39%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                            <div class="col-sm-2 p-lg-0">
                              39
                            </div>
                          </div>
                      </div>
                    </div>

                    <div class="row mt-2">
                      <div class="col-sm-3 pr-0">
                          <div class="d-flex">
                            <div>
                                <div class="text-dark font-weight-bold mb-2 mr-2">Model Y</div>
                            </div>
                          </div>
                      </div>
                      <div class="col-sm-9 pl-2">
                          <div class="row">
                            <div class="col-sm-10">
                              <div class="progress progress-lg mt-1">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 32%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                            <div class="col-sm-2 p-lg-0">
                              32
                            </div>
                          </div>
                      </div>
                    </div>

                </div>
              </div>
            </div>
          </div>

      <div class="row mt-4 mb-5">
        <div class="col-xl-8 grid-margin-lg-0 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Monthly Orders</h4>
              
              <div id="morris-bar-chart" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                <svg height="342" version="1.1" width="768.094" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.953125px; top: -0.65625px;">
                  <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc>
                  <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                  <text x="32.53125" y="303" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4">0</tspan>
                </text>
                  <path fill="none" stroke="#000000" d="M45.03125,303H743.094" stroke-opacity="0" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                  <text x="32.53125" y="233.5" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                    <tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4">25</tspan>
                  </text>
                  <path fill="none" stroke="#000000" d="M45.03125,233.5H743.094" stroke-opacity="0" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                  <text x="32.53125" y="164" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                    <tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4">50</tspan>
                  </text>
                  <path fill="none" stroke="#000000" d="M45.03125,164H743.094" stroke-opacity="0" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                  <text x="32.53125" y="94.50000000000003" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                    <tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.000000000000028">75</tspan>
                  </text>
                  <path fill="none" stroke="#000000" d="M45.03125,94.50000000000003H743.094" stroke-opacity="0" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                  <text x="32.53125" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                    <tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4">100</tspan>
                  </text>
                  <path fill="none" stroke="#000000" d="M45.03125,25H743.094" stroke-opacity="0" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>

                  <text x="593.509125" y="315.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                    <tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4">Jun</tspan>
                  </text>
                  <text x="493.78587500000003" y="315.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                    <tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4">May</tspan>
                  </text>
                    <text x="394.062625" y="315.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                      <tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4">Apr</tspan>
                  </text>
                    <text x="294.339375" y="315.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                      <tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4">Mar</tspan>
                  </text>
                    <text x="194.616125" y="315.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                      <tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4">Feb</tspan>
                  </text>
                    <text x="94.892875" y="315.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                      <tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4">Jan</tspan>
                  </text>
                <rect x="57.49665625" y="25" width="22.930812500000002" height="278" rx="0" ry="0" fill="#fc6c8e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                <rect x="83.42746875" y="52.80000000000001" width="22.930812500000002" height="250.2" rx="0" ry="0" fill="#7571f9" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                <rect x="109.36" y="129" width="22.930812500000002" height="174" rx="0" ry="0" fill="#5FBEAA" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                <rect x="157.21990625" y="94.50000000000003" width="22.930812500000002" height="208.49999999999997" rx="0" ry="0" fill="#fc6c8e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                <rect x="183.15071875" y="122.30000000000001" width="22.930812500000002" height="180.7" rx="0" ry="0" fill="#7571f9" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                <rect x="209.08071875" y="82.30000000000001" width="22.930812500000002" height="220.7" rx="0" ry="0" fill="#5FBEAA" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                <rect x="256.94315625" y="164" width="22.930812500000002" height="139" rx="0" ry="0" fill="#fc6c8e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                <rect x="282.87396875" y="191.8" width="22.930812500000002" height="111.19999999999999" rx="0" ry="0" fill="#7571f9" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                <rect x="308.87396875" y="122.8" width="22.930812500000002" height="180.19999999999999" rx="0" ry="0" fill="#5FBEAA" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                <rect x="356.66640625" y="94.50000000000003" width="22.930812500000002" height="208.49999999999997" rx="0" ry="0" fill="#fc6c8e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                <rect x="382.59721875" y="122.30000000000001" width="22.930812500000002" height="180.7" rx="0" ry="0" fill="#7571f9" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                <rect x="408.59721875" y="202.30000000000001" width="22.930812500000002" height="100.7" rx="0" ry="0" fill="#5FBEAA" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                <rect x="456.38965625000003" y="164" width="22.930812500000002" height="139" rx="0" ry="0" fill="#fc6c8e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                <rect x="482.32046875000003" y="191.8" width="22.930812500000002" height="111.19999999999999" rx="0" ry="0" fill="#7571f9" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                <rect x="508.22046875000003" y="174" width="22.930812500000002" height="129" rx="0" ry="0" fill="#5FBEAA" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                <rect x="556.11290625" y="94.50000000000003" width="22.930812500000002" height="208.49999999999997" rx="0" ry="0" fill="#fc6c8e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                <rect x="582.04371875" y="122.30000000000001" width="22.930812500000002" height="180.7" rx="0" ry="0" fill="#7571f9" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
                <rect x="607.94371875" y="202.30000000000001" width="22.930812500000002" height="100.7" rx="0" ry="0" fill="#5FBEAA" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect>
              </svg>
                <div class="morris-hover morris-default-style" style="left: 26.6038px; top: 117px; display: none;">
                  <div class="morris-hover-row-label">2016</div>
                  <div class="morris-hover-point" style="color: #7571f9">A: 100</div>
                  <div class="morris-hover-point" style="color: #FC6C8E">B: 90</div>
                  <div class="morris-hover-point" style="color: #5FBEAA">C: 60</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-4 grid-margin-lg-0 grid-margin stretch-card">
          <div class="card">
              <div class="card-body">
                <h4 class="card-title">Top Products</h4>
                <div class="my-4">
                  <canvas id="pieChart"></canvas>
                </div>
              </div>
          </div>
        </div>
          
      </div>
      <hr class="my-4">
      <footer class="my-3 text-muted text-center text-small">
        <p id="clock"></p>
        <p class="mb-1">&copy; TeslahSG Pte Ltd</p>
      </footer>

      </div>
    </main>

<?php templateFooter(); ?>
