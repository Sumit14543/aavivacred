<?php
/**
 * AavivaCred - Blog Service Layer
 */

namespace AavivaCred\Services;

use AavivaCred\Repositories\BlogRepository;

class BlogService {
    private BlogRepository $repo;

    public function __construct() {
        $this->repo = new BlogRepository();
    }

    public function getPublishedPosts(string $category = ''): array {
        return $this->repo->getAll($category, 'published');
    }

    public function getAllPosts(): array {
        return $this->repo->getAll('', '');
    }

    public function getPostBySlug(string $slug): ?array {
        return $this->repo->getBySlug($slug);
    }

    public function createPost(array $data): bool {
        if (empty($data['slug'])) {
            $data['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['title'])));
        }
        return $this->repo->save($data);
    }

    public function deletePost(int $id): bool {
        return $this->repo->delete($id);
    }
}
