    @extends('petugas.layout.main')
        {{-- content --}}
        @section('content')
        @if (session('msg'))
            <script>
                Swal.fire(
                    'Absen Berhasil',
                    '',
                    'success'
                    )
            </script>
        @endif
        @if (session('psn'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Data NIS tidak ada',
                    })
            </script>
        @endif
        <div class="row" style="margin-top: -200px">
            <main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <a href="pos" class="btn btn-outline-secondary mb-3"><i class="align-middle" data-feather="arrow-left"></i></a>                      
                        <div class="text-center mt-4">
                            <h1 class="h2">Absen Masuk</h1>
							<p class="lead">
								Piket Lab
							</p>
						</div>
						<div class="card" style="border: 1px solid grey">
							<div class="card-body">
								<div class="m-sm-3">
									<form method="post" action="{{ url('absen') }}">
                                        @csrf
										<div class="mb-3">
											<label class="form-label">NIS</label>
											<input class="form-control form-control-lg" type="text" autofocus name="nis" placeholder="Masukan NIS" />
										</div>
										<div class="d-grid gap-2 mt-3">
											<button type="submit" name="sign" class="btn btn-lg btn-primary">Sign in</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
        </div>
        @endsection
        {{-- end content --}}