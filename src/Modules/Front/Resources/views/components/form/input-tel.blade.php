<input class="form-input form-input__tel"
       type="tel"
       name="{{ $name }}"
       placeholder="{{ $placeholder }}"
       value="{{ $value ?? '' }}"
       pattern="\d{2,4}-?\d{3,4}-?\d{3,4}"
        {{ $required ? 'required' : '' }}
>
