<div>
    <x-banner-session class="top-0"/>
    <x-banner on="saved" style="{{$this->bannerStyle}}">
        {{ __($this->message) }}
    </x-banner>
</div>
