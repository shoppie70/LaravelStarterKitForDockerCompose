@if($errors->all())
    <div class="p-4">
        <ul class="mx-auto my-8 border-2 border-red-500 p-4 font-bold form__content">
            @foreach ($errors->all() as $error)
                <li class="py-1 text-red-500">
                    ・{{$error}}
                </li>
            @endforeach
        </ul>
    </div>
@endif
