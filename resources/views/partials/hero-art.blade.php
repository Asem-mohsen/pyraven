{{-- Decorative illustration of a generic software workspace — not a real product or client dashboard.
     Geometry stays left-to-right in both languages; labels are translated. --}}
@php($steps = __('site.process.steps'))
<div class="hero-art" aria-hidden="true" dir="ltr">
    <div class="orbit"></div>
    <div class="panel panel--main">
        <div class="panel-top">
            <div class="lights"><i></i><i></i><i></i></div>
            <span>pyraven / workspace</span>
            <span dir="auto">{{ __('site.art.live') }}</span>
        </div>
        <div class="panel-body">
            <div class="side"><i></i><i></i><i></i><i></i><i></i></div>
            <div>
                <div class="dash-head"><b dir="auto">{{ __('site.art.overview') }}</b><span dir="auto">{{ __('site.art.pipeline') }}</span></div>
                <div class="bars">
                    @foreach ([47, 63, 40, 83, 68, 95, 81, 100] as $i => $h)
                        <i style="--h: {{ $h }}%; --i: {{ $i }}"></i>
                    @endforeach
                </div>
                <div class="tiles">
                    <div>01<span dir="auto">{{ $steps[0][0] }}</span></div>
                    <div>02<span dir="auto">{{ $steps[2][0] }}</span></div>
                    <div>03<span dir="auto">{{ $steps[3][0] }}</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel--float panel--a" dir="auto">
        <small>{{ __('site.art.status') }}</small>
        <b>{{ __('site.art.ready') }}</b>
        <div class="meter"></div>
        <span class="label">{{ __('site.art.scale') }}</span>
    </div>
    <div class="panel panel--float panel--b">
        <small dir="auto">{{ __('site.art.process') }}</small>
        <div class="code">&lt;code&gt;
  ship(ideas);
  iterate();
&lt;/code&gt;</div>
    </div>
</div>
