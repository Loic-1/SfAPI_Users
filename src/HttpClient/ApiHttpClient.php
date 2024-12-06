<?php

//  définit le namespace de la classe dans laquelle se trouve ce fichier
namespace App\HttpClient;

// importe la classe Response de Symfony pour gérer les réponses HTTP
use Symfony\Component\HttpFoundation\Response;
// importe la classe JsonResponse de Symfony pour créer des réponses JSON
use Symfony\Component\HttpFoundation\JsonResponse;
// importe l'interface HttpClientInterface de Symfony Contracts pour déclarer le type d'injection de dépendance dans le constructeur
use Symfony\Contracts\HttpClient\HttpClientInterface;
// importe la classe AbstractController de Symfony pour étendre cette classe de contrôleur abstraite
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

//  définit la classe ApiHttpClient qui étend AbstractController
class ApiHttpClient extends AbstractController
{
    // déclare un champ privé $httpClient pour stocker l'instance du service HttpClient
    private $httpClient;

    // définit le constructeur qui prend un service HttpClientInterface en paramètre et l'injecte dans le champ $httpClient
    public function __construct(HttpClientInterface $jph)
    {
        // initialise le champ $httpClient avec l'instance du service HttpClient
        $this->httpClient = $jph;
    }

    // définit une méthode getUsers pour récupérer des utilisateurs depuis l'API
    public function getUsers()
    {
        // utilise le service HttpClient pour effectuer une requête GET à l'API avec un endpoint spécifié et des options, notamment la désactivation de la vérification SSL (verify_peer) et le nombre de résultats à renvoyer (ici 15)
        $response = $this->httpClient->request('GET', "?results=15", [
            'verify_peer' => false,
        ]);

        // retourne les données de la réponse converties en tableau associatif
        return $response->toArray();
    }
}
