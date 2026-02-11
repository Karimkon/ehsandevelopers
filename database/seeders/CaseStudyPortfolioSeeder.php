<?php

namespace Database\Seeders;

use App\Models\PortfolioItem;
use Illuminate\Database\Seeder;

class CaseStudyPortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title'               => 'Bebamart Global',
                'slug'                => 'bebamart-global',
                'description'         => 'Bebamart Global is a modern online marketplace with both a web application and a mobile app designed to connect buyers and sellers across borders. The platform enables vendors to list products, manage inventory, and process orders while giving customers a seamless shopping experience with secure payments, real-time order tracking, and doorstep delivery. Built with Laravel on the backend and Flutter for the mobile apps, Bebamart handles thousands of product listings with fast search, category filtering, and push notifications for order updates.',
                'client_name'         => 'Bebamart Global',
                'project_url'         => 'https://bebamart.com/',
                'technologies'        => ['Laravel', 'Flutter', 'Firebase', 'MySQL', 'REST API'],
                'service_category_id' => 2, // Mobile Development
                'is_featured'         => true,
                'sort_order'          => 1,
            ],
            [
                'title'               => 'ADVANTA – Project Management System',
                'slug'                => 'advanta-project-management',
                'description'         => 'ADVANTA is a comprehensive enterprise project management system developed for Advanta Uganda Limited to streamline construction project workflows. The system covers the full project lifecycle — from bid estimation and material procurement to task assignment, progress tracking, and financial reporting. Site engineers log daily progress from the mobile app while project managers monitor budgets, approve purchase orders, and generate client reports from the web dashboard. Built-in role-based access ensures that accountants, engineers, supervisors, and directors each see only what they need.',
                'client_name'         => 'Advanta Uganda Limited',
                'project_url'         => null,
                'technologies'        => ['Laravel', 'Flutter', 'MySQL', 'REST API', 'Firebase'],
                'service_category_id' => 2, // Mobile Development
                'is_featured'         => true,
                'sort_order'          => 2,
            ],
            [
                'title'               => 'Chewies – Good Mood Fast Food',
                'slug'                => 'chewies-good-mood-fast-food',
                'description'         => 'Chewies is a modern fast-food ordering platform built to deliver a fun, fast, and seamless digital food experience. The system lets customers browse the menu, customize orders, and pay online — then track preparation and delivery in real time. On the restaurant side, kitchen staff receive orders instantly on a dedicated dashboard with automatic queue management and prep-time estimates. The mobile app supports loyalty points, promo codes, and scheduled orders so customers can plan ahead. Push notifications keep everyone in the loop from order confirmation to doorstep arrival.',
                'client_name'         => 'Chewies Restaurant',
                'project_url'         => null,
                'technologies'        => ['Laravel', 'Flutter', 'Firebase', 'MySQL', 'REST API'],
                'service_category_id' => 2, // Mobile Development
                'is_featured'         => true,
                'sort_order'          => 3,
            ],
        ];

        foreach ($items as $item) {
            PortfolioItem::updateOrCreate(
                ['slug' => $item['slug']],
                $item
            );
        }
    }
}
