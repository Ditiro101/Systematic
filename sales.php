<?php include_once('header.php'); ?>
    <!-- Header -->
    <div class="header bg-gradient-custom pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Sales Functions</h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples">
                <div class="col-lg-4 col-md-6">
                  <button type="button" class="btn-icon-clipboard">
                    <a href="pages/sales/make-sale.html">
                      <div>
                        <i class="fas fa-dollar-sign"></i>
                        <span>Make Sale</span>
                      </div>
                    </a>
                  </button>
                </div>
                <div class="col-lg-4 col-md-6">
                  <button type="button" class="btn-icon-clipboard">
                    <a href="pages/sales/search-sale.html">
                      <div>
                        <i class="far fa-times-circle"></i>
                        <span>Return Sale</span>
                      </div>
                    </a>
                  </button>
                </div>
                <div class="col-lg-4 col-md-6">
                  <button type="button" class="btn-icon-clipboard">
                    <a href="pages/sales/search-sale.html">
                      <div>
                        <i class="fas fa-search-dollar"></i>
                        <span>Search Sale</span>
                      </div>
                    </a>
                  </button>
                </div>
                <div class="col-lg-4 col-md-6">
                  <button type="button" class="btn-icon-clipboard">
                    <a href="pages/sales/search-sale.html">
                      <div>
                        <i class="fas fa-people-carry"></i>
                        <span>Collect Sale</span>
                      </div>
                    </a>
                  </button>
                </div>
                <div class="col-lg-4 col-md-6">
                  <button type="button" class="btn-icon-clipboard">
                    <a data-dismiss="modal" data-toggle="modal" data-target="#modal-payment" href="">
                      <div>
                        <i class="fas fa-hand-holding-usd"></i>
                        <span>Make Payment</span>
                      </div>
                    </a>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="modal-payment" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Payment Option!</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>  
            <div class="modal-body text-centre">
              <p class="px-auto text-center">Does the customer want to pay for a sale or pay off account?</p>   
              <div class="col px-auto text-center">
                <button class="btn btn-icon btn-2 btn-success mt-0 mx-auto col-5" type="button" onclick="window.location='pages/sales/search-sale.html'">
                  <span><i class="fas fa-money-bill-alt"></i></span>
                  <span class="btn-inner--text">Pay Off Sale</span>
                </button>
                <br>
                <button class="btn btn-icon btn-2 btn-default mt-3 px-4 mx-auto col-5" type="button" onclick="window.location='pages/customer/search.html'">
                  <span><i class="fas fa-file-invoice"></i></span>
                  <span class="btn-inner--text">Pay Off Account</span>
                </button>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button> 
            </div>    
          </div>
        </div>
      </div>
<?php include_once('footer.php'); ?>