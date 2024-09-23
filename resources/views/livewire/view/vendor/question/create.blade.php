@extends('layouts.vendor.app')
@section('title')
    Vendor || Question Create
@endsection

@section('content')
    {{-- page header --}}
    <div class="flex items-center justify-between my-2">
        <div>
            <h4 class="h4 m-0">Create Question</h4>
            <p class="text-gray-600 text-sm">Create a new question for your exam. </p>
        </div>

        <div class="flex items-center">
            <button href="" class="btn px-3 py-1 rounded bg-green"> Import
            </button>

            <x-dropdown align="right" width="w-32">
                <x-slot name="trigger">
                    <button class="p-2 ms-1 bg-light"> <i class="fas fa-ellipsis-v"></i> </button>
                </x-slot>

                <x-slot name="content">

                </x-slot>
            </x-dropdown>
        </div>
    </div>
    <hr class="my-1">
    {{-- page header --}}

    <div class="py-3">
        @if (empty($eid))
            <div class="flex items-center justify-center" style="
                position: absolute;
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                backdrop-filter: blur(7px);">
                <div class="w-50 rounded-lg border shadow-lg">
                    <div class="">
                        <div class="p-3">
                            <h4 class="m-0">
                                Select Exam
                            </h4>
                            <p class="m-0">select an exam to create a question. every question must be belongs to a
                                specific
                                exams.</p>
                        </div>
                        <hr class="my-1">

                        <div class="px-3 py-1">
                            <input type="search" name="" id="" class="rounded"
                                placeholder="Search to exam...">
                        </div>

                        <div class="p-3">
                            @foreach ($data as $exm)
                                <div class="bg-light rounded-full px-3 py-2 mb-1">
                                    <div class="flex items-center">
                                        <a href="{{ route('vendorQuestion.create', ['eid' => $exm->id]) }}" wire:navigate
                                            class="w-full flex items-center">
                                            <div class=" p-3 h-10 flex items-center rounded-full bg-green me-3">
                                                {{ $loop->iteration }}
                                            </div>
                                            <div>

                                                <h6 class="text-black m-0 font-bold">
                                                    {{ $exm->exm_name }}
                                                </h6>
                                                <p class="m-0 bg-white inline-block">
                                                    <i class="fas fa-users me-2"></i> {{ $exm->group['name'] }}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        @else
            @livewire('vendor.questions.create', ['eid' => $eid], key($eid))
            {{-- <div id="summernote"></div> --}}
            {{-- <textarea name="" id="summernote" cols="30" rows="10"></textarea> --}}
        @endif
    </div>
@endsection
{{-- @assets
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@assets

@script
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    document ready

    $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
    setTimeout(() => {
        alert("alert")

    }, 5000);
</script>
@script --}}
