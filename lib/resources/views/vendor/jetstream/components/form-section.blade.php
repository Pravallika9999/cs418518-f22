@props(['submit'])

<div {{ $attributes->merge(['class' => 'card']) }}>
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
    </div>
    <form wire:submit.prevent="{{ $submit }}">
        <div class="card-body">
            <p>{{ $description }}</p>
            {{ $form }}
        </div>
        @if (isset($actions))
        <div class="card-footer">
            {{ $actions }}
        </div>
        @endif
    </form>
</div>
