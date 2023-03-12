@extends('admin::layouts.master')

@section('content')
    <div class="md:px-4 md:px-10 mx-auto w-full pt-16" style="padding-top: 3rem">
        <div class="flex flex-wrap pt-16">
            <div class="w-full mb-12 xl:mb-0 px-4">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded"
                >
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div
                                class="relative w-full px-4 max-w-full flex-grow flex-1"
                            >
                                <h3 class="font-semibold text-base text-blueGray-700">
                                    {{ $title }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
