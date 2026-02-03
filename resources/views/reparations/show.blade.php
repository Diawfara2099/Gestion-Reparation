@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">

    <!-- Fiche réparation -->
    <div class="bg-white border border-gray-300 rounded shadow">

        <!-- Header -->
        <div class="bg-blue-800 text-white px-6 py-4 flex justify-between items-center rounded-t">
            <h2 class="font-bold text-lg">Fiche réparation</h2>
            @if(Route::has('reparations.print'))
                <a href="{{ route('reparations.print', $reparation) }}"
                   class="bg-white text-blue-800 px-4 py-1 rounded font-semibold hover:bg-gray-100">
                    🖨 Imprimer
                </a>
            @endif
        </div>

        <!-- Body -->
        <div class="p-6 space-y-4 text-sm">

            <!-- Client & Téléphone -->
            <div class="grid grid-cols-2 gap-4">
                <div><strong>Client :</strong> {{ $reparation->nom }} {{ $reparation->prenom }}</div>
                <div><strong>Téléphone :</strong> {{ $reparation->telephone }}</div>
            </div>

            <!-- Adresse & Appareil -->
            <div class="grid grid-cols-2 gap-4">
                <div><strong>Adresse :</strong> {{ $reparation->adresse }}</div>
                <div><strong>Appareil :</strong> {{ $reparation->marque }} - {{ $reparation->modele }}</div>
            </div>

            <hr>

            <!-- Dates -->
            <div class="grid grid-cols-2 gap-4">
                <div><strong>Date dépôt :</strong> {{ \Carbon\Carbon::parse($reparation->date_depot)->format('d/m/Y') }}</div>
                <div><strong>Date récupération :</strong>
                    {{ $reparation->date_recuperation ? \Carbon\Carbon::parse($reparation->date_recuperation)->format('d/m/Y') : '—' }}
                </div>
            </div>

            <!-- Statuts -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <strong>Paiement :</strong>
                    <span class="px-2 py-1 rounded text-white {{ $reparation->statut_paiement === 'payé' ? 'bg-green-700' : 'bg-red-700' }}">
                        {{ ucfirst($reparation->statut_paiement) }}
                    </span>
                </div>

                <div>
                    <strong>Récupéré :</strong>
                    <span class="px-2 py-1 rounded text-white {{ $reparation->recuperer === 'oui' ? 'bg-green-700' : 'bg-red-700' }}">
                        {{ ucfirst($reparation->recuperer) }}
                    </span>
                </div>
            </div>

            <!-- Retour -->
            <div class="flex justify-end pt-6">
                <a href="{{ route('reparations.index') }}"
                   class="px-4 py-2 rounded border hover:bg-gray-100 dark:hover:bg-gray-700">
                    ← Retour
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
