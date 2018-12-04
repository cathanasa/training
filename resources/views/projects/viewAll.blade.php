</doctype html>
<html>
	<head>
		<title>Projects</title>
	</head>	
	<body>
		<b><h1>Projects</h1></b>
		<a href="{{ route('projects.index') }}">Home</a><br><br>
		<form class="" action="{{ route('projects.index') }}" method="get">
			<input type="text" name="search_field" placeholder="Search" required>
      		<button type="submit" name="button">Go</button>
      	</form>
		<table id="table_id" class="display" border = 1>
	         <thead>
	         	<tr>
	            	<th>S/N</th>
	            	<th>Name</th>
	            	<th>Customer</th>
	            	<th>Start Date</th>
	            	<th>End Date</th>
	            	<th>Active</th>
	            	<th>Budget</th>
	            	<th>Actions</th>
	         	</tr>
	         </thead>
	         <tbody>
	         	@foreach ($projects as $i)
		         	<tr>
		            	<td>{{ $i->id }}</td>
		            	<td>{{ $i->name }}</td>
		            	<td>
		            		{{ $i->customer->first_name }}
		            		{{ $i->customer->last_name }}
		            	</td>
		            	<td>{{ Carbon\Carbon::parse($i->start_date)->format('m-d-Y') }}</td>
		            	<td>{{ Carbon\Carbon::parse($i->end_date)->format('m-d-Y') }}</td>
		            	<td>
		            		@if ($i->active === 1)
		            			Yes
							@else
								No
							@endif		            		
		            	</td>
		            	<td>{{ $i->budget }}</td>
		            	<td>
		            		<a href="{{ route('projects.show', ['id'=>$i->id]) }}">View</a>
		            		<a href="{{ route('projects.edit', ['id'=>$i->id]) }}">Edit</a>
		            		<a href="{{ route('confirm', ['id'=>$i->id]) }}">Delete</a>
		            	</td>
		         	</tr>
	         	@endforeach
	         </tbody>
      	</table>
      	<form class="" action="{{ route('projects.create') }}" method="get">
      		<br><br><button type="submit" name="button">New Project</button>
      	</form>
      	<script>
      		
      	</script>
	</body>
</html>