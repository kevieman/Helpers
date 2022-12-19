# Laravel Route Helpers

## NestedRouteHelper.php
This method can help with creating routes for a nested route.

How to use in `web.php` or orther route file:
```php
    use App\Helpers\Routes\Web\Helper; // Or other path

    Helper::get('parents', 'children', DossierTaskController::class);
```
This will create routes which will look like:

| Method | url | name | function |
| ----------- | ----------- | ----------- | ----------- |
| GET/HEAD | parents/children | parents.children.index | ParentChildController@index | 
| GET/HEAD | parents/children/create | parents.children.create | ParentChildController@create |
| GET/HEAD | parents/children/{child} | parents.children.show | ParentChildController@show |
| PUT/PATCH | parents/children/{child} | parents.children.update | ParentChildController@update |
| DELETE | parents/children/{child} | parents.children.destroy | ParentChildController@destroy |
| GET/HEAD | parents/children/{child}/edit | parents.children.edit | ParentChildController@edit |
| GET/HEAD | parents/{parent}/children | parents.children.parent-index | ParentChildController@index |
| POST | parents/{parent}/children | parents.children.store | ParentChildController@store |
| GET/HEAD | parents/{parent}/children/create | parents.children.parent-create | ParentChildController@create |