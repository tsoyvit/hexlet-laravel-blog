
<div class="mb-3">
    {{ html()->label('Категория', 'category_id')->class('form-label') }}
    {{ html()->select('category_id', $categories->pluck('name', 'id'))
        ->value(old('category_id', $article->category_id ?? null))
        ->class('form-control')
        ->placeholder('Выберите категорию') }}
    @error('category_id')
    <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    {{ html()->label('Название', 'name')->class('form-label') }}
    {{ html()->text('name')
        ->class('form-control ' . ($errors->has('name') ? 'is-invalid' : ''))
        ->value(old('name', $article->name ?? '')) }}
    @error('name')
    <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    {{ html()->label('Содержание', 'body')->class('form-label') }}
    {{ html()->textarea('body')
        ->class('form-control ' . ($errors->has('body') ? 'is-invalid' : ''))
        ->value(old('body', $article->body ?? ''))
        ->rows(5) }}
    @error('body')
    <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    {{ html()->label('Состояние', 'state')->class('form-label') }}
    {{ html()->select('state', [
            'draft' => 'Черновик',
            'published' => 'Опубликовано'
        ])
        ->class('form-control ' . ($errors->has('state') ? 'is-invalid' : ''))
        ->value(old('state', $article->state ?? 'draft')) }}
    @error('state')
    <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

