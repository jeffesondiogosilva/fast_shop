<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Classe criada para salvar os arquivos relacionados aos conteúdos do site
 */
class Archive extends Model
{
    use SoftDeletes;
    //
    protected $table = 'archives';
    protected $fillable = [
        'name',
        'description',
        'type',        
        'path',
        'name',
        'extension',
        'product_id'
    ];
    protected $primaryKey = 'id';

    /**
     * Retornando o conteúdo relacionado ao arquivo
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');

    }

}
