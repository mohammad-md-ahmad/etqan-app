@props(['href' => '', 'active' =>  false])
<li class="text-end flex items-center justify-center">
    <a href="{{ $href }}" class="whitespace-nowrap py-3 px-5 rounded-md bg-blue-500 {{ $active ? 'bg-blue-600' : 'hover:bg-blue-600' }}">{{ $slot }}</a>
</li>
