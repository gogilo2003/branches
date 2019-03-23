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
    Put content details
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