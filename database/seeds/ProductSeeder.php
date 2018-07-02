<?php

use App\Repositories\GroupRepo;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Repositories\SectorRepo;
use App\Repositories\SectorDetailRepo;
use App\Repositories\OrderRepo;
use App\Repositories\OrderDetailRepo;
use App\Repositories\MediaRepo;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Product::class,30)->create()->each(function(App\Product $product){
            $product->categories()->attach([
                rand(1,3)
            ]);
            //$faker = new Faker ;
            $numPhotos = rand(1,3);
            for ($i = 1; $i <= $numPhotos; $i++) {
                $objMediaRepo = new MediaRepo;
                $objMedia = $objMediaRepo->getModel();
                $identPhoto = rand(1,10);
                $objMedia->fullname = "concierto".$identPhoto.".jpg";
                $objMedia->product_id = $product->id;
                $objMedia->typeMedia = "photo";
                $objMedia->save();
            }
            $colorSector[] = "#005CA9";$colorSector[] = "#33CC00";$colorSector[] = "#FFCC00";$colorSector[] = "#BF9900";
            $numSectors = rand(1,4);
            $numTicketsSector = round($product->tickets/$numSectors);$acumTicketSector=0;
            $objGroupRepo = new GroupRepo;
            $objGroup = $objGroupRepo->getModel();
            $objGroup->fullname = 'General';
            $objGroup->save();
            $swPresale = rand(0,1);
            $valoresPresale[] = array('texto'=>"20% de descuento solo esta primera semana de venta",'descuento'=>0.20,'dias'=>7);
            $valoresPresale[] = array('texto'=>"30% de descuento los primeros 15 dias",'descuento'=>0.30,'dias'=>15);
            $valoresPresale[] = array('texto'=>"2x1 la primera semana de estreno",'descuento'=>0.50,'dias'=>7);
            $valoresPresale[] = array('texto'=>"15% de rebaja solo en la primera semana de estreno",'descuento'=>0.15,'dias'=>7);
            for ($i = 1; $i <= $numSectors; $i++) {
                //$activeSeat = rand(0,1);$activeSector = rand(0,1);

                $objSectorRepo = new SectorRepo;
                $objSector = $objSectorRepo->getModel();
                $title = 'Sector '.$product->id.'-'.$i;
                $objSector->fullname = $title;

                if ($i==$numSectors)
                {
                    $numTicketsSector=$product->tickets-$acumTicketSector;
                }else{
                    $acumTicketSector = $acumTicketSector + $numTicketsSector;
                }
                $objSector->tickets = $numTicketsSector;
                $objSector->seating =0;
                $objSector->product_id=$product->id;
                if ($i==0)
                {
                    $objSector->color = $colorSector[$i+1];
                }else{
                    $objSector->color = $colorSector[$i-1];
                }

                $objSector->save();

                $objSectorDetailRepo = new SectorDetailRepo;
                $objSectorDetail = $objSectorDetailRepo->getModel();
                $objSectorDetail->sector_id = $objSector->id;
                $objSectorDetail->group_id = $objGroup->id;
                $objSectorDetail->price = rand(45,550);

                if ($swPresale==1)
                {
                    $product->presale=true;
                    $indice = rand(0,3);
                    $product->text_presale=$valoresPresale[$indice]['texto'];
                }
                if ($product->presale==true)
                {
                    $fecha =$product->date->format('Y-m-d');
                    $nuevafecha = date('Y-m-d',strtotime('+'.$valoresPresale[$indice]['dias'].' days', strtotime($fecha)));
                    $product->date_expiry = $nuevafecha;
                    $product->save();
                    $objSectorDetail->price_offer = $objSectorDetail->price*(1-$valoresPresale[$indice]['descuento']);
                }else{
                    $objSectorDetail->price_offer = 0;
                }

                $objSectorDetail->save();
                $num_orders = rand(1,10);$acumQuantity=0;
                for ($j = 1; $j <= $num_orders; $j++) {

                    $quantity = rand(1,$objSector->tickets);
                    $acumQuantity = $quantity + $acumQuantity;
                    if ($acumQuantity<=$objSector->tickets)
                    {
                        $objOrderRepo = new OrderRepo;
                        $objOrder=$objOrderRepo->getModel();
                        $objOrder->product_id = $product->id;

                        $objOrder->save();

                        $objOrderDetailRepo = new OrderDetailRepo;
                        $objOrderDetail = $objOrderDetailRepo->getModel();
                        $objOrderDetail->order_id = $objOrder->id;
                        $objOrderDetail->seat_id = 0;
                        $objOrderDetail->sector_id = $objSector->id;
                        $objOrderDetail->group_id = $objGroup->id;
                        //$objOrderDetail->code = str_random(15);
                        if ($product->presale==true)
                        {
                            $objOrderDetail->price = $objSectorDetail->price_offer;
                        }else{
                            $objOrderDetail->price = $objSectorDetail->price;
                        }

                        $objOrderDetail->quantity = $quantity;
                        $objOrderDetail->amount = $quantity*$objSectorDetail->price;
                        $objOrderDetail->save();
                    }
                }
            }

        });
    }
}
