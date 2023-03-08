<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $table = 'attributes';
    protected $guarded = [''];

    const TYPE_EXPERIENCE = 1; //kinh nghiệm 
    const TYPE_RANK = 2; //cấp bậc
    const TYPE_FORM_OF_WORK = 3; //hình thức làm việc 
   
    public $type = [
        self::TYPE_EXPERIENCE => [
            'name' => 'Kinh nghiệm',
            'class' => 'badge-pill badge-info'
        ],
        self::TYPE_RANK => [
            'name' => 'Cấp bậc',
            'class' => 'badge-pill badge-dark'
        ],
        self::TYPE_FORM_OF_WORK => [
            'name' => 'Hình thức làm việc',
            'class' => 'badge-pill badge-primary'
        ]

    ];
    public function getType(){
        return Arr::get($this->type, $this->a_type,[]);
    }

}
