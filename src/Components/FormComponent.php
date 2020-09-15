<?php

namespace TallStackUI\TallStackUI\Components;

use Illuminate\Validation\ValidationException;
use Livewire\Component;

class FormComponent extends Component
{
    protected $listeners = ['updateInput'];
    
    public function updateInput($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->{$name} = $value;
        }
    }
    
    /**
     * @param null  $rules
     * @param array $messages
     * @param array $attributes
     *
     * @return array|void
     * @throws ValidationException
     */
    public function validate($rules = null, $messages = [], $attributes = [])
    {
        try {
            return parent::validate($rules, $messages, $attributes);
        } catch (ValidationException $e) {
            $this->emit('validationErrors', $e->errors());
            
            throw $e;
        }
    }
    
    /**
     * @param       $field
     * @param null  $rules
     * @param array $messages
     * @param array $attributes
     *
     * @return array|void
     * @throws ValidationException
     */
    public function validateOnly($field, $rules = null, $messages = [], $attributes = [])
    {
        try {
            return parent::validateOnly($field, $rules = null, $messages = [], $attributes = []);
        } catch (ValidationException $e) {
            $this->emit('validationErrors', $e->errors());
            
            throw $e;
        }
        
    }
}
