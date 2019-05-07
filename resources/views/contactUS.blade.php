<!DOCTYPE html>
<html>
<head>
<title>Laravel 5.4 Cloudways Contact US Form Example</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Contact US Form</h1>
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
        @endforeach
    @endif 
    @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif

    {!! Form::open(['route'=>'contactus.store']) !!}
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            {!! Form::label('Name:') !!}
            {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}" >
            {!! Form::label('Email:') !!}
            {!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Enter Email', 'id'=>'email']) !!}
            <span class="text-danger" id="emai">{{ $errors->first('email') }}</span>
            
              
        </div>
        
        <div class="form-group {{ $errors->has('pincode') ? 'has-error' : '' }}">
            {!! Form::label('Pincode:') !!}
            {!! Form::number('pincode', old('pincode'), ['class'=>'form-control', 'placeholder'=>'Enter pincode']) !!}
            <span class="text-danger">{{ $errors->first('pincode') }}</span>
        </div>
        <div class="form-group">
            <button class="btn btn-success">Contact US!</button>
        </div>
    {!! Form::close() !!}
</div>

<script>
    document.getElementById('email').addEventListener('blur', validateEmail);
    function validateEmail() {
  const email = document.getElementById('email');
  const re = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
 console.log(email.value);
  if(!re.test(email.value)){
    email.classList.add('is-invalid');
    document.getElementById("emai").innerHTML = "this is not a proper email";
  } else {
    email.classList.remove('is-invalid');
    document.getElementById("emai").innerHTML = "";
  }
}
</script>
</body>
</html>