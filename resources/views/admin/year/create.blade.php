@extends('admin.layout')
@section('admin-content')
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-6">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Year Form</h3>
            <a href="{{ route('admin.year.index') }}" class="btn btn-success pull-right"><i class="fa fa-list" aria-hidden="true"></i> Year List</a>
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
                <form action="{{ route('admin.year.store') }}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input name="year" id="year" type="text" class="form-control" placeholder="{{ date('Y') }}" value="{{ old('year') }}">
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
