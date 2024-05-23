<div>
    <label for="{{ $attributes['name'] }}" class="form-label">{{ __('field.' . $attributes['name']) }}</label>
    <input class="form-control @error($attributes['name']) is-invalid @enderror"
           type="{{ $attributes['type'] ?? 'text' }}"
           id="{{ $attributes['name'] }}"
           name="{{ $attributes['name'] }}"
           value="{{ old($attributes['name'], $attributes['value']) }}"
           placeholder="{{ __('label.enter_field', ['field' => __('field.' . $attributes['name'])]) }}" />
    <span class="error invalid-feedback">{{ $errors->first($attributes['name']) }}</span>
</div>
