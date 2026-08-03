<?php
/**
 * AavivaCred - Blog Repository
 */

namespace AavivaCred\Repositories;

use AavivaCred\Core\Database;
use PDO;
use Exception;

class BlogRepository {
    private ?PDO $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getPdo();
        $this->ensureSeedPosts();
    }

    public function getAll(string $category = '', string $status = ''): array {
        if (!$this->pdo) return $this->getSeedPosts();

        try {
            $sql = "SELECT * FROM `blog_posts` WHERE 1=1";
            $params = [];

            if (!empty($status)) {
                $sql .= " AND status = :status";
                $params[':status'] = $status;
            }

            if (!empty($category)) {
                $sql .= " AND category = :category";
                $params[':category'] = $category;
            }

            $sql .= " ORDER BY id DESC";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            $results = $stmt->fetchAll();

            return empty($results) ? $this->getSeedPosts() : $results;
        } catch (Exception $e) {
            error_log("BlogRepository getAll Error: " . $e->getMessage());
            return $this->getSeedPosts();
        }
    }

    public function getBySlug(string $slug): ?array {
        if (!$this->pdo) {
            foreach ($this->getSeedPosts() as $post) {
                if ($post['slug'] === $slug) return $post;
            }
            return null;
        }

        try {
            $stmt = $this->pdo->prepare("SELECT * FROM `blog_posts` WHERE `slug` = :slug LIMIT 1");
            $stmt->execute([':slug' => $slug]);
            $post = $stmt->fetch();
            if ($post) return $post;

            foreach ($this->getSeedPosts() as $p) {
                if ($p['slug'] === $slug) return $p;
            }
            return null;
        } catch (Exception $e) {
            error_log("BlogRepository getBySlug Error: " . $e->getMessage());
            return null;
        }
    }

    public function save(array $data): bool {
        if (!$this->pdo) return false;

        try {
            // Check if post slug already exists to update
            $existing = $this->getBySlug($data['slug']);
            if ($existing && isset($existing['id'])) {
                $stmt = $this->pdo->prepare("UPDATE `blog_posts` SET 
                    `title` = :title, 
                    `excerpt` = :excerpt, 
                    `content` = :content, 
                    `category` = :category, 
                    `author` = :author, 
                    `image_url` = :image_url, 
                    `read_time` = :read_time, 
                    `status` = :status 
                    WHERE `id` = :id");

                return $stmt->execute([
                    ':title'     => $data['title'],
                    ':excerpt'   => $data['excerpt'],
                    ':content'   => $data['content'],
                    ':category'  => $data['category'] ?? 'Personal Finance',
                    ':author'    => $data['author'] ?? 'AavivaCred Editorial Team',
                    ':image_url' => $data['image_url'] ?? '',
                    ':read_time' => intval($data['read_time'] ?? 5),
                    ':status'    => $data['status'] ?? 'published',
                    ':id'        => $existing['id']
                ]);
            }

            $stmt = $this->pdo->prepare("INSERT INTO `blog_posts`
                (`slug`, `title`, `excerpt`, `content`, `category`, `author`, `image_url`, `read_time`, `status`, `created_at`)
                VALUES
                (:slug, :title, :excerpt, :content, :category, :author, :image_url, :read_time, :status, NOW())");

            return $stmt->execute([
                ':slug'      => $data['slug'],
                ':title'     => $data['title'],
                ':excerpt'   => $data['excerpt'],
                ':content'   => $data['content'],
                ':category'  => $data['category'] ?? 'Personal Finance',
                ':author'    => $data['author'] ?? 'AavivaCred Editorial Team',
                ':image_url' => $data['image_url'] ?? '',
                ':read_time' => intval($data['read_time'] ?? 5),
                ':status'    => $data['status'] ?? 'published'
            ]);
        } catch (Exception $e) {
            error_log("BlogRepository Save Error: " . $e->getMessage());
            return false;
        }
    }

    public function delete(int $id): bool {
        if (!$this->pdo) return false;
        try {
            $stmt = $this->pdo->prepare("DELETE FROM `blog_posts` WHERE `id` = :id");
            return $stmt->execute([':id' => $id]);
        } catch (Exception $e) {
            error_log("BlogRepository Delete Error: " . $e->getMessage());
            return false;
        }
    }

    private function ensureSeedPosts(): void {
        if (!$this->pdo) return;
        try {
            $stmt = $this->pdo->query("SELECT COUNT(*) FROM `blog_posts`");
            if ($stmt->fetchColumn() == 0) {
                foreach ($this->getSeedPosts() as $post) {
                    $this->save($post);
                }
            }
        } catch (Exception $e) {}
    }

    private function getSeedPosts(): array {
        return [
            [
                'id'         => 1,
                'slug'       => 'complete-guide-to-personal-loans-in-india-2026',
                'title'      => 'The Ultimate Guide to Securing Low Interest Personal Loans in India (2026)',
                'excerpt'    => 'Discover step-by-step guidance on credit scores, interest rate negotiation, tax benefits, and avoiding hidden charges when applying for personal loans.',
                'content'    => '<p>Personal loans have emerged as one of the most accessible financial solutions for individuals facing planned or unexpected expenses in India. Whether funding a wedding, medical emergency, higher education, or home renovation, a personal loan offers collateral-free capital with rapid disbursal times.</p><h2>1. Understanding CIBIL Credit Scores</h2><p>Your credit score is the primary metric evaluated by financial institutions. A CIBIL score of 750 or above unlocks competitive interest rates starting at 10.49% p.a. Ensure you regularly verify your credit report for inaccuracies.</p><h2>2. Comparing Bank vs NBFC Interest Rates</h2><p>While traditional public and private sector banks offer lower interest rates, Non-Banking Financial Companies (NBFCs) often feature more flexible eligibility criteria and faster digital disbursal channels.</p>',
                'category'   => 'Personal Finance',
                'author'     => 'AavivaCred Advisory Desk',
                'image_url'  => 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&w=800&q=80',
                'read_time'  => 6,
                'status'     => 'published',
                'created_at' => '2026-07-15 10:00:00'
            ],
            [
                'id'         => 2,
                'slug'       => 'how-edi-loans-transform-small-retail-businesses',
                'title'      => 'How Equated Daily Installment (EDI) Merchant Loans Power Small Retail Businesses',
                'excerpt'    => 'Learn how daily collection micro-loans empower shopkeepers and retail merchants to expand inventory without high monthly EMI pressure.',
                'content'    => '<p>For retail shopkeepers and micro-entrepreneurs, working capital management is critical. Equated Daily Installment (EDI) loans allow business owners to make micro-repayments daily from sales proceeds.</p><h2>Why Merchants Prefer EDI Loans</h2><p>1. Daily micro-collections prevent end-of-month cash flow bottlenecks.<br>2. Minimum paper verification with fast digital approvals.<br>3. Flexible top-up credit lines upon timely repayments.</p>',
                'category'   => 'Business Growth',
                'author'     => 'Finance Expert Team',
                'image_url'  => 'https://images.unsplash.com/photo-1556742049-0a67daf4095a?auto=format&fit=crop&w=800&q=80',
                'read_time'  => 5,
                'status'     => 'published',
                'created_at' => '2026-07-10 14:30:00'
            ]
        ];
    }
}
