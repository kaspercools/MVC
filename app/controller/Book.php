<?php
/**
 * Created by PhpStorm.
 * User: kaspercools
 * Date: 17/03/15
 * Time: 00:06
 */

namespace controller;


use model\Author;
use Todum\Controller;
use Todum\Registery;
use Todum\Routing\Router;
use Todum\View\ViewModel;

class Book extends Controller
{
    public function initialise()
    {

    }

    public function indexAction()
    {
        $bookCollection = [];
        $newBook = new \model\Book();
        $newBook->setISBN(1448625025);
        $newBook->setTitle('A Tale of Two Cities');
        $newBook->setEdition(1);
        $newBook->setYear(1859);
        $newBook->setCategory('Fiction');
        $newBook->setPublisher('My Publishing');
        $newBook->addAuthor(new Author('Kermit', 'The frog'));

        $bookCollection[] = $newBook;
        $secondBook=clone($newBook);
        $secondBook->setTitle('A Second Tale of Two Cities');
        $bookCollection[] = $secondBook;

        //doe hier wat zotte dingen
        return new ViewModel(array('books'=>$bookCollection,'params' => $this->getRequest()->getParams()));
    }

    public function editAction()
    {
        return new ViewModel(array('params' => $this->getRequest()->getParams()));
    }

    public function createAction()
    {
        return new ViewModel(array('params' => $this->getRequest()->getParams()));
    }

    public function deleteAction()
    {
        Registery::getInstance()->application->disableViewRenderer();

        echo json_encode(['msg' => 'We deleted entity with id: ' . $this->getRequest()->getParams()['id']]);

    }
}