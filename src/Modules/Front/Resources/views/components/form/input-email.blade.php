<input class="form-input form-input__email"
       type="email"
       name="{{ $name }}"
       placeholder="{{ $placeholder }}"
       value="{{ $value ?? '' }}"
       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
        {{ $required ? 'required' : '' }}
>
