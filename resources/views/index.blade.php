<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="_token" content="{{csrf_token()}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">



  <title>ProIT Management</title>
</head>
<body>

  <!-- Navigation bar  -->
  <section id="nav-bar-cus">
    <div class="navigatio-bar">
      <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand dashboard" href="#"> <img src="img\logo.png" class="nav-logo-img"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
          </ul>
          <span class="navbar-text">
            <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                    <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                    @endif
                @else
                    <li class="nav-item dropdown right-auto-nav">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                @endguest
                    </ul>
          </span>
        </div>
      </nav>
    </div>


  </section>

  <!-- end of Navigation -->


  <!-- sidebar -->
  <section id="my-body-sidebar">
    <div class="row">
      <div class="col-md-2 left-bar">
        <!--  -->
        <ul>
          <li>
            <a href="#" class="dashboard"><i class="fas fa-home"></i><span class="side-title">Dashboard</span></a>
          </li>



          <li>
            <a href="#"><i class="fas fa-dollar-sign"></i><span class="side-title">Cashbook</span></a>
          </li>
          <li>
            <a href="#" class="add-product"><i class="fas fa-archive"></i><span class="side-title">Product</span></a>
          </li>
          <!-- Buy -->
          <li class="dropdown">
            <a href="#"><i class="fas fa-cart-plus"></i><span class="side-title">Purchase</span></a>
            <div class="dropdown-content">
              <a href="#" class="add-purchase-list">Purchase</a>
              <a href="#">Purchase Due List</a>
              <a href="#">Vendor</a>
            </div>
          </li>
          <!--  -->

          <!-- Buy -->
          <li class="dropdown">

            <a href="#"><i class="fab fa-sellcast"></i>

              <span class="side-title">Sale</span></a>
            <div class="dropdown-content">
              <a href="#"class="add-sell">Add Sell</a>
              <a href="#"class="receivable-list">Receivable</a>
              <a href="#">Sell History</a>
              <a href="#">Add Customer</a>
            </div>
          </li>
          <!--  -->
            <li class="dropdown">
                <a href="#"><i class="fab fa-first-order"></i><span class="side-title">Items</span></a>
                <div class="dropdown-content">
                    <a href="#" class="items">Items</a>
                    <a href="#" class="formats">Formats</a>
                    <a href="#" class="measurements">Measurements</a>

                </div>
            </li>
          <!--  -->
          <li class="dropdown">
            <a href="#"><i class="fab fa-first-order"></i><span class="side-title">Orders</span></a>
            <div class="dropdown-content">
              <a href="#" class="add-order">ADD Order</a>
              <a href="#" class="order-list">Order List</a>
            </div>
          </li>


          <!--  -->
          <li>
            <a href="#"><i class="fas fa-chart-line"></i><span class="side-title">Report</span></a>
          </li>
        </ul>
      </div>
      <!-- starting of box content -->
      <div class="right-content col-md-10 body-right-side">
        <h1 style="text-align:center; padding-top:10px;">Welcome To Our Shop Management System</h1>
        <span style="display:block; text-align:center;font-weight:bold; color:brown;">An Exclusive Product By ProIT</span>

      </div>
    </div>
  </section>
  <!-- ..................... -->

  <!-- Footer............................ -->

  <section id="footer">
    <div class="row ">
      <div class="col-md-12 footer-content">

      </div>
    </div>
  </section>








  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <!-- Include Select2 JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!--  -->
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
{{--  <script src="http://cdn.datatables.net/plug-ins/1.10.20/filtering/row-based/range_dates.js"></script>--}}
  <!--  -->
  <script src="script.js"></script>




<script>

    // customer search field and dropdown

    $(document).ready(function() {
        console.log('jQuery version:', $.fn.jquery); // Check jQuery version
        console.log('Select2 loaded:', !!$.fn.select2); // Check if Select2 is loaded
        $('#customerName').select2({
            placeholder: 'Search for a customer',
            minimumInputLength: 1,
            ajax: {
                url: '/fetch-customers', // Laravel route to fetch customers
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function(customer) {
                            return {
                                text: customer.name + ' (' + customer.mobile + ')',
                                id: customer.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    });


</script>





</body>
</html>
