<form method="POST" action="/users/create">
    @csrf
    <label for="name">Nome</label>
    <input type="text" placeholder="Nome" name="name" id="name"></input>
    <br>
    <label for="email">Email</label>
    <input type="email" placeholder="Email" name="email" id="email"></input>
    <br>
    <button>Invia</button>
</form>