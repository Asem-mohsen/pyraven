<section class="section section--light" id="approach" aria-labelledby="approach-title">
    <div class="container">
        <div class="process-head" data-reveal>
            <p class="eyebrow">{{ $eyebrow ?? __('site.home.approach_eyebrow') }}</p>
            <h2 id="approach-title">{!! __('site.process.title_html') !!}</h2>
        </div>
        <ol class="grid-4">
            @foreach (__('site.process.steps') as $i => [$title, $text])
                <li class="step" data-reveal style="--d: {{ $i * 0.08 }}s">
                    <span class="num">{{ sprintf('%02d', $i + 1) }}</span>
                    <h3>{{ $title }}</h3>
                    <p>{{ $text }}</p>
                </li>
            @endforeach
        </ol>
    </div>
</section>
