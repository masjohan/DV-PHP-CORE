<?php


namespace App\Helpers;

use App\Helpers\DevlessHelper as DVHelper;
/**
 *Migrate services in and out of devless
 *
 * @author eddymens <eddymens@devless.io>
 */
class Migration extends Helper
{
 
    public static function export_service($service_name)
    {
        
        $devlessfunc = new DVHelper();
        $service_components = $devlessfunc::get_service_components($service_name);
        
        $folder_name = ($devlessfunc::add_service_to_folder($service_name, $service_components));
        
        ($folder_name)?
        $zipped_service_name = $devlessfunc::zip_folder($folder_name,'.srv')
                                    ://or
        $devlessfunc::flash('failed to create files(630)','error');  
        
        
        
        return $zipped_service_name;
    }

    public static function import_service($service_package_name)
    {       
        
            $devlessfunc = new DVHelper();
            $devlessfunc::unzip_package(storage_path().'/'.$service_package_name,true);
            //unzip service folder
            //get items from file 
            //move asset folder to resource
            ////get service json
            //insert service record into service table 
            //get id for creating table   
            //create related tables first if not found stop 
            //now create remaining tables 
            //
            //put data and file in right folders  (check if exists)
    }
    
    public static function export_app($app_name)
    {
        $package_name = $app_name;
        $devlessfunc = new DVHelper();
        $services_components = $devlessfunc::get_all_services();
        $service_list = json_decode($services_components,true)['services'];
        
        foreach($service_list as $service)
        {
            $package_name= ($devlessfunc::add_service_to_folder($service['name'], 
                $services_components,$app_name));
        }
        
        ($package_name)?
        $zipped_package_name = $devlessfunc::zip_folder($package_name, '.pkg')
                                    ://or
        $devlessfunc::flash('failed to create files(630)','error');  
        
        
        
        return $zipped_package_name;
        
    }
}

//get service.json file 