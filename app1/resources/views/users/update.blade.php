<h1>AGGIORNA UTENTE</h1>
<form method="POST" action="/users/update/{{$user->id}}">
    @csrf
    <label for="name">Nome</label>
    <input type="text" value="{{$user->name}}" name="name" id="name"></input>
    <br>
    <label for="email">Email</label>
    <input type="email" value="{{$user->email}}" name="email" id="email"></input>
    <br>
    <label>
        <select name="city_id">
            <option value="">Seleziona la città</option>
            @foreach(\App\Models\City::get() as $city) 
                <option value="{{$city->id}}" {{$city->id == $user->city_id ? 'selected' : ''}}>{{$city->name}}</option>
            @endforeach
        </select>
    </label>
    <br>
    <button>Invia</button>
</form>