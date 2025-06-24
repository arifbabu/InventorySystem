{{-- @extends('layouts.app') --}}

@extends('admin.master')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Role</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <hr> <hr>
    
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role Name : </strong>
                {{ $role->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permission Lists : </strong>
                @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $key=>$v)
                        <ol class="mx-5">
                            <li value="{{$key+1}}">{{ $v->name }}</li>
                            
                          </ol>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>


@endsection