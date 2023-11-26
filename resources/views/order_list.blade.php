<div class="row">
  <div class="col-md-12 row dash-right-bar">
    <!-- /////////////////// -->
    <div class="col-md-7 mb-5">
      <div class="card dash-record-box">
        <div class="card-header">
          <i class="fa fa-list"></i>Product List
        </div>
        <div class="card-body">
          <table id="order-process-list" class="display nowrap">
          <thead>
              <tr>
                  <th>View</th>
                <th>ID</th>
                <th>Delivery</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Total</th>
              </tr>
          </thead>
          <tbody>

          </tbody>
          <tfoot>
              <tr>
                  <th>View</th>
                  <th>ID</th>
                  <th>Delivery</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Total</th>
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





      <!-- Bootstrap Modal -->
      <div class="modal fade" id="orderDetailsModal" tabindex="-1" role="dialog" aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="orderDetailsModalLabel">Order Details</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <!-- Order details will be loaded here -->
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>



      <!--  -->
  </div>
</div>
<!--  -->
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#order-process-list').DataTable({
            "scrollY": 200,
            "scrollX": true,
            "dom": 'lBfrtip',
            "buttons": ['copy', 'csv', 'excel', 'pdf', 'print'],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "processing": true,
            "serverSide": true,
            "ajax": "{{ url('/orders/data') }}",
            "columns": [
                {
                    "data": null,
                    "defaultContent": "<button class='btn btn-primary view-btn'>View</button>",
                    "orderable": false
                },
                { "data": "id" },
                { "data": "delivery" },
                { "data": "name" },
                { "data": "mobile" },
                { "data": "total" },
                // Add additional columns as needed
            ]
        });

        // Handle click event on "View" button
        $('#order-process-list tbody').on('click', '.view-btn', function() {
            var data = table.row($(this).parents('tr')).data();
            var orderId = data.id; // Get the order ID from the row data

            // TODO: Load order details based on orderId and display in the modal
            // Example: $('#orderDetailsModalContent').load('/path-to-get-order-details/' + orderId);

            $('#orderDetailsModal').modal('show'); // Open the modal
        });
    });
</script>








</script>
