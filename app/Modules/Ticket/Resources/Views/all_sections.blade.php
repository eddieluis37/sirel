@extends('layouts.app')

@section('content')
	<div class="container">

		<div class="page_header">All Sections</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Section</th>
					<th>Created By</th>
					<th>Updated By</th>
					<th>Created At</th>
					<th>Updated At</th>
				</tr>
			</thead>
			<tbody>
				@foreach($allSections as $section)
				<tr>
					<td>{{ $section->id}}</td>
					<td>{{ $section->section }}</td>
					<td>{{ $section->created_by }}</td>
					<td>{{ $section->updated_by }}</td>
					<td>{{ $section->created_at }}</td>
					<td>{{ $section->updated_at }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! $allSections->links() !!}
	</div>
	<div class="container">
		<button class="btn btn-primary" data-toggle="collapse" href="#add_section" id="add_city_button">Add New Section</button>
	</div>
	<div class="container collapse" id="add_section">
		<form action="{{url('/ticket/section/add-new-sections')}}" method="POST" class="form">
			{!! csrf_field() !!}
			<fieldset class="form-group">
				<label for="section">Section</label>
				<input type="text" name="section" id="section" class="form-control">
			</fieldset>
			<button class="btn btn-default">Submit</button>
		</form>
	</div>
@endsection