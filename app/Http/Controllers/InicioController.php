<?php

namespace App\Http\Controllers;

use App\Mail\InsertOrder;
use Carbon\Carbon;
use Culqi\Culqi;
use Illuminate\Http\Request;
use App\Repositories\ProductRepo;
use App\Repositories\SectorRepo;
use App\Repositories\OrderRepo;
use App\Repositories\OrderDetailRepo;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Repositories\TicketRepo;
use App\Repositories\InfoRepo;

class InicioController extends Controller
{
    protected $productRepo;
    protected $sectorRepo;
    protected $orderRepo;
    protected $orderDetailRepo;
    protected $ticketRepo;
    protected $infoRepo;

    public $rutaPhotos;
    public $rutaImages;
    public $rutaQr;
    public $url_base;
    public $rutaFisicaQr;

    public function __construct(InfoRepo $infoRepo,TicketRepo $ticketRepo,OrderDetailRepo $orderDetailRepo,OrderRepo $orderRepo,SectorRepo $sectorRepo,ProductRepo $productRepo)
    {
        $this->productRepo = $productRepo;
        $this->sectorRepo = $sectorRepo;
        $this->orderRepo = $orderRepo;
        $this->orderDetailRepo = $orderDetailRepo;
        $this->ticketRepo = $ticketRepo;
        $this->infoRepo = $infoRepo;

        $this->rutaPhotos = "/media/photos/";
        $this->rutaImages = "/media/images/";
        $this->rutaQr = "/media/qrcodes";
        $this->rutaFisicaQr = "media/qrcodes/";
        $this->url_base = \URL::to('/');
        if (! Session::has('cart')) Session::put('cart',array());
    }

    public function home()
    {
        $objProduct = $this->productRepo->getModel();
        $regsProducts = $objProduct->whereDate('date', '>=', Carbon::now()->format('Y-m-d'))->take(10)->orderBy('date', 'asc')->get();//dd($regsProducts);
        $regsProductSlider = $regsProducts->random(3);
        //$mediaObj=$regsProductSlider[0]->medias->random()->fullname;dd($mediaObj);
        $rutaPhotos = $this->rutaPhotos;

        //dd($regsProducts->random(3));
        return view('webPublic/inicio', compact('rutaPhotos', 'regsProductSlider'));
    }

    public function detailEvent($slug)
    {
        //setlocale(LC_TIME, 'Spanish');
        $objProduct = $this->productRepo->getModel();
        $regProduct = $objProduct->where('slug', '=', $slug)->firstOrFail();
        $rutaImages = $this->rutaImages;
        $rutaPhotos = $this->rutaPhotos;//dd($regProduct->sectors[0]->sector_details);
        $cart = Session::get('cart');
        if (count($cart)==0){
            $cart[-1]=$regProduct->id;
            foreach ($regProduct->sectors as $sector) {
                $cart[$sector->id]=0;
            }
            Session::put('cart',$cart);
        }

        if ($cart[-1]<>$regProduct->id){
            $cart[-1]=$regProduct->id;
            foreach ($regProduct->sectors as $sector) {
                $cart[$sector->id]=0;
            }
            Session::put('cart',$cart);
        }
        //dd(strftime("%A %e %B %Y"));//viernes 19 febrero 2010
        /*Carbon::setUtf8(true);
        $dt = Carbon::parse($regProduct->date);
        dd($dt->format('D'));*/

        return view('webPublic/productDetail', compact('cart','rutaPhotos', 'rutaImages', 'regProduct'));
    }

    public function previousBuy(Request $request)
    {
        $valoresPost = $request->all();
        $valor1 = $valoresPost['valoresId'];
        $product_id = $valoresPost['product_id'];

        $valor2 = explode("|", $valor1);
        $numTickets=0;
        $montoTotal = 0;
        foreach ($valor2 as $item) {
            if ($item <> "") {
                $valor3 = explode(":", $item);
                $sector_id = $valor3[0];
                $cant_sector = $valor3[1];
                $cart[-1]=$product_id;
                $cart[$sector_id]=$cant_sector;
                if ($cant_sector<>0){
                    $objSector = $this->sectorRepo->find($sector_id);
                    $objProduct = $this->productRepo->find($product_id);
                    if ($objProduct->presale==1){
                        if (count($objSector->sector_details)==1){
                            $price = $objSector->sector_details[0]->price_offer;
                        }
                    }else{
                        if (count($objSector->sector_details)==1){
                            $price = $objSector->sector_details[0]->price;
                        }
                    }
                    $monto = $price*$cant_sector;
                    $valPreVenta[] = array('product_id'=>$product_id,'sector_id'=>$objSector->id,'sector'=>$objSector->fullname,'cantidad'=>$cant_sector,'precio'=>$price,'monto'=>$monto);
                    $numTickets = $numTickets + $cant_sector;
                    $montoTotal = $montoTotal + $monto;
                }

            }
        }
        Session::put('cart',$cart);
        $valTotales = array('num_tickets'=>$numTickets,'monto_total'=>$montoTotal);
        //QrCode::format('png')->size(200)->generate('Make me into a QrCode!', 'media/qrcodes/'.$valTotales['monto_total'].'.png');
        //$ruta_qr = $this->url_base.$this->rutaQr;
        $objInfoRepo = $this->infoRepo->getModel();
        $objInfo = $objInfoRepo->where('type','terminos')->first();

        return view('webPublic/productDetailCheck', compact('objInfo','objProduct','valPreVenta', 'valTotales'));
    }

    public function purchasedComplete(Request $request){

        $token=$request->input('token');
        $product_id=$request->input('product_id');
        $valPreVenta=$request->input('val_pre_venta');
        $monto_total=$request->input('monto_total');
        $dni=$request->input('dni');
        $celular=$request->input('celular');
        $email=$request->input('email');


        $objProduct= $this->productRepo->find($product_id);
        //header('Access-Control-Allow-Origin: *');
        //header('Content-type: application/json');
        //return Response::json($token);
        if($token){

            // Configurar tu API Key
            $SECRET_API_KEY = "sk_test_TDvhF065wClvxRO3";
            $culqi = new Culqi(array('api_key' => $SECRET_API_KEY));

            try{
                // Creamos Cargo a una tarjeta
                $cargo = $culqi->Charges->create(
                    array(
                        "amount" => $monto_total,
                        "capture" => true,
                        "currency_code" => "PEN",
                        "description" => $objProduct->fullname,
                        "email" => $email,
                        "dni" => $dni,
                        "celular" => $celular,
                        "source_id"=> $token,
                    )
                );
                $objOrder = $this->orderRepo->getModel();
                $objOrder->product_id = $product_id;
                $objOrder->dni=$dni;
                $objOrder->email = $email;
                $objOrder->celular = $celular;
                $objOrder->type_payment = 'Visa';

                $objOrder->save();
                $order_id = $objOrder->id;


                $objOrder->save();

                $sectores = explode("|", $valPreVenta);
                foreach ($sectores as $sectore) {
                    if ($sectore<>""){
                        $sectorDetail = explode(":", $sectore);
                        $objOrderDetailRepo = $this->orderDetailRepo->getModel();
                        $objOrderDetailRepo->order_id = $order_id;
                        $objOrderDetailRepo->seat_id = 0;
                        $objOrderDetailRepo->sector_id = $sectorDetail[0];
                        $objOrderDetailRepo->price = $sectorDetail[1];
                        $objOrderDetailRepo->quantity = $sectorDetail[2];
                        $objOrderDetailRepo->group_id = 1;
                        $objOrderDetailRepo->amount = $sectorDetail[1]*$sectorDetail[2];

                        $objOrderDetailRepo->save();
                        for ($i = 1; $i <= $sectorDetail[2]; $i++) {
                            $objTicket = $this->ticketRepo->getModel();
                            $objTicket->order_detail_id = $objOrderDetailRepo->id;
                            $objTicket->code = str_random(15);

                            $objTicket->save();
                            QrCode::format('png')->size(200)->generate($order_id."-".$objTicket->id, 'media/qrcodes/'.$objTicket->code.'.png');
                            $objTicket->code_qr = $this->url_base.$this->rutaQr."/".$objTicket->code.".png";
                            $objTicket->save();
                        }
                    }
                }
                $cart = Session::get('cart');
                $cart[0] = $email;
                $cart[-2] = $order_id;
                Session::put('cart',$cart);

                Mail::to($email)->send(new InsertOrder($objOrder));
                return json_encode($cargo);

            } catch(Exception $e){

                $cargo2= $e->getMessage();

                return $cargo2;

            }
        }

    }

    public function verifyOrder(Request $request)
    {
        $order_id=$request->input('order_id');
        $code=$request->input('code');
        $user_id=$request->input('user_id');
        $objOrder = $this->orderRepo->find($order_id);

        if (count($objOrder)>0){
            $nombre_fichero = $this->rutaFisicaQr.$objOrder->code.".png";
            if (file_exists($nombre_fichero))
            {
                if (unlink($nombre_fichero)){
                    $resultado = true;
                }else{
                    $resultado = false;
                }
            }else{
                $resultado = false;
            }
            $objOrder->code=0;
            $objOrder->code_qr=0;
            $objOrder->verified=1;
            $objOrder->user_id=$user_id;
            $mytime = Carbon::now();
            $horaSistema = $mytime->toDateTimeString();
            $objOrder->date_verified=$horaSistema;
            $objOrder->save();

            return response()->json(['success' => 1]);
        }else{
            return response()->json(['success' => 0]);
        }


    }
    public function endProcess()
    {
        $cart = Session::get('cart');
        if (count($cart)>0){
            if (array_key_exists('0',$cart)){
                $product_id=$cart[-1];
                $email = $cart[0];
                $order_id = $cart[-2];
                $objOrder = $this->orderRepo->find($order_id);
            }
        }else{
            $email =0;
        }

        return view('webPublic/productPurchased',compact('email','objOrder'));
    }

    public function searchEvents(Request $request){
        //dd($request->textSearch);
        $rutaImages = $this->rutaImages;
        $rutaPhotos = $this->rutaPhotos;
        $objProduct = $this->productRepo->getModel();//$regsProductSliders
        $regsProductSliders = $objProduct->name($request->get('textSearch'))->whereDate('date', '>=', Carbon::now()->format('Y-m-d'))->orderBy('date','asc')->paginate(50);
        return view('webPublic.search',compact('rutaPhotos','rutaImages','regsProductSliders'));
    }

    public function info($type){
        $objInfoRepo = $this->infoRepo->getModel();
        $objInfo = $objInfoRepo->where('type',$type)->first();
        return view('webPublic.terms',compact('objInfo'));
    }
}
