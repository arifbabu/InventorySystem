@extends('admin.master')
@section('content')
    <!-- Main content --><section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="compose.html" class="btn btn-primary btn-block mb-3">Compose</a>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Folders</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <a href="{{route('admin.email.index')}}" class="nav-link">
                    <i class="fas fa-inbox"></i> Inbox
                    <span class="badge bg-primary float-right">12</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-envelope"></i> Sent
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-file-alt"></i> Drafts
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-filter"></i> Junk
                    <span class="badge bg-warning float-right">65</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-trash-alt"></i> Trash
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Labels</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle text-danger"></i>
                    Important
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle text-warning"></i> Promotions
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle text-primary"></i>
                    Social
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Inbox</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Search Mail">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                {{-- <button type="button" class="btn btn-default btn-sm checkbox-toggle"> --}}
                  {{-- <input type="checkbox" value="" id="checkPermissionAll"> --}}
                  {{-- <input type="checkbox" value="" id="checkboxesMain"> --}}
                {{-- </button> --}}
                <input type="checkbox" id="checkboxesMain">
                <button class="btn btn-primary btn-xs removeAll mb-3">Remove All Selected Data</button>
                <!-- /.btn-group -->
                <button type="checkbox" class="btn btn-default btn-sm">
                  <i class="fas fa-sync-alt"></i>
                </button>
                <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-right"></i>
                    </button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                {{-- <table class="table table-hover table-striped"> --}}



                  @foreach ($userMails as $mail)                        
                <a href="{{route('mail.show', $mail->id)}}">
                  <table class="table table-hover ">
                    <tbody>
                      {{-- <tr> --}}
                        <tr id="tr_{{$mail->id}}">
                        <td>
                          <div class="icheck-primary">
                            {{-- <input type="checkbox" class="checkbox" value="" id="{{$mail->id}}" data-id="{{$mail->id}}">
                            <label for="{{$mail->id}}"></label> --}}
                            <td><input type="checkbox" class="checkbox" data-id="{{$mail->id}}"></td>
                          </div>
                          <td class="mailbox-id"><a >{{$mail->id}}</a></td>
                        </td>
                        {{-- <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td> --}}
                        <td class="mailbox-name"><a >{{$mail->name}}</a></td>
                        <td class="mailbox-subject">
                          {{$mail->comment}}
                        </td>
                        <td class="mailbox-attachment"></td>
                        <td class="mailbox-date">
                          {{$mail->created_at->format('F j, Y')}}
                        </td>
                        <td class="mailbox-date">
                          {{-- <form action="{{ route('mail.single.destroy', [$mail->id]) }}" class="mr-1" method="post">
                            @csrf 
                            <button type="submit" class="btn btn-sm btn-default"> <i class="fas fa-trash"></i> </button>
                        </form> --}}
                        <a href="javascript:void(0)" class="email_delete" data-id="{{$mail->id}}"><i
                          class="fa fa-trash" aria-hidden="true" style="font-size:12px"></i></a>
                        <a href="javascript:void(0)" class="email_delete" data-id="{{$mail->id}}"><i
                          class="fas fa-envelope-open" aria-hidden="true" style="font-size:12px"></i></a>
                        <a href="javascript:void(0)" class="email_delete" data-id="{{$mail->id}}"><i
                          class="fa-regular fa-envelope" aria-hidden="true" style="font-size:12px"></i></a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </a>
                @endforeach



                {{$userMails->links()}}
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@endsection