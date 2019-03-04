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
     <div class='pm-button'><a href='https://www.payumoney.com/paybypayumoney/#/FA6B84046D2CEB422E624ABBCEF503B7'><img src='https://www.payumoney.com/media/images/payby_payumoney/new_buttons/21.png' /></a></div> 
        <a href="/addeventurl" class='btn btn-primary m-2'>Add Event</a>
        <a href="/displaydata" class='btn btn-primary m-2'>edit Event</a>
        <a href="/deleteeventurl" class='btn btn-primary m-2'>delete Event</a>


     </div>
     <div class="row">
            

          </div>
     </div>
       <div class="row">
          <div class="col-md-8 mr-auto ml-auto">
            <div class="card">
               <div class="card-body">
                  <div class="card-header">
                    Full Calender
                  </div>
                  <p class="card-text">
                  {!! $calender->calendar() !!}
                    {!! $calender->script() !!}
                  </p>
               </div>
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