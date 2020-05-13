<?php

namespace Numerus\Http\Controllers;
use Numerus\Repositories\ArticlesRepository;
use Illuminate\Support\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Auth;
use Config;

class MailChimpController extends Controller
{


    public $mailchimp;
    public $listId = 'da213e4ca3';


    public function __construct(\Mailchimp $mailchimp, ArticlesRepository $a_rep)
    {
        $this->mailchimp = $mailchimp;
        $this->a_rep = $a_rep;
    }


    public function manageMailChimp()
    {
        return view('mailchimp');
    }


    public function subscribe(Request $request)
    {
    	$this->validate($request, [
	    	'email' => 'required|email',
        ]);


        try {

        
            $this->mailchimp
            ->lists
            ->subscribe(
                $this->listId,
                ['email' => $request->input('email')]
            );


            return redirect()->back()->with('success','Email Subscribed successfully');


        } catch (\Mailchimp_List_AlreadySubscribed $e) {
            return redirect()->back()->with('error','Email is Already Subscribed');
        } catch (\Mailchimp_Error $e) {
            return redirect()->back()->with('error','Error from MailChimp');
        }
    }


    public function sendCompaign()
    {

                                              $locale = app()->getLocale();
                                               $al= 'alias_'.$locale;
                                               $tit='title_'.$locale;
                                               $desc='desc_'.$locale;
                                             

                                    
   
        $articles=$this->getArticles();
        foreach($articles as $article){
       
             if(strtotime($article->created_at) > strtotime("today")){


                        try {



                            $options = [
                            'list_id'   => $this->listId,

                            'subject' => $article->title_hy,
                            'from_name' => trans('lang.ntitle') ,
                            'from_email' => 'info@youandworld.am',
                       
                            ];


                            $content =[
                                'text'=>'Սա միայն հոդվածի նախաբանն է: Ամբողջական հոդվածն ընթերցելու համար այցելեք մեր կայք «Դուք և աշխարհը»',

                                'html'=>"<a href=".route('articles.show', ['alias'=>$article->$al,'locale'=>app()->getLocale()]) ." title=".  $article->$desc." class='ga_title'>".$article->$tit."</a>"."<p>".$article->desc_hy."</p>"."Սա միայն հոդվածի նախաբանն է: Ամբողջական հոդվածն ընթերցելու համար այցելեք մեր կայք «Դուք և աշխարհը» (youandworld.am):"];


                            $campaign = $this->mailchimp->campaigns->create('regular', $options, $content);
                      
                            $this->mailchimp->campaigns->send($campaign['id']);




                            
                        } catch (Exception $e) {
                            return redirect()->back()->with('error','Error from MailChimp');
                        }
               }






             }

              return redirect()->back()->with('success','send campaign successfully');

        }
        





     protected function getArticles(){
        $article=$this->a_rep->get("*", FALSE,  TRUE);;
    
        return $article;

     }


}
