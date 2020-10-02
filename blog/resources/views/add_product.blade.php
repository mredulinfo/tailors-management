

<div class="row">
  <div class="col-md-12 row dash-right-bar">



    <!-- ............................ -->
    <div class="col-md-12 ">
      <div class="row">
        <!-- .... -->
        <div class="col-md-7">
          <div class="card dash-record-box">
            <div class="card-header">
              <i class="fa fa-pencil"></i>Add Product
            </div>
            <div class="card-body">
              <!-- form  -->
              <div class="row">
                <div class="col-md-12">
                  <form>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Item Name</label>
                        <input type="name" name="customer_id" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                      <label for="">Type</label>
                      <select class="form-control">
                        <option>Inventory</option>
                        <option>Purchase</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="Name">Select Catagory</label>
                          <select id="customer_id" class="form-control">--}}
                              @foreach($catagories as $catagory)
                                  <option value="{{ $catagory->id }}">
                                      {{ $catagory->name }}
                                  </option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="Name">Quantity</label>
                        <input type="number" class="form-control">
                      </div>

                      <!--  -->
                    <button type="submit" class="btn btn-success">Save</button>
                  </form>
                </div>
              </div>
            </div>
            <!--...............-  -->
          </div>
        </div>
      </div>
      <!-- ....Catagory-->
      <div class="col-md-5">
        <div class="card dash-record-box">
          <div class="card-header" style="background-color: #6983aa;">
            <i class="fa fa-pencil"></i>Add Catagory
          </div>
          <div class="card-body">
            <!-- form  -->
            <div class="row">
              <div class="col-md-12">
                <form id="my-form">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Catagory Name</label>
                      <input type="name" id="cat-name" class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                      <label for="Name">Description</label>
                      <input type="name" id="cat-description" class="form-control">
                    </div>
                  <button type="submit" id="submit-btn-cat" class="btn btn-success">Save</button>
                </form>
              </div>
            </div>
          </div>
          <!--...............-  -->
        </div>
      </div>
    </div>



      <!-- New Data table -->

      <div class="col-md-7 mb-5">
        <div class="card dash-record-box">
          <div class="card-header">
            <i class="fa fa-list"></i>Product List
          </div>
          <div class="card-body">
            <table id="product-list-table" class="display nowrap">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Catagory</th>
                    <th>Color</th>
                    <th>Current Qty</th>
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

      </div>


      <!-- catagory -->
      <div class="col-md-5 mb-5">
        <div class="card dash-record-box">
          <div class="card-header">
            <i class="fa fa-list"></i>Catagories
          </div>
          <div class="card-body">
            <table id="catagory-list-table" class="display nowrap ">
            <thead>
                <tr>
                    <th>Catagory Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            @foreach($catagories as $catagory)
                <tr>
                <td>
                    {{$catagory->name}}
                </td>
                <td>
                    {{$catagory->description}}
                </td>
                <td>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <button data-id="{{ $catagory->id }}" class="cat-del btn btn-sm btn-success">Edit</button>
                    <button data-id="{{ $catagory->id }}" class="cat-del btn btn-sm btn-danger">Delete</button>
                </td>
                </tr>
             @endforeach

            </tbody>
            <tfoot>
                <tr>
                  <th>Catagory Name</th>
                  <th>Description</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
              <div id="div1"></div>
          </div>
        </div>

      </div>

    <!--  -->

  </div>
</div>
</div>


{{--Script Area--}}




<script type="text/javascript">
{{--Add Catagory--}}

//ajax setup
jQuery(document).ready(function(){
    jQuery('#submit-btn-cat').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
//catagory add
        jQuery.ajax({
            url: "{{'/catagory/create'}}",
            method: 'post',
            data: {
                cat_name: jQuery('#cat-name').val(),
                cat_description: jQuery('#cat-description').val(),
            },
            success: function (result) {
                $('#order_id').val('');
                $('#order_date').val('');
                $(".right-content").load("/load/add_product");
                alert("Successfully Added New Catagory");
            },
        });
    });
});




//New ajax delete request
$(".cat-del").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        url: "/delete/cat/"+id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (){
            console.log("it Works");
            $(".right-content").load("/load/add_product");
            alert("Successfully Catagory Deleted");
        }
    });
});

//finishing of ajax setup bracket







{{-- ----------- Data Tables  --}}
    $('#product-list-table').DataTable( {

      "scrollY": 200,
    dom: 'lBfrtip',
    buttons: [
    'copy', 'csv', 'excel', 'pdf','print'
    ],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    });


    $('#catagory-list-table').DataTable({
        "scrollY": 200,
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf','print'
        ],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    });

</script>


<!--  -->
