@extends('layouts.admin_layout')
{{-- page title section --}}

@section('page-title')
Admin Home Page
@endsection

{{-- page title section end --}}
{{-- custom css files --}}
@section('css-scripts')
<link rel="stylesheet" href="css/home_page.css">
@endsection
{{-- custom css files ends --}}
{{-- main content section starts here --}}

@section('content')
<div class="container-fluid  main_container">
    <div class="row main_div">
        <div class="col-lg-8  blog_section">
            <h4>Blog post section </h4>
        </div>
        <div class="col-lg-4 popular_section">
            <div class="row">
                <h4>popular post categories here</h4>
            </div>
            <div class="row">
                <h4>popular post here</h4>
            </div>
        </div>
    </div>
</div>
@endsection
