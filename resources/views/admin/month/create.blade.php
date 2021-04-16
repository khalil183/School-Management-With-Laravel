@extends('admin.layout')
@section('admin-content')
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-6">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Month Form</h3>
            <a href="{{ route('admin.month.index') }}" class="btn btn-success pull-right"><i class="fa fa-list" aria-hidden="true"></i> Month List</a>
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
                <form action="{{ route('admin.month.store') }}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="month">Month</label>
                        <input name="month" id="month" type="text" class="form-control" placeholder="{{ date('F') }}" value="{{ old('month') }}">
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
