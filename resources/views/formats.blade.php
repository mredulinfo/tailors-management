

<div class="row">
  <div class="col-md-12 row dash-right-bar">



    <!-- ............................ -->
    <div class="col-md-12 ">
      <div class="row">
        <!-- .... -->
        <div class="col-md-7">
          <div class="card dash-record-box">
            <div class="card-header">
              <i class="fa fa-pencil"></i>Add Format
            </div>
            <div class="card-body">
              <!-- form  -->
              <div class="row">
                <div class="col-md-12">
                  <form>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="Format Name">Format Name</label>
                        <input type="text" name="format_name" id="format_name" class="form-control">
                      </div>
                    </div>
                      <!--  -->
                    <button type="submit" class="btn btn-success" id="submit-btn-format">Save</button>
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
                      <i class="fa fa-list"></i>Format
                  </div>
                  <div class="card-body">
                      <table id="catagory-list-table" class="display nowrap ">
                          <thead>
                          <tr>
                              <th>Formats Name</th>
                              <th>Action</th>
                          </tr>
                          </thead>
                          <tbody>

                          @foreach($formats as $format)
                              <tr>
                                  <td>
                                      {{$format->name}}
                                  </td>
                                  <td>
                                      <meta name="csrf-token" content="{{ csrf_token() }}">
{{--                                      <button data-id="{{ $measurement->id }}" class="cat-del btn btn-sm btn-success">Edit</button>--}}
                                      <button data-id="{{ $format->id }}" class="measurement-del btn btn-sm btn-danger">Delete</button>
                                  </td>
                              </tr>
                          @endforeach

                          </tbody>
                          <tfoot>
                          <tr>
                              <th>Format Name</th>
                              <th>Action</th>
                          </tr>
                          </tfoot>
                      </table>
                      <div id="div1"></div>
                  </div>
              </div>

          </div>


      </div>
{{--        New Row--}}
        <div class="row">
            <div class="col-md-5">
                <label>Select Format</label>
                <select id="formatSelect">
                    @foreach ($formats as $format)
                        <option value="{{ $format->id }}">{{ $format->name }}</option>
                    @endforeach
                </select>

                <!-- Dropdown for Measurements -->
                <select id="measurementSelect" style="display: none;>
                    @foreach ($measurements as $measurement)
                        <option value="{{ $measurement->id }}">{{ $measurement->name }}</option>
                    @endforeach
                </select>
                <br>
                <div id="measurementTags"></div>

                <form id="myForm" method="POST" action="/submitMeasurements">
                    @csrf
                    <input type="hidden" name="formatId" id="hiddenFormatId">
                    <input type="hidden" name="measurementIds" id="hiddenMeasurementIds">
                    <button class="saveAssociations" type="submit">Submit</button>
                </form>



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
    jQuery('#submit-btn-format').click(function(e){
        e.preventDefault();
        var measurement_name = $('#format_name').val();
        console.log(measurement_name);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
//catagory add
        jQuery.ajax({
            url: "{{'/load/add_format'}}",
            method: 'post',
            data: {
                name: measurement_name, // Using the variable here
            },
            success: function (result) {

                $(".right-content").load("/load/formats");
                alert("Successfully Added New Format");
            },
        });
    });
});




//New ajax delete request
$(".measurement-del").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        url: "/delete/format/"+id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (){
            console.log("it Works");
            $(".right-content").load("/load/formats");
            alert("Successfully Format Deleted");
        }
    });
});

//finishing of ajax setup bracket



// Tagify Logics

$('#formatSelect').change(function() {
    var formatId = $(this).val();
    $('#measurementSelect').empty().hide();
    $('#measurementTags').empty(); // Clear existing tags
    selectedMeasurementIds.clear(); // Clear the set of selected IDs

    if (formatId) {
        $.ajax({
            url: '/measurements/' + formatId,
            type: 'GET',
            success: function(measurements) {
                measurements.forEach(function(measurement) {
                    $('#measurementSelect').append(new Option(measurement.name, measurement.id));

                    // Check if the measurement is already associated with the format
                    if (measurement.is_associated) {
                        selectedMeasurementIds.add(measurement.id);
                        var tag = $('<div class="tag">' + measurement.name +
                            '<span class="remove-tag" data-id="' + measurement.id + '">&times;</span></div>');
                        tag.appendTo($('#measurementTags'));
                    }
                });
                $('#measurementSelect').show();
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
});


// Create Tags for Selected Measurements
var selectedMeasurementIds = new Set(); // Use a Set to store unique measurement IDs

$('#measurementSelect').change(function() {
    var newlySelectedMeasurements = $(this).val();
    newlySelectedMeasurements = Array.isArray(newlySelectedMeasurements) ? newlySelectedMeasurements : newlySelectedMeasurements ? [newlySelectedMeasurements] : [];
    var tagsContainer = $('#measurementTags');

    newlySelectedMeasurements.forEach(function(measurementId) {
        // Add tag only if it's not already selected
        if (!selectedMeasurementIds.has(measurementId)) {
            selectedMeasurementIds.add(measurementId); // Add to the set of selected IDs

            var measurementText = $("#measurementSelect option[value='" + measurementId + "']").text();
            var tag = $('<div class="tag">' + measurementText +
                '<span class="remove-tag" data-id="' + measurementId + '">&times;</span></div>');
            tag.appendTo(tagsContainer);
        }
    });
});




// Event listener for removing tags
$(document).on('click', '.remove-tag', function() {
    var measurementId = $(this).data('id');
    selectedMeasurementIds.delete(measurementId); // Remove from the set of selected IDs

    // Remove the measurement from the dropdown selection
    $('#measurementSelect option[value="' + measurementId + '"]').prop('selected', false);
    $(this).parent().remove();
});




// assigning Format button and submit

$('.saveAssociations').click(function(e) {
    e.preventDefault(); // Prevent the default form submit action

    var formatId = $('#formatSelect').val();
    var measurementIds = Array.from(selectedMeasurementIds); // Convert Set to Array

    console.log(measurementIds);

    $.ajax({
        url: '/save_associations_format', // Update this URL as needed
        type: 'POST',
        data: {
            formatId: formatId,
            measurementIds: measurementIds,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token
        },
        success: function(response) {
            console.log(response);
            $('#measurementTags').empty(); // Clear the tags container
            $('#measurementSelect').val(null).trigger('change'); // Reset the dropdown selection
            selectedMeasurementIds.clear(); // Clear the set tracking selected measurements

            // Additional code to handle success
        },
        error: function(xhr, status, error) {
            console.error("Error occurred: " + error);
            // Error handling code
        }
    });
});













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
