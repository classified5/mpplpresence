
@extends('admin_template')

@section('content')


<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Profil</h3>
	</div>

	<div id="example1_wrapper" class="box-body"
		
		<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
			<div class="row col-sm-12">
				<div class="box-body">
					<strong>ID</strong>
					<p class="text-muted">{{$user[0]->id_user}}</p>
					<hr>	
					<strong>Nama</strong>
					<p class="text-muted">{{$user[0]->nama}}</p>
					<hr>
					@if (Auth::user()->id_role!=1)
					<strong>Daftar Kelas </strong>
					<div class="box-body">
						<table class="table table-striped">
							<tbody>
								<tr>
									<th>Kode</th>
									<th>Nama Matkul</th>
									<th>Waktu Mulai Kuliah</th>
									<th>Waktu Selesai Kuliah</th>
									<th>Hari</th>
								</tr>
								@foreach ($mata_kuliah as $value)
								<tr>
									<td>{{$value->kode}}</td>
									<td>{{$value->nama_matkul}}</td>
									<td>{{$value->waktu_mulai_kuliah}}</td>
									<td>{{$value->waktu_selesai_kuliah}}</td>
									<td>{{$value->hari}}</td>
								</tr>
								@endforeach		
							</thead>
						</table>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>

</div>

<script>
$(function () {
	$("#example1").DataTable();
	$('#example2').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});
});
</script>
@endsection