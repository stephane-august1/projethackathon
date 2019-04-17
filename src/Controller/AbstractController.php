<?php
/**
* Created by PhpStorm.
* User: root
* Date: 11/10/17
* Time: 15:38
* PHP version 7
*/

namespace App\Controller;


use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

/**
*
*/
abstract class AbstractController
{
/**
* @var Environment
*/
    protected $twig;


/**
*  Initializes this class.
*/
    public function __construct()
    {
        /******************/
        // Create a client with a base URI
        $client = new \GuzzleHttp\Client(
            [
                'base_uri' => 'http://easteregg.wildcodeschool.fr/api/',
            ]
        );
        $response = $client->request('GET', 'eggs');
        $body = $response->getBody();
        $u = $body->getContents();
        $zz = json_decode($u);
        $oeufs = array();
        for ($i = 0; $i < count($zz); ++$i) {
            array_push($oeufs, $zz[$i]->image);
        }
        //echo '<pre>'.print_r($oeufs, true).'</pre>';
        $response = $client->request('GET', 'characters');
        $personnage = array();
        $body = $response->getBody();
        $u = $body->getContents();
        $zz = json_decode($u);
        for ($i = 0; $i < count($zz); ++$i) {
            $person = (object) array();
            $person->name = $zz[$i]->name;
            $person->image = $zz[$i]->image;
            array_push($personnage, $person);
        }



        /***************/

        $loader = new FilesystemLoader(APP_VIEW_PATH);
        $this->twig = new Environment(
        $loader,
        [
        'cache' => !APP_DEV,
        'debug' => APP_DEV,
        ]
        );
        $this->twig->addExtension(new DebugExtension());
    }
}
