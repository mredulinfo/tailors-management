

<div class="row">
  <div class="col-md-12 row dash-right-bar">



    <!-- ............................ -->
    <div class="col-md-12 ">
      <div class="row">
        <!-- .... -->
        <div class="col-md-7">
          <div class="card dash-record-box">
            <div class="card-header">
              <i class="fa fa-pencil"></i>Add Item
            </div>
            <div class="card-body">
              <!-- form  -->
              <div class="row">
                <div class="col-md-12">
                  <form>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="Measurement Name">Item Name</label>
                        <input type="text" name="Item_name" id="item_name" class="form-control">
                      </div>
                    </div>
                      <!--  -->
                    <button type="submit" class="btn btn-success" id="submit-btn-item">Save</button>
                  </form>
                </div>
              </div>
            </div>
            <!--...............-  -->
          </div>
        </div>

          <!--  Data table -->

          <div class="col-md-5 mb-5">
              <div class="card dash-record-box">
                  <div class="card-header">
                      <i class="fa fa-list"></i>Items
                  </div>
                  <div class="card-body">
                      <table id="catagory-list-table" class="display nowrap ">
                          <thead>
                          <tr>
                              <th>Item Name</th>
                              <th>Action</th>
                          </tr>
                          </thead>
                          <tbody>

                          @foreach($items as $item)
                              <tr>
                                  <td>
                                      {{$item->name}}
                                  </td>
                                  <td>
                                      <meta name="csrf-token" content="{{ csrf_token() }}">
{{--                                      <button data-id="{{ $measurement->id }}" class="cat-del btn btn-sm btn-success">Edit</button>--}}
                                      <button data-id="{{ $item->id }}" class="item-del btn btn-sm btn-danger">Delete</button>
                                  </td>
                              </tr>
                          @endforeach

                          </tbody>
                          <tfoot>
                          <tr>
                              <th>Item Name</th>
                              <th>Action</th>
                          </tr>
                          </tfoot>
                      </table>
                      <div id="div1"></div>
                  </div>
              </div>

          </div>


      </div>
    </div>





    <!--  -->

  </div>
</div>


{{--Script Area--}}




<script type="text/javascript">
{{--Add Catagory--}}

//ajax setup
jQuery(document).ready(function(){
    jQuery('#submit-btn-item').click(function(e){
        e.preventDefault();
        var item_name = $('#item_name').val();
        console.log(item_name);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
//Item add
        jQuery.ajax({
            url: "{{'/load/add_items'}}",
            method: 'post',
            data: {
                name: item_name, // Using the variable here
            },
            success: function (result) {

                $(".right-content").load("/load/items");
                alert("Successfully Added New Catagory");
            },
        });
    });
});




//New ajax delete request
$(".item-del").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        url: "/delete/item/"+id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (){
            console.log("it Works");
            $(".right-content").load("/load/items");
            alert("Successfully Measurement Deleted");
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
