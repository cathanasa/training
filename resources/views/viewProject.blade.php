<!doctype html>
<html>
	<head>
		<title>View project</title>
	</head>
	<body>
		<b><h1>View project</h1></b>
		<div class="content">
			<form class="" action="{{ URL::to('index') }}" method="get">
				
				@csrf

				<div>
					Name:<br>
					<input type="text" name="name" value="{{ $project->name }}" readonly>
				</div>

				<div>
					<br>Customer:<br>
					<input type="text" name="customer" value="{{ $project->customer }}" readonly>
				</div>

				<div>
					<br>Start date:<br>
					<input type="date" name="start_date" readonly>
					
				</div>

				<div>
					<br>End date:<br>
					<input type="date" name="end_date" readonly>
				</div>

				<div>
					<br>Active:<br>
					<select name="active" disabled>
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
					<input type="text" name="budget" value="{{ $project->budget }}" readonly>
				</div>

				<div>
					<br>Description:<br> 
					<textarea rows="6" cols="21" name="description" readonly>
						{{ $project->description }}
					</textarea>
				</div>

				<div>
					<br>
					<button type="submit" name="button">Return</button>
					
				</div>
			</form>
		</div>	
	</body>	
</html>	