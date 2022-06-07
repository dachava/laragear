@props(['tagsCsv'])
{{-- Tomar los tags como comma separated values de la DB --}}
{{-- Explode: donde separar los valores? En la coma , y pasar el prop --}}
@php
    $tags = explode(',', $tagsCsv);
@endphp

<ul class="flex">
    @foreach ($tags as $tag)
    <li
        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
        <a href="/?tag={{$tag}}">{{$tag}}</a>
    </li> 
     @endforeach
</ul>