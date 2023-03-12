<nav
    class="w-full md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
    <div
        class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
        <a
            class="text-black text-sm uppercase hidden lg:inline-block font-bold"
            href="{{ route('admin.index') }}"
        >
            {{ $title ?? 'DashBoard' }}
        </a>
        {{--        @include('admin::components.widgets.account_menu')--}}
    </div>
</nav>
