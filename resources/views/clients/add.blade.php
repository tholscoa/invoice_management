@extends('crudgenerator::layouts.master')

@section('fav-title')
    Client Table
@endsection
@section('page-title')
    Clients Table
@endsection

@section('content')


<h2 class="page-header">Client</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Add/Modify Client    </div>

    <div class="panel-body">

        <form action="{{ url('/clients'. (isset($model) ? "/" . $model->id : "")) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            @if (isset($model))
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="{{$model->id}}">
            @endif



                                                                                                            <div class="form-group">
                <label for="client_name" class="col-sm-3 control-label">Client Name</label>
                <div class="col-sm-6">
                    <input type="text" name="client_name" id="client_name" class="form-control" value="{{(isset($model->client_name) ? $model->client_name : '')}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" name="email" id="email" class="form-control" value="{{(isset($model->email) ? $model->email : '')}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="phone" class="col-sm-3 control-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" name="phone" id="phone" class="form-control" value="{{(isset($model->phone) ? $model->phone : '')}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="other_details" class="col-sm-3 control-label">Other Details</label>
                <div class="col-sm-6">
                    <input type="text" name="other_details" id="other_details" class="form-control" value="{{(isset($model->other_details) ? $model->other_details : '')}}">
                </div>
            </div>
                                                                                                                                    <div class="form-group">

            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Save
                    </button>
                    <a class="btn btn-default" href="{{ url('/clients') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                </div>
            </div>
        </form>

    </div>
</div>






@endsection
