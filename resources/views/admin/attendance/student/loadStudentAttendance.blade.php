<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Student Id</th>
            <th>Attendance</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $key=> $item)
            <tr>
                <td>{{ $item->student->name }}</td>
                <td><img src="{{ url($item->student->photo) }}" width="50px" alt=""></td>
                <td>{{ $item->student->student_id }}</td>
                <td>

                    {{ ($item->attendances->where('attendance',1)->count()/$item->attendances->count()) * 100 }} %

                </td>
            </tr>
        @endforeach
    </tbody>

</table>
