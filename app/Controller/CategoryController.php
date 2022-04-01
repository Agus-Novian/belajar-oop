<?php

namespace Kdf\BelajarOop\Controller;

use Kdf\BelajarOop\Config\Database;
use Kdf\BelajarOop\Config\Helper;
use Kdf\BelajarOop\Core\View;
use Kdf\BelajarOop\Exception\ValidationException;
use Kdf\BelajarOop\Model\CategoryRequest;
use Kdf\BelajarOop\Repository\CategoryRepository;
use Kdf\BelajarOop\Service\CategoryService;

class CategoryController
{
    private CategoryService $categoryService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $categoryRepository = new CategoryRepository($connection);
        $this->categoryService = new CategoryService($categoryRepository);
    }

    public function category()
    {
        View::render('categories/index', [
            'title' => 'Category'
        ]);
    }

    public function postCategory()
    {
        $request = new CategoryRequest();
        $request->name = $_POST['name'];
        $request->slug = Helper::slugfy($_POST['name']);

        try {
            $this->categoryService->addCategory($request);
            View::redirect('categories', [
                'title' => 'Category',
                'success' => 'Berhasil ditambahkan'
            ]);
        } catch (ValidationException $exception) {
            View::render('categories/index', [
                'title' => 'Category',
                'error' => $exception->getMessage()
            ]);
        }
    }
}
