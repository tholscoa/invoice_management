@extends('crudgenerator::layouts.master')

@section('fav-title')
    Project Table
@endsection
@section('page-title')
    Projects Table
@endsection


@section('content')



<h2 class="page-header">Project</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Project    </div>

    <div class="panel-body">


        <form action="{{ url('/projects') }}" method="POST" class="form-horizontal">



        {{-- <div class="form-group">
            <label for="id" class="col-sm-3 control-label">Id</label>
            <div class="col-sm-6">
                <input type="text" name="id" id="id" class="form-control" value="{{$model->id}}" readonly="readonly">
            </div>
        </div> --}}


        <div class="form-group">
            <label for="project_name" class="col-sm-3 control-label">Project Name</label>
            <div class="col-sm-6">
                <input type="text" name="project_name" id="project_name" class="form-control" value="{{$model->project_name}}" readonly="readonly">
            </div>
        </div>


        <div class="form-group">
            <label for="client_id" class="col-sm-3 control-label">Client</label>
            <div class="col-sm-6">
                <input type="text" name="client_id" id="client_id" class="form-control" value="{{$model->clients->client_name}}" readonly="readonly">
            </div>
        </div>


        <div class="form-group">
            <label for="start_date" class="col-sm-3 control-label">Start Date</label>
            <div class="col-sm-6">
                <input type="text" name="start_date" id="start_date" class="form-control" value="{{$model->start_date}}" readonly="readonly">
            </div>
        </div>


        <div class="form-group">
            <label for="duration" class="col-sm-3 control-label">Duration</label>
            <div class="col-sm-6">
                <input type="text" name="duration" id="duration" class="form-control" value="{{$model->duration}}" readonly="readonly">
            </div>
        </div>


        <div class="form-group">
            <label for="next_due_date" class="col-sm-3 control-label">Next Due Date</label>
            <div class="col-sm-6">
                <input type="text" name="next_due_date" id="next_due_date" class="form-control" value="{{$model->next_due_date}}" readonly="readonly">
            </div>
        </div>


        <div class="form-group">
            <label for="amount" class="col-sm-3 control-label">Amount</label>
            <div class="col-sm-6">
                <input type="text" name="amount" id="amount" class="form-control" value="{{$model->amount}}" readonly="readonly">
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
                <a class="btn btn-default" href="{{ url('/projects') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection
