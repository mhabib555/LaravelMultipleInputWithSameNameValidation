<h1>Laravel Multiple input with same name (array) Validation</h1>

Unable to get error message if the number of inputs is greator than 85 (array size 85 + 2 text input

If the total numbers of input are less than 85 (array size 81  + 2 text inputs ) then i get error message. 

<h3>Blade (formInput.blade)</h3>
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





<h3>Controller (formValidatorController)</h3>
    public function store(Request $request)
    {
		$validatedData = $request->validate([
			'name' => 'bail|required',
			'king' => 'bail|required',
			'test.*' => 'required'
		]);
		dd('test');
		return redirect('form')->with('success', 'Information has been added');    
		
    }
    

<h3>Routes</h3>
Route::resource('form', 'formValidatorController'); 
