<div class="bg-pink-100 w-full p-4 transition duration-150 ease-out" id="top_nav">
    <div class="flex items-center justify-between">
        <a href="{{ route('index') }}">
            {{ config('app.name') }}
        </a>
        <ul class="hidden md:flex">
            @php($top_navs = config('front.top_nav'))
            @foreach($top_navs as $top_nav)
                <li class="py-2 px-4">
                    <a href="{{ Route::has($top_nav['path']) ? route($top_nav['path']) : '' }}">
                        {{ $top_nav['title'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
