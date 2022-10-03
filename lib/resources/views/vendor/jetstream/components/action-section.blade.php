<div {{ $attributes->merge(['class' => 'card']) }}>
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
    </div>
    <div class="card-body">
        <p>{{ $description }}</p>
        {{ $content }}
    </div>
</div>
