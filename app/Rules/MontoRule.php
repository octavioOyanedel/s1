<?php

namespace App\Rules;

use App\Prestamo;
use Illuminate\Contracts\Validation\Rule;

class MontoRule implements Rule
{
    public $prestamo_id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($prestamo_id)
    {
        $this->prestamo_id = $prestamo_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $prestamo = Prestamo::findOrFail($this->prestamo_id);
        $suma = Prestamo::sumarAbonos($prestamo);
        if($prestamo->monto - ($suma + $value) >= 0){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Abono excede total de deuda.';
    }
}
