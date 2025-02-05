<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                
            
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/faq') }}">FAQ Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/contacts') }}">Contact Panel</a>
                </li>  

                <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/news') }}" class="btn btn-primary">Manage All News</a>
                <li>
                <li class="nav-item">
                 <a class="nav-link" href="{{ url('/admin/suggested-questions') }}">Approve Suggested Questions</a>
                </li>

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="nav-item">
                        @csrf
                        <button type="submit" class="nav-link btn btn-dark">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">

                <div class="list-group">
                    <a href="#users" class="list-group-item list-group-item-action">User Management</a>
                </div>
            </div>
            <div class="col-md-9">
                <div id="users" class="mb-4">
                    <h2>User Management</h2>
                    <table class="table table-bordered">
                    <form action="{{ route('users.store') }}" method="POST" class="mb-3">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
        </div>
        <div class="mb-3">
            <label for="usertype" class="form-label">User Type</label>
            <select id="usertype" name="usertype" class="form-select">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create User</button>
    </form>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
    @forelse($users ?? [] as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ ucfirst($user->usertype) }}</td>
            <td>
                <form action="{{ route('updateRole') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <select name="usertype" class="form-select" onchange="this.form.submit()">
                        <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ $user->usertype == 'user' ? 'selected' : '' }}>User</option>
                    </select>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5">No users found.</td>
        </tr>
    @endforelse
</tbody>

                    </table>
                </div>
            

                


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
