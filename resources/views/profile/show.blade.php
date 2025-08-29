@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Profil Saya</h1>

    <table class="min-w-full bg-white shadow rounded-lg">
        <tbody>
            <tr><th class="px-4 py-2 bg-blue-400 text-left">ID</th>
                <td class="px-4 py-2">{{ Auth::user()->id }}</td></tr>
            <tr><th class="px-4 py-2 bg-blue-400 text-left">Nama</th>
                <td class="px-4 py-2">{{ Auth::user()->name }}</td></tr>
            <tr><th class="px-4 py-2 bg-blue-400 text-left">Email</th>
                <td class="px-4 py-2">{{ Auth::user()->email }}</td></tr>
            <tr><th class="px-4 py-2 bg-blue-400 text-left">Dibuat</th>
                <td class="px-4 py-2">{{ Auth::user()->created_at?->format('d M Y') }}</td></tr>
        </tbody>
    </table>
@endsection
