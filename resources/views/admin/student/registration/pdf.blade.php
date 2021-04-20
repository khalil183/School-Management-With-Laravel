<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
    <style>
        .wrapper{
            text-align: center;
            width: 980px;
            background: rgb(184, 167, 167);
            margin-left: 180px;
            padding: 0%;

        }
        .wrapper .mid{
            display: inline-block;
        }
        .wrapper .right{
            display: inline-block;
            float: right;
            margin-right: 50px;
        }

        .right img{
            margin-top: 50px;
        }



    </style>
</head>
<body>
    <div class="wrapper">
        <div class="mid">
            <h1>Khamar para hight school</h1>
            <p>Khanshama, Dinajpur</p>
        </div>
        <div class="right">
            <img src="{{ url($student->photo) }}" alt="" width="120px">
        </div>
        <div class="content">
            <table>
                <tr>
                    <td>Name</td>
                    <td>{{ $student->name }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
