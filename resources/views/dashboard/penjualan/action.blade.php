<!-- <a href="" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-success edit">
Invoice
</a> -->
<form action="{{ route('penjualan.destroy',$id) }}}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
<button class="delete btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')"><span data-feather="x-circle">Delete</span></button>
</form>