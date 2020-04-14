<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Repositories\Book\BookRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    protected $bookRepo;

    public function __construct(BookRepositoryInterface $bookRepo)
    {
        $this->bookRepo = $bookRepo;
    }

    public function create()
    {
        $categories = $this->bookRepo->getALlCategory();

        return view('admin.book.add-book', compact('categories'));
    }

    public function upload($attributes = [])
    {
        $filename = $attributes->image->getClientOriginalName();
        $filename = str_replace(' ', '-', $filename);
        $filename = uniqid() . '-' . $filename;

        return $filename;
    }

    public function store(BookRequest $request)
    {
        if ($request->hasFile('image')) {
            $path = request()->image->move('images', $this->upload($request));
        }

        $data = [
            'name' => $request->name,
            'author' => $request->author,
            'publish_date' => $request->publish_date,
            'title' => $request->title,
            'image' => asset($path),
            'category_id' => $request->category_id,
            'creator_id' => Auth::user()->id,
        ];
        $this->bookRepo->create($data);

        return redirect()->route('book.list-book')->with([
            'success' => trans('messages.success'),
        ]);
    }

    public function edit($id)
    {
        $book = $this->bookRepo->find($id);
        $categories = $this->bookRepo->getALlCategory();

        return view('admin.book.edit-book', compact(['book', 'categories']));
    }

    public function update(BookRequest $request, $id)
    {
        if ($request->hasFile('image')) {
            $path = request()->image->move('images', $this->upload($request));
        }

        $data = [
            'name' => $request->name,
            'author' => $request->author,
            'publish_date' => $request->publish_date,
            'title' => $request->title,
            'image' => asset($path),
            'category_id' => $request->category_id,
        ];
        $this->bookRepo->update($id, $data);

        return redirect()->route('book.list-book')->with([
            'success' => trans('messages.success'),
        ]);
    }

    public function destroy($id)
    {
        $this->bookRepo->delete($id);

        return redirect()->route('book.list-book');
    }
}
