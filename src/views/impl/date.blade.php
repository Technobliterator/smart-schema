<div class="form-group">
    <label for="{{ $field['name'] }}">{{ $field['label'] }}</label>

    <?php
    $old_val = old($field['name'], isset($config['initial'][$field['name']]) ? $config['initial'][$field['name']] : '');
    if($old_val instanceof \Carbon\Carbon)
        $old_val = $old_val->format('d/m/Y');
    ?>

    <div class="input-group datepicker" id="{{ $field['name'] }}" data-target-input="nearest">
        <input type="text" name="{{ $field['name'] }}"
               value="{{ $old_val }}"
               class="form-control datetimepicker-input {{ ($errors->has($field['name'])) ? ' is-invalid' : '' }}"
               data-target="#{{ $field['name'] }}"/>
        <div class="input-group-append" data-target="#{{ $field['name'] }}" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
    </div>

    @if(isset($field['help']))
        <small id="{{ $field['name'] }}Help" class="form-text text-muted">{{ $field['help'] }}</small>
    @endif
    @if($errors->has($field['name']))
        @foreach($errors->get($field['name']) as $message)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @endforeach
    @endif
</div>
