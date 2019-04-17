<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace App\Controller;

use App\Model\DialogueManager;

/**
 * Class ItemController
 *
 */
class DialogueController extends AbstractController
{


    /**
     * Display item listing
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $dialogueManager = new DialogueManager();
        $dialogues = $dialogueManager->selectAll();

        return $this->twig->render('Dialogue/index.html.twig', []);
    }



}
