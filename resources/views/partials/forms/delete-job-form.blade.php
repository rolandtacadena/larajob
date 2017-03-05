<form method="POST" action="{{ route('delete-job', $job) }}">
    
    {{ csrf_field() }}
    
    {{ method_field('DELETE') }}

    <input type="hidden" value="{{ $job }}">

    <button type="submit" class="alert button">Delete Job</button>

</form>