<div style="position: relative;"><div style=" position: absolute; right: 7px; padding-top: 10px">Today: {{$today}}</div></div>
  <div class="row">
    <div class="col-md-12 row dash-right-bar">


      <!-- box 1 -->
      <div class="col-md-3 dash-box one">
        <div class="details">
          <div class="amount">
              {{$order_count_today}}<span style="font-size: 18px">orders</span>
          </div>
          <div class="des">
            Your Daily Order
          </div>
        </div>
      </div>
      <!--box 2  -->
      <div class="col-md-3 dash-box two">
        <div class="details">
          <div class="amount">
              {{$order_amount}}<span style="font-size: 18px">TK</span>
          </div>
          <div class="des">
            Your Daily Total Amount
          </div>
        </div>
      </div>
      <!-- box 3 -->
      <div class="col-md-3 dash-box three">
        <div class="details">
          <div class="amount">
            {{$order_org_advance}}
          </div>
          <div class="des">
            Paid for Order
          </div>
        </div>
      </div>
        <!-- box 4 -->
        <div class="col-md-3 dash-box two">
            <div class="details">
                <div class="amount">
                    {{$order_amount - $order_org_advance}}
                </div>
                <div class="des">
                    Due For Orders
                </div>
            </div>
        </div>
      <!-- box4  -->

    </div>
  </div>
  <!-- ............................ -->




{{--  <div class="col-md-12">--}}
{{--    <div class="row">--}}
{{--      <!-- .... -->--}}
{{--      <div class="col-md-5">--}}
{{--        <div class="card dash-record-box">--}}
{{--          <div class="card-header">--}}
{{--            Today's Buy List--}}
{{--          </div>--}}
{{--          <div class="card-body">--}}
{{--            <table id="today-buy-list" class="display nowrap table">--}}
{{--            <thead class="thead-dark">--}}
{{--                <tr>--}}
{{--                    <th>Vouchar</th>--}}
{{--                    <th>Total</th>--}}
{{--                    <th>Discount</th>--}}
{{--                    <th>Paid</th>--}}
{{--                </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}

{{--            </tbody>--}}
{{--            <tfoot class="thead-dark">--}}
{{--                <tr>--}}
{{--                  <th>Vouchar</th>--}}
{{--                  <th>Total</th>--}}
{{--                  <th>Discount</th>--}}
{{--                  <th>Paid</th>--}}
{{--                </tr>--}}
{{--            </tfoot>--}}
{{--        </table>--}}

{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <!-- .... -->--}}
{{--          <div class="col-md-5">--}}
{{--            <div class="card dash-record-box">--}}
{{--              <div class="card-header">--}}
{{--                Today's Buy List--}}
{{--              </div>--}}
{{--              <div class="card-body">--}}
{{--                <table id="today-sell-list" class="display nowrap table">--}}
{{--                <thead class="thead-dark">--}}
{{--                    <tr>--}}
{{--                        <th>Vouchar</th>--}}
{{--                        <th>Total</th>--}}
{{--                        <th>Discount</th>--}}
{{--                        <th>Paid</th>--}}
{{--                    </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}

{{--                </tbody>--}}
{{--                <tfoot class="thead-dark">--}}
{{--                    <tr>--}}
{{--                      <th>Vouchar</th>--}}
{{--                      <th>Total</th>--}}
{{--                      <th>Discount</th>--}}
{{--                      <th>Paid</th>--}}
{{--                    </tr>--}}
{{--                </tfoot>--}}
{{--            </table>--}}

{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--          <!-- ////// -->--}}
{{--          <div class="col-md-10" style="padding-bottom:25px;">--}}
{{--            <div class="card dash-record-box">--}}
{{--              <div class="card-header">--}}
{{--                Today's Inventory--}}
{{--              </div>--}}
{{--              <div class="card-body">--}}
{{--                <table id="today-inv-list" class="display nowrap table">--}}
{{--                <thead class="thead-dark">--}}
{{--                    <tr>--}}
{{--                        <th>ID</th>--}}
{{--                        <th>Product Name</th>--}}
{{--                        <th>Buy</th>--}}
{{--                        <th>Sale</th>--}}
{{--                        <th>Prev Inv</th>--}}
{{--                        <th>Adjusted Inv</th>--}}
{{--                    </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}

{{--                </tbody>--}}
{{--                <tfoot class="thead-dark">--}}
{{--                    <tr>--}}
{{--                      <th>ID</th>--}}
{{--                      <th>Product Name</th>--}}
{{--                      <th>Buy</th>--}}
{{--                      <th>Sale</th>--}}
{{--                      <th>Prev Inv</th>--}}
{{--                      <th>Adjusted Inv</th>--}}
{{--                    </tr>--}}
{{--                </tfoot>--}}
{{--            </table>--}}

{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--                    <!--  -->--}}
{{--                  </div>--}}
{{--                </div>--}}
</div>


              <!--  -->

              <script type="text/javascript">
              $('#today-buy-list').DataTable( {
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf','print'
                  ]
              });

              //
              $('#today-sell-list').DataTable( {
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf','print'
                  ]
              });
              //
              $('#today-inv-list').DataTable( {
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf','print'
                  ]
              });


              </script>
