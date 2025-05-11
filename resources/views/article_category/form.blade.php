<div class="mb-3">
    {{ html()->label('Имя', 'name')->class('form-label') }}
    {{ html()->input('text', 'name')
        ->class('form-control' . ($errors->has('name') ? 'is-invalid' : ''))
        ->value(old('name', $articleCategory->name ?? '')) }}
    @error('name')
    <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    {{ html()->label('Описание', 'description')->class('form-label') }}
    {{ html()->input('text', 'description')
        ->class('form-control' . ($errors->has('description') ? 'is-invalid' : ''))
        ->value(old('description', $articleCategory->description ?? '')) }}
    @error('description')
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
        ->value(old('state', $articleCategory->state ?? 'draft')) }}
    @error('state')
    <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

