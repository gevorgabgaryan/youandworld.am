<?php

namespace Numerus\Http\Controllers;

use Numerus\Repositories\AboutsRepository;
use Numerus\Repositories\MenusRepository;
use Routes;
use Stichoza\GoogleTranslate\GoogleTranslate;

class SiteController extends Controller {
	//
	protected $s_rep;
	protected $a_rep;
	protected $m_rep;
	protected $c_rep;
	protected $gs_rep;
	protected $pm_rep;
	protected $ap_rep;
	protected $ab_rep;
	protected $sch_rep;
	protected $tamplate;
    protected $title;
    protected $keywords;
    protected $metaContent;
    protected $ogtitle;
    protected $ogimage;
    protected $ogurl;
    protected $ogdesc;
    protected $pagetitle;

	protected $vars = array();

	protected $contentRightBar = FALSE;
	protected $contentLeftBar = FALSE;

	protected $bar = FALSE;

	public function __construct(MenusRepository $m_rep, AboutsRepository $ab_rep) {
		$this->m_rep = $m_rep;
		$this->ab_rep = $ab_rep;

	}
	protected function renderOutput() {
		      $tr = new GoogleTranslate();

		$tr->setTarget(app()->getLocale());
        
     
		$menu = $this->getMenu();
		$navigation = view('navigation')->withmenu($menu)->render();
		$this->vars = array_add($this->vars, 'navigation', $navigation);

		if ($this->contentRightBar) {

			$rightBar = view('rightBar')->with('content_rightBar', $this->contentRightBar)->render();
			$this->vars = array_add($this->vars, 'rightBar', $rightBar);
		}
		$this->vars = array_add($this->vars, 'bar', $this->bar);

		$abouts = $this->getAbout();
		$footer = view('footer')->with('abouts', $abouts)->render();
        $title=trans('lang.title');
        $pagetitle="";
        $keywords=trans('lang.hkeywords');
        $metaContent=trans('lang.hmetaContent');
        $ogtitle=trans('lang.title');
        $ogimage="https://youandworld.am/numerus/images/fblogo.png";
        $ogurl="https://youandworld.am/";
        $ogdesc=trans('lang.hdesc');

		$this->vars = array_add($this->vars, 'footer', $footer);
		$this->vars = array_add($this->vars, 'title', $title);
		$this->vars = array_add($this->vars, 'pagetitle', $pagetitle);
		$this->vars = array_add($this->vars, 'keywords', $keywords);
		$this->vars = array_add($this->vars, 'metaContent', $metaContent);

		$this->vars = array_add($this->vars, 'ogtitle', $ogtitle);
		$this->vars = array_add($this->vars, 'ogimage', $ogimage);
		$this->vars = array_add($this->vars, 'ogurl', $ogurl);
		$this->vars = array_add($this->vars, 'ogdesc', $ogdesc);
        $this->vars = array_add($this->vars, "tr", $tr);
		return view($this->tamplate)->with($this->vars);
	}

	public function getAbout() {
		$abouts = $this->ab_rep->get();
		return $abouts;
	}

	public function getMenu() {
		$menu = $this->m_rep->get();
		$mBuilder = \Menu::make('MyNavBar', function ($m) use ($menu) {
			foreach ($menu as $item) {
				if ($item->parent_id == 0) {
					$m->add($item->title, $item->path)->id($item->id);
				}
			}
			
		});

		return $menu;
	}

}
