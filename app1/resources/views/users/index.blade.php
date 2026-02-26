<h1>LISTA UTENTI</h1>
<br>
<form>
    <input type="text" name="search" placeholder="Cerca per nome">
    <button>Cerca</button>
</form>
<br>
<a href="/users/create">Crea nuovo utente</a>
<br>
<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Città</th>
            <th>Ruoli</th>
            <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
             <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->city->name ?? 'N.D.'}}</td>
                <td>
                    @foreach($user->roles as $role)
                        {{ $role->name }}
                    @endforeach
                </td>
                <td>
                    <a href="/users/update/{{$user->id}}">Modifica</a>
                    <form method="POST" action="/users/delete/{{$user->id}}">
                        <input type="hidden" name="_method" value="delete">
                        @csrf
                        <button>Elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>