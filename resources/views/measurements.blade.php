

<div class="row">
  <div class="col-md-12 row dash-right-bar">



    <!-- ............................ -->
    <div class="col-md-12 ">
      <div class="row">
        <!-- .... -->
        <div class="col-md-7">
          <div class="card dash-record-box">
            <div class="card-header">
              <i class="fa fa-pencil"></i>Add Measurement
            </div>
            <div class="card-body">
              <!-- form  -->
              <div class="row">
                <div class="col-md-12">
                  <form>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="Measurement Name">Measurement Name</label>
                        <input type="text" name="measurement_name" id="measurement_name" class="form-control">
                      </div>
                    </div>
                      <!--  -->
                    <button type="submit" class="btn btn-success" id="submit-btn-measurement">Save</button>
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
                      <i class="fa fa-list"></i>Measurements
                  </div>
                  <div class="card-body">
                      <table id="catagory-list-table" class="display nowrap ">
                          <thead>
                          <tr>
                              <th>Measurements Name</th>
                              <th>Action</th>
                          </tr>
                          </thead>
                          <tbody>

                          @foreach($measurements as $measurement)
                              <tr>
                                  <td>
                                      {{$measurement->name}}
                                  </td>
                                  <td>
                                      <meta name="csrf-token" content="{{ csrf_token() }}">
{{--                                      <button data-id="{{ $measurement->id }}" class="cat-del btn btn-sm btn-success">Edit</button>--}}
                                      <button data-id="{{ $measurement->id }}" class="measurement-del btn btn-sm btn-danger">Delete</button>
                                  </td>
                              </tr>
                          @endforeach

                          </tbody>
                          <tfoot>
                          <tr>
                              <th>Measurements Name</th>
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
    jQuery('#submit-btn-measurement').click(function(e){
        e.preventDefault();
        var measurement_name = $('#measurement_name').val();
        console.log(measurement_name);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
//catagory add
        jQuery.ajax({
            url: "{{'/load/add_measurements'}}",
            method: 'post',
            data: {
                name: measurement_name, // Using the variable here
            },
            success: function (result) {

                $(".right-content").load("/load/measurements");
                alert("Successfully Added New Catagory");
            },
        });
    });
});




//New ajax delete request
$(".measurement-del").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        url: "/delete/measurements/"+id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (){
            console.log("it Works");
            $(".right-content").load("/load/measurements");
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
