<html lang="en">
<head>
    <title>Overview Pending Tasks</title>
    <style>
        body{
            background-color:#eeeeee;
            color:#333;
        }
        table{
            width:100%
        }
    </style>
</head>
<body>
    <div style="background-color:white; width:600px; margin:0 auto; padding:20px; border-radius:8px; margin-top:20px; box-shadow: #1b1e21">
        <h2>Pending Tasks ({{$tasks->count()}}):</h2>
        <table>
            @foreach($tasks as $task)
                <tr>
                    <td> {{ $task->lead->name }}</td>
                    <td> {{ $task->task }}</td>
                    <td> {{ $task->description }}</td>
                    <td> {{ $task->date->format('m-d-Y') }}</td>
                </tr>
            @endforeach
        </table>

        <p> Come on on complete them! </p>
    </div>
    <div style="width:600px; margin: 0 auto; margin-top:20px; color:#999; text-align:center">
        Revo - Overview
    </div>
</body>
</html>