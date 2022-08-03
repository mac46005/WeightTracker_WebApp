<?php

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\Controllers;

use Exception;
use WghtTrackApp_ClassLib\App\Container;
use WghtTrackApp_ClassLib\App\View;
use WghtTrackApp_ClassLib\DB_Models\Enums\CRUD_Enum;
use WghtTrackApp_ClassLib\DB_Models\Interfaces\IDBAccess;
use WghtTrackApp_ClassLib\Models\EntryItem;

class DataManagerController{
    public function __construct(private Container $container, private IDBAccess $dbAccess)
    {
        
    }
    public function index(): View{
        return View::create_View('/datamanagerviews/index');
    }

    /**
     * @method GET
     */
    public function viewItemForm(): View{
        return View::create_View('datamanagerviews/ItemForm');
    }

    public function submitForm(): View{
        $from = $_GET['from'];
        $object = $this->container->get(EntryItem::class);
        $operation = $_GET[CRUD_Enum::OPERATION];
        if($operation == CRUD_Enum::CREATE){
            if($result = $this->dbAccess->write($object)){
                if($from = 'home'){
                    return View::create_View('index');
                }else{
                    return View::create_View('datamanager/index');
                }
            }else {
                throw new \PDOException('Error found in submitForm(). Operation: $operation');
            }
        }else{

        }
    }
    /**
     * @method POST
     */
    public function deleteItem(): View{
        return View::create_View('');
    }
}