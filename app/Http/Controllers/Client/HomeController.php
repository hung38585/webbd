<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\FeedbackInterface;
use App\Repositories\Interfaces\InfomationInterface;
use App\Repositories\Interfaces\ServiceInterface;
use App\Repositories\Interfaces\AboutInterface;
use App\Repositories\Interfaces\ProductInterface;
use App\Models\News;
use App\Models\Shares;

class HomeController extends Controller
{
    private $feedbackRepo;
    private $infomationRepo;
    private $serviceRepo;
    private $aboutRepo;
    private $productRepo;
    private $newModel;
    private $shareModel;
    public function __construct(FeedbackInterface $feedbackRepository, InfomationInterface $infomationRepository, ServiceInterface $serviceRepository, AboutInterface $aboutRepository, ProductInterface $productRepository)
    {
        $this->feedbackRepo = $feedbackRepository;
        $this->infomationRepo = $infomationRepository;
        $this->serviceRepo = $serviceRepository;
        $this->aboutRepo = $aboutRepository;
        $this->productRepo = $productRepository;
        $this->newModel = new News();
        $this->shareModel = new Shares();
        $infomation = $this->infomationRepo->getAll();
        $abouts = $this->aboutRepo->getAll();
        view()->share(compact('infomation', 'abouts'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = $this->feedbackRepo->getAll();
        $services = $this->serviceRepo->getAll();
        $products = $this->productRepo->getProductHome();
        $news = $this->newModel->getAll(10);
        $shares = $this->shareModel->getAll(10);
        return view('client.home.home', compact('feedbacks', 'services', 'products', 'news', 'shares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function feedback()
    {
        $feedbacks = $this->feedbackRepo->getAll();
        return view('client.home.feedback', compact('feedbacks'));
    }

    public function contact()
    {
        return view('client.home.contact');
    }

    public function about()
    {
        return view('client.home.story');
    }

    public function new()
    {
        $news = $this->newModel->getAll(4);
        return view('client.home.new', compact('news'));
    }

    public function share()
    {
        $shares = $this->shareModel->getAll(4);
        return view('client.home.share', compact('shares'));
    }

    public function shareDetail($title)
    {
        $share = $this->shareModel->getByTitle($title);
        return view('client.home.share_detail', compact('share'));
    }

    public function newDetail($title)
    {
        $new = $this->newModel->getByTitle($title);
        return view('client.home.new_detail', compact('new'));
    }
}
