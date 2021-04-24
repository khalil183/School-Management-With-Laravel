@extends('admin.layout')
@section('admin-content')
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-6">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Grad Point Form</h3>
            <a href="{{ route('admin.grad-point.index') }}" class="btn btn-success pull-right"><i class="fa fa-list" aria-hidden="true"></i> Grad Point List</a>
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
                <form action="{{ route('admin.grad-point.store') }}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="start_point">Start Point</label>
                        <input name="start_point" id="start_point" type="text" class="form-control" placeholder="0.00" value="{{ old('start_point') }}">
                    </div>
                    <div class="form-group">
                        <label for="end_point">End Point</label>
                        <input name="end_point" id="end_point" type="text" class="form-control" placeholder="0.00" value="{{ old('end_point') }}">
                    </div>
                    <div class="form-group">
                        <label for="start_mark">Start Mark</label>
                        <input name="start_mark" id="start_mark" type="text" class="form-control" placeholder="0.00" value="{{ old('start_mark') }}">
                    </div>
                    <div class="form-group">
                        <label for="start_mark">End Mark</label>
                        <input name="end_mark" id="end_mark" type="text" class="form-control" placeholder="0.00" value="{{ old('end_mark') }}">
                    </div>
                    <div class="form-group">
                        <label for="grade">Grade</label>
                        <input name="grade" id="grade" type="text" class="form-control" placeholder="A+" value="{{ old('grade') }}">
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
