<div class="row">
  <div class="col-md-12 row dash-right-bar">
    <!-- /////////////////// -->
    <div class="col-md-6 mb-5">
      <div class="card dash-record-box">
        <div class="card-header">
          <i class="fa fa-list"></i>Product List
        </div>
        <div class="card-body">
          <table id="order-process-list" class="display nowrap">
          <thead>
              <tr>
                <th>Customer ID</th>
                <th>Date</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Products</th>
                <th>Total</th>
                <th>Advance</th>
                <th>Due</th>
                <th>Remarks</th>
              </tr>
          </thead>
          <tbody>

          </tbody>
          <tfoot>
              <tr>
                <th>Customer ID</th>
                <th>Date</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Products</th>
                <th>Total</th>
                <th>Advance</th>
                <th>Due</th>
                <th>Remarks</th>

              </tr>
          </tfoot>
      </table>
        </div>
      </div>

    </div>
    <!-- ////////////////// -->
    <!-- <div class="col-md-6 mb-5">
      <div class="card dash-record-box">
        <div class="card-header">
          <i class="fa fa-list"></i>Product List
        </div>
        <div class="card-body">
          <table id="order-completed-list" class="display nowrap">
          <thead>
              <tr>
                  <th>Customer ID</th>
                  <th>Date</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Products</th>
                  <th>Total</th>
                  <th>Advance</th>
                  <th>Due</th>
                  <th>Remarks</th>

              </tr>
          </thead>
          <tbody>

          </tbody>
          <tfoot>
              <tr>
                <th>Product Name</th>
                <th>Catagory</th>
                <th>Color</th>
                <th>Current Qty</th>

              </tr>
          </tfoot>
      </table>
        </div>
      </div>

    </div> -->



<!--  -->
  </div>
</div>
<!--  -->
<script type="text/javascript">

$('#order-process-list').DataTable( {
        "scrollY": 200,
        "scrollX": true,
    dom: 'lBfrtip',
    buttons: [
      'copy', 'csv', 'excel', 'pdf','print'
    ],
  "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
});



</script>
