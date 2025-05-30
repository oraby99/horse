<?php
namespace App\Http\Controllers\website\Home;
use App\Models\Category;
use App\Models\Advertisment;
use App\Traits\FilesTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\website\ads;
use App\Models\Camp;
use App\Models\Country;
use App\Models\Order;
use App\Models\Product;
use App\Services\HesabePaymentService;
use Illuminate\Support\Facades\Redirect;

class MainController extends Controller
{
    use FilesTrait;
    protected $model;
    protected $area;
    protected $category;
    protected $hesabeService;
    public function __construct(Advertisment $model , Category $category , HesabePaymentService $hesabeService )
    {
        $this->model = $model;
        $this->hesabeService = $hesabeService;
        $this->category = $category;
    }
    public function main()
    {
        $categroy = category::all();
        $ads      = Advertisment::where('is_active',true)->take(8)->latest()->get();
        $products = Product::take(8)->latest()->get();
    //  return $categroy;
        return view('welcome',compact( 'categroy','ads','products'));
    }
    public function contact()
    {
        return view('contact');
    }
    public function about()
    {
        $currentLocale = app()->getLocale();
        return view('about',compact('currentLocale'));
    }
    public function terms()
    {
        $currentLocale = app()->getLocale();
        return view('terms',compact('currentLocale'));
    }
    public function home(Request $request)
    {
        $query = $this->model->where('is_active',true);

        if(isset($request->key))
        {
            if(isset($request->category_id))
            {
                $catagoryId = Category::where('parent_id',$request->category_id)->pluck('id')->toArray();
                $query->whereIn('category_id',$catagoryId);
            }
            // if(isset($request->type))
            // {
            //     // $query->where('')
            // }
        }
        if( $request->get('category_id') == 1)
        {
            $data = Product::latest()->paginate(6);
        }
        elseif($request->get('category_id') == 4)
        {
            $data = Camp::where('is_active',1)->latest()->paginate(6);
        }else{
            $data = $query->with('user')->where('is_active',true)->filter($request->all())->latest()->paginate(6);
        }
        $categroy = $this->category->all();
        return view('advertisment.index',['data'=>$data,'categories'=>$categroy]);
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('advertisment.show',compact( 'product' ) );
    }

    public function showAds($id)
    {
        $advertisement = Advertisment::findOrFail($id);
        return view('advertisment.show_ads',compact('advertisement'));
    }

    public function showCamp($id)
    {
        $camp = Camp::findOrFail($id);
        return view('advertisment.show_camps',compact('camp'));
    }
    public function create()
    {
        $categories = Category::all();
        $countries = Country::all();
        return view('advertisment.create', ['categories' => $categories, 'countries' => $countries]);
    }
    public function storeadd(Request $request)
    {
        $data = $request->all();
        // return $data;
        $data['user_id'] = auth()->user()->id;

        $imageNames = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageNames [] = $this->saveFile($image , config('filepath.ADVERTISMENT_PATH'));
                // $newImageName = "advertisments-" . uniqid() . '.' . $image->getClientOriginalExtension();
                // $image->move(public_path('uploads/advertisments/'), $newImageName);
                // $imageNames[] = $newImageName;
            }
        }
        $data['images'] = $imageNames;

        if ($request->hasFile('videos')) {
            if ($data['videos'] !== null) {
                $oldVideoPath = public_path('uploads/advertisments/') . $data['videos'] ;
                if (file_exists($oldVideoPath)) {
                    unlink($oldVideoPath);
                }

            }
            $newVideo = $request->file('videos');
        
            // $newVideoName = "advertisments-" . uniqid() . '.' . $newVideo->getClientOriginalExtension();
            // $newVideo->move(public_path('uploads/advertisments/'), $newVideoName);
            $data['videos'] = $this->saveFile($newVideo,'uploads/advertisments');
        }
        $sum = 0;
        if($data['ads_type'] == 'normal')
        {
            $sum = 5;
        }else if($data['ads_type'] == 'special')
        {
            $sum = 7;
        }
        // $sum = $data['price'] + 5 ;
        $amount = number_format($sum, 3, '.', '');
        $orderId = 'advertisment-' . uniqid() . time(); // Generate a unique order ID
        // $order = new Order();
        // $order->user_id =auth()->user()->id;
        // // $order->address_id = 1;
        // $order->total = $amount;
        // $order->order_number = $orderId;
        // $order->save();
        $dataOrder = [
            'user_id' => auth()->user()->id,
            'order_number' => $orderId,
            'total' => $amount,
            'payment_status' => 'pending',
        ];

        if (!$amount || $amount <= 0) {
            return redirect()->route('payment.failed')->with('error', 'Invalid amount.');
        }
    
        $returnUrl = route('payment.success');

        try {
            $responce = $this->hesabeService->createPayment($amount, $orderId, $returnUrl);
            Advertisment::create(array_merge($data,$dataOrder));
            return Redirect::to(config('hesabe.api_url').'payment?data='.$responce);
            // return redirect($paymentUrl);
        } catch (\Exception $e) {
            return redirect()->route('payment.failed')->with('error', $e->getMessage());
        }
        return redirect()->back()->with(['success' => 'Ads added successfully!']);
    }

}

