<div class="row">
  <div class="col-md-12 row dash-right-bar">



    <!-- ............................ -->
    <div class="col-md-12 ">
      <div class="row">
        <!-- .... -->
        <div class="col-md-5">
          <div class="card dash-record-box">
            <div class="card-header">
              Add Order
            </div>
            <div class="card-body">
              <!-- form  -->
              <div class="row">
                <div class="col-md-12">
                  <form id="myForm">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="birthday">Date</label>
                            <input type="date" id="order_date" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Cloth Code</label>
                            <input type="name" id="cloth_code" class="form-control">
                        </div>
{{--                        <div class="form-group col-md-12">--}}
{{--                            <label for="Name">Pre Customer Name</label>--}}
{{--                            <select id="customer_id" class="form-control">--}}
{{--                                @foreach($customers as $customer)--}}

{{--                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>--}}

{{--                                @endforeach--}}
{{--                            </select>--}}

{{--                    </div>--}}
                      <div class="form-group col-md-12">
                        <label for="Name">Customer Name</label>
                        <input type="name" id="cus_name" class="form-control">
                      </div>
                      <div class="form-group col-md-12">
                        <label for="Name">Mobile</label>
                        <input type="name" id="customer_mobile" class="form-control">
                      </div>
                      <!-- multiple select -->
                      <div class="form-group col-md-12">
                        <label for="Name">Product Name</label>
                        <input type="name" id="product_name" class="form-control">
                      </div>
                      <!--  -->
                      <div class="form-group col-md-3">
                        <label for="inputEmail4">H</label>
                        <input type="name" id="cus_h" class="form-control">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputEmail4">N</label>
                        <input type="name" id="cus_n" class="form-control">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputEmail4">B</label>
                        <input type="name" id="cus_b" class="form-control">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputEmail4">W</label>
                        <input type="name" id="cus_w" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Order Processed By</label>
                        <input type="name" id="order_by" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Remark</label>
                        <input type="name" id="order_remark" class="form-control">
                      </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Total</label>
                            <input type="name" id="order_total" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Advance</label>
                            <input type="name" id="order_advance" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Due</label>
                            <input type="name" id="order_due" class="form-control">
                        </div>
                    <button type="submit" id="submit-btn" class="btn btn-primary">Order</button>
                        <div class="col-md-12 alert-success form-alert">
                            <div class="form-alert-child"></div>
                        </div>
                  </form>
                </div>
              </div>
            </div>
            <!--...............-  -->
          </div>
        </div>
      </div>

      <!-- .... -->
        <div class="col-md-6 mb-5">
            <div class="card dash-record-box">
                <div class="card-header">
                    <i class="fa fa-list"></i>Product List
                </div>
                <div class="card-body">
                    <table id="order-process-list" class="display nowrap">
                        <thead>
                        <tr>
                            <th>Cloth ID</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Products</th>
                            <th>Cus-H</th>
                            <th>Cus-N</th>
                            <th>Cus-B</th>
                            <th>Cus-W</th>
                            <th>Process</th>
                            <th>Remark</th>
                            <th>Total</th>
                            <th>Advance</th>
                            <th>Due</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->cloth_code}}</td>
                                <td>trial</td>
                                <td>{{$order->customer_name}}</td>
                                <td>{{$order->mobile}}</td>
                                <td>{{$order->product_name}}</td>
                                <td>{{$order->cus_h}}</td>
                                <td>{{$order->cus_n}}</td>
                                <td>{{$order->cus_b}}</td>
                                <td>{{$order->cus_w}}</td>
                                <td>{{$order->process_by}}</td>
                                <td>{{$order->remark}}</td>
                                <td>{{$order->order_total}}</td>
                                <td>{{$order->order_advance}}</td>
                                <td>{{$order->order_due}}</td>
                                <td><a href="#" class="btn btn-sm btn-danger">Delete</a></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Cloth ID</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Products</th>
                            <th>Cus-H</th>
                            <th>Cus-N</th>
                            <th>Cus-B</th>
                            <th>Cus-W</th>
                            <th>Process</th>
                            <th>Remark</th>
                            <th>Total</th>
                            <th>Advance</th>
                            <th>Due</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
      <!-- Inventory report today -->
{{--{{$orders->customer->name}}--}}




    <!--  -->
  </div>
</div>
</div>
</div>



<!--  -->
<script type="text/javascript">



    // var btnn= document.getElementById('submit-btn');
    // btnn.onclick = function () {
    //     if(event.preventDefault)
    //         event.preventDefault();
    //     else
    //         event.returnValue = false;
    //ajax setup
    jQuery(document).ready(function(){
        jQuery('#submit-btn').click(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
//order add
            jQuery.ajax({
                url: "{{'/order/create'}}",
                type: "POST",
                data: {
                    order_id: jQuery('#order_id').val(),
                    order_date: jQuery('#order_date').val(),
                    cloth_code: jQuery('#cloth_code').val(),
                    cus_id: jQuery('#customer_id').val(),
                    cus_name: jQuery('#cus_name').val(),
                    cus_mobile: jQuery('#customer_mobile').val(),
                    cus_product: jQuery('#product_name').val(),
                    cus_h: jQuery('#cus_h').val(),
                    cus_n: jQuery('#cus_n').val(),
                    cus_b: jQuery('#cus_b').val(),
                    cus_w: jQuery('#cus_w').val(),
                    order_pro: jQuery('#order_by').val(),
                    order_remark: jQuery('#order_remark').val(),
                    order_total: jQuery('#order_total').val(),
                    order_advance: jQuery('#order_advance').val(),
                    order_due: jQuery('#order_due').val(),
                },
                success: function (result) {
                    $('#order_id').val('');
                    $('#order_date').val('');
                    $('#cloth_code').val('');
                    $('#cus_name').val('');
                    $('#customer_mobile').val('');
                    $('#product_name').val('');
                    $('#cus_h').val('');
                    $('#cus_n').val('');
                    $('#cus_b').val('');
                    $('#cus_w').val('');
                    $('#order_by').val('');
                    $('#order_remark').val('');
                    $('#order_total').val('');
                    $('#order_advance').val('');
                    $('#order_due').val('');
                    $(".right-content").load("/load/add_order");
                },
            });
        });
    });
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
</script>
