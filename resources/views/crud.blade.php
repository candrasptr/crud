@extends('layouts.master')

@section('title','crud')

@section('konten')
<div class="section-body">
	<div class="row">
		<div class="col-md-12">
			
			<div class="card mt-3">

			    <div class="card-body">
			    	<a href="/crud/tambah" class="btn btn-icon icon-left btn-primary mb-3 px-3"><i class="fas fa-plus"></i> Tambah</a>
            @if(session('message'))
            <div class="alert alert-success alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>×</span>
                </button>
                {{ session('message') }}
              </div>
            </div>
            @endif
			        <table class="table">
			            <thead>
			                <tr>
			                    <th scope="col">No</th>
			                    <th scope="col">Kode barang</th>
			                    <th scope="col">Nama barang</th>
			                    <th>Aksi</th>
			                </tr>
			            </thead>
			            <tbody>
			                @foreach ($data_barang as $no => $data)
			                <tr>
			                    <th scope="row">{{ $data_barang->firstItem()+$no }}</th>
			                    <td>{{ $data->kode_barang }}</td>
			                    <td>{{ $data->nama_barang }}</td>
			                    <td>
			                    	<a href="{{ route('crud.edit',$data->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
			                    	<a href="#" data-id="{{ $data->id }}" class="btn btn-danger confirm_script">
                              <form action="{{ route('crud.delete',$data->id) }}" id="delete" method="POST">
                                @csrf
                                @method('delete')
                              </form>
                              <i class="fas fa-trash"></i></a>
			                    </td>
			                </tr>
			                @endforeach     
			            </tbody>
			        </table>
			        {{ $data_barang->links() }}
			    </div>
			</div>
		</div>
	</div>		
</div>
@endsection

@push('page-scripts')

<script src="../node_modules/sweetalert/dist/sweetalert.min.js"></script>

@endpush

@push('after-scripts')
<script>
$(".confirm_script").click(function(e) {
  id = e.target.dataset.id;
  swal({
      title: 'Yakin hapus data?',
      text: 'Data yang dihapus tidak bisa dibalikin',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
      $('#delete').submit();
      } else {
      swal('Your imaginary file is safe!');
      }
    });
});
</script>

@endpush