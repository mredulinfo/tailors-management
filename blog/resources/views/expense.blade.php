

<div class="row">
  <div class="col-md-12 row dash-right-bar">



    <!-- ............................ -->
    <div class="col-md-12 ">
      <div class="row">
        <!-- .... -->
      <!-- ....Expense Add-->
      <div class="col-md-5">
        <div class="card dash-record-box">
          <div class="card-header" style="background-color: #6983aa;">
            <i class="fa fa-pencil"></i>Add Catagory
          </div>
          <div class="card-body">
            <!-- form  -->
            <div class="row">
              <div class="col-md-12">
                <form action="text.html" method="get">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Expense Name</label>
                      <input type="name" name="customer_id" class="form-control">
                    </div>
                    <!--  -->
                    <div class="form-group col-md-6">
                      <label for="birthday">Date</label>
                      <input type="date" id="birthday" name="customer_id" class="form-control">
                    </div>
                    <!--  -->
                    <div class="form-group col-md-6">
                      <label>Expense Type</label>
                      <input type="name" name="customer_id" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="Name">Payment Type</label>
                      <input type="name" name="customer_mobile" class="form-control">
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



      <!-- New Data table -->

      <div class="col-md-7 mb-4">
        <div class="card dash-record-box">
          <div class="card-header">
            <i class="fa fa-list"></i>Expense Table
          </div>
          <div class="card-body">
            <table id="expense-list-table" class="display nowrap">
            <thead>
                <tr>
                  <th>Date</th>
                  <th>Expese</th>
                  <th>Expense type</th>
                  <th>Payment type</th>
                </tr>
            </thead>
            <tbody>
              <tr>
                <td>good</td>
                <td>bad</td>
                <td>good</td>
                <td>bad</td>
              </tr>
              <tr>
                <td>good</td>
                <td>bad</td>
                <td>good</td>
                <td>bad</td>
              </tr>
            </tbody>
            <tfoot>
                <tr>
                  <th>Date</th>
                  <th>Expese</th>
                  <th>Expense type</th>
                  <th>Payment type</th>

                </tr>
            </tfoot>
        </table>
          </div>
        </div>

      </div>

    <!--  -->

  </div>
</div>
</div>
























      <!-- .... -->
      <!-- Inventory report today -->







<!--  -->

















<script type="text/javascript">




$('#expense-list-table').DataTable( {
  "scrollY": 200,
dom: 'lBfrtip',
buttons: [
'copy', 'csv', 'excel', 'pdf','print'
],
"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
});

</script>


<!--  -->
