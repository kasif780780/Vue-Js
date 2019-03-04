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
                  <div class="card mr-auto ml-auto">
                    <div class="card-body">
                     <h3>Add :add Task</h3>
                       <form method="POST" action="{{action('EventController@store')}}">
                       {{csrf_field()}}
                         <label for="">Enter Name Of Event</label>
                         <input type="text" class="form-control" name="title" placeholder="Enter the name"> <br>
                         <form action="">
                         <label for="">Enter Color</label>
                         <input type="color" class="form-control" name="color" placeholder="Enter the color"> <br>
                         <label for="">Enter Strat Date</label>
                         <input type="datetime-local" class="form-control" name="start_date" placeholder="Enter the start Date"> <br>
                         <label for="">Enter End Date</label>
                         <input type="datetime-local" class="form-control" name="end_date" placeholder="Enter the name"> <br>
                         <input type="submit" name="submit" class="btn btn-success" value="Add Event">

                       </form>
                    </div>
                  </div>
              </div>
           </div>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
 integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
 crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>