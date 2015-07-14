<?php
namespace Controllers;

use Helpers\Session;
use Helpers\Url;
use Helpers\Csrf;
use Helpers\SimpleImage;
use Core\View;
use Core\Controller;

/*
 * Blog controller
 *
 * @author David Carr - dave@simplemvcframework.com
 * @version 2.2
 * @date June 27, 2014
 * @date updated May 18 2015
 */
class Blog extends Controller
{

    private $model;
    
	public function __construct(){
        
		$this->blog = new \Models\Blog();
        
	}

    /**
     * Define Index page title and load template files
     */
    public function index()
    {
        $data['title'] = "Blog";
        $data['meta_description'] = "Blog";
        $data['posts'] = $this->blog->get_posts();
        
        View::renderTemplate('header', $data);
        View::render('blog/index', $data);
        View::renderTemplate('footer', $data);
    }

    public function post($id, $url)
    {
        $data['title'] = "Blog";
        $data['meta_description'] = "Blog";
        
        $data['post'] = $this->blog->get_post($id, $url);
        //Data::vd($data['image_cover']);
     
       
        if ($url = $data['post'][0]->post_url):
            View::renderTemplate('header',$data);
            View::render('blog/post',$data);
            View::renderTemplate('footer',$data);
        else:
            View::rendertemplate('header',$data);
            View::render('error/404',$data);
            View::rendertemplate('footer',$data);
        endif;
    }
}
