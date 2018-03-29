<center>
    [![Listen on {{ config("app.name") }}]({{ asset("audio/image/{$id}") }})]({{ url("listen/{$id}") }})
</center>
{!! $post !!}
<hr>
<center>
    This contribution is created for {{ config("app.name") }} project.
    <br>
    <a href="{{ url("login") }}">Join Us!</a>
    |
    <a href="{{ url("about") }}">About The Project</a>
    |
    <a href="{{ url("road-map") }}">Road Map</a>
    <br>
    {{ asset("assets/custom/img/dngo-hq-square-logo.png") }}
</center>