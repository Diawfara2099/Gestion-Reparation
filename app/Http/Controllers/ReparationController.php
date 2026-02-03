<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Reparation;


class ReparationController extends Controller
{




   public function index(Request $request)
{
    $query = Reparation::query();

    if ($request->telephone) {
        $query->where('telephone', 'like', '%' . $request->telephone . '%');
    }

    if ($request->statut_paiement) {
        $query->where('statut_paiement', $request->statut_paiement);
    }

    if ($request->recuperer) {
        $query->where('recuperer', $request->recuperer);
    }

    $reparations = $query->latest()->get();

    return view('reparations.index', [
        'reparations' => $reparations,
        'total' => Reparation::count(),
        'payees' => Reparation::where('statut_paiement', 'payé')->count(),
        'nonPayees' => Reparation::where('statut_paiement', 'non payé')->count(),
        'recuperees' => Reparation::where('recuperer', 'oui')->count(),
    ]);


        $reparations = $query->orderBy('created_at', 'desc')->get();
        return view('reparations.index', compact('reparations'));
    }

    public function create()
    {
        return view('reparations.create');
    }

   public function store(Request $request)
{
   $data = $request->validate([
    'nom' => 'required|string',
    'prenom' => 'required|string',
    'telephone' => 'required|string',
    'adresse' => 'required|string',
    'marque' => 'required|string',
    'modele' => 'required|string',
    'statut_paiement' => 'required|in:payé,non payé',
    'recuperer' => 'required|in:oui,non',
    'date_depot' => 'required|date',
    'date_recuperation' => 'nullable|date',
]);

    Reparation::create($data);

    return redirect()->route('reparations.index')->with('success', 'Réparation ajoutée avec succès !');
}


    public function show(Reparation $reparation)
    {
        return view('reparations.show', compact('reparation'));
    }

    public function togglePaiement(Reparation $reparation)
    {
        $reparation->statut_paiement = $reparation->statut_paiement === 'payé' ? 'non payé' : 'payé';
        $reparation->save();
        return redirect()->back();
    }

    public function toggleRecuperation(Reparation $reparation)
    {
        $reparation->recuperer = $reparation->recuperer === 'oui' ? 'non' : 'oui';
        if ($reparation->recuperer === 'oui' && !$reparation->date_recuperation) {
            $reparation->date_recuperation = now();
        }
        $reparation->save();
        return redirect()->back();
    }
}
