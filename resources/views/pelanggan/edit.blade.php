@extends('layouts.master')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit User
            </div>
            <div class="card-body">
                <form action="/pelanggan/{{ $pelanggan->id_users }}" method="post" id="myForm" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id_users" value="{{ $pelanggan->id_users }}">
                    <div class=" form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $pelanggan->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" value="{{ $pelanggan->email }}">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" name="role" class="form-control" id="role" value="{{ $pelanggan->role }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" value="{{ $pelanggan->password }}">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Edit"></input>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection