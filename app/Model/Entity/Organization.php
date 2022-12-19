<?php

namespace App\Model\Entity;

class Organization
{
    /**
     * Id da organização.
     *
     * @var integer
     */
    public $id = 1;

    /**
     * Nome da organização.
     *
     * @var string
     */
    public $name = 'Personaltech PT';

    /**
     * Site da organização.
     *
     * @var string
     */
    public $site = 'https://personaltech.pt';

    /**
     * Descrição da emprsa.
     *
     * @var string
     */
    public $description = 'Empresa de tecnologia localizada em Viana do Catela, Portugal.';
}

