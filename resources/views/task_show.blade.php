<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Task Manager</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
            .wrapper{
                width: 80%;
                margin: 0 auto;
            }
            table tr td:last-child{
                width: 120px;
            }
        </style>
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();   
            });
        </script>
    </head>
    <body >
        
        <div class="wrapper">
            <br>
            <h1>Task Manager</h1>
            <hr>
            <br>
            <div class="container-fluid">
                {{session('msg')}}
                <br>
                <form method="POST" action="task_show" id="showall" >
                    @csrf
                    <input type="checkbox" name="show" 
                    @if ($rshow=='on')
                        checked
                    @endif
                    onchange="document.getElementById('showall').submit();" /> Show All Tasks
                </form>
                
                <form method="POST" action="task_submit" >
                    @csrf
                    <input placeholder="Task Name" name="name" type="text" style="width: 80%"  required/>
                    <input type="submit" value="Add" style="width: 18%" /></td>
                </form>
                <br>
                <table class="table table-bordered table-striped" >
                    <thead>
                     </thead>
                    <tbody>
                    @foreach ($taskArr as $item)
                    <tr>
                    <td>
                        <form method="POST" action="task_completed/{{$item->id}}" id="task-id{{$item->id}}" >
                            @csrf
                            <input name="name" value="{{$item->name}}" type="hidden" />
                            <input type="checkbox" name="completed" value="{{$item->completed}}"
                            @if ($item->completed == 1)
                                checked
                            @endif 
                            onclick="document.getElementById('task-id{{$item->id}}').submit();" />
                        </form>
                    </td>
                    <td>{{$item->name}}
                    
                    </td>
                    <td>
                        @php
                            get_date_interval($item->created_at);
                        @endphp
                        
                    
                    </td>
                    <td>
                        <a href="task_delete/{{$item->id}}" onclick="alert('Are u sure to delete this task ?');"><i class="fa fa-trash"></i></a>
                    
                    </td>    
                    </tr>
                    @endforeach
                    </tbody>
                </table>
               
            </div>
        </div>
    </body>
</html>
