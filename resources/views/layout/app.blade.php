@props(['title'=>'', 'bodyClass'=>null,'footerLinks'=>''])



<x-base-layout :$title :$bodyClass>
    <x-layout.header />

    @session('success')

    <div class="container my-large">
        <div class="success-message">
            {{ session('success') }}
        </div>
    </div>
    @endsession

    {{ $slot }}

</x-base-layout>
