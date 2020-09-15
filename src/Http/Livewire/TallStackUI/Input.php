<?php

namespace TallStackUI\TallStackUI\Http\Livewire\TallStackUI;

use Livewire\Component;

class Input extends Component
{
    public $_id;
    public $name;
    public $label;
    public $value;
    public $options;
    public $fieldErrors;
    public $type;
    public $placeholder;
    public $clearable;
    
    protected $listeners = ['validationErrors'];
    
    /**
     * @param string      $name
     * @param string|null $label
     * @param string|null $value
     * @param array       $options
     */
    public function mount($name, $label = null, $value = null, $options = [])
    {
        $this->name        = $name;
        $this->label       = $label;
        $this->value       = $value;
        $this->options     = $options;
        $this->fieldErrors = [];
        
        $this->type        = $options['type'] ?? 'text';
        $this->placeholder = $options['placeholder'] ?? '';
        $this->clearable   = $options['clearable'] ?? true;
    }
    
    public function resetValue()
    {
        $this->value = null;
    }
    
    public function updatedValue($value)
    {
        $this->emitUp('updateInput', $this->name, $value);
    }
    
    public function validationErrors($errors)
    {
        $this->fieldErrors = $errors[$this->name] ?? [];
    }
    
    public function render()
    {
        return view('tallstackui::livewire.tallstackui.input');
    }
}
