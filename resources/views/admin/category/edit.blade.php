@extends('admin.layout.master')

@section('title')
    Edit Category
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>Edit</small>
                </h1>
            </div>
            @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
            @endif
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Category Name</label>
                        <input class="form-control" value="{{$category->name}}" name="name" placeholder="Please Enter Category Name" />
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Category Code</label>
                        <input class="form-control" value="{{$category->code}}" name="code" placeholder="Please Enter Category Code" />
                        @error('code')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-default">Category Edit</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection