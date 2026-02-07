@extends('layouts.master')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold mb-2">Dashboard</h5>
    <h1 class="display-6 fw-bold">Selamat Datang {{ $first_name }} {{ $last_name }}</h1>
    <h3 class="fw-semibold text-muted">Terima kasih telah bergabung di Sanberbook. Social Media kita bersama!</h3>
  </div>
</div>
@endsection