@extends('admin::layout.main')

@section('title')
    Branches::Dashboard
@endsection

@section('page_title')
    <i class="fa fa-list-alt"></i> Branches::Dashboard
@endsection

@section('breadcrumbs')
    @parent
    <li><a href="{{ route('admin-branches') }}"><i class="fa fa-list-alt"></i> Branches</a></li>
    <li class="active"><span><i class="fa fa-plus"></i> New Branch</span></li>
@endsection

@section('sidebar')
    @parent

    @include('branches::sidebar')
@endsection

@section('content')
    <a href="{{ route('admin-branches-add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Branch</a>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th>Title</th>
                <th>Postal Address</th>
                <th>FaceBook</th>
                <th>Twitter</th>
                <th>Youtube</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($branches as $branch)
                <tr>
                    <td>{{ $loop->iterator }}</td>
                    <td>{{ $branch->title }}</td>
                    <td>P.O. Box {{ $branch->box_no }} - {{ $branch->post_code }}, {{ $branch->town }}</td>
                    <td>{{ $branch->facebook }}</td>
                    <td>{{ $branch->twitter }}</td>
                    <td>{{ $branch->youtube }}</td>
                    <td>
                        <a href="{{ route('admin-branches-edit',$branch->id) }}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                        <a href="{{ route('admin-branches-delete',$branch->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i> Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('styles')
    <style type="text/css">
        
    </style>
@endsection
@section('scripts_top')
    <script type="text/javascript">
        
    </script>
@endsection

@section('scripts_bottom')
    <script type="text/javascript">
    
    </script>
@endsection