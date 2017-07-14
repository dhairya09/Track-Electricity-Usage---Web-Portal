<?php

    function redirect_to($new_location){
      header("Location: " . $new_location);
      exit();
    }

    function confirm_query($result_set){
    if(!$result_set){
    die("Database queriessssssssssssssssssssssssss failed");
    }
    }

    function mysql_prep($string){
      global $connection;
      $escaped_string = mysqli_real_escape_string($connection,$string);
      return $escaped_string;

    }

    function password_encrypt($password){
      $hash_format = "$2y$10$";
      $salt_length = 22;
      $salt =  generate_salt($salt_length);
      $format_and_salt = $hash_format . $salt;
      $hash = crypt($password,$format_and_salt);

      return $hash;

    }

    function generate_salt($salt_length){
      $unique_random_string = md5(uniqid(mt_rand(),true));
      $base64_string = base64_encode($unique_random_string);
      $modified_base64_string = str_replace('+','.',$base64_string);
      $salt = substr($modified_base64_string,0,$salt_length);
      return $salt;
    }

    function password_check($password,$existing_hash){
      $hash = crypt($password,$existing_hash);
      if($hash === $existing_hash){
        return true;
      }
      else{
        return false;
      }
    }
    function find_feeder_by_Feeder_Name($Feeder_Name)
    {
      global $connection;
      $safe_Feeder_Name = mysqli_real_escape_string($connection,$Feeder_Name);
      $query = "SELECT * ";
      $query.= "FROM elec_upc_services ";
      $query.= "WHERE ";
      $query.= "Feeder_Name= '{$safe_Feeder_Name}' ";
      $query.= "LIMIT 1";

      $result = mysqli_query($connection,$query);
      confirm_query($result);
      if($feeder = mysqli_fetch_assoc($result)){
          return $feeder;
      }
      else{
        return null;
      }

    }

    function find_all_Feeders(){
      global $connection;

      $query = "SELECT * ";
      $query.= "FROM elec_upc_services ";
      $query.= "ORDER BY Feeder_Name ASC";

      $feeder_set = mysqli_query($connection,$query);
          confirm_query($feeder_set);

          return $feeder_set;
    }

    function find_all_Transformers(){
      global $connection;

      $query = "SELECT * ";
      $query.= "FROM elec_upc_building_names ";
      $query.= "ORDER BY Building_Code ASC";

      $transformer_set = mysqli_query($connection,$query);
          confirm_query($transformer_set);

          return $transformer_set;
    }

    function find_all_generators(){
      global $connection;

      $query = "SELECT * ";
      $query.= "FROM elec_upc_generators ";
      $query.= "ORDER BY Building_Code ASC";

      $generator_set = mysqli_query($connection,$query);
          confirm_query($generator_set);

          return $generator_set;
    }

    function find_all_nonadmins(){
      global $connection;

      $query = "SELECT * ";
      $query.= "FROM nonadmin ";
      $query.= "ORDER BY username ASC";

      $nonadmin_set = mysqli_query($connection,$query);
          confirm_query($nonadmin_set);

          return $nonadmin_set;
    }

    function find_all_admins(){
      global $connection;

      $query = "SELECT * ";
      $query.= "FROM admin ";
      $query.= "ORDER BY username ASC";

      $admin_set = mysqli_query($connection,$query);
          confirm_query($admin_set);

          return $admin_set;
    }



    function find_admin_by_id($admin_id){
      global $connection;
      $safe_admin_id = mysqli_real_escape_string($connection,$admin_id);
      $query = "SELECT * ";
      $query.= "FROM admin ";
      $query.= "WHERE ";
      $query.= "id= {$safe_admin_id} ";
      $query.= "LIMIT 1";

      $result = mysqli_query($connection,$query);
      confirm_query($result);
      if($admin = mysqli_fetch_assoc($result)){
          return $admin;
      }
      else{
        return null;
      }
    }

    function find_nonadmin_by_id($nonadmin_id){
      global $connection;
      $safe_nonadmin_id = mysqli_real_escape_string($connection,$nonadmin_id);
      $query = "SELECT * ";
      $query.= "FROM nonadmin ";
      $query.= "WHERE ";
      $query.= "id= {$safe_nonadmin_id} ";
      $query.= "LIMIT 1";

      $result = mysqli_query($connection,$query);
      confirm_query($result);
      if($nonadmin = mysqli_fetch_assoc($result)){
          return $nonadmin;
      }
      else{
        return null;
      }
    }

    function find_admin_by_username($admin_username){
      global $connection;
      $safe_admin_username = mysqli_real_escape_string($connection,$admin_username);
      $query = "SELECT * ";
      $query.= "FROM admin ";
      $query.= "WHERE ";
      $query.= "username= '{$safe_admin_username}' ";
      $query.= "LIMIT 1";

      $result = mysqli_query($connection,$query);
      confirm_query($result);
      if($admin = mysqli_fetch_assoc($result)){
          return $admin;
      }
      else{
        return null;
      }
    }


    function find_nonadmin_by_username($nonadmin_username){
      global $connection;
      $safe_nonadmin_username = mysqli_real_escape_string($connection,$nonadmin_username);
      $query = "SELECT * ";
      $query.= "FROM nonadmin ";
      $query.= "WHERE ";
      $query.= "username= '{$safe_nonadmin_username}' ";
      $query.= "LIMIT 1";

      $result = mysqli_query($connection,$query);
      confirm_query($result);
      if($nonadmin = mysqli_fetch_assoc($result)){
          return $nonadmin;
      }
      else{
        return null;
      }
    }

    function find_building_by_Building_Code($building_Code){
      global $connection;
      $building_Code = mysqli_real_escape_string($connection,$building_Code);
      $query = "SELECT * ";
      $query.= "FROM elec_upc_building_names ";
      $query.= "WHERE ";
      $query.= "Building_Code= '{$building_Code}' ";
      $query.= "LIMIT 1";

      $result = mysqli_query($connection,$query);



      confirm_query($result);
      if($building = mysqli_fetch_assoc($result)){


          return $building;
      }
      else{
        return null;
      }
    }

    function find_Similar_Building_Codes_by_Building_Code($building_Code){
      global $connection;
      $building_Code = mysqli_real_escape_string($connection,$building_Code);
      $query = "SELECT * ";
      $query.= "FROM elec_upc_buildings ";
      $query.= "WHERE ";
      $query.= "Bldg_Cd_1= '{$building_Code}' ";
      $query.= "LIMIT 1";

      $result = mysqli_query($connection,$query);



      confirm_query($result);
      if($building = mysqli_fetch_assoc($result)){


          return $building;
      }
      else{
        return null;
      }
    }

    function find_transformer_by_Building_Code($building_Code){
      global $connection;

      $building_Code = mysqli_real_escape_string($connection,$building_Code);

      $query = "SELECT * ";
      $query.= "FROM elec_upc_txdemand ";
      $query.= "WHERE ";
      $query.= "Building_Code= '{$building_Code}' ";
      $query.= "LIMIT 1";

      $result = mysqli_query($connection,$query);
      confirm_query($result);
      if($trans = mysqli_fetch_assoc($result)){


            return $trans;
        }

        else{
            return null;
        }

      }



      //confirm_query($result);



    function find_generator_by_Building_Code($building_Code){
      global $connection;

      $building_Code = mysqli_real_escape_string($connection,$building_Code);

      $query = "SELECT * ";
      $query.= "FROM elec_upc_generators ";
      $query.= "WHERE ";
      $query.= "Building_Code= '{$building_Code}' ";
      //$query.= "LIMIT 1";

      $result = mysqli_query($connection,$query);
      confirm_query($result);
      if($generator = mysqli_fetch_assoc($result)){
          return $generator;
      }
      else{
        return null;
      }
    }

    function find_camlock_by_Building_Code($building_Code){
      global $connection;

      $building_Code = mysqli_real_escape_string($connection,$building_Code);

      $query = "SELECT * ";
      $query.= "FROM cam_locks ";
      $query.= "WHERE ";
      $query.= "Building_Code= '{$building_Code}' ";
      //$query.= "LIMIT 1";

      $result = mysqli_query($connection,$query);
      confirm_query($result);
      if($camlock = mysqli_fetch_assoc($result)){
          return $camlock;
      }
      else{
        return null;
      }
    }


    function find_qce_by_Building_Code($building_Code){
      global $connection;

      $building_Code = mysqli_real_escape_string($connection,$building_Code);

      $query = "SELECT * ";
      $query.= "FROM quick_connect_equipment ";
      $query.= "WHERE ";
      $query.= "Building_Code= '{$building_Code}' ";
      //$query.= "LIMIT 1";

      $result = mysqli_query($connection,$query);
      confirm_query($result);
      if($qce = mysqli_fetch_assoc($result)){
          return $qce;
      }
      else{
        return null;
      }
    }

    function find_keylocks_by_Building_Code($building_Code){
      global $connection;

      $building_Code = mysqli_real_escape_string($connection,$building_Code);

      $query = "SELECT * ";
      $query.= "FROM key_interlocks ";
      $query.= "WHERE ";
      $query.= "Building_Code= '{$building_Code}' ";
      //$query.= "LIMIT 1";

      $result = mysqli_query($connection,$query);
      confirm_query($result);
      if($keylocks = mysqli_fetch_assoc($result)){
          return $keylocks;
      }
      else{
        return null;
      }
    }

    function find_ups_by_Building_Code($building_Code){
      global $connection;

      $building_Code = mysqli_real_escape_string($connection,$building_Code);

      $query = "SELECT * ";
      $query.= "FROM ups ";
      $query.= "WHERE ";
      $query.= "Building_Code= '{$building_Code}' ";
      //$query.= "LIMIT 1";

      $result = mysqli_query($connection,$query);
      confirm_query($result);
      if($ups = mysqli_fetch_assoc($result)){
          return $ups;
      }
      else{
        return null;
      }
    }

    function find_mambreak_by_Building_Code($building_Code){
      global $connection;

      $building_Code = mysqli_real_escape_string($connection,$building_Code);

      $query = "SELECT * ";
      $query.= "FROM mam_breakers ";
      $query.= "WHERE ";
      $query.= "Building_Code= '{$building_Code}' ";
      //$query.= "LIMIT 1";

      $result = mysqli_query($connection,$query);
      confirm_query($result);
      if($mambreak = mysqli_fetch_assoc($result)){
          return $mambreak;
      }
      else{
        return null;
      }
    }



    function Find_Data_By_Search($keyword){
        global $connection;
        $key = mysqli_real_escape_string($connection,$keyword);

        $query = "SELECT Building_Code, Building_Name ";
        $query.= "FROM elec_upc_building_names WHERE ";
        $query.= "Building_Code LIKE '$key%' ";
        $query.= "OR Building_Name LIKE '$key%' ";

        //$query.= "Building_Code LIKE '$key' ";
        //$query.= "OR Building_Name LIKE '$key' ";

        $result = mysqli_query($connection,$query);
        confirm_query($result);

        return $result;
    }

    function Find_Building_By_Search($keyword){
        global $connection;
        $key = mysqli_real_escape_string($connection,$keyword);

        $query = "SELECT Building_Code, Building_Name, Building_Address ";
        $query.= "FROM elec_upc_building_names WHERE ";
        //$query.= "MATCH (Building_Code) AGAINST ('$key')";
        /*$query.= "Building_Code REGEXP '$key' ";
        $query.= "Building_Name REGEXP '$key'";*/

        $query.= "Building_Code LIKE '$key%' ";
        $query.= "OR Building_Name LIKE '$key%' ";

        $result = mysqli_query($connection,$query);
        confirm_query($result);

        return $result;
    }

    function Booklet_Data($feeder_che){

      global $connection;

      $fed_name = mysqli_real_escape_string($connection,$feeder_che);
      $query = "SELECT Building_Code,";
      $query.= "Primary_Feed,Secondary_Feed ";
      $query.= "FROM elec_upc_txdemand ";
      $query.= "WHERE Primary_Feed='{$fed_name}' ";
      $query.= "ORDER BY Building_Code ASC";

      $result = mysqli_query($connection,$query);
      confirm_query($result);

      return $result;

    }

    function Booklet_HSC_Data($feeder_che){

      global $connection;

      $fed_name = mysqli_real_escape_string($connection,$feeder_che);
      $query = "SELECT Building_Code,";
      $query.= "Primary_Feed,Secondary_Feed ";
      $query.= "FROM elec_HSC_TXDEMAND ";
      $query.= "WHERE Primary_Feed='{$fed_name}' ";
      $query.= "ORDER BY Building_Code ASC";

      $result = mysqli_query($connection,$query);
      confirm_query($result);

      return $result;

    }

    function Booklet_Data_Sec($feeder){
      global $connection;

      $fed_name = mysqli_real_escape_string($connection,$feeder);
      $query = "SELECT Building_Code,";
      $query.= "Primary_Feed,Secondary_Feed ";
      $query.= "FROM elec_upc_txdemand ";
      $query.= "WHERE Secondary_Feed='{$fed_name}' ";
      $query.= "ORDER BY Building_Code ASC";

      $result = mysqli_query($connection,$query);
      confirm_query($result);

      return $result;

    }


    function Booklet_HSC_Data_Sec($feeder){
      global $connection;

      $fed_name = mysqli_real_escape_string($connection,$feeder);
      $query = "SELECT Building_Code,";
      $query.= "Primary_Feed,Secondary_Feed ";
      $query.= "FROM elec_HSC_TXDEMAND ";
      $query.= "WHERE Secondary_Feed='{$fed_name}' ";
      $query.= "ORDER BY Building_Code ASC";

      $result = mysqli_query($connection,$query);
      confirm_query($result);

      return $result;

    }


    function form_errors($errors=array()) {
      $output = "";
      if (!empty($errors)) {
        $output .= "<div class=\"error\">";
        $output .= "Please fix the following errors:";
        $output .= "<ul>";
        foreach ($errors as $key => $error) {
          $output .= "<li>";
          $output .= htmlentities($error);
          $output .= "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
      }
      return $output;
    }

    function attempt_login($username,$password){
      $admin = find_admin_by_username($username);

      if($admin){
           if(password_check($password,$admin["hashed_password"])){
              return $admin;
           }
           else{
             return false;
           }
      }

      else{
        return false;
      }

    }

    function attempt_nonlogin($username,$password){

      $nonadmin = find_nonadmin_by_username($username);

      if($nonadmin){
        if(password_check($password,$nonadmin["hashed_password"])){
           return $nonadmin;
        }
        else{
          return false;
        }

      }
      else{
        return false;
      }

    }



    function logged_in(){
      return isset($_SESSION["admin_id"]);
    }

    function confirm_logged_in(){
      if(!logged_in()){
        redirect_to("Login.php");
      }
    }




 ?>
