<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>laravel ajax</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
  <script>
    $(document).ready(function(){
      $('#contactform').on('submit', function(e){
          e.preventDefault();
  
          $.ajax({
              type: 'POST',
              url: '/ajax',
              data: $('#contactform').serialize(),
              success: function(result){
                  alert('Success!');
              },
              error: function (jqXhr, json, errorThrown){// this are default for ajax errors 
                var errors = jqXhr.responseJSON;
                var errorsHtml = '';
                $.each(errors['errors'], function (index, value) {
                errorsHtml += ' ' + value + ' ';
              });
              alert(errorsHtml);
              },
          });
      });
    });
  </script>
  
  <div class='container'>
    @if ($errors->any())
    <div class="container">
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    </div>
    @endif
    {!! Form::open(['route' => 'ajax', 'method' => 'post', 'id'=>'contactform']) !!}
    <div class="form-group">
      <label for="cityInput">City</label>
      <input type="text" class="form-control" name="city" aria-describedby="cityHelp">
    </div>
    <div class="form-group">
      <label for="latitudeInput">Latitude</label>
      <input type="text" class="form-control" name="latitude">
    </div>
    <div class="form-group">
      <label for="latitudeInput">Longitude</label>
      <input type="text" class="form-control" name="longitude">
    </div>
    <div class="form-group">
      <label for="peopleInput">People</label>
      <input type="text" class="form-control" name="people">
    </div>
      <button type="submit" class="btn btn-primary">Submit</button>

    {!! Form::close() !!}

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">City</th>
          <th scope="col">latitude</th>
          <th scope="col">longitude</th>
          <th scope="col">People</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($towns as $town)
      
        <tr>
          <th scope="row">{{$town->id}}</th>
          <td>{{$town->city}}</td>
          <td>{{$town->latitude}}</td>
          <td>{{$town->longitude}}</td>
          <td>{{$town->people}}</td>
        </tr>
      @endforeach 
      </tbody>
    </table>
</div>
</body>
</html>