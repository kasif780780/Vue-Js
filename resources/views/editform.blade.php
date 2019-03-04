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
              <form action="{{action('EventController@update',$id)}}" method="POST">
               {{csrf_field()}}
               <input type="hidden" name="_method" value="UPDATE">
                <div class="form-froup">
                   <label for="">name</label>
                   <input type="text" class="form-control" name='title' palceholder="Enter Name" value="{{$events->title}}">
                </div>
                <div class="form-froup">
                   <label for="">Event Color </label>
                   <input type="color" class="form-control" name='color' palceholder="Enter Name" value="{{$events->color}}">
                </div>
                <div class="form-froup">
                   <label for="">Start Date</label>
                   <input type="date" class="form-control" name='start_date' palceholder="Enter your Start Date" value="{{$events->start_date}}">
                </div>
                <div class="form-froup">
                   <label for="">End Date</label>
                   <input type="date" class="form-control" name='end_date' palceholder="Enter Name" value="{{$events->end_date}}">
                </div>
                {{method_field('PUT')}}
               <button  type="submit" name="submit" class="btn btn-success">Update Data</button>
              
              </form>
           </div>
        </div>
     </div>
</body>
</html>