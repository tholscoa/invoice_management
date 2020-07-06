@extends('crudgenerator::layouts.master')
@section('fav-title')
    Client View
@endsection
@section('page-title')
    {{$model->client_name}} Details
@endsection

@section('content')



<h2 class="page-header">Client</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Client    </div>

    <div class="panel-body">


        <form action="{{ url('/clients') }}" method="POST" class="form-horizontal">



        {{-- <div class="form-group">
            <label for="id" class="col-sm-3 control-label">Id</label>
            <div class="col-sm-6">
                <input type="text" name="id" id="id" class="form-control" value="{{$model->id}}" readonly="readonly">
            </div>
        </div> --}}


        <div class="form-group">
            <label for="client_name" class="col-sm-3 control-label">Client Name</label>
            <div class="col-sm-6">
                <input type="text" name="client_name" id="client_name" class="form-control" value="{{$model->client_name}}" readonly="readonly">
            </div>
        </div>


        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-6">
                <input type="text" name="email" id="email" class="form-control" value="{{$model->email}}" readonly="readonly">
            </div>
        </div>


        <div class="form-group">
            <label for="phone" class="col-sm-3 control-label">Phone</label>
            <div class="col-sm-6">
                <input type="text" name="phone" id="phone" class="form-control" value="{{$model->phone}}" readonly="readonly">
            </div>
        </div>


        <div class="form-group">
            <label for="other_details" class="col-sm-3 control-label">Other Details</label>
            <div class="col-sm-6">
                <input type="text" name="other_details" id="other_details" class="form-control" value="{{$model->other_details}}" readonly="readonly">
            </div>
        </div>


        <div class="form-group">
            <label for="created_at" class="col-sm-3 control-label">Created At</label>
            <div class="col-sm-6">
                <input type="text" name="created_at" id="created_at" class="form-control" value="{{$model->created_at}}" readonly="readonly">
            </div>
        </div>


        <div class="form-group">
            <label for="updated_at" class="col-sm-3 control-label">Updated At</label>
            <div class="col-sm-6">
                <input type="text" name="updated_at" id="updated_at" class="form-control" value="{{$model->updated_at}}" readonly="readonly">
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/clients') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection
