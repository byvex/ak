<x-app-layout>
  <div class="row g-6">
                <!-- Sales last year -->
                <div class="col-xxl-2 col-md-3 col-6">
                  <div class="card h-100">
                    <div class="card-header pb-3">
                      <h5 class="card-title mb-1">Order</h5>
                      <p class="card-subtitle">Last week</p>
                    </div>
                    <div class="card-body">
                      <div id="ordersLastWeek"></div>
                      <div class="d-flex justify-content-between align-items-center gap-3">
                        <h4 class="mb-0">124k</h4>
                        <small class="text-success">+12.6%</small>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Sessions Last month -->
                <div class="col-xxl-2 col-md-3 col-6">
                  <div class="card h-100">
                    <div class="card-header pb-0">
                      <h5 class="card-title mb-1">Sales</h5>
                      <p class="card-subtitle">Last Year</p>
                    </div>
                    <div id="salesLastYear"></div>
                    <div class="card-body pt-0">
                      <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                        <h4 class="mb-0">175k</h4>
                        <small class="text-danger">-16.2%</small>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Total Profit -->
                <div class="col-xxl-2 col-md-3 col-6">
                  <div class="card h-100">
                    <div class="card-body">
                      <div class="badge p-2 bg-label-danger mb-3 rounded">
                        <i class="icon-base ti tabler-credit-card icon-28px"></i>
                      </div>
                      <h5 class="card-title mb-1">Total Profit</h5>
                      <p class="card-subtitle">Last week</p>
                      <p class="text-heading mb-3 mt-1">1.28k</p>
                      <div>
                        <span class="badge bg-label-danger">-12.2%</span>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Total Sales -->
                <div class="col-xxl-2 col-md-3 col-6">
                  <div class="card h-100">
                    <div class="card-body">
                      <div class="badge p-2 bg-label-success mb-3 rounded">
                        <i class="icon-base ti tabler-credit-card icon-28px"></i>
                      </div>
                      <h5 class="card-title mb-1">Total Sales</h5>
                      <p class="card-subtitle">Last week</p>
                      <p class="text-heading mb-3 mt-1">24.67k</p>
                      <div>
                        <span class="badge bg-label-success">+24.5%</span>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Revenue Growth -->
                <div class="col-xxl-4 col-xl-5 col-md-6 col-sm-8 col-12 mb-md-0 order-xxl-0 order-2">
                  <div class="card pb-xxl-3">
                    <div class="card-body row">
                      <div class="d-flex flex-column col-4">
                        <div class="card-title mb-auto">
                          <h5 class="mb-2 text-nowrap">Revenue Growth</h5>
                          <p class="mb-0">Weekly Report</p>
                        </div>
                        <div class="chart-statistics">
                          <h3 class="card-title mb-1">$4,673</h3>
                          <span class="badge bg-label-success">+15.2%</span>
                        </div>
                      </div>
                      <div id="revenueGrowth" class="col-8"></div>
                    </div>
                  </div>
                </div>

                
                
                <!--/ Sales By Country -->

                

               

                

                
              </div>
</x-app-layout>