@extends('layouts.template_guru')
@section('contents')
<div class="row">
	@foreach ($jadwals as $p)
					<div class="col-2 mb-lg-0 text-center mr-5 mt-4">
					<div class="card" style="width: 18rem;">
					<div class="card-body">
						<p class="card-text">{{ $p->kelas->kelas }}</p>
						<h5 class="card-title">pengajar : {{ $p->guru->name }}</h5>
						<h5 class="card-title">Hari {{ $p->hari->name }}</h5>
						<p class="card-text">mata pelajaran {{ $p->mata_pelajaran->name }}</p>
						<p class="card-text">Jam masuk {{ $p->jam_masuk }}</p>
						<p class="card-text">Jam keluar {{ $p->jam_keluar }}</p>
						<div class="pricing-cta">
						@if (\Carbon\Carbon::now('Asia/Jakarta')->format('H:i') >= $p->jam_masuk && \Carbon\Carbon::now('Asia/Jakarta')->format('H:i') <= $p->jam_keluar && $p->hari->name == \Carbon\Carbon::now()->isoFormat('dddd'))
						<a class="btn btn-primary" href="{{ route('kelas-masuk' ,encrypt($p->id))}}">Masuk Pelajaran<i
							class="ml-2 fas fa-arrow-right"></i></a>
						@else
						

							<button class="btn btn-danger first">Masuk Pelajaran<i class="ml-2 fas fa-arrow-right"></i></button>
						@endif
							
						</div>
					</div>
        		</div>
			</div>
				@endforeach
		</div>
@endsection

	@section('js')
	<script>
			document.querySelector(".first").addEventListener('click', function(){
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Jam Pelajaran Belum Dimulai!',
				})
			});
	</script>
	<!-- JS Libraies -->
	@endsection	

