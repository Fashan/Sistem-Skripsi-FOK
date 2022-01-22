  <!-- Page content -->
  <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-md-6">
          <div class="card bg-default">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-light text-uppercase ls-1 mb-1">Ov</h6>
                  <h5 class="h3 text-white mb-0">Sales value</h5>
                </div>
                <div class="col">
                  <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark"
                      data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$"
                      data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                        <span class="d-none d-md-block">Month</span>
                        <span class="d-md-none">M</span>
                      </a>
                    </li>
                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark"
                      data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$"
                      data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                        <span class="d-none d-md-block">Week</span>
                        <span class="d-md-none">W</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->
                <canvas id="chart-sales-dark" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
				<div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h3 class="mb-0">Jurusan</h3>
              <p class="text-sm mb-0">
                This is an exmaple of datatable using the well known datatables.net plugin. This is a minimal setup in order to get started fast.
              </p>
            </div>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="example">
                <thead class="thead-light">
                  <tr>
                    <th>Name</th>
                    <th>Position</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
         
                  </tr>
                  <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
            
                  </tr>
                  <tr>
                    <td>Ashton Cox</td>
                    <td>Junior Technical Author</td>
  
                  </tr>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        </div>
      </div>
     

    </div>
