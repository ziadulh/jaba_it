<form action="{{route('get_session')}}" method="POST">
@csrf
<button type="submit">Submit</button>
</form>

<form action="{{route('ipnss')}}" method="POST">
@csrf
<button type="submit">ipnss</button>
</form>