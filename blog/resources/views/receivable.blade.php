<div class="col-md-12">
  <div class="card dash-record-box">
    <div class="card-header" style="background-color:#856c8b;">
      Sale Receivable List
    </div>
    <div class="card-body">
      <table id="receivable-list" class="display nowrap table">
      <thead class="thead-dark">
          <tr>
              <th>Vouchar</th>
              <th>Product Name</th>
              <th>Customer Name</th>
              <th>Phone</th>
              <th>Unit</th>
              <th>Unit Price</th>
              <th>Total</th>
          </tr>
      </thead>
      <tbody>

      </tbody>
      <tfoot class="thead-dark">
          <tr>
            <th>Vouchar</th>
            <th>Product Name</th>
            <th>Customer Name</th>
            <th>Phone</th>
            <th>Unit</th>
            <th>Unit Price</th>
            <th>Total</th>
          </tr>
      </tfoot>
  </table>

        </div>
      </div>
    </div>





    <!-- script -->


<script type="text/javascript">

$('#receivable-list').DataTable( {
  
    dom: 'lBfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf','print'
    ],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]

});

</script>







<!--  -->
