<?php

namespace App\Models;

// class Job {
//     public $id;
//     public $title;
//     public $description;
//     public $location;
//     public $salary;

//     public function __construct(int $id, string $title, string $description, string $location, string $salary) {
//         $this->id = $id;
//         $this->title = $title;
//         $this->description = $description;
//         $this->location = $location;
//         $this->salary = $salary;
//     }

//     public static function all(): array {
//         return [
//             new Job(1, 'Director', 'This is a fantastic opportunity to work with a team of creative people who are passionate about technology.', 'London, UK', '£80,000 per year'),
//             new Job(2, 'Software Engineer', 'We are looking for a software engineer to join our team and help us build the next generation of our platform.', 'San Francisco, USA', '$120,000 per year'),
//             new Job(3, 'Product Manager', 'We are looking for a product manager to help us define the future of our product and drive the roadmap.', 'New York, USA', '$100,000 per year')
//         ];
//     }

//     public static function find(int $id): ?Job {
//         return collect(self::all())->firstWhere('id', $id);
//     }
// }

class Job {
    public static function all(): array {
        return [
            [
            'id' => 1,
            'title' => 'Director',
            'description' => 'This is a fantastic opportunity to work with a team of creative people who are passionate about technology.',
            'location' => 'London, UK',
            'salary' => '£80,000 per year'
            ], 
            [
            'id' => 2,
            'title' => 'Software Engineer',
            'description' => 'We are looking for a software engineer to join our team and help us build the next generation of our platform.',
            'location' => 'San Francisco, USA',
            'salary' => '$120,000 per year'
            ], 
            [
            'id' => 3,
            'title' => 'Product Manager',
            'description' => 'We are looking for a product manager to help us define the future of our product and drive the roadmap.',
            'location' => 'New York, USA',
            'salary' => '$100,000 per year'
            ]
        ];
    }

    // Find a job by id
    public static function find(int $id): ?array {
        $job = collect(static::all())->firstWhere('id', $id);

        if (!$job) {
            // return null;
            abort(404);
        } else {
            return $job;
        }
    }
}