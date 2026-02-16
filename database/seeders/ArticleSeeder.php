<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure we have categories
        $bookReviews = Category::where('slug', 'book-reviews')->first();
        $travel      = Category::where('slug', 'travel')->first();
        $cv          = Category::where('slug', 'my-cv')->first();
        $tech        = Category::where('slug', 'tech-notes')->first();
        $life        = Category::where('slug', 'life-updates')->first();

        $articles = [
            [
                'category'    => $bookReviews,
                'type'        => 'book-review',
                'title'       => 'Five Decembers – an epic WWII neo‑noir',
                'book_title'  => 'Five Decembers',
                'book_author' => 'James Kestrel',
                'rating'      => 5,
                'body'        => "Is it a neo-noir crime drama or an epic story about surviving the Second World War?\n\nFive Decembers starts as a seemingly standard detective story in Hawaii, but the attack on Pearl Harbor blows the case wide open. The investigation drags the protagonist across continents and years of war, turning a small crime into something huge and personal.\n\nIt is wild how a simple detective setup grows into such an emotional, large‑scale story.",
            ],
            [
                'category'    => $bookReviews,
                'type'        => 'book-review',
                'title'       => 'Why crime fiction works so well for me',
                'book_title'  => null,
                'book_author' => null,
                'rating'      => 4,
                'body'        => "Crime novels give me structure: a question, clues, and a resolution. That skeleton lets the author explore character, politics, or history without losing momentum.\n\nThe best books are the ones where I forget about the puzzle because I care too much about the people involved.",
            ],
            [
                'category'    => $travel,
                'type'        => 'travel',
                'title'       => 'Walking through old Porto on a rainy day',
                'body'        => "Rain in Porto changes the city. The streets empty just enough that you can hear the river again. Cafés feel brighter, the tiles look sharper, and every bookshop becomes a small shelter.\n\nIt is the perfect weather to sit with a coffee and a paperback while shoes dry under the table.",
            ],
            [
                'category'    => $travel,
                'type'        => 'travel',
                'title'       => 'A weekend escape to the mountains',
                'body'        => "Two days away from the laptop in the mountains is usually enough to reset my brain. The plan is always the same: long walks, simple food, and a book with no notifications.\n\nBy the time I come back, city noise feels temporary instead of permanent.",
            ],
            [
                'category'    => $cv,
                'type'        => 'cv',
                'title'       => 'About me as a developer',
                'body'        => "I like working close to the problem: understanding how a feature affects readers or users, not just how it looks in the codebase.\n\nPHP and Symfony were my first serious tools, and now I am using Laravel as an excuse to build things I actually want to use.",
            ],
            [
                'category'    => $cv,
                'type'        => 'cv',
                'title'       => 'What I enjoy in backend work',
                'body'        => "I like taking vague requirements and turning them into clear data models and small, testable services. Good backend code should make it hard to do the wrong thing and easy to add a new feature without fear.",
            ],
            [
                'category'    => $tech,
                'type'        => 'tech',
                'title'       => 'First impressions of Laravel coming from Symfony',
                'body'        => "Laravel feels opinionated in a friendly way. Conventions around controllers, requests, and resources make it fast to get something on the screen.\n\nThe hardest part is unlearning some Symfony habits and trusting Laravel to handle the boring pieces.",
            ],
            [
                'category'    => $tech,
                'type'        => 'tech',
                'title'       => 'Why I like explicit service classes',
                'body'        => "Putting logic in service classes instead of fat controllers keeps things testable and easier to reason about. It also matches how I explain features in conversation: \"there is a service that does X\" instead of \"there is a controller method that sort of does everything\".",
            ],
            [
                'category'    => $life,
                'type'        => 'life',
                'title'       => 'Reading in small daily chunks',
                'body'        => "I rarely have long reading sessions. Most of my reading happens in ten‑minute windows: before bed, during coffee breaks, or on the train.\n\nThe trick is to always have a book nearby and to accept that progress in pages is less important than the habit itself.",
            ],
            [
                'category'    => $life,
                'type'        => 'life',
                'title'       => 'Why I started this blog',
                'body'        => "I wanted a place that feels mine, not an algorithmic feed. Writing short notes about books, trips, and work is a way to think in public and see my own trajectory over time.",
            ],
        ];

        foreach ($articles as $data) {
            $category = $data['category'];
            if (! $category) {
                continue;
            }

            $title = $data['title'];

            Article::create([
                'category_id' => $category->id,
                'title'       => $title,
                'slug'        => Str::slug($title),
                'body'        => $data['body'],
                'type'        => $data['type'] ?? $category->slug,
                'book_title'  => $data['book_title'] ?? null,
                'book_author' => $data['book_author'] ?? null,
                'rating'      => $data['rating'] ?? null,
            ]);
        }
    }
}
