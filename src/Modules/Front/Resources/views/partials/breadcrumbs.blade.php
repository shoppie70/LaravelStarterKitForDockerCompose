@if(count($breadcrumbs))
    <div class="max-w-screen-xl mx-auto px-4">
        <ul class="p-4 rounded flex flex-wrap bg-gray-100 text-sm text-gray-800">
            @foreach($breadcrumbs as $breadcrumb)
                @if($breadcrumb->url && !$loop->last)
                    <li class="breadcrumb-item"><a href="{{$breadcrumb->url}}">{{$breadcrumb->title}}</a></li>
                    <li class="breadcrumb-item">&nbsp;/&nbsp;</li>
                @else
                    <li class="breadcrumb-item text-blue-600 hover:text-blue-900 hover:underline focus:text-blue-900 focus:underline">{{ $breadcrumb->title }}</li>
                @endif
            @endforeach
        </ul>
    </div>
@endif
