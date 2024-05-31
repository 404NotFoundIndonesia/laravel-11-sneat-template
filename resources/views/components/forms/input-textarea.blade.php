<div>
    <label for="{{ $attributes['name'] }}" class="form-label">{{ __('field.' . $attributes['name']) }}</label>
    <textarea
        class="form-control @error($attributes['name']) is-invalid @enderror"
        id="{{ $attributes['name'] }}"
        name="{{ $attributes['name'] }}"
        placeholder="{{ __('label.enter_field', ['field' => __('field.' . $attributes['name'])]) }}"
        rows="3">{{ old($attributes['name'], $attributes['value']) }}</textarea>
    <span class="error invalid-feedback">{{ $errors->first($attributes['name']) }}</span>
</div>
