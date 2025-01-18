@props(['for'])

@error($for)
    <p class="text-red-500 text-sm italic mt-1">{{$message}}</p>
@enderror