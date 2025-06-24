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
                      <h3 class="card-title">Email Trash Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>SI</th>
                          <th>Name</th>
                          <th>email</th>
                          <th>Created-At</th>
                          <th>Deleted-At</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>  
                          @foreach ($emailTrashes as $email)                              
                          <tr>
                            <td>{{$email->id}}</td>                    
                            <td>{{$email->name}}</td>                    
                            <td>{{$email->email}}</td>
                            <td>{{$email->created_at->format('F j, Y')}}</td>   
                            <td>{{$email->deleted_at->format('F j, Y')}}</td>                
                            <td>
                                <a class="restoreEmail" data-id="{{$email->id}}">
                                  <i class="fas fa-trash-restore" style="font-size: 18px; color:green;"></i>
                                </a>
                                <a class="permanentDeleteEmail" data-id="{{$email->id}}">
                                  <i class="fas fa-trash" style="font-size: 18px; color:red;"></i>
                                </a>
                            </td> 
                              </tr>                   
                                @endforeach                  
                        </tbody>
                      </table>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 mx-auto col-md-1 col-sm-6 smallColumn">
                        {{$emailTrashes->links()}}
                      </div>
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