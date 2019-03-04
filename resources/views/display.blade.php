<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
     crossorigin="anonymous">
</head>
<body>
    <div class="container">
       <div class="row">
          <div class="col-md-12">
          <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Color</th>
      <th scope="col">Start Date</th>
      <th scope="col">End Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  @foreach($events as $event)
  <tbody>
    <tr>
     
      <td>{{$event->id}}</td>
      <td>{{$event->title}}</td>
      <td>{{$event->color}}</td>
      <td>{{$event->start_date}}</td>
      <td>{{$event->end_date}}</td>
      <td><a href="{{action('EventController@edit',$event['id'])}}" class="btn btn-success">Edit</a></td>
      <td>
      <form method="POST" action="{{action('EventController@destroy',$event['id'])}}">
       {{csrf_field()}}
       <input type="hidden" name="_method" value="DELETE">
       <button type="submit" class="btn btn-danger"> delete</button>
      </form>
      </td>
      
    </tr>
   
   
  </tbody>
  @endforeach
</table>
          </div>
       </div>
    </div>
</body>
</html> 