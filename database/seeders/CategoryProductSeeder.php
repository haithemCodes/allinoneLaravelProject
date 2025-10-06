<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use App\Models\Product;
use Faker\Factory as Faker;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Initialize Faker for generating realistic test data
        $faker = Faker::create();
        
        // Start a database transaction for data integrity
        DB::beginTransaction();
        
        try {
            // Disable foreign key constraints temporarily to avoid issues during seeding
            Schema::disableForeignKeyConstraints();
            
            // Clear existing data from categories and products tables
            Category::query()->delete();
            Product::query()->delete();
            
            // Define category names for our 5 distinct categories
            $categoryNames = [
                'Electronics',
                'Clothing',
                'Home & Garden',
                'Sports & Outdoors',
                'Books & Media'
            ];
            
            // Create 5 distinct categories
            $categories = [];
            foreach ($categoryNames as $name) {
                // Generate a unique slug for the category
                $slug = $this->generateUniqueSlug(Category::class, $name);
                
                // Randomly set status to true (active) or false (inactive)
                $status = $faker->boolean(80); // 80% chance of being active
                
                // Create the category
                $category = Category::create([
                    'title' => $name,
                    'slug' => $slug,
                    'summary' => $faker->paragraph(2, true), // Short summary
                    'photo' => $faker->imageUrl(640, 480, 'category', true),
                    'status' => $status ? 'active' : 'inactive',
                    'is_parent' => true, // All categories are parent categories in this seeder
                    'parent_id' => null,
                    'added_by' => 1, // Default admin user
                ]);
                
                $categories[] = $category;
            }
            
            // Create 10 products for each category (total 50 products)
            foreach ($categories as $category) {
                for ($i = 0; $i < 10; $i++) {
                    // Generate a unique product name using Faker's word and catchphrase methods
                    $productName = $faker->unique()->words(3, true);
                    
                    // Generate a unique slug for the product
                    $slug = $this->generateUniqueSlug(Product::class, $productName);
                    
                    // Randomly set status to true (active) or false (inactive)
                    $status = $faker->boolean(80); // 80% chance of being active
                    
                    // Create the product
                    Product::create([
                        'title' => $productName,
                        'slug' => $slug,
                        'summary' => $faker->sentence(10, true), // Short summary
                        'description' => $faker->paragraphs(3, true), // Longer description
                        'cat_id' => $category->id,
                        'child_cat_id' => null, // No subcategories in this seeder
                        'price' => $faker->randomFloat(2, 10.00, 999.99), // Price between 10.00 and 999.99
                        'discount' => $faker->optional(0.3)->randomFloat(2, 5.00, 50.00) ?? 0.00, // 30% chance of having a discount, otherwise 0.00
                        'status' => $status ? 'active' : 'inactive',
                        'photo' => $faker->imageUrl(640, 480, 'products', true),
                        'stock' => $faker->numberBetween(0, 100), // Quantity between 0 and 100
                        'size' => $faker->randomElement(['S', 'M', 'L', 'XL']),
                        'condition' => $faker->randomElement(['default', 'new', 'hot']),
                        'is_featured' => $faker->boolean(20), // 20% chance of being featured
                        'brand_id' => null, // No brands in this seeder
                    ]);
                }
            }
            
            // Re-enable foreign key constraints
            Schema::enableForeignKeyConstraints();
            
            // Commit the transaction
            DB::commit();
            
            $this->command->info('Category and Product seeding completed successfully!');
            $this->command->info('Created ' . count($categories) . ' categories and ' . (count($categories) * 10) . ' products.');
            
        } catch (\Exception $e) {
            // Rollback the transaction in case of error
            DB::rollBack();
            
            // Re-enable foreign key constraints even if there was an error
            Schema::enableForeignKeyConstraints();
            
            $this->command->error('Error during seeding: ' . $e->getMessage());
        }
    }
    
    /**
     * Generate a unique slug for a model
     * 
     * @param string $modelClass The model class to check for slug uniqueness
     * @param string $name The base name to generate a slug from
     * @return string The unique slug
     */
    private function generateUniqueSlug($modelClass, $name)
    {
        // Generate the base slug from the name
        $slug = \Str::slug($name);
        
        // Check if the slug already exists
        $count = $modelClass::where('slug', $slug)->count();
        
        // If the slug exists, append a random number to make it unique
        if ($count > 0) {
            $slug .= '-' . $count + 1;
        }
        
        return $slug;
    }
}