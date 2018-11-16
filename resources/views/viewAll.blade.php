</doctype html>
<html>
	<head>
		<title>Projects</title>
	</head>	
	<body>
		<b><h1>Projects</h1></b>
		<table border = 1>
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
	         @foreach ($projects as $i)
		         <tr>
		            <td>{{ $i->id }}</td>
		            <td>{{ $i->name }}</td>
		            <td>{{ $i->customer }}</td>
		            <td>{{ $i->start_date }}</td>
		            <td>{{ $i->end_date }}</td>
		            <td>
		            	@if ($i->active === 1)
		            		Yes
						@else
							No
						@endif		            		
		            </td>
		            <td>{{ $i->budget }}</td>
		            <td>
		            	<a href="{{ route('view', ['id'=>$i->id]) }}">View</a>
		            	<a href="{{ route('edit', ['id'=>$i->id]) }}">Edit</a>
		            	<form class="" action="{{ route('delete', ['id'=>$i->id]) }}" method="post">
		            		@method('DELETE')
		            		@csrf
		            		<button type="submit" name="button">delete</button>
		            	</form>
		            </td>
		         </tr>
	         @endforeach
      	</table>
      	<form class="" action="{{URL::to('new')}}" method="get">
      		<br><br><button type="submit" name="button">New Project</button>
      	</form>
	</body>
</html>