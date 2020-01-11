<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif			
       <div class="flex-center position-ref full-height">
			<form method="post" action="{{url('form')}}" id="infoForm" >
				@csrf
				<input type="text" class="form-control" name="name" placeholder="Section A" value="{{ old('name') }}">
				<input type="text" class="form-control" name="king" placeholder="Section A" value="{{ old('king') }}">
				@for($i=0;$i<81;$i++)
					<input type="hidden" name="test[]" value="{{$i}}">
				@endfor
				<button type="submit">Submit</button>
			</form>			
        </div>

    </body>
</html>
