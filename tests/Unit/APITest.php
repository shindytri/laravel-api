<?php

namespace Tests\Unit;

use Tests\TestCase;

class APITest extends TestCase
{
    public function test_create_book()
    {
        $formData = [
            "title"=>"Toy Story 3",
            "body"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, ....",
            "rating"=>4.7
        ];
        $this->post(route('books.store'),$formData,['Authorization' => 'Basic YXBpdXNlcjpwYXNzYXBpdXNlcjEyMw=='])->assertStatus(200);
        // $this->call("POST",('/api/books'),$formData,[],[],['Authorization' => 'Basic YXBpdXNlcjpwYXNzYXBpdXNlcjEyMw=='])->assertStatus(200);
    }

    public function test_get_all_book()
    {
        $this->get(route('books.index'),['Authorization' => 'Basic YXBpdXNlcjpwYXNzYXBpdXNlcjEyMw=='])->assertStatus(200);
        // $this->call("GET",("/api/books"),[],[],[],['Authorization' => 'Basic YXBpdXNlcjpwYXNzYXBpdXNlcjEyMw=='])->assertStatus(200);
    }

    public function test_get_one_book()
    {
        # /api/books/{book_id}
        $this->get(route('books.show',1),['Authorization' => 'Basic YXBpdXNlcjpwYXNzYXBpdXNlcjEyMw=='])->assertStatus(200);
        // $this->call("GET",("/api/books/1"),[],[],[],['Authorization' => 'Basic YXBpdXNlcjpwYXNzYXBpdXNlcjEyMw=='])->assertStatus(200);
    }

    public function test_update_book()
    {
        # /api/books/{book_id}
        $this->patch(route('books.update',1),["title"=>"Alice in Wonderland"],['Authorization' => 'Basic YXBpdXNlcjpwYXNzYXBpdXNlcjEyMw=='])->assertStatus(200);
        // $this->call("PATCH",("/api/books/1"),["title"=>"Alice in Wonderland"],[],[],['Authorization' => 'Basic YXBpdXNlcjpwYXNzYXBpdXNlcjEyMw=='])->assertStatus(200);
    }
    
    public function test_delete_book()
    {
        # /api/books/{book_id} -> change to existing book_id
        $this->delete(route('books.destroy',14),[],['Authorization' => 'Basic YXBpdXNlcjpwYXNzYXBpdXNlcjEyMw=='])->assertStatus(200);
        // $this->call("DELETE",("/api/books/9"),[],[],[],['Authorization' => 'Basic YXBpdXNlcjpwYXNzYXBpdXNlcjEyMw=='])->assertStatus(200);
    }
}
