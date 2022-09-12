@props(['name'])
<x-form.field >
                   <x-form.label name="{{$name}}"/>
                    <input class="border border-gray-400 p-2 w-full"
                           {{$attributes(['value'=>old($name)])}}
                           name='{{$name}}'
                           id='{{$name}}'
                          
                    />
                    <x-form.error name="{{$name}}"/>
</x-form.field>