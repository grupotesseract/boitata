<?php

namespace App\Helpers;

/**
 * Class Behance
 */
class Behance
{
    const URL_BASE = "https://api.behance.net/v2";

    /**
     * clientId - API_KEY da o behance, obtem do .env
     *
     * @var string
     */
    private $clientId;

    /**
     * @param mixed 
     */
    public function __construct()
    {
        $this->clientId = env('BEHANCE_CLIENT_ID');
    }
    

    /**
     * Retorna os projetos de um usuario do behance
     */
    public function getProjetos($idUsuario = 'coletivoboitata', $decoded=true)
    {
        $url = self::URL_BASE."/users/$idUsuario/projects?client_id=".$this->clientId;
        $result = $this->getUrl($url);
        \Log::info(json_encode($result)." \n\n <-- result do curl");
        return $decoded ? json_decode($result) : $result;
    }
    
    
    /**
     * Retorna os detalhes de 1 projeto do behance
     */
    public function getProjeto($idProjeto, $decoded=true)
    {
        $url = self::URL_BASE."/projects/$idProjeto?client_id=".$this->clientId;
        $result = $this->getUrl($url);
        \Log::info(json_encode($result)." \n\n <-- result do curl");

        return $decoded ? json_decode($result) : $result;
    }


    /**
     * undocumented function
     *
     * @return void
     */
    private function getUrl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}
