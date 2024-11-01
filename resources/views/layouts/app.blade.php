@props(['title'=>'','footerLinks'=>''])



<x-base-layout :$title>
    <x-layout.header />
    {{ $slot }}

</x-base-layout>