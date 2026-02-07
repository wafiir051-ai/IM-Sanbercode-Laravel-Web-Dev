@extends('layouts.master')

@section('content')
<div class="card">
  <div class="card-body">
    <h2 class="fw-bold mb-4">Buat Akun Baru!</h2>
    <form action="/welcome" method="GET">
      <div class="mb-3">
        <label class="form-label">First name:</label>
        <input type="text" name="first_name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Last name:</label>
        <input type="text" name="last_name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label d-block">Gender:</label>
        <input type="radio" name="gender" value="Male"> Male <br>
        <input type="radio" name="gender" value="Female"> Female <br>
        <input type="radio" name="gender" value="Other"> Other
      </div>
      <div class="mb-3">
        <label class="form-label">Nationality:</label>
        <select name="nationality" class="form-control">
          <option value="Indonesian">Indonesian</option>
          <option value="English">English</option>
          <option value="Arabic">Arab</option>
          <option value="Other">Other</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Language Spoken:</label><br>
        <input type="checkbox" name="lang" value="Indo"> Bahasa Indonesia <br>
        <input type="checkbox" name="lang" value="English"> English <br>
        <input type="checkbox" name="lang" value="Arabic"> Arabic
      </div>
      <div class="mb-3">
        <label class="form-label">Bio:</label>
        <textarea name="bio" class="form-control" rows="4"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
  </div>
</div>
@endsection