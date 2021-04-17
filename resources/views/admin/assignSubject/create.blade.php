@extends('admin.layout')
@section('admin-content')
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-6">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Assign subject Form</h3>
            <a href="{{ route('admin.assign-subject.index') }}" class="btn btn-success pull-right"><i class="fa fa-list" aria-hidden="true"></i> Subject List</a>
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
                <form action="{{ route('admin.assign-subject.store') }}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="class">Class Name</label>
                        <select name="class" id="class" class="form-control">
                            <option value="">Select Class</option>
                            @foreach ($classes as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">Subject Name</label>
                        <select name="subject" id="subject" class="form-control">
                            <option value="">Select Subject</option>
                            @foreach ($books as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="full_mark">Total Mark</label>
                        <input name="full_mark" id="full_mark" type="number" class="form-control" placeholder="100" value="{{ old('full_mark') }}">
                    </div>

                    <div class="form-group">
                        <label for="pass_mark">Pass Mark</label>
                        <input name="pass_mark" id="pass_mark" type="number" class="form-control" placeholder="100" value="{{ old('pass_mark') }}">
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
