<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    //
    const STATUS = [
        1 => [ 'label' => '未着手', 'class' => 'label-danger' ],
        2 => [ 'label' => '着手中', 'class' => 'label-info' ],
        3 => [ 'label' => '完了', 'class' => '' ],
    ];

    public function getStatusLabelAttribute(){
        $status = $this->attributes['status'];

        if (!isset(self::STATUS[$status])){
            return '';
        }

        return self::STATUS[$status]['label'];
    }

    public function getFormattedDueDateAttribute(){
        return Carbon::createFromFormat('Y-m-d H:i:s',$this->attributes['due_date'])->format('Y/m/d');
    }
}
