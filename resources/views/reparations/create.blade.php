@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8 px-4">
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">

        <!-- Header -->
        <div class="bg-blue-600 text-white px-6 py-4">
            <h2 class="text-lg font-semibold">Nouvelle réparation</h2>
        </div>

        <!-- Body -->
        <div class="p-6">

            {{-- Messages d'erreur --}}
            @if ($errors->any())
                <div class="mb-4 rounded bg-red-100 text-red-700 p-4">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('reparations.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Nom / Prénom -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Nom</label>
                        <input type="text" name="nom" value="{{ old('nom') }}"
                               class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Prénom</label>
                        <input type="text" name="prenom" value="{{ old('prenom') }}"
                               class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                    </div>
                </div>

                <!-- Téléphone / Adresse -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Téléphone</label>
                        <input type="text" name="telephone" value="{{ old('telephone') }}"
                               class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Adresse</label>
                        <input type="text" name="adresse" value="{{ old('adresse') }}"
                               class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                    </div>
                </div>

                <!-- Marque / Modèle -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Marque</label>
                        <input type="text" name="marque" value="{{ old('marque') }}"
                               class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Modèle</label>
                        <input type="text" name="modele" value="{{ old('modele') }}"
                               class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                    </div>
                </div>

                <!-- Dates -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Date de dépôt</label>
                        <input type="date" name="date_depot" value="{{ old('date_depot') }}"
                               class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Date de récupération</label>
                        <input type="date" name="date_recuperation" value="{{ old('date_recuperation') }}"
                               class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                    </div>
                </div>

                <!-- Statuts -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Statut paiement</label>
                        <select name="statut_paiement"
                                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                            <option value="non payé" {{ old('statut_paiement') == 'non payé' ? 'selected' : '' }}>
                                Non payé
                            </option>
                            <option value="payé" {{ old('statut_paiement') == 'payé' ? 'selected' : '' }}>
                                Payé
                            </option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Téléphone récupéré</label>
                        <select name="recuperer"
                                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                            <option value="non" {{ old('recuperer') == 'non' ? 'selected' : '' }}>Non</option>
                            <option value="oui" {{ old('recuperer') == 'oui' ? 'selected' : '' }}>Oui</option>
                        </select>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex justify-end gap-2 pt-4">
                    <a href="{{ route('reparations.index') }}"
                       class="px-4 py-2 rounded border hover:bg-gray-100 dark:hover:bg-gray-700">
                        Annuler
                    </a>

                    <button type="submit"
                            class="px-6 py-2 rounded bg-green-600 text-white hover:bg-green-700">
                        Enregistrer
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
