<div class="row">
  <div class="col-md-12 row dash-right-bar">
    <!-- ............................ -->
    <div class="col-md-12 ">
      <div class="row">
        <!-- .... -->
        <div class="col-md-12">
          <div class="card dash-record-box">
            <div class="card-header">
              Add Order
            </div>
            <div class="card-body">
              <!-- form  -->
              <div class="row">
                <div class="col-md-12">
                  <form id="myForm">
                  @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="birthday">Delivery Date</label>
                            <input type="date" name="date" id="order_date" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Cloth Code</label>
                            <input type="text" name="cloth_code" id="cloth_code" class="form-control">
                        </div>

                      <div class="form-group col-md-12">
                          <label>Customer</label>
                          <div class="select-plus-container">
                              <select id="customerName" name="customer_id" class="form-control select2">
                                  <!-- Options will be populated dynamically -->
                              </select>
                              <input type="text" id="customerNameHidden" name="customer_name">
                              <span class="add-customer-icon" data-toggle="modal" data-target="#addCustomerModal">
                                 <i class="fas fa-plus-circle" style="font-size:20px"></i>
                             </span>
                          </div>
                      </div>
                        <input type="hidden" id="customer_id" name="customer_id" value="">
                          <div class="form-group col-md-6">
                              <label for="Address">Address</label>
                              <input type="text" name="customer_address" id="customer_address" class="form-control">
                          </div>
                      <div class="form-group col-md-6">
                        <label for="Name">Mobile</label>
                        <input type="name" name="customer_mobile" id="customer_mobile" class="form-control">
                      </div>

                        <span style="font-size: 25px; text-align: center; margin: auto; background-color: darkviolet; padding:5px; color: white;font-weight: bold">Item Area</span>
                      <!-- multiple select -->
                      <div class="form-group col-md-12">
                        <label for="Name">Item Name</label>
                          <select id="itemName"  class="form-control">

                          </select>
                          <div id="selectedItemsContainer"></div>
                      </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label>Total</label>
                                <input type="text" id="total" name="order_total" class="form-control" readonly>
                            </div>
                            <div class="col-md-4">
                                <label>Advance</label>
                                <input type="number" id="advance" name="order_advance" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label>Due</label>
                                <input type="text" id="due" name="order_due" class="form-control" readonly>
                            </div>
                        </div>


                        <div class="col-md-12 mt-4">
                        <center>
                        <span style="font-size: 25px; padding: 5px; margin-bottom: 5px; background-color: green; text-align: center; margin: auto; color: white;font-weight: bold">Measurement Area</span>
{{--                     Measurement & Format--}}
                        </center>
                        </div>

                          <div class="form-group col-md-6 mt-3">
                              <label>Select Format </label>
                              <select id="formatSelect" class="form-control select2">
                                  <!-- Formats will be populated dynamically -->
                                  @foreach ($formats as $format)
                                      <option value="{{ $format->id }}"> {{ $format->name }} </option>
                                  @endforeach
                              </select>
                          </div>
                            <!-- Container for Dynamically Generated Measurement Fields -->
                            <div id="measurementsContainer"></div>
                      <div class="form-group col-md-6 mt-3">
                        <label for="inputEmail4">Order Processed By</label>
                        <input type="name" id="order_by" name="order_processed_by" class="form-control">
                      </div>
                      <div class="form-group col-md-12">
                        <label for="inputEmail4">Remark</label>
                        <input type="name" id="order_remark" name="remark" class="form-control">
                      </div>
                    <button type="submit" class="btn btn-primary">Order</button>
                        <div class="col-md-12 alert-success form-alert">
                            <div class="form-alert-child"></div>
                        </div>
                        </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>








{{--Modal for customer add--}}
<!-- Modal -->
<div class="modal fade" id="addCustomerModal" tabindex="-1" role="dialog" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCustomerModalLabel">Add New Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for adding a new customer -->
                <form id="addCustomerForm">
                @csrf
                    <div class="form-group">
                        <label for="newCustomerName">Name</label>
                        <input type="text" class="form-control" id="newCustomerName" required>
                    </div>
                    <div class="form-group">
                        <label for="newCustomerAddress">Address</label>
                        <input type="text" class="form-control" id="newCustomerAddress" required>
                    </div>
                    <div class="form-group">
                        <label for="newCustomerMobile">Mobile</label>
                        <input type="text" class="form-control" id="newCustomerMobile" required>
                    </div>
                    <button type="submit-form" class="btn btn-primary">Add Customer</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!--  -->

<!-- Include Select2 JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


<script type="text/javascript">




    // var btnn= document.getElementById('submit-btn');
    // btnn.onclick = function () {
    //     if(event.preventDefault)
    //         event.preventDefault();
    //     else
    //         event.returnValue = false;
    //ajax setup


    // ajax save code
{{--    jQuery(document).ready(function(){--}}
{{--        jQuery('#submit-btn').click(function(e){--}}
{{--            e.preventDefault();--}}
{{--            $.ajaxSetup({--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')--}}
{{--                }--}}
{{--            });--}}
{{--//order add--}}
{{--            jQuery.ajax({--}}
{{--                url: "{{'/order/create'}}",--}}
{{--                type: "POST",--}}
{{--                data: {--}}
{{--                    order_id: jQuery('#order_id').val(),--}}
{{--                    order_date: jQuery('#order_date').val(),--}}
{{--                    cloth_code: jQuery('#cloth_code').val(),--}}
{{--                    cus_id: jQuery('#customer_id').val(),--}}
{{--                    cus_name: jQuery('#cus_name').val(),--}}
{{--                    cus_mobile: jQuery('#customer_mobile').val(),--}}
{{--                    cus_product: jQuery('#product_name').val(),--}}
{{--                    cus_h: jQuery('#cus_h').val(),--}}
{{--                    cus_n: jQuery('#cus_n').val(),--}}
{{--                    cus_b: jQuery('#cus_b').val(),--}}
{{--                    cus_w: jQuery('#cus_w').val(),--}}
{{--                    order_pro: jQuery('#order_by').val(),--}}
{{--                    order_remark: jQuery('#order_remark').val(),--}}
{{--                    order_total: jQuery('#order_total').val(),--}}
{{--                    order_advance: jQuery('#order_advance').val(),--}}
{{--                    order_due: jQuery('#order_due').val(),--}}
{{--                },--}}
{{--                success: function (result) {--}}
{{--                    $('#order_id').val('');--}}
{{--                    $('#order_date').val('');--}}
{{--                    $('#cloth_code').val('');--}}
{{--                    $('#cus_name').val('');--}}
{{--                    $('#customer_mobile').val('');--}}
{{--                    $('#product_name').val('');--}}
{{--                    $('#cus_h').val('');--}}
{{--                    $('#cus_n').val('');--}}
{{--                    $('#cus_b').val('');--}}
{{--                    $('#cus_w').val('');--}}
{{--                    $('#order_by').val('');--}}
{{--                    $('#order_remark').val('');--}}
{{--                    $('#order_total').val('');--}}
{{--                    $('#order_advance').val('');--}}
{{--                    $('#order_due').val('');--}}
{{--                    $(".right-content").load("/load/add_order");--}}
{{--                },--}}
{{--            });--}}
{{--        });--}}
{{--    });--}}
//






    $('#order-process-list').DataTable( {
        "scrollY": 200,
        "scrollX": true,
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf','print'
        ],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    });




    // Form submit
        $(document).ready(function() {
        $('#myForm').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            var formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: '{{ route("order.create") }}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Display success message
                    alert('Order created successfully');
                    // Clear the form
                    $('#myForm').trigger("reset");


                },
                error: function(xhr, status, error) {
                    // Display an error message
                    alert('Error: ' + error);
                }
            });
        });
    });








    // customer search field and dropdown

    $(document).ready(function() {
        $('#customerName').select2({
            placeholder: 'Search',
            minimumInputLength: 1,
            ajax: {
                url: '/fetch-customers', // Laravel route to fetch customers
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function(customer) {
                            return {
                                text: customer.name,
                                id: customer.id
                            }
                        })
                    };
                },
                cache: true
            }
        }).on('select2:select', function (e) {
            var customerId = e.params.data.id;
            $('#customer_id').val(customerId); // Update hidden field

            // AJAX request to get selected customer's details
            $.ajax({
                url: '/get-customer-details/' + customerId, // Laravel route to get customer details
                type: 'GET',
                success: function(customer) {
                    // Assuming the response contains 'mobile' and 'address' fields
                    $('#customer_mobile').val(customer.mobile);
                    $('#customer_address').val(customer.address);
                    $('#customerNameHidden').val(customer.name);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });





    // ajax customer save
    $(document).ready(function() {
        $('#addCustomerForm').submit(function(e) {
            e.preventDefault();
            var name = $('#newCustomerName').val();
            var address = $('#newCustomerAddress').val();
            var mobile = $('#newCustomerMobile').val();

            $.ajax({
                url: '/add-customer',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    name: name,
                    address: address,
                    mobile: mobile
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Handle success (e.g., showing a success message, closing the modal)
                    $('#addCustomerModal').modal('hide');
                    // Optionally, refresh the customer list or update the UI
                },
                error: function(error) {
                    // Handle error (e.g., displaying error messages)
                    console.log(error);
                }
            });
        });
    });


//     format dropdown data
    $(document).ready(function() {
        $.ajax({
            url: '/get-formats/order',
            type: 'GET',
            success: function(formats) {
                var formatSelect = $('#formatSelect');
                formatSelect.empty().append('<option value="">Select a Format</option>');
                formats.forEach(function(format) {
                    formatSelect.append('<option value="' + format.id + '">' + format.name + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
            }
        });
    });


// fetching measurements with format
    $(document).ready(function() {
        // Event handler for format selection
        $('#formatSelect').change(function() {
            var formatId = $(this).val();

            if (formatId) {
                // AJAX call to fetch associated measurements
                $.ajax({
                    url: '/order/measurements/' + formatId,
                    type: 'GET',
                    success: function(measurements) {
                        generateMeasurementFields(measurements);
                    },
                    error: function(error) {
                        console.error('Error fetching measurements:', error);
                        // Optionally handle errors in the UI
                    }
                });
            } else {
                // Clear the measurements container if no format is selected
                $('#measurementsContainer').empty();
            }
        });
    });

    // Function to dynamically generate input fields for measurements
    function generateMeasurementFields(measurements) {
        var container = $('#measurementsContainer');

        measurements.forEach(function(measurement) {
            // Check if a field for this measurement already exists
            if (!$('#measurement-' + measurement.id).length) {
                var inputHtml = '<div class="measurement-field" id="measurement-' + measurement.id + '">' +
                    '<label>' + measurement.name + '</label>' +
                    '<input type="text" name="measurements[' + measurement.id + ']" />' +
                    '<button type="button" onclick="removeMeasurementField(' + measurement.id + ')">Remove</button>' +
                    '</div>';
                container.append(inputHtml);
            }
        });
    }


    function removeMeasurementField(measurementId) {
        $('#measurement-' + measurementId).remove();
    }


// Item dropdown show
    $(document).ready(function() {
        $.ajax({
            url: '/items/all/show', // Adjust the URL as needed
            type: 'GET',
            success: function(items) {
                var dropdown = $('#itemName');
                dropdown.empty();
                dropdown.append('<option selected="true" disabled>Choose Item</option>');
                dropdown.prop('selectedIndex', 0);

                items.forEach(function(item) {
                    dropdown.append($('<option></option>').attr('value', item.id).text(item.name));
                });
            },
            error: function(error) {
                console.error('Error fetching items:', error);
                // Handle errors here
            }
        });
    });








    // Item Dropdown Fields

    $(document).ready(function() {
        // Listen for changes in the dropdown
        $('#itemName').change(function() {
            // Get the selected item's value and text
            var itemName = $("#itemName option:selected").text();
            var itemId = $(this).val();

            // Assuming you want to prevent adding the same item multiple times
            if ($('#selectedItemsContainer').find('#itemRow_' + itemId).length == 0) {
                // Create the HTML for the new fields
                var newFields = '<div class="itemRow row mb-2 mt-4" id="itemRow_' + itemId + '">' +
                    '<div class="col-md-3">' +
                    '<input type="text" class="form-control" name="items[' + itemId + '][name]" value="' + itemName + '" readonly />' +
                    '</div>' +
                    '<div class="col-md-3">' +
                    '<input type="number" class="form-control" name="items[' + itemId + '][quantity]" placeholder="Quantity" />' +
                    '</div>' +
                    '<div class="col-md-3">' +
                    '<input type="number" class="form-control" name="items[' + itemId + '][price]" placeholder="Price" />' +
                    '</div>' +
                    '<div class="col-md-3">' +
                    '<button type="button" class="btn btn-danger removeItemBtn">Remove</button>' +
                    '</div>' +
                    '</div>';

                // Append the new fields to the container
                $('#selectedItemsContainer').append(newFields);
            }
        });

        // Functionality to remove an item
        $(document).on('click', '.removeItemBtn', function() {
            $(this).closest('.itemRow').remove();
        });
    });



    //payment calculation
    $(document).ready(function() {
        function updateTotalAndDue() {
            var total = 0;
            $('.itemRow').each(function() {
                var qty = $(this).find('[name*="quantity"]').val();
                var price = $(this).find('[name*="price"]').val();
                total += qty * price;
            });
            $('#total').val(total.toFixed(2));

            var advance = parseFloat($('#advance').val()) || 0;
            var due = total - advance;
            $('#due').val(due.toFixed(2));
        }

        // Update total and due when quantity or price changes
        $(document).on('change', '[name*="quantity"], [name*="price"]', updateTotalAndDue);

        // Update due when advance changes
        $('#advance').on('change', updateTotalAndDue);

        // Initial calculation
        updateTotalAndDue();
    });











</script>
