<select id="modelSelect" name="model_id">
    <option value="" style="display: block">Model</option>
    @foreach ($models as $model)
    <option value="{{ $model->id }}" @selected($attributes->get('value')==$model->id) data-parent="{{ $model->maker_id
        }}">
        {{ $model->name }}
    </option>
    @endforeach

</select>
