@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4 bg-gray-100 min-h-screen">

    <!-- HEADER -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-900">
            Gestion des réparations
        </h1>
        <a href="{{ route('reparations.create') }}"
           class="mt-4 sm:mt-0 inline-flex items-center gap-2
                  bg-blue-700 text-white px-6 py-3 rounded-lg shadow
                  hover:bg-blue-800 transition font-semibold">
            ➕ Ajouter une réparation
        </a>
    </div>

    <!-- RECHERCHE -->
    <div class="bg-white border border-gray-300 rounded-lg shadow p-5 mb-8">
        <form method="GET" class="flex flex-col sm:flex-row gap-3">
            <input type="text"
                   name="telephone"
                   placeholder="Rechercher par téléphone"
                   value="{{ request('telephone') }}"
                   class="flex-1 border border-gray-400 rounded-md px-4 py-3
                          text-gray-900 placeholder-gray-500
                          focus:ring-2 focus:ring-blue-700 focus:border-blue-700">

            <button class="bg-orange-600 text-white px-6 py-3 rounded-md
                           hover:bg-orange-700 font-semibold transition">
                Rechercher
            </button>

            <!-- FILTRES -->
            <select name="statut_paiement"
                    class="border border-gray-400 rounded-md px-3 py-2 text-gray-900">
                <option value="">Tous paiements</option>
                <option value="payé" {{ request('statut_paiement')=='payé' ? 'selected' : '' }}>Payé</option>
                <option value="non payé" {{ request('statut_paiement')=='non payé' ? 'selected' : '' }}>Non payé</option>
            </select>

            <select name="recuperer"
                    class="border border-gray-400 rounded-md px-3 py-2 text-gray-900">
                <option value="">Tous</option>
                <option value="oui" {{ request('recuperer')=='oui' ? 'selected' : '' }}>Récupéré</option>
                <option value="non" {{ request('recuperer')=='non' ? 'selected' : '' }}>Non récupéré</option>
            </select>
        </form>
    </div>

    <!-- TABLEAU -->
    <div class="bg-white border border-gray-300 rounded-lg shadow overflow-hidden mb-8">
        <table class="min-w-full text-sm text-gray-900">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-4 text-left">Client</th>
                    <th class="px-6 py-4">Téléphone</th>
                    <th class="px-6 py-4">Appareil</th>
                    <th class="px-6 py-4">Paiement</th>
                    <th class="px-6 py-4">Récupéré</th>
                    <th class="px-6 py-4 text-center">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @forelse($reparations as $rep)
                <tr class="hover:bg-gray-50 transition">

                    <td class="px-6 py-4 font-semibold">{{ $rep->nom }} {{ $rep->prenom }}</td>
                    <td class="px-6 py-4">{{ $rep->telephone }}</td>
                    <td class="px-6 py-4">{{ $rep->marque }} / {{ $rep->modele }}</td>

                    <!-- Paiement -->
               <!-- Paiement -->
<td class="px-6 py-4">
    <a href="{{ route('reparations.togglePaiement', $rep) }}"
       class="inline-block px-3 py-1 rounded-full text-xs font-bold
              {{ $rep->statut_paiement === 'payé' ? 'bg-green-600 text-white hover:bg-green-700' : 'bg-red-600 text-white hover:bg-red-700' }}">
        {{ ucfirst($rep->statut_paiement) }}
    </a>
</td>

                    <!-- Récupéré -->
                 <!-- Récupéré -->
<td class="px-6 py-4">
    <a href="{{ route('reparations.toggleRecuperation', $rep) }}"
       class="inline-block px-3 py-1 rounded-full text-xs font-bold
              {{ $rep->recuperer === 'oui' ? 'bg-green-600 text-white hover:bg-green-700' : 'bg-red-600 text-white hover:bg-red-700' }}">
        {{ ucfirst($rep->recuperer) }}
    </a>
</td>

                    <!-- Action -->
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('reparations.show', $rep) }}"
                           class="inline-flex items-center gap-1 text-blue-700 hover:text-blue-900 font-semibold">
                            👁 Détails
                        </a>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-10 text-center text-gray-600">
                        Aucune réparation trouvée
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- STATISTIQUES -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

        <div class="bg-white border-l-4 border-blue-700 p-4 rounded shadow">
            <p class="text-gray-700 text-sm">Total réparations</p>
            <p class="text-2xl font-bold text-gray-900">{{ $total }}</p>
        </div>

        <div class="bg-white border-l-4 border-green-700 p-4 rounded shadow">
            <p class="text-gray-700 text-sm">Payées</p>
            <p class="text-2xl font-bold text-green-700">{{ $payees }}</p>
        </div>

        <div class="bg-white border-l-4 border-red-700 p-4 rounded shadow">
            <p class="text-gray-700 text-sm">Non payées</p>
            <p class="text-2xl font-bold text-red-700">{{ $nonPayees }}</p>
        </div>

        <div class="bg-white border-l-4 border-indigo-700 p-4 rounded shadow">
            <p class="text-gray-700 text-sm">Téléphones récupérés</p>
            <p class="text-2xl font-bold text-indigo-700">{{ $recuperees }}</p>
        </div>

    </div>

</div>
@endsection
