<div class="form-password-toggle">
    <label class="form-label" for="{{ $attributes['name'] }}">{{ __('field.' . $attributes['name']) }}</label>
    <div class="input-group input-group-merge">
        <input
            type="password"
            id="{{ $attributes['name'] }}"
            class="form-control @error($attributes['name']) is-invalid @enderror"
            name="{{ $attributes['name'] }}"
            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
            aria-describedby="{{ $attributes['name'] }}"/>
        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
        <span class="error invalid-feedback">{{ $errors->first($attributes['name']) }}</span>
    </div>
</div>
