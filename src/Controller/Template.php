<?php
/**
 * Created by PhpStorm.
 * User: edusacra
 * Date: 01/02/18
 * Time: 01:57
 */

namespace Controller;



class Template
{
    /**
     * @var string
     */
    private $template;

    public function __construct($template)
    {
        $arquivo = "../template/" . $template . ".php";

        if(file_exists($arquivo))
        {
            $this->template = file_get_contents($arquivo);
        }else{

            throw new \Exception('Arquivo não encontrado');
        }
    }

    public function render(array $data = [])
    {
        foreach($data as $key => $value){
            $this->template = str_replace('{'.$key.'}', $value, $this->template);
        }

        return $this->template;
    }
}