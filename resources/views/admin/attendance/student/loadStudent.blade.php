<form action="{{ route('admin.student-attendance.store') }}" method="POST">

    @csrf
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Image</th>
            <th>Student Id</th>
            <th>Attendance</th>
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
                    <input type="radio" name="attendance[{{ $item->student->id }}]" value="1">Present
                    <input type="radio" name="attendance[{{ $item->student->id }}]" value="0">Absance
                    <input type="hidden" name="id_card[{{ $item->student->id }}]" value="{{ $item->student->student_id }}">
                    <input type="hidden" name="student_id[]" value="{{ $item->student->id }}">
                    <input type="hidden" name="classId" value="{{ $classId }}">
                    <input type="hidden" name="yearId" value="{{ $yearId }}">
                    <input type="hidden" name="date" value="{{ $date }}">

                </td>
            </tr>
        @endforeach
    </tbody>

</table>

<button type="submit" class="btn btn-success">Take Attendance</button>
</form>
