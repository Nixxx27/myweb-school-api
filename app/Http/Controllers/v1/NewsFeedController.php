<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Helpers\v1 as Helpers;
use Illuminate\Http\Request;
use App\Model\v1\newsfeeds;
use App\Model\v1\newsfeed_categories as categories;

class NewsFeedController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->response = New Helpers\Responses();
    }

    public function newsfeeds()
    {
        try {

            return newsfeeds::all();

        } catch (\Throwable $th) {

            return $this->response->internal_server_error();
        }
    }

    public function store(Request $request)
    {
        $this->validate($request,
        [
            'news'       => 'required|min:1',
            'author_id'       => 'required',
            'category_id'       => 'required',
        ],
            $messages = array('news.required' => 'News is required!',
            'author_id.required' => 'Author is required!',
            'category_id.required' => 'Category is required!')
        );

        try {

           $newsfeed = newsfeeds::create($request->all());

            return $this->_response($newsfeed);

        } catch (\Throwable $th) {

            return $this->response->internal_server_error();
        }


    }

    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
            'news'       => 'required|min:1',
            'author_id'       => 'required',
            'category_id'       => 'required',
        ],
            $messages = array('news.required' => 'News is required!',
            'author_id.required' => 'Author is required!',
            'category_id.required' => 'Category is required!')
        );

        try {

            $newsfeed = newsfeeds::findorfail($id);

            if($newsfeed)
            {
                $newsfeed->update( $request->all() );
                return $this->response->success();
            }else{
                return $this->response->bad_request();
            }

        } catch (\Throwable $th) {

            return $this->response->internal_server_error();
        }

    }

    public function destroy($id)
    {

        try {

            $newsfeeds = newsfeeds::findorfail($id);

            if($newsfeeds)
            {
                $newsfeeds->delete();
                return $this->response->success();
            }else{
                return $this->response->bad_request();
            }

        } catch (\Throwable $th) {

            return $this->response->internal_server_error();
        }

    }

    public function categories()
    {
        try {

            return categories::all();

        } catch (\Throwable $th) {

            return $this->response->internal_server_error();
        }
    }


    public function category_store(Request $request)
    {
        $this->validate($request,
            [
                'category'       => 'required|min:1',
            ],
                $messages = array('Category.required' => 'Category is required!')
            );

        try {

            $category = categories::create($request->all());

            return $this->_response($category);

        } catch (\Throwable $th) {
            return $this->response->internal_server_error();
        }

    }

    public function category_update(Request $request, $id)
    {
        $this->validate($request,
            [
                'category'       => 'required|min:1',
            ],
                $messages = array('Category.required' => 'Category is required!')
            );

        try {

            $category = categories::findorfail($id);

            if($category)
            {
                $category->update( $request->all() );
                return $this->response->success();
            }else{
                return $this->response->bad_request();
            }

        } catch (\Throwable $th) {

            return $this->response->internal_server_error();
        }

    }

    public function category_destroy($id)
    {

        try {

            $categories = categories::findorfail($id);

            if($categories)
            {
                $categories->delete();
                return $this->response->success();
            }else{
                return $this->response->bad_request();
            }

        } catch (\Throwable $th) {

            return $this->response->internal_server_error();
        }

    }

    public function _response($args)
    {
        if($args)
        {
            return $this->response->success();
        }else{
            return $this->response->bad_request();
        }
    }

    //
}
