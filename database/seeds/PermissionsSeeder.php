<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ===================================PERMISOS USUARIOS============
        Permission::create([
            'name' => 'USUARIO - NAVEGAR',
            'slug' => 'users.index',
            'description' => 'lista y navega por usuarios',
        ]);
        Permission::create([
            'name' => 'USUARIO - CREAR',
            'slug' => 'users.create',
            'description' => 'crear usuario',
        ]);
        Permission::create([
            'name' => 'USUARIO - VER',
            'slug' => 'users.show',
            'description' => 'ver detalle de usuario',
        ]);
        Permission::create([
            'name' => 'USUARIO - EDITAR',
            'slug' => 'users.edit',
            'description' => 'editar usuario',
        ]);
        Permission::create([
            'name' => 'USUARIO - ELIMINAR',
            'slug' => 'users.destroy',
            'description' => 'eliminar usuario',
        ]);

        // ===================================PERMISOS ROLES============
        Permission::create([
            'name' => 'ROL - NAVEGAR',
            'slug' => 'roles.index',
            'description' => 'lista y navega por rol',
        ]);
        Permission::create([
            'name' => 'ROL - CREAR',
            'slug' => 'roles.create',
            'description' => 'crear rol',
        ]);
        Permission::create([
            'name' => 'ROL - VER',
            'slug' => 'roles.show',
            'description' => 'ver detalle de rol',
        ]);
        Permission::create([
            'name' => 'ROL - EDITAR',
            'slug' => 'roles.edit',
            'description' => 'editar rol',
        ]);
        Permission::create([
            'name' => 'ROL - ELIMINAR',
            'slug' => 'roles.destroy',
            'description' => 'eliminar rol',
        ]);


        // =================================CATEGORIES=====================================
        Permission::create([
            'name' => 'CATEGORÍA - NAVEGAR',
            'slug' => 'categories.index',
            'description' => 'lista y navega por categoría',
        ]);

        Permission::create([
            'name' => 'CATEGORÍA - CREAR',
            'slug' => 'categories.create',
            'description' => 'crear categoría',
        ]);

        Permission::create([
            'name' => 'CATEGORÍA - VER',
            'slug' => 'categories.show',
            'description' => 'ver detalle de categoría',
        ]);

        Permission::create([
            'name' => 'CATEGORÍA - EDITAR',
            'slug' => 'categories.edit',
            'description' => 'editar categoría',
        ]);

        Permission::create([
            'name' => 'CATEGORÍA - ELIMINAR',
            'slug' => 'categories.destroy',
            'description' => 'eliminar categoría',
        ]);

        // #######################################RUTA CLIENTES################################
        Permission::create([
            'name' => 'CLIENTE - NAVEGAR',
            'slug' => 'clients.index',
            'description' => 'lista y navega por cliente',
        ]);

        Permission::create([
            'name' => 'CLIENTE - CREAR',
            'slug' => 'clients.create',
            'description' => 'crear cliente',
        ]);

        Permission::create([
            'name' => 'CLIENTE VER',
            'slug' => 'clients.show',
            'description' => 'ver detalle de cliente',
        ]);

        Permission::create([
            'name' => 'CLIENTE - EDITAR',
            'slug' => 'clients.edit',
            'description' => 'editar cliente',
        ]);

        Permission::create([
            'name' => 'CLIENTE - ELIMINAR',
            'slug' => 'clients.destroy',
            'description' => 'eliminar cliente',
        ]);

        // ##################################RUTA PRODUCTOS###################################
        Permission::create([
            'name' => 'PRODUCTO - NAVEGAR',
            'slug' => 'products.index',
            'description' => 'lista y navega por producto',
        ]);

        Permission::create([
            'name' => 'PRODUCTO - CREAR',
            'slug' => 'products.create',
            'description' => 'crear producto',
        ]);

        Permission::create([
            'name' => 'PRODUCTO - VER',
            'slug' => 'products.show',
            'description' => 'ver detalle de producto',
        ]);

        Permission::create([
            'name' => 'PRODUCTO - EDITAR',
            'slug' => 'products.edit',
            'description' => 'editar producto',
        ]);

        Permission::create([
            'name' => 'PRODUCTO - ELIMINAR',
            'slug' => 'products.destroy',
            'description' => 'eliminar producto',
        ]);

        // #####################RUTA PARA CAMBIAR ESTADO DE UN PRODUCTO##########################
        // Permission::create([
        //     'name' => 'PRODUCTO - CAMBIAR ESTADO',
        //     'slug' => 'change.status.products',
        //     'description' => 'cambiar estado de producto',
        // ]);

        // ###########################RUTA REPORTE DE ESTADOS DE PRODUCTOS#####################
        Permission::create([
            'name' => 'REPORTE - ESTADOS DE PRODUCTOS',
            'slug' => 'reports.productstates',
            'description' => 'generar reportes de ventas',
        ]);

        // #########################################RUTA PROVEEDORES###############################
        Permission::create([
            'name' => 'PROVEEDOR - NAVEGAR',
            'slug' => 'providers.index',
            'description' => 'lista y navega por proveedor',
        ]);

        Permission::create([
            'name' => 'PROVEEDOR - CREAR',
            'slug' => 'providers.create',
            'description' => 'crear proveedor',
        ]);

        Permission::create([
            'name' => 'PROVEEDOR - VER',
            'slug' => 'providers.show',
            'description' => 'ver detalle de proveedor',
        ]);

        Permission::create([
            'name' => 'PROVEEDOR - EDITAR',
            'slug' => 'providers.edit',
            'description' => 'editar proveedor',
        ]);

        Permission::create([
            'name' => 'PROVEEDOR - ELIMINAR',
            'slug' => 'providers.destroy',
            'description' => 'eliminar proveedor',
        ]);

        // ######################################RUTA COMPRAS###############################
        Permission::create([
            'name' => 'COMPRA - NAVEGAR',
            'slug' => 'purchases.index',
            'description' => 'lista y navega por compra',
        ]);

        Permission::create([
            'name' => 'COMPRA - CREAR',
            'slug' => 'purchases.create',
            'description' => 'crear compra',
        ]);

        Permission::create([
            'name' => 'COMPRA - VER DETALLE',
            'slug' => 'purchases.show',
            'description' => 'ver detalle de compra',
        ]);

        // #############################RUTA PARA CAMBIAR ESTADO DE COMPRA##################
        Permission::create([
            'name' => 'COMPRA - CAMBIAR ESTADO',
            'slug' => 'change.status.purchases',
            'description' => 'cambiar estado de compra',
        ]);

        // #######################RUTA PARA DESCARGAR REPORTE EN PDF DE COMPRA#####################
        Permission::create([
            'name' => 'COMPRA - DESCARGAR PDF',
            'slug' => 'purchases.pdf',
            'description' => 'descargar compra en PDF',
        ]);

        // ##########################RUTA DE REPORTE DE COMPRAS#####################
        Permission::create([
            'name' => 'REPORTE - COMPRAS',
            'slug' => 'reports.purchases',
            'description' => 'generar reportes de compras',
        ]);

        // #######################################RUTA VENTAS##############################
        Permission::create([
            'name' => 'VENTA - NAVEGAR',
            'slug' => 'sales.index',
            'description' => 'lista y navega por venta',
        ]);

        Permission::create([
            'name' => 'VENTA CREAR',
            'slug' => 'sales.create',
            'description' => 'crear venta',
        ]);

        Permission::create([
            'name' => 'VENTA - VER',
            'slug' => 'sales.show',
            'description' => 'ver detalle de venta',
        ]);

        // #################################RUTA PARA CAMBIAR ESTADO DE VENTA#############
        Permission::create([
            'name' => 'VENTA - CAMBIAR ESTADO',
            'slug' => 'change.status.sales',
            'description' => 'cambiar estado de venta',
        ]);

        // #########################RUTA PARA DESCARGAR REPORTE EN PDF DE VENTA###################
        Permission::create([
            'name' => 'VENTA - DESCARGAR PDF',
            'slug' => 'sales.pdf',
            'description' => 'descargar venta en PDF',
        ]);

        // #########################RUTA PARA IMPRIMIR BOLETAS DE VENTA############################
        Permission::create([
            'name' => 'VENTA - IMPRIMIR',
            'slug' => 'sales.print',
            'description' => 'imprimir una boleta/factura de venta',
        ]);

        // ###########################RUTA REPORTE DE VENTAS#####################
        Permission::create([
            'name' => 'REPORTE - VENTAS',
            'slug' => 'reports.sales',
            'description' => 'generar reportes de ventas',
        ]);

        // ###########################RUTA PARA VER DATOS DE EMPRESA#############################
        Permission::create([
            'name' => 'EMPRESA - NAVEGAR',
            'slug' => 'companies.index',
            'description' => 'lista y navega por empresa',
        ]);

        // ##########################RUTA PARA EDICIÓN DE DATOS DE EMPRESA#######################
        Permission::create([
            'name' => 'EMPRESA - EDITAR',
            'slug' => 'companies.edit',
            'description' => 'editar empresa',
        ]);

        // RUTA PARA NAVEGAR DATOS DE IMPRESORA
        // Permission::create([
        //     'name' => 'Nagevación de datos de impresora',
        //     'slug' => 'printers.index',
        //     'description' => 'Navega por los datos de la impresora',
        // ]);

        // RUTA PARA EDITAR DATOS DE IMPRESORA
        // Permission::create([
        //     'name' => 'Edición de impresora',
        //     'slug' => 'printers.edit',
        //     'description' => 'Editar cualquier dato de la impresora',
        // ]);

        // RUTA PARA SUBIR ARCHIVO DE COMPRA
        // Permission::create([
        //     'name' => 'Subir archivo de compra',
        //     'slug' => 'upload.purchases',
        //     'description' => 'Facilita subir un comprobante de compra',
        // ]);

    }
}
