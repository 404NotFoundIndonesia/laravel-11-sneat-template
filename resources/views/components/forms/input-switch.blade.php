<div class="form-check form-switch">
    <label for="{{ $attributes['name'] }}" class="form-check-label">{{ __('field.' . $attributes['name']) }}</label>
    <input
        class="form-check-input @error($attributes['name']) is-invalid @enderror"
        id="{{ $attributes['name'] }}"
        type="checkbox"
        name="{{ $attributes['name'] }}"
        value="1"
        {{ old($attributes['name'], $attributes['value']) ? 'checked' : '' }}>
    <span class="error invalid-feedback">{{ $errors->first($attributes['name']) }}</span>
</div>
