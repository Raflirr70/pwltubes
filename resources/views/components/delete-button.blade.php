<form action="{{ $action }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-white bg-red-500 py-1 px-7 rounded-lg  hover:text-red-800">
        Delete
    </button>
</form>
