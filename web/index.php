<?php

require_once dirname(__FILE__) . '/../vendor/autoload.php';
$app = new \Slim\Slim(
        array(
            'debug' => true,
            'log.level' => \Slim\Log::DEBUG,
            'templates.path' => '../app/view'
        )
);

$app->view()->appendData(array('baseUrl' => '/~clientelp/'));
    
    
$app->get('/hello/:name', 'Controller\Foo:bar');
$app->get('/', 'Controller\IndexController:indexAction');
$app->get('/cadastroareas', 'Controller\IndexController:cadastroAreaAction');
$app->get('/cadastroequipamentos', 'Controller\IndexController:cadastroEquipamentoAction');
$app->get('/cadastrousuarios', 'Controller\IndexController:cadastroUsuarioAction');



$app->get('/api/v1/areas', 'Controller\AreaController:listAreasAction');
$app->get('/api/v1/areas/filter', 'Controller\AreaController:filterAreasAction');
$app->get('/api/v1/areas/:id', 'Controller\AreaController:getAreaAction')->name('area_by_id');

$app->post('/api/v1/areas', 'Controller\AreaController:postAreaAction')->name('post_area');
$app->put('/api/v1/areas/:id', 'Controller\AreaController:putAreaAction')->name('put_area');
$app->delete('/api/v1/areas/:id', 'Controller\AreaController:deleteAreaAction')->name('delete_area');

$app->get('/api/v1/users', 'Controller\UserController:listAction');
$app->get('/api/v1/users/:id', 'Controller\UserController:getAction')->name('user_by_id');
$app->post('/api/v1/users', 'Controller\UserController:postAction')->name('post_user');
$app->put('/api/v1/users', 'Controller\UserController:putAction')->name('put_user');
$app->delete('/api/v1/users/:id', 'Controller\UserController:deleteAction')->name('delete_user');

$app->get('/api/v1/equipments', 'Controller\EquipmentController:listEquipmentsAction');
$app->get('/api/v1/equipments/area/:id', 'Controller\EquipmentController:listEquipmentsByAreaIdAction')->name('equipments_by_area_id');
$app->get('/api/v1/equipments/:id', 'Controller\EquipmentController:getEquipmentAction')->name('equipment_by_id');
$app->post('/api/v1/equipments','Controller\EquipmentController:postEquipmentAction')->name('post_equipment');
$app->put('/api/v1/equipments','Controller\EquipmentController:putEquipmentAction')->name('put_equipment');
$app->delete('/api/v1/equipments/:id','Controller\EquipmentController:deleteEquipmentAction')->name('delete_equipment');

$app->get('/api/v1/equipments/:equipmentId/events', 'Controller\EventController:listEventByEquipmentIdAction')->name('list_events_by_equipment_id');
$app->get('/api/v1/events/:id', 'Controller\EventController:getEventAction')->name('list_events_by_id');

/* $app->get('/api/v1/brands', 'Controller\BrandController:listBrandsAction');
 * $app->get('/api/v1/brands/:id', 'Controller\BrandController:getBrandAction')->name('brand_by_id');
 * $app->put('/api/v1/brands/:id', 'Controller\BrandController:putBrandAction')->name('brand_put_by_id');
 * $app->delete('/api/v1/brands/:id', 'Controller\BrandController:deleteBrandAction')->name('brand_delete_by_id');
 * $app->post('/api/v1/brands', 'Controller\BrandController:postBrandAction')->name('post_brand');
 */

$app->run();
