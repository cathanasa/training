</doctype html>
<html>
	<head>
		<title>Projects</title>
	</head>	
	<body>
		<b><h1>Projects</h1></b>
		<a href="{{URL::to('index')}}">Home</a><br><br>
		<form class="" action="{{URL::to('filter')}}" method="get">
      		<input type="search" name="name" placeholder="Search by name">
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
		            		{{ App\Customer::find($i->customer_id)->first_name }}
		            		{{ App\Customer::find($i->customer_id)->last_name }}
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
		            		<a href="{{ route('view', ['id'=>$i->id]) }}">View</a>
		            		<a href="{{ route('edit', ['id'=>$i->id]) }}">Edit</a>
		            		<a href="{{ route('confirm', ['id'=>$i->id]) }}">Delete</a>
		            	</td>
		         	</tr>
	         	@endforeach
	         </tbody>
      	</table>
      	<form class="" action="{{URL::to('new')}}" method="get">
      		<br><br><button type="submit" name="button">New Project</button>
      	</form>
	</body>
</html>