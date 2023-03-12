<input class="form-input form-input__text"
       type="text"
       name="{{ $name }}"
       placeholder="{{ $placeholder }}"
       value="{{ $value ?? '' }}"
        {{ $required ? 'required' : '' }}
>
