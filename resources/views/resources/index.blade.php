@extends('layouts.app')

@section('title', 'Resources')

@section('content')

<div id="top"></div>

<main class="resources-page">

    <div class="container">

        {{-- PAGE HEADER --}}
        <h2 class="pf-page-title">
            Resources
        </h2>

        <p class="pf-page-subtitle">
            Curated resources to help you learn better
        </p>


        {{-- FILTERS --}}
<div id="pf-filters">

    @foreach($categories as $slug => $label)

        <button
            type="button"
            class="pf-filter-btn {{ $initialTrack === $slug ? 'active' : '' }}"
            data-filter="{{ $slug }}"
        >
            {{ $label }}
        </button>

    @endforeach

</div>

        {{-- RESOURCES --}}
        <div id="pf-resource-container" class="pb-5">

            @foreach($categories as $slug => $label)

                @php

                    if ($slug === 'all') {
                        $categoryResources = $resources;
                    } else {
                        $categoryResources = $resources->where(
                            'category',
                            $slug
                        );
                    }

                    $topics = $categoryResources->groupBy(function ($resource) {
                        return $resource->topic ?: 'Resources';
                    });

                @endphp


               <div
    class="pf-track-section"
    data-section="{{ $slug }}"
    style="{{ $initialTrack === $slug ? 'display:block;' : 'display:none;' }}"
>

                    @if($topics->isEmpty())

                        <div class="alert alert-info">
                            No resources available in this category yet.
                        </div>

                    @else

                        @foreach($topics as $topicName => $items)

                            {{-- TOPIC --}}
                            <div class="pf-group-title">

                                <i class="bi bi-map-fill"></i>

                                <span>
                                    {{ $topicName }}
                                </span>

                            </div>


                            {{-- RESOURCE ROWS --}}
                            @foreach($items as $item)

                                <div class="pf-resource-row">


                                    {{-- ICON --}}
                                    <div
                                        class="pf-resource-icon"
                                        style="background: {{ $item->bg ?: '#6c5dd3' }};"
                                    >

                                        <i class="bi {{ $item->icon ?: 'bi-book' }}"></i>

                                    </div>


                                    {{-- INFORMATION --}}
                                    <div class="flex-grow-1">

                                        <div class="pf-resource-title">
                                            {{ $item->title }}
                                        </div>

                                        @if($item->description)

                                            <p class="pf-resource-desc">
                                                {{ $item->description }}
                                            </p>

                                        @endif

                                    </div>


                                    {{-- BADGE --}}
                                    @if($item->badge)

                                        <span class="pf-badge">
                                            {{ $item->badge }}
                                        </span>

                                    @endif


                                    {{-- LINK --}}
                                    @if($item->link)

                                        <a
                                            href="{{ $item->link }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="pf-link-btn"
                                            title="Open Resource"
                                        >

                                            <i class="bi bi-box-arrow-up-right"></i>

                                        </a>

                                    @endif


                                </div>

                            @endforeach

                        @endforeach

                    @endif

                </div>

            @endforeach

        </div>

    </div>

</main>

@endsection


@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const buttons = document.querySelectorAll('.pf-filter-btn');
    const sections = document.querySelectorAll('.pf-track-section');


    buttons.forEach(function (button) {

        button.addEventListener('click', function () {

            const filter = this.dataset.filter;


            // Active button
            buttons.forEach(function (btn) {
                btn.classList.remove('active');
            });

            this.classList.add('active');


            // Show selected category
            sections.forEach(function (section) {

                if (section.dataset.section === filter) {
                    section.style.display = '';
                } else {
                    section.style.display = 'none';
                }

            });


            // Update URL
            const url = new URL(window.location.href);

            if (filter === 'all') {
                url.searchParams.delete('track');
            } else {
                url.searchParams.set('track', filter);
            }

            window.history.replaceState({}, '', url);

        });

    });

});

</script>

@endpush