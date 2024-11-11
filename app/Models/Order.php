<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 * @mixin Builder
 *
 * Plain Fields
 *
 * @property int $id
 * @property float $total
 * @property string $customer_name
 * @property string $customer_surname
 * @property string $status
 * @property $delivered_at
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 *
 * Additional attributes
 *
 * @property string $generated_by
 * @property array $order_changes
 *
 */
class Order extends OaModel
{
    use SoftDeletes;

    protected $table = 'orders';

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'total',
        'customer_name',
        'customer_surname',
        'status'
    ];
}
