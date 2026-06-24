@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Allergenen</title>
</head>
<body>
    <h1>{{ $title }}</h1>


@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" aria-label="sluiten" data-bs-dismiss="Sluiten"></button>
    </div>
    <meta http-equiv="refresh" content="3;url={{ route('allergeen.index') }}">
@endif
@if (session('error'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" aria-label="sluiten" data-bs-dismiss="Sluiten"></button>
    </div>
    <meta http-equiv="refresh" content="3;url={{ route('allergeen.index') }}">
@endif


    <a href="{{ route('allergeen.create') }}" class="btn btn-primary mt-2">Nieuwe Allergeen</a>

    <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Omschrijving</th>
            <th>verwijder</th>
            <th class="text-center">wijijg</th>

            
        </tr>
    </thead>
    <tbody>
    @forelse ($allergenen as $allergeen)
        <tr>
            <td>{{ $allergeen->id }}</td>
            <td>{{ $allergeen->Naam }}</td>
            <td>{{ $allergeen->Omschrijving }}</td>
            <td>
                <form action="{{ route('allergeen.destroy', $allergeen->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Weet je zeker dat je dit allergeen wilt verwijderen?');">
                        Verwijderen
                    </button>
                </form>
            </td>


<td class="text-center">
    <td class="text-center">
    <a href="{{ route('allergeen.edit', $allergeen->id) }}" 
       class="btn btn-success">
        Wijzig
    </a>
</td>
</td>


        </tr>
    @empty
        <tr>
            <td colspan="4">
                Geen Allergenen gevonden.
            </td>
        </tr>
    @endforelse
    </tbody>
</table>