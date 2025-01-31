<select id="stateSelect" name="state_id">
    <option value="">State/Region</option>
    @foreach ($regions as $region)
    <option value="{{ $region->id }}" @selected($attributes->get('value')==$region->id)>{{ $region->name }}</option>
    @endforeach

</select>
