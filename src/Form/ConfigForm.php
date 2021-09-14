<?php
namespace SiteSlugAsSubdomain\Form;

use Laminas\Form\Form;
use Laminas\Form\Element;

class ConfigForm extends Form
{
    public function init()
    {
        $this->add([
            'name' => 'hostname',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Hostname without subdomain *', // @translate
            ],
            'attributes' => [
                'id' => 'hostname',
            ],
        ])
        ->add([
            'name' => 'adminname',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Address of admin dashboard (if necessary to create canonical links back to admin from site)', // @translate
            ],
            'attributes' => [
                'id' => 'adminname',
            ],
        ]);
    }
}
