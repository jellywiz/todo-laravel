<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#062e3f">
    <meta name="Description" content="A dynamic and aesthetic To-Do List WebApp.">

    <!-- Google Font: Quick Sand -->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">

    <!-- font awesome (https://fontawesome.com) for basic icons; source: https://cdnjs.com/libraries/font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />

    <link rel="shortcut icon" type="image/png" href="assets/favicon.png"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/corner.css') }}" >

    <title>JUST DO IT</title>

</head>

<body>
<div id = "header">
    <div class="flexrow-container">
        <div class="standard-theme theme-selector"></div>
        <div class="light-theme theme-selector"></div>
        <div class="darker-theme theme-selector"></div>
        <form class="form-container-login" method="POST" action="/logout">
            @csrf
            <button type="submit" >
                <i class="fas fa-door-closed"></i>Logout
            </button>
        </form>
    </div>
    <h1 id="title">Just do it.<div id="border"></div></h1>
</div>

<div id="form">
    <form method="POST" action="/store-note">
        @csrf
        <input name="name" class="todo-input" type="text" placeholder="Add a task.">
        <button class="todo-btn" type="submit">I Got This!</button>
    </form>
</div>

<!-- div for top left corner -->
    <div>
        <p><span id="datetime"></span></p>
        <script src="JS/time.js"></script>
    </div>



    <div id="myUnOrdList">
        <ul class="todo-list">
            @if(count($notes) == 0)
                <p>No listing found</p>
            @endif
            @foreach($notes as $note)
                <div class="todo standard-todo">
                    <li>
                        {{$note->name}}
                    </li>
                    <form action="/note/{{$note->id}}/update-status" method="POST" class="delete-form-button">
                        @csrf
                        @method('PUT')
                        <button class="check-btn standard-button">
                            @if($note->status === 0)
                                <li class="fas fa-times"></li>
                            @else
                                <li class="fas fa-check"></li>
                            @endif
                        </button>
                    </form>
                    <form action="/note/{{$note->id}}/delete" method="POST" class="delete-form-button">
                        @csrf
                        @method('DELETE')
                        <button class="delete-btn standard-button">
                            <li class="fas fa-trash"> </li>
                        </button>
                    </form>
                </div>
{{--            <div class="todo">--}}
{{--                items added to this list:--}}

{{--                    <li>{{$note->name}}</li>--}}
{{--                <form method="POST" action="/note/{{$note->id}}/delete" >--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <button>delete</button>--}}
{{--                </form>--}}


{{--                <button>check</button>--}}
{{--            </div>--}}
            @endforeach
        </ul>
    </div>
    <script src="JS/main.js" type="text/javascript"> </script>
</body>
</html>
