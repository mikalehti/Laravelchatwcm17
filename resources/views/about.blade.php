@extends('layouts.app')

@section('content')
<div class="container">
    <div class="subsides-content col-md-8 offset-md-2">
    <h1>About</h1>
        <p><b>This chat application is created by <a href="https://lehtidigital.se" target=_blank>Mika Lehtinen</a> as a thesis in order to graduate from <a href="http://medieinstitutet.se/" target=_blank>Medieinstitutet</a>, <a href="http://medieinstitutet.se/webbutvecklare-cms/" target=_blank>WCM17</a>. It is a public chat room where multiple people can engage in conversation with eachother in an open environment. The chat renders the messages in real time and display the users that's currently online on the right hand side of the chat view.
        </p>
        <p>
        The chat is powered by Laravel, Vue.js, Pusher and is hosted from Amsterdam.</b></p>

        <a href="{{ url('/') }}" class="btn btn-danger float-left">Back to front page</a>
    </div>
</div>
@endsection
