@props(['link','color'])
    <a href="{{$link}}" {{ $attributes->merge(['class' =>'text-white rounded-xl p-2 block w-min']) }}>
        {{$slot}}
    </a>
