<?php

namespace app\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use Yii;

/**
 * AppController extends Controller and implements the behaviors() method
 * where you can specify the access control ( AC filter + RBAC ) for your controllers and their actions.
 */
class AppController extends Controller
{
    /**
     * Returns a list of behaviors that this component should behave as.
     * Here we use RBAC in combination with AccessControl filter.
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'controllers' => ['user'],
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'controllers' => ['asset', 'building', 'room', 'location', 'person', 'transfer'],
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['admin', 'employee'],
                    ],
                    [
                        'controllers' => ['asset', 'location', 'person', 'transfer'],
                        'actions' => ['index', 'view'],
                        'allow' => true,
                        'roles' => ['member'],
                    ],
                    [
                        'controllers' => ['asset', 'location', 'person', 'transfer'],
                        'actions' => ['create', 'update', 'delete'],
                        'allow' => false,
                        'roles' => ['member'],
                    ],
                    [
                        'controllers' => ['room', 'building'],
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => false,
                        'roles' => ['member'],
                    ],
                ], // rules

            ], // access

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ], // verbs

        ]; // return

    } // behaviors

} // AppController
