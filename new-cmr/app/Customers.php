<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\transactions;
class Customers extends Model
{
    //
    use softDeletes;
    /**
     * Nombre de la tabla
     * @var string
     */
    protected $table = 'customers';
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
      'first_name',
      'last_name',
      'email',
    ];

    public function transactions(){
    	return $this->hasMany(Transactions::class);
    }
    }



/*
transactions
+name
+amount
+customer_id foreig_key -> customers_id
*/
