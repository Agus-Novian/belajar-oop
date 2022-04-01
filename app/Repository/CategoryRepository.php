<?php

namespace Kdf\BelajarOop\Repository;

use Kdf\BelajarOop\Domain\Category;

class CategoryRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Category $category): Category
    {
        $quey = "INSERT INTO categories(name, slug) VALUES (?, ?)";
        $statement = $this->connection->prepare($quey);
        $statement->execute([$category->name, $category->slug]);

        return $category;
    }

    public function update(Category $category): Category
    {
        $query = "UPDATE categories SET name = ? WHERE id = ?";
        $statement = $this->connection->prepare($query);
        $statement->execute([$category->name, $category->id]);

        return $category;
    }

    public function findById(int $id): ?Category
    {
        $query = "SELECT * FROM categories WHERE id = ?";
        $statement = $this->connection->prepare($query);
        $statement->execute([$id]);

        try {
            if ($row = $statement->fetch()) {
                $category = new Category();
                $category->id = $row['id'];
                $category->name = $row['id'];
                $category->slug = $row['slug'];
                $category->createdAt = $row['created_at'];
                $category->updatedAt = $row['updated_at'];

                return $category;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function findAll(): array
    {
        $query = "";
        $statement = $this->connection->prepare($query);
        return [];
    }

    public function deleteById(): void
    {
        // 
    }

    public function deleteAll(): void
    {
        $this->connection->exec("DELETE from categories");
    }
}
