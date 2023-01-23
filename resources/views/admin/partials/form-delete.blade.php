<form onsubmit="return confirm('Confermi l\'eliminazione di: {{ $project->name }}')"
    action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')

    <button type="submit" href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
</form>
