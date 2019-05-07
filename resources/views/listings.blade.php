<!DOCTYPE html>
<html>
<head>
<title>Laravel 5.4 Cloudways Contact US Form Example</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Latest contacts</div>
                <br>
                <div class="panel-body">
                    @if(count($listings))
                        <ul class="list-group">
                          @foreach($listings as $listing)
                            <li class="list-group-item"><strong>ID : {{$listing->id}}</strong></a></li>
                            <li class="list-group-item">{{$listing->name}}</a></li>
                            <li class="list-group-item">{{$listing->email}}</a></li>
                            <li class="list-group-item">{{$listing->pincode}}</a></li><br>
                          @endforeach
                          
                        </ul>
                        
                    @else
                      <p>No Listings Found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>