
@component('layouts.app1')
    @slot('title')
        Home Page
    @endslot


    <div class="col-6">
        @component('alert')
            This is the alert message here.
        @endcomponent
        <h1>Welcome</h1>
    </div>
    <div class="col-6">
        @component('sidebar')
            This is my sidebar text. 
        @endcomponent
    </div>
@endcomponent