<x-mail::message>
    <h1>Ciao!</h1>

    <p>
        Hai ricevuto un nuovo messaggio da: <br>
        @if ($lead && $lead->name)
            Name: {{ $lead->name }}
        @else
            <p>non c'è il nome</p>
        @endif
        <br>
        @if ($lead && $lead->email)
            Email: {{ $lead->email }}
        @else
            <p>non c'è l'email</p>
        @endif
    </p>

    @if ($lead && $lead->message)
        <p>
            Message: <br>
            {{ $lead->message }}
        </p>
    @else
        <p>non c'è il messaggio</p>
    @endif

    <p></p>

    <x-mail::button :url="''">
        Button Text
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
