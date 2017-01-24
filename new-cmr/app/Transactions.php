<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\customers;
class Transactions extends Model
{
     //
    use softDeletes;
    /**
     * Nombre de la tabla
     * @var string
     */
    protected $table = 'transactions';
    /**
     * columna primaria
     * @var string
     */
    
    protected $primaryKey = 'id';
    /**
     *campo que se puede iniciar masivamente
     * @var [type]
     */
    
     protected $fillable = [
      'name',
      'amount',
      'customer_id',
    ];
   
    //cardinalidad
    public function Customer()
    {
    	return $this->belongsTo(Customers::class);
    }
}
