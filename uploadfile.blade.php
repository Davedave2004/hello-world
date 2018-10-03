@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        @include('common.success')

        <!-- New Task Form -->
        <form action="/uploadfile/store" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">File</label>

                <div class="col-sm-6">
                    <input type="file" name="picture_file" id="picture_file">
                </div>
                <input type="hidden" name="account_type" value="RFM">
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Upload File
                    </button>
                </div>
            </div>
        </form>
    </div>

    <br>
    <img src="{{asset('storage/rfm/id-mo/2.png')}}">

    
@endsection