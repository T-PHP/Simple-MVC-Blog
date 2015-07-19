<?php
namespace Controllers;

use Helpers\Session;
use Helpers\Url;
use Helpers\Csrf;
use Helpers\SimpleImage;
use Helpers\Paginator;
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
     * Index of Blog : Display all posts
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
    
    /**
     * Category : Display all post by category ID and URL
     */
    public function category($id, $url)
    {
        
        $pages = new Paginator(POSTS_PER_PAGE,'p');
        $data['posts'] = $this->blog->get_posts_by_category($id, $url, $pages->getLimit());
        $data['posts_total'] = count($this->blog->get_posts_by_category_total($id));
        $pages->setTotal($data['posts_total']);
        $data['pageLinks'] = $pages->pageLinks();
        //var_dump($pages->getInstance()); exit; Pagination en cours
        $data['category'] = $this->blog->get_category($id);
        
        if (!empty($data['category'][0]->category_title)):
            $data['title'] = $data['category'][0]->category_title;
        else:
            $data['title'] = $data['category'][0]->category_name;
        endif;
        
        $data['meta_description'] = $data['category'][0]->category_meta_description;
        
        View::renderTemplate('header', $data);
        View::render('blog/category', $data);
        View::renderTemplate('footer', $data);
        
    }
    
    /**
     * Post : Display post by ID and URL
     */
    public function post($id, $url)
    {
        /* Get Post Informations */
        $data['post'] = $this->blog->get_post($id, $url);
       
        /* Meta Tags */
        if (!empty($data['post'][0]->post_title)):
            $data['title'] = $data['post'][0]->post_title;
        else:
            $data['title'] = $data['post'][0]->post_name;
        endif;
        $data['meta_description'] = $data['post'][0]->post_meta_description;
        
        /* Display View */
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
