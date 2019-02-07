@extends('layouts.app')

@section('content')
<div class="container">
    <div class="subsides-content col-md-8 offset-md-2">
    <h1>User agreements</h1>
        <p><b>

        This web application is created for educational use only and is a part of my thesis in order to graduate from my studies in web development at Medieinstitutet.

        The data that will be stored into the database is following:
        <ul>
            <li>
                Name
            </li>
            <li>
                E-mail
            </li>
            <li>
                Messages sent
            </li>
        </ul>

        The information stored in the database will never be used for any further contact and/or advertising of any kind. You can Request to have your data deleted at any time. Send an email to Mika@lehtidigital.se in order to do so.

        <h2>Rules</h2>
        <ul>
            <li>
                Mature language of any kind is prohibited.
            </li>
            <li>
                Threats, Racism and sexism is prohibited.
            </li>
            <li>
                Discussion regarding any illegal activity is prohibited.
            </li>
        </ul>
        Breaking any of the above rules will result in an immediate termination of your account on the site.
        </b></p>
        <a href="{{ url('/') }}" class="btn btn-danger float-left">Back to front page</a>
    </div>
</div>
@endsection
