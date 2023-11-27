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

                      <table border="1">
                              <tr>
                                  <th> Order ID</th>
                                  <td id="modalOrderId"> </td>
                              </tr>
                          <tr>
                              <th> Customer Name</th>
                              <td id="modalCustomerName"> </td>
                          </tr>
                          <tr>
                              <th> Address</th>
                              <td id="modalAddress"> </td>
                          </tr>
                          <tr>
                              <th > Mobile </th>
                              <td id="modalMobile"> </td>
                          </tr>
                          <tr>
                              <th> Item </th>
                              <td id="modalItem"> </td>
                          </tr>
                          <tr>
                              <th> Cloth/Material </th>
                              <td id="modalCloth"> </td>
                          </tr>
                          <tr>
                              <th> Total </th>
                              <td id="modalTotal"> </td>
                          </tr><tr>
                              <th> Advance </th>
                              <td id="modalAdvance"> </td>
                          </tr><tr>
                              <th> Due </th>
                              <td id="modalDue"> </td>
                          </tr><tr>
                              <th> Measurement </th>
                              <td> </td>
                          </tr><tr>
                              <th> Order Processed By </th>
                              <td id="modalOrderProcessedBy"> </td>
                          </tr>
                          <tr>
                              <th> Remarks </th>
                              <td id="modalRemarks"> </td>
                          </tr>


                      </table>

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









        $(document).ready(function() {
            // Assuming you have already initialized your DataTable
            var table = $('#order-process-list').DataTable();

            $('#order-process-list tbody').on('click', '.view-btn', function() {
                // Get data for the clicked row
                var data = table.row($(this).parents('tr')).data();
                if (!data) {
                    console.error('No data found for this row');
                    return;
                }

                var orderId = data.id;
                if (!orderId) {
                    console.error('No order ID found in the data');
                    return;
                }

                // Fetch order details using AJAX
                $.ajax({
                    url: '/orders/details/' + orderId,
                    method: 'GET',
                    success: function(order) {
                        if (!order) {
                            console.error('No order details received from server');
                            return;
                        }

                        // Log the received order data for debugging
                        console.log('Order details:', order);

                        // Update modal contents
                        $('#modalOrderId').text(order.id || 'N/A');
                        $('#modalCustomerName').text(order.customer_name || 'N/A');
                        $('#modalAddress').text(order.customer_address || 'N/A');
                        $('#modalMobile').text(order.customer_mobile || 'N/A');


                        // Handle multiple items
                        if (Array.isArray(order.items) && order.items.length > 0) {
                            var itemNames = order.items.map(function(item) {
                                // Assuming 'name' is the property to display. Replace with the actual property.
                                return item.name || 'Unnamed Item';
                            }).join(", ");
                            $('#modalItem').text(itemNames);
                        } else {
                            $('#modalItem').text('No items found');
                        }


                        // Assuming these fields exist in your 'order' object
                        $('#modalCloth').text(order.cloth_code || 'N/A'); // Make sure the ID is valid
                        $('#modalTotal').text(order.order_total || 'N/A');
                        $('#modalAdvance').text(order.order_advance || 'N/A');
                        $('#modalDue').text(order.order_due || 'N/A');
                        $('#modalOrderProcessedBy').text(order.order_processed_by || 'N/A');
                        $('#modalRemarks').text(order.remark || 'N/A');

                        // Show the modal
                        $('#orderDetailsModal').modal('show');
                        // Add similar lines for other fields...

                        // Handle items
                        if (Array.isArray(order.items) && order.items.length > 0) {
                            var itemsDescription = order.items.map(function(item) {
                                return item.name; // Update this according to your item structure
                            }).join(", ");
                            $('#modalItem').text(itemsDescription);
                        } else {
                            $('#modalItem').text('No items found');
                        }

                        // Show the modal
                        $('#orderDetailsModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching order details:', error);
                    }
                });
            });
        });











    });



</script>



