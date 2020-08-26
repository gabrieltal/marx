@extends ('layouts.app')

@section ('content')
    <div class="container-fluid">
        @auth
            <h1>Welcome {{ auth()->user()->name }}!</h1>
            <ul class="list-unstyled">
                <li>No tasks available.</li>
            </ul>
        @else
            <h1>Welcome comrade!</h1>
            <p class="mb-0">We love Karl Marx.</p>
            <p class="mb-0">Marx is a place to gather fellow communists, work together and push the world left.</p>
            <p class="mb-4">Have thoughtful conversations, organize gatherings and unite to overthrow the capitalist systems that exploit our work and deplete the planet's resources.</p>
            <img src="/images/karl-marx.jpg" alt="karl marx seated and looking regal and intelligent" width="300px" height="400px">
        @endauth
    </div>
@endsection
