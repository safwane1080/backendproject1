<style>/* Algemeen styling voor het formulier */
form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Styling voor de label en invoervelden */
form div {
    margin-bottom: 15px;
}

form label {
    display: block;
    font-size: 16px;
    margin-bottom: 5px;
    font-weight: bold;
    color: #333;
}

form input[type="text"],
form input[type="date"],
form textarea,
form input[type="file"] {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

form input[type="text"]:focus,
form input[type="date"]:focus,
form textarea:focus,
form input[type="file"]:focus {
    border-color: #4CAF50;
    outline: none;
}

/* Styling voor de textarea */
form textarea {
    resize: vertical;
    height: 120px;
}

/* Styling voor de verzendknop */
form button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 4px;
    width: 100%;
    margin-top: 10px;
}

form button:hover {
    background-color: #45a049;
}

/* Styling voor de success alert */
.alert {
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    margin-top: 15px;
    border-radius: 4px;
    text-align: center;
}

.profile-image {
    width: 150px;
    height: 150px; 
    object-fit: cover; 
    border-radius: 50%;
}

</style>

<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Dit geeft aan dat dit een update actie is -->

    <div>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}">
    </div>

    <div>
        <label for="birthday">Birthday</label>
        <input type="date" name="birthday" id="birthday" 
       value="{{ old('birthday', \Carbon\Carbon::parse($user->birthday)->format('Y-m-d') ?? '') }}">
    </div>

    <div>
        <label for="about">About</label>
        <textarea name="about" id="about">{{ old('about', $user->about) }}</textarea>
    </div>

    <div>
        <label for="profile_image">Profile Image</label>
        <input type="file" name="profile_image" id="profile_image">

        @if ($user->profile_image)
        <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profielfoto" class="profile-image">
        @else
    <p>Geen profielfoto geüpload.</p>
@endif
    </div>

    <button type="submit">Update Profile</button>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

</form>
