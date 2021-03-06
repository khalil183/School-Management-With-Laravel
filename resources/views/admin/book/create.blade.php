@extends('admin.layout')
@section('admin-content')
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-6">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Book Form</h3>
            <a href="{{ route('admin.book.index') }}" class="btn btn-success pull-right"><i class="fa fa-list" aria-hidden="true"></i> Book List</a>
            </div><!-- /.box-header -->
            <div class="box-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('admin.book.store') }}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="name">Book Name</label>
                        <input name="name" id="name" type="text" class="form-control" placeholder="Bangla" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="code">Book Code</label>
                        <input name="code" id="code" type="text" class="form-control" placeholder="5230" value="{{ old('code') }}">
                    </div>


                    <button type="submit" class="btn btn-success">Add New</button>
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection
