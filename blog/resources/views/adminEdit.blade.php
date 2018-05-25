  <h2>{{ Auth::user()->email }}</h2>
  <h3>Edit User</h3>
     <li class="nav-item">
         <a class="nav-link font-weight-bold" href="#">Hi {{ auth()->user()->name }}</a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="{{ Route('login.logout') }}">Log Out</a>
     </li>

  <table>
  @foreach ($users as $user)

    <tr>
      <th>{{ $user->id }}</th>
      <th>{{ $user->name }}</th>
      <th><a href="{{ Route('user.addAmin', $user->id) }}">To Admin</a></th>
      <th><a href="{{ Route('user.addOwn', $user->id) }}">To Owner</a></th>
      <th><a href="{{ Route('user.destroy', $user->id) }}">Delete</a></th>
    </tr>

    @endforeach
  </table>
