<?php
use Goutte\Client;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;


function getNetgazeti(){
    $netgazeti = Cache::remember("netgazeti" , now()->addMinutes(10), function(){
        $client = new Client();
        $crawler = $client->request('GET', 'https://netgazeti.ge/category/news/');
        return $crawler->filter('div.col-lg-4 > a')->each(function ($node){
            $object = new stdClass();
            $object->href = $node->attr('href');
            $object->title = $node->attr('title');
            return $object;
        });
    });
    return $netgazeti;
}

function getRadio(){
    $radio = Cache::remember("radio" , now()->addMinutes(10), function(){
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.radiotavisupleba.ge/');
        return $crawler->filter('.media-block__content > a')->each(function ($node){
            $object = new stdClass();
            $object->href = $node->attr('href');
            $object->title = $node->text();
            return $object;
        });
    });
    return $radio;
}

function getOnGe(){
    $onge = Cache::remember("onge" , now()->addMinutes(10), function(){
        $client = new Client();
        $crawler = $client->request('GET', 'https://on.ge/news');
        return $crawler->filter('.swiper-wrapper > li > a')->each(function ($node){
            $object = new stdClass();
            $object->href = $node->attr('href');
            $object->title = $node->text();
            return $object;
        });
    });
    return $onge;
}

function getIpn(){
    $ipn = Cache::remember("ipn" , now()->addMinutes(2), function(){
        $response = Http::post('https://www.interpressnews.ge/ka/api/home/articles/' , [
            'page' => 1,
            'loaded' => 0,
            'csrfmiddlewaretoken' => "yPdsn"
        ]);
        $res = json_decode($response->body());
        return $res->articles;
    });
    return $ipn;
}

function getPublic(){
    $public = Cache::remember("public" , now()->addMinutes(10), function(){
        $response = Http::get('https://1tv.ge/wp-json/listing/all/news?offset=0&lang=ge&post_type=news&topic=&tpl_ver=38.8');
        return json_decode($response->body());
    });
    return $public;
}

Route::get('/', function () {
    return response()->view('welcome' , [
        'netgazeti' => getNetgazeti() , 
        'ipn' => getIpn(),
        'onge' => getOnGe(),
        'public' => getPublic(),
        'radio' => getRadio()
        
    ]);

});
