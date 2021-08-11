@props(['value'])
<label {{$attributes->merge(['class'=> "block text-sm font-medium text-gray-700"])}}>
    @if(isset($value))
        {{$value}}
    @else
        {{$slot}}
    @endif
</label>