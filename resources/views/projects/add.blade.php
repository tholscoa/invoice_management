@extends('crudgenerator::layouts.master')

@section('fav-title')
    Projects Table
@endsection
@section('page-title')
    Projects Table
@endsection

@section('content')


<h2 class="page-header">Project</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Add/Modify Project    </div>

    <div class="panel-body">

        <form action="{{ url('/projects'. (isset($model) ? "/" . $model->id : "")) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            @if (isset($model))
                <input type="hidden" name="_method" value="PATCH">
            @endif


            <div class="form-group" style="display: hidden">
                <label for="id" class="col-sm-3 control-label" hidden>Id</label>
                <div class="col-sm-6">
                    <input type="hidden" name="id" id="id" class="form-control" value="{{(isset($model->id) ? $model->id : '')}}" readonly="readonly">
                </div>
            </div>
                                                                                                            <div class="form-group">
                <label for="project_name" class="col-sm-3 control-label">Project Name</label>
                <div class="col-sm-6">
                    <input type="text" name="project_name" id="project_name" class="form-control" value="{{(isset($model->project_name) ? $model->project_name : '')}}">
                </div>
            </div>
                                                                                                            <div class="form-group">
                <label for="client_id" class="col-sm-3 control-label">Client</label>
                <div class="col-sm-2">
                    <select name="client_id">
                        @foreach ($clients as $client)
                            <option value="{{$client->id}}">{{$client->client_name}}</option>
                        @endforeach
                    </select>
                    {{-- <input type="number" name="client_id" id="client_id" class="form-control" value="{{(isset($model->client_id) ? $model->client_id : '')}}"> --}}
                </div>
            </div>
                                                                                                            <div class="form-group">
                <label for="start_date" class="col-sm-3 control-label">Start Date</label>
                <div class="col-sm-3">
                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{(isset($model->start_date) ? $model->start_date : '')}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="duration" class="col-sm-3 control-label">Duration</label>
                <div class="col-sm-3">
                    <input type="number" name="duration" placeholder="number of years" id="duration" class="form-control" value="{{(isset($model->duration) ? $model->duration : '')}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="next_due_date" class="col-sm-3 control-label">Next Due Date</label>
                <div class="col-sm-3">
                    <input type="date" name="next_due_date" id="next_due_date" class="form-control" value="{{(isset($model->next_due_date) ? $model->next_due_date : '')}}">
                </div>
            </div>
                                                                                                            <div class="form-group">
                <label for="amount" class="col-sm-3 control-label">Amount</label>
                <div class="col-sm-6">
                    <input type="text" name="amount" id="amount" class="form-control" value="{{(isset($model->amount) ? $model->amount : '')}}">
                </div>
            </div>
                                                                                                <div class="form-group">

            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Save
                    </button>
                    <a class="btn btn-default" href="{{ url('/projects') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                </div>
            </div>
        </form>

    </div>
</div>






@endsection
