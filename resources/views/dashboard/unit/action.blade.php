<a href="{{ route('unit.edit',$id) }}" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-success edit">
Edit
</a>
<form action="{{ route('unit.destroy',$id) }}}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
<button class="delete btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')"><span data-feather="x-circle">Delete</span></button>
</form>