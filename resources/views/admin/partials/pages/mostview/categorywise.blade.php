@extends('admin.master')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-12 col-sm-9 col-md-9">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">
                        <strong style="color: red;">
                          Category Wise Views
                        </strong>
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>post Name</th>
                          <th>post Description</th>
                          <th>User Name</th>
                          <th>User Image</th>
                          <th>Created_at</th>
                          <th>1min View</th>
                          <th>5min View</th>
                          <th>10min View</th>
                          <th>Total View</th>
                          <th>Total Comment</th>
                        </tr>
                        </thead>
                        <tbody>                                
                            <tr>
                                <td>post name</td>
                                <td>post description</td>
                                <td>User Name</td>
                                <td>User Image</td>
                                <td>10-08-23</td>
                                <td>5</td>
                                <td>543</td>
                                <td>2543</td>
                                <td>25436457</td>
                                <td>4</td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
      
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection