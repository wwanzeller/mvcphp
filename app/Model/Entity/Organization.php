<?php

namespace App\Model\Entity;

class Organization
{
    /**
     * Id da organização.
     *
     * @var Integer
     */
    public Int $id = 1;

    /**
     * Nome da organização.
     *
     * @var String
     */
    public String $name = 'Personaltech PT';

    /**
     * Site da organização.
     *
     * @var String
     */
    public String $site = 'https://personaltech.pt';

    /**
     * Descrição da emprsa.
     *
     * @var String
     */
    public String $description = 'Empresa de tecnologia localizada em Viana do Catelo, Portugal.';
}

