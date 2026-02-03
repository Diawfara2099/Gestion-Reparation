<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reparation extends Model
{
    //
    protected $fillable = [
    'nom', 'prenom', 'telephone', 'adresse', 
    'marque', 'modele',
    'statut_paiement', 'recuperer', 
    'date_depot', 'date_recuperation'
];

}
