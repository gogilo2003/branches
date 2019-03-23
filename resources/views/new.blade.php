@extends('admin::layout.main')

@section('title')
    Branches::New
@endsection

@section('page_title')
    <i class="fa fa-list-alt"></i> Branches::New
@endsection

@section('breadcrumbs')
    @parent
    <li class="active"><span><i class="fa fa-list-alt"></i> Branches</span></li>
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