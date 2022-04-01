<?php

namespace Kdf\BelajarOop\Service;

use Kdf\BelajarOop\Config\Database;
use Kdf\BelajarOop\Domain\Category;
use Kdf\BelajarOop\Exception\ValidationException;
use Kdf\BelajarOop\Model\CategoryRequest;
use Kdf\BelajarOop\Model\CategoryResponse;
use Kdf\BelajarOop\Repository\CategoryRepository;

class CategoryService
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function addCategory(CategoryRequest $request): CategoryResponse
    {
        // validation
        $this->validationAddCategory($request);
        
        try {
            Database::beginTransaction();

            $category = new Category();
            $category->name = $request->name;
            $category->slug = $request->slug;

            // saving to database
            $this->categoryRepository->save($category);

            $response = new CategoryResponse();
            $response->category = $category;

            // commit processing
            Database::commitTransaction();

            return $response;
        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    private function validationAddCategory(CategoryRequest $request)
    {
        if ($request->name == null || trim($request->name) == "") {
            throw new ValidationException("name can not blank");
        }
    }
}
