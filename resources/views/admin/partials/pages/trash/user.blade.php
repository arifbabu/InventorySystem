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
                      <h3 class="card-title">User Trash Table</h3>
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
                          @foreach ($userTrashes as $user)                              
                          <tr>
                            <td>{{$user->id}}</td>                    
                            <td>{{$user->name}}</td>                    
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->format('F j, Y')}}</td>   
                            <td>{{$user->deleted_at->format('F j, Y')}}</td>                
                            <td>
                                <a class="restoreUser" data-id="{{$user->id}}">
                                  <i class="fas fa-trash-restore" style="font-size: 18px; color:green;"></i>
                                </a>
                                <a class="permanentDeleteUser" data-id="{{$user->id}}">
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
                          {{$userTrashes->links()}}
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