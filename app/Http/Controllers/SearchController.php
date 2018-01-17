<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sleimanx2\Plastic\Facades\Plastic;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $client = Plastic::getClient();
        $params = [
            'index' => Plastic::getDefaultIndex(),
//        'type' => 'posts',
            'body' => [
                "_source" =>  ["id","name","title","content"],
                'query' => [
                    'multi_match' => [
                        'type' => "best_fields",
                        'query' => $request->get('query'),
                        'fields' => ['title','content','name']
                    ],
                ]
            ]
        ];
        $response = $client->search($params);
        $response['status'] = 'ok';
        $response['user_link'] = route('user.profile');
        $response['post_link'] = route('post.show');
        $response['thumbnail_link'] = route('post.thumbnail');
        return $response;
    }
}
