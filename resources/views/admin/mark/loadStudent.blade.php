<form action="{{ route('admin.mark.store') }}" method="POST">

    @csrf
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Image</th>
            <th>Student Id</th>
            <th>Mark</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $key=> $item)
            <tr>
                <td>{{ $item->student->name }}</td>
                <td>{{ $item->student->phone }}</td>
                <td><img src="{{ url($item->student->photo) }}" width="50px" alt=""></td>
                <td>{{ $item->student->student_id }}</td>
                <td>
                    <input type="text" name="marks[]">
                    <input type="hidden" name="id_card[]" value="{{ $item->student->student_id }}">
                    <input type="hidden" name="student_id[]" value="{{ $item->student->id }}">
                    <input type="hidden" name="examId" value="{{ $examId }}">
                    <input type="hidden" name="subjectId" value="{{ $subjectId }}">
                    <input type="hidden" name="classId" value="{{ $classId }}">
                    <input type="hidden" name="yearId" value="{{ $yearId }}">

                </td>
            </tr>
        @endforeach
    </tbody>

</table>

<button type="submit" class="btn btn-success">Submit Marks</button>
</form>
