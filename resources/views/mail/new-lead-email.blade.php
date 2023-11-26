<x-mail::message>

    <h1>

        Ciao !

    </h1>

    <p>
        Hai ricevuto un nuovo messaggio da: <br>
        Name: {{ $lead->name }} <br>
        Email: {{ $lead->email }}
    </p>

    <p>
        Message: <br>
        {{ $lead->message }}
    </p>
    <x-mail::button :url="''">
        Button Text
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
