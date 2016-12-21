@extends('layouts.movim')

@section('content')
<div class="placeholder icon clipboard">
    <h4>Account successfully created</h4>

    <h2>{{ $jid }}</h2>

    <p>You can now login on your favorite client</p>

    @if (!empty($referer))
    <br />
    <a class="button color" href="{{ parse_url($referer)['scheme'] }}://{{ parse_url($referer)['host'] }}">
        Go back to {{ parse_url($referer)['host'] }}
    </a>

    @else
    <p class="center">or use your account on the Movim pod of your choice</p>
    @endif
</div>

@if(empty($referer))

<ul class="list flex active card">
    @foreach ($pods as $pod)
    <a href="{{ $pod->description }}">
        <li class="block">
            <span class="control icon gray">
                <i class="zmdi zmdi-chevron-right"></i>
            </span>
            <p>{{ parse_url($post->url)['host'] }}</p>
            <p>{{ $pod->description }}</p>
        </li>
    </a>
    @endforeach
</ul>

@endif

@endsection
