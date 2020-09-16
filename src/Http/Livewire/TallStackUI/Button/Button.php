<?php

namespace TallStackUI\TallStackUI\Http\Livewire\TallStackUI\Button;

use Exception;
use Illuminate\Support\Str;
use Livewire\Component;

abstract class Button extends Component
{
    public $type;
    
    public $onClick;
    
    public $_click;
    
    public function mount($type = 'button', $onClick = null)
    {
        $this->type    = $type;
        $this->onClick = $onClick;
        
        $this->parseClick();
    }
    
    protected function parseClick()
    {
        if (!empty($this->onClick)) {
            try {
                if (Str::startsWith($this->onClick, 'routeTo')) {
                    $routeParts   = explode('|', $this->onClick);
                    $this->_click = sprintf("wire:click=%s('%s')", $routeParts[0], $routeParts[1]);
                }
                
                if (Str::startsWith($this->onClick, 'parent')) {
                    $routeParts   = explode('|', $this->onClick);
                    $this->_click = sprintf("wire:click=parentEmit('%s')", $routeParts[1]);
                }
            } catch (Exception $e) {
                $this->_click = '';
            }
        } else {
            $this->_click = '';
        }
    }
    
    public function routeTo($url)
    {
        return redirect()->to($url);
    }
    
    public function parentEmit($payload)
    {
        $payloadParts = explode(':', $payload);
        if (!empty($payloadParts[1])) {
            $payloadAttributes = explode(',', $payloadParts[1]);
            
            $this->emitUp($payloadParts[0], $payloadAttributes);
        } else {
            $this->emitUp($payloadParts[0]);
        }
    }
}
