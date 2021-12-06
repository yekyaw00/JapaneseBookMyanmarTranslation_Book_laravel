<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $book_name_arr = ['N2 Shinkanzen Master', 'N3 Somatome', 'N4 Minna no Nihongo', 'N5 Minna no nihongo'];
        $book_photo_arr = ['9103-Capture.jpg', '51m4GY0ZLmL.jpg', '418EAIF9EiL_large.jpg', '716GjrM2f9L-732x1024.jpg'];

        return [
            'book_name' => $book_name_arr[rand(0, 3)],
            'book_photo'=> '/storage/image/demo/'.$book_photo_arr[rand(0,3)]
        ];
    }
}
