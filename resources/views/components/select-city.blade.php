<select id="citySelect" name="city_id">
    <option value="">City</option>
    @foreach ($cities as $city)
    <option value="{{ $city->id }}" data-parent="{{ $city->region_id
        }}" @selected($attributes->get('value')==$city->id)>
        {{ $city->name }}
    </option>
    @endforeach

</select>
