<!doctype html>
<html>
	<head>
		<title>Edit project</title>
	</head>
	<body>
		<b><h1>Edit project</h1></b>
		<div class="content">
			<form class="" action="{{ route('update', ['id'=>$project->id]) }}" method="post">
				
				@method('PUT') 
				@csrf

				<div>
					Name:<br>
					<input type="text" name="name" value="{{ $project->name }}">
				</div>

				<div>
					<br>Customer:<br>
					<input type="text" name="customer" value="{{ $project->customer }}">
				</div>

				<div>
					<br>Start date:<br>
					<input type="date" name="start_date">
					
				</div>

				<div>
					<br>End date:<br>
					<input type="date" name="end_date">
				</div>

				<div>
					<br>Active:<br>
					<select name="active">
						@if ($project->active === 1)
							<option value="1">Yes</option>
							<option value="0">No</option>
						@else
							<option value="0">No</option>	
							<option value="1">Yes</option>
						@endif	
					</select>
				</div>

				<div>
					<br>Budget:<br>
					<input type="text" name="budget" value="{{ $project->budget }}">
				</div>

				<div>
					<br>Description:<br> 
					<textarea rows="6" cols="21" name="description">
						{{ $project->description }}
					</textarea>
				</div>

				<div>
					<br>
					<button type="submit" name="button">OK</button>
					<a href="{{URL::to('index')}}">Cancel</a>
				</div>
			</form>
		</div>	
	</body>	
</html>	