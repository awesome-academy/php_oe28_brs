<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Book\BookRepositoryInterface;

class HomeController extends Controller
{
    protected $bookRepo;

    public function __construct(BookRepositoryInterface $bookRepo)
    {
        $this->bookRepo = $bookRepo;
    }

    public function index()
    {
        return view('admin.index');
    }

    public function getAllBook()
    {
        $books = $this->bookRepo->getAllBook();

        return view('admin.book.list-book', compact('books'));
    }
}
