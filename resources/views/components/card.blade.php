<div {{$attributes->merge(['class' =>'bg-gray-50 border border-gray-200 p-6'])}}>
{{$slot}}
{{-- El slot imprime lo que sea que ponga entre los tags del componente --}}
{{-- el merge class setea la clase x defecto del div y agrega cualquier otro atributo que se agrege en cada blade. --}}
</div>