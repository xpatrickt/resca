<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

     // INDEX
         Permission::create([
            'name'          => 'Navegar principal',
            'slug'          => 'admin.index',
            'description'   => 'Vista Principal del sistema',
        ]);
        //END INDEX
//MANTENIMIENTO DE USUARIOS
//Users
        Permission::create([
            'name'          => 'Navegar usuarios',
            'slug'          => 'admin.users.index',
            'description'   => 'Lista y navega todos los usuarios del sistema',
        ]);

        Permission::create([
            'name'          => 'Creación de usuarios',
            'slug'          => 'admin.users.create',
            'description'   => 'Podría crear nuevos usuarios en el sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de usuario',
            'slug'          => 'admin.users.show',
            'description'   => 'Ve en detalle cada usuario del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Edición de usuarios',
            'slug'          => 'admin.users.edit',
            'description'   => 'Podría editar cualquier dato de un usuario del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar usuario',
            'slug'          => 'admin.users.destroy',
            'description'   => 'Podría eliminar cualquier usuario del sistema',      
        ]);

        //end users
        //Roles
        Permission::create([
            'name'          => 'Navegar roles',
            'slug'          => 'admin.roles.index',
            'description'   => 'Lista y navega todos los roles del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un rol',
            'slug'          => 'admin.roles.show',
            'description'   => 'Ve en detalle cada rol del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de roles',
            'slug'          => 'admin.roles.create',
            'description'   => 'Podría crear nuevos roles en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de roles',
            'slug'          => 'admin.roles.edit',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar roles',
            'slug'          => 'admin.roles.destroy',
            'description'   => 'Podría eliminar cualquier rol del sistema',      
        ]);
        //end roles

//FIN MANTENIMIENTO DE USUARIOS

//MANTENIMIENTO GENERAL
//Roles actividad
        Permission::create([
            'name'          => 'Navegar actividades',
            'slug'          => 'admin.actividad.index',
            'description'   => 'Lista y navega todos los actividades del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de una actividad',
            'slug'          => 'admin.actividad.show',
            'description'   => 'Ve en detalle cada actividad del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de actividades',
            'slug'          => 'admin.actividad.create',
            'description'   => 'Podría crear nuevos actividades en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de actividades',
            'slug'          => 'admin.actividad.edit',
            'description'   => 'Podría editar cualquier dato de una actividad del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar actividades',
            'slug'          => 'admin.actividad.destroy',
            'description'   => 'Podría eliminar cualquier actividad del sistema',      
        ]);
//end actividades

//Roles cargo
        Permission::create([
            'name'          => 'Navegar Cargos',
            'slug'          => 'admin.cargo.index',
            'description'   => 'Lista y navega todos los Cargos del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un cargo',
            'slug'          => 'admin.cargo.show',
            'description'   => 'Ve en detalle cada cargo del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de Cargos',
            'slug'          => 'admin.cargo.create',
            'description'   => 'Podría crear nuevos Cargos en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de Cargos',
            'slug'          => 'admin.cargo.edit',
            'description'   => 'Podría editar cualquier dato de un cargo del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar Cargos',
            'slug'          => 'admin.cargo.modal',
            'description'   => 'Podría eliminar cualquier cargo del sistema',      
        ]);
//end cargo
//Roles Departamento
        Permission::create([
            'name'          => 'Navegar departamentos',
            'slug'          => 'admin.departamento.index',
            'description'   => 'Lista y navega todos los departamentos del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un departamento',
            'slug'          => 'admin.departamento.show',
            'description'   => 'Ve en detalle cada departamento del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de departamentos',
            'slug'          => 'admin.departamento.create',
            'description'   => 'Podría crear nuevos departamentos en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de departamentos',
            'slug'          => 'admin.departamento.edit',
            'description'   => 'Podría editar cualquier dato de un departamento del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar departamentos',
            'slug'          => 'admin.departamento.modal',
            'description'   => 'Podría eliminar cualquier departamento del sistema',      
        ]);
//end Departamento
//Roles distrito
        Permission::create([
            'name'          => 'Navegar distritos',
            'slug'          => 'admin.distrito.index',
            'description'   => 'Lista y navega todos los distritos del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de una distrito',
            'slug'          => 'admin.distrito.show',
            'description'   => 'Ve en detalle cada distrito del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de distritos',
            'slug'          => 'admin.distrito.create',
            'description'   => 'Podría crear nuevos distritos en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de distritos',
            'slug'          => 'admin.distrito.edit',
            'description'   => 'Podría editar cualquier dato de una distrito del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar distritos',
            'slug'          => 'admin.distrito.modal',
            'description'   => 'Podría eliminar cualquier distrito del sistema',      
        ]);
//end distrito
//Roles documento
        Permission::create([
            'name'          => 'Navegar documentos',
            'slug'          => 'admin.documento.index',
            'description'   => 'Lista y navega todos los documentos del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un documento',
            'slug'          => 'admin.documento.show',
            'description'   => 'Ve en detalle cada documento del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de documentos',
            'slug'          => 'admin.documento.create',
            'description'   => 'Podría crear nuevos documentos en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de documentos',
            'slug'          => 'admin.documento.edit',
            'description'   => 'Podría editar cualquier dato de un documento del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar documentos',
            'slug'          => 'admin.documento.modal',
            'description'   => 'Podría eliminar cualquier documento del sistema',      
        ]);
//end documento
//Roles entidad
        Permission::create([
            'name'          => 'Navegar entidades',
            'slug'          => 'admin.entidad.index',
            'description'   => 'Lista y navega todos las entidades del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de una entidad',
            'slug'          => 'admin.entidad.show',
            'description'   => 'Ve en detalle cada entidad del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de entidades',
            'slug'          => 'admin.entidad.create',
            'description'   => 'Podría crear nuevos entidades en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de entidades',
            'slug'          => 'admin.entidad.edit',
            'description'   => 'Podría editar cualquier dato de una entidad del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar entidades',
            'slug'          => 'admin.entidad.modal',
            'description'   => 'Podría eliminar cualquier entidad del sistema',      
        ]);
//end entidad        
//Roles estado
        Permission::create([
            'name'          => 'Navegar estados',
            'slug'          => 'admin.estado.index',
            'description'   => 'Lista y navega todos los estados del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un estado',
            'slug'          => 'admin.estado.show',
            'description'   => 'Ve en detalle cada estado del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de estados',
            'slug'          => 'admin.estado.create',
            'description'   => 'Podría crear nuevos estados en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de estados',
            'slug'          => 'admin.estado.edit',
            'description'   => 'Podría editar cualquier dato de un estado del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar estados',
            'slug'          => 'admin.estado.modal',
            'description'   => 'Podría eliminar cualquier estado del sistema',      
        ]);
//end estado 

//Roles persona
        Permission::create([
            'name'          => 'Navegar personas',
            'slug'          => 'admin.persona.index',
            'description'   => 'Lista y navega todos los personas del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de una persona',
            'slug'          => 'admin.persona.show',
            'description'   => 'Ve en detalle cada persona del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de personas',
            'slug'          => 'admin.persona.create',
            'description'   => 'Podría crear nuevos personas en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de personas',
            'slug'          => 'admin.persona.edit',
            'description'   => 'Podría editar cualquier dato de una persona del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar personas',
            'slug'          => 'admin.persona.modal',
            'description'   => 'Podría eliminar cualquier persona del sistema',      
        ]);
//end persona 

//Roles provincia
        Permission::create([
            'name'          => 'Navegar provincias',
            'slug'          => 'admin.provincia.index',
            'description'   => 'Lista y navega todos los provincias del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de una provincia',
            'slug'          => 'admin.provincia.show',
            'description'   => 'Ve en detalle cada provincia del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de provincias',
            'slug'          => 'admin.provincia.create',
            'description'   => 'Podría crear nuevas provincias en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de provincias',
            'slug'          => 'admin.provincia.edit',
            'description'   => 'Podría editar cualquier dato de una provincia del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar provincias',
            'slug'          => 'admin.provincia.modal',
            'description'   => 'Podría eliminar cualquier provincia del sistema',      
        ]);
//end provincia 


//Roles Proyecto
        Permission::create([
            'name'          => 'Navegar proyectos',
            'slug'          => 'admin.proyecto.index',
            'description'   => 'Lista y navega todos los proyectos del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un proyecto',
            'slug'          => 'admin.proyecto.show',
            'description'   => 'Ve en detalle cada proyecto del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de proyectos',
            'slug'          => 'admin.proyecto.create',
            'description'   => 'Podría crear nuevos proyectos en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de proyectos',
            'slug'          => 'admin.proyecto.edit',
            'description'   => 'Podría editar cualquier dato de un proyecto del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar proyectos',
            'slug'          => 'admin.proyecto.modal',
            'description'   => 'Podría eliminar cualquier proyecto del sistema',      
        ]);
//end Proyecto


//Roles representante
        Permission::create([
            'name'          => 'Navegar Representantes',
            'slug'          => 'admin.representante.index',
            'description'   => 'Lista y navega todos los Representantes del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un representante',
            'slug'          => 'admin.representante.show',
            'description'   => 'Ve en detalle cada representante del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de Representantes',
            'slug'          => 'admin.representante.create',
            'description'   => 'Podría crear nuevos Representantes en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de Representantes',
            'slug'          => 'admin.representante.edit',
            'description'   => 'Podría editar cualquier dato de un representante del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar Representantes',
            'slug'          => 'admin.representante.modal',
            'description'   => 'Podría eliminar cualquier representante del sistema',      
        ]);
//end representante
//
//Roles tipoestudio
        Permission::create([
            'name'          => 'Navegar Tipoestudios',
            'slug'          => 'admin.tipoestudio.index',
            'description'   => 'Lista y navega todos los Tipoestudios del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un tipoestudio',
            'slug'          => 'admin.tipoestudio.show',
            'description'   => 'Ve en detalle cada tipoestudio del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de Tipoestudios',
            'slug'          => 'admin.tipoestudio.create',
            'description'   => 'Podría crear nuevos Tipoestudios en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de Tipoestudios',
            'slug'          => 'admin.tipoestudio.edit',
            'description'   => 'Podría editar cualquier dato de un tipoestudio del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar Tipoestudios',
            'slug'          => 'admin.tipoestudio.modal',
            'description'   => 'Podría eliminar cualquier tipoestudio del sistema',      
        ]);
//end tipoestudio

//Roles tipoevaluacion
        Permission::create([
            'name'          => 'Navegar Tipoevaluacion',
            'slug'          => 'admin.tipoevaluacion.index',
            'description'   => 'Lista y navega todos los Tipoevaluacion del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un tipoevaluacion',
            'slug'          => 'admin.tipoevaluacion.show',
            'description'   => 'Ve en detalle cada tipoevaluacion del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de Tipoevaluacion',
            'slug'          => 'admin.tipoevaluacion.create',
            'description'   => 'Podría crear nuevos Tipoevaluacion en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de Tipoevaluacion',
            'slug'          => 'admin.tipoevaluacion.edit',
            'description'   => 'Podría editar cualquier dato de un tipoevaluacion del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar Tipoevaluacion',
            'slug'          => 'admin.tipoevaluacion.modal',
            'description'   => 'Podría eliminar cualquier tipoevaluacion del sistema',      
        ]);
//end tipoevaluacion


//FIN MANTENIMIENTO GENERAL

//EVALUACION DE ESTUDIOS

//Roles evaluacion
        Permission::create([
            'name'          => 'Navegar evaluaciones',
            'slug'          => 'admin.evaluacion.index',
            'description'   => 'Lista y navega todas las evaluaciones del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de una evaluacion',
            'slug'          => 'admin.evaluacion.show',
            'description'   => 'Ve en detalle cada evaluacion del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de evaluaciones',
            'slug'          => 'admin.evaluacion.create',
            'description'   => 'Podría crear nuevas evaluaciones en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de evaluaciones',
            'slug'          => 'admin.evaluacion.edit',
            'description'   => 'Podría editar cualquier dato de una evaluacion del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar evaluaciones',
            'slug'          => 'admin.evaluacion.modal',
            'description'   => 'Podría eliminar cualquier evaluacion del sistema',      
        ]);
//end evaluacion 

//Roles evaluacionestudio
        Permission::create([
            'name'          => 'Navegar evaluacion estudios',
            'slug'          => 'admin.evaluacionestudio.index',
            'description'   => 'Lista y navega todos los evaluacion estudios del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de una evaluacion estudios',
            'slug'          => 'admin.evaluacionestudio.show',
            'description'   => 'Ve en detalle cada evaluacion estudios del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de evaluacion estudios',
            'slug'          => 'admin.evaluacionestudio.create',
            'description'   => 'Podría crear nuevos evaluacion estudios en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de evaluacion estudios',
            'slug'          => 'admin.evaluacionestudio.edit',
            'description'   => 'Podría editar cualquier dato de una evaluacion estudios del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar evaluacion estudios',
            'slug'          => 'admin.evaluacionestudio.modal',
            'description'   => 'Podría eliminar cualquier evaluacion estudios del sistema',      
        ]);
//end evaluacionestudio 
//
//Roles certificacion
        Permission::create([
            'name'          => 'Navegar certificaciones',
            'slug'          => 'admin.certificacion.index',
            'description'   => 'Lista y navega todas las certificaciones del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de una certificación',
            'slug'          => 'admin.certificacion.show',
            'description'   => 'Ve en detalle cada certificación del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de certificaciones',
            'slug'          => 'admin.certificacion.create',
            'description'   => 'Podría crear nuevas certificaciones en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de certificaciones',
            'slug'          => 'admin.certificacion.edit',
            'description'   => 'Podría editar cualquier dato de una certificación del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar certificaciones',
            'slug'          => 'admin.certificacion.modal',
            'description'   => 'Podría eliminar cualquier certificación del sistema',      
        ]);
//end certificacion 

//FIN EVALUACION DE ESTUDIOS

//REGISTRO DE PROYECTO

//Roles registro
        Permission::create([
            'name'          => 'Navegar Registros',
            'slug'          => 'admin.registro.index',
            'description'   => 'Lista y navega todos los Registros del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un registro',
            'slug'          => 'admin.registro.show',
            'description'   => 'Ve en detalle cada registro del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de Registros',
            'slug'          => 'admin.registro.create',
            'description'   => 'Podría crear nuevos Registros en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de Registros',
            'slug'          => 'admin.registro.edit',
            'description'   => 'Podría editar cualquier dato de un registro del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar Registros',
            'slug'          => 'admin.registro.modal',
            'description'   => 'Podría eliminar cualquier registro del sistema',      
        ]);
//end registro

//FIN REGISTRO DE PROYECTO

//SEGUIMIENTO DE PROYECTO
//Roles seguimiento
        Permission::create([
            'name'          => 'Navegar Seguimientos',
            'slug'          => 'admin.seguimiento.index',
            'description'   => 'Lista y navega todos los Seguimientos del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un seguimiento',
            'slug'          => 'admin.seguimiento.show',
            'description'   => 'Ve en detalle cada seguimiento del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de Seguimientos',
            'slug'          => 'admin.seguimiento.create',
            'description'   => 'Podría crear nuevos Seguimientos en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de Seguimientos',
            'slug'          => 'admin.seguimiento.edit',
            'description'   => 'Podría editar cualquier dato de un seguimiento del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar Seguimientos',
            'slug'          => 'admin.seguimiento.modal',
            'description'   => 'Podría eliminar cualquier seguimiento del sistema',      
        ]);
//end seguimiento

//FIN SEGUIMIENTO DE PROYECTO





    }
}
